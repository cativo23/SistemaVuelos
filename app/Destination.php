<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;


/**
 * App\Destination
 *
 * @property int $ID
 * @property string|null $CREATED_AT
 * @property string|null $UPDATED_AT
 * @property string $CITY
 * @property string $STATE
 * @property string $COUNTRY
 * @property string $CONTINENT
 * @property string $CODE
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Airline $airlines
 * @method static Builder|Destination newModelQuery()
 * @method static Builder|Destination newQuery()
 * @method static Builder|Destination query()
 * @method static Builder|Destination whereCITY($value)
 * @method static Builder|Destination whereCODE($value)
 * @method static Builder|Destination whereCONTINENT($value)
 * @method static Builder|Destination whereCOUNTRY($value)
 * @method static Builder|Destination whereCREATEDAT($value)
 * @method static Builder|Destination whereID($value)
 * @method static Builder|Destination whereSTATE($value)
 * @method static Builder|Destination whereUPDATEDAT($value)
 * @mixin Eloquent
 */
class Destination extends Model
{
    use LogsActivity;

    protected $guarded = ['id'];

    protected static $logName = 'destination';

    protected static $logOnlyDirty = true;

    protected static $logUnguarded = true;


    /*
     * Airlines traveling to this destination
     */
    public function airlines(){
        return $this->belongsTo(Airline::class);
    }

    public function to_string(){
        return 'Destino ' .$this->city.', '.$this->country;
    }
}
