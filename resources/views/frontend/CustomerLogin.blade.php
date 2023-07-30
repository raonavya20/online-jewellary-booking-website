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
    <div class="lform col-lg-offset-4 col-md-offset-4 col-lg-4 col-md-4 col-sm-offset-2 col-sm-8 col-xs-offset-1 col-xs-10 ">
        <div>
            <p style="text-align:center"><img class="login_logo" src="frontend/image/logonew.PNG" width="60%"></p>
        </div>
        <h1 class="login">Customer Login</h1>
        <form id="cus_loginform" class="form-group">
               
                <input type="hidden" name="_token" id="token2" value="{{ csrf_token() }}">
                <div class="login-box-msg"></div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <label for="email" class="sr-only">Username</label>
                <input type="text" class="form-control entry_field" name="email" id="email" placeholder="Enter Email Address">
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <label for="password" class="sr-only">Password</label>
                <input type="password" class="form-control entry_field" name="password" id="password" placeholder="Enter Password">
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button type="submit" class="login_button btn btn-success">Login</button>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <p class="create_account">Not registered yet? <a href="register">Create an account</a></p>
            </div>

        </form>
    </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="backend/js/bootstrap.min.js"></script>
<script src="backend/js/jquery.validate.min.js"></script>

<script>
			$('.login_button').click(function(e)
			{
				e.preventDefault();
				$.ajax({
					url:'cust_login',
					type:'POST',
					data:$('#cus_loginform').serialize(),
					success:function(data)
					{
						
						if(data==1)
						{
							window.location.assign('/');
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