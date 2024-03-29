<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Uf;
use App\Models\Modul;
use Illuminate\Http\Request;

/**
 * Class UfController
 * @package App\Http\Controllers
 */
class UfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ufs = Uf::paginate();

        return view('uf.index', compact('ufs'))
            ->with('i', (request()->input('page', 1) - 1) * $ufs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $uf = new Uf();
        $moduls = Modul::all(); // Obtiene todos los moduls
        return view('uf.create', compact('uf', 'moduls')); // Pasa los moduls y uf a la vista
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Uf::$rules);

        $uf = Uf::create($request->all());

        return redirect()->route('ufs.index')
            ->with('success', 'Uf created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $uf = Uf::find($id);

        return view('uf.show', compact('uf'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $uf = Uf::find($id);

        return view('uf.edit', compact('uf'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Uf $uf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Uf $uf)
    {
        request()->validate(Uf::$rules);

        $uf->update($request->all());

        return redirect()->route('ufs.index')
            ->with('success', 'Uf updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $uf = Uf::find($id)->delete();

        return redirect()->route('ufs.index')
            ->with('success', 'Uf deleted successfully');
    }

    public function obtenerRas($ufId)
    {
        $ras = DB::table('ras')->where('uf_id', $ufId)->pluck('name', 'id');
        return view('uf.ras', compact('ras'));
    }
}
