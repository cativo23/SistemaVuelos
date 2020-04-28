<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Itinerary
 *
 * @property int $ID
 * @property string|null $CREATED_AT
 * @property string|null $UPDATED_AT
 * @property int $TOTAL_PRICE
 * @property int $NUM_CONNECTIONS
 * @property string $ARRIVAL_DATE
 * @property string $ARRIVAL_TIME
 * @property string $DEPARTURE_DATE
 * @property string $DEPARTURE_TIME
 * @property float $TOTAL_DURATION
 * @property string $DESTINATION
 * @property string $ORIGIN
 * @property int $AIRLINE_ID
 * @property string $TYPE
 * @method static Builder|Itinerary newModelQuery()
 * @method static Builder|Itinerary newQuery()
 * @method static Builder|Itinerary query()
 * @method static Builder|Itinerary whereAIRLINEID($value)
 * @method static Builder|Itinerary whereARRIVALDATE($value)
 * @method static Builder|Itinerary whereARRIVALTIME($value)
 * @method static Builder|Itinerary whereCREATEDAT($value)
 * @method static Builder|Itinerary whereDEPARTUREDATE($value)
 * @method static Builder|Itinerary whereDEPARTURETIME($value)
 * @method static Builder|Itinerary whereDESTINATION($value)
 * @method static Builder|Itinerary whereID($value)
 * @method static Builder|Itinerary whereNUMCONNECTIONS($value)
 * @method static Builder|Itinerary whereORIGIN($value)
 * @method static Builder|Itinerary whereTOTALDURATION($value)
 * @method static Builder|Itinerary whereTOTALPRICE($value)
 * @method static Builder|Itinerary whereTYPE($value)
 * @method static Builder|Itinerary whereUPDATEDAT($value)
 * @mixin Eloquent
 */
class Itinerary extends Model
{
    protected $guarded = ['id'];

    /*
     * Flights for this Itinerary
     */
    public function flights(){
        $this->hasMany('App\Flight');
    }

    /*
     * Reservations that have this Itinerary
     */
    public function reservations(){
        $this->hasMany('App\Reservation');
    }

    public function airline(){
        return $this->belongsTo('App\Airline');
    }
}
