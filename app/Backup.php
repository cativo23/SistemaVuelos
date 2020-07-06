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
 * @property int $id
 * @property string $name
 * @property string $status
 * @property Carbon $created_at_aws
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Activity[] $activities
 * @property-read int|null $activities_count
 * @method static Builder|Backup newModelQuery()
 * @method static Builder|Backup newQuery()
 * @method static Builder|Backup query()
 * @method static Builder|Backup whereCreatedAt($value)
 * @method static Builder|Backup whereCreatedAtAws($value)
 * @method static Builder|Backup whereId($value)
 * @method static Builder|Backup whereName($value)
 * @method static Builder|Backup whereStatus($value)
 * @method static Builder|Backup whereUpdatedAt($value)
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
