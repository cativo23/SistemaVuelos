<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

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
 * @property-read Collection|Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Airplane $airplane
 * @method static Builder|Seat newModelQuery()
 * @method static Builder|Seat newQuery()
 * @method static Builder|Seat query()
 * @method static Builder|Seat whereAIRPLANEID($value)
 * @method static Builder|Seat whereCLASS($value)
 * @method static Builder|Seat whereCODE($value)
 * @method static Builder|Seat whereCREATEDAT($value)
 * @method static Builder|Seat whereID($value)
 * @method static Builder|Seat whereSTATUS($value)
 * @method static Builder|Seat whereUPDATEDAT($value)
 * @mixin Eloquent
 */
class Seat extends Model
{
    use LogsActivity;

    protected $guarded = ['id'];

    protected static $logName = 'seat';

    protected static $logOnlyDirty = true;

    protected static $logUnguarded = true;

    /*
     * Airplane to which this Seat belongs
     */
    public function airplane(){
        return $this->belongsTo(Airplane::class);
    }
}
