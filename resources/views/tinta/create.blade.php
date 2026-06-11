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
     {{-- form --}}
     <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <form action="{{ route('tinta.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nama" class="form-label">Nama Tinta</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="merk" class="form-label">Jenis</label>
                        <input type="text" class="form-control" id="jenis" name="jenis">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="warna" class="form-label">Material</label>
                        <input type="text" class="form-control" id="material" name="material">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="jenis" class="form-label">Panjang</label>
                        <input type="text" class="form-control" id="panjang" name="panjang"
                    </div>
                </div class="row">
                <div class="col-md-6 mb-3">
                    <label for="volume" class="form-label">Lebar</label>
                    <input type="text" class="form-control" id="lebar" name="lebar"
                    
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="kode_produk" class="form-label">Tinggi</label>
                </div>
                        <input type="text" class="form-control" id="tinggi" name="tinggi">
                    </div>
                    
                    <div class="col-6 mb-3">
                        <label for="spesifikasi" class="form-label">Spesifikasi</label>
                        <textarea class="form-control" id="spesifikasi" name="spesifikasi" rows="3"></textarea>
                    </div>
                    
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary w-100">
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
            </form>

        </div>
    </div>
</div>

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