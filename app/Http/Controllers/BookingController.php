<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('barber')->orderBy('date', 'desc')->paginate(10);
        return view('bookings.index', compact('bookings'));
    }


    public function create()
    {
        $barbers = Barber::all();
        return view('bookings.create', compact('barbers'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'barber_id' => 'required|exists:barbers,id',
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'nullable|string|max:25',
            'date' => 'required|date',
            'time' => 'required',
            'notes' => 'nullable|string'
        ]);


        Booking::create($validated);


        return redirect()->route('bookings.index')->with('success', 'Booking berhasil dibuat.');
    }


    public function destroy(Booking $booking)
    {
        $booking->delete();
        return back()->with('success', 'Booking dihapus.');
    }


    // optional: change status
    public function updateStatus(Booking $booking, Request $request)
    {
        $request->validate(['status' => 'required|in:pending,confirmed,cancelled']);
        $booking->update(['status' => $request->status]);
        return back()->with('success', 'Status diperbarui.');
    }
}
