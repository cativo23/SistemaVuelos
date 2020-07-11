<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

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
 * @property-read Collection|Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read Collection|\App\Terminal[] $gateways
 * @property-read int|null $gateways_count
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
    use LogsActivity;

    protected $guarded = ['id'];

    protected static $logName = 'airport';

    protected static $logOnlyDirty = true;

    protected static $logUnguarded = true;


    /*
     * Gateways from this Airport
     */
    public function gateways(){
        return $this->hasMany(Terminal::class);
    }
}
