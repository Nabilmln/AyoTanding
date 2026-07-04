@extends('layouts.app')

@section('title', 'Daftarkan Lapangan — Ayotanding')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body p-4">
                <div class="text-center mb-4">
                    <i class="bi bi-plus-square text-success" style="font-size: 3rem;"></i>
                    <h4 class="mt-2">Daftarkan Lapangan</h4>
                    <p class="text-muted small">Isi data berikut untuk mendaftarkan lapanganmu</p>
                </div>

                <form method="POST" action="{{ route('storeLapangan') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="full_name" class="form-label">Nama Lengkap</label>
                            <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}" class="form-control @error('full_name') is-invalid @enderror" required>
                            @error('full_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone_number" class="form-label">Nomor Ponsel</label>
                            <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" class="form-control @error('phone_number') is-invalid @enderror" required>
                            @error('phone_number')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required>
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <hr class="my-3">
                    <h6 class="fw-bold text-success"><i class="bi bi-file-earmark me-1"></i>Dokumen</h6>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="identity_photo" class="form-label">Foto Identitas (KTP/SIM)</label>
                            <input type="file" id="identity_photo" name="identity_photo" class="form-control @error('identity_photo') is-invalid @enderror" required accept="image/*">
                            @error('identity_photo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="ownership_proof" class="form-label">Bukti Kepemilikan</label>
                            <input type="file" id="ownership_proof" name="ownership_proof" class="form-control @error('ownership_proof') is-invalid @enderror" required accept="image/*">
                            @error('ownership_proof')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <hr class="my-3">
                    <h6 class="fw-bold text-success"><i class="bi bi-info-circle me-1"></i>Informasi Lapangan</h6>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="field_name" class="form-label">Nama Lapangan</label>
                            <input type="text" id="field_name" name="field_name" value="{{ old('field_name') }}" class="form-control @error('field_name') is-invalid @enderror" required>
                            @error('field_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="location" class="form-label">Lokasi (Daerah)</label>
                            <input type="text" id="location" name="location" value="{{ old('location') }}" class="form-control @error('location') is-invalid @enderror" required>
                            @error('location')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="jenis_lapangan_id" class="form-label">Jenis Lapangan</label>
                            <select id="jenis_lapangan_id" name="jenis_lapangan_id" class="form-select @error('jenis_lapangan_id') is-invalid @enderror" required>
                                <option value="1">Sepak Bola</option>
                                <option value="2">Futsal</option>
                                <option value="3">Mini Soccer</option>
                                <option value="4">Basket</option>
                                <option value="5">Badminton</option>
                            </select>
                            @error('jenis_lapangan_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="layanan_pembayaran_id" class="form-label">Layanan Pembayaran</label>
                            <select id="layanan_pembayaran_id" name="layanan_pembayaran_id" class="form-select @error('layanan_pembayaran_id') is-invalid @enderror" required>
                                <option value="1">BSI</option>
                                <option value="2">BCA</option>
                                <option value="3">BCA Syariah</option>
                                <option value="4">OVO</option>
                                <option value="5">GOPAY</option>
                            </select>
                            @error('layanan_pembayaran_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="payment_option" class="form-label">Alamat Pembayaran (No. Rekening / No. HP)</label>
                        <input type="text" id="payment_option" name="payment_option" value="{{ old('payment_option') }}" class="form-control @error('payment_option') is-invalid @enderror" required>
                        @error('payment_option')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="full_address" class="form-label">Alamat Lengkap</label>
                        <input type="text" id="full_address" name="full_address" value="{{ old('full_address') }}" class="form-control @error('full_address') is-invalid @enderror" required>
                        @error('full_address')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description') }}</textarea>
                        @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="field_photo" class="form-label">Foto Lapangan</label>
                        <input type="file" id="field_photo" name="field_photo" class="form-control @error('field_photo') is-invalid @enderror" required accept="image/*">
                        @error('field_photo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <hr class="my-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="fw-bold text-success mb-0"><i class="bi bi-clock me-1"></i>Sesi Waktu</h6>
                        <button type="button" id="tambahSesi" class="btn btn-outline-success btn-sm">
                            <i class="bi bi-plus-lg me-1"></i>Tambah Sesi
                        </button>
                    </div>
                    <div id="sesiContainer" class="mt-3"></div>

                    <button type="submit" class="btn btn-success w-100 py-2 mt-4">
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
        const tambahSesiBtn = document.getElementById('tambahSesi');
        const sesiContainer = document.getElementById('sesiContainer');
        let sesiCount = 0;

        tambahSesiBtn.addEventListener('click', function() {
            sesiCount++;
            const card = document.createElement('div');
            card.className = 'card mb-2 border-success border-opacity-25';
            card.innerHTML = `
                <div class="card-body py-2">
                    <div class="row align-items-end">
                        <div class="col-4">
                            <small class="text-muted">Jam Mulai</small>
                            <input type="time" name="jam_mulai[]" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-4">
                            <small class="text-muted">Jam Berakhir</small>
                            <input type="time" name="jam_berakhir[]" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-3">
                            <small class="text-muted">Harga (Rp)</small>
                            <input type="number" name="harga[]" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-1">
                            <button type="button" class="btn btn-outline-danger btn-sm hapus-sesi">&times;</button>
                        </div>
                    </div>
                </div>
            `;
            sesiContainer.appendChild(card);

            card.querySelector('.hapus-sesi').addEventListener('click', function() {
                card.remove();
                sesiCount--;
            });
        });
    });
</script>
@endpush
