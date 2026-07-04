@extends('layouts.app')

@section('title', 'Tiket — Ayotanding')

@section('content')
<h4 class="mb-4"><i class="bi bi-ticket text-success me-2"></i>Tiket Pemesanan</h4>

@if($pembayarans->isEmpty())
    <div class="text-center py-5">
        <i class="bi bi-ticket text-muted" style="font-size: 4rem;"></i>
        <p class="text-muted mt-3">Belum ada tiket. Yuk booking lapangan!</p>
        <a href="{{ route('main') }}" class="btn btn-success"><i class="bi bi-grid me-1"></i>Cari Lapangan</a>
    </div>
@else
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-success">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Telepon</th>
                            <th>Email</th>
                            <th>Lapangan</th>
                            <th>Tanggal</th>
                            <th>Sesi</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pembayarans as $index => $pembayaran)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $pembayaran->full_name }}</td>
                                <td>{{ $pembayaran->phone_number }}</td>
                                <td>{{ $pembayaran->email }}</td>
                                <td>{{ $pembayaran->lapangan->field_name }}</td>
                                <td>{{ \Carbon\Carbon::parse($pembayaran->booking_date)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($pembayaran->fase->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($pembayaran->fase->jam_berakhir)->format('H:i') }}</td>
                                <td>Rp{{ number_format($pembayaran->total_price, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endif
@endsection
