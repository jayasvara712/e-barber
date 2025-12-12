@extends('layouts.app')


@section('content')
    <h1>Bookings</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Customer</th>
                <th>Phone</th>
                <th>Barber</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $b)
                <tr>
                    <td>{{ $b->id }}</td>
                    <td>{{ $b->customer_name }}</td>
                    <td>{{ $b->customer_phone }}</td>
                    <td>{{ $b->barber->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($b->date)->format('Y-m-d') }}</td>
                    <td>{{ \Carbon\Carbon::parse($b->time)->format('H:i') }}</td>
                    <td>{{ ucfirst($b->status) }}</td>
                    <td>
                        <form action="{{ route('bookings.destroy', $b) }}" method="POST"
                            onsubmit="return confirm('Hapus booking ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    {{ $bookings->links() }}
@endsection
