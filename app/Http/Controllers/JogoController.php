<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class JogoController
{
    public function homepage($id)
    {
        $games = DB::table('games')->get()->where('studio_id', $id);

        $studio = DB::table('studios')->where('id', $id)->first();

        return view('games.index', ['games' => $games], compact('studio'));
    }

    public function create(Request $request)
    {
        $studio_id = $request->query('studio_id');

        return view('games.create', compact('studio_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'release_date' => 'nullable|date',
            'description' => 'nullable|string|max:255',
            'studio_id' => 'required|exists:studios,id',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        DB::insert('
            INSERT INTO games (name, release_date, description, photo, studio_id, created_at, updated_at)
            VALUES (?, ?, ?, ?, ?, NOW(), NOW())
        ', [
            $request->name,
            $request->release_date,
            $request->description,
            $photoPath,
            $request->studio_id
        ]);

        DB::table('studios')->where('id', $request->studio_id)->increment('numbergames');

        return redirect()->route('dashboard')->with('success', 'Jogo criado com sucesso!');
    }

    public function edit($id)
    {
        $game = DB::table('games')->where('id', $id)->first();
        return view('games.edit', compact('game'));
    }

    public function update(Request $request, $id)
    {
        $game = DB::table('games')->where('id', $id)->first();

        $request->validate([
            'name' => 'required|string|max:255',
            'release_date' => 'nullable|date',
            'description' => 'nullable|string|max:255',
        ]);

        $data = $request->only(['name', 'photo', 'release_date', 'description']);

        if ($request->hasFile('photo')) {
            $path = Storage::putFile('photos', $request->file('photo'));
            $data['photo'] = $path; 
        }

        DB::update('
            UPDATE games
            SET name = ?, release_date = ?, description = ?, updated_at = NOW()
            WHERE id = ?
        ', [
            $request->name,
            $request->release_date,
            $request->description,
            $id
        ]);

        return redirect()->route('dashboard')->with('success', 'Jogo atualizado!');
    }

    public function delete($id)
    {
        $game = DB::table('games')->where('id', $id)->first();

        if (!$game) {
            abort(404);
        }

        $studio_id = $game->studio_id;

        DB::table('games')->where('id', $id)->delete();

        DB::table('studios')->where('id', $studio_id)->decrement('numbergames');

        return redirect()->route('dashboard')->with('success', 'Jogo apagado com sucesso.');
    }
}
