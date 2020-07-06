<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\clientNatural
 *
 * @property int $ID
 * @property string|null $CREATED_AT
 * @property string|null $UPDATED_AT
 * @property string $DIRECTION
 * @property string $DOCUMENT_TYP
 * @property string $DOCUMENT_NUM
 * @property string $BIRTHDAY
 * @property string $GENDER
 * @property string $MARITAL_STATUS
 * @method static Builder|ClientNatural newModelQuery()
 * @method static Builder|ClientNatural newQuery()
 * @method static Builder|ClientNatural query()
 * @method static Builder|ClientNatural whereBIRTHDAY($value)
 * @method static Builder|ClientNatural whereCREATEDAT($value)
 * @method static Builder|ClientNatural whereDIRECTION($value)
 * @method static Builder|ClientNatural whereDOCUMENTNUM($value)
 * @method static Builder|ClientNatural whereDOCUMENTTYP($value)
 * @method static Builder|ClientNatural whereGENDER($value)
 * @method static Builder|ClientNatural whereID($value)
 * @method static Builder|ClientNatural whereMARITALSTATUS($value)
 * @method static Builder|ClientNatural whereUPDATEDAT($value)
 * @mixin \Eloquent
 * @property-read \App\Client $client
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $direction
 * @property string $document_typ
 * @property string $document_num
 * @property string $birthday
 * @property string $gender
 * @property string $marital_status
 * @method static Builder|ClientNatural whereBirthday($value)
 * @method static Builder|ClientNatural whereCreatedAt($value)
 * @method static Builder|ClientNatural whereDirection($value)
 * @method static Builder|ClientNatural whereDocumentNum($value)
 * @method static Builder|ClientNatural whereDocumentTyp($value)
 * @method static Builder|ClientNatural whereGender($value)
 * @method static Builder|ClientNatural whereId($value)
 * @method static Builder|ClientNatural whereMaritalStatus($value)
 * @method static Builder|ClientNatural whereUpdatedAt($value)
 */
class ClientNatural extends Model
{
    use LogsActivity;

    protected $guarded = ['id'];

    protected static $logName = 'client_natural';

    protected static $logOnlyDirty = true;

    protected static $logUnguarded = true;


    /*
     * Client Information for this Natural Client
     */
    public function client(){
        return $this->belongsTo(Client::class);
    }
}
