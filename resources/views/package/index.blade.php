@extends('layouts.frontend')

@section('content')
<div class="container mb-3">
  <div class="card">
    <div class="card-header">
      <form action="" method="get">
        @csrf
        <div class="form-group row">
          <div class="col-lg">
            <input type="text" name="search" placeholder="Cari..." id="" class="form-control">
          </div>
          <div class="col">
            <button class="btn btn-primary">Cari</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="container">
  <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
          <span>
              @if (Request::get('search'))
                  Hasil Pencarian Untuk Kategori : {{ Request::get('search') }}
              @else
              Paket Tersedia
              @endif
          </span>
      </div>
      <div class="card-body row align-items-center">
          @forelse ($packages as $item)
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
                @if ($item->stok == 0)
                    <button class="btn btn-primary" disabled>Stok Habis</button>
                @else
                <a href="{{ route('paket.show', $item->id) }}" class="btn btn-outline-primary">Detail</a>
                <form action="{{ route('paket.create') }}" method="get">
                    <input type="hidden" name="paket_id" value="{{ $item->id }}">
                    <button class="btn btn-primary">Beli Sekarang</button>
                </form>
                @endif
              @endauth
              @guest
                  <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
              @endguest
            </div>
          </div>
          </div>
          @empty
            Tidak Ada Data...
          @endforelse
      </div>
  </div>
</div>
@endsection