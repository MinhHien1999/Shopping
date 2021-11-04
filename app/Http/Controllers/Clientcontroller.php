<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nsx;
use App\sanpham;
use App\chitietsp;
use App\chitiethd;
use App\slide;
use App\khachhang;
use App\hoadon;
use Illuminate\Support\Str;
use Illuminate\Support\facades\Auth;
use Redirect;
//database
use DB;
// Session
use Session;

class Clientcontroller extends Controller
{
    //
    function __construct(){
        // $all_nsx = nsx::all();
        $all_nsx = nsx::where('nsx_trangthai',1)->get();
        view()->share('nsx',$all_nsx);
        //Sản Phẩm Mới
        $all_product = DB::table('sanpham')
        ->join('nsx','sanpham_id_nsx','=','id_nsx')
        ->join('chitietsp','chitietsp_id_sp','=','id_sanpham')
        ->where('nsx_trangthai',1)->where('sanpham_trangthai',1)
        ->orderby('id_sanpham','desc')->limit(10)->get();
        view()->share('product',$all_product);
        $all_slide = slide::where('trangthai',1)->get();
        view()->share('slide',$all_slide);
    }
    //view
    public function Index(){
      return view('frontend.index');
    }
    public function getProductAll(){
        $product = DB::table('sanpham')->join('nsx','sanpham_id_nsx','=','id_nsx')
            ->where('nsx_trangthai',1)
            ->where('sanpham_trangthai',1)->paginate(16);
        return view('frontend.pages.full_product',compact('product'));
    }
    public function getProduct(){
        return view('frontend.pages.list_product');
    }
    public function getProductNsx($id_nsx){
        $nsx_status = nsx::where('id_nsx',$id_nsx)->select('nsx_trangthai')->first();
        // dd($nsx_status);
        if($nsx_status == null || $nsx_status->nsx_trangthai == 0){
            return view('frontend.pages.errors.404');
        }else{
            $product = DB::table('sanpham')->join('nsx','sanpham_id_nsx','=','id_nsx')
            ->where('sanpham_id_nsx',$id_nsx)
            ->where('nsx_trangthai',1)
            ->where('sanpham_trangthai',1)->paginate(16);
            // $nsx = DB::table('nsx')->select('nsx_tennsx')->where('id_nsx',$id_nsx)->get(1);
            $nsx = nsx::where('id_nsx',$id_nsx)->value('nsx_tennsx');
            return view('frontend.pages.list_product')->with('productNsx',$product)->with('tennsx',$nsx);
        }
    }
    public function getProductDetail($id_sp){
        $sp = sanpham::join('nsx','sanpham_id_nsx','=','id_nsx')->select('nsx_trangthai','sanpham_trangthai','id_sanpham')->where('id_sanpham',$id_sp)->first();
        if($sp == null || $sp->nsx_trangthai == 0 || $sp->sanpham_trangthai==0)
        {
            return view('frontend.pages.errors.404');
        }else{
            $detailProduct = DB::table('sanpham')
            ->join('nsx','sanpham_id_nsx','=','id_nsx')
            ->join('chitietsp','chitietsp_id_sp','=','id_sanpham')
            ->where('id_sanpham',$id_sp)->get();
            // dd($product);
            foreach ($detailProduct as $key => $value) {
                $id_nsx = $value->sanpham_id_nsx;
            }
            // $relatedProduct = DB::table('sanpham')
            // ->join('nsx','sanpham_id_nsx','=','id_nsx')
            $relatedProduct = DB::table('sanpham')
            ->join('nsx','sanpham_id_nsx','=','id_nsx')
            ->join('chitietsp','chitietsp_id_sp','=','id_sanpham')
            ->where('nsx_trangthai',1)->where('sanpham_trangthai',1)
            ->where('id_nsx',$id_nsx)->whereNotIn('id_sanpham',[$id_sp])->get();
            return view('frontend.pages.product')->with('Detailproduct',$detailProduct)->with('relatedProduct',$relatedProduct);
        }
    }
    public function getCart(){
        return view('frontend.pages.cart');
    }
    public function getCheckOut(){
        return view('frontend.pages.checkout');
    }
    public function getSignUp(){
      return view('frontend.pages.sign_up');
    }
    public function orderCustomer($id){
        if(session()->has('customer_id') && session('customer_id')==$id){
            $user = hoadon::where('hoadon_id_kh',$id)->get();
            // echo '<pre>';
            // print_r($user);
            // echo '</pre>';
            // dd($user);
            return view('frontend.pages.order_customer')->with('order_customer',$user);
        }
        return 'Bạn Không được phép vào';
    }
    public function orderDetailsCustomer($id_kh, $id_hoadon){
        if(session()->has('customer_id') && session('customer_id')==$id_kh){
            $order = hoadon::where('id_hoadon',$id_hoadon)->where('hoadon_id_kh',$id_kh)->first();
            if($order != null){
                $id_order = hoadon::where('id_hoadon',$id_hoadon)->select('id_hoadon')->get();
                $orderDetails = chitiethd::join('hoadon','chitiethd_id_hd','=','id_hoadon')
                ->join('sanpham','chitiethd_id_sanpham','=','id_sanpham')
                ->where('id_hoadon',$id_hoadon)->select('chitiethd.chitiethd_gia','chitiethd.chitiethd_soluong','sanpham.sanpham_ten')->paginate(5);
                return view('frontend.pages.order_detail_customer',compact('orderDetails','id_order'));
            }else{
                return view('frontend.pages.errors.404');
            }
        }
        return 'Bạn Không được phép vào';
    }
    //Search
    public function Search(request $request){
        $product = DB::table('sanpham')->join('nsx','sanpham_id_nsx','=','id_nsx')
        ->where('nsx_trangthai',1)
        ->where('sanpham_trangthai',1)
        ->where('sanpham_ten', 'like', '%'.$request->search_sp.'%')
        // ->orWhere('nsx_tennsx', 'like', '%'.$request->search_sp.'%')
        ->paginate(16);
        return view('frontend.pages.search')->with('ProductSearch',$product);
    }
    //Customer
    //Sign Up
    public function addCustomer(request $request){
      $request->validate([
          'email' => 'required|unique:khachhang,khachhang_email|email',
          'matkhau' => 'required',
          'ten' => 'required',
          'diachi' => 'required',
          'sdt' => 'required|regex:/(0)[0-9]{9}/|numeric'
      ],[
          'ten.required' => 'Chưa nhập tên',
          'diachi.required' => 'Chưa Nhập Địa Chỉ',
          'sdt.required' => 'Chưa Nhập Số Điện Thoại',
          'sdt.regex' => 'Số Điện Thoại Không Phù Hợp',
          'sdt.numeric' => 'Số Điện Thoại Chỉ Được Phép Nhập Số',
          'email.email' => 'Email không đúng định dạng',
          'email.required' => 'Chưa Nhập Email',
          'email.unique' => 'Email Đã tồn Tại!',
          'matkhau.required' => 'Chưa Nhập Mật Khẩu'
      ]);
      $customer = new khachhang();
      
      $customer->khachhang_tenkhachhang = $request->ten;
      $customer->khachhang_diachi = $request->diachi;
      $customer->khachhang_sdt = $request->sdt;
      $customer->khachhang_email = $request->email;
      $customer->khachhang_matkhau = md5($request->matkhau);
      $customer->save();
      return back()->with('message','Đăng Ký Thành Công');
      // $customer = DB::table('khachhang')->where('khachhang_email','<>',$data['khachhang_email'])->insertGetId($data);
    }
    //LogIn
    public function loginCustomer(request $request){
        $request->validate([
            'email' => 'required|email',
            'matkhau' => 'required'
        ],[
            'email.required' => 'Bạn Chưa Nhập Email',
            'email.email' => 'Email Chưa Đúng Định Dạng',
            'matkhau.required' => 'Bạn Chưa Nhập Mật Khẩu'
        ]);
        $customer_email = $request->email;
        $customer_password = md5($request->matkhau);
        $result = DB::table('khachhang')->where('khachhang_email',$customer_email)->where('khachhang_matkhau',$customer_password)->first();
        // echo '<pre>';
        // print_r($result);
        // echo '</pre>';
        if($result==true){
            session()->put('customer_name', $result->khachhang_tenkhachhang);
            session()->put('customer_id', $result->id_khachhang);
            session()->put('customer_email', $result->khachhang_email);
            session()->put('customer_sdt', $result->khachhang_sdt);
            session()->put('customer_diachi', $result->khachhang_diachi);
            return redirect()->back();
        }else{
            return redirect()->back()->with('message_login','Thông tin không chính xác');
        }
    }
    //Logout
    public function logoutCustomer(){
            session()->put('customer_name', null);
            session()->put('customer_id', null);
            return redirect('/');
    }
    public function getInfoCustomer($id){
        if(session()->has('customer_id') && session('customer_id')==$id){
            $user = khachhang::find(session('customer_id'));
            // echo '<pre>';
            // print_r($user);
            // echo '</pre>';
            // dd($user);
            return view('frontend.pages.info_customer')->with('info_user',$user);
        }
        return 'Bạn Không được phép vào';
    }
    public function updateCustomer(request $request){ 
        $request->validate([
            // 'matkhau' => 'required',
            'ten' => 'required',
            'diachi' => 'required',
            'sdt' => 'required|regex:/(0)[0-9]{9}/|numeric'
        ],[
            'ten.required' => 'Chưa nhập tên',
            'diachi.required' => 'Chưa Nhập Địa Chỉ',
            'sdt.required' => 'Chưa Nhập Số Điện Thoại',
            'sdt.regex' => 'Số Điện Thoại Không Phù Hợp',
            'sdt.numeric' => 'Số Điện Thoại Chỉ Được Phép Nhập Số',
        ]);
        $user = khachhang::find($request->id_user);
        if($request->matkhau == null){
            $user = khachhang::find($request->id_user);
            $user->khachhang_tenkhachhang = $request->ten;
            $user->khachhang_diachi = $request->diachi;
            $user->khachhang_sdt = $request->sdt;
            $user->update();
        }else{
            $user = khachhang::find($request->id_user);
            $user->khachhang_tenkhachhang = $request->ten;
            $user->khachhang_diachi = $request->diachi;
            $user->khachhang_sdt = $request->sdt;
            $user->khachhang_matkhau = md5($request->matkhau);
            $user->update();
        }
        return back()->with('message_customer_info_update','Cập Nhật Thành Công');
    }
}
