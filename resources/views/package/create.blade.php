@extends('layouts.frontend')

@section('content')
<div class="container">
  <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
          <span>
              Checkout
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
                              <h1>Checkout</h1>
                          </th>
                      </tr>
                      <tr>
                          <th>Nama Paket</th>
                          <th>:</th>
                          <th>{{ $package->nama_paket }}</th>
                          <form action="{{ route('paket.store') }}" method="post">
                              <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                              <input type="hidden" name="package_id" value="{{ $package->id }}">
                              @csrf
                              <tr>
                                  <th>
                                      Jumlah Pembelian
                                  </th>
                                  <th>:
                                  </th>
                                  <th>
                                      <input type="number" value="1" id="jumlah" name="jumlah_orang" id="" class="form-control">
                                  </th>
                              </tr>
                              <tr>
                                  <th>
                                      Tanggal Pesan
                                  </th>
                                  <th>:
                                  </th>
                                  <th>
                                      <input type="date" name="tanggal_pesan" id="" class="form-control">
                                  </th>
                              </tr>
                              <tr>
                                  <th>
                                      Total
                                  </th>
                                  <th>:
                                  </th>
                                  <th>
                                      <input type="number" id="total" readonly name="total" id="" class="form-control">
                                  </th>
                              </tr>
                              <tr>
                                  <th><button class="btn btn-primary" id="btnSubmit">Checkout</button></th>
                              </tr>
                          </form>
                      </tr>
                  </table>
                  <p id="error" class="text-danger"></p>
              </div>
          </div>
      </div>
  </div>
</div>

<script>
    let jumlah = document.getElementById('jumlah')
      let total = document.getElementById('total')
      let btn = document.getElementById('btnSubmit')
      let error = document.getElementById('error')
      if (jumlah.value > {{ $package->stok }}) {
              btn.setAttribute('disabled', true)
              error.textContent = '*Jumlah melebihi stok paket'
          }

      total.value = jumlah.value * {{ $package->harga_satuan }}

      jumlah.addEventListener('keyup', (e) => {
          total.value = jumlah.value * {{ $package->harga_satuan }}
          if (jumlah.value > {{ $package->stok }}){
            btn.setAttribute('disabled', true)
              error.textContent = '*Jumlah melebihi stok paket'
          }else{
            btn.removeAttribute('disabled')
              error.textContent = ''
          }
      })
</script>
@endsection