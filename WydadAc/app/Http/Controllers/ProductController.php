<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProducts()
    {
        $products = Product::all();

        return view('admin.productslist', compact('products'));
    }

    public function AddProduct(Request $request)
    {
        $cover = $request->file('cover')->store('images', 'public');

        Product::create([
            'name' => $request->input('name'),
            'quantity' => $request->input('quantity'),
            'price' => $request->input('price'),
            'details' => $request->input('details'),
            'description' => $request->input('description'),
            'size_id' => $request->input('size'),
            'type_id' => $request->input('type'),
            'cover' => $cover,
        ]);

        return back()->with('success', 'Player Added Successfully!');
    }


    // public function update(Request $request, $id)
    // {

    //     $Product = Product::find($id);

    //     if (!$Product) {
    //         return redirect()->back()->with('error', 'Product not found.');
    //     }

    //     $Product->firstname = $request->firstname;
    //     $Product->lastname = $request->lastname;
    //     $Product->birthday = $request->birthday;
    //     $Product->nationality = $request->nationality;
    //     $Product->number = $request->number;
    //     $Product->position = $request->position;

    //     if ($request->hasFile('cover')) {
    //         $Product->cover = $request->file('cover')->store('images', 'public');
    //     }

    //     $Product->save();

    //     return redirect()->back()->with('success', 'Product updated successfully.');
    // }

    public function delete($id)
    {
        $product = Product::findOrfail($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully.');
    }
}
