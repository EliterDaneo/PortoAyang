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
                    <a href="{{ route('portofolio.create') }}" class="btn btn-md btn-success mb-3">TAMBAH POST</a>
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
                            @forelse ($portofolio as $porto)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ asset('/storage/portofolio/' . $porto->image) }}" class="rounded"
                                            style="width: 150px">
                                    </td>
                                    <td>{{ $porto->judul }}</td>
                                    <td>{!! $porto->isi !!}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('portofolio.destroy', $porto->id) }}" method="POST">
                                            <a href="{{ route('portofolio.show', $porto->id) }}"
                                                class="btn btn-sm btn-dark">SHOW</a>
                                            <a href="{{ route('portofolio.edit', $porto->id) }}"
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
                    {{ $portofolio->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
