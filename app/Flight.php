<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;
use function Sodium\crypto_kx;

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
 * @property float $COST
 * @property float $PRICE
 * @property float $DISTANCE_MILES
 * @property int $FLIGHT_MILES
 * @property string $STATUS
 * @property float $DURATION
 * @property int $LANDING_TERMINAL_ID
 * @property int $BOARDING_TERMINAL_ID
 * @property int $AIRPLANE_ID
 * @property int $AIRLINE_ID
 * @method static Builder|Flight newModelQuery()
 * @method static Builder|Flight newQuery()
 * @method static Builder|Flight query()
 * @method static Builder|Flight whereAIRLINEID($value)
 * @method static Builder|Flight whereAIRPLANEID($value)
 * @method static Builder|Flight whereARRIVALDATE($value)
 * @method static Builder|Flight whereBOARDINGTERMINALID($value)
 * @method static Builder|Flight whereARRIVALTIME($value)
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
 * @method static Builder|Flight whereLANDINGTERMINALID($value)
 * @method static Builder|Flight whereORIGIN($value)
 * @method static Builder|Flight wherePRICE($value)
 * @method static Builder|Flight whereSTATUS($value)
 * @method static Builder|Flight whereUPDATEDAT($value)
 * @mixin Eloquent
 * @property int $ITINERARY_ID
 * @property-read Terminal $boarding_gateway
 * @property-read Terminal $landing_gateway
 * @method static Builder|Flight whereITINERARYID($value)
 * @property-read Collection|Activity[] $activities
 * @property-read int|null $activities_count
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $arrival_date
 * @property string $arrival_time
 * @property string $departure_date
 * @property string $departure_time
 * @property string $origin
 * @property string $destination
 * @property string $code
 * @property string $cost
 * @property string $price
 * @property string $distance_miles
 * @property int $flight_miles
 * @property string $status
 * @property string $duration
 * @property int $landing_terminal_id
 * @property int $boarding_terminal_id
 * @property int $airplane_id
 * @property int $airline_id
 * @property int $itinerary_id
 * @method static Builder|Flight whereAirlineId($value)
 * @method static Builder|Flight whereAirplaneId($value)
 * @method static Builder|Flight whereArrivalDate($value)
 * @method static Builder|Flight whereArrivalTime($value)
 * @method static Builder|Flight whereBoardingTerminalId($value)
 * @method static Builder|Flight whereCode($value)
 * @method static Builder|Flight whereCost($value)
 * @method static Builder|Flight whereCreatedAt($value)
 * @method static Builder|Flight whereDepartureDate($value)
 * @method static Builder|Flight whereDepartureTime($value)
 * @method static Builder|Flight whereDestination($value)
 * @method static Builder|Flight whereDistanceMiles($value)
 * @method static Builder|Flight whereDuration($value)
 * @method static Builder|Flight whereFlightMiles($value)
 * @method static Builder|Flight whereId($value)
 * @method static Builder|Flight whereItineraryId($value)
 * @method static Builder|Flight whereLandingTerminalId($value)
 * @method static Builder|Flight whereOrigin($value)
 * @method static Builder|Flight wherePrice($value)
 * @method static Builder|Flight whereStatus($value)
 * @method static Builder|Flight whereUpdatedAt($value)
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
        $this->belongsTo(Airline::class);
    }

    /*
    * Airplane of this flight
    */
    public function airplane(){
        $this->belongsTo(Airline::class);
    }

    /*
    * Arrival Gateway of this flight
    */
    public function landing_gateway(){
        return $this->belongsTo(Terminal::class, 'id', 'landing_terminal');
    }

    /*
     * Boarding Gateway of this flight
     */
    public function boarding_gateway(){
        return $this->belongsTo(Terminal::class, 'id', 'boarding_terminal');
    }


    /*
     *   Itinerary of this flight
     */
    public function  itinerary(){
        return $this-> belongsTo(Itinerary::class);
    }
}
