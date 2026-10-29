<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow mx-auto" style="max-width: 700px;">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Tambah Produk</h4>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('products.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Produk</label>
                    <input type="text" name="name" id="name"
                           class="form-control"
                           value="{{ old('name') }}"
                           placeholder="Masukkan nama produk" required>
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Kategori</label>
                    <input type="text" name="category" id="category"
                           class="form-control"
                           value="{{ old('category') }}"
                           placeholder="Masukkan kategori produk" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea name="description" id="description"
                              class="form-control"
                              placeholder="Masukkan deskripsi produk">{{ old('description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Harga</label>
                    <input type="number" name="price" id="price"
                           class="form-control"
                           value="{{ old('price') }}"
                           min="0" required>
                </div>

                <div class="mb-3">
                    <label for="stock" class="form-label">Stok</label>
                    <input type="number" name="stock" id="stock"
                           class="form-control"
                           value="{{ old('stock') }}"
                           min="0" required>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Gambar Produk</label>
                    <input type="file" name="image" id="image"
                           class="form-control"
                           accept="image/jpeg,image/png,image/webp">
                    <small class="text-muted">
                        Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                    </small>
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" name="is_active"
                           id="is_active" value="1"
                           class="form-check-input"
                           {{ old('is_active', '1') == '1' ? 'checked' : '' }}>
                    <label for="is_active" class="form-check-label">
                        Produk Aktif
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan Produk
                </button>

                <a href="{{ route('products.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>
        </div>
    </div>
</div>

</body>
</html>