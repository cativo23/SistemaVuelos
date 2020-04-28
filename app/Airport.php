<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Airport
 *
 * @property int $ID
 * @property string|null $CREATED_AT
 * @property string|null $UPDATED_AT
 * @property string $NAME
 * @property string $TELEPHONE
 * @property string $REPRESENTATIVE
 * @property int $NUM_GATEWAYS
 * @property string $CITY
 * @property string $COUNTRY
 * @property string $CODE
 * @method static Builder|Airport newModelQuery()
 * @method static Builder|Airport newQuery()
 * @method static Builder|Airport query()
 * @method static Builder|Airport whereCITY($value)
 * @method static Builder|Airport whereCODE($value)
 * @method static Builder|Airport whereCOUNTRY($value)
 * @method static Builder|Airport whereCREATEDAT($value)
 * @method static Builder|Airport whereID($value)
 * @method static Builder|Airport whereNAME($value)
 * @method static Builder|Airport whereNUMGATEWAYS($value)
 * @method static Builder|Airport whereREPRESENTATIVE($value)
 * @method static Builder|Airport whereTELEPHONE($value)
 * @method static Builder|Airport whereUPDATEDAT($value)
 * @mixin Eloquent
 */
class Airport extends Model
{
    protected $guarded = ['id'];

    /*
     * Gateways from this Airport
     */
    public function gateways(){
        return $this->hasMany('App\Terminal');
    }
}
