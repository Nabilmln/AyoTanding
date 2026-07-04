@extends('layouts.app')

@section('title', 'Profil — Ayotanding')

@section('content')
<div class="row g-4">
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm text-center p-4">
            <div class="mx-auto d-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px; background: var(--primary-soft); border-radius: 50%;">
                <i class="bi bi-person-circle fs-1" style="color: var(--primary);"></i>
            </div>
            <h5 class="fw-bold mb-1">{{ $user->name }}</h5>
            <p class="text-muted small mb-2">{{ $user->email }}</p>
            <span class="badge px-3 py-2" style="background: var(--primary-soft); color: var(--primary-dark); font-size: .8rem;">
                <i class="bi bi-person-badge me-1"></i>
                @if($user->role === 'user') Penyewa
                @elseif($user->role === 'owner') Pemilik Lapangan
                @else Admin
                @endif
            </span>
        </div>
    </div>

    <div class="col-lg-8">
        @if($user->role === 'owner' || $user->role === 'admin')
            {{-- Owner/Admin: show registered fields --}}
            <h5 class="fw-bold mb-3"><i class="bi bi-grid me-2" style="color: var(--primary);"></i>Lapangan Saya</h5>
            @forelse($lapangans as $lapangan)
                <div class="card border-0 shadow-sm mb-3 overflow-hidden">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/field_photos/' . $lapangan->field_photo) }}" class="img-fluid h-100" style="object-fit: cover; min-height: 180px;" alt="{{ $lapangan->field_name }}">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h5 class="fw-bold mb-0">{{ $lapangan->field_name }}</h5>
                                    <span class="badge px-3 py-2" style="background: {{ $lapangan->approved ? 'var(--primary-soft)' : '#fffbeb' }}; color: {{ $lapangan->approved ? 'var(--primary-dark)' : '#92400e' }}; font-size: .75rem;">
                                        {{ $lapangan->approved ? 'Approved' : 'Pending' }}
                                    </span>
                                </div>
                                <p class="text-muted small mb-2"><i class="bi bi-geo-alt me-1" style="color: var(--primary);"></i>{{ $lapangan->location }}</p>
                                @if($lapangan->pembayarans->isEmpty())
                                    <p class="text-muted small mb-0">Belum ada pemesan untuk lapangan ini.</p>
                                @else
                                    <p class="fw-semibold small mb-2" style="color: var(--primary);">Daftar Pemesan:</p>
                                    <div class="table-responsive">
                                        <table class="table table-sm table-striped mb-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama</th>
                                                    <th>Tanggal</th>
                                                    <th>Sesi</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($lapangan->pembayarans as $index => $pembayaran)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $pembayaran->full_name }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($pembayaran->booking_date)->format('d/m/Y') }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($pembayaran->fase->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($pembayaran->fase->jam_berakhir)->format('H:i') }}</td>
                                                        <td>Rp{{ number_format($pembayaran->total_price, 0, ',', '.') }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-4">
                    <div class="mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 64px; height: 64px; background: var(--gray-100); border-radius: 16px;">
                        <i class="bi bi-grid fs-2 text-muted"></i>
                    </div>
                    <p class="text-muted small mb-3">Kamu belum mendaftarkan lapangan.</p>
                    <a href="{{ route('daftarkan-lapangan') }}" class="btn btn-success btn-sm px-3">Daftarkan Sekarang</a>
                </div>
            @endforelse

        @else
            {{-- User/Penyewa: show booking history --}}
            <h5 class="fw-bold mb-3"><i class="bi bi-clock-history me-2" style="color: var(--primary);"></i>Riwayat Booking</h5>
            @forelse($pembayarans as $pembayaran)
                <div class="card border-0 shadow-sm mb-2">
                    <div class="card-body p-3">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="fw-bold mb-1">{{ $pembayaran->lapangan->field_name }}</h6>
                                <p class="text-muted small mb-0">
                                    <i class="bi bi-calendar me-1" style="color: var(--primary);"></i>{{ \Carbon\Carbon::parse($pembayaran->booking_date)->format('d M Y') }}
                                    &middot;
                                    <i class="bi bi-clock ms-1 me-1" style="color: var(--primary);"></i>{{ \Carbon\Carbon::parse($pembayaran->fase->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($pembayaran->fase->jam_berakhir)->format('H:i') }}
                                </p>
                            </div>
                            <span class="fw-bold" style="color: var(--primary);">Rp{{ number_format($pembayaran->total_price, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-4">
                    <div class="mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 64px; height: 64px; background: var(--gray-100); border-radius: 16px;">
                        <i class="bi bi-clock-history fs-2 text-muted"></i>
                    </div>
                    <p class="text-muted small mb-3">Belum ada riwayat booking.</p>
                    <a href="{{ route('main') }}" class="btn btn-success btn-sm px-3">Cari Lapangan</a>
                </div>
            @endforelse
        @endif
    </div>
</div>
@endsection
