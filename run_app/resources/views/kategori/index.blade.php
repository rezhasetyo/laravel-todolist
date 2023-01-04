@extends('template/master')

@section('content')
<div class="pagetitle">
    <h1>Data Kategori</h1>
    <nav>
        <ol class="breadcrumb h2">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active">Tabel Kategori</li>
        </ol>
    </nav>
</div>
  
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary mt-3 mb-3" type="button" data-bs-toggle="modal" data-bs-target="#createModal">Tambah Kategori</a>
                    
                    <!-- TABLE -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col" class="col-1">ID</th>
                                <th scope="col" class="col-3">Nama</th>
                                <th scope="col" class="col-1">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($datas as $key=>$value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->nama }}</td>
                                <td>
                                    <!-- Button Modal Edit -->
                                    <a class="btn btn-primary btn-sm mt-1" type="button" data-bs-toggle="modal" data-bs-target="#editModal{{ $value->id }}">Edit</a>
                
                                    <!-- Button Modal Delete -->
                                    <a class="btn btn-danger btn-sm mt-1" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $value->id }}">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- END TABLE -->
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Modal Create -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form  method="POST" action="{{ url('kategori') }}">
            @csrf
            {{-- Modal Header --}}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            {{-- Modal Body --}}
            <div class="modal-body">
                <div class="form-group">
                    <label><b>Nama</b></label>
                    <input class="form-control" name="nama">
                </div> 
                @error('nama')
                    <div style="color:red;">    {{ $message }}  </div>
                @enderror
                <br>
            </div>

            {{-- Modal Footer --}}
            <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div>

            </form>
        </div>
    </div>
</div>


<!-- Modal Edit -->
@foreach($datas as $key=>$value)
<div class="modal fade" id="editModal{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form  method="POST" action="{{ url('kategori/'. $value->id) }}">
            @csrf
            <input type="hidden" name="_method" value="PATCH">
            {{-- Modal Header --}}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            {{-- Modal Body --}}
            <div class="modal-body">
                <div class="form-group">
                    <label><b>Nama</b></label>
                    <input class="form-control" name="nama" value="{{ $value->nama }}">
                </div>
                @error('nama')
                    <div class="mb-3" style="color:red;">   {{ $message }}  </div>
                @enderror
                <br>
            </div>

            {{-- Modal Footer --}}
            <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit">Edit</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach


<!-- Modal Delete -->
@foreach($datas as $key=>$value)
<div class="modal fade" id="deleteModal{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Kategori</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                Apakah anda ingin menghapus data ini ?
            </div>
            
            {{-- Form action delete in footer --}}
            <form action="{{ url('kategori/'.$value->id) }}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="Delete">
                <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-danger" type="submit">Hapus</button>
                </div>
            </form>
            
        </div>
    </div>
</div>
@endforeach



@endsection