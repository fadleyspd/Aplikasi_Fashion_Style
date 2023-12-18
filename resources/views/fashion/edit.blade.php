@extends('layouts.app2')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2>Edit Fashion</h2>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('fashion.index') }}"> Back </a>
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('fashion.update', $fashion->id) }}" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="judul"><strong>Judul:</strong></label>
                                    <input type="text" name="judul" value="{{ $fashion->judul }}" placeholder="Judul" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="panduan"><strong>Panduan:</strong></label>
                                    <input type="text" name="panduan" value="{{ $fashion->panduan }}" placeholder="Panduan" class="form-control">
                                </div>
                            </div>
                            
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="deskripsi"><strong>Deskripsi:</strong></label>
                                    <input type="text" name="deskripsi" value="{{ $fashion->deskripsi }}" placeholder="Deskripsi" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 mt-4">
                                <div class="form-group">
                                    <label for="foto">Foto:</label>
                                    <input type="file" name="foto" multiple class="form-control-file">
                                </div>
                            </div> 
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
@endsection
