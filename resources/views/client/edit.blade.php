@extends('layouts.master')

@section('content')
    <div class="col-md-12">
        <div>
            <h3 class="text-center my-4">{{ $title }}</h3>
            <hr>
        </div>
        <div class="card border-0 shadow-sm rounded">
            <div class="card-body">

                <form action="{{ route('client.update', $client->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <td class="text-center">
                            <img src="{{ asset('/storage/client/' . $client->image) }}" class="rounded" style="width: 150px">
                        </td><br>
                        <label class="form-label">Ganti Foto</label>
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

@push('ckeditor')
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('isi');
    </script>
@endpush
