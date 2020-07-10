<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Backup
 *
 * @property int $ID
 * @property string $NAME
 * @property string $STATUS
 * @property string $CREATED_AT_AWS
 * @property string|null $CREATED_AT
 * @property string|null $UPDATED_AT
 * @property-read Collection|Activity[] $activities
 * @property-read int|null $activities_count
 * @method static Builder|Backup newModelQuery()
 * @method static Builder|Backup newQuery()
 * @method static Builder|Backup query()
 * @method static Builder|Backup whereCREATEDAT($value)
 * @method static Builder|Backup whereCREATEDATAWS($value)
 * @method static Builder|Backup whereID($value)
 * @method static Builder|Backup whereNAME($value)
 * @method static Builder|Backup whereSTATUS($value)
 * @method static Builder|Backup whereUPDATEDAT($value)
 * @mixin Eloquent
 */
class Backup extends Model
{
    Use LogsActivity;

    protected $guarded = ['id'];

    protected static $logName = 'backup';

    protected static $logOnlyDirty = true;

    protected static $logUnguarded = true;
}
