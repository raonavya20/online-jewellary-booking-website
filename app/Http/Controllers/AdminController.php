<?php
namespace App\Http\Controllers;

	use App\Models\AdminModel;
	use Illuminate\Http\Request;
	use Auth;
	use DB;
	use App\Models\User;
	use file;
	use Input;
        
class AdminController extends Controller
{
    public function __construct()
    {		
       	$this->admin= new AdminModel;
    }

	public function dashboard()
	{
		$data['category_count']=DB::table('category')->where('c_status','0')->count();
		$data['subcategory_count']=DB::table('subcategory')->where('s_status','0')->count();
		$data['gallery_count']=DB::table('gallery')->where('status','0')->count();
		$data['products_count']=DB::table('products')->where('p_status','0')->count();
		$data['orders_count']=DB::table('orders')->where('o_status','0')->count();
		$data['customers_count']=DB::table('customer')->where('status','0')->count();
		
		return view('backend.dashboard',compact('data'));
	}

	public function login()
	{
		return view('backend.login');
	}

	public function about()
	{
		$data['about']=DB::table('about_royal')->where('id','1')->first();
		return view('backend.about',compact('data'));
	}

	public function goals()
	{
		$data['goals']=DB::table('goals')->where('id','1')->first();
		return view('backend.goals',compact('data'));
	}

	public function gallery()
	{
		$data['galleryloop']=DB::table('gallery')->where('status','0')->get();
		return view('backend.gallery',compact('data'));
	}

	public function category()
	{		
		$data['categoryloop']=DB::table('category')->where('c_status','0')->get();
		return view('backend.category',compact('data'));
	}

	public function subcategory()
	{
		$data['categoryloop']=DB::table('category')->where('c_status','0')->get();
		$data['subcategoryloop']=DB::table('subcategory')->where('s_status','0')->get();
		return view('backend.subcategory',compact('data'));
	}

	public function products()
	{
		$data['categoryloop']=DB::table('category')->where('c_status','0')->get();
		$data['subcategoryloop']=DB::table('subcategory')->where('s_status','0')->get();
		//$data['productloop']=DB::table('products')->leftjoin('category','category.id','=','products.category')->leftjoin('subcategory','subcategory.id','=','products.subcategory')->where('products.status','0')->get();
		$data['productloop']=DB::table('products')->where('p_status','0')->get();
		return view('backend.products',compact('data'));
	}

	public function bookings()
	{
		$data['ordersloop']=DB::table('orders')->where('o_status','0')->get();
		$data['customerloop']=DB::table('customer')->where('status','0')->get();
		$data['productloop']=DB::table('products')->where('p_status','0')->get();
		return view('backend.bookings',compact('data'));
	}

	public function invoice_bk(Request $request)
	{
		$data['oid'] = $request->input('oid');
		$data['orders']=DB::table('orders')->where('oid',$data['oid'])->first();
		$data['customer']=DB::table('customer')->where('status','0')->get();
		$data['products']=DB::table('products')->where('p_status','0')->get();
		return view('backend.invoice',compact('data'));
	}

	public function password()
	{
		return view('backend.password');
	}
	

    public function admin_login(Request $request)
		{
			$canLogin = 0;
			$email = $request->input('email');
			$auth = user::where('email',$email)->where('usertype','admin')->first();
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

        public function logout()
		{
		  if(Auth::check())
			{
				Auth::logout();
				return redirect('login');
			}
			else
			{
				return redirect('login');
			}
		}

        public function bookingFetch(Request $request)
		{
			$data['booking_id']=$request->input('booking_id');
            $data['book_date']=$request->input('book_date');
            $data['customer_name']=$request->input('customer_name');
            $data['product_id']=$request->input('product_id');
            $data['product_name']=$request->input('product_name');
            $data['total_amount']=$request->input('total_amount');
            $data['booking_status']=$request->input('booking_status');

            return $this->admin->bookingInsert($data);            
        }

		public function categoryFetch(Request $request)
		{
			$data['category_id']=$request->input('category_id');
			$data['category_name']=$request->input('category_name');
			$path = 'Upload/category/';
			$destinationPath=$path;
			$fn=$request->file('category_image');
			if($fn)
			{
				$fname=$request->file('category_image')->getClientOriginalName();
				$data['image']=$request->file('category_image')->move($destinationPath,$fname);
			}
			else
			{
				$data['image']=$request->input('update_image');
			}

			return $this->admin->categoryInsert($data);
		}

		public function subcategoryFetch(Request $request)
		{
			$data['subcategory_id']=$request->input('subcategory_id');
			$data['category']=$request->input('category');
			$data['subcategory']=$request->input('subcategory');

			return $this->admin->subcategoryInsert($data); 
		}
		

		public function galleryFetch(Request $request)
		{
			$data['gallery_id']=$request->input('gallery_id');
			
			$path = 'Upload/category/';
			$destinationPath=$path;
			$fn=$request->file('images');
			if($fn)
			{
				$fname=$request->file('images')->getClientOriginalName();
				$data['image']=$request->file('images')->move($destinationPath,$fname);
			}
			else
			{
				$data['image']=$request->input('update_image');
			}
			return $this->admin->galleryInsert($data);
		}

		public function productFetch(Request $request)
		{
			$data['pid']=$request->input('pid');			
			$data['category']=$request->input('category');
			$data['subcategory']=$request->input('subcategory');
			$data['product_name']=$request->input('product_name');
			$data['product_id']=$request->input('product_id');
			$data['product_grams']=$request->input('product_grams');
			$data['product_purity']=$request->input('product_purity');
			$data['product_price']=$request->input('product_price');
			
			$path = 'Upload/category/';
			$destinationPath=$path;
			$fn=$request->file('product_image');
			if($fn)
			{
				$fname=$request->file('product_image')->getClientOriginalName();
				$data['image']=$request->file('product_image')->move($destinationPath,$fname);
			}
			else
			{
				$data['image']=$request->input('update_image');
			}
			return $this->admin->productInsert($data);
		}


		public function aboutFetch(Request $request)
		{
			$data['about_id']=$request->input('about_id');
			$data['about_description']=$request->input('about_description');

			return $this->admin->aboutInsert($data);
		}

		public function goalsFetch(Request $request)
		{
			$data['goals_id']=$request->input('goals_id');
			$data['mission']=$request->input('mission');
			$data['vision']=$request->input('vision');

			return $this->admin->goalsInsert($data);
		}
		
		public function loadSubcategory(Request $request)
		{
			$data['category']=$request->category;
			$data['subcategories']=DB::table('subcategory')->where('category',$data['category'])->where('s_status','0')->get();
			//$data['subcategories']=DB::table('subcategory')->where('category',$data['category'])->leftjoin('category','category.id','=','subcategory.category')->where('subcategory.status','0')->get();
			
			return json_encode($data['subcategories']);
		}

		
		public function password_verify(Request $request)
		{
			$user=DB::table('users')->where('usertype','admin')->first();
			$password=$user->password;
			$old = $request->input('old_password');
			$new = $request->input('new_password');			
				
				if($password==$old)
				{
								
					 DB::table('users')->where('id',$user->id)->update(['password'=>$new]);
					 return 1;
				}
				else{
					return 0;
				}			
		}


		public function deleteProduct(Request $request)
		{
			$Did = $request->input('Did');
			DB::table('products')->where('pid',$Did)->update(['p_status'=>'1']);		
			return 1;
		}

		public function editProduct(Request $request)
		{
			$data['Eid']=$request->input('Eid');				
			$editData=DB::table('products')->where('pid',$data['Eid'])->first();			
			return json_encode($editData);
		}

		public function deleteCategory(Request $request)
		{
			$Did = $request->input('Did');
			DB::table('category')->where('cid',$Did)->update(['c_status'=>'1']);		
			return 1;
		}

		public function editCategory(Request $request)
		{
			$data['Eid']=$request->input('Eid');			
			$editData=DB::table('category')->where('cid',$data['Eid'])->first();			
			return json_encode($editData);
		}

		public function deletesubcategory(Request $request)
		{
			$Did = $request->input('Did');
			DB::table('subcategory')->where('sid',$Did)->update(['s_status'=>'1']);		
			return 1;
		}

		public function editsubcategory(Request $request)
		{
			$data['Eid']=$request->input('Eid');			
			$editData=DB::table('subcategory')->where('sid',$data['Eid'])->first();			
			return json_encode($editData);
		}
		

		public function deleteImage(Request $request)
   		{	
			$Did = $request->input('Did');
			DB::table('gallery')->where('id',$Did)->update(['status'=>'1']);		
			return 1;					
		}

		public function editImage(Request $request)
   		{	
			$data['Eid']=$request->input('Eid');
			$editData=DB::table('gallery')->where('id',$data['Eid'])->first();		
			return json_encode($editData);					
		}

		public function deleteOrder(Request $request)
		{
			$Did = $request->input('Did');
			DB::table('orders')->where('oid',$Did)->update(['o_status'=>'1']);		
			return 1;
		}

		

    }

?>
