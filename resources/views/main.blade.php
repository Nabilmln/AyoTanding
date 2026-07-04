@extends('layouts.app')

@section('title', 'Cari Lapangan — Ayotanding')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1"><i class="bi bi-grid" style="color: var(--primary); margin-right: .5rem;"></i>Lapangan Tersedia</h4>
        <p class="text-muted small mb-0">{{ $lapangans->count() }} lapangan siap dibooking</p>
    </div>
    <span class="badge px-3 py-2" style="background: var(--primary-soft); color: var(--primary-dark); font-size: .85rem;">
        <i class="bi bi-check-circle me-1"></i>{{ $lapangans->count() }} tersedia
    </span>
</div>

@if ($lapangans->isEmpty())
    <div class="text-center py-5">
        <div class="mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; background: var(--gray-100); border-radius: 20px;">
            <i class="bi bi-emoji-frown fs-1 text-muted"></i>
        </div>
        <h5 class="fw-bold text-muted">Belum Ada Lapangan</h5>
        <p class="text-muted small mb-3">Belum ada lapangan yang tersedia saat ini.</p>
        <a href="{{ route('daftarkan-lapangan') }}" class="btn btn-success px-4">Daftarkan Lapangan</a>
    </div>
@else
    <div class="row g-4">
        @foreach($lapangans as $lapangan)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 animate-in">
                    <div class="position-relative">
                        <img src="{{ asset('storage/field_photos/' . $lapangan->field_photo) }}" class="card-img-top" alt="{{ $lapangan->field_name }}" style="height: 200px; object-fit: cover;">
                        <span class="position-absolute top-0 end-0 m-2 badge" style="background: rgba(0,0,0,.5); color: #fff; backdrop-filter: blur(4px); font-size: .75rem;">
                            <i class="bi bi-tag me-1"></i>{{ $lapangan->jenisLapangan->nama }}
                        </span>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title fw-bold mb-0">{{ $lapangan->field_name }}</h5>
                        </div>
                        <p class="card-text text-muted small mb-1">
                            <i class="bi bi-geo-alt" style="color: var(--primary);"></i> {{ $lapangan->location }}
                        </p>
                        <p class="card-text text-muted small mb-3">
                            <i class="bi bi-credit-card" style="color: var(--primary);"></i> {{ $lapangan->layananPembayaran->layanan ?? '-' }}
                        </p>
                        <div class="mt-auto">
                            <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                                <small class="text-muted">
                                    @if($lapangan->fases->isNotEmpty())
                                        <i class="bi bi-clock me-1"></i>
                                        {{ \Carbon\Carbon::parse($lapangan->fases->min('jam_mulai'))->format('H:i') }} -
                                        {{ \Carbon\Carbon::parse($lapangan->fases->max('jam_berakhir'))->format('H:i') }}
                                    @endif
                                </small>
                                <a href="{{ route('lapangan.detail', $lapangan->id) }}" class="btn btn-success btn-sm px-3">Booking</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection
