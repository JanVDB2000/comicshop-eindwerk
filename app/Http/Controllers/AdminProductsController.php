<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $brands = Brand::all();
        $products = Product::with(['brand','photo','productcategory'])->paginate(10);
        return view('admin.products.index', compact('products','brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $productcategories = ProductCategory::all();
        $brands = Brand::all();
        return view('admin.products.create', compact('brands', 'productcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $product = new Product();
        $product->name = $request->name;
        $product->slug = Str::slug($product->name,'-');
        $product->published_date = $request->published_date;
        $product->writer = $request->writer;
        $product->penciled = $request->penciled;
        $product->body = $request->body;
        $product->item_number = $request->item_number;
        $product->price = $request->price;
        $product->product_category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        /**photo opslaan**/
        if($file = $request->file('photo_id')){
            /**wegschrijven naar de img folder**/
            $name = time(). $file->getClientOriginalName();
            $file->move('img/products/', $name);
            /**wegschrijven naar de photo table**/
            $photo = Photo::create(['file'=>$name]);
            $product['photo_id'] = $photo->id;
        }
        /** wegschrijven naar de post table **/
        $product->save();

        /** de gekozen categoriëen wegschrijven naar de tussentabel category_post**/
        //$post->categories()->sync($request->categories, false);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
        $brands = Brand::all();
        $productcategory = ProductCategory::all();
        $product = Product::findOrFail($id);
        return view('admin.products.edit',compact('brands','product','productcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

//
        //opzoeken van de post die aangepast dient te worden
        $product = Product::findOrFail($id);
        //opgezochte post wordt vervangen met de nieuwe ingevulde waarden
        //uit het formulier
        $product->name = $request->name;
        $product->slug = Str::slug($product->name,'-');
        $product->published_date = $request->published_date;
        $product->writer = $request->writer;
        $product->penciled = $request->penciled;
        $product->body = $request->body;
        $product->item_number = $request->item_number;
        $product->price = $request->price;
        $product->product_category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        /**photo opslaan**/
        if($file = $request->file('photo_id')){
            /** opvragen oude image **/
            //vanaf hier wordt de nieuwe photo opgeslagen.
            /**wegschrijven naar de img folder**/
            $name = time(). $file->getClientOriginalName();
            $file->move('img/products', $name);
            /**wegschrijven naar de photo table**/
            $photo = Photo::create(['file'=>$name]);
            $product->photo_id = $photo->id;
        }
        $product->update();
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->back();
    }

    public function productsPerBrand($id){
        $brands = Brand::all();
        $products = Product::where('brand_id', $id)->with(['brand','photo','productcategory'])->paginate(10);
        return view('admin.products.index', compact('products','brands'));
    }
}
