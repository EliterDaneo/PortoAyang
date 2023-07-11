@extends('layouts.master')

@section('content')
    <div class="col-md-12">
        <div>
            <h3 class="text-center my-4">{{ $title }}</h3>
            <hr>
        </div>
        <div class="card border-0 shadow-sm rounded">
            <div class="card-body">

                <form action="{{ route('client.store') }}" method="POST" enctype="multipart/form-data">

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
