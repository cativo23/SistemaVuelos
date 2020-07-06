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
 * @method static Builder|Client newModelQuery()
 * @method static Builder|Client newQuery()
 * @method static Builder|Client query()
 * @method static Builder|Client whereCREATEDAT($value)
 * @method static Builder|Client whereFIRSTNAME($value)
 * @method static Builder|Client whereFIRSTSURNAME($value)
 * @method static Builder|Client whereFREQUENTCUSTOMERCARNUM($value)
 * @method static Builder|Client whereID($value)
 * @method static Builder|Client whereLANDLINEPHONE($value)
 * @method static Builder|Client whereMILES($value)
 * @method static Builder|Client whereMOBILEPHONE($value)
 * @method static Builder|Client whereSECONDNAME($value)
 * @method static Builder|Client whereSECONDSURNAME($value)
 * @method static Builder|Client whereUPDATEDAT($value)
 * @mixin Eloquent
 * @property-read ClientCompany|null $company
 * @property-read ClientNatural|null $natural
 * @property-read Collection|Activity[] $activities
 * @property-read int|null $activities_count
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $first_name
 * @property string $second_name
 * @property string $first_surname
 * @property string $second_surname
 * @property string $mobile_phone
 * @property string $landline_phone
 * @property int $miles
 * @property string $frequent_customer_num
 * @property int $frequent_customer_car_num
 * @method static Builder|Client whereCreatedAt($value)
 * @method static Builder|Client whereFirstName($value)
 * @method static Builder|Client whereFirstSurname($value)
 * @method static Builder|Client whereFrequentCustomerCarNum($value)
 * @method static Builder|Client whereFrequentCustomerNum($value)
 * @method static Builder|Client whereId($value)
 * @method static Builder|Client whereLandlinePhone($value)
 * @method static Builder|Client whereMiles($value)
 * @method static Builder|Client whereMobilePhone($value)
 * @method static Builder|Client whereSecondName($value)
 * @method static Builder|Client whereSecondSurname($value)
 * @method static Builder|Client whereUpdatedAt($value)
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
        return $this->hasOne(ClientCompany::class);
    }

    /*
     * If this client is from a company this will show the extra info
     */
    public function natural(){
        return $this->hasOne(ClientNatural::class);
    }

    /*
     * This Client's Itineraries
     */
    public function itineraries(){
        $this->hasMany(Itinerary::class);
    }
}
