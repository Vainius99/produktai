<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use App\Models\Category;
use Illuminate\Http\Request;
use PDF;
use Validator;


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
        $category_sort = $request->category_sort;



        if($price_filter == 1 && $category_sort == "all")
        $products = Product::sortable()->where('price', '<', 20 )->paginate(100);
        else if($price_filter == 2 && $category_sort == "all")
        $products = Product::sortable()->where('price', '<', 40 )->where('price', '>', 20 )->paginate(100);
        else if($price_filter == 3 && $category_sort == "all")
        $products = Product::sortable()->where('price', '<', 60 )->where('price', '>', 40 )->paginate(100);
        else if($price_filter == 4 && $category_sort == "all")
        $products = Product::sortable()->where('price', '<', 80 )->where('price', '>', 60 )->paginate(100);
        else if($price_filter == 5 && $category_sort == "all")
        $products = Product::sortable()->where('price', '<', 100 )->where('price', '>', 80 )->paginate(100);
        else if($price_filter == 6 && $category_sort == "all")
        $products = Product::sortable()->where('price', '<', 100 )->paginate(100);
        else if($price_filter == 1 && $category_sort)
        $products = Product::sortable()->where('price', '<', 20 )->where('category_id', $category_sort)->paginate(100);
        else if($price_filter == 2 && $category_sort)
        $products = Product::sortable()->where('price', '<', 40 )->where('price', '>', 20 )->where('category_id', $category_sort)->paginate(100);
        else if($price_filter == 3 && $category_sort)
        $products = Product::sortable()->where('price', '<', 60 )->where('price', '>', 40 )->where('category_id', $category_sort)->paginate(100);
        else if($price_filter == 4 && $category_sort)
        $products = Product::sortable()->where('price', '<', 80 )->where('price', '>', 60 )->where('category_id', $category_sort)->paginate(100);
        else if($price_filter == 5 && $category_sort)
        $products = Product::sortable()->where('price', '<', 100 )->where('price', '>', 80 )->where('category_id', $category_sort)->paginate(100);
        else if($price_filter == 6 && $category_sort)
        $products = Product::sortable()->where('price', '<', 100 )->where('category_id', $category_sort)->paginate(100);
        else
        $products = Product::sortable()->paginate(100);




        return view("product.index", ["products" => $products, "price_filter" => $price_filter, 'categories' => $categories, 'category_sort' => $category_sort,
         'shops' => $shops, "category_sortF" =>$category_sort, "price_filterF" => $price_filter]);

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
        $input = [
            'product_title' => $request->product_title,
            'product_excertpt' => $request->product_excertpt,
            'product_description' => $request->product_description,
            'product_price' => $request->product_price,
            // 'product_image' => $request->product_image,
            // 'product_category_id' => $request->product_category_id,
        ];

        $rules = [
            'product_title' => 'required|min:4',
            'product_excertpt' => 'required|min:8',
            'product_description' => 'required|min:8',
            'product_price' => 'required',
            // 'product_image' => 'required|max:3',
            // 'product_category_id' => 'required',
        ];

        $validator = Validator::make($input, $rules);


        if($validator->passes()) {

        $product = new Product;
        $product->title = $request->product_title;
        // excertpt
        $product->excertpt = $request->product_excertpt;
        $product->description = $request->product_description;
        $product->price = $request->product_price;
        $product->image = $request->product_image;
        $product->category_id = $request->product_category_id;
        $product->save();

        $success = [
            'message' => 'Product added successfully',
            'product_id' => $product->id,
            'product_title' => $product->title,
            'product_excertpt' => $product->excertpt,
            'product_description' => $product->description,
            'product_price' => $product->price,
            'product_image' => $product->image,
            'product_category_id' => $product->category_id,

        ];

        $success_json = response()->json($success);

        return $success_json;

    }

    $error = [
        'error' => $validator->messages()->get("*")
    ];

    $error_json = response()->json($error);

    return $error_json;

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

    public function generatePDF(Request $request) {

        $category_sort = $request->category_sort;
        $price_filter = $request->price_filter;


        if($price_filter == 1 && $category_sort == "all")
        $products = Product::where('price', '<', 20 )->get();
        else if($price_filter == 2 && $category_sort == "all")
        $products = Product::where('price', '<', 40 )->where('price', '>', 20 )->get();
        else if($price_filter == 3 && $category_sort == "all")
        $products = Product::where('price', '<', 60 )->where('price', '>', 40 )->get();
        else if($price_filter == 4 && $category_sort == "all")
        $products = Product::where('price', '<', 80 )->where('price', '>', 60 )->get();
        else if($price_filter == 5 && $category_sort == "all")
        $products = Product::where('price', '<', 100 )->where('price', '>', 80 )->get();
        else if($price_filter == 6 && $category_sort == "all")
        $products = Product::where('price', '<', 100 )->get();
        else if($price_filter == 1 && $category_sort)
        $products = Product::where('price', '<', 20 )->where('category_id', $category_sort)->get();
        else if($price_filter == 2 && $category_sort)
        $products = Product::where('price', '<', 40 )->where('price', '>', 20 )->where('category_id', $category_sort)->get();
        else if($price_filter == 3 && $category_sort)
        $products = Product::where('price', '<', 60 )->where('price', '>', 40 )->where('category_id', $category_sort)->get();
        else if($price_filter == 4 && $category_sort)
        $products = Product::where('price', '<', 80 )->where('price', '>', 60 )->where('category_id', $category_sort)->get();
        else if($price_filter == 5 && $category_sort)
        $products = Product::where('price', '<', 100 )->where('price', '>', 80 )->where('category_id', $category_sort)->get();
        else if($price_filter == 6 && $category_sort)
        $products = Product::where('price', '<', 100 )->where('category_id', $category_sort)->get();
        else
        $products = Product::all();




         view()->share(['products' => $products]);
         $pdf = PDF::loadView("pdf_template", $products);

         return $pdf->download('download.pdf');

    }
}
