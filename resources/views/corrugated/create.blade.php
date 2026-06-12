<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Corrugated</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header">
            <h3>Tambah Data corrugated</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('corrugated.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Item</label>
                    <input type="text"
                           name="item"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis</label>
                    <input type="text"
                           name="jenis"
                           class="form-control"
                           required>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Gramasi</label>
                        <input type="number"
                               name="gramasi"
                               class="form-control"
                               required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Panjang</label>
                        <input type="number"
                               name="panjang"
                               class="form-control"
                               required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Lebar</label>
                        <input type="number"
                               name="lebar"
                               class="form-control"
                               required>
                    </div>

                    
                </div>

                <div class="mb-3">
                    <label class="form-label">Specs</label>
                    <input type="text"
                           name="specs"
                           class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Qty</label>
                    <input type="number"
                           name="qty"
                           class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Unit</label>
                    <input type="text"
                           name="unit"
                           class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>

                <a href="{{ route('corrugated.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>
</div>

</body>
</html> 