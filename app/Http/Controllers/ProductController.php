<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $shops = Shop::all();
        $price_filter = $request->price_filter;
        $category_sort = $request->category_sort ;

        if(!$price_filter)
        $products = Product::sortable()->paginate(100);
        else if($price_filter == 1)

        $products = Product::sortable()->where('price', '<', 20 )->paginate(100);
        else if($price_filter == 2)
        $products = Product::sortable()->where('price', '<', 40 )->where('price', '>', 20 )->paginate(100);
        else if($price_filter == 3)
        $products = Product::sortable()->where('price', '<', 60 )->where('price', '>', 40 )->paginate(100);
        else if($price_filter == 4)
        $products = Product::sortable()->where('price', '<', 80 )->where('price', '>', 60 )->paginate(100);
        else if($price_filter == 5)
        $products = Product::sortable()->where('price', '<', 100 )->where('price', '>', 80 )->paginate(100);
        else
        $products = Product::sortable()->paginate(100);


        return view("product.index", ["products" => $products, "price_filter" => $price_filter, 'categories' => $categories, 'category_sort' => $category_sort, 'shops' => $shops]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view("product.create", ["categories" => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;

        $product->title = $request->product_title;
        $product->excertpt = $request->product_excertpt;
        $product->description = $request->product_description;
        $product->price = $request->product_price;
        $product->image = $request->product_image;
        $product->category_id = $request->product_category_id;

        $product->save();

        return redirect()->route("product.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view("product.show", ["product" => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view("product.edit",["product"=>$product, "categories"=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->title = $request->product_title;
        $product->excertpt = $request->product_excertpt;
        $product->description = $request->product_description;
        $product->price = $request->product_price;
        $product->image = $request->product_image;
        $product->category_id = $request->product_category_id;

        $product->save();

        return redirect()->route("product.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

        $product->delete();
        return redirect()->route("product.index");

        // $category_count = $product->productCategory->count();

        // if($$category_count!=0) {
        //     return redirect()->route("product.index")->with('error_message','Istrinti negalima Producto kategorija egzistuoja');
        // }
        // $product->delete();
        // return redirect()->route("product.index")->with('success_message','Task sekmingai istrintas, Valio!!!');
    }
}
