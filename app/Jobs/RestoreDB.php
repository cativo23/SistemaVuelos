<?php

namespace App\Jobs;

use App\Backup;
use App\Restores;
use Artisan;
use AWS;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RestoreDB implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $snapshot;

    /**
     * Create a new job instance.
     *
     * @param $snapshot_id
     */
    public function __construct($snapshot_id)
    {
        if ($snapshot_id) {
            $this->snapshot = Backup::findOrFail($snapshot_id);
        } else {
            $this->snapshot = Backup::latest()->first();
        }
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {


    }

    public function update_restores()
    {
        $rds = AWS::createClient('rds');
        $result = $rds->describeDBInstances();

        $instances = $result['DBInstances'];

        foreach ($instances as $instance) {
            $restore = Restores::where('DB_instance_name', '=', $instance['DBInstanceIdentifier'])->get();
            if (count($restore) > 0) {
                $restore = $restore->first();
                $restore->DB_status = $instance['DBInstanceStatus'];
                $restore->save();
            }
        }
    }
}
