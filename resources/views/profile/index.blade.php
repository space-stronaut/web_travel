@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Profil Saya
            </div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{$message}}
                    </div>
                @endif
                <form action="{{ route('profile.update', Auth::user()->id) }}" method="post">
                    @csrf
                    @method('put')
                    <input type="hidden" name="role" value="{{ Auth::user()->role }}">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="name" value="{{ Auth::user()->name }}" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" value="{{ Auth::user()->email }}" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Password <small class="text-danger">*Isi bila ingin mengganti</small></label>
                        <input type="password" name="password" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat" value="{{ Auth::user()->alamat }}" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">No HP</label>
                        <input type="number" name="no_hp" value="{{ Auth::user()->no_hp }}" id="" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-primary">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                Riwayat Transaksi
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Jumlah Orang</th>
                            <th>Paket Dipilih</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transactions as $item)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>
                                    {{$item->user->name}}
                                </td>
                                <td>
                                    {{$item->jumlah_orang}}
                                </td>
                                <td>
                                    <a href="{{ route('paket.show', $item->package->id) }}">{{$item->package->nama_paket}}</a>
                                </td>
                                <td>
                                    {{$item->total}}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th>Belum ada transaksi...</th>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection