<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Docket</title>

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
            <h3 class="mb-0">Tambah Data Docket/h3>
        </div>

        <div class="card-body">
            <form action="{{ route('docket.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="card mb-3">
                        <div class="card-header">
                            Header
                        </div>

                        <div class="card-body row">

                            <div class="col-md-4 mb-3">
                                <label>Code</label>
                                <input type="text" name="code" class="form-control">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>Design Number</label>
                                <input type="text" name="designnumber" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Source type</label>
                                <input type="text" name="source_type" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Label</label>
                                <input type="text" name="label" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>jenis</label>
                                <input type="text" name="jenis" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Bom_id</label>
                                <input type="text" name="bom_id" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Product</label>
                                <input type="text" name="product" class="form-control">
                            </div>
                             <div class="col-md-4 mb-3">
                                <label>SAP</label>
                                <input type="text" name="sap" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>original</label>
                                <input type="text" name="original" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>design</label>
                                <input type="text" name="design" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>act color</label>
                                <input type="text" name="actcolor" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>status order</label>
                                <input type="text" name="statusorder" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>finishing job</label>
                                <input type="text" name="finishingjob" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>acuan warna</label>
                                <input type="text" name="acuan warna" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>acuan diecut</label>
                                <input type="text" name="acuandiecut" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>packing</label>
                                <input type="text" name="packing" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>nops</label>
                                <input type="text" name="nops" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>box name</label>
                                <input type="text" name="boxname" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>box specs</label>
                                <input type="text" name="boxspecs" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>box size</label>
                                <input type="text" name="box size" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>nwbox</label>
                                <input type="text" name="nwbox" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>nwpcs</label>
                                <input type="text" name="nwpcs" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>estimasipackaging</label>
                                <input type="text" name="estimasipackaging" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>ukrperbendel</label>
                                <input type="text" name="ukrperbendel" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>boxdalampanjang</label>
                                <input type="text" name="boxdalampanjang" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>boxdalamlebar</label>
                                <input type="text" name="boxdalamlebar" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>boxdalamtinggir</label>
                                <input type="text" name="boxdalamtinggi" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>boxluarpanjang</label>
                                <input type="text" name="boxluarpanjang" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>boxluarlebar</label>
                                <input type="text" name="boxluarlebar" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>boxluartinggi</label>
                                <input type="text" name="boxluartinggi" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>effective</label>
                                <input type="text" name="effective" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>preparedate</label>
                                <input type="text" name="preparedate" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>supplier</label>
                                <input type="text" name="supplier" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>isi</label>
                                <input type="text" name="isi" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>isiboxsap</label>
                                <input type="text" name="isiboxsap" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>sapataubendel</label>
                                <input type="text" name="sapataubendel" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>susunan</label>
                                <input type="text" name="susunan" class="form-control">
                            </div>                     

                        </div>
                    </div>
                      <div class="card mb-3">
                            <div class="card-header">
                            Upload Gambar
                            </div>

                                <div class="card-body row">

                            @for($i = 1; $i <= 10; $i++)
                                <div class="col-md-6 mb-3">
                                    <label>Gambar {{ $i }}</label>
                                    <input type="file"
                                        name="gambar{{ $i }}"
                                        class="form-control">
                                </div>
                            @endfor

                        </div>

                    <div class="card mb-3">
                        <div class="card-header">
                            Front Color
                        </div>

                        <div class="card-body row">

                            @for($i = 1; $i <= 6; $i++)
                                <div class="col-md-2 mb-3">
                                    <label>F{{ $i }}</label>
                                    <input type="text"
                                        name="f{{ $i }}"
                                        class="form-control">
                        </div>
                            @endfor

                    </div>
                    <div class="card mb-3">
                        <div class="card-header">
                            zzz
                        </div>

                        <div class="card-body row">
                            <div class="col-md-4 mb-3">
                                <label>note packaging</label>
                                <input type="text" name="notepackaging" class="form-control">
                            </div> 
                            <div class="col-md-4 mb-3">
                                <label>aplikasi</label>
                                <input type="text" name="aplikasi" class="form-control">
                            </div> 
                            <div class="col-md-4 mb-3">
                                <label>up</label>
                                <input type="text" name="up" class="form-control">
                            </div> 
                            <div class="col-md-4 mb-3">
                                <label>sidea</label>
                                <input type="text" name="sidea" class="form-control">
                            </div> 
                            <div class="col-md-4 mb-3">
                                <label>sideb</label>
                                <input type="text" name="sideb" class="form-control">
                            </div> 
                            <div class="col-md-4 mb-3">
                                <label>upsidea</label>
                                <input type="text" name="upsidea" class="form-control">
                            </div> 
                            <div class="col-md-4 mb-3">
                                <label>upsideb</label>
                                <input type="text" name="upsideb" class="form-control">
                            </div> 
                            <div class="col-md-4 mb-3">
                                <label>ukrpresslayuot</label>
                                <input type="text" name="ukrpresslayuot" class="form-control">
                            </div> 
                            <div class="col-md-4 mb-3">
                                <label>mat1</label>
                                <input type="text" name="mat1" class="form-control">
                            </div> 
                            <div class="col-md-4 mb-3">
                                <label>mat2</label>
                                <input type="text" name="mat2" class="form-control">
                            </div> 
                            <div class="col-md-4 mb-3">
                                <label>mat3</label>
                                <input type="text" name="mat3" class="form-control">
                            </div> 
                            <div class="col-md-4 mb-3">
                                <label>specsmat1</label>
                                <input type="text" name="specsmat1" class="form-control">
                            </div> 
                            <div class="col-md-4 mb-3">
                                <label>specsmat2</label>
                                <input type="text" name="specsmat2" class="form-control">
                            </div> 
                            <div class="col-md-4 mb-3">
                                <label>specsmat3</label>
                                <input type="text" name="specsmat3" class="form-control">
                            </div> 
                            <div class="col-md-4 mb-3">
                                <label>as1</label>
                                <input type="text" name="as1" class="form-control">
                            </div> 
                            <div class="col-md-4 mb-3">
                                <label>as2</label>
                                <input type="text" name="as2" class="form-control">
                            </div> 
                            <div class="col-md-4 mb-3">
                                <label>as3</label>
                                <input type="text" name="as3" class="form-control">
                            </div> 
                            <div class="col-md-4 mb-3">
                                <label>pisau</label>
                                <input type="text" name="pisau" class="form-control">
                            </div> 
                            <div class="col-md-4 mb-3">
                                <label>citto</label>
                                <input type="text" name="citto" class="form-control">
                            </div> 
                            <div class="col-md-4 mb-3">
                                <label>emboss</label>
                                <input type="text" name="emboss" class="form-control">
                            </div> 
                            <div class="col-md-4 mb-3">
                                <label>hotprint</label>
                                <input type="text" name="hotprint" class="form-control">
                            </div> 
                            <div class="col-md-4 mb-3">
                                <label>note1</label>
                                <input type="text" name="note1" class="form-control">
                            </div> 
                            <div class="col-md-4 mb-3">
                                <label>note2</label>
                                <input type="text" name="note2" class="form-control">
                            </div> 
                            <div class="col-md-4 mb-3">
                                <label>note3</label>
                                <input type="text" name="note3" class="form-control">
                            </div> 
                            <div class="col-md-4 mb-3">
                                <label>notedesignrequest</label>
                                <input type="text" name="notedesignrequest" class="form-control">
                            </div> 
                          
                        </div>
                           

                    </div>

                    </div>

                    </div>

                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>

                </form>

        </div>
    </div>

</div>

</body>
</html>