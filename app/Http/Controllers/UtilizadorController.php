<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UtilizadorController extends Controller
{
    public function show($id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        if (!$user) {
            abort(404);
        }

        return view('users.show', ['user' => $user]);
    }

    public function delete($id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        if (!$user) {
            abort(404);
        }

        DB::table('users')->where('id', $id)->delete();

        return redirect()->route('utilizadores')->with('success', 'Utilizador apagado com sucesso.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        $data = $request->only(['name', 'email']);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $data['photo'] = $path;
        }

        $user->update($data);

        return redirect()->back()->with('success', 'Utilizador atualizado!');
    }
}
