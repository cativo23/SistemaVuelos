<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Airplane
 *
 * @property int $ID
 * @property string|null $CREATED_AT
 * @property string|null $UPDATED_AT
 * @property string $TYPE
 * @property string $MANUFACTURER
 * @property int $SEAT_CAPACITY
 * @property string $MODEL
 * @property int $AIRLINE_ID
 * @method static Builder|Airplane newModelQuery()
 * @method static Builder|Airplane newQuery()
 * @method static Builder|Airplane query()
 * @method static Builder|Airplane whereAIRLINEID($value)
 * @method static Builder|Airplane whereCREATEDAT($value)
 * @method static Builder|Airplane whereID($value)
 * @method static Builder|Airplane whereMANUFACTURER($value)
 * @method static Builder|Airplane whereMODEL($value)
 * @method static Builder|Airplane whereSEATCAPACITY($value)
 * @method static Builder|Airplane whereTYPE($value)
 * @method static Builder|Airplane whereUPDATEDAT($value)
 * @mixin Eloquent
 */
class Airplane extends Model
{
    protected $guarded = ['id'];

    /**
     * Airline to which this plane belongs
     */
    public function airline(){
        return $this->belongsTo('App\Airline');
    }

    /**
     *  Flight in which this plane is used
     */
    public function flight(){
        return $this->hasOne('App\Flight');
    }

}
