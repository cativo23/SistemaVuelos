<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Ticket
 *
 * @property int $ID
 * @property string|null $CREATED_AT
 * @property string|null $UPDATED_AT
 * @property string $ORIGIN
 * @property string $DESTINATION
 * @property string $DATE_BOOKING
 * @property string $DATE_CANCELLATION
 * @property string $SEAT_NUM
 * @property string $CLASS_SEAT
 * @property int $PASSENGER_ID
 * @method static Builder|Ticket newModelQuery()
 * @method static Builder|Ticket newQuery()
 * @method static Builder|Ticket query()
 * @method static Builder|Ticket whereCLASSSEAT($value)
 * @method static Builder|Ticket whereCREATEDAT($value)
 * @method static Builder|Ticket whereDATEBOOKING($value)
 * @method static Builder|Ticket whereDATECANCELLATION($value)
 * @method static Builder|Ticket whereDESTINATION($value)
 * @method static Builder|Ticket whereID($value)
 * @method static Builder|Ticket whereORIGIN($value)
 * @method static Builder|Ticket wherePASSENGERID($value)
 * @method static Builder|Ticket whereSEATNUM($value)
 * @method static Builder|Ticket whereUPDATEDAT($value)
 * @mixin \Eloquent
 * @property-read Collection|Activity[] $activities
 * @property-read int|null $activities_count
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $origin
 * @property string $destination
 * @property string $date_booking
 * @property string $date_cancellation
 * @property string $seat_num
 * @property string $class_seat
 * @property int $passenger_id
 * @method static Builder|Ticket whereClassSeat($value)
 * @method static Builder|Ticket whereCreatedAt($value)
 * @method static Builder|Ticket whereDateBooking($value)
 * @method static Builder|Ticket whereDateCancellation($value)
 * @method static Builder|Ticket whereDestination($value)
 * @method static Builder|Ticket whereId($value)
 * @method static Builder|Ticket whereOrigin($value)
 * @method static Builder|Ticket wherePassengerId($value)
 * @method static Builder|Ticket whereSeatNum($value)
 * @method static Builder|Ticket whereUpdatedAt($value)
 */
class Ticket extends Model
{
    use LogsActivity;

    protected $guarded = ['id'];

    protected static $logName = 'ticket';

    protected static $logOnlyDirty = true;

    protected static $logUnguarded = true;

    //
}
