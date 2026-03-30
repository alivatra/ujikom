@extends('layout')

@section('content')

<div class="fade-in">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card card-custom">
                <div class="card-body p-4">
                    <!-- Header -->
                    <div class="text-center mb-4">
                        <div class="avatar-circle-edit mx-auto mb-3">
                            <i class="bi bi-pencil-square fs-1"></i>
                        </div>
                        <h4 class="fw-bold">
                            <i class="bi bi-pencil-circle text-warning me-2"></i>
                            Edit Buku
                        </h4>
                        <p class="text-muted">Perbarui data buku dengan lengkap</p>
                    </div>

                    <!-- Form -->
                    <form action="{{ route('buku.update', $buku->id) }}" method="POST" id="bukuForm">
                        @csrf
                        @method('PUT')

                        <!-- Judul Field -->
                        <div class="mb-4">
                            <label for="judul" class="form-label">
                                <i class="bi bi-book-half me-2"></i>Judul Buku
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="bi bi-book"></i>
                                </span>
                                <input type="text"
                                    class="form-control form-control-custom @error('judul') is-invalid @enderror"
                                    id="judul"
                                    name="judul"
                                    value="{{ old('judul', $buku->judul) }}"
                                    placeholder="Masukkan judul buku"
                                    required
                                    minlength="3"
                                    maxlength="255">
                            </div>
                            @error('judul')
                            <div class="invalid-feedback d-block">
                                <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                            </div>
                            @else
                            <small class="text-muted">Minimal 3 karakter</small>
                            @enderror
                        </div>

                        <!-- Penulis Field -->
                        <div class="mb-4">
                            <label for="penulis" class="form-label">
                                <i class="bi bi-person-fill me-2"></i>Penulis
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="bi bi-person"></i>
                                </span>
                                <input type="text"
                                    class="form-control form-control-custom @error('penulis') is-invalid @enderror"
                                    id="penulis"
                                    name="penulis"
                                    value="{{ old('penulis', $buku->penulis) }}"
                                    placeholder="Masukkan nama penulis"
                                    required
                                    minlength="3"
                                    maxlength="255">
                            </div>
                            @error('penulis')
                            <div class="invalid-feedback d-block">
                                <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                            </div>
                            @else
                            <small class="text-muted">Minimal 3 karakter</small>
                            @enderror
                        </div>

                        <!-- Tahun Field -->
                        <div class="mb-4">
                            <label for="tahun" class="form-label">
                                <i class="bi bi-calendar-event me-2"></i>Tahun Terbit
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="bi bi-calendar"></i>
                                </span>
                                <input type="number"
                                    class="form-control form-control-custom @error('tahun') is-invalid @enderror"
                                    id="tahun"
                                    name="tahun"
                                    value="{{ old('tahun', $buku->tahun) }}"
                                    placeholder="Masukkan tahun terbit"
                                    required
                                    min="1900"
                                    max="{{ date('Y') }}">
                            </div>
                            @error('tahun')
                            <div class="invalid-feedback d-block">
                                <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                            </div>
                            @else
                            <small class="text-muted">Tahun antara 1900 - {{ date('Y') }}</small>
                            @enderror
                        </div>

                        <!-- Info Card -->
                        <div class="alert alert-light border-start border-4 border-info mb-4">
                            <i class="bi bi-info-circle me-2"></i>
                            <strong>Tips:</strong> Pastikan data yang Anda masukkan sudah benar sebelum menyimpan.
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex gap-3">
                            <button type="submit" class="btn btn-cream flex-grow-1">
                                <i class="bi bi-check-circle me-2"></i>Update Buku
                            </button>
                            <a href="{{ route('buku.index') }}" class="btn btn-outline-cream flex-grow-1">
                                <i class="bi bi-arrow-left me-2"></i>Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .avatar-circle-edit {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #ffc107 0%, #e0a800 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--text-dark);
        box-shadow: 0 5px 20px rgba(255, 193, 7, 0.5);
    }

    .input-group-text {
        border: 2px solid #e0e0e0;
        border-right: none;
        border-radius: 10px 0 0 10px;
    }

    .form-control-custom {
        border-radius: 0 10px 10px 0;
    }

    .input-group {
        flex-wrap: nowrap;
    }
</style>

@endsection