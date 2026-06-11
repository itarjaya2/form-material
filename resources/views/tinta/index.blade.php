<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Tinta</title>
  </head>
  <body>
    {{-- navbar --}}
     <x-navbar />

     <div class="container mt-5">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between mb-3">
        <h2>Data Tinta</h2>

        {{-- <a href="{{ route('tinta.create') }}" class="btn btn-primary">
            Tambah Data
        </a> --}}
    </div>
     <div class="text-end mb-3">
            <a href="{{ route('tinta.create') }}" class="btn btn-primary">
                Tambah Data
            </a>
        </div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis</th>
                <th>Material</th>
                <th>Panjang</th>
                <th>Lebar</th>
                <th>Tinggi</th>
                <th>Spesifikasi</th>
                <th>Kode</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tintas as $tinta)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tinta->nama }}</td>
                    <td>{{ $tinta->jenis }}</td>
                    <td>{{ $tinta->material }}</td>
                    <td>{{ $tinta->panjang }}</td>
                    <td>{{ $tinta->lebar }}</td>
                    <td>{{ $tinta->tinggi }}</td>
                    <td>{{ $tinta->spesifikasi }}</td>
                    <td>{{ $tinta->kode }}</td>
                    <td>
                        {{-- <a href="{{ route('tinta.edit', $tinta->id) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a> --}}

                        <form action="{{ route('tinta.destroy', $tinta->id) }}"
                              method="POST"
                              class="d-inline">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus data ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">
                        Belum ada data tinta
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>