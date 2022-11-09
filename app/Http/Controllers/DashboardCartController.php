<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class DashboardCartController extends Controller
{
    public function index()
    {
        $cart = Cart::where('product_owner', auth()->user()->id)->get();
        return view('dashboard.cart.index', compact('cart'));
    }

    public function destroy($id)
    {
        Cart::destroy($id);
        return redirect('/dashboard/cart')->with('success', 'product has been delete!');
    }
}
