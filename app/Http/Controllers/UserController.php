<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lapangan;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showProfile()
    {
        $user = Auth::user();

        if ($user->role === 'owner' || $user->role === 'admin') {
            $lapangans = Lapangan::where('user_id', $user->id)
                ->with('pembayarans.fase', 'pembayarans.user')
                ->get();
            return view('user.profile', compact('user', 'lapangans'));
        }

        // For regular users (bookers), show their booking history
        $pembayarans = Pembayaran::where('user_id', $user->id)
            ->with('lapangan', 'fase')
            ->get();
        return view('user.profile', compact('user', 'pembayarans'));
    }

    public function showDaftarLapanganForm()
    {
        return app(LapanganController::class)->showDaftarLapanganForm();
    }
}
