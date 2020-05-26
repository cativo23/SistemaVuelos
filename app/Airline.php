<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

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
    protected $guarded = ['id'];

    /**
     * Destinations that this airline serves flights to
     */
    public function destinations(){
        $this->belongsToMany('App\Destination');
    }

    /**
     * Airplanes that this airline has
     */
    public function airplanes(){
        return $this->hasMany(Airplane::class);
    }

    public function itineraries(){
        return $this->hasMany('App\Itinerary');
    }
}
