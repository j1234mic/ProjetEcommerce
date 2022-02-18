<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Mail\SendMail;
use App\Models\Category;
use App\Models\Client;
use App\Models\Order;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    //
    public function home()
    {
        $sliders = Slider::all()->where('status', 1);
        $products = Product::all()->where('status', 1);
        return view('client.home')->with('sliders', $sliders)->with('products', $products);
    }

    public function shop()
    {
        $categories = Category::all();
        $products = Product::all()->where('status', 1);
        return view('client.shop')->with('products', $products)->with('categories', $categories);
    }

    public function addtocart($id)
    {
        $product = Product::find($id);
        $oldcart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldcart);
        $cart->add($product, $id);
        Session::put('cart', $cart);
        return back();
    }

    public function remove_from_cart($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            session::forget('cart');
        }
        return back();
    }

    public function cart()
    {
        $oldcart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldcart);
        return view('client.cart', ['products' => $cart->items], ['totalPrice' => $cart->totalPrice]);
    }

    public function update_qty(Request $request, $id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->updateQty($id, $request->quantity);
        Session::put('cart', $cart);
        return redirect('/cart');
    }

    public function checkout()
    {
        if (!Session::has('client')) {
            return view('client.login');
        }

        $oldcart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new Cart($oldcart);

        if (!Session::has('cart')) {
            return view('client.cart', ['totalPrice' => $cart->totalPrice]);
        }

        return view('client.checkout');
    }

    public function postcheckout(Request $request)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);

        $payer_id = time();
        $order = new Order();
        $order->name = $request->input('name');
        $order->address = $request->input('address');
        $order->cart = serialize($cart);
        $order->payer_id = $payer_id;
        $order->save();

        Session::forget('cart');
        $orders = Order::where('payer_id', $payer_id)->get();

        $orders->transform(function ($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;
        });

        $email = Session::get('client')->email;
        Mail::to($email)->send(new SendMail($orders));

        return redirect('/cart')->with('status', 'Your purchase has been successfully accomplished !!');
    }

    public function create_account(Request $request)
    {
        $this->validate($request, ['email' => 'email|required|unique:clients',
            'password' => 'required|min:4']);

        $client = new Client();
        $client->email = $request->input('email');
        $client->password = bcrypt($request->input('password'));
        $client->save();
        return back()->with('status', 'Your account has been successfully created !!');
    }

    

    public function access_account(Request $request)
    {
        $this->validate($request, ['email' => 'email|required',
            'password' => 'required']);

        $client = Client::where('email', $request->input('email'))->first();

        if ($client) {
            if (Hash::check($request->input('password'), $client->password)) {
                Session::put('client', $client);
                return redirect('/shop');
            } else {
                return back()->with('status', 'Bad Email Or Password');
            }
        } else {
            return back()->with('status', 'You don\'t have an account with this email');
        }
    }

    public function logout()
    {
        Session::forget('client');
        return redirect('/shop');
    }

    public function login()
    {
        return view('client.login');
    }

    public function signup()
    {
        return view('client.signup');
    }

    public function orders()
    {
        $orders = Order::all();

        $orders->transform(function ($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('admin.orders')->with('orders', $orders);
    }

    public function changeLanguage($locale)
    {
        app()->setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
