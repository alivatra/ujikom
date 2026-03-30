@extends('layout')

@section('content')

<div class="fade-in">
    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="stats-card">
                <i class="bi bi-book-fill fs-1 text-dark"></i>
                <div class="stats-number mt-2">{{ \App\Models\Buku::count() }}</div>
                <div class="text-dark fw-medium">Total Buku</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stats-card">
                <i class="bi bi-calendar-check fs-1 text-dark"></i>
                <div class="stats-number mt-2">{{ \App\Models\Buku::max('tahun') ?? '-' }}</div>
                <div class="text-dark fw-medium">Tahun Terbaru</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stats-card">
                <i class="bi bi-calendar-plus fs-1 text-dark"></i>
                <div class="stats-number mt-2">{{ \App\Models\Buku::min('tahun') ?? '-' }}</div>
                <div class="text-dark fw-medium">Tahun Terlama</div>
            </div>
        </div>
    </div>

    <!-- Main Card -->
    <div class="card card-custom">
        <div class="card-body p-4">
            <!-- Header Section -->
            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
                <h4 class="fw-bold mb-0">
                    <i class="bi bi-collection text-warning me-2"></i>
                    Data Buku
                </h4>
                <a href="{{ route('buku.create') }}" class="btn btn-cream">
                    <i class="bi bi-plus-circle me-2"></i>Tambah Buku
                </a>
            </div>

            <!-- Search Section -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <form action="{{ route('buku.index') }}" method="GET" class="d-flex gap-2">
                        <div class="search-box flex-grow-1">
                            <i class="bi bi-search"></i>
                            <input type="text" name="search" class="form-control form-control-custom"
                                placeholder="Cari judul, penulis, atau tahun..."
                                value="{{ $search ?? '' }}">
                        </div>
                        <button type="submit" class="btn btn-cream">
                            <i class="bi bi-search"></i>
                        </button>
                        @if($search)
                        <a href="{{ route('buku.index') }}" class="btn btn-outline-cream">
                            <i class="bi bi-x-circle"></i>
                        </a>
                        @endif
                    </form>
                </div>
            </div>

            <!-- Table Section -->
            @if($bukus->count() > 0)
            <div class="table-responsive">
                <table class="table table-custom">
                    <thead>
                        <tr>
                            <th width="50">No</th>
                            <th><i class="bi bi-book me-1"></i>Judul</th>
                            <th><i class="bi bi-person me-1"></i>Penulis</th>
                            <th><i class="bi bi-calendar me-1"></i>Tahun</th>
                            <th width="180"><i class="bi bi-gear me-1"></i>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bukus as $buku)
                        <tr>
                            <td class="text-center">
                                <span class="badge bg-light text-dark">
                                    {{ $loop->iteration + ($bukus->currentPage() - 1) * $bukus->perPage() }}
                                </span>
                            </td>
                            <td class="fw-medium">{{ $buku->judul }}</td>
                            <td>
                                <span class="badge badge-custom" style="background-color: var(--cream-dark);">
                                    <i class="bi bi-person-fill me-1"></i>{{ $buku->penulis }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-info">
                                    <i class="bi bi-calendar me-1"></i>{{ $buku->tahun }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <a href="{{ route('buku.show', $buku->id) }}"
                                        class="btn btn-action btn-view"
                                        title="Lihat Detail">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('buku.edit', $buku->id) }}"
                                        class="btn btn-action btn-edit"
                                        title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <button type="button"
                                        class="btn btn-action btn-delete"
                                        title="Hapus"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $buku->id }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Delete Modal -->
                        <div class="modal fade" id="deleteModal{{ $buku->id }}" tabindex="-1">
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
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-between align-items-center mt-4 flex-wrap gap-3">
                <div class="text-muted">
                    Menampilkan {{ $bukus->firstItem() }} - {{ $bukus->lastItem() }}
                    dari {{ $bukus->total() }} buku
                </div>
                <nav>
                    <ul class="pagination pagination-custom mb-0">
                        {{ $bukus->links('pagination::bootstrap-5') }}
                    </ul>
                </nav>
            </div>

            @else
            <!-- Empty State -->
            <div class="empty-state">
                <i class="bi bi-inbox"></i>
                <h5 class="fw-bold text-muted">Tidak Ada Data Buku</h5>
                <p class="text-muted">
                    @if($search)
                    Tidak ditemukan buku dengan kata kunci "{{ $search }}"
                    @else
                    Silakan tambah buku baru untuk memulai
                    @endif
                </p>
                @if(!$search)
                <a href="{{ route('buku.create') }}" class="btn btn-cream mt-2">
                    <i class="bi bi-plus-circle me-2"></i>Tambah Buku Pertama
                </a>
                @else
                <a href="{{ route('buku.index') }}" class="btn btn-outline-cream mt-2">
                    <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar
                </a>
                @endif
            </div>
            @endif
        </div>
    </div>
</div>

@endsection