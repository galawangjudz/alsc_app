<?php
require_once __DIR__ . '/../core/Model.php';

class User extends Model
{
    protected $table = 'users';

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
