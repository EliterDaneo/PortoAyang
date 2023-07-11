<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): view
    {
        $profiles   = Profile::latest()->paginate(5);
        $title      = 'Dasboard Profile';
        return view('profile.index', compact('profiles', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $title      = 'Dasboard Profile';
        return view('profile.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'image'             => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'nama'              => 'required|min:5',
            'jurusan'           => 'required|min:5',
            'tentang_saya'      => 'required|min:5',
            'ajakan'            => 'required|min:10',
            'moto'              => 'required|min:10',
            'ig'                => 'required|min:5',
            'tw'                => 'required|min:5',
            'tk'                => 'required|min:5',
            'yt'                => 'required|min:5',
            'fb'                => 'required|min:5',
            'git'               => 'required|min:5',
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/profile', $image->hashName());

        //create post
        Profile::create([
            'image'             => $image->hashName(),
            'nama'              => $request->nama,
            'jurusan'           => $request->jurusan,
            'tentang_saya'      => $request->tentang_saya,
            'ajakan'            => $request->ajakan,
            'moto'              => $request->moto,
            'ig'                => $request->ig,
            'tw'                => $request->tw,
            'tk'                => $request->tk,
            'yt'                => $request->yt,
            'fb'                => $request->fb,
            'git'               => $request->git,
        ]);

        //redirect to index
        return redirect()->route('profile.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        //get post by ID
        $profile = Profile::findOrFail($id);
        $title      = 'Dasboard Profile';
        //render view with post
        return view('profile.show', compact('profile', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //get profile by ID
        $profile = Profile::findOrFail($id);
        $title = 'Edite Profile';
        //render view with profile
        return view('profile.edit', compact('profile', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validate form
        $this->validate($request, [
            'image'             => 'image|mimes:jpeg,jpg,png|max:2048',
            'nama'              => 'required|min:5',
            'jurusan'           => 'required|min:5',
            'tentang_saya'      => 'required|min:5',
            'ajakan'            => 'required|min:10',
            'moto'              => 'required|min:10',
            'ig'                => 'required|min:5',
            'tw'                => 'required|min:5',
            'tk'                => 'required|min:5',
            'yt'                => 'required|min:5',
            'fb'                => 'required|min:5',
            'git'               => 'required|min:5',
        ]);

        //get profile by ID
        $profile = Profile::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/profile', $image->hashName());

            //delete old image
            Storage::delete('public/profile/'.$profile->image);

            //update profile with new image
            $profile->update([
                'image'             => $image->hashName(),
                'nama'              => $request->nama,
                'jurusan'           => $request->jurusan,
                'tentang_saya'      => $request->tentang_saya,
                'ajakan'            => $request->ajakan,
                'moto'              => $request->moto,
                'ig'                => $request->ig,
                'tw'                => $request->tw,
                'tk'                => $request->tk,
                'yt'                => $request->yt,
                'fb'                => $request->fb,
                'git'               => $request->git,
            ]);

        } else {

            //update profile without image
            $profile->update([
                'nama'              => $request->nama,
                'jurusan'           => $request->jurusan,
                'tentang_saya'      => $request->tentang_saya,
                'ajakan'            => $request->ajakan,
                'moto'              => $request->moto,
                'ig'                => $request->ig,
                'tw'                => $request->tw,
                'tk'                => $request->tk,
                'yt'                => $request->yt,
                'fb'                => $request->fb,
                'git'               => $request->git,
            ]);
        }

        //redirect to index
        return redirect()->route('profile.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         //get profile by ID
        $profile = Profile::findOrFail($id);

        //delete image
        Storage::delete('public/profile/'. $profile->image);

        //delete profile
        $profile->delete();

        //redirect to index
        return redirect()->route('profile.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
