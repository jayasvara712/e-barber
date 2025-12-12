@extends('layouts.app')
@section('content')
    <h2 class="mb-3">
        Buat Booking</h2>


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form id="bookingForm" method="POST" action="{{ route('bookings.store') }}">
        @csrf


        <div class="mb-3">
            <label class="form-label">Pilih Barber</label>
            <select class="form-select" name="barber_id" required>
                <option value="">-- Pilih --</option>
                @foreach ($barbers as $b)
                    <option value="{{ $b->id }}">{{ $b->name }} - {{ $b->speciality }}</option>
                @endforeach
            </select>
        </div>


        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Tanggal</label>
                <input type="text" id="date" name="date" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Waktu</label>
                <input type="text" id="time" name="time" class="form-control" required>
            </div>
        </div>


        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="customer_name" class="form-control" required>
        </div>


        <div class="mb-3">
            <label class="form-label">Telepon</label>
            <input type="text" name="customer_phone" class="form-control">
        </div>


        <div class="mb-3">
            <label class="form-label">Catatan</label>
            <textarea name="notes" class="form-control"></textarea>
        </div>


        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmModal">Simpan
            Booking</button>
    </form>


    <!-- MODAL KONFIRMASI -->
    <div class="modal fade" id="confirmModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Booking</h5>
                </div>
                <div class="modal-body">Apakah data sudah benar?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cek Lagi</button>
                    <button class="btn btn-success" onclick="document.getElementById('bookingForm').submit()">Ya,
                        Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        flatpickr('#date', {
            dateFormat: 'Y-m-d',
            minDate: 'today'
        });
        flatpickr('#time', {
            enableTime: true,
            noCalendar: true,
            dateFormat: 'H:i'
        });
    </script>
@endsection
