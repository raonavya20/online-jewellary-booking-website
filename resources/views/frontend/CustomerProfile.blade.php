@include('frontend/layouts/header')

<div class="profile_div col-lg-12 col-md-12 col-sm-12 col-xs-12">

    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12  left-nav">    
       <div><p class="welcome_admin"><img src="frontend/image/profile.png" width="25"/> Welcome {{$data['userdetail']->name}} !!</p></div>    
        <ul class="nav navbar " >
            <li class="nav_items"><a href="" role="button" class="nav_item_button btn btn-lg  "><img  src="frontend/image/profile.png" width="23"> Profile</a></li>
            <li class="nav_items"><a href="customerorders" role="button" class="nav_item_button btn btn-lg menu "><img  src="frontend/image/booking.png" alt="" width="28"> Orders</a></li>
            <li class="nav_items"><a href="cust_logout" role="button" class="nav_item_button btn btn-lg"><img  src="frontend/image/logout.png" alt="" width="28"> Logout</a></li>
        </ul>
    </div>

    <div id="loadData">
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12  left-nav">   
        <form id="profileform">    
                <input type="hidden" name="profile_id" id="profile_id" value="{{$data['profile']->user_id}}">
                <input type="hidden" name="_token" id="token2" value="{{ csrf_token() }}">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p_div">
            <h3>Update Profile Details</h3>
                <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12 ">
                    <label for="fname">First Name</label>
                    <input id="fname" name="fname" type="text" class="form-control profile_field" value="{{$data['profile']->firstname}}" >
                </div>
                <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12 ">
                    <label for="lname">Last Name</label>
                    <input id="lname" name="lname" type="text" class=" form-control profile_field" value="{{$data['profile']->lastname}}" >                
                </div>
                <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12 ">
                    <label for="lname">Email</label>
                    <input id="email" name="email" type="text" class=" form-control profile_field" value="{{$data['profile']->email}}" >                
                </div>   
                <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12 ">
                    <label for="dob">Date of Birth</label>
                    <input id="dob" name="dob" type="date" class=" form-control profile_field" value="{{$data['profile']->dob}}" >                
                </div>
                <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12 ">
                    <label for="mobile">Mobile</label>
                    <input id="mobile" name="mobile" type="number" class=" form-control profile_field" value="{{$data['profile']->mobile}}">                
                </div>
                <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12 ">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class=" form-control profile_field" value="{{$data['profile']->gender}}">
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>               
                </div>                               
            
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                <button type="submit" class="profile_submit btn btn-default">Submit</button>
            </div>

        </form>
        </div>
    </div>

</div>

@include('frontend/layouts/footer')