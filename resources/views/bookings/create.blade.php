@extends('layouts.app')


@section('content')
    <h1>Buat Booking</h1>


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf


        <div class="mb-3">
            <label for="barber_id" class="form-label">Pilih Barber</label>
            <select name="barber_id" id="barber_id" class="form-select" required>
                <option value="">-- Pilih --</option>
                @foreach ($barbers as $barber)
                    <option value="{{ $barber->id }}">{{ $barber->name }} - {{ $barber->speciality }}</option>
                @endforeach
            </select>
        </div>


        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="customer_name" class="form-control" required>
        </div>


        <div class="mb-3">
            <label class="form-label">Telepon</label>
            <input type="text" name="customer_phone" class="form-control">
        </div>


        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="date" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Waktu</label>
                <input type="time" name="time" class="form-control" required>
            </div>
        </div>


        <div class="mb-3">
            <label class="form-label">Catatan (opsional)</label>
            <textarea name="notes" class="form-control" rows="3"></textarea>
        </div>


        <button class="btn btn-primary">Buat Booking</button>
    </form>
@endsection
