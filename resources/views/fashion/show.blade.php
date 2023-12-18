@extends('layouts.app2')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('fashion.index') }}"> Back </a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="col-md-4">
                <div class="form-group">
                    <strong>Judul:</strong>
                    {{ $fashion->judul }}
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <strong>Panduan:</strong>
                    {{ $fashion->panduan }}
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <strong>Deskripsi:</strong>
                    {{ $fashion->deskripsi }}
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <strong>Kategori:</strong>
                    {{ $fashion->kategori->nama_kategori }}
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <strong>Foto:</strong>
                    @if ($fashion->foto)
                        <img src="{{ asset('storage/fashion/' . $fashion->foto) }}" alt="Foto Fashion" class="img-thumbnail">
                    @else
                        <p>Tidak ada foto tersedia</p>
                    @endif
                </div>
            </div>            
    </div>
@endsection
