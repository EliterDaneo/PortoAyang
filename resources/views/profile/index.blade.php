@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div>
                <h3 class="text-center my-4">Data Profile</h3>
                <hr>
            </div>
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    {{-- <a href="#" class="btn btn-md btn-success mb-3" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">TAMBAH POST</a> --}}
                    {{-- <a href="{{ route('profile.create') }}" class="btn btn-md btn-success mb-3">TAMBAH POST</a> --}}
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Foto</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jurusan</th>
                                <th scope="col">Tentang Saya</th>
                                <th scope="col">Moto</th>
                                <th scope="col">Ajakan</th>
                                <th scope="col">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($profiles as $profile)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ asset('/storage/profile/' . $profile->image) }}" class="rounded"
                                            style="width: 150px">
                                    </td>
                                    <td>{{ $profile->nama }}</td>
                                    <td>{{ $profile->jurusan }}</td>
                                    <td>{!! $profile->tentang_saya !!}</td>
                                    <td>{{ $profile->moto }}</td>
                                    <td>{{ $profile->ajakan }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('profile.destroy', $profile->id) }}" method="POST">
                                            <a href="{{ route('profile.show', $profile->id) }}"
                                                class="btn btn-sm btn-dark">SHOW</a>
                                            <a href="{{ route('profile.edit', $profile->id) }}"
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
                    {{ $profiles->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
