<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Package;
use App\Models\Transaction;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->get('search')) {
            $packages = Package::where('stok', '!=', 0)->where('nama_paket', 'like', '%'.$request->get('search').'%')->orWhere('tujuan', 'like', '%'.$request->get('search').'%')->get();
        }else{
            $packages = Package::where('stok', '!=', 0)->get();
        }

        return view('package.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = $request->get('paket_id');
        $package = Package::find($id);

        return view('package.create', compact('package'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'tanggal_pesan' => ['required'],
            'jumlah_orang' => ['required']
        ]);
        $package = Package::find($request->package_id);
        if ($request->jumlah_orang > $package->stok) {
            return redirect()->back()->with('gagal', 'Stok melebihi batas');
        }else{
            Transaction::create($request->all());
            $package->update([
                'stok' => $package->stok - $request->jumlah_orang
            ]);

            return redirect()->route('profile.index')->with('success', 'Transaksi Berhasil');
        }

        return redirect()->route('paket.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $package = Package::find($id);
        $relates = Package::where('category_id', $package->category_id)->where('id', '!=', $id)->get();

        return view('package.show', compact('package', 'relates'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
