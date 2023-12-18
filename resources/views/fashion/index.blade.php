@extends('layouts.app2')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12 grid-margin">
                            <div class="row">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-10">
                                        </div>
                                        <div class="col-lg-2 text-right">
                                            <a class="btn btn-success text-white" href="{{ route('fashion.create') }}">Tambah Data</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table">
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Foto</th>
                                    <th width="200px">Action</th>
                                </tr>
                                @foreach ($fashion as $craft)
                                @php
                                    $image = App\Models\Foto::where('id_fashion', $craft->id)->first();
                                    // $kategori = App\Models\Kategori::where('id', $item->id_kategori)->first();
                                @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $craft->judul }}</td>
                                        <td>{{ $craft->id_kategori }}</td>
                                        <td>
                                            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                                    class="avatar avatar-xs pull-up" title="{{ $craft->name }}">
                                                    @if ($craft->foto)
                                                        <img src="{{ asset('storage/fashion/' . $craft->foto) }}"
                                                            alt="Fashion" class="rounded-circle" style="width: 80px; height: 80px;" />
                                                    @else
                                                        <!-- Handle jika foto tidak ada -->
                                                    @endif
                                                </li>
                                            </ul>
                                        </td>
                                        <td>
                                            <a class="btn btn-info" href="{{ route('fashion.show', $craft->id) }}">Show</a>
                                            <a class="btn btn-primary" href="{{ route('fashion.edit', $craft->id) }}">Edit</a>
                                            <form action="{{ route('fashion.delete', $craft->id) }}" method="POST"
                                                onclick="return confirm('Yakin Untuk Mengapus Data ?')" class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- {!! $data->render() !!} --}}
@endsection
