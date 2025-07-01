<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = User::orderBy('id', 'desc') ->get();
        $title = "Data User";
        return view('user.index', compact('datas', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah User";
        return view('user.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create($request->all());
        return redirect()->to('user')->with('success', 'Level Berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "edit";
        $user = User::find($id); //BLANK
        // $level = User::findOrFail($id); // INI BIASANYA ERROR 404 KARENA OrFail
        // $level = User::where('id', $id)->First(); //INI BIASANYA DI GUNAKAN UNTUK FOREIGN KEY
        return view('user.edit', compact('user', 'title'));
        return redirect()->to('user')->with('success', 'Data Berhasil diubah');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password) {
            $user->password = $request->password;
        }
        $user->save();
        return redirect()->to('user')->with('success', 'data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();


        return redirect()->to('user')->with('success', 'Hapus Level Berhasil' );
    }
}
