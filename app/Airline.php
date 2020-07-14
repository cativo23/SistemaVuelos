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
 * App\Airline
 *
 * @property int $ID
 * @property string|null $CREATED_AT
 * @property string|null $UPDATED_AT
 * @property string $CODE
 * @property string $EMAIL
 * @property string $OFFICIAL_NAME
 * @property string $SHORT_NAME
 * @property string $ORIGIN_COUNTRY
 * @property string $REPRESENTATIVE
 * @property string|null $WEB_PAGE
 * @property string|null $FACEBOOK
 * @property string|null $INSTAGRAM
 * @property string|null $TWITTER
 * @property string|null $WHATSAPP
 * @property-read Collection|Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read Collection|\App\Airplane[] $airplanes
 * @property-read int|null $airplanes_count
 * @property-read Collection|\App\Itinerary[] $itineraries
 * @property-read int|null $itineraries_count
 * @method static Builder|Airline newModelQuery()
 * @method static Builder|Airline newQuery()
 * @method static Builder|Airline query()
 * @method static Builder|Airline whereCODE($value)
 * @method static Builder|Airline whereCREATEDAT($value)
 * @method static Builder|Airline whereEMAIL($value)
 * @method static Builder|Airline whereFACEBOOK($value)
 * @method static Builder|Airline whereID($value)
 * @method static Builder|Airline whereINSTAGRAM($value)
 * @method static Builder|Airline whereOFFICIALNAME($value)
 * @method static Builder|Airline whereORIGINCOUNTRY($value)
 * @method static Builder|Airline whereREPRESENTATIVE($value)
 * @method static Builder|Airline whereSHORTNAME($value)
 * @method static Builder|Airline whereTWITTER($value)
 * @method static Builder|Airline whereUPDATEDAT($value)
 * @method static Builder|Airline whereWEBPAGE($value)
 * @method static Builder|Airline whereWHATSAPP($value)
 * @mixin Eloquent
 */
class Airline extends Model
{

    use LogsActivity;

    protected $guarded = ['id'];

    protected static $logName = 'airline';

    protected static $logOnlyDirty = true;

    protected static $logUnguarded = true;

    /**
     * Destinations that this airline serves flights to
     */
    public function destinations(){
        $this->belongsToMany(Destination::class);
    }

    /**
     * Airplanes that this airline has
     */
    public function airplanes(){
        return $this->hasMany(Airplane::class);
    }

    public function itineraries(){
        return $this->hasMany(Itinerary::class);
    }

    public function to_string(){
        return 'Aerolinea '.$this->official_name;
    }
}
