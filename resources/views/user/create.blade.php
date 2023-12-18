@extends('layouts.app2')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div>{{$error}}</div>
                @endforeach
            @endif
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2>Buat User Baru</h2>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('user.index') }}"> Kembali </a>
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('user.store') }}">
                        @method('POST')
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Nama:</strong>
                                    <input type="text" name="name" placeholder="Nama" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Email:</strong>
                                    <input type="text" name="email" placeholder="Email" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Password:</strong>
                                    <input type="password" name="password" placeholder="Password" class="form-control">
                                </div>
                            </div>
                            
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="roles"><strong>Role:</strong></label>
                                    <select name="id_role" id="id_role" class="form-control" multiple>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->nama_role }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
@endsection
