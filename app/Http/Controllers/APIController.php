<?php

namespace App\Http\Controllers;

use App\Airline;
use App\Airplane;
use App\Airport;
use App\Backup;
use App\Destination;
use App\Jobs\RestoreDB;
use App\Restores;
use App\User;
use Artisan;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use AWS;

class APIController extends Controller
{
    public function aws_make_backup(){

        $this->update_backups();

        $last_backup = Backup::latest()->first();

        $new_backup_id = 1;

        if ($last_backup){
            $new_backup_id = $last_backup->id+1;
        }

        $rds = AWS::createClient('rds');


        if ($last_backup){
            if ($last_backup->status!='creating' ){
                $result = $rds->createDBSnapshot([
                    'DBInstanceIdentifier' => 'voyarge', // REQUIRED
                    'DBSnapshotIdentifier' => 'voyarge-snapshot-'.$new_backup_id // REQUIRED,
                ]);

                $result = $result['DBSnapshot'];

                $backup = new Backup([
                    'name'=>$result['DBSnapshotIdentifier'],
                    'created_at_aws'=> Carbon::now(),
                    'status'=>$result['Status']
                ]);

                $backup->save();
                return response()->json([
                    'result'=>'done'
                ]);
            }
        }else{
            $result = $rds->createDBSnapshot([
                'DBInstanceIdentifier' => 'voyarge', // REQUIRED
                'DBSnapshotIdentifier' => 'voyarge-snapshot-'.$new_backup_id // REQUIRED,
            ]);

            $result = $result['DBSnapshot'];

            $backup = new Backup([
                'name'=>$result['DBSnapshotIdentifier'],
                'created_at_aws'=> Carbon::now(),
                'status'=>$result['Status']
            ]);

            $backup->save();
            return response()->json([
                'result'=>'done'
            ]);
        }

        return response()->json([
            'result'=>"can't create, currently creating snapshot",
        ]);

    }

    public function aws_describe_backups(){

        $this->update_backups();

        $backups = Backup::all();

        return response()->json($backups);
    }

    public function aws_restore_backup(Request $request){

        $this->update_backups();
        $this->update_restores();

        $snapshot_id = $request->input('id');

        if ($snapshot_id) {
            $snapshot = Backup::findOrFail($snapshot_id);
        } else {
            $snapshot = Backup::latest()->first();
        }

        if ($snapshot) {
            if ($snapshot->status != 'creating') {
                Artisan::call('down --message="Database Maintenance" --retry=60 --allow=127.0.0.1 --allow=18.218.162.24');

                $rds = AWS::createClient('rds');

                $last_restore = Restores::latest()->first();
                $last_restore_id = 1;

                if ($last_restore){
                    $last_restore_id = $last_restore->id;
                }

                $result = $rds->restoreDBInstanceFromDBSnapshot([
                    'DBInstanceIdentifier' => 'voyarge' . ($last_restore_id+1), // REQUIRED
                    'DBSnapshotIdentifier' => $this->snapshot->name, // REQUIRED,
                ]);

                $db_instance = $result['DBInstance'];

                $restore = Restores::where('DB_instance_name', '=', $db_instance['DBInstanceIdentifier'])->first();

                if (!$restore) {
                    $restore = new Restores([
                        'DB_instance_name' => $db_instance['DBInstanceIdentifier'],
                        'DB_status' => $db_instance['DBInstanceStatus']
                    ]);
                }

                $restore->DB_instance_name = $db_instance['DBInstanceIdentifier'];
                $restore->DB_status = $db_instance['DBInstanceStatus'];

                $restore->save();
                $status = 'creating';

                while ($status != 'available') {
                    $this->update_restores();
                    $status = Restores::latest()->first()->DB_status;
                    sleep(2);
                }

                config(['database.connections.mysql.host' => $restore->DB_instance_name . '.cfixb9aqwzl9.us-east-2.rds.amazonaws.com']);
                \Log::info( config('database.connections.mysql.host'));

                Artisan::call('up');

            }
        }

        response()->json([
            'result'=>"Restored DB",
        ]);
    }

    public function update_backups(){
        $rds = AWS::createClient('rds');
        $result = $rds->describeDBSnapshots([
            'DBInstanceIdentifier' => 'voyarge',
        ]);

        $snapshots = $result['DBSnapshots'];
        foreach ($snapshots as $snapshot){
            $backup = Backup::where('name', '=', $snapshot['DBSnapshotIdentifier'])->get();
            if (count($backup)>0){
                $backup = $backup->first();
                $backup->status = $snapshot['Status'];
                $backup->save();
            }
        }
    }

    public function update_restores(){
        $rds = AWS::createClient('rds');
        $result = $rds->describeDBInstances();

        $instances = $result['DBInstances'];

        foreach ($instances as $instance){
            $restore = Restores::where('DB_instance_name', '=', $instance['DBInstanceIdentifier'])->get();
            if (count($restore)>0){
                $restore = $restore->first();
                $restore->DB_status = $instance['DBInstanceStatus'];
                $restore->save();
            }
        }
    }

    public function get_airlines(Request $request){
        $term = '%'.$request->input('term').'%';
        $airlines = Airline::selectRaw('SHORT_NAME as label, ID as value')->whereRaw("upper(CODE) like upper('".$term."')")->orWhereRaw("upper(OFFICIAL_NAME) like upper('".$term."')")->orWhereRaw("upper(SHORT_NAME) like upper('".$term."')")->get();
        return response()->json($airlines);
    }

    public function get_airports(Request $request){
        $term = '%'.$request->input('term').'%';
        $airports = Airport::selectRaw('NAME as label, ID as value')->whereRaw("upper(CODE) like upper('".$term."')")->orWhereRaw("upper(NAME) like upper('".$term."')")->get();
        return response()->json($airports);
    }

    public function get_airplanes(Request $request){
        $airline_term = $request->input('airline');
        $airline = Airline::select('id')->whereRaw("upper(CODE) like upper('".$airline_term."')")->orWhereRaw("upper(OFFICIAL_NAME) like upper('".$airline_term."')")->orWhereRaw("upper(SHORT_NAME) like upper('".$airline_term."')")->get()->first();
        $term = '%'.$request->input('term').'%';
        $airplanes= Airplane::selectRaw("CONCAT(CONCAT(CONCAT(CONCAT(MANUFACTURER,' '),MODEL), ' #'),ID) as label, ID as value")->whereRaw("upper(MODEL) like upper('".$term."')");
        if ($airline){
            $airplanes = $airplanes->where('AIRLINE_ID', '=', $airline->id);
        }
        $airplanes = $airplanes->get();
        return response()->json($airplanes);
    }

    public function get_destinations(Request $request){
        $term = '%'.$request->input('term').'%';
        $term = strtoupper($term);
        $destinations= Destination::selectRaw("CITY as city, STATE as state,  COUNTRY as country")->whereRaw("upper(CITY) like '".$term."'")->orwhereRaw("upper(COUNTRY) like '".$term."'")->get();
        return response()->json($destinations);
    }

    public function get_users(Request $request){
        $term = '%'.$request->input('term').'%';
        $usernames = User::selectRaw('NAME as label, ID as value')->whereRaw("upper(USERNAME) like upper('".$term."')")->orWhereRaw("upper(NAME) like upper('".$term."')")->get();
        return response()->json($usernames);
    }
}
