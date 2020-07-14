<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;


/**
 * App\Restores
 *
 * @property int $ID
 * @property string $DB_INSTANCE_NAME
 * @property string $DB_STATUS
 * @property string|null $CREATED_AT
 * @property string|null $UPDATED_AT
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @method static \Illuminate\Database\Eloquent\Builder|Restores newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Restores newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Restores query()
 * @method static \Illuminate\Database\Eloquent\Builder|Restores whereCREATEDAT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restores whereDBINSTANCENAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restores whereDBSTATUS($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restores whereID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restores whereUPDATEDAT($value)
 * @mixin \Eloquent
 */
class Restores extends Model
{
    Use LogsActivity;

    protected $guarded = ['id'];

    protected static $logName = 'restores';

    protected static $logOnlyDirty = true;

    protected static $logUnguarded = true;

    public function to_string(){
        return 'Restore ' .$this->DB_instance_name;
    }
}
