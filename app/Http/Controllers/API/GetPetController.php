<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\pet;

class GetPetController extends Controller
{
    public function getPet($id)
    {
        $pet = Pet::all()->where('user_id', $id);

        return response()->json($pet);
    }
}