<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class FrontEndController extends Controller
{
    public function index(){
        $productsbrands = Product::latest()->take(6)->get()->load(['brand','photo']);
        $products= Product::latest()->take(6)->get()->load(['brand','photo','reviews']);
        $reviewssite = Review::latest()->take(6)->get()->load(['user','user.photo']);
        return view('index', compact('products','productsbrands','reviewssite'));
    }

    public function post(Post $post){
        return view('post', compact('post'));
    }

    public function bloghome(){
        $posts = Post::latest()->paginate(7);
        $categories= Category::all();
        return view('blog-home', compact('posts','categories'));
    }

    public function shop(){
        $brands = Brand::all();
        $products= Product::with(['brand','photo','reviews'])->paginate(6);
        return view('shop', compact('products','brands',));
    }



    public function productsPerBrand($id){
        $brands = Brand::all();
        $products = Product::where('brand_id', $id)->with(['brand','photo','reviews'])->paginate(6);
        $filter = Brand::find($id);
        return view('shop', compact('products','brands','filter'));
    }

    public function shopd(Product $product){
        $product->load('reviews.user');
        return view('product', compact('product'));
    }

    public function about(){
        $reviewssite = Review::latest()->take(6)->get()->load(['user','user.photo']);
        return view('about-page',compact('reviewssite'));
    }

    public function contact(){
        return view('contact');
    }



    public function addToCart($id){
        $product = Product::with(['productcategory','photo','brand'])->where('id', $id)->first();
        $oldCart = Session::has('cart') ? Session::get('cart'): null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        Session::put('cart',$cart);
        return redirect()->back();
    }

    public function cart(){
        if(!Session::has('cart')){
            return redirect('/shop');
        }else{
            $currentCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($currentCart);
            $cart = $cart->products;
            return view('checkout',compact('cart'));
        }
    }

    public function updateQuantity(Request $request){
        $oldCart = Session::has('cart') ? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->updateQuantity($request->id, $request->quantity);
        Session::put('cart', $cart);
        return redirect()->back();
    }

    public function removeItem($id){
        $oldCart = Session::has('cart') ? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        Session::put('cart', $cart);
        return redirect()->back();
    }
    public function orderReady(Request $request){

        if ($request->firstName_s == null &&
            $request->lastName_s == null &&
            $request->street_one_s == null &&
            $request->country_s == null  &&
            $request->state_s == null &&
            $request->zip_s == null
        ){
            $address = new Address();
            $address->firstName = $request->firstName_b;
            $address->lastName = $request->lastName_b;
            $address->address_1 = $request->street_one_b;
            $address->country = $request->country_b;
            $address->state =$request->state_b;
            $address->zip = $request->zip_b;


            $address->save();

            $address->TypeAdres()->sync([2],false);



        }else{
            //billing address
            $address = new Address();
            $address->firstName = $request->firstName_b;
            $address->lastName = $request->lastName_b;
            $address->address_1 = $request->street_one_b;
            $address->country = $request->country_b;
            $address->state =$request->state_b;
            $address->zip = $request->zip_b;

            $address->save();

            //shipping address
            $address = new Address();
            $address->firstName = $request->firstName_s;
            $address->lastName = $request->lastName_s;
            $address->address_1 = $request->street_one_s;
            $address->country = $request->country_s;
            $address->state =$request->state_s;
            $address->zip = $request->zip_s;

            $address->save();


        }

        return redirect()->back();
    }
}
