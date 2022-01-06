@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    Package
                </span>
                <span>
                    <a href="{{ route('package.index') }}" class="btn btn-primary">Kembali</a>
                </span>
            </div>
            <div class="card-body">
                <form action="{{ route('package.update', $package->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">Nama Paket</label>
                        <input type="text" name="nama_paket" value="{{ $package->nama_paket }}" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Harga Satuan</label>
                        <input type="number" name="harga_satuan" value="{{ $package->harga_satuan }}" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tujuan</label>
                        <input type="text" name="tujuan" value="{{ $package->tujuan }}" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Stok</label>
                        <input type="number" name="stok" value="{{ $package->stok }}" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <select name="category_id" id="" class="form-control">
                            <option value="">Pilih Kategori...</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $package->category_id ? 'selected' : '' }}>{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection