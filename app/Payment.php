<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Payment
 *
 * @property int $ID
 * @property string|null $CREATED_AT
 * @property string|null $UPDATED_AT
 * @property float $TOTAL_PRICE
 * @property string $PAID
 * @property int $RESERVATION_ID
 * @method static Builder|Payment newModelQuery()
 * @method static Builder|Payment newQuery()
 * @method static Builder|Payment query()
 * @method static Builder|Payment whereCREATEDAT($value)
 * @method static Builder|Payment whereID($value)
 * @method static Builder|Payment wherePAID($value)
 * @method static Builder|Payment whereRESERVATIONID($value)
 * @method static Builder|Payment whereTOTALPRICE($value)
 * @method static Builder|Payment whereUPDATEDAT($value)
 * @mixin Eloquent
 * @property-read Reservation $reservation
 * @property-read Collection|Activity[] $activities
 * @property-read int|null $activities_count
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $total_price
 * @property string $paid
 * @property int $reservation_id
 * @method static Builder|Payment whereCreatedAt($value)
 * @method static Builder|Payment whereId($value)
 * @method static Builder|Payment wherePaid($value)
 * @method static Builder|Payment whereReservationId($value)
 * @method static Builder|Payment whereTotalPrice($value)
 * @method static Builder|Payment whereUpdatedAt($value)
 */
class Payment extends Model
{
    use LogsActivity;

    protected $guarded = ['id'];

    protected static $logName = 'payment';

    protected static $logOnlyDirty = true;

    protected static $logUnguarded = true;

    /*
     * Reservation for this Payment
     */
    public function reservation(){
        return $this->belongsTo('App\Reservation');
    }
}
