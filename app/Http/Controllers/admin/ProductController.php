<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{

    public function index()
    {
        $data['products'] = Product::latest()->paginate(10);
        return view('admin.product.index', $data);
    }


    public function create()
    {
        return view('admin.product.create');
    }


    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'name' => 'required|unique:products,name',
            'price' => 'required',
            'image' => 'image',
            'category' => 'required'
            // max:500
            // |dimensions:min_width=800,max_width=1024,min_height=600, max_height=800

        ]);

        if ($request->has('image')) {

            Product::create([

                'name' => $request->name,
                'category' => $request->category,
                'subcategory' => $request->subcategory,
                'description' => $request->description,
                'link' => $request->link,
                'price' => $request->price,
                'image' => $request->file('image')->store('assets/img/product'),

            ]);
        } else {
            Product::create([

                'name' => $request->name,
                'category' => $request->category,
                'subcategory' => $request->subcategory,
                'description' => $request->description,
                'link' => $request->link,
                'price' => $request->price,

            ]);
        }




        return redirect(route('product.index'))->with('success', 'Added successfully');
    }


    public function show(Product $product)
    {
        //
    }


    public function edit(Product $product)
    {

        return view('admin.product.edit', ['product' => $product]);
    }


    public function update(Request $request, Product $product)
    {

        $request->validate([

            'name' => 'required|unique:products,name,' . $product->id,
            'category' => 'required',
            'price' => 'required',
            'image' => 'image',
            // |max:500|dimensions:min_width=800,max_width=1024,min_height=600, max_height=800

        ]);


        if ($request->has('image')) {
            File::delete($product->image);
            $product->update([

                'name' => $request->name,
                'category' => $request->category,
                'subcategory' => $request->subcategory,
                'description' => $request->description,
                'link' => $request->link,
                'price' => $request->price,
                'image' => $request->file('image')->store('assets/img/banner'),

            ]);
        } else {
            $product->update([
                'name' => $request->name,
                'category' => $request->category,
                'subcategory' => $request->subcategory,
                'description' => $request->description,
                'link' => $request->link,
                'price' => $request->price,
            ]);
        }

        return redirect(route('product.index'))->with('success', 'Updated successfully');
    }


    public function destroy(Product $product)
    {

        File::delete($product->image);
        $product->delete();
        return redirect(route('product.index'))->with('success', 'Deleted succesfully');
    }
}