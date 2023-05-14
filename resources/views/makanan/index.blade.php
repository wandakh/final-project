<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Project Data Makanan</title>
</head>
<body>
        
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Data Makanan</h2>
                </div>
                <div class="pull-right mb-2">
                    {{--  ini url di route yang buat nampilin form create data --}}
                    <a class="btn btn-success" href="{{ url('makanan/data/create') }}">Create Data Makanan</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Nama Makanan</th>
                <th>Asal Makanan</th>
                <th>Bahan Makanan</th>
                <th>Gambar Makanan</th>
                <th width="280px">Action</th>
            </tr>
            {{-- variabel $data ini diambil dari method index di MakananController  --}}
            @foreach ($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nama_makanan }}</td>
                <td>{{ $item->asal_makanan }}</td>
                <td>{{ $item->bahan_makanan }}</td>
                {{-- <td>{{ $item->gambar_makanan }}</td> --}}
                <td><img src="/gambar_makanan/{{ $item->gambar_makanan }}" width="150px"></td>
                <td>

                {{-- route aksi untuk hapus --}}
                <form action="{{ url("/makanan/$item->id") }}" method="Post">
                    {{-- route aksi untuk edit --}}
                    <a class="btn btn-primary" href="{{ route('edit', $item->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>  
                </form>
              </td>
          </tr> 
            @endforeach
        </table>    

</body>

</html>