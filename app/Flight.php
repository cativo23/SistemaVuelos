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
