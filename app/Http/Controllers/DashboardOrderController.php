<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardOrderController extends Controller
{
    public function index()
    {
        $checkout = Order::where('product_owner', auth()->user()->id)->get();
        return view('dashboard.checkout.index', compact('checkout'));
    }
}
