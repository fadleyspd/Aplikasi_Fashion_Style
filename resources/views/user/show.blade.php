@extends('layouts.app2')

@section('content')
    <div class="row p-2">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show User</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('user.index') }}">Back</a>
            </div>
        </div>
    </div>

    <div class="card border-info shadow-lg">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <strong>Nama:</strong>
                        {{ $user->name }}
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <strong>Username:</strong>
                        {{ $user->username }}
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <strong>Email:</strong>
                        {{ $user->email }}
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <strong>Jenis Kelamin:</strong>
                        {{ $user->jenis_kelamin ?: 'Not specified' }}
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <strong>Bio:</strong>
                        {{ $user->bio ?: 'Not specified' }}
                    </div>
                </div>

                <div class="col-md-12 text-center">
                    <div class="form-group">
                        <strong>Foto:</strong>
                        @if($user->foto)
                            <img src="{{ asset('storage/user/' . $user->foto) }}"
                            alt="User" class="rounded-circle" style="width: 80px; height: 80px;">
                        @else
                            <div class="text-muted" style="margin-top: 10px;">No photo available</div>
                        @endif
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
@endsection
