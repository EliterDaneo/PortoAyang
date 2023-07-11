<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client     = Client::latest()->paginate(5);
        $title      = 'Dasboard Client';
        return view('client.index', compact('client', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title      = 'Dasboard Client';
        return view('client.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'image'             => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/client', $image->hashName());

        //create porto
        Client::create([
            'image'             => $image->hashName(),
        ]);

        //redirect to index
        return redirect()->route('client.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client     = Client::findOrFail($id);
        $title      = 'Tampilkan Data Client';
        return view('client.show', compact('client', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client     = Client::findOrFail($id);
        $title      = 'Edit Data Client';
        return view('client.edit', compact('client', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validate form
        $this->validate($request, [
            'image'             => 'image|mimes:jpeg,jpg,png|max:2048',
        ]);

        //get porto by ID
        $client = Client::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/client', $image->hashName());

            //delete old image
            Storage::delete('public/client/'.$client->image);

            //update porto with new image
            $client->update([
                'image'             => $image->hashName(),
            ]);
        }

        //redirect to index
        return redirect()->route('client.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //get client by ID
        $client = Client::findOrFail($id);

        //delete image
        Storage::delete('public/client/'. $client->image);

        //delete client
        $client->delete();

        //redirect to index
        return redirect()->route('client.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
