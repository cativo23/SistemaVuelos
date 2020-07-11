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
 * @property string $TOTAL_PRICE
 * @property string $PAID
 * @property int $RESERVATION_ID
 * @property-read Collection|Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Reservation $reservation
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
        return $this->belongsTo(Reservation::class);
    }
}
