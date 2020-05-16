<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Seat
 *
 * @property int $ID
 * @property string|null $CREATED_AT
 * @property string|null $UPDATED_AT
 * @property string $CLASS
 * @property string $STATUS
 * @property string $CODE
 * @property int $AIRPLANE_ID
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Seat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Seat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Seat query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Seat whereAIRPLANEID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Seat whereCLASS($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Seat whereCODE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Seat whereCREATEDAT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Seat whereID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Seat whereSTATUS($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Seat whereUPDATEDAT($value)
 * @mixin \Eloquent
 */
class Seat extends Model
{
    protected $guarded = ['id'];

    /*
     * Airplane to which this Seat belongs
     */
    public function airplane(){
        return $this->belongsTo('App\Airplane');
    }
}
