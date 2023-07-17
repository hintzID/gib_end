<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prioritas;

class PrioritasController extends Controller
{
    public function index()
    {
        $prioritas = Prioritas::all();
        return view('sistem_mitra.prioritas.index', compact('prioritas'));
    }

    public function create()
    {
        return view('sistem_mitra.prioritas.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'grade' => 'required',
            'persen' => 'required',
        ]);

        Prioritas::create([
            'grade' => $request->grade,
            'persen' => $request->persen,
        ]);

        return redirect()->route('prioritas.index')->with('success', 'Prioritas created successfully');
    }

    public function edit($id)
    {
        $prioritas = Prioritas::findOrFail($id);
        return view('sistem_mitra.prioritas.edit', compact('prioritas'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'grade' => 'required',
            'persen' => 'required',
        ]);

        $prioritas = Prioritas::findOrFail($id);
        $prioritas->update([
            'grade' => $request->grade,
            'persen' => $request->persen,
        ]);

        return redirect()->route('prioritas.index')->with('success', 'Prioritas updated successfully');
    }

    public function destroy($id)
    {
        $prioritas = Prioritas::findOrFail($id);
        $prioritas->delete();

        return redirect()->route('prioritas.index')->with('success', 'Prioritas deleted successfully');
    }
}
