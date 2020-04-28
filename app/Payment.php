<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

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
 */
class Payment extends Model
{

    protected $guarded = ['id'];

    /*
     * Reservation for this Payment
     */
    public function reservation(){
        $this->belongsTo('App\Reservation');
    }
}
