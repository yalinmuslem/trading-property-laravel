<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'property';
    protected $fillable = ['user_id', 'price', 'name'];

    public function newProperty(array $data)
    {
        return $this->insert($data);
    }

    public function getAllProperties()
    {
        return $this->all();
    }

    public function getCombinePropertyWithUsers()
    {
        return $this->join('users_prop', 'property.user_id', '=', 'users_prop.id')
            ->select('property.*', 'users_prop.name as user_name')
            ->get();
    }

}
