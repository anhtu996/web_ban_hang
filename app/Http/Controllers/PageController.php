<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\ProductType;
use Session;
use App\Cart;
use App\Customer;
use App\BillDetail;
use App\Bill;
class PageController extends Controller
{
    public function getIndex()
    {
        $slide = Slide::all()->toArray();
        $newProduct = Product::where('new', 1)->paginate(4);
        $saleProduct =  Product::where('promotion_price','<>',0)->paginate(8);
        // dd($newProduct);
        // dd($slide);
    	return view('page.trangchu',compact('slide','newProduct', 'saleProduct'));
    }

    public function getProduct($id)
    {
        $product = Product::find($id);
        $relateProduct = Product::where('id_type', $product->id_type)->where('id', '<>', $product->id)->orderBy('new', 'desc')->paginate(3);
    	return view('page.product', compact('product', 'relateProduct'));
    }

    public function getProductType($id_type)
    {
        $typeProduct = Product::where('id_type', $id_type)->orderBy('new', 'desc')->orderBy('promotion_price','desc')->paginate(3);
        $otherProduct =  Product::where('id_type','<>', $id_type)->orderBy('new', 'desc')->orderBy('promotion_price','desc')->paginate(3);
        $productType = ProductType::where('id', $id_type)->select('name')->get()->toArray();
        // dd($productType);
    	return view('page.product-type', compact('typeProduct','otherProduct','productType'));
    }

    public function getAbout()
    {
    	return view('page.about');
    }

    public function getError()
    {
    	return view('page.error');
    }
    public function getContact()
    {
    	return view('page.contact');
    }

    public function getLogin()
    {
    	return view('page.login');
    }

    public function getPrice()
    {
    	return view('page.pricing');
    }

    public function getShoppingCart()
    {
    	return view('page.shopping-cart');
    }

    public function getSignup()
    {
        return view('page.signup');
    }
    public function postSignup(Request $req)
    {
    	$this->validate(
        [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:20',
            'fullname' =>'required',
            're_password' => 'required|same:password',
            'phone' => 'required'
        ],
        [
            'email.required' => 'Email không được để trống'
        ]
        );
    }

    public function addToCart($idProduct, Request $request)
    {   
        $product = Product::find($idProduct);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->addToCart($product, $idProduct);
        $request->session()->put('cart', $cart);
        // dd($oldCart);
        return redirect()->back();
    }

    public function dellToCart($idProduct, Request $request)
    {   
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($idProduct);

        if (count($cart->items) > 0) {
            $request->session()->put('cart', $cart);
        }else{
             $request->session()->forget('cart');
        }
        
        // dd($oldCart);
        return redirect()->back();
    }
    //checkout
    public function getCheckout()
    {
        return view('page.checkout');
    }

    public function postCheckout(Request $request){

        // dd($request);
        $cart = $request->session()->get('cart');
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->gender = $request->gender;

        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone_number = $request->phone;
        $customer->note = $request->note;

        $customer->save();

        $bill = new Bill();
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $request->payment_method;
        $bill->note = $request->note;
        $bill->save();

        foreach ($cart->items as $key => $item) {
           $billDetail = new BillDetail();

           $billDetail->id_bill = $bill->id;
           $billDetail->id_product = $key;
           $billDetail->quantity = $item['qty'];
           $billDetail->unit_price = $item['price']/$item['qty'];
           $billDetail->save();
        }

        return redirect()->back()->with('thongbao','Đặt hàng thành công');
        

    }

}
