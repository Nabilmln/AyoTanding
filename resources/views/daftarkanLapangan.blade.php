@extends('layouts.app')

@section('title', 'Daftarkan Lapangan — Ayotanding')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4 p-lg-5">
                <div class="text-center mb-4">
                    <div class="mx-auto d-flex align-items-center justify-content-center mb-3" style="width: 64px; height: 64px; background: var(--primary-soft); border-radius: 16px;">
                        <i class="bi bi-plus-square fs-2" style="color: var(--primary);"></i>
                    </div>
                    <h5 class="fw-bold mb-1">Daftarkan Lapangan</h5>
                    <p class="text-muted small mb-0">Isi data lapanganmu untuk mulai menerima penyewaan</p>
                </div>

                <form method="POST" action="{{ route('storeLapangan') }}" enctype="multipart/form-data">
                    @csrf

                    <h6 class="fw-bold mb-3" style="color: var(--primary);"><i class="bi bi-person me-2"></i>Data Pemilik</h6>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label for="full_name" class="form-label small fw-semibold">Nama Lengkap</label>
                            <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}" class="form-control @error('full_name') is-invalid @enderror" required>
                            @error('full_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label for="phone_number" class="form-label small fw-semibold">Nomor Ponsel</label>
                            <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" class="form-control @error('phone_number') is-invalid @enderror" required>
                            @error('phone_number')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label small fw-semibold">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required>
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <h6 class="fw-bold mb-3" style="color: var(--primary);"><i class="bi bi-file-earmark me-2"></i>Dokumen Pendukung</h6>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label for="identity_photo" class="form-label small fw-semibold">Foto Identitas (KTP/SIM)</label>
                            <input type="file" id="identity_photo" name="identity_photo" class="form-control @error('identity_photo') is-invalid @enderror" required accept="image/*">
                            <small class="text-muted">Format: JPG/PNG, maks 10MB</small>
                            @error('identity_photo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label for="ownership_proof" class="form-label small fw-semibold">Bukti Kepemilikan</label>
                            <input type="file" id="ownership_proof" name="ownership_proof" class="form-control @error('ownership_proof') is-invalid @enderror" required accept="image/*">
                            <small class="text-muted">Format: JPG/PNG, maks 10MB</small>
                            @error('ownership_proof')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <h6 class="fw-bold mb-3" style="color: var(--primary);"><i class="bi bi-info-circle me-2"></i>Informasi Lapangan</h6>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label for="field_name" class="form-label small fw-semibold">Nama Lapangan</label>
                            <input type="text" id="field_name" name="field_name" value="{{ old('field_name') }}" class="form-control @error('field_name') is-invalid @enderror" required>
                            @error('field_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label for="location" class="form-label small fw-semibold">Lokasi (Daerah)</label>
                            <input type="text" id="location" name="location" value="{{ old('location') }}" class="form-control @error('location') is-invalid @enderror" placeholder="Contoh: Kota Malang" required>
                            @error('location')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label for="jenis_lapangan_id" class="form-label small fw-semibold">Jenis Lapangan</label>
                            <select id="jenis_lapangan_id" name="jenis_lapangan_id" class="form-select @error('jenis_lapangan_id') is-invalid @enderror" required>
                                <option value="1">Sepak Bola</option>
                                <option value="2">Futsal</option>
                                <option value="3">Mini Soccer</option>
                                <option value="4">Basket</option>
                                <option value="5">Badminton</option>
                            </select>
                            @error('jenis_lapangan_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label for="layanan_pembayaran_id" class="form-label small fw-semibold">Layanan Pembayaran</label>
                            <select id="layanan_pembayaran_id" name="layanan_pembayaran_id" class="form-select @error('layanan_pembayaran_id') is-invalid @enderror" required>
                                <option value="1">BSI</option>
                                <option value="2">BCA</option>
                                <option value="3">BCA Syariah</option>
                                <option value="4">OVO</option>
                                <option value="5">GOPAY</option>
                            </select>
                            @error('layanan_pembayaran_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <label for="payment_option" class="form-label small fw-semibold">Nomor Rekening / E-Wallet</label>
                            <input type="text" id="payment_option" name="payment_option" value="{{ old('payment_option') }}" class="form-control @error('payment_option') is-invalid @enderror" placeholder="Contoh: BCA 1234567890 a/n Nama" required>
                            @error('payment_option')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <label for="full_address" class="form-label small fw-semibold">Alamat Lengkap</label>
                            <input type="text" id="full_address" name="full_address" value="{{ old('full_address') }}" class="form-control @error('full_address') is-invalid @enderror" required>
                            @error('full_address')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <label for="description" class="form-label small fw-semibold">Deskripsi Lapangan</label>
                            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="3" placeholder="Ceritakan tentang lapanganmu...">{{ old('description') }}</textarea>
                            @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <label for="field_photo" class="form-label small fw-semibold">Foto Lapangan</label>
                            <input type="file" id="field_photo" name="field_photo" class="form-control @error('field_photo') is-invalid @enderror" required accept="image/*">
                            <small class="text-muted">Format: JPG/PNG, maks 10MB</small>
                            @error('field_photo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <h6 class="fw-bold mb-3" style="color: var(--primary);"><i class="bi bi-clock me-2"></i>Sesi Waktu</h6>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <small class="text-muted">Tambahkan sesi waktu yang tersedia untuk disewa</small>
                        <button type="button" id="tambahSesi" class="btn btn-success btn-sm px-3">
                            <i class="bi bi-plus-lg me-1"></i>Tambah Sesi
                        </button>
                    </div>
                    <div id="sesiContainer" class="mb-4"></div>

                    <button type="submit" class="btn btn-success w-100 py-2 fw-bold">
                        <i class="bi bi-check-lg me-1"></i>Daftarkan Lapangan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const btn = document.getElementById('tambahSesi');
        const container = document.getElementById('sesiContainer');
        btn.addEventListener('click', function() {
            const card = document.createElement('div');
            card.className = 'card mb-2 border';
            card.innerHTML = `
                <div class="card-body py-3">
                    <div class="row g-2 align-items-end">
                        <div class="col-4">
                            <small class="text-muted d-block">Jam Mulai</small>
                            <input type="time" name="jam_mulai[]" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-4">
                            <small class="text-muted d-block">Jam Berakhir</small>
                            <input type="time" name="jam_berakhir[]" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-3">
                            <small class="text-muted d-block">Harga (Rp)</small>
                            <input type="number" name="harga[]" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-1">
                            <button type="button" class="btn btn-outline-danger btn-sm w-100" style="font-size: 1.2rem; line-height: 1;">&times;</button>
                        </div>
                    </div>
                </div>
            `;
            card.querySelector('.btn-outline-danger').addEventListener('click', () => card.remove());
            container.appendChild(card);
        });
    });
</script>
@endpush
