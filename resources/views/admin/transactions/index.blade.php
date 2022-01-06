@extends('layouts.app')


@section('content')
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
                                {{$item->package->nama_paket}}
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