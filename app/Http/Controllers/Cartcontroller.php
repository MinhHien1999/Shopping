<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\facades\Auth;
use Redirect;
use App\khachhang;
use App\hoadon;
use App\chitiethd;
use App\Mail\sendMail;
use Mail;
use DB;
class Cartcontroller extends Controller
{
    //
    public function addCart(request $request){
        $cart = session()->get('cart');
        $session_id = substr(md5(rand(0,24)),4);
        if ($request->ajax()) {
            $data = $request->all();
            if($cart == true){
                $check = 0;
                foreach($cart as $key => $value){
                    if($value['product_id']==$data['id_sp']){
                        $check++;
                    }
                }
                if($check == 0){
                    $cart[]= array(
                        'session_id' => $session_id,
                        'product_id' => $data['id_sp'],
                        'product_name' => $data['ten_sp'],
                        'product_image' => $data['hinh_sp'],
                        'product_price' => $data['gia_sp'],
                        'product_qty' => $data['soluong_sp']
                    );
                    session()->put('cart', $cart);
                }
            }
            else{
                $cart[]= array(
                    'session_id' => $session_id,
                    'product_id' => $data['id_sp'],
                    'product_name' => $data['ten_sp'],
                    'product_image' => $data['hinh_sp'],
                    'product_price' => $data['gia_sp'],
                    'product_qty' => $data['soluong_sp']
                );
            }
            session()->put('cart', $cart);
            Session()->save();
        }
    }
    public function deleteCart(request $request){
        $session_id_array = $request->id;
        $count_array = count($session_id_array);
        $cart = session()->get('cart');
        // return $count_array;
        $data_return = [];
        $item_unset = [];
        // $status = '';
        if($cart==true){
            for($i = 0; $i < $count_array; $i++){
                foreach($cart as $key => $value){
                    if($session_id_array[$i]==$value['session_id']){
                        array_push($item_unset,$value['session_id']);
                        unset($cart[$key]); // unset o day session cart se rong
                    }
                }
            }
            session()->put('cart',$cart);
        }
        array_push($data_return, $item_unset, count(session()->get('cart'))); //item_unset la sp da xoa
        //count session cart la phan tu con lai trong session cart
        return $data_return;
    }
    public function updateCart(request $request){
        $data = $request->all();
        $cart = session()->get('cart');
        if($cart == true){
            foreach($data['product_qty'] as $key => $value){
                foreach($cart as $k => $val){
                    if($val['session_id'] == $key){
                        $cart[$k]['product_qty'] = $value;
                    }
                }
            }
            session()->put('cart',$cart);
            return back()->with('message', 'C???p Nh???t Th??nh C??ng');
        }else{
            return back()->with('message', 'C???p Nh???t Th???t B???i');
        }
    }
    public function CheckOut(request $request){
        $request->validate([
            'khachhang_tenkhachhang' => 'required',
            'khachhang_diachi' => 'required',
            'khachhang_email' => 'required|email',
            'khachhang_sdt' => 'required|regex:/(0)[0-9]{9}/|numeric'
        ],[
            'khachhang_tenkhachhang.required' => 'Ch??a c?? T??n Kh??ch H??ng',
            'khachhang_diachi.required' => 'Ch??a C?? ?????a Ch??? ????? Giao H??ng',
            'khachhang_email.required' => 'Ch??a c?? Email',
            'khachhang_email.email' => 'Email Kh??ng ????ng ?????nh D???ng',
            'khachhang_sdt.required' => 'Ch??a c?? S??? ??i???n Tho???i',
            'khachhang_sdt.regex' => 'S??? ??i???n Tho???i Kh??ng Ph?? H???p',
            'khachhang_sdt.numeric' => 'S??? ??i???n Tho???i Ch??? ???????c Ph??p Nh???p S???',
        ]);
        if(session()->has('customer_id')){
            $tonggia = 0;
            $tongsoluong = 0;
            if(session()->has('cart')){
                //hoadon
                foreach (session()->get('cart') as $cart_sp){
                    $tonggia += $cart_sp['product_qty'] * $cart_sp['product_price'];
                    $tongsoluong += $cart_sp['product_qty'];
                }
                $Hoadon = new hoadon();
                $Hoadon->hoadon_id_kh = session('customer_id');
                $Hoadon->hoadon_tennguoinhan = $request->khachhang_tenkhachhang;
                $Hoadon->hoadon_diachi = $request->khachhang_diachi;
                $Hoadon->hoadon_email = $request->khachhang_email;
                $Hoadon->hoadon_sdt = $request->khachhang_sdt;
                $Hoadon->hoadon_tongtien = $tonggia;
                $Hoadon->hoadon_ghichu = $request->khachhang_ghichu;
                $Hoadon->hoadon_trangthai = 0;
                if($Hoadon->save()){
                    foreach (session()->get('cart') as $cart_sp){
                        $chitiethd = new chitiethd();
                        $chitiethd->chitiethd_id_sanpham = $cart_sp['product_id'];
                        $chitiethd->chitiethd_gia = $cart_sp['product_qty'] * $cart_sp['product_price'];
                        $chitiethd->chitiethd_soluong = $cart_sp['product_qty'];
                        $chitiethd->chitiethd_id_hd = $Hoadon->id_hoadon;
                        $chitiethd->save();
                    }
                }
                // Mail::to($request->khachhang_email)->send(new sendMail($Hoadon,session()->get('cart')));
                session()->forget('cart');
                return redirect('/')->with('message_checkout_success','?????t H??ng Th??nh C??ng, ????n H??ng C???a B???n ??ang ???????c X??? L?? !');
            }else{
                return redirect()->back()->with('message_checkout_error','Ch??a C?? S???n Ph???m Trong Gi??? H??ng');
            }
        }else{
            $tonggia = 0;
            $tongsoluong = 0;
            if(session()->has('cart')){
                //hoadon
                foreach (session()->get('cart') as $cart_sp){
                    $tonggia += $cart_sp['product_qty'] * $cart_sp['product_price'];
                    $tongsoluong += $cart_sp['product_qty'];
                }
                $Hoadon = new hoadon();
                // $Hoadon->hoadon_id_kh = '';
                $Hoadon->hoadon_tennguoinhan = $request->khachhang_tenkhachhang;
                $Hoadon->hoadon_diachi = $request->khachhang_diachi;
                $Hoadon->hoadon_email = $request->khachhang_email;
                $Hoadon->hoadon_sdt = $request->khachhang_sdt;
                $Hoadon->hoadon_tongtien = $tonggia;
                $Hoadon->hoadon_ghichu = $request->khachhang_ghichu;
                $Hoadon->hoadon_trangthai = 0;
                if($Hoadon->save()){
                    foreach (session()->get('cart') as $cart_sp){
                        $chitiethd = new chitiethd();
                        $chitiethd->chitiethd_id_sanpham = $cart_sp['product_id'];
                        $chitiethd->chitiethd_gia = $cart_sp['product_qty'] * $cart_sp['product_price'];
                        $chitiethd->chitiethd_soluong = $cart_sp['product_qty'];
                        $chitiethd->chitiethd_id_hd = $Hoadon->id_hoadon;
                        $chitiethd->save();
                    }
                }
                // Mail::to($request->khachhang_email)->send(new sendMail($Hoadon,session()->get('cart')));
                session()->forget('cart');
                return redirect('/')->with('message_checkout_success','?????t H??ng Th??nh C??ng, ????n H??ng C???a B???n ??ang ???????c X??? L?? !');
            }else{
                return redirect()->back()->with('message_checkout_error','Ch??a C?? S???n Ph???m Trong Gi??? H??ng');
            }
                // return redirect()->back()->with('message_checkout_error','B???n C???n ????ng Nh???p ????? Thanh To??n');
        }
    }
}
