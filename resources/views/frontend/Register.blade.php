<html>
<head lang="en">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Royal Jewellwers</title>
    <link href="frontend/css/bootstrap.min.css" rel="stylesheet">
    <link href="frontend/style/style.css" rel="stylesheet">
</head>
<body class="loginbg">
<div class="lform col-lg-offset-2 col-md-offset-2 col-lg-8 col-md-8 col-sm-offset-1 col-sm-10 col-xs-offset-1 col-xs-10 ">
        <div><p style="text-align:center"><img class="reg_logo" src="frontend/image/logonew.PNG"></p></div>
        <h1 class="register">Register</h1>     
    <form id="registerform" class="form-group">   
            <input type="hidden" name="register_id" id="register_id">
            <input type="hidden" name="_token" id="token2" value="{{ csrf_token() }}">
            <div class="login-box-msg"></div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <label for="firstname">First Name</label>
                <input type="text" class="form-control register_field " name="firstname" id="firstname" placeholder="Enter First Name">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control register_field " name="lastname" id="lastname" placeholder="Enter Last Name">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <label for="email">Email Address</label>
            <input type="text" class="form-control register_field " name="email" id="email" placeholder="Enter Email ID">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <label for="mobile">Mobile Number</label>
            <input type="text" class="form-control register_field " name="mobile" id="mobile" placeholder="Enter Mobile Number">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <label for="password" >Password</label>
            <input type="password" class="form-control register_field" name="password" id="password" placeholder="Enter Password">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <label for="password" >Confirm Password</label>
            <input type="password" class="form-control register_field" name="c_password" id="c_password" placeholder="Enter Password">
        </div>
        <div class="col-lg-offset-3 col-md-offset-3 col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <button type="submit" class=" login_button btn btn-success">Register</button>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <p class="login_account" >Already have an account? <a href="customerlogin">Log In</a></p>
        </div>
        </div>
    </form>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="frontend/js/bootstrap.min.js"></script>
<script src="frontend/js/jquery.validate.min.js"></script>

<script>
	
	Flag=0;
	$('.login_button').click(function(e)
			{
				
				e.preventDefault();
				$("#registerform").validate({
					rules:{

						firstname:
						{
							required:true
							
						},
                        lastname:
						{
							required:true
							
						},
                        email:
						{
							required:true
							
						},
                        mobile:
						{
							required:true
							
						},
                        password:
						{
							required:true
							
						},
                        c_password:
						{
							required:true,
                            equalTo:'#password'						
						}
                    
					},
					messages:
					{
						firstname:
						{
							required: "Please Enter First Name"
                        },
                        lastname:
						{
							required: "Please Enter Last Name"
                        },
                        email:
						{
							required: "Please Enter Email Address"
                        },
                        mobile:
						{
							required: "Please Enter Mobile Number"
                        },
                        password:
						{
							required: "Please Enter Password"
                        },
                        c_password:
						{
							required: "Please Confirm Password",
                            equalTo:"Password Not Matching"
                        }                          
					}  
					
				});
				if($("#registerform").valid())
				{ 
					if(Flag==0)
					{
						Flag++;
						$.ajax({
							url:"registerUpdate",
							type:"POST",
							data:$('#registerform').serialize(), 
							success:function(data)
							{
                                if(data==0)
                                {
                                    alert('Successfully Registerd!!!');
								    window.location.assign('customerlogin');
                                }						
                                else
                                {
                                    $('.login-box-msg').html("<span style='color:red'>Account already exists with same Email ID! Try again with another Email Id...</span>");
                                } 							    
							}
						});
					}
				}
			});
        
</script>
</body>
</html>
