<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function getMovies(Request $request){
        try {
            $data = Movie::all();
            return response()->json([
                'message' => 'success',
                'data' => $data
            ], 200);
        } catch (Exception $err) {
            return $err;
        }
    }

    public function insertMovie(Request $request) {
        try {
            $data = $request->validate([
                'title' => ['required', 'max:50'],
                'description' => ['required', 'max:300'],
                'duration' => ['required', 'max:50'],
                'artist' => ['required', 'max:100'],
                'genres' => ['required', 'max:100'],
            ]);

            Movie::create($data);
            return response()->json([
                'message' => "success",
                'data' => $data
            ], 200);
        } catch (Exception $err) {
            return $err;
        }
    }

    public function updateMovie(Request $request, $id) {
        try {
            $result = Movie::find($id);
            $data = $request->validate([
                'title' => ['required', 'max:50'],
                'description' => ['required', 'max:300'],
                'duration' => ['required', 'max:50'],
                'artist' => ['required', 'max:100'],
                'genres' => ['required', 'max:100'],
            ]);

            $result->update($data);
            return response()->json([
                'message' => "success",
                'data' => $data
            ], 200);
        } catch (Exception $err) {
            return $err;
        }
    }

    public function getMoviePaginate(Request $request){
        try {
            $data = Movie::paginate(20);
            return response()->json([
                "message" => "success",
                "data" => $data
            ]);
        } catch (Exception $err) {
            return $err;
        }
    }
}
