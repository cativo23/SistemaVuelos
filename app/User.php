<?php

namespace App;

use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Models\Ban;
use Cog\Laravel\Ban\Traits\Bannable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Silber\Bouncer\Database\Ability;
use Silber\Bouncer\Database\HasRolesAndAbilities;
use Silber\Bouncer\Database\Role;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\User
 *
 * @property int $ID
 * @property string $NAME
 * @property string $EMAIL
 * @property string|null $EMAIL_VERIFIED_AT
 * @property string $PASSWORD
 * @property string|null $REMEMBER_TOKEN
 * @property string|null $CREATED_AT
 * @property string|null $UPDATED_AT
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereCREATEDAT($value)
 * @method static Builder|User whereEMAIL($value)
 * @method static Builder|User whereEMAILVERIFIEDAT($value)
 * @method static Builder|User whereID($value)
 * @method static Builder|User whereNAME($value)
 * @method static Builder|User wherePASSWORD($value)
 * @method static Builder|User whereREMEMBERTOKEN($value)
 * @method static Builder|User whereUPDATEDAT($value)
 * @mixin \Eloquent
 * @property string|null $USERNAME
 * @property string|null $BANNED_AT
 * @property-read Collection|Ability[] $abilities
 * @property-read int|null $abilities_count
 * @property-read Collection|Ban[] $bans
 * @property-read int|null $bans_count
 * @property-read Collection|Role[] $roles
 * @property-read int|null $roles_count
 * @method static Builder|User whereBANNEDAT($value)
 * @method static Builder|User whereIs($role)
 * @method static Builder|User whereIsAll($role)
 * @method static Builder|User whereIsNot($role)
 * @method static Builder|User whereUSERNAME($value)
 * @property-read Collection|Activity[] $activities
 * @property-read int|null $activities_count
 * @property int $id
 * @property string $name
 * @property string|null $username
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $banned_at
 * @property-read Collection|Activity[] $actions
 * @property-read int|null $actions_count
 * @method static Builder|User whereBannedAt($value)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @method static Builder|User whereUsername($value)
 */
class User extends Authenticatable implements MustVerifyEmail, BannableContract
{
    use Notifiable;
    use HasRolesAndAbilities;
    use Bannable;
    use LogsActivity;
    use CausesActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username'
    ];

    protected static $logName = 'user';

    protected static $logOnlyDirty = true;

    protected static $logFillable = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
