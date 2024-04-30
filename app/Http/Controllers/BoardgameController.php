<?php

namespace App\Http\Controllers;

use App\Models\Boardgame;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class BoardgameController extends Controller
{
    public function index()
    {
        $boardgames = Boardgame::orderBy('name')->paginate(12);
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
        // Validation
        $validatedFields = $this->validateBoardgame();
        $validatedFields['slug'] = Str::slug($request->name);
        $validatedFields['image'] = $this->saveImage($request);

        Boardgame::create($validatedFields);

        return redirect('/boardgames')->with('success', 'Boardgame added');
    }

    public function edit(Boardgame $boardgame)
    {
        return view('boardgames.edit', ['boardgame' => $boardgame]);
    }

    public function update(Request $request, Boardgame $boardgame)
    {
        $validatedFields = $this->validateBoardgame($boardgame);
        $validatedFields['slug'] = Str::slug($request->name);

        if ($validatedFields['image'] ?? false) {
            $validatedFields['image'] = $this->saveImage($request);
        }

        $boardgame->update($validatedFields);

        return redirect('/boardgames')->with('success', 'Boardgame updated');
    }

    public function destroy(Boardgame $boardgame)
    {
        $boardgame->delete();

        return back()->with('success', 'Boardgame deleted!');
    }

    protected function validateBoardgame(?Boardgame $boardgame = null): array
    {
        $boardgame ??= new Boardgame();

        return request()->validate([
            'name' => ['required', Rule::unique('boardgames', 'name')->ignore($boardgame), 'max:255'],
            'description' => 'nullable',
            'image' => $boardgame->exists ? ['image'] : ['required', 'image'],
            'release_year' => 'required|digits:4|integer|min:1900|max:' . (date('Y')),
            'bgg_url' => 'url:https|nullable|max:255'
        ]);

    }

    protected function saveImage(Request $request): string
    {
        $image = $request->file('image');
        $imageName = $image->hashName();

        $destinationPathThumbnail = storage_path('app/public/boardgames/thumbnails');
        $img = Image::make($image->path());

        $img->resize(100, 100, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPathThumbnail.'/'.$imageName);

        $destinationPathOriginal = storage_path('app/public/boardgames/originals');
        $image->move($destinationPathOriginal, $imageName);

        return $imageName;
    }
}
