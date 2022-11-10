<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
// use Illuminate\Support\Facades\Crypt;
// use Illuminate\Contracts\Encryption\Encrypter;
use Mail;
session_start();
class HomeController extends Controller
{
    public function send_mail(){
         //send mail
                $to_name = "ngolequanit";
               // $tam1 = 'ngolequanit@gmail.com'".','.'lequan007@gmail.com'";
                $tam2 = 'ngolequanit@gmail.com';
                $tam3='lequan007@gmail.com';
               // $to_email = array();
                   $to_email= [];
      $to_email[] = $tam2;
        $to_email[] = $tam3;
               //  $to_email = ['ngolequanit@gmail.com','lequan007@gmail.com'];
                //$to_email = "ngolequanit@gmail.com";//send to this email
                //$to_email = ['ngolequanit@gmail.com','lequan007@gmail.com'];
             
                $data = array("name"=>"Mail từ tài khoản Khách hàng","body"=>'Mail gửi về vấn về hàng hóa'); //body of mail.blade.php
                
                Mail::send('pages.send_mail',$data,function($message) use ($to_name,$to_email){

                    $message->to($to_email)->subject('kiểm tra thử gửi mail google');//send this mail with subject
                    $message->from($to_email,$to_name);//send from this mail

                });
                 return view('pages.send_mail')->with('name',$to_name);
                //--send mail
    }

	public function index(Request $request){
        //seo 
        $meta_desc = "cap nhat..."; 
        $meta_keywords = "cap nhat";
        $meta_title = "cap nhat";
        $url_canonical = $request->url();
        //--seo
        
    	$cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get(); 

        
        
         $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(9)->get(); 

    	return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical); 
    }
    // top menu all product
    public function index1(Request $request){
        //seo 
        $meta_desc = "cap nhat..."; 
        $meta_keywords = "cap nhat";
        $meta_title = "cap nhat";
        $url_canonical = $request->url();
        //--seo
        
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get(); 

        
        
         $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->paginate(6);

        return view('pages.sanpham.all_product')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical); 
    }
    
        public function search(Request $request){

        $keywords = $request->keywords_submit;

        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get(); 

        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get(); 


        return view('pages.sanpham.search')->with('category',$cate_product)->with('brand',$brand_product)->with('search_product',$search_product);

    }

    // lay thong tin tai khoan
    public function get_customer(){
        $customer_id= Session::get('customer_id');
        $customer = DB::table('tbl_customers')->where('customer_id',$customer_id)->first();

        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get(); 

             return view('pages.user.update_user')->with('category',$cate_product)->with('brand',$brand_product)->with(compact('customer'));

      
        }

        // cau 26 cap nhat user
        public function update_user(Request $request){
              $customer_id= Session::get('customer_id');
        $data = array();
        $data['customer_name'] = $request->customer_name;
       $data['customer_email'] = $request->customer_email;
       $data['customer_phone'] = $request->customer_phone;
       $data['customer_id'] =  $customer_id;
                    DB::table('tbl_customers')->where('customer_id',$customer_id)->update($data);
                    Session::put('message','Cập nhật sản phẩm thành công');
                    return Redirect::to('cap-nhat-user');
        }
           public function show_update_pass(Request $request){
          

        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get(); 

             return view('pages.user.update_password')->with('category',$cate_product)->with('brand',$brand_product);
        } 
    public function update_pass_saver(Request $request){
             
              $old_password = md5($request->old_password);
        $result = DB::table('tbl_customers')->where('customer_password',$old_password)->first();
        
        
        if($result){
        $data = array();
         $customer_id= Session::get('customer_id');
       $data['customer_password'] = md5($request->new_password);
                    DB::table('tbl_customers')->where('customer_id',$customer_id)->update($data);
                    return Redirect::to('cap-nhat-user');
                   
                }

                else
                {
                    Session::put('message','đổi mât khẩu không thành công');
                     return Redirect::to('cap-nhat-pass');
                }
                
        }

        
         public function show_pass(){
          

        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get(); 

             return view('pages.checkout.quen_mat_khau')->with('category',$cate_product)->with('brand',$brand_product);
        }

        
        public function sen_email_pass(Request $request){
         //send mail


                $to_name = Session::get('customer_name');
                $to_email = $request->email_account;//send to this email
                $result = DB::table('tbl_customers')->where('customer_email',$to_email)->first();
                if($result)
                {
                $pass_word_new = '123456'.rand(0,99);
                 $data_pass = array();
                $data_pass['customer_password'] = md5($pass_word_new);
                    DB::table('tbl_customers')->where('customer_email',$to_email)->update($data_pass);

                $body_massage = $pass_word_new;
                
                 $data = array("name"=>$body_massage,"body"=>'Mail gửi về vấn về đổi mật khẩu');
                
                Mail::send('pages.send_mail',$data,function($message) use ($to_name,$to_email){

                    $message->to($to_email)->subject('kiểm tra thử gửi mail google');//send this mail with subject
                    $message->from($to_email,$to_name);//send from this mail

                });

                $meta_desc = "Đăng nhập thanh toán"; 
                $meta_keywords = "Đăng nhập thanh toán";
                $meta_title = "Đăng nhập thanh toán";
                $url_canonical = $request->url();
                $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
                $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get(); 

                return view('pages.checkout.handcash')->with('category',$cate_product)->with('brand',$brand_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('name',$to_name);
                 
                 }
                //--send mail
    }

  
    
}
