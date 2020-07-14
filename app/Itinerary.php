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
 * @property string $TOTAL_DURATION
 * @property string $DESTINATION
 * @property string $ORIGIN
 * @property string $TYPE
 * @property int $AIRLINE_ID
 * @property-read Collection|Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read Airline $airline
 * @property-read Collection|Flight[] $flights
 * @property-read int|null $flights_count
 * @property-read Collection|Reservation[] $reservations
 * @property-read int|null $reservations_count
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

    public function hasSeats(array $class, int $passengers = 0){
        $flights_with_seats = 0;
        $flights = $this->flights;
        foreach ($flights as $flight){
            if ($flight->hasSeats($class, $passengers)){
                $flights_with_seats =+1;
            }
        }
        return $flights_with_seats > 0;
    }
}
