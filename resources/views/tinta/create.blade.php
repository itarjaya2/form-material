<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Corrugated</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow">
        <div class="card-header">
            <h3 class="mb-0">Tambah Data Tinta</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('tinta.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="item" class="form-label">Item</label>
                    <input
                        type="text"
                        id="item"
                        name="item"
                        class="form-control"
                        required>
                </div>

                <div class="mb-3">
                    <label for="specs" class="form-label">Specs</label>
                    <input
                        type="text"
                        id="specs"
                        name="specs"
                        class="form-control"
                        required>
                </div>
                <div class="mb-3">
                    <label for="qty" class="form-label">Qty</label>
                    <input type="number"
                               name="qty"
                               class="form-control"
                               required>
                </div>
                <div class="mb-3">
                    <label for="specs" class="form-label">Unit</label>
                    <input
                        type="text"
                        id="unit"
                        name="unit"
                        class="form-control"
                        required>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>

                    <a href="{{ route('tinta.index') }}"
                       class="btn btn-secondary">
                        Kembali
                    </a>
                </div>

            </form>
        </div>
    </div>

</div>

</body>
</html>