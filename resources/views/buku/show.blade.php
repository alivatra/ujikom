@extends('layout')

@section('content')

<div class="fade-in">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card card-custom">
                <div class="card-body p-4">
                    <!-- Header -->
                    <div class="text-center mb-4">
                        <div class="avatar-circle-show mx-auto mb-3">
                            <i class="bi bi-book fs-1"></i>
                        </div>
                        <h4 class="fw-bold">
                            <i class="bi bi-info-circle text-info me-2"></i>
                            Detail Buku
                        </h4>
                        <p class="text-muted">Informasi lengkap tentang buku</p>
                    </div>

                    <!-- Detail Card -->
                    <div class="detail-card p-4 mb-4">
                        <div class="detail-item mb-3">
                            <div class="d-flex align-items-center">
                                <div class="icon-box me-3">
                                    <i class="bi bi-book-half"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <small class="text-muted d-block">Judul Buku</small>
                                    <span class="fw-bold fs-5">{{ $buku->judul }}</span>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="detail-item mb-3">
                            <div class="d-flex align-items-center">
                                <div class="icon-box me-3">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <small class="text-muted d-block">Penulis</small>
                                    <span class="fw-bold fs-5">{{ $buku->penulis }}</span>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="detail-item mb-3">
                            <div class="d-flex align-items-center">
                                <div class="icon-box me-3">
                                    <i class="bi bi-calendar-event"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <small class="text-muted d-block">Tahun Terbit</small>
                                    <span class="fw-bold fs-5">{{ $buku->tahun }}</span>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="detail-item">
                            <div class="d-flex align-items-center">
                                <div class="icon-box me-3">
                                    <i class="bi bi-clock"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <small class="text-muted d-block">Dibuat Pada</small>
                                    <span class="fw-bold">{{ $buku->created_at->format('d F Y, H:i') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex gap-3">
                        <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-cream flex-grow-1">
                            <i class="bi bi-pencil me-2"></i>Edit Buku
                        </a>
                        <button type="button" class="btn btn-danger flex-grow-1" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <i class="bi bi-trash me-2"></i>Hapus
                        </button>
                    </div>

                    <div class="text-center mt-3">
                        <a href="{{ route('buku.index') }}" class="btn btn-outline-cream">
                            <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-content-custom">
            <div class="modal-header-custom">
                <h5 class="modal-title fw-bold">
                    <i class="bi bi-exclamation-triangle text-danger me-2"></i>
                    Konfirmasi Hapus
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <p class="mb-3">Apakah Anda yakin ingin menghapus buku:</p>
                <div class="alert alert-light">
                    <strong>{{ $buku->judul }}</strong><br>
                    <small class="text-muted">oleh {{ $buku->penulis }} ({{ $buku->tahun }})</small>
                </div>
                <p class="text-muted mb-0">Tindakan ini tidak dapat dibatalkan!</p>
            </div>
            <div class="modal-footer border-0 p-3">
                <button type="button" class="btn btn-outline-cream" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle me-1"></i>Batal
                </button>
                <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash me-1"></i>Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .avatar-circle-show {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, var(--info) 0%, #138496 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        box-shadow: 0 5px 20px rgba(23, 162, 184, 0.5);
    }

    .detail-card {
        background: linear-gradient(135deg, var(--cream-light) 0%, #fff 100%);
        border-radius: 15px;
        border: 1px solid var(--cream);
    }

    .icon-box {
        width: 45px;
        height: 45px;
        background: linear-gradient(135deg, var(--cream) 0%, var(--cream-dark) 100%);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        color: var(--text-dark);
    }

    hr {
        border-color: var(--cream);
        opacity: 0.5;
    }
</style>

@endsection