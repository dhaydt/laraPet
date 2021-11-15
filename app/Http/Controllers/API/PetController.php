<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PetResource;
use App\Models\pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = pet::latest()->get();

        return response()->json([PetResource::collection($data), 'Programs fetched.']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'breed' => 'required',
            'sex' => 'string|max:255',
            'age' => 'string|max:255',
            'color' => 'string|max:255',
            'face' => 'image:jpeg,png,jpg,gif,svg|max:2048',
            'side' => 'image:jpeg,png,jpg,gif,svg|max:2048',
            'top' => 'image:jpeg,png,jpg,gif,svg|max:2048',
            'behind' => 'image:jpeg,png,jpg,gif,svg|max:2048',
            'barcode' => 'image:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $uploadFolder = 'pet';

        $face_img = $request->file('face');
        $face_path = $face_img->store($uploadFolder, 'public');

        $side_img = $request->file('side');
        $side_path = $side_img->store($uploadFolder, 'public');

        $top_img = $request->file('top');
        $top_path = $top_img->store($uploadFolder, 'public');

        $behind_img = $request->file('behind');
        $behind_path = $behind_img->store($uploadFolder, 'public');

        $barcode_img = $request->file('barcode');
        $barcode_path = $barcode_img->store($uploadFolder, 'public');

        $program = Pet::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'breed' => $request->breed,
            'sex' => $request->sex,
            'age' => $request->age,
            'color' => $request->color,
            'face' => $face_path,
            'side' => $side_path,
            'top' => $top_path,
            'behind' => $behind_path,
            'barcode' => $barcode_path,
        ]);

        return response()->json(['Pet created successfully.', new PetResource($program)]);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $program = Pet::find($id);
        if (is_null($program)) {
            return response()->json('Data not found', 404);
        }

        return response()->json([new PetResource($program)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pet $program)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'breed' => 'required',
            'sex' => 'required|string|max:255',
            'age' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'face' => 'image:jpeg,png,jpg,gif,svg|max:2048',
            'side' => 'image:jpeg,png,jpg,gif,svg|max:2048',
            'top' => 'image:jpeg,png,jpg,gif,svg|max:2048',
            'behind' => 'image:jpeg,png,jpg,gif,svg|max:2048',
            'barcode' => 'image:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $program->name = $request->name;
        $program->breed = $request->breed;
        $program->save();

        return response()->json(['Program updated successfully.', new PetResource($program)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pet $program)
    {
        $program->delete();

        return response()->json('Program deleted successfully');
    }
}