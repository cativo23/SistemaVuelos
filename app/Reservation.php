<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

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
 */
class Reservation extends Model
{
    protected $guarded = ['id'];

    /*
     * Itineraries for this reservation
     */
    public function itineraries(){
        $this->hasMany('App\Itinerary');
    }

    /*
     * Client of this Reservation
     */
    public function client(){
        $this->belongsTo('App\Client');
    }
}
