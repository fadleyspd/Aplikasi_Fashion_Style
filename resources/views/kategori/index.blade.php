@extends('layouts.app2')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{route('kategori.create')}}" class="btn btn-success">Tambah Data</a>
            <div class="card">              
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategori as $data )
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$data->nama_kategori}}</td>
                            <td><img src="{{Storage::url('kategori/'.$data->foto)}}" alt="alternatetext" class="img-fluid" style="width:100px"></td>
                            <td>
                                <a href="{{route('kategori.edit', $data->id)}}" class="btn btn-primary">Edit</a>
                                <form action="{{route('kategori.delete', $data->id)}}" method="POST" class="d-inline">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger">Delete</button>
                                </form>                               
                            </td>
                          </tr>
                        @endforeach             
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
@endsection
