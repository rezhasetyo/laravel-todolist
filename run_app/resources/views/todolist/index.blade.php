@extends('template/master')

@section('content')
<div class="pagetitle">
    <h1>Data Todolist</h1>
    <nav>
        <ol class="breadcrumb h2">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active">Tabel Todolist</li>
        </ol>
    </nav>
</div>
  
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary mt-3 mb-3" type="button" data-bs-toggle="modal" data-bs-target="#createModal">Tambah Todolist</a>
                    
                    <!-- TABLE -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col" class="col">No</th>
                                <th scope="col" class="col">Tanggal</th>
                                <th scope="col" class="col">Kategori</th>
                                <th scope="col" class="col">Todo List</th>
                                <th scope="col" class="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($datas as $key=>$value)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ showDateTime1($value->tanggalmod->tanggal) }}</td>
                                <td>{{ $value->kategori->nama }}</td>
                                <td>{{ $value->todolist }}</td>
                                <td>
                                    <!-- Button Modal Edit -->
                                    <a class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#editModal{{ $value->id }}">Edit</a>
                
                                    <!-- Button Modal Delete -->
                                    <a class="btn btn-danger btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $value->id }}">Delete</a>
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
            <form  method="POST" action="{{ url('todolist') }}">
            @csrf
            {{-- Modal Header --}}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Todolist</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            {{-- Modal Body --}}
            <div class="modal-body">
                <div class="form-group">
                    <label><b>Kategori</b></label>
                    <select name="kategori_id" class="form-control" id="kategori_id">
                        <option value="" disabled selected>-- Pilih Kategori --</option>
                        @foreach ($kategori as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div> 
                @error('kategori_id')
                    <div style="color:red;">    {{ $message }}  </div>
                @enderror
                <br>

                <div class="form-group">
                    <label><b>Tanggal</b></label>
                    <select name="tanggal_id" class="form-control" id="tanggal_id">
                        <option value="" disabled selected>-- Pilih Tanggal --</option>
                        @foreach ($tanggal as $item)
                        <option value="{{ $item->id }}">{{ showDateTime1($item->tanggal) }}</option>    
                        @endforeach
                    </select>
                </div> 
                @error('tanggal_id')
                    <div style="color:red;">    {{ $message }}  </div>
                @enderror
                <br>

                <div class="form-group">
                    <label><b>Todolist</b></label>
                    <textarea class="form-control" name="todolist"  rows="4"></textarea>
                </div> 
                @error('todolist')
                    <div style="color:red;">    {{ $message }}  </div>
                @enderror
                <br>

                <div class="form-group">
                    <label><b>Durasi</b></label>
                    <input class="form-control" name="durasi" type="number">
                </div> 
                @error('durasi')
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
            <form  method="POST" action="{{ url('todolist/'. $value->id) }}">
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
                    <label><b>Kategori</b></label>
                    <select name="kategori_id" class="form-control" id="">
                        <option value="" disabled selected>---Pilih Kategori ---</option>
                        @foreach ($kategori as $item)
                            @if($item->id === $value->kategori_id)
                              <option value="{{ $item->id }}" selected>{{ $item->nama }}</option>
                            @else
                             <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                </div> 
                @error('kategori_id')
                    <div style="color:red;">    {{ $message }}  </div>
                @enderror
                <br>

                <div class="form-group">
                    <label><b>Tanggal</b></label>
                    <select name="tanggal_id" class="form-control" id="">
                        <option value="" disabled selected>---Pilih Tanggal ---</option>
                        @foreach ($tanggal as $item)
                            @if($item->id === $value->tanggal_id)
                              <option value="{{ $item->id }}" selected>{{ showDateTime1($item->tanggal) }}</option>
                            @else
                             <option value="{{ $item->id }}">{{ showDateTime1($item->tanggal) }}</option>
                            @endif
                        @endforeach
                    </select>
                </div> 
                @error('tanggal_id')
                    <div style="color:red;">    {{ $message }}  </div>
                @enderror
                <br>

                <div class="form-group">
                    <label><b>Todolist</b></label>
                    <textarea class="form-control" name="todolist"  rows="4">{{ $value->todolist }}</textarea>
                </div> 
                @error('todolist')
                    <div style="color:red;">    {{ $message }}  </div>
                @enderror
                <br>

                <div class="form-group">
                    <label><b>Durasi</b></label>
                    <input class="form-control" name="durasi" type="number" value="{{ $value->durasi }}">
                </div> 
                @error('durasi')
                    <div style="color:red;">    {{ $message }}  </div>
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
                <h5 class="modal-title" id="exampleModalLabel">Hapus Tanggal</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                Apakah anda ingin menghapus data ini ?
            </div>
            
            {{-- Form action delete in footer --}}
            <form action="{{ url('todolist/'.$value->id) }}" method="POST">
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