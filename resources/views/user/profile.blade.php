@extends('layouts.app')

@section('title', 'Profile — Ayotanding')

@section('content')
<div class="row g-4">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-center p-4">
                <i class="bi bi-person-circle text-success" style="font-size: 5rem;"></i>
                <h5 class="mt-2">{{ $user->name }}</h5>
                <p class="text-muted small mb-0">{{ $user->email }}</p>
                <span class="badge bg-success mt-2">{{ ucfirst($user->role) }}</span>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <h5 class="mb-3"><i class="bi bi-grid text-success me-1"></i>Lapangan Saya</h5>
        @forelse($lapangans as $lapangan)
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/' . $lapangan->field_photo) }}" class="img-fluid rounded-start h-100" style="object-fit: cover;" alt="{{ $lapangan->field_name }}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start">
                                <h5 class="card-title">{{ $lapangan->field_name }}</h5>
                                <span class="badge bg-{{ $lapangan->approved ? 'success' : 'warning' }}">
                                    {{ $lapangan->approved ? 'Approved' : 'Pending' }}
                                </span>
                            </div>
                            <p class="card-text text-muted small"><i class="bi bi-geo-alt me-1"></i>{{ $lapangan->location }}</p>

                            @if($lapangan->pembayarans->isEmpty())
                                <p class="text-muted small mb-0">Belum ada pemesan.</p>
                            @else
                                <p class="fw-bold small mb-2 text-success">Daftar Pemesan:</p>
                                <div class="table-responsive">
                                    <table class="table table-sm table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>Telepon</th>
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
                                                    <td>{{ $pembayaran->phone_number }}</td>
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
                <i class="bi bi-grid text-muted" style="font-size: 3rem;"></i>
                <p class="text-muted mt-2">Kamu belum mendaftarkan lapangan.</p>
                <a href="{{ route('daftarkan-lapangan') }}" class="btn btn-success btn-sm">Daftarkan Sekarang</a>
            </div>
        @endforelse
    </div>
</div>
@endsection
