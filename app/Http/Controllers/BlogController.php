<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blog     = Blog::latest()->paginate(5);
        $title      = 'Dasboard Blog';
        return view('blog.index', compact('blog', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Blog';
        return view('blog.create', compact('title'));
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
        $image->storeAs('public/blog', $image->hashName());

        //create blog
        Blog::create([
            'image'             => $image->hashName(),
            'judul'             => $request->judul,
            'isi'               => $request->isi,
        ]);

        //redirect to index
        return redirect()->route('blog.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //get blog by ID
        $blog       = Blog::findOrFail($id);
        $title      = 'Lihat Blog';
        //render view with blog
        return view('blog.show', compact('blog', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //get blog by ID
        $blog       = Blog::findOrFail($id);
        $title      = 'Edit blogfolio';
        //render view with blog
        return view('blog.edit', compact('blog', 'title'));
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

        //get blog by ID
        $blog = Blog::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/blog', $image->hashName());

            //delete old image
            Storage::delete('public/blog/'.$blog->image);

            //update blog with new image
            $blog->update([
                'image'             => $image->hashName(),
                'judul'             => $request->judul,
                'isi'               => $request->isi,
            ]);
        } else {
            //update blog without image
            $blog->update([
                'judul'             => $request->judul,
                'isi'               => $request->isi,
            ]);
        }

        //redirect to index
        return redirect()->route('blog.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         //get blog by ID
        $blog = Blog::findOrFail($id);

        //delete image
        Storage::delete('public/blogfolio/'. $blog->image);

        //delete blog
        $blog->delete();

        //redirect to index
        return redirect()->route('blog.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
