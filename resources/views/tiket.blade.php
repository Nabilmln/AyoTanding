@extends('layouts.app')

@section('title', 'Tiket — Ayotanding')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1"><i class="bi bi-ticket me-2" style="color: var(--primary);"></i>Tiket Pemesanan</h4>
        <p class="text-muted small mb-0">Riwayat booking yang sudah dibayar</p>
    </div>
    <span class="badge px-3 py-2" style="background: var(--primary-soft); color: var(--primary-dark);">
        {{ $pembayarans->count() }} tiket
    </span>
</div>

@if($pembayarans->isEmpty())
    <div class="text-center py-5">
        <div class="mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; background: var(--gray-100); border-radius: 20px;">
            <i class="bi bi-ticket fs-1 text-muted"></i>
        </div>
        <h5 class="fw-bold text-muted">Belum Ada Tiket</h5>
        <p class="text-muted small mb-3">Yuk booking lapangan sekarang!</p>
        <a href="{{ route('main') }}" class="btn btn-success px-4"><i class="bi bi-grid me-1"></i>Cari Lapangan</a>
    </div>
@else
    <div class="card border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Lapangan</th>
                        <th>Tanggal</th>
                        <th>Sesi</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pembayarans as $index => $pembayaran)
                        <tr>
                            <td class="fw-semibold">{{ $index + 1 }}</td>
                            <td>{{ $pembayaran->full_name }}</td>
                            <td>{{ $pembayaran->lapangan->field_name }}</td>
                            <td>{{ \Carbon\Carbon::parse($pembayaran->booking_date)->format('d M Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($pembayaran->fase->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($pembayaran->fase->jam_berakhir)->format('H:i') }}</td>
                            <td class="fw-bold" style="color: var(--primary);">Rp{{ number_format($pembayaran->total_price, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif
@endsection
