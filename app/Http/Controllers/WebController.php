<?php
namespace App\Http\Controllers;
      
use App\Models\AdminModel;
	Use Illuminate\Http\Request;
	use Auth;
	use DB;
	use App\Models\User;
	use file;
	use Input;   



class WebController extends Controller 
{
      public function __construct()
      {		
       	$this->admin= new AdminModel;
      }


   public function home()
    {
          $data['categoryloop']=DB::table('category')->where('c_status','0')->get();

          $uname='';
			if(Auth::user())
			$uname= Auth::user();
			if(!empty($uname))
			{
		    	$data['uid']=$uname->id;
		    	$data['userdetail']=DB::table('users')->where('id',$data['uid'])->first();
			}
			else
			{
				$data['uid']="0";
				$data['userdetail']="null";
			}


          return view('frontend.Home',compact('data'));
    }

    public function aboutus()
    {
          $data['about']=DB::table('about_royal')->first();
          $data['goals']=DB::table('goals')->first();
          $data['galleryloop']=DB::table('gallery')->where('status','0')->get();

          $uname='';
			if(Auth::user())
			$uname= Auth::user();
			if(!empty($uname))
			{
		    	$data['uid']=$uname->id;
		    	$data['userdetail']=DB::table('users')->where('id',$data['uid'])->first();
			}
			else
			{
				$data['uid']="0";
				$data['userdetail']="null";
			}

          return view('frontend.AboutUs',compact('data'));
    }

    
    public function ourproducts()
    {
      
            $data['categoryloop']=DB::table('category')->where('c_status','0')->get();
            $data['subcategoryloop']=DB::table('subcategory')->where('s_status','0')->get();            
            $data['productloop']=DB::table('products')->where('p_status','0')->get();

            $uname='';
			if(Auth::user())
			$uname= Auth::user();
			if(!empty($uname))
			{
		    	$data['uid']=$uname->id;
		    	$data['userdetail']=DB::table('users')->where('id',$data['uid'])->first();
			}
			else
			{
				$data['uid']="0";
				$data['userdetail']="null";
			}

            return view('frontend.OurProducts',compact('data'));

      }

	public function booknow(Request $request)
	{     
		$uname='';
			if(Auth::user())
			$uname= Auth::user();
			if(!empty($uname))
			{
		    	$data['uid']=$uname->id;
		    	$data['userdetail']=DB::table('users')->where('id',$data['uid'])->first();
				$data['profile']=DB::table('customer')->where('user_id',$data['uid'])->first();
			}
			else
			{
				$data['uid']="0";
				$data['userdetail']="null";
			}      
		$data['pid'] = $request->input('pid');
		$data['productdetails']=DB::table('products')->leftJoin('category', 'products.p_category', '=', 'category.cid')->leftJoin('subcategory', 'products.p_subcategory', '=', 'subcategory.sid')->where('pid',$data['pid'])->first();
		
		return view('frontend.BookNow',compact('data'));
	}

	public function customerprofile()
	{		
		$uname='';
			if(Auth::user())
			$uname= Auth::user();
			if(!empty($uname))
			{
		    	$data['uid']=$uname->id;
		    	$data['userdetail']=DB::table('users')->where('id',$data['uid'])->first();
				$data['profile']=DB::table('customer')->where('user_id',$data['uid'])->first();
			}
			else
			{
				$data['uid']="0";
				$data['userdetail']="null";
			}
		  return view('frontend.CustomerProfile',compact('data'));
	}
	
	public function customerorders()
	{
		$uname='';
			if(Auth::user())
			$uname= Auth::user();
			if(!empty($uname))
			{
		    	$data['uid']=$uname->id;
		    	$data['userdetail']=DB::table('users')->where('id',$data['uid'])->first();
				$data['profile']=DB::table('customer')->where('user_id',$data['uid'])->first();
				$data['orders']=DB::table('orders')->where('customer_id',$data['uid'])->get();
				
			}
			else
			{
				$data['uid']="0";
				$data['userdetail']="null";
			}
		
		$data['products']=DB::table('products')->where('p_status','0')->get();
		return view('frontend.CustomerOrders',compact('data'));
	}

	public function contactus()
	{		
		$uname='';
			if(Auth::user())
			$uname= Auth::user();
			if(!empty($uname))
			{
		    	$data['uid']=$uname->id;
		    	$data['userdetail']=DB::table('users')->where('id',$data['uid'])->first();				
			}
			else
			{
				$data['uid']="0";
				$data['userdetail']="null";
			}
		  return view('frontend.ContactUs',compact('data'));
	}

	public function customerlogin()
	{
		return view('frontend.CustomerLogin');
	}


      public function register()
      {
            return view('frontend.Register');
      }

      public function registerUpdate(Request $request)
      {
            $data['register_id']=$request->input('register_id');
            $data['firstname']=$request->input('firstname');
            $data['lastname']=$request->input('lastname');
            $data['email']=$request->input('email');
            $data['mobile']=$request->input('mobile');
            $data['password']=$request->input('password');

            return $this->admin->registerInsert($data);
      }

      public function cust_login(Request $request)
		{
			$canLogin = 0;
			$email = $request->input('email');
			$auth = user::where('email',$email)->where('usertype','customer')->first();
			if($auth)
			{
				Auth::login($auth);
				$password = Auth::user()->password;
				$login_status = Auth::user()->status;
				if($request->input('password'))
				{
					if ($request->input('password')==$password)
					{
						if($login_status=='0')
						{ 
							$canLogin=1;
						}
						elseif($login_status=='1')
						{
							$canLogin=404;
						} 
						else
						{
							$canLogin=0;
						} 
					}
				}					
				else
				{
					$canLogin=0;
				}
			}
			return $canLogin;
		}


        public function cust_logout()
		{
		  if(Auth::check())
			{
				Auth::logout();                
				return redirect('/');
			}
			else
			{
				return redirect('/');
			}
		}

		public function orderFetch(Request $request)
		{
			$data['order_id']=$request->input('order_id');
			$data['customer_id']=$request->input('customer_id');           
            $data['quantity']=$request->input('quantity');
			$data['pid']=$request->input('pid');
            $data['customer_name']=$request->input('customer_name');
            $data['phone_no']=$request->input('phone_no');
            $data['email']=$request->input('email');
            $data['address']=$request->input('address');

            return $this->admin->orderInsert($data);            
        }

		public function profile_update(Request $request)
   		{
			$data['profile_id']=$request->input('profile_id');
			$data['fname']=$request->input('fname');
			$data['lname']=$request->input('lname');
			$data['email']=$request->input('email');
			$data['dob']=$request->input('dob');
			$data['mobile']=$request->input('mobile');
			$data['gender']=$request->input('gender');

			return $this->admin->profileInsert($data);
		}


		public function invoice(Request $request)
		{
			$uname='';
			if(Auth::user())
			$uname= Auth::user();
			if(!empty($uname))
			{
		    	$data['uid']=$uname->id;
		    	$data['userdetail']=DB::table('users')->where('id',$data['uid'])->first();	
				$data['profile']=DB::table('customer')->where('user_id',$data['uid'])->first();			
			}
			else
			{
				$data['uid']="0";
				$data['userdetail']="null";
			}

			$data['oid']=$request->input('oid');
			$data['orders']=DB::table('orders')->where('oid',$data['oid'])->first();
			$data['products']=DB::table('products')->where('p_status','0')->get();

			return view('frontend.Invoice',compact('data'));
		}


		
}

?>
