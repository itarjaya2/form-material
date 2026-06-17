<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Docket</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Docket List</h2>

        <a href="{{ route('docket.create') }}" class="btn btn-primary">
            Tambah Docket
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Code</th>
                        <th>Design Number</th>
                        <th>Product</th>
                        <th>SAP</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($docket as $docket)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $docket->code }}</td>
                            <td>{{ $docket->designnumber }}</td>
                            <td>{{ $docket->product }}</td>
                            <td>{{ $docket->sap }}</td>
                            <td>{{ $docket->statusdocket }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                Belum ada data
                            </td>
                        </tr>

                    @endforelse

                </tbody>
            </table>

        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>