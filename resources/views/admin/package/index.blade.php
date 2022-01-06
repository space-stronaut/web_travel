@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    Package
                </span>
                <span>
                    <a href="{{ route('package.create') }}" class="btn btn-primary">Create</a>
                </span>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Nama Paket</th>
                            <th>Harga Satuan</th>
                            <th>Tujuan</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($packages as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{$item->nama_paket}}
                                </td>
                                <td>
                                    {{$item->harga_satuan}}
                                </td>
                                <td>
                                    {{$item->tujuan}}
                                </td>
                                <td>
                                    {{$item->category->nama}}
                                </td>
                                <td>
                                    {{$item->stok}}
                                </td>
                                <td class="d-flex align-items-center">
                                    <a href="{{ route('package.edit', $item->id) }}" class="btn btn-success">Edit</a>
                                    <form action="{{ route('package.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger ms-2">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>Belum Ada Data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection