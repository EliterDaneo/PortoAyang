@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div>
                <h3 class="text-center my-4">{{ $title }}</h3>
                <hr>
            </div>
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <a href="{{ route('blog.create') }}" class="btn btn-md btn-success mb-3">TAMBAH POST</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Foto</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Konten</th>
                                <th scope="col">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($blog as $b)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ asset('/storage/blog/' . $b->image) }}" class="rounded"
                                            style="width: 150px">
                                    </td>
                                    <td>{{ $b->judul }}</td>
                                    <td>{!! $b->isi !!}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('blog.destroy', $b->id) }}" method="POST">
                                            <a href="{{ route('blog.show', $b->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                            <a href="{{ route('blog.edit', $b->id) }}"
                                                class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    Data profile belum Tersedia.
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $blog->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
