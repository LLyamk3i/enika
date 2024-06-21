<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function groupes()
    {
        return $this->hasMany(Groupe::class, 'user_id');
    }

    /**
 * Get all memberships related to the user.
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 *
 * @throws \Exception
 *
 * @param  string  $related  The related model class name.
 * @param  string  $foreignKey  The foreign key of the relationship.
 * @param  string  $localKey  The local key of the relationship.
 */
public function memberships()
{
    return $this->hasMany(Membership::class, 'user_id');
}

    /**
 * Get all user agents related to the user.
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 *
 * @throws \Exception
 *
 * @param  string  $related  The related model class name.
 * @param  string  $foreignKey  The foreign key of the relationship.
 * @param  string  $localKey  The local key of the relationship.
 */
public function userAgents()
{
    return $this->hasMany(UserAgent::class, 'user_id');
}

    /**
 * Get all OTP codes related to the user.
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 *
 * @throws \Exception
 *
 * @param  string  $related  The related model class name.
 * @param  string  $foreignKey  The foreign key of the relationship.
 * @param  string  $localKey  The local key of the relationship.
 */
public function otpCodes()
{
    return $this->hasMany(OtpCodes::class, 'user_id');
}

    /**
 * Get all moderators related to the user.
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 *
 * @throws \Exception
 */
public function moderators()
{
    return $this->hasMany(Moderator::class, 'user_id');
}

    /**
 * Get all application feedbacks related to the user.
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 *
 * @throws \Exception
 */
public function applicationFeedbacks()
{
    return $this->hasMany(ApplicationFeedback::class, 'user_id');
}

    // public function activityLogs()
    // {
    //     return $this->hasMany(ActivityLog::class, 'user_id');
    // }

    /**
 * Get all notifications related to the user.
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 *
 * @throws \Exception
 */
public function notifications()
{
    return $this->hasMany(Notification::class, 'user_id');
}

    /**
 * Get all reports related to the user.
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 *
 * @throws \Exception
 */
public function reports()
{
    return $this->hasMany(Report::class, 'user_id');
}

    /**
 * Get all performance evaluations related to the user.
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 *
 * @throws \Exception
 */
public function performanceEvaluations()
{
    return $this->hasMany(PerformanceEvaluation::class, 'user_id');
}
}
