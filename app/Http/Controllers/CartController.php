<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Product;
use Mail;

class CartController extends Controller
{
    public function getAddCart($id){
        $product = Product::find($id);
        $item = array(
            'id' => $id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array('img' => $product->image));

        Cart::add($item);
        return redirect('cart/show');
    }

    public function getShowCart(){
        $data['total'] = Cart::getTotal();
        $data['items'] = Cart::getContent();
        return view('frontend.cart', $data);
    }

    public function getDeleteCart($id){
        if($id=='all'){
            Cart::clear();
         } else{
            Cart::remove($id);
         }

         return back();
    }

    public function getUpdateCart(Request $request){
        Cart::update($request->id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->input('quantity'),
            ),
          ));

    }

    public function postShowCart(Request $request){
        $data['info']= $request->all();
        $email = $request->email;
        $data['total'] = Cart::getTotal();
        $data['cart'] = Cart::getContent();
        Mail::send('frontend.email', $data, function($message) use ($email){
            $message->from('linhbk12193@gmail.com', 'TL-Shop');
            $message->to($email, $email);
            $message->cc('linhnh@relipasoft.com', 'LinhNguyen');
            $message->subject('Xác nhận hóa đơn mua hàng tại TL Shop');
        });

        Cart::clear();
        return redirect('complete');

    }

    public function getComplete(){
        return view('frontend.complete');
    }
}
