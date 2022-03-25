<?php

namespace App\Http\Controllers\Lister;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        return view('pages.lister.bookings');
    }

    public function destroy($id)
    {
        $user = Auth::user();

        $booking = Booking::query()
            ->where('id', $id)
            ->where('user_id', $user->id)
            ->firstOrFail()
            ->delete();

        return redirect()->back()->with('success', 'Bookings has been successfully deleted.');
    }
}
