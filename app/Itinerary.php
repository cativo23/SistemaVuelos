<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

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
 * @property-read Airline $airline
 * @property-read Collection|Flight[] $flights
 * @property-read int|null $flights_count
 * @property-read Collection|Reservation[] $reservations
 * @property-read int|null $reservations_count
 * @property-read Collection|Activity[] $activities
 * @property-read int|null $activities_count
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $total_price
 * @property int $num_connections
 * @property string $arrival_date
 * @property string $arrival_time
 * @property string $departure_date
 * @property string $departure_time
 * @property string $total_duration
 * @property string $destination
 * @property string $origin
 * @property string $type
 * @property int $airline_id
 * @method static Builder|Itinerary whereAirlineId($value)
 * @method static Builder|Itinerary whereArrivalDate($value)
 * @method static Builder|Itinerary whereArrivalTime($value)
 * @method static Builder|Itinerary whereCreatedAt($value)
 * @method static Builder|Itinerary whereDepartureDate($value)
 * @method static Builder|Itinerary whereDepartureTime($value)
 * @method static Builder|Itinerary whereDestination($value)
 * @method static Builder|Itinerary whereId($value)
 * @method static Builder|Itinerary whereNumConnections($value)
 * @method static Builder|Itinerary whereOrigin($value)
 * @method static Builder|Itinerary whereTotalDuration($value)
 * @method static Builder|Itinerary whereTotalPrice($value)
 * @method static Builder|Itinerary whereType($value)
 * @method static Builder|Itinerary whereUpdatedAt($value)
 */
class Itinerary extends Model
{
    use LogsActivity;

    protected $guarded = ['id'];

    protected static $logName = 'itinerary';

    protected static $logOnlyDirty = true;

    protected static $logUnguarded = true;

    /*
     * Flights for this Itinerary
     */
    public function flights(){
        return $this->hasMany(Flight::class);
    }

    /*
     * Reservations that have this Itinerary
     */
    public function reservations(){
        return $this->hasMany(Reservation::class);
    }

    public function airline(){
         return $this->belongsTo(Airline::class);
    }
}
