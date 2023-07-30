<html>
<head lang="en">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Login</title>
<link href="backend/css/bootstrap.min.css" rel="stylesheet">
<link href="backend/backend_style/style.css" rel="stylesheet">
</head>
<body class="body" >    

<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
    <div class="loginform col-lg-offset-3 col-lg-6 col-md-6 col-md-offset-3 col-sm-12 col-xs-12 " >
        <h1 class="welcome">Welcome ADMIN!</h1>
        <form id="loginform">
		<input type="hidden" name="_token" id="token2" value="{{ csrf_token() }}">
		<div class="login-box-msg"></div>

            <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12"  >
              <label  class="sr-only" for="email">Email address</label>
              <input type="email" class=" form-control entry_field" id="email" placeholder="Email" name="email" >
            </div>
            <div class="second_field col-lg-12 col-md-12 col-sm-12 col-xs-12 " >
              <label class="sr-only" for="password">Password</label>
              <input type="password" class=" form-control entry_field" id="password" name="password"  placeholder="Password" >
            </div>		
            <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<button type="submit" class="login_button btn btn-success">Login</button>
            </div>
        </form>          
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="backend/js/bootstrap.min.js"></script>
<script src="backend/js/jquery.validate.min.js"></script>

<script>
			$('.login_button').click(function(e)
			{
				e.preventDefault();
				$.ajax({
					url:'admin_login',
					type:'POST',
					data:$('#loginform').serialize(),
					success:function(data)
					{
						
						if(data==1)
						{
							window.location.assign('dashboard');
						}
						
						else
						{
							$('.login-box-msg').html("<span style='color:red'>Invalid username/password .</span>");
						} 
					},
					error: function(XMLHttpRequest, textStatus, errorThrown)
					{
						
						$('.login-box-msg').html("<span style='color:red'>server not connected</span>");
					} 
				});
			})
		</script>


</body>
</html>