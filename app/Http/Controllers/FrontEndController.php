<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Models\Address;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Post;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Mollie\Laravel\Facades\Mollie;

class FrontEndController extends Controller
{

    /** Pages front end **/

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
        Session::forget('cart');
        Session::forget('addresses');
        return view('contact');
    }

    /** Pages front end **/

    /** Cart **/

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

    public function updateQuantity(CheckoutRequest $request){
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

    /** Cart **/


    /** Address **/
   public function factuurAddress(Request $request){

       $user_id = Auth::user()->id;

       $billing = ['address_1' =>$request->street_one_b , 'country' =>$request->country_b , 'state' =>$request->state_b, 'zip' =>$request->zip_b, 'user_id' =>$user_id,];

       $shipping = ['address_1' =>$request->street_one_s , 'country' =>$request->country_s , 'state' =>$request->state_s, 'zip' =>$request->zip_s, 'user_id' => $user_id,];

       $addresses = [ 'shipping' => $shipping, 'billing' => $billing];

       Session::put('addresses', $addresses);

       return redirect()->route('mollie.payment');
   }
    /** Address **/

    /** Checkout **/

    public function orderReady(Request $request){

        $total = number_format(Session::get('cart')->totalPrice,2,'.','');
        $user_id = Auth::user()->id;
        $user_name = Auth::user()->name;

        $payment = Mollie::api()->payments()->create([
            'amount' => [
                'currency' => 'EUR', // Type of currency you want to send
                'value' => "$total", // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            'description' => 'Payment By ' . $user_name,
            'redirectUrl' => route('payment.success'), // after the payment completion where you to redirect
            "metadata" => [
                "order_id" => "12345",
            ],
        ]);

        $payment = Mollie::api()->payments()->get($payment->id);

        Session::get('addresses')->billing;

        $address_B =  new Address();
        $address_B =





        $order = new Order();
        $order->user_id = $user_id;
        $order->TC_code = $payment->id;
        $order->shipping = 'test';
        $order->billing = 'test';
        $order->save();


        foreach (Session::get('cart')->products as $product){
            $orderdetail = new OrderDetail();
            $orderdetail->order_id = $order->id;
            $orderdetail->product_id = $product['product_id'];
            $orderdetail->amount = $product['quantity'];
            $orderdetail->price = $product['product_price'];
            $orderdetail->save();
        }


        return redirect($payment->getCheckoutUrl(), 303);
    }

    public function paymentSuccess() {
        /*Session::forget('cart');*/
        /*Session::forget('addresses');*/
        return redirect()->route('home');
    }

    /** Checkout **/
}
