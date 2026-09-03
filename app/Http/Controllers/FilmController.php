<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Http\Resources\FilmResource;
use App\Http\Resources\ActorResource;
use App\Http\Resources\CriticResource;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::all();

        return FilmResource::collection($films);
    }

    public function actors(string $id)
    {
        $film = Film::find($id);

        return ActorResource::collection($film->actors);
    }

    public function show(string $id)
    {
        $film = Film::find($id);

        return response()->json([
            'film' => new FilmResource($film),
            'critics' => CriticResource::collection($film->critics),
        ]);
    }

    public function search(Request $request)
    {
        if ($request->keyword) {
            $films = Film::where(
                'title',
                'like',
                '%' . $request->keyword . '%'
            );
        } else {
            $films = Film::where('id', '>', 0);
        }

        if ($request->rating) {
            $films->where(
                'rating',
                'like',
                '%' . $request->rating . '%'
            );
        }

        if ($request->minLength) {
            $films->where(
                'length',
                '>=',
                $request->minLength
            );
        }

        if ($request->maxLength) {
            $films->where(
                'length',
                '<=',
                $request->maxLength
            );
        }

        $films = $films->paginate(20);

        return FilmResource::collection($films);
    }
}