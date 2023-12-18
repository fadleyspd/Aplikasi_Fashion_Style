@extends('layouts.app2')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2>Tambah Data</h2>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('fashion.index') }}"> Back </a>
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('fashion.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Judul:</label>
                                    <input type="text" name="judul" class="form-control" placeholder="Judul">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="steps">Panduan:</label>
                                    <textarea name="panduan" class="form-control" placeholder="Panduan"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Deskripsi:</label>
                                    <textarea name="deskripsi" class="form-control" placeholder="Deskripsi"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_kategori">Kategori:</label>
                                    <select name="id_kategori" id="id_kategori" class="form-control">
                                        @foreach($kategori as $categorys)
                                            <option value="{{ $categorys->id }}">{{ $categorys->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 mt-4">
                                <div class="form-group">
                                    <label for="foto">Foto:</label>
                                    <input type="file" name="foto" multiple class="form-control-file">
                                </div>
                            </div>
                            <div class="col-md-12 text-center mt-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
@endsection
