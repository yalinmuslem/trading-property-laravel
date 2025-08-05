<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show()
    {
        $userModel = new UserModel();
        return response()->json([
            'user' => $userModel->getAllUsers(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        if ($request->errors()->any()) {
            return response()->json(['errors' => $request->errors()], 422);
        }

        $userModel = new UserModel();
        if ($userModel->getUserByName($request->name)) {
            return response()->json(['error' => 'User already exists'], 409);
        }

        $user = $userModel->create($request->only('name'));
        return response()->json($user, 201);
    }
}
