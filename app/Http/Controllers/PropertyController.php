<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'user_id' => 'required|integer',
            'price' => 'required|numeric|min:0',
        ]);

        $propertyModel = new Property();
        $property = $propertyModel->newProperty($request->only('name', 'type', 'user_id', 'price'));

        return response()->json($property, 201);
    }

    public function show()
    {
        $propertyModel = new Property();
        return response()->json([
            'properties' => $propertyModel->getAllProperties(),
        ]);
    }

    public function getCombinePropertyWithUsers()
    {
        $propertyModel = new Property();
        return response()->json([
            'properties' => $propertyModel->getCombinePropertyWithUsers(),
        ]);
    }
}
