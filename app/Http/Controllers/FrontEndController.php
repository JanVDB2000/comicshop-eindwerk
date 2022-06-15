<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Http\Requests\FactuurAddressRequest;
use App\Models\Address;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Post;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
        $posts = Post::latest()->with(['photo'])->paginate(7);
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

    public function orderListUser(){
        $user_id = Auth::id();
        $orders = Order::with(['orderdetails','orderdetails.product'])->where('user_id', $user_id)->paginate(3);

        return view('order-list-user',compact('orders'));
    }

    public function orderListUserPDF($id){
        $order = Order::find($id);

        $subtotaal = 0;

        if ( Auth::user()->mypdfid($id)){
            foreach($order->orderdetails as $detail){
                $subtotaal += $detail->amount * $detail->price;
            }
            $subtotal = $subtotaal;

            number_format($subtotal,2,'.','');


            $pdf = PDF::loadView('myPDF', compact('order','subtotal'));
            PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            return $pdf->download('factuur-comic-time.pdf');
            /*return view('myPDF',compact('order'));*/
        }else{
            return back();
        }
    }


    public function contact(){
        return view('contact');
    }

    /** Pages front end **/

    /** Cart **/

    public function addToCart($id){
        if (Auth::user()){
        $product = Product::with(['productcategory','photo','brand'])->where('id', $id)->first();
        $oldCart = Session::has('cart') ? Session::get('cart'): null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        Session::put('cart',$cart);
        return redirect()->back();
        }else{
            return redirect()->route('login');
        }
    }

    public function cart(){
        if (Auth::user()){
            if(!Session::has('cart')){
                return redirect('/shop');
            }else{
                $currentCart = Session::has('cart') ? Session::get('cart') : null;
                $cart = new Cart($currentCart);
                $cart = $cart->products;
                return view('checkout',compact('cart'));
            }
        }else{
            return redirect()->route('login');
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


       if ($request->addressType == 'SB'){

           $shipping = ['address_1' =>$request->street_one_s , 'country' =>$request->country_s , 'state' =>$request->state_s, 'zip' =>$request->zip_s, 'user_id' => $user_id,];

           $billing = null;

       }else{

           $shipping = ['address_1' =>$request->street_one_s , 'country' =>$request->country_s , 'state' =>$request->state_s, 'zip' =>$request->zip_s, 'user_id' => $user_id,];

           $billing = ['address_1' =>$request->street_one_b , 'country' =>$request->country_b , 'state' =>$request->state_b, 'zip' =>$request->zip_b, 'user_id' =>$user_id,];
       }

       $addresses = ['shipping' => $shipping, 'billing' => $billing];

       Session::put('addresses', $addresses);


       return redirect()->route('mollie.payment');
   }
    /** Address **/

    /** Checkout **/
    public function sendOrderConfirmationMail($order){
        $subtotaal = 0;

        foreach($order->orderdetails as $detail){
            $subtotaal += $detail->amount * $detail->price;
        }
        $subtotal = $subtotaal;

        number_format($subtotal,2,'.','');

        $pdf = PDF::loadView('myPDF', compact('order','subtotal'));
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);

        Mail::to($order->email)->send(new \App\Mail\OrderDetail($order));
    }

    public function orderReady(){

        $total = number_format(Session::get('cart')->totalPrice,2,'.','');

        $user_name = Auth::user()->name;

        $payment = Mollie::api()->payments()->create([
            'amount' => [
                'currency' => 'EUR', // Type of currency you want to send
                'value' => "$total", // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            'description' => 'Payment By ' . $user_name,
            'redirectUrl' => route('payment.success'), // after the payment completion where you to redirect
        ]);

        $payment = Mollie::api()->payments()->get($payment->id);

        $id  = $payment->id;

        Session::put('payment', $id);

        return redirect($payment->getCheckoutUrl(), 303);
    }


    public function paymentSuccess(){

        if(Session::get('payment') == null ){
            return redirect()->route('home');
        }else{
            $user_id = Auth::user()->id;

            if (Session::get('addresses')['billing'] == null){
                $a = Session::get('addresses')['shipping'];
                $address = new Address();
                $address->address_1 = $a['address_1'];
                $address->country = $a['country'];
                $address->state = $a['state'];
                $address->zip = $a['zip'];
                $address->user_id = $a['user_id'];


                $address->save();

                $address->TypeAdres()->sync([1,2],false);
                $address->users()->sync([$user_id],false);

            }else{

                $as =  Session::get('addresses')['shipping'];
                $address_S =  new Address();
                $address_S->address_1 = $as['address_1'];
                $address_S->country = $as['country'];
                $address_S->state = $as['state'];
                $address_S->zip = $as['zip'];
                $address_S->user_id =$as['user_id'];

                $address_S->save();

                $address_S->TypeAdres()->sync([1],false);
                $address_S->users()->sync([$user_id],false);


                $ab = Session::get('addresses')['billing'];
                $address_B = new Address();
                $address_B->address_1 = $ab['address_1'];
                $address_B->country = $ab['country'];
                $address_B->state = $ab['state'];
                $address_B->zip = $ab['zip'];
                $address_B->user_id = $ab['user_id'];

                $address_B->save();

                $address_B->TypeAdres()->sync([2],false);
                $address_B->users()->sync([$user_id],false);
            }

            $order = new Order();
            $order->user_id = $user_id;
            $order->TC_code = Session::get('payment');
            $order->save();


            foreach (Session::get('cart')->products as $product){
                $orderdetail = new OrderDetail();
                $orderdetail->order_id = $order->id;
                $orderdetail->product_id = $product['product_id'];
                $orderdetail->amount = $product['quantity'];
                $orderdetail->price = $product['product_price'];
                $orderdetail->save();
            }


            $this->sendOrderConfirmationMail($order);



            Session::forget('payment');
            Session::forget('cart');
            Session::forget('addresses');

            return redirect()->route('home');
        }
    }



    /** Checkout **/
}
