<?php

namespace App\Http\Controllers;

use App\Models\Protofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProtofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Portofolio Kontrol';
        $portofolio   = Protofolio::latest()->paginate(5);
        return view('portofolio.index', compact('title', 'portofolio'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Portofolio';
        return view('portofolio.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'image'             => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'judul'             => 'required|min:5',
            'isi'               => 'required|min:5',
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/portofolio', $image->hashName());

        //create porto
        Protofolio::create([
            'image'             => $image->hashName(),
            'judul'             => $request->judul,
            'isi'               => $request->isi,
        ]);

        //redirect to index
        return redirect()->route('portofolio.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //get porto by ID
        $porto      = Protofolio::findOrFail($id);
        $title      = 'Lihat Portofolio';
        //render view with porto
        return view('portofolio.show', compact('porto', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //get porto by ID
        $porto      = Protofolio::findOrFail($id);
        $title      = 'Edit Portofolio';
        //render view with porto
        return view('portofolio.edit', compact('porto', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validate form
        $this->validate($request, [
            'image'             => 'image|mimes:jpeg,jpg,png|max:2048',
            'judul'             => 'required|min:5',
            'isi'               => 'required|min:5',
        ]);

        //get porto by ID
        $porto = Protofolio::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/portofolio', $image->hashName());

            //delete old image
            Storage::delete('public/portofolio/'.$porto->image);

            //update porto with new image
            $porto->update([
                'image'             => $image->hashName(),
                'judul'             => $request->judul,
                'isi'               => $request->isi,
            ]);
        } else {
            //update porto without image
            $porto->update([
                'judul'             => $request->judul,
                'isi'               => $request->isi,
            ]);
        }

        //redirect to index
        return redirect()->route('portofolio.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         //get porto by ID
        $porto = Protofolio::findOrFail($id);

        //delete image
        Storage::delete('public/portofolio/'. $porto->image);

        //delete porto
        $porto->delete();

        //redirect to index
        return redirect()->route('portofolio.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
