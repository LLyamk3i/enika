<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'group_id', 'status', 'accetpted_at', 'rejected_at'];

    /**
 * Get the user that owns the membership.
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

    /**
 * Get the group that the membership belongs to.
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 *
 * @param string $related The related model class name.
 * @param string $foreignKey The foreign key of the relationship.
 *
 * @throws \Exception If the related model class does not exist.
 */
public function group()
{
    return $this->belongsTo(Groupe::class, 'group_id');
}
}
