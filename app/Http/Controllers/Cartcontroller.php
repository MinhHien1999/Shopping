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
            return back()->with('message', 'Cập Nhật Thành Công');
        }else{
            return back()->with('message', 'Cập Nhật Thất Bại');
        }
    }
    public function CheckOut(request $request){
        $request->validate([
            'khachhang_tenkhachhang' => 'required',
            'khachhang_diachi' => 'required',
            'khachhang_email' => 'required|email',
            'khachhang_sdt' => 'required|regex:/(0)[0-9]{9}/|numeric'
        ],[
            'khachhang_tenkhachhang.required' => 'Chưa có Tên Khách Hàng',
            'khachhang_diachi.required' => 'Chưa Có Địa Chỉ Để Giao Hàng',
            'khachhang_email.required' => 'Chưa có Email',
            'khachhang_email.email' => 'Email Không Đúng Định Dạng',
            'khachhang_sdt.required' => 'Chưa có Số Điện Thoại',
            'khachhang_sdt.regex' => 'Số Điện Thoại Không Phù Hợp',
            'khachhang_sdt.numeric' => 'Số Điện Thoại Chỉ Được Phép Nhập Số',
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
                return redirect('/')->with('message_checkout_success','Đặt Hàng Thành Công, Đơn Hàng Của Bạn Đang Được Xử Lý !');
            }else{
                return redirect()->back()->with('message_checkout_error','Chưa Có Sản Phẩm Trong Giả Hàng');
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
                return redirect('/')->with('message_checkout_success','Đặt Hàng Thành Công, Đơn Hàng Của Bạn Đang Được Xử Lý !');
            }else{
                return redirect()->back()->with('message_checkout_error','Chưa Có Sản Phẩm Trong Giả Hàng');
            }
                // return redirect()->back()->with('message_checkout_error','Bạn Cần Đăng Nhập Để Thanh Toán');
        }
    }
}
