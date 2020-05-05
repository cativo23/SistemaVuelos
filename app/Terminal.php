<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Terminal
 *
 * @property int $ID
 * @property string|null $CREATED_AT
 * @property string|null $UPDATED_AT
 * @property string $CODE
 * @property int $AIRPORT_ID
 * @method static Builder|Terminal newModelQuery()
 * @method static Builder|Terminal newQuery()
 * @method static Builder|Terminal query()
 * @method static Builder|Terminal whereAIRPORTID($value)
 * @method static Builder|Terminal whereCODE($value)
 * @method static Builder|Terminal whereCREATEDAT($value)
 * @method static Builder|Terminal whereID($value)
 * @method static Builder|Terminal whereUPDATEDAT($value)
 * @mixin \Eloquent
 */
class Terminal extends Model
{
    protected $guarded = ['id'];

    /*
     * Airplane to which this Seat belongs
     */

    public function airport()
    {
        return $this->belongsTo('App\Airport', 'airport_id');
    }
}
