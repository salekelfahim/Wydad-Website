<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Picture;
use App\Models\Product;
use App\Models\Productssize;
use App\Models\Size;
use App\Models\Type;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function ProductDetails($id)
    {
        $product = Product::findOrfail($id);
        $images = Picture::where('product_id', $id)->get();
        $sizes = Productssize::where('product_id', $id)->get();
        // foreach ($sizes as $size){
        //     foreach ($size->size as $sizz){
        // dd($sizz->id);
        // }
    // }
        return view('product', compact('product', 'images', 'sizes'));
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
            'product_id' => $product,
            'user_id' => 1,
            'quantity' => $request->input('quantity')
        ]);
        return back()->with('success', 'Product Bought Successfully!');
    }
}
