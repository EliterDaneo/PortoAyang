@extends('layouts.master')

@section('content')
    <div class="col-md-12">
        <div>
            <h3 class="text-center my-4">Show Profile</h3>
            <hr>
        </div>
        <a href="/portofolio" class="btn btn-md btn-success mb-3">Kembali</a>
        <div class="card border-0 shadow-sm rounded">
            <div class="card-body">
                <img src="{{ asset('storage/portofolio/' . $porto->image) }}" width="400"
                    class="w-5 rounded mx-auto d-block img-circle">
                <hr>
                <div class="card-body shadow">
                    <h4>{{ $porto->judul }}</h4>
                    <p class="tmt-3">
                        {!! $porto->isi !!}
                    </p>
                    <hr>
                </div>
            </div>
        </div>
    </div>
@endsection
