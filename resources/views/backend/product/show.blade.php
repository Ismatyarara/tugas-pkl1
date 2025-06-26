@extends('layouts.backend')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <div class="card shadow-sm rounded-4 border-0">
                <div class="card-header bg-primary text-white rounded-top-4">
                    <h5 class="mb-0">📦 Detail Produk</h5>
                </div>

                <div class="card-body bg-light rounded-bottom-4">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="text-muted"><strong>Nama Produk:</strong></label>
                                <div class="fs-5">{{ $product->name }}</div>
                            </div>

                            <div class="mb-3">
                                <label class="text-muted"><strong>Harga:</strong></label>
                                <div class="text-success fs-6">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="text-muted"><strong>Kategori:</strong></label>
                                <div><span class="badge bg-info text-dark">{{ $product->category->name ?? '-' }}</span></div>
                            </div>

                            <div class="mb-3">
                                <label class="text-muted"><strong>Stok:</strong></label>
                                <div><span class="badge bg-warning text-dark">{{ $product->stock }}</span></div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="text-muted"><strong>Gambar:</strong></label><br>
                            @if($product->image)
                                <img src="{{ Storage::url($product->image) }}" alt="Gambar Produk" class="img-thumbnail rounded-3 shadow-sm"
                                    style="width: 180px; height: 180px; object-fit: cover;">
                            @else
                                <div class="text-muted fst-italic">Tidak ada gambar</div>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <label class="text-muted"><strong>Deskripsi:</strong></label>
                            <div class="border p-3 rounded bg-white text-muted" style="min-height: 120px;">
                                {{ $product->description }}
                            </div>
                        </div>
                    </div>

                    <div class="text-end">
                        <a href="{{ route('backend.product.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                            <i class="fas fa-arrow-left me-1"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
