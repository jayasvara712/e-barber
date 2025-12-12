@extends('layouts.app')
@section('content')
    <h2 class="mb-3">Daftar Booking</h2>
    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Customer</th>
                    <th>Phone</th>
                    <th>Barber</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $b)
                    <tr>
                        <td>{{ $b->id }}</td>
                        <td>{{ $b->customer_name }}</td>
                        <td>{{ $b->customer_phone }}</td>
                        <td>{{ $b->barber->name }}</td>
                        <td>{{ $b->date->format('Y-m-d') }}</td>
                        <td>{{ $b->time }}</td>
                        <td><span class="badge bg-secondary">{{ $b->status }}</span></td>
                        <td>
                            <form method="POST" action="{{ route('bookings.destroy', $b) }}"
                                onsubmit="return confirm('Hapus?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $bookings->links() }}
@endsection
