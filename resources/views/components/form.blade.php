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