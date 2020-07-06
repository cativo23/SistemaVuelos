<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Restores
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @method static \Illuminate\Database\Eloquent\Builder|Restores newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Restores newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Restores query()
 * @mixin \Eloquent
 */
class Restores extends Model
{
    Use LogsActivity;

    protected $guarded = ['id'];

    protected static $logName = 'restores';

    protected static $logOnlyDirty = true;

    protected static $logUnguarded = true;
}
