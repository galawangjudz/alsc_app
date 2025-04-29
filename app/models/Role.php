<?php

class Role extends Model
{
    protected $table = 'roles';

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_role');
    }
}
