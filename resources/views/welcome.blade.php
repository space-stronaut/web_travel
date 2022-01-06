@extends('layouts.frontend')

@section('content')
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" >
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://i.pinimg.com/originals/bc/84/48/bc844845bb88fd0f905b086c560cdc3b.jpg" height="600" class=" w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://i.pinimg.com/originals/e1/73/d2/e173d2e591c8d666e6c0b8ef12239e62.jpg" height="600" class=" w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div class="container mt-5">
  <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
          <span>
              Paket Tersedia
          </span>
          <span>
              <a href="{{ route('paket.index') }}" class="btn btn-primary">View More</a>
          </span>
      </div>
      <div class="card-body row align-items-center">
          @foreach ($packages as $item)
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
          @endforeach
      </div>
  </div>
</div>
@endsection