<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Picture;
use App\Models\Product;
use App\Models\Productssize;
use App\Models\Size;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(12);

        return view('products',compact('products'));
    }

    public function ProductDetails($id)
    {
        $product = Product::findOrfail($id);
        $images = Picture::where('product_id', $id)->get();
        $products = Product::paginate(4);
        $sizes = DB::table('productssizes')
            ->join('products', 'productssizes.product_id', '=', 'products.id')
            ->join('sizes', 'sizes.id', '=', 'productssizes.size_id')
            ->where('products.id', $id)
            ->get();

        return view('product', compact('product', 'images', 'sizes', 'products'));
    }

    public function Show()
    {
        $sizes = Size::get();
        $types = Type::get();
        return view('admin.addproduct', compact('sizes', 'types'));
    }

    public function getProducts()
    {
        $products = Product::all();

        return view('admin.productslist', compact('products'));
    }

    public function AddProduct(Request $request)
    {
        $cover = $request->file('cover')->store('images', 'public');

        $product = Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'details' => $request->input('details'),
            'description' => $request->input('description'),
            'type_id' => $request->input('type'),
            'cover' => $cover,
        ]);

        foreach ($request->file('pictures') as $picture) {
            $product_id = $product->id;
            $path = $picture->store('images', 'public');

            Picture::create([
                'picture' => $path,
                'product_id' => $product_id,
            ]);
        }

        foreach ($request->input('sizes') as $size_id => $quantity) {
            if ($quantity !== null && $quantity !== '') {
                Productssize::create([
                    'product_id' => $product->id,
                    'size_id' => $size_id,
                    'quantity' => $quantity,
                ]);
            }
        }

        return back()->with('success', 'Product Added Successfully!');
    }

    public function delete($id)
    {
        $product = Product::findOrfail($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully.');
    }

    public function BuyProducts(Request $request)
    {
        $product = Product::findOrfail($request->input('product'));

        $buy = Panier::create([
            'product_id' => $product->id,
            'user_id' => auth()->id(),
            'size_id' => $request->input('size'),
            'quantity' => $request->input('quantity')
        ]);

        if (!$buy){
            return back()->with('error', 'Error!');
        }

        DB::table('productssizes')
        ->where('product_id', $product->id)
        ->where('size_id', $request->input('size'))
        ->decrement('quantity', $request->input('quantity'));

        return back()->with('success', 'Product Bought Successfully!');
    }
}
