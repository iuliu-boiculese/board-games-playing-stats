<?php

namespace App\Http\Controllers;

use App\Models\Boardgame;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BoardgameController extends Controller
{
    public function index()
    {
        $boardgames = Boardgame::all()->sortBy('name');
        return view('boardgames.index', ['boardgames' => $boardgames]);
    }

    public function show(Boardgame $boardgame)
    {
        return view('boardgames.show', ['boardgame' => $boardgame]);
    }

    public function create()
    {
        return view('boardgames.create');
    }

    public function store(Request $request)
    {
        $request->merge(['slug' => Str::slug($request->name)]);
        Boardgame::create(array_merge($this->validateBoardgame(), [
            'thumbnail' => $request->file('thumbnail')->store('thumbnails')
        ]));

        return redirect('/boardgames');
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }

    protected function validateBoardgame(?Boardgame $boardgame = null): array
    {
        $boardgame ??= new Boardgame();

        return request()->validate([
            'name' => 'required|max:255',
            'slug' => ['required', Rule::unique('boardgames', 'slug')->ignore($boardgame), 'max:255'],
            'description' => 'nullable',
            'thumbnail' => $boardgame->exists ? ['image'] : ['required', 'image'],
            'release_year' => 'required|digits:4|integer|min:1900|max:' . (date('Y')),
            'bgg_url' => 'url:https|nullable'
        ]);

    }
}
