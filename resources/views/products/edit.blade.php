<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Produk - Market Sabu</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7">

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Market Sabu</h4>
                    <small>Edit Produk</small>
                </div>

                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Periksa kembali data yang dimasukkan:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('products.update', $product->id) }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">
                                Nama Produk
                            </label>

                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="form-control"
                                value="{{ old('name', $product->name) }}"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">
                                Kategori
                            </label>

                            <input
                                type="text"
                                name="category"
                                id="category"
                                class="form-control"
                                value="{{ old('category', $product->category) }}"
                            >
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">
                                Deskripsi Produk
                            </label>

                            <textarea
                                name="description"
                                id="description"
                                class="form-control"
                                rows="3"
                            >{{ old('description', $product->description) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">
                                Harga Produk (Rp)
                            </label>

                            <input
                                type="number"
                                name="price"
                                id="price"
                                class="form-control"
                                value="{{ old('price', $product->price) }}"
                                min="0"
                                step="any"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label for="stock" class="form-label">
                                Stok Produk
                            </label>

                            <input
                                type="number"
                                name="stock"
                                id="stock"
                                class="form-control"
                                value="{{ old('stock', $product->stock) }}"
                                min="0"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Gambar Produk Saat Ini
                            </label>

                            <div>
                                @if ($product->image)
                                    <img
                                        src="{{ asset('storage/' . $product->image) }}"
                                        alt="{{ $product->name }}"
                                        width="120"
                                        height="120"
                                        class="rounded border mb-2"
                                        style="object-fit: cover;"
                                    >
                                @else
                                    <p class="text-muted">
                                        Belum ada gambar produk.
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">
                                Ganti Gambar Produk (Opsional)
                            </label>

                            <input
                                type="file"
                                name="image"
                                id="image"
                                class="form-control"
                                accept=".jpg,.jpeg,.png,.webp"
                            >

                            <small class="text-muted">
                                Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                                Kosongkan jika tidak ingin mengganti gambar.
                            </small>
                        </div>

                        <div class="form-check mb-4">
                            <input
                                type="checkbox"
                                name="is_active"
                                id="is_active"
                                class="form-check-input"
                                value="1"
                                {{ old('is_active', $product->is_active ?? false) ? 'checked' : '' }}
                            >

                            <label for="is_active" class="form-check-label">
                                Produk Aktif
                            </label>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                Update Produk
                            </button>

                            <a href="{{ route('products.index') }}"
                               class="btn btn-secondary">
                                Kembali
                            </a>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>