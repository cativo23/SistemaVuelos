<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Client
 *
 * @property int $ID
 * @property string|null $CREATED_AT
 * @property string|null $UPDATED_AT
 * @property string $FIRST_NAME
 * @property string $SECOND_NAME
 * @property string $FIRST_SURNAME
 * @property string $SECOND_SURNAME
 * @property string $MOBILE_PHONE
 * @property string $LANDLINE_PHONE
 * @property int $MILES
 * @property int $FREQUENT_CUSTOMER_CAR_NUM
 * @property string $FREQUENT_CUSTOMER_NUM
 * @property-read Collection|Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\ClientCompany|null $company
 * @property-read \App\ClientNatural|null $natural
 * @method static Builder|Client newModelQuery()
 * @method static Builder|Client newQuery()
 * @method static Builder|Client query()
 * @method static Builder|Client whereCREATEDAT($value)
 * @method static Builder|Client whereFIRSTNAME($value)
 * @method static Builder|Client whereFIRSTSURNAME($value)
 * @method static Builder|Client whereFREQUENTCUSTOMERCARNUM($value)
 * @method static Builder|Client whereFREQUENTCUSTOMERNUM($value)
 * @method static Builder|Client whereID($value)
 * @method static Builder|Client whereLANDLINEPHONE($value)
 * @method static Builder|Client whereMILES($value)
 * @method static Builder|Client whereMOBILEPHONE($value)
 * @method static Builder|Client whereSECONDNAME($value)
 * @method static Builder|Client whereSECONDSURNAME($value)
 * @method static Builder|Client whereUPDATEDAT($value)
 * @mixin Eloquent
 */
class Client extends Model
{
    use LogsActivity;

    protected $guarded = ['id'];

    protected static $logName = 'client';

    protected static $logOnlyDirty = true;

    protected static $logUnguarded = true;


    /*
     * If this client is from a company this will show the extra info
     */
    public function company(){
        return $this->hasOne(ClientCompany::class, 'id', 'id');
    }

    /*
     * If this client is from a company this will show the extra info
     */
    public function natural(){
        return $this->hasOne(ClientNatural::class, 'id', 'id');
    }

    /*
     * This Client's Itineraries
     */
    public function itineraries(){
        $this->hasMany(Itinerary::class);
    }

    public function to_string(){
        return 'Cliente ' .$this->first_name.' '.$this->first_surname;
    }
}
