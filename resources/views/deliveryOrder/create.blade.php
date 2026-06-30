<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Order</title>

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
            <h3 class="mb-0">Delivery Order</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('delivery-order.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="ekspedisi" class="form-label">ekspedisi</label>
                    <input
                        type="text"
                        id="ekspedisi"
                        name="ekspedisi"
                        class="form-control"
                        required>
                </div>

                <div class="mb-3">
                    <label for="no_polisi" class="form-label">no_polisi</label>
                    <input
                        type="text"
                        id="no_polisi"
                        name="no_polisi"
                        class="form-control"
                        required>
                </div>

                <div class="mb-3">
                    <label for="barang" class="form-label">barang</label>
                    <input type="text"
                               name="barang"
                               class="form-control"
                               required>
                </div>
                <div class="mb-3">
                    <label for="Catatan" class="form-label">Catatan</label>
                    <input type="text"
                           name="catatan"
                           class="form-control">
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>

                    <a href="{{ route('delivery-order.index') }}"
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