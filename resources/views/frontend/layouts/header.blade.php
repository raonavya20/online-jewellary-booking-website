<html>
<head lang="en">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Royal Jewellwers</title>
<link href="frontend/css/bootstrap.min.css" rel="stylesheet">
<link href="frontend/style/style.css" rel="stylesheet">
</head>
<body>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <nav class="top-nav navbar navbar-default navbar-static-top">        
        <div class="navbar-header">
            <a class="navbar-brand" href="/"><img class="logo" src="frontend/image/logonew.png" alt="logo"/></a>
            <button type="button" class="toggle_button navbar-toggle collapsed" data-toggle="collapse" data-target="#modules" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        

        <div class="collapse navbar-collapse navbar-right" id="modules">
            <ul class="nav navbar-nav">
                <li><a href="/" >Home</a></li>
                <li><a href="aboutus" >About Us</a></li>
                <li><a href="ourproducts" >Our Products</a></li>
                <li><a href="contactus" >Contact Us</a></li>
                <?php 
                if ($data['uid']=='0')
                {?>
                    <li ><a href="customerlogin" class="btn login_btn"  role="button">Register/Login</a></li>
                <?php }
                else
                {?>                
                    <li><a href="customerprofile" class="btn login_btn profile_btn"  role="button"><img id="profile_img" src="frontend/image/profile.png" width="15"  onmouseover="hover(this)" onmouseout="unhover(this)" ></a></li>
                    <li><a href="cust_logout" class="btn login_btn"  role="button">Logout</a></li>
                <?php }?>

            </ul>
        </div>
    </nav>    
</div>

