<html>
<head lang="en">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Password</title>
<link href="backend/css/bootstrap.min.css" rel="stylesheet">
<link href="backend/backend_style/style.css" rel="stylesheet">
</head>
<body class="body" >        

    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12 ">
    <form id="passwordform">
        <div class="top_section form-group col-lg-offset-1 col-lg-11 col-md-offset-1 col-md-11 col-sm-12 col-xs-12">
                <input type="hidden" name="password_id" id="password_id">
                <input type="hidden" name="_token" id="token2" value="{{ csrf_token() }}">

                <h3>Change Password</h3>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <label for="old_password">Old Password</label>
                        <input id="old_password" name="old_password" type="password" class="entry_field form-control" >
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <label for="new_password">New Password</label>
                        <input id="new_password" name="new_password" type="password" class="entry_field form-control" >
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <label for="confirm_password">Confirm Password</label>
                        <input id="confirm_password" name="confirm_password" type="password" class="entry_field form-control" >
                    </div>
                </div>                    
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button type="submit" class="submit_button btn btn-default">Submit</button>
                </div>
            </form>
        </div>
    </div>

<script src="backend/js/jquery.validate.min.js"></script>
<script>
			$('.submit_button').click(function(e)
			{
                
				e.preventDefault();
                $("#passwordform").validate({
					rules:{

						old_password:
						{
							required:true
							
						},
                        new_password:
						{
							required:true
							
						},
                        confirm_password:
						{
							required:true,
                            equalTo:'#new_password'						
						}
					},
					messages:
					{
						old_password:
						{
							required: "Please Enter Old Password"
                        },
                        new_password:
						{
							required: "Please Enter New Password"
                        },
                        confirm_password:
						{
							required: "Please Confirm Password",
                            equalTo:"Passwords Not Matching"
                        }             
						
					}  
					
				});
                if($("#passwordform").valid())
				{ 
					
				$.ajax({
					url:'password_verify',
					type:'POST',
					data:$('#passwordform').serialize(),
					success:function(data)
					{						
						if(data==1)
						{
							alert('Successfully Changed Password!!!');
								$('#loadData').load('password');
						}
						
						else
						{
							alert('Wrong Old Password!!!');
						} 
					}
				});
            }
        });
</script>
</body>
</html>