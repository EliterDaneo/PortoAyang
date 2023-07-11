@extends('layouts.master')

@section('content')
    <div class="col-md-12">
        <div>
            <h3 class="text-center my-4">{{ $title }}</h3>
            <hr>
        </div>
        <div class="card border-0 shadow-sm rounded">
            <div class="card-body">

                <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">

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
                        <label class="form-label">Judul</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul"
                            value="{{ old('judul') }}" placeholder="Masukkan">
                        <!-- error message untuk title -->
                        @error('judul')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Konten</label>
                        <textarea class="form-control @error('isi') is-invalid @enderror" name="isi" rows="5"
                            placeholder="Masukkan Konten Post">{{ old('isi') }}</textarea>

                        <!-- error message untuk isi -->
                        @error('isi')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
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
        CKEDITOR.replace('isi');
    </script>
@endpush
