<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $packages = $packages = Package::where('stok', '!=', 0)->paginate(3);

        return view('welcome', compact('packages'));
    }
}
