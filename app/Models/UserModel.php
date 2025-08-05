<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $fillable = ['name'];
    protected $table = 'users_prop';

    public function getAllUsers($request)
    {
        $per_page = $request->input('page_size', 10);
        $offset = $request->input('page_num', 1) - 1;

        return $this->select('id', 'name')->offset($offset)->limit($per_page)->get();
    }

    public function create(array $data)
    {
        return $this->insert($data);
    }

    public function getUserByName($name)
    {
        return $this->where('name', $name)->first();
    }

    protected static function factory()
    {
        return \Database\Factories\UserPropFactory::new();
    }
}
