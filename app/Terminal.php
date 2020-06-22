<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Terminal
 *
 * @property int $ID
 * @property string|null $CREATED_AT
 * @property string|null $UPDATED_AT
 * @property string $CODE
 * @property int $AIRPORT_ID
 * @method static Builder|Terminal newModelQuery()
 * @method static Builder|Terminal newQuery()
 * @method static Builder|Terminal query()
 * @method static Builder|Terminal whereAIRPORTID($value)
 * @method static Builder|Terminal whereCODE($value)
 * @method static Builder|Terminal whereCREATEDAT($value)
 * @method static Builder|Terminal whereID($value)
 * @method static Builder|Terminal whereUPDATEDAT($value)
 * @mixin \Eloquent
 * @property-read Airport $airport
 * @property-read Collection|Activity[] $activities
 * @property-read int|null $activities_count
 */
class Terminal extends Model
{
    use LogsActivity;

    protected $guarded = ['id'];

    protected static $logName = 'terminal';

    protected static $logOnlyDirty = true;

    protected static $logUnguarded = true;

    /*
     * Airplane to which this Seat belongs
     */

    public function airport()
    {
        return $this->belongsTo(Airport::class, 'airport_id');
    }
}
