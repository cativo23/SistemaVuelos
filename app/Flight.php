<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;


/**
 * App\Flight
 *
 * @property int $ID
 * @property string|null $CREATED_AT
 * @property string|null $UPDATED_AT
 * @property string $ARRIVAL_DATE
 * @property string $ARRIVAL_TIME
 * @property string $DEPARTURE_DATE
 * @property string $DEPARTURE_TIME
 * @property string $ORIGIN
 * @property string $DESTINATION
 * @property string $CODE
 * @property string $COST
 * @property string $PRICE
 * @property string $DISTANCE_MILES
 * @property int $FLIGHT_MILES
 * @property string $STATUS
 * @property string $DURATION
 * @property int $LANDING_TERMINAL_ID
 * @property int $BOARDING_TERMINAL_ID
 * @property int $AIRPLANE_ID
 * @property int $AIRLINE_ID
 * @property int $ITINERARY_ID
 * @property-read Collection|Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read Terminal $boarding_gateway
 * @property-read Terminal $landing_gateway
 * @method static Builder|Flight newModelQuery()
 * @method static Builder|Flight newQuery()
 * @method static Builder|Flight query()
 * @method static Builder|Flight whereAIRLINEID($value)
 * @method static Builder|Flight whereAIRPLANEID($value)
 * @method static Builder|Flight whereARRIVALDATE($value)
 * @method static Builder|Flight whereARRIVALTIME($value)
 * @method static Builder|Flight whereBOARDINGTERMINALID($value)
 * @method static Builder|Flight whereCODE($value)
 * @method static Builder|Flight whereCOST($value)
 * @method static Builder|Flight whereCREATEDAT($value)
 * @method static Builder|Flight whereDEPARTUREDATE($value)
 * @method static Builder|Flight whereDEPARTURETIME($value)
 * @method static Builder|Flight whereDESTINATION($value)
 * @method static Builder|Flight whereDISTANCEMILES($value)
 * @method static Builder|Flight whereDURATION($value)
 * @method static Builder|Flight whereFLIGHTMILES($value)
 * @method static Builder|Flight whereID($value)
 * @method static Builder|Flight whereITINERARYID($value)
 * @method static Builder|Flight whereLANDINGTERMINALID($value)
 * @method static Builder|Flight whereORIGIN($value)
 * @method static Builder|Flight wherePRICE($value)
 * @method static Builder|Flight whereSTATUS($value)
 * @method static Builder|Flight whereUPDATEDAT($value)
 * @mixin Eloquent
 */
class Flight extends Model
{
    use LogsActivity;

    protected $guarded = ['id'];

     protected static $logName = 'flight';

    protected static $logOnlyDirty = true;

    protected static $logUnguarded = true;

    /*
     * Airlines of this flight
     */


    public function airline(){
        return $this->belongsTo(Airline::class);
    }

    /*
    * Airplane of this flight
    */
    public function airplane(){
        return $this->hasOne(Airplane::class, 'id', 'airplane_id');
    }

    /*
    * Arrival Gateway of this flight
    */
    public function landing_gateway(){
        return $this->belongsTo(Terminal::class, 'landing_terminal_id', 'id');
    }

    /*
     * Boarding Gateway of this flight
     */
    public function boarding_gateway(){
        return $this->belongsTo(Terminal::class, 'boarding_terminal_id', 'id');
    }


    /*
     *   Itinerary of this flight
     */
    public function  itinerary(){
        return $this-> belongsTo(Itinerary::class);
    }


    public function hasSeats(array $class, int $passengers){
        $seats = $this->airplane->seats->where('status', '=', 1);
        if ($class){
            if ($class[0] != ""){
                $seats = $seats->whereIn('class', $class);
            }
        }
        if ($passengers > 0){
            return count($seats) >= $passengers;
        }
        else{
            return count($seats) > 0;
        }
    }

    public function to_string(){
        return 'Flight ' .$this->origin.'-'.$this->destination;
    }
}
