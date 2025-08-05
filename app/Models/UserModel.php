<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $fillable = ['name'];
    protected $table = 'users_prop';

    public function getAllUsers()
    {
        return $this->select('id', 'name')->get();
    }

    public function create(array $data)
    {
        return $this->insert($data);
    }

    public function getUserByName($name)
    {
        return $this->where('name', $name)->first();
    }
}
