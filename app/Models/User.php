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

    public function memberships()
    {
        return $this->hasMany(Membership::class, 'user_id');
    }

    public function userAgents()
    {
        return $this->hasMany(UserAgent::class, 'user_id');
    }

    public function otpCodes()
    {
        return $this->hasMany(OtpCodes::class, 'user_id');
    }

    public function moderators()
    {
        return $this->hasMany(Moderator::class, 'user_id');
    }

    public function applicationFeedbacks()
    {
        return $this->hasMany(ApplicationFeedback::class, 'user_id');
    }

    // public function activityLogs()
    // {
    //     return $this->hasMany(ActivityLog::class, 'user_id');
    // }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'user_id');
    }

    public function reports()
    {
        return $this->hasMany(Report::class, 'user_id');
    }

    public function performanceEvaluations()
    {
        return $this->hasMany(PerformanceEvaluation::class, 'user_id');
    }
}
