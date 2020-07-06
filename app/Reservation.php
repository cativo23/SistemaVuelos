<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Reservation
 *
 * @property int $ID
 * @property string|null $CREATED_AT
 * @property string|null $UPDATED_AT
 * @property int $NUMBER
 * @property int $SUITCASE_NUM
 * @property string $PAYED
 * @property int $CLIENT_ID
 * @property int $ITINERARY_ID
 * @method static Builder|Reservation newModelQuery()
 * @method static Builder|Reservation newQuery()
 * @method static Builder|Reservation query()
 * @method static Builder|Reservation whereCLIENTID($value)
 * @method static Builder|Reservation whereCREATEDAT($value)
 * @method static Builder|Reservation whereID($value)
 * @method static Builder|Reservation whereITINERARYID($value)
 * @method static Builder|Reservation whereNUMBER($value)
 * @method static Builder|Reservation wherePAYED($value)
 * @method static Builder|Reservation whereSUITCASENUM($value)
 * @method static Builder|Reservation whereUPDATEDAT($value)
 * @mixin Eloquent
 * @property int $PASSENGERS
 * @property-read Client $client
 * @property-read Collection|Itinerary[] $itineraries
 * @property-read int|null $itineraries_count
 * @method static Builder|Reservation wherePASSENGERS($value)
 * @property-read Collection|Activity[] $activities
 * @property-read int|null $activities_count
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $number
 * @property int $suitcase_num
 * @property int $payed
 * @property int $passengers
 * @property int $client_id
 * @property int $itinerary_id
 * @method static Builder|Reservation whereClientId($value)
 * @method static Builder|Reservation whereCreatedAt($value)
 * @method static Builder|Reservation whereId($value)
 * @method static Builder|Reservation whereItineraryId($value)
 * @method static Builder|Reservation whereNumber($value)
 * @method static Builder|Reservation wherePassengers($value)
 * @method static Builder|Reservation wherePayed($value)
 * @method static Builder|Reservation whereSuitcaseNum($value)
 * @method static Builder|Reservation whereUpdatedAt($value)
 */
class Reservation extends Model
{
    use LogsActivity;

    protected $guarded = ['id'];

    protected static $logName = 'reservation';

    protected static $logOnlyDirty = true;

    protected static $logUnguarded = true;

    /*
     * Itineraries for this reservation
     */
    public function itineraries(){
        return $this->hasMany(Itinerary::class);
    }

    /*
     * Client of this Reservation
     */
    public function client(){
        return $this->belongsTo(Client::class);
    }
}
