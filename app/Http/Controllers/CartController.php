<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Product;
use Mail;
session()->put('total-cart');


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
        $total = session()->get('total-cart');
        session()->put('total-cart',$total + $product->price * 1);

        if(session()->has('products')){
            $tmp = 0;
            foreach(session()->get('products') as $key => $product_cart){
                if($product_cart['id'] == $product->id){
                    $quantity = $product_cart['quantity'] + 1;
                    session()->forget('products.' . $key);
                    $data = array('id'=> $product->id, "quantity" => $quantity, "name" => $product->name);
                    session()->push('products', $data);
                    $tmp = 1;
                    break;
                }
            }
            if($tmp==0){
                $data = array('id'=> $product->id, "quantity" => 1, "name" => $product->name);
                session()->push("products", $data);
            }
        }else{
            $data = array('id'=> $product->id, "quantity" => 1, "name" => $product->name);
            session()->push("products", $data);
        }

        Cart::add($item);
        return redirect('cart/show');
    }

    public function getShowCart(){
        $data['items'] = Cart::getContent();
        $data['total'] = Cart::getTotal();
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
         Cart::update($id, array(
            'quantity' => array(
                'relative' => false,
                'value' => quantity
            ),
        ));

    }

    public function postShowCart(Request $request){
        $data['info']= $request->all();
        $email = $request->email;
        $data['total'] = Cart::getTotal();
        $data['cart'] = Cart::getContent();
        Mail::send('frontend.email', $data, function($message) use ($email){
            $message->from('linhbk12193@gmail.com', 'LinhNguyen');
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
