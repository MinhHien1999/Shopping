<?php

namespace App\Http\Controllers;

use App\nsx;
use App\sanpham;
use App\chitietsp; 
use App\slide;
use App\hoadon;
use App\khachhang;
use App\chitiethd;
use App\Mail\sendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\facades\Auth;
use Redirect;
use Mail;
use Carbon\Carbon;
//database
use DB;
// Session
use Session;
class Admincontroller extends Controller
{
    public function AuthLogin(){
        if(session()->has('admin_id')){
            return true;
        }else{
            return false;
        }
    }
    public function Login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'matkhau' => 'required'
        ],[
            'email.required' => 'Bạn Chưa Nhập Email',
            'email.email' => 'Email Chưa Đúng Định Dạng',
            'matkhau.required' => 'Bạn Chưa Nhập Mật Khẩu'
        ]);
        $admin_email = $request->email;
        $admin_password = $request->matkhau;
        $result = DB::table('admin')->where('admin_email',$admin_email)->where('admin_matkhau',$admin_password)->first();
        // echo '<pre>';
        // print_r($result);
        // echo '</pre>';
        if($result==true){
            session()->put('admin_name', $result->admin_ten);
            session()->put('admin_id', $result->id_admin);
            session()->put('admin_email', $result->admin_email);
            return redirect::to('admin/dashboard');
        }else{
            return redirect()->back()->with('message_admin_login','Thông tin không chính xác');
            // session()->put('message_admin_login', 'Thông tin không chính xác');
            // return redirect::to('/admin');
        }
    }
    public function logout(){
        if($this->AuthLogin() == true){
            session()->put('admin_name', null);
            session()->put('admin_id', null);
            return redirect('/admin');
        }else{
            return redirect('/admin');
        }
    }
    //View
    public function getLogin(){
        if($this->AuthLogin() == true){
            return view('backend.dashboard');
        }else{
            return view('backend.login');
        }
    }
    public function getDashboard(){
        if($this->AuthLogin() == true){
            return view('backend.dashboard');
        }else{
            return redirect::to('/admin')->with('message_admin_login','Bạn Chưa Đăng Nhập');
        }
    }
    public function getNsxList() {
        if($this->AuthLogin() == true){
            $all_Nsx = nsx::paginate(10);
            return view('backend.pages.nsx.list',['Nsx'=>$all_Nsx]); 
        }else{
            return redirect::to('/admin')->with('message_admin_login','Bạn Chưa Đăng Nhập');
        }
    }
    public function getNsxAdd() {
        if($this->AuthLogin() == true){
            return view('backend.pages.nsx.add');
        }else{
            return redirect::to('/admin')->with('message_admin_login','Bạn Chưa Đăng Nhập');
        } 
    }
    public function getNsxEdit($id_nsx) {
        if($this->AuthLogin() == true){
            $data = DB::table('nsx')->where('id_nsx',$id_nsx)->first();
                if($data == null){
                    return view('backend.pages.errors.404');
                }else{
                    return view('backend.pages.nsx.edit')->with('nsx', $data);    
                }
        }else{
            return redirect::to('/admin')->with('message_admin_login','Bạn Chưa Đăng Nhập');
        }  
    }
    public function getProductList() {
        if($this->AuthLogin() == true){
            // $all_Product = sanpham::all();
            $all_Product = DB::table('sanpham')
            ->join('nsx','sanpham_id_nsx','=','id_nsx')->orderBy('id_sanpham','desc')->paginate(10);
            // dd($all_Product);
            return view('backend.pages.product.list',['Product'=>$all_Product]); 
        }else{
            return redirect::to('/admin')->with('message_admin_login','Bạn Chưa Đăng Nhập');
        }  
    }
    public function getProductAdd() {
        if ($this->AuthLogin() == true) {
            $all_Nsx = nsx::all();
            return view('backend.pages.product.add',['Nsx'=>$all_Nsx]); 
        } else {
            return redirect::to('/admin')->with('message_admin_login','Bạn Chưa Đăng Nhập');
        }
    }
    public function getProductDetail($id_sanpham){
        if ($this->AuthLogin() == true) {
            $all_Nsx = nsx::all();
            $all_Sanpham = DB::table('sanpham')->where('id_sanpham',$id_sanpham)->get();
            return view('backend.pages.product.detail',['sanpham'=>$all_Sanpham],['Nsx'=>$all_Nsx]);
        } else {
            return redirect::to('/admin')->with('message_admin_login','Bạn Chưa Đăng Nhập');
        } 
    }
    public function getProductEdit($id_sanpham){
        if ($this->AuthLogin() == true) {
            $Product = sanpham::join('nsx','sanpham_id_nsx','=','id_nsx')->join('chitietsp','chitietsp_id_sp','=','id_sanpham')->where('id_sanpham',$id_sanpham)->first();
                if($Product == null){
                    return view('backend.pages.errors.404');
                }else{
                    $all_Nsx = nsx::select('nsx_tennsx','nsx_trangthai','id_nsx')->get();
                    return view('backend.pages.product.edit')->with('sanpham',$Product)->with('Nsx',$all_Nsx);
                }
        } else {
            return redirect::to('/admin')->with('message_admin_login','Bạn Chưa Đăng Nhập');
        }
    }
    public function getSlideList(){
        if ($this->AuthLogin() == true) {
            $all_Slide = slide::paginate(10);
            return view('backend.pages.slide.list')->with('slide',$all_Slide);
        } else {
            return redirect::to('/admin')->with('message_admin_login','Bạn Chưa Đăng Nhập');
        }
    }
    public function getSlideAdd(){
        if ($this->AuthLogin() == true) {
            return view('backend.pages.slide.add');
        } else {
            return redirect::to('/admin')->with('message_admin_login','Bạn Chưa Đăng Nhập');
        }
    }
    public function getSlideEdit($id_slide){
        if ($this->AuthLogin() == true) {
            $slide = slide::find($id_slide);
            if($slide == null){
                return view('backend.pages.errors.404');
            }else{
                // dd($slide);
                return view('backend.pages.slide.edit')->with('slideEdit',$slide);
            }
        } else {
            return redirect::to('/admin')->with('message_admin_login','Bạn Chưa Đăng Nhập');
        }
    }
    public function getOrderList(){
        if($this->AuthLogin() == true){
            $all_order = hoadon::paginate(10);
            return view('backend.pages.order.manage_order')->with('order',$all_order); 
        }else{
            return redirect::to('/admin')->with('message_admin_login','Bạn Chưa Đăng Nhập');
        }
    }
    public function getOrderView($orderId){
        if($this->AuthLogin() == true){
            $order = hoadon::find($orderId);
            if($order == null){
                return view('backend.pages.errors.404');
            }else{
                $orderDetail = DB::table('chitiethd')
                ->join('hoadon','chitiethd_id_hd','=','id_hoadon')
                ->join('sanpham','chitiethd_id_sanpham','=','id_sanpham')
                ->where('id_hoadon',$orderId)->select('chitiethd.*','sanpham.sanpham_ten')->paginate(5);
                return view('backend.pages.order.view_order')->with('order',$order)->with('OrderDetail',$orderDetail); 
            }
        }else{
            return redirect::to('/admin')->with('message_admin_login','Bạn Chưa Đăng Nhập');
        }
    }
    public function getStatisticList(){
        if($this->AuthLogin() == true){
            for ($i = 1; $i <= 12; $i ++){
                $doanhthu = hoadon::whereYear('created_at','=',date('Y'))
                    ->whereMonth('created_at','=',$i)
                    ->where('hoadon_trangthai','=',1)
                    ->sum('hoadon_tongtien');
                $data [$i]= [
                    'tongdoanhthu' => $doanhthu
                ];
            }
            return view('backend.pages.statistic.list',compact('data')); 
        }else{
            return redirect::to('/admin')->with('message_admin_login','Bạn Chưa Đăng Nhập');
        }
    }
    public function getMemberList(){
        if($this->AuthLogin() == true){
            $members = khachhang::paginate(10);
            return view('backend.pages.member.list', compact('members')); 
        }else{
            return redirect::to('/admin')->with('message_admin_login','Bạn Chưa Đăng Nhập');
        }
    }
    //NSX
    public function saveNsx(request $request){
        $request->validate([
            'tennsx' => 'required|unique:nsx,nsx_tennsx|max:50|min:3'
        ],[
            'tennsx.required' => 'Phải nhập tên nhà sản xuất',
            'tennsx.unique' => 'Nhà sản xuất đã tồn tại',
            'tennsx.max' => 'Tối đa 50 kí tự',
            'tennsx.min' => 'Ít nhất 3 kí tự'
        ]);
        $nsx = new nsx();
        $nsx->nsx_tennsx = $request->tennsx;
        $nsx->nsx_trangthai = $request->trangthai;
        $nsx->save();
        session()->flash('message', 'Thêm Nhà Sản Xuất thành công');
        return redirect('/admin/nsx');
    }
    public function editNsx(request $request){
        $request->validate([
            'tennsx' => 'required',
        ],[
            'tennsx.required' => 'Phải nhập tên nhà sản xuất',
        ]);
        $nsx = nsx::find($request->id_nsx);
        $nsx->nsx_tennsx = $request->tennsx;
        $nsx->nsx_trangthai = $request->trangthai;
        $nsx->update();
        session()->flash('message', 'Cập Nhật Nhà Sản Xuất Thành Công');
        return redirect::to('/admin/nsx');
    }
    public function deleteNsx($id_nsx){
        $check_count_sp = DB::table('sanpham')->where('sanpham_id_nsx',$id_nsx)->get()->count();
        if($check_count_sp==0){
            $nsx = nsx::find($id_nsx);
            $nsx->delete();
            session()->flash('message', 'Xóa Nhà Sản Xuất Thành Công');
            return back();
        }else{
            session()->flash('message', 'Đang Có '.$check_count_sp.' Sản Phẩm, Không Được Xóa!');
            return back();
        }
    }
    public function SearchNsx(request $request){
        $nsx = DB::table('nsx')->where('nsx_tennsx', 'like', '%'.$request->search_nsx.'%')
                                ->orWhere('id_nsx',$request->search_nsx)
                                ->paginate(10);
        // session()->flash('message', 'Tìm Thấy '.$nsx->count().' Nhà Sản Xuất');
        return view('backend.pages.nsx.search',['Nsx'=>$nsx]);
    }
    // Product
    public function saveProduct(request $request){
        //validateeeeee
        $request->validate([
            'id_nsx' => 'required',
            'tensp' => 'required|unique:sanpham,sanpham_ten',
            'hinh' => 'required',
            'soluong' => 'required|min:1|numeric',
            'gia' =>'required|numeric'
        ],[
            'id_nsx.required' => 'Chưa chọn nhà sản xuất',
            'tensp.required' => 'Phải nhập tên sản phẩm',
            'tensp.unique' => 'Sản phẩm đã đã tồn tại',
            'hinh.required' => 'Chưa có hình sản phẩm',
            'soluong.required' => 'Chưa nhập số lượng sản phẩm',
            'soluong.min' => 'Số lượng tối thiểu là 1',
            'soluong.numeric' => 'Chi được phép nhập số',
            'gia.required' => 'Chưa nhập giá sản phẩm',
            'gia.numeric' => 'Chỉ được phép nhập số'
        ]);
        $fileHinh = $request->hinh;
        $duoiHinh = $fileHinh->getClientOriginalExtension();
        if($duoiHinh != "png" && $duoiHinh!= "jpg"){
            session()->flash('message', 'Lỗi, Chỉ Nhận File đuôi PNG, JPG');
            // return redirect::to('/admin/product/add');
            return back();
        }
        else{
            $tenHinh = $fileHinh->getClientOriginalName();
            $hinh = Str::random(10)."_".$tenHinh;
            while(file_exists("public/images/product/".$hinh)){
                $hinh = Str::random(10)."_".$tenHinh;
            }
            $fileHinh->move('public/images/product', $hinh);
            $sp = new Sanpham();
            $sp->sanpham_id_nsx = $request->id_nsx;
            $sp->sanpham_ten = $request->tensp;
            $sp->sanpham_hinh = $hinh;
            $sp->sanpham_gia = $request->gia;
            $sp->sanpham_soluong = $request->soluong;
            $sp->sanpham_trangthai = $request->trangthai;
            $sp->save();

            $ctsp = new chitietsp();
            $ctsp->chitietsp_id_sp = $sp->id_sanpham;
            $ctsp->chitietsp_hedieuhanh = $request->hedieuhanh;
            $ctsp->chitietsp_camera_truoc = $request->camera_truoc;
            $ctsp->chitietsp_camera_sau = $request->camera_sau;
            $ctsp->chitietsp_cpu = $request->cpu;
            $ctsp->chitietsp_ram = $request->ram;
            $ctsp->chitietsp_dungluongbonho = $request->dungluongbonho;
            $ctsp->chitietsp_dungluongpin  = $request->pin;
            $ctsp->chitietsp_mota = $request->mota;
            $ctsp->save();
            session()->flash('message', 'Thêm Sản Phẩm Thành Công');
            return redirect::to('/admin/product');
        }
    }
    public function editProduct(request $request){
        $request->validate([
            'tensp' => 'required',
            'soluong' => 'required|min:1|numeric',
            'gia' =>'required|numeric'
        ],[
            'tensp.required' => 'Phải nhập tên sản phẩm',
            'tensp.unique' => 'Sản phẩm đã đã tồn tại',
            'soluong.required' => 'Chưa nhập số lượng sản phẩm',
            'soluong.min' => 'Số lượng tối thiểu là 1',
            'soluong.numeric' => 'Chi được phép nhập số',
            'gia.required' => 'Chưa nhập giá sản phẩm',
            'gia.numeric' => 'Chỉ được phép nhập số'
        ]);
        if($request->hasFile('hinh')){
            $fileHinh = $request->hinh;
            $duoiHinh = $fileHinh->getClientOriginalExtension();
            if($duoiHinh != "png" && $duoiHinh!= "jpg"){
                session()->flash('message', 'Lỗi, Chỉ Nhận File đuôi PNG, JPG');
                return redirect::to('/admin/product/add');
                return back();
            }else{
                $tenHinh = $fileHinh->getClientOriginalName();
                $hinh = Str::random(10)."_".$tenHinh;
                while(file_exists("public/images/product/".$hinh)){
                    $hinh = Str::random(10)."_".$tenHinh;
                }
                $fileHinh->move('public/images/product', $hinh);
            }
        }else{
            $hinh = $request->hinh_temp;
        }
            $sp = sanpham::find($request->id_sp);
            $sp->sanpham_id_nsx = $request->id_nsx;
            $sp->sanpham_ten = $request->tensp;
            $sp->sanpham_hinh = $hinh;
            $sp->sanpham_gia = $request->gia;
            $sp->sanpham_soluong = $request->soluong;
            $sp->sanpham_trangthai = $request->trangthai;
            $sp->update();

            $ctsp = chitietsp::find($request->id_sp);
            $ctsp->chitietsp_id_sp = $request->id_sp;
            $ctsp->chitietsp_hedieuhanh = $request->hedieuhanh;
            $ctsp->chitietsp_camera_truoc = $request->camera_truoc;
            $ctsp->chitietsp_camera_sau = $request->camera_sau;
            $ctsp->chitietsp_cpu = $request->cpu;
            $ctsp->chitietsp_ram = $request->ram;
            $ctsp->chitietsp_dungluongbonho = $request->dungluongbonho;
            $ctsp->chitietsp_dungluongpin = $request->pin;
            $ctsp->chitietsp_mota = $request->mota;
            $ctsp->update();
            session()->flash('message', 'Sửa Sản Phẩm Thành Công');
            return redirect::to('/admin/product');
    }
    public function deleteProduct($id_sanpham){
        $check_order = chitiethd::where('chitiethd_id_sanpham','=',$id_sanpham)->count();
        // dd($check_order);
        if($check_order == 0){
            $sp = sanpham::find($id_sanpham);
            $sp->delete();
            session()->flash('message', 'Xóa Sản Phẩm Thành Công');
            return back();
        }else{
            return redirect()->back()->with('message','Sản Phẩm đã có đơn đặt hàng, không được xóa');
        }
    }
    public function SearchProduct(request $request){
        $sanpham = DB::table('sanpham')->join('nsx','sanpham_id_nsx','=','id_nsx')
                                        ->where('sanpham_ten', 'like', '%'.$request->search_sp.'%')
                                        ->orWhere('id_sanpham',$request->search_sp)
                                        ->orWhere('sanpham_gia',$request->search_sp)
                                        ->paginate(10);
        return view('backend.pages.product.search',['Product'=>$sanpham]);
    }
    // Slide
    public function saveSlide(request $request){
        $request->validate([
            'tenslide' => 'required',
            'hinh'  => 'required'
        ],[
            'tenslide.required' => 'Phải nhập tên sản phẩm',
            'hinh.required'  => 'Hình Không được để trống'
        ]);
        $fileHinh = $request->hinh;
        $duoiHinh = $fileHinh->getClientOriginalExtension();
        if($duoiHinh != "png" && $duoiHinh!= "jpg"){
            session()->flash('message', 'Lỗi, Chỉ Nhận File đuôi PNG, JPG');
            return back();
        }
        else{
            $tenHinh = $fileHinh->getClientOriginalName();
            $hinh = Str::random(10)."_".$tenHinh;
            while(file_exists("public/images/selide/".$hinh)){
                $hinh = Str::random(10)."_".$tenHinh;
            }
            $fileHinh->move('public/images/slide', $hinh);
            $slide = new slide();
            $slide->ten_slide = $request->tenslide;
            $slide->tieu_de = $request->tieude;
            $slide->hinh = $hinh;
            $slide->trangthai = $request->trangthai;
            $slide->save();
            session()->flash('message', 'Thêm Slide Thành Công');
            return redirect::to('/admin/slide');
        }
    }
    public function editSlide(request $request){
        $request->validate([
            'tenslide' => 'required',
        ],[
            'tenslide.required' => 'Phải nhập tên sản phẩm',
        ]);
        if($request->hasFile('hinh')){
            $fileHinh = $request->hinh;
            $duoiHinh = $fileHinh->getClientOriginalExtension();
            if($duoiHinh != "png" && $duoiHinh!= "jpg"){
                session()->flash('message', 'Lỗi, Chỉ Nhận File đuôi PNG, JPG');
                return redirect::to('/admin/slide');
                return back();
            }else{
                $tenHinh = $fileHinh->getClientOriginalName();
                $hinh = Str::random(10)."_".$tenHinh;
                while(file_exists("public/images/slide/".$hinh)){
                    $hinh = Str::random(10)."_".$tenHinh;
                }
                $fileHinh->move('public/images/slide', $hinh);
            }
        }else{
            $hinh = $request->hinh_temp;
        }
            $slide = slide::find($request->idslide);
            $slide->ten_slide = $request->tenslide;
            $slide->tieu_de = $request->tieude;
            $slide->hinh = $hinh;
            $slide->trangthai = $request->trangthai;
            $slide->update();
            session()->flash('message', 'Sửa Slide Thành Công');
            return redirect::to('/admin/slide');
    }
    public function deleteSlide($slideId){
        $slide = slide::find($slideId);
        $slide->delete();
        return back()->with('message','Xóa Thành Công');
    }
    //Order
    public function orderStatusEdit(request $request){
        $order_status = hoadon::find($request->id_hoadon);
        $order_status->hoadon_trangthai = $request->trangthai;
        $order_status->update();
        // $mail['customer'] = hoadon::find($request->id_hoadon);
        // $mail['product'] = chitiethd::join('sanpham','id_sanpham','=','chitiethd_id_sanpham')->where('chitiethd_id_hd',$request->id_hoadon)->get();
        if($request->trangthai==1){
            // return 'da xu ly';
            $mail['customer'] = hoadon::find($request->id_hoadon);
            $mail['product'] = chitiethd::join('sanpham','id_sanpham','=','chitiethd_id_sanpham')->where('chitiethd_id_hd',$request->id_hoadon)->get();
            Mail::to($mail['customer']->hoadon_email)->send(new sendMail($mail['customer'],$mail['product']));
            return redirect()->back()->with('message','Cập Nhật Trạng Thái Thành Công');
        }else{
            return redirect()->back()->with('message','Cập Nhật Trạng Thái Thành Công');
        }
        // dd($mail['product']);
        // echo '<pre>';
        // print_r($status);
        // echo '</pre>';
        // return redirect()->back()->with('message','Cập Nhật Trạng Thái Thành Công');
    }
}
