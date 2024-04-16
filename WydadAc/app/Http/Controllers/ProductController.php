<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\Product;
use App\Models\Productssize;
use App\Models\Size;
use App\Models\Type;
use Illuminate\Http\Request;

class ProductController extends Controller
{

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
