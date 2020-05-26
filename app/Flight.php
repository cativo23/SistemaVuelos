<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

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
 */
class Flight extends Model
{
    protected $guarded = ['id'];

    /*
     * Airlines of this flight
     */
    public function airline(){
        $this->belongsTo('App\Airline');
    }

    /*
    * Airplane of this flight
    */
    public function airplane(){
        $this->belongsTo('App\Airplane');
    }

    /*
    * Airlines of this flight
    */
    public function landing_gateway(){
        return $this->belongsTo('App\Terminal', 'id', 'landing_terminal');
    }

    public function boarding_gateway(){
        return $this->belongsTo('App\Terminal', 'id', 'boarding_terminal');
    }

    public function  itinerary(){
        return $this-> belongsTo('App\Itinerary');
    }
}
