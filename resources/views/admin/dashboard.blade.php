@extends('layouts.app')

@section('title', 'Admin Dashboard — Ayotanding')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0"><i class="bi bi-shield me-2 text-success"></i>Dashboard Admin</h4>
    <span class="badge bg-success rounded-pill">{{ $lapangans->count() }} lapangan</span>
</div>

@if($lapangans->isEmpty())
    <div class="text-center py-5">
        <i class="bi bi-inbox text-muted" style="font-size: 4rem;"></i>
        <p class="text-muted mt-3">Belum ada lapangan yang terdaftar.</p>
    </div>
@else
    <div class="row g-4">
        @foreach($lapangans as $lapangan)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100">
                    <img src="{{ asset('storage/' . $lapangan->field_photo) }}" class="card-img-top" alt="{{ $lapangan->field_name }}" style="height: 180px; object-fit: cover;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title mb-0">{{ $lapangan->field_name }}</h5>
                            <span class="badge bg-{{ $lapangan->approved ? 'success' : 'warning' }}">
                                {{ $lapangan->approved ? 'Approved' : 'Pending' }}
                            </span>
                        </div>
                        <p class="card-text text-muted small mb-1"><i class="bi bi-geo-alt me-1"></i>{{ $lapangan->location }}</p>
                        <p class="card-text text-muted small mb-1"><i class="bi bi-person me-1"></i>{{ $lapangan->user->name ?? 'N/A' }}</p>
                        <p class="card-text text-muted small mb-3"><i class="bi bi-tag me-1"></i>{{ $lapangan->jenisLapangan->nama }}</p>

                        @if(!$lapangan->approved)
                            <div class="d-flex gap-2">
                                <form action="{{ route('admin.dashboard.approve', $lapangan->id) }}" method="post" class="flex-grow-1">
                                    @csrf
                                    <button type="submit" class="btn btn-success w-100 btn-sm">
                                        <i class="bi bi-check-lg me-1"></i>Approve
                                    </button>
                                </form>
                                <form action="{{ route('admin.dashboard.reject', $lapangan->id) }}" method="post" class="flex-grow-1">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger w-100 btn-sm" onclick="return confirm('Tolak lapangan ini?')">
                                        <i class="bi bi-x-lg me-1"></i>Reject
                                    </button>
                                </form>
                            </div>
                        @else
                            <form action="{{ route('admin.dashboard.reject', $lapangan->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger w-100 btn-sm" onclick="return confirm('Hapus lapangan ini?')">
                                    <i class="bi bi-trash me-1"></i>Hapus
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection
