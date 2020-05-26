<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\ClientNatural
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
 */
class ClientNatural extends Model
{
    protected $guarded = ['id'];

    /*
     * Client Information for this Natural Client
     */
    public function client(){
        return $this->belongsTo('App\Client');
    }
}
