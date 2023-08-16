<?php

namespace App\Http\Controllers;

use App\Models\Boardgame;
use Illuminate\Http\Request;

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

    }

    public function edit()
    {

    }

    public function store()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
