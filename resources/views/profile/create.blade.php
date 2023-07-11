@extends('layouts.master')

@section('content')
    <div class="col-md-12">
        <div>
            <h3 class="text-center my-4">Data Profile</h3>
            <hr>
        </div>
        <div class="card border-0 shadow-sm rounded">
            <div class="card-body">

                <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Foto</label>
                        <input class="form-control @error('image') is-invalid @enderror" name="image" type="file"
                            id="formFile">
                        <!-- error message untuk title -->
                        @error('image')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                            value="{{ old('nama') }}" placeholder="Masukkan Nama Anda">
                        <!-- error message untuk title -->
                        @error('nama')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jurusan</label>
                        <input type="text" class="form-control @error('jurusan') is-invalid @enderror" name="jurusan"
                            value="{{ old('jurusan') }}" placeholder="Masukkan Jurusan Anda">
                        <!-- error message untuk title -->
                        @error('jurusan')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Tentang Saya</label>
                        <textarea class="form-control @error('tentang_saya') is-invalid @enderror" name="tentang_saya" rows="5"
                            placeholder="Masukkan Konten Post">{{ old('tentang_saya') }}</textarea>

                        <!-- error message untuk tentang_saya -->
                        @error('tentang_saya')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Motivasi</label>
                        <textarea class="form-control @error('moto') is-invalid @enderror" name="moto" rows="3">{{ old('moto') }}</textarea>
                        <!-- error message untuk title -->
                        @error('moto')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ajakan</label>
                        <input type="text" class="form-control @error('ajakan') is-invalid @enderror" name="ajakan"
                            value="{{ old('ajakan') }}">
                        <!-- error message untuk title -->
                        @error('ajakan')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Instagram</label>
                            <input type="text" name="ig" class="form-control @error('ig') is-invalid @enderror"
                                value="{{ old('ig') }}">
                            @error('ig')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Facebook</label>
                            <input type="text" name="fb" class="form-control @error('fb') is-invalid @enderror"
                                value="{{ old('fb') }}">
                            @error('fb')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Twiter</label>
                            <input type="text" name="tw" class="form-control @error('tw') is-invalid @enderror"
                                value="{{ old('tw') }}">
                            @error('tw')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Youtube</label>
                            <input type="text" name="yt" class="form-control @error('yt') is-invalid @enderror"
                                value="{{ old('yt') }}">
                            @error('yt')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Tiktok</label>
                            <input type="text" name="tk" class="form-control @error('tk') is-invalid @enderror"
                                value="{{ old('tk') }}">
                            @error('tk')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Github</label>
                            <input type="text" name="git" class="form-control @error('git') is-invalid @enderror"
                                value="{{ old('git') }}">
                            @error('git')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <hr><br>
                    <div class="col-12">
                        <button type="reset" class="btn btn-warning" data-bs-dismiss="modal">Reset</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('ckeditor')
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('tentang_saya');
    </script>
@endpush
