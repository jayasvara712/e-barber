@extends('layouts.app')
@section('content')
    <h2 class="mb-4">Daftar Barber</h2>


    <div class="row g-4">
        @foreach ($barbers as $b)
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $b->name }}</h5>
                        <p class="text-muted mb-2">Spesialisasi: {{ $b->speciality ?? 'Umum' }}</p>
                        <p class="small text-secondary">Tersedia untuk semua layanan pangkas rambut.</p>
                        <a href="{{ route('bookings.create') }}" class="btn btn-primary btn-sm mt-2">Buat Booking</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
