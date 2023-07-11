@extends('layouts.master')

@section('content')
    <div class="col-md-12">
        <div>
            <h3 class="text-center my-4">Show Profile</h3>
            <hr>
        </div>
        <div class="card border-0 shadow-sm rounded">
            <div class="card-body">
                <img src="{{ asset('storage/profile/' . $profile->image) }}" class="w-5 rounded mx-auto d-block img-circle">
                <hr>
                <div class="card-body shadow">
                    <h4>{{ $profile->nama }}</h4>
                    <p class="tmt-3">
                        {!! $profile->tentang_saya !!}
                    </p>
                    <hr>
                    <p class="tmt-3">
                        {{ $profile->jurusan }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
