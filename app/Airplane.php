<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

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
 * @property-read Collection|Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Airline $airline
 * @property-read \App\Flight|null $flight
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
    use LogsActivity;

    protected $guarded = ['id'];

    protected static $logName = 'airplane';

    protected static $logOnlyDirty = true;

    protected static $logUnguarded = true;


    /**
     * Airline to which this plane belongs
     */
    public function airline(){
        return $this->belongsTo(Airline::class);
    }

    /**
     *  Flight in which this plane is used
     */
    public function flight(){
        return $this->hasOne(Flight::class);
    }

    public function seats(){
        return $this->hasMany(Seat::class);
    }

}
