@extends('layouts.app')

@section('title', 'Admin Dashboard — Ayotanding')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1"><i class="bi bi-shield me-2" style="color: var(--primary);"></i>Dashboard Admin</h4>
        <p class="text-muted small mb-0">Kelola pendaftaran lapangan dari pemilik</p>
    </div>
    <span class="badge px-3 py-2" style="background: var(--primary-soft); color: var(--primary-dark);">
        {{ $lapangans->count() }} lapangan
    </span>
</div>

@if($lapangans->isEmpty())
    <div class="text-center py-5">
        <div class="mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; background: var(--gray-100); border-radius: 20px;">
            <i class="bi bi-inbox fs-1 text-muted"></i>
        </div>
        <h5 class="fw-bold text-muted">Belum Ada Lapangan</h5>
        <p class="text-muted small mb-0">Belum ada pendaftaran lapangan masuk.</p>
    </div>
@else
    <div class="row g-4">
        @foreach($lapangans as $lapangan)
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 h-100">
                    <div class="position-relative">
                        <img src="{{ asset('storage/field_photos/' . $lapangan->field_photo) }}" class="card-img-top" alt="{{ $lapangan->field_name }}" style="height: 180px; object-fit: cover;">
                        <span class="position-absolute top-0 end-0 m-2 badge px-3 py-2" style="background: {{ $lapangan->approved ? 'rgba(5,150,105,.9)' : 'rgba(245,158,11,.9)' }}; color: #fff; backdrop-filter: blur(4px);">
                            {{ $lapangan->approved ? 'Approved' : 'Pending' }}
                        </span>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="fw-bold mb-2">{{ $lapangan->field_name }}</h5>
                        <p class="text-muted small mb-1"><i class="bi bi-geo-alt me-1" style="color: var(--primary);"></i>{{ $lapangan->location }}</p>
                        <p class="text-muted small mb-1"><i class="bi bi-person me-1" style="color: var(--primary);"></i>{{ $lapangan->user->name ?? 'N/A' }}</p>
                        <p class="text-muted small mb-3"><i class="bi bi-tag me-1" style="color: var(--primary);"></i>{{ $lapangan->jenisLapangan->nama }}</p>
                        <div class="mt-auto">
                            @if(!$lapangan->approved)
                                <div class="d-flex gap-2">
                                    <form action="{{ route('admin.dashboard.approve', $lapangan->id) }}" method="post" class="flex-grow-1">
                                        @csrf
                                        <button type="submit" class="btn btn-success w-100 btn-sm py-2"><i class="bi bi-check-lg me-1"></i>Setujui</button>
                                    </form>
                                    <form action="{{ route('admin.dashboard.reject', $lapangan->id) }}" method="post" class="flex-grow-1">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger w-100 btn-sm py-2" onclick="return confirm('Tolak lapangan ini?')"><i class="bi bi-x-lg me-1"></i>Tolak</button>
                                    </form>
                                </div>
                            @else
                                <form action="{{ route('admin.dashboard.reject', $lapangan->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger w-100 btn-sm py-2" onclick="return confirm('Hapus lapangan ini?')"><i class="bi bi-trash me-1"></i>Hapus</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection
