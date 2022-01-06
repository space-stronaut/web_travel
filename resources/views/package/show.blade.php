@extends('layouts.frontend')

@section('content')
<div class="container">
  <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
          <span>
              Item Detail
          </span>
          <span>
              <a href="{{ route('paket.index') }}" class="btn btn-primary">Kembali</a>
          </span>
      </div>
      <div class="card-body align-items-center justify-content-center">
          <div class="row">
              <div class="col">
                  <img src="{{ Storage::url($package->category->foto) }}" width="600" alt="">
              </div>
              <div class="col">
                  <table style="width : 100%">
                      <tr>
                          <th>
                              <h1>Detail</h1>
                          </th>
                      </tr>
                      <tr>
                          <th>Nama Paket</th>
                          <th>:</th>
                          <th>{{ $package->nama_paket }}</th>
                      </tr>
                      <tr>
                          <th>Price</th>
                          <th>:</th>
                          <th>Rp. <span id="price">{{ $package->harga_satuan }} / orang</span></th>
                      </tr>
                      <tr>
                        <th>Ketersediaan</th>
                        <th>:</th>
                        <th>{{ $package->stok }}</th>
                    </tr>
                    <tr>
                        <th>Destinasi</th>
                        <th>:</th>
                        <th>{{ $package->tujuan }}</th>
                    </tr>
                    <tr>
                        <th>Kategori</th>
                        <th>:</th>
                        <th>{{ $package->category->nama }}</th>
                    </tr>
                    <tr>
                        <th>
                            <form action="{{ route('paket.create') }}" method="get">
                                <input type="hidden" name="paket_id" value="{{ $package->id }}">
                                <button class="btn btn-primary">Beli Sekarang</button>
                            </form>
                        </th>
                    </tr>
                  </table>
              </div>
          </div>
      </div>
  </div>
</div>

<div class="container mt-5">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>
                Paket Terkait
            </span>
        </div>
        <div class="card-body row align-items-center">
            @foreach ($relates as $item)
            <div class="col-sm-4">
            <div class="card">
              <img src="{{ Storage::url($item->category->foto) }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">{{ $item->nama_paket }}</h5>
                <p class="card-text">{{ $item->tujuan }}</p>
                <p class="card-text">
                    Stok Tersedia : <span class="text-danger">{{ $item->stok }}</span>
                  </p>
                  <p>
                    Destinasi : {{$item->tujuan}}
                  </p>
              </div>
              <div class="card-footer d-flex align-items-center justify-content-between">
                  @auth
                <a href="{{ route('paket.show', $item->id) }}" class="btn btn-outline-primary">Detail</a>
                <form action="{{ route('paket.create') }}" method="get">
                    <input type="hidden" name="paket_id" value="{{ $item->id }}">
                    <button class="btn btn-primary">Beli Sekarang</button>
                </form>
                @endauth
                @guest
                    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                @endguest
              </div>
            </div>
            </div>
            @endforeach
        </div>
    </div>
  </div>
@endsection