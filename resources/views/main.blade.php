@extends('layouts.app')

@section('title', 'Main — Ayotanding')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0"><i class="bi bi-grid text-success me-2"></i>Lapangan Tersedia</h4>
    <span class="badge bg-success rounded-pill">{{ $lapangans->count() }} lapangan</span>
</div>

@if ($lapangans->isEmpty())
    <div class="text-center py-5">
        <i class="bi bi-emoji-frown text-muted" style="font-size: 4rem;"></i>
        <p class="text-muted mt-3">Tidak ada lapangan yang tersedia saat ini.</p>
        <a href="{{ route('daftarkan-lapangan') }}" class="btn btn-success">Daftarkan Lapangan</a>
    </div>
@else
    <div class="row g-4">
        @foreach($lapangans as $lapangan)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100">
                    <img src="{{ asset('storage/' . $lapangan->field_photo) }}" class="card-img-top" alt="{{ $lapangan->field_name }}">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title mb-0">{{ $lapangan->field_name }}</h5>
                            <span class="badge bg-success bg-opacity-10 text-success">{{ $lapangan->jenisLapangan->nama }}</span>
                        </div>
                        <p class="card-text text-muted small mb-2">
                            <i class="bi bi-geo-alt me-1"></i>{{ $lapangan->location }}
                        </p>
                        <p class="card-text text-muted small mb-3">
                            <i class="bi bi-tag me-1"></i>{{ $lapangan->layananPembayaran->layanan ?? 'Transfer Bank' }}
                        </p>
                        <a href="{{ route('lapangan.detail', $lapangan->id) }}" class="btn btn-success w-100">
                            <i class="bi bi-eye me-1"></i>Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection
