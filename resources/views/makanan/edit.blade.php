<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Edit Data Makanan</title>
</head>
<body>
    <div class= "container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Data</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ url('/makanan') }}" enctype="multipart/form-data">Back</a>
                </div>
            </div>
        </div>

        @if (session('status'))
           <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
           </div>
        @endif
        <form action="{{ route('update', $makanans->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama Makanan : </strong>
                        <input type="text" name="nama_makanan" 
                           class="form-control" placeholder="Nama Makanan" value="{{ old("nama_makanan", $makanans->nama_makanan) }}">
                        @error('nama_makanan')
                           <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Asal Makanan : </strong>
                        <input type="text" name="asal_makanan" class="form-control" placeholder="Asal Makanan" value="{{ $makanans->asal_makanan }}">
                        @error('asal_makanan')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Bahan Makanan :</strong>
                        <input type="text" name="bahan_makanan" class="form-control" placeholder="Bahan Makanan" value="{{ $makanans->bahan_makanan }}">
                        @error('bahan_makanan')
                           <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Gambar Makanan :</strong>
                        <input type="file" name="gambar_makanan" class="form-control" placeholder="Gambar Makanan" value="{{ $makanans->gambar_makanan }}">
                        @error('gambar_makanan')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
