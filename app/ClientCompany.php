<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\ClientCompany
 *
 * @property int $ID
 * @property string|null $CREATED_AT
 * @property string|null $UPDATED_AT
 * @property string $COMPANY_NAME
 * @property string $CONTACT_NAME
 * @property string $NIC
 * @property string $NIT
 * @method static Builder|ClientCompany newModelQuery()
 * @method static Builder|ClientCompany newQuery()
 * @method static Builder|ClientCompany query()
 * @method static Builder|ClientCompany whereCOMPANYNAME($value)
 * @method static Builder|ClientCompany whereCONTACTNAME($value)
 * @method static Builder|ClientCompany whereCREATEDAT($value)
 * @method static Builder|ClientCompany whereID($value)
 * @method static Builder|ClientCompany whereNIC($value)
 * @method static Builder|ClientCompany whereNIT($value)
 * @method static Builder|ClientCompany whereUPDATEDAT($value)
 * @mixin Eloquent
 * @property-read Client $client
 * @property-read Collection|Activity[] $activities
 * @property-read int|null $activities_count
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $company_name
 * @property string $contact_name
 * @property string $nic
 * @property string $nit
 * @method static Builder|ClientCompany whereCompanyName($value)
 * @method static Builder|ClientCompany whereContactName($value)
 * @method static Builder|ClientCompany whereCreatedAt($value)
 * @method static Builder|ClientCompany whereId($value)
 * @method static Builder|ClientCompany whereNic($value)
 * @method static Builder|ClientCompany whereNit($value)
 * @method static Builder|ClientCompany whereUpdatedAt($value)
 */
class ClientCompany extends Model
{
    use LogsActivity;

    protected $guarded = ['id'];

    protected static $logName = 'client_company';

    protected static $logOnlyDirty = true;

    protected static $logUnguarded = true;

    /*
     * Client Information for this Company Client
     */
    public function client(){
        return $this->belongsTo(Client::class);
    }
}
