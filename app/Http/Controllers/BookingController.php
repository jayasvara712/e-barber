<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use App\Models\Booking;
use Carbon\Carbon;
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
        return view('bookings.create', ['barbers' => Barber::all()]);
    }


    public function store(Request $r)
    {
        $v = $r->validate([
            'barber_id' => 'required|exists:barbers,id',
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'nullable|string|max:25',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required',
            'notes' => 'nullable|string'
        ]);


        // Double-booking sederhana (interval 60 menit)
        $slot = 60;
        $reqDT = Carbon::parse($v['date'] . ' ' . $v['time']);

        $existing = Booking::where('barber_id', $v['barber_id'])
            ->whereDate('date', $v['date'])->get();


        foreach ($existing as $e) {
            $exDT = $e->date_time;
            if ($reqDT->diffInMinutes($exDT) < $slot) {
                return back()->withErrors(['time' => 'Waktu bentrok, pilih jam lain'])->withInput();
            }
        }

        Booking::create($v);
        return redirect()->route('bookings.index')->with('success', 'Booking berhasil dibuat.');
    }


    public function destroy(Booking $booking)
    {
        $booking->delete();
        return back()->with('success', 'Booking dihapus.');
    }
}
