<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class EstudioController
{
    public function homepage()
    {
        $studios = DB::table('studios')->get();

        return view('homepage', ['studios' => $studios]);
    }

    public function index()
    {
        $studios = DB::table('studios')->get();

        return view('studios.index', ['studios' => $studios]);
    }

    public function create()
    {
        return view('studios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        DB::insert('
            INSERT INTO studios (name, numbergames, photo, created_at, updated_at)
            VALUES (?, ?, ?, NOW(), NOW())
        ', [
            $request->name,
            0,
            $photoPath
        ]);

        return redirect()->route('dashboard')->with('success', 'Estúdio criado com sucesso!');
    }

    public function edit($id)
    {
        $studio = DB::table('studios')->where('id', $id)->first();
        return view('studios.edit', compact('studio'));
    }

    public function update(Request $request, $id)
    {
        $studio = DB::table('studios')->where('id', $id)->first();

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $data = $request->only(['name', 'numbergames']);

        if ($request->hasFile('photo')) {
            $path = Storage::putFile('photos', $request->file('photo'));
            $data['photo'] = $path; 
        }

        DB::table('studios')->where('id', $id)->update($data);

        return redirect()->route('dashboard')->with('success', 'Estúdio atualizado!');
    }

    public function delete($id)
    {
        $studio = DB::table('studios')->where('id', $id)->first();

        if (!$studio) {
            abort(404);
        }

        DB::table('studios')->where('id', $id)->delete();

        return redirect()->route('dashboard')->with('success', 'Estúdio apagado com sucesso.');
    }
}
