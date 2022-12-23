<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return view('menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'id' => 'required|min:6|max:6|', //regex:/[A-Z]{3}\d{3}/
            'nama' => 'required|max:255',
            'rekomendasi' => 'required|in:1,0',
            'harga' => 'required|numeric|min:0|max:99000000',
        ]);

        Menu::create($validateData);

        $request->session()->flash('success', "Sukses menambah menu dengan nama: {$validateData['nama']}");
        return redirect()->route('menus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        return view('menus.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('menus.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $validateData = $request->validate([
            //'id' => 'required|min:6|max:6|', //regex:/[A-Z]{3}\d{3}/
            'nama' => 'required|max:255',
            'rekomendasi' => 'required|in:1,0',
            'harga' => 'required|numeric|min:0|max:99000000',
        ]);
        $menu->update($validateData);

        $request->session()->flash('success', "Success mengupdate menu dengan nama {$validateData['nama']}!");
        return redirect()->route('menus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menus.index')->with(
            'success',
            "Berhasil menghapus menu {$menu['nama']}!"
        );
    }
}
