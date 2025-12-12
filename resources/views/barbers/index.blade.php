@extends('layouts.app')


@section('content')
    <h1>Barbers</h1>
    <div class="row">
        @foreach ($barbers as $barber)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $barber->name }}</h5>
                        <p class="card-text">{{ $barber->speciality }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
