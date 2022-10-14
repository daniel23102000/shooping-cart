<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;

class ProductController extends Controller
{
    public function index()
    {
        $title = '';
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }
        if(request('user')){
            $user = User::firstWhere('username', request('user'));
            $title = ' by ' . $user->name;
        }
        return view('products', [
            "title" => "All Products" . $title,
            "active" => 'products',
            //"posts" => Post::all()
            "products" => Product::latest()->filter(request(['search', 'user']))
            ->paginate(7)->withQueryString()
        ]);
    }

    public function show(Product $product)
    {
        return view('product', [
            "title" => "Single product",
            "active" => 'products',
            "product" => $product
        ]);
    }

    public function showuserproduct(User $user){
        return view('products', [
            'title' => 'user post',
            'products' => $user->products, 
        ]);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_owner' => 'required',
            'product_price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'id_product' => 'required',
        ]);

        $validatedData['buyer_user'] = auth()->user()->id;

        Cart::create($validatedData);

        return redirect('/carts')->with('success', 'Registration successful! Please login');
    }

    public function cart()
    {
        $title = '';
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }
        if(request('author')){
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }
        return view('carts', [
            "title" => "All Carts" . $title,
            "active" => 'carts',
        ]);
    }

    public function mystore(mystore $product)
    {
        return view('product', [
            "title" => "Single product",
            "active" => 'products',
            "product" => $product::all()
        ]);
    }
}
