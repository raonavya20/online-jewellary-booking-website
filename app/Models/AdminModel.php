<?php	
	namespace App\Models;	

	use Illuminate\Database\Eloquent\Model;
	use DB;
	use Auth;	


	class AdminModel extends Model
	{
        public function bookingInsert($id)
		{
			if($id['booking_id']=="")
			{
				$bookingInsert=DB::table('bookings')->insertGetId(["date"=>$id['book_date'],"customer_name"=>$id['customer_name'],"product_id"=>$id['product_id'],"product_name"=>$id['product_name'],"amount"=>$id['total_amount'],"booking_status"=>$id['booking_status']]);
			}
			else
			{
			    $bookingInsert=DB::table('client_feedback')->where('feedback_id','=',$id['feedback_id'])->update(["client_name"=>$id['client_name']]);
			}
			return $bookingInsert;  
		}

        public function categoryInsert($id)
		{
			if($id['category_id']=="")
			{
				$categoryInsert=DB::table('category')->insertGetId(["c_name"=>$id['category_name'],"image"=>$id['image']]);
			}
			else
			{
			    $categoryInsert=DB::table('category')->where('cid','=',$id['category_id'])->update(["c_name"=>$id['category_name'],"image"=>$id['image']]);
			}
			return $categoryInsert;  
		}

		public function subcategoryInsert($id)
		{
			if($id['subcategory_id']=="")
			{
				$subcategoryInsert=DB::table('subcategory')->insertGetId(["category"=>$id['category'],"subcategory"=>$id['subcategory']]);
			}
			else
			{
			    $subcategoryInsert=DB::table('subcategory')->where('sid','=',$id['subcategory_id'])->update(["category"=>$id['category'],"subcategory"=>$id['subcategory']]);
			}
			return $subcategoryInsert;  
		}
		
		public function galleryInsert($id)
		{
			if($id['gallery_id']=="")
			{
				$galleryInsert=DB::table('gallery')->insertGetId(["image"=>$id['image']]);
			}
			else
			{
			    $galleryInsert=DB::table('gallery')->where('id','=',$id['gallery_id'])->update(["image"=>$id['image']]);
			}
			return $galleryInsert;  
		}
		
		
		public function productInsert($id)
		{
			if($id['pid']=="")
			{
				$productInsert=DB::table('products')->insertGetId(["p_category"=>$id['category'],"p_subcategory"=>$id['subcategory'],"p_name"=>$id['product_name'],"product_id"=>$id['product_id'],"grams"=>$id['product_grams'],"p_image"=>$id['image'],"purity"=>$id['product_purity'],"price"=>$id['product_price']]);
			}
			else
			{
			    $productInsert=DB::table('products')->where('pid','=',$id['pid'])->update(["p_name"=>$id['product_name'],"p_category"=>$id['category'],"p_subcategory"=>$id['subcategory'],"p_name"=>$id['product_name'],"product_id"=>$id['product_id'],"grams"=>$id['product_grams'],"p_image"=>$id['image'],"purity"=>$id['product_purity'],"price"=>$id['product_price']]);
			}
			return $productInsert;  
		}


		public function aboutInsert($id)
		{
		    $aboutInsert=DB::table('about_royal')->where('id','=',$id['about_id'])->update(["description"=>$id['about_description']]);
			return $aboutInsert; 
		}

		public function goalsInsert($id)
		{
		    $goalsInsert=DB::table('goals')->where('id','=',$id['goals_id'])->update(["mission"=>$id['mission'],"vision"=>$id['vision']]);
			return $goalsInsert; 
		}

		public function passwordInsert($id)
		{				
			$passwordInsert=DB::table('users')->where('password_id','=',$id['password_id'])->update(["password"=>$id['password_new']]);					
			return $passwordInsert;  
		}

		public function registerInsert($id)
		{					
			$data['name']=$id['firstname'].' '.$id['lastname'];				
			$canRegister= 0;
			$user = DB::table('users')->where('email', '=', $id['email'])->first();
			if ($user==null)
			{
				$customer=DB::table('users')->insertGetId(["name"=>$data['name'],"password"=>$id['password'],"email"=>$id['email'],"usertype"=>'customer']);
				$registerInsert=DB::table('customer')->insertGetId(["firstname"=>$id['firstname'],"lastname"=>$id['lastname'],"email"=>$id['email'],"mobile"=>$id['mobile'],"user_id"=>$customer]);					
				return $canRegister;									
			}
			else
			{
				$canRegister= 1;
			}
			return $canRegister; 			
		}


		public function orderInsert($id)
		{
			if($id['order_id']=="")
			{
				$orderInsert=DB::table('orders')->insertGetId(["date"=>date('Y-m-d'),"customer_id"=>$id['customer_id'],"quantity"=>$id['quantity'],"prod_id"=>$id['pid'],"customer_name"=>$id['customer_name'],"phone_no"=>$id['phone_no'],"email"=>$id['email'],"address"=>$id['address'],"address"=>$id['address']]);
			}
			else
			{
			    $orderInsert=DB::table('orders')->where('oid','=',$id['order_id'])->update(["date"=>$id['date'],"quantity"=>$id['quantity'],"customer_name"=>$id['customer_name'],"phone_no"=>$id['phone_no'],"email"=>$id['email'],"address"=>$id['address']]);
			}
			return $orderInsert;  
		}


		public function profileInsert($id)
		{				
			DB::table('users')->where('id','=',$id['profile_id'])->update(["name"=>$id['fname'],"email"=>$id['email']]);
			$profileInsert=DB::table('customer')->where('user_id','=',$id['profile_id'])->update(["firstname"=>$id['fname'],"lastname"=>$id['lname'],"email"=>$id['email'],"dob"=>$id['dob'],"mobile"=>$id['mobile'],"gender"=>$id['gender']]);						
			return $profileInsert;  
		}

	}
?>
