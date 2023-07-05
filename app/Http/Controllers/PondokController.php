<?php

namespace App\Http\Controllers;

use App\Models\Pondok;
use App\Models\CalonMitra;
use Illuminate\Http\Request;

class PondokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $pondoks = Pondok::when($search, function ($query, $search) {
            return $query->where('contact_person', 'like', '%' . $search . '%')
                ->orWhereHas('calonMitra', function ($query) use ($search) {
                    $query->where('nama_pondok', 'like', '%' . $search . '%');
                });
        })->paginate(10);

        return view('sistem_mitra.pondok.index', compact('pondoks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $calonMitra = CalonMitra::doesntHave('pondok')->get();
        return view('sistem_mitra.pondok.create', compact('calonMitra'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'calon_mitra_id' => 'required',
            'contact_person' => 'required',
            'no_hp_contact_person' => 'required',
        ]);

        Pondok::create($data);

        return redirect()->route('pondok.index')
            ->with('success', 'Pondok created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pondok  $pondok
     * @return \Illuminate\Http\Response
     */
    public function show(Pondok $pondok)
    {
        return view('sistem_mitra.pondok.show', compact('pondok'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pondok  $pondok
     * @return \Illuminate\Http\Response
     */
    public function edit(Pondok $pondok)
    {
        $calonMitra = CalonMitra::all();
        return view('sistem_mitra.pondok.edit', compact('pondok','calonMitra'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pondok  $pondok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pondok $pondok)
    {
        $data = $request->validate([
            'calon_mitra_id' => 'required',
            'contact_person' => 'required',
            'no_hp_contact_person' => 'required',
        ]);

        $pondok->update($data);

        return redirect()->route('pondok.index')
            ->with('success', 'Pondok updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pondok  $pondok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pondok $pondok)
    {
        $pondok->delete();

        return redirect()->route('pondok.index')
            ->with('success', 'Pondok deleted successfully.');
    }
}
