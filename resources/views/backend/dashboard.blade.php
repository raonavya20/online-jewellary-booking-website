<html>
<head lang="en">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dashboard</title>
<link href="backend/css/bootstrap.min.css" rel="stylesheet">
<link href="backend/backend_style/style.css" rel="stylesheet">
</head>
<body class="body" >    
    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 nav navbar-default left-nav">

        <div class="nav-brand-wrapper">
            <a  href="/"><img class="logo" src="backend/image/logonew.png" alt="logo"/></a>
        </div>

        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#modules" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

    <div>
        <ul class="nav collapse navbar-collapse" id="modules">
            <li class="nav_items"><a href="dashboard" role="button" class="nav_item_button btn-lg btn-default"><img  src="backend/image/dashboard.png" alt="" width="25"> Dashboard</a></li>
            <li class="nav_items">
                <button data-toggle="collapse" data-target="#about" class="nav_item_button btn btn-lg btn-default about_collapse"><img  src="backend/image/about.png" alt="" width="25"> About <span class="caret"></span></button>
                <ul id="about" class="collapse nav">
                    <li class="nav_items"><a href="about" role="button" class=" nav_item_button btn btn-lg btn-default menu">About Royal</a></li>
                    <li class="nav_items"><a href="goals" role="button" class="nav_item_button btn btn-lg btn-default menu">Our Goals</a></li>
                    <li class="nav_items"><a href="gallery" role="button" class="nav_item_button btn btn-lg btn-default menu">Gallery</a></li>
                </ul>
            </li>
            <li class="nav_items">
                <button data-toggle="collapse" data-target="#product" class="nav_item_button btn btn-lg btn-default about_collapse"><img src="backend/image/jewellary.png" alt="" width="22"> Jewellary <span class="caret"></span></button>
                <ul id="product" class="collapse nav">
                    <li class="nav_items"><a href="category" role="button" class="nav_item_button btn btn-lg btn-default menu">Category</a></li>
                    <li class="nav_items"><a href="subcategory" role="button" class="nav_item_button btn btn-lg btn-default menu">Sub Category</a></li>
                </ul>
            </li>
            <li class="nav_items"><a href="products" role="button" class="nav_item_button btn btn-lg btn-default menu"><img  src="backend/image/products.png" alt="" width="28"> Products</a></li>
            <li class="nav_items"><a href="bookings" role="button" class=" nav_item_button btn btn-lg btn-default menu"><img  src="backend/image/booking.png" alt="" width="28"> Orders</a></li>
            <li class="nav_items"><a href="password" role="button" class=" nav_item_button btn btn-lg btn-default menu"><img  src="backend/image/pen.png" alt="" width="25"> Change Password</a></li>            
        </ul>
        </div>
    </div>

    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12 ">
            <div class=" nav navbar navbar-right " >
                <ul class="nav">
                    <li class="nav_items"><a href="logout" role="button" class="logout_btn btn btn-lg btn-default"><img  src="backend/image/logout.png" alt="" width="20"> LOG OUT</a></li>
                </ul>
            </div>
    </div>

    <div id="loadData">        
        <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12 ">
            <div class="top_section col-lg-offset-1 col-lg-11 col-md-offset-1 col-md-10 col-sm-12 col-xs-12">
                <h3>Dashboard</h3>
                <div class="module_section col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-12 col-xs-12">
                    <p class="dashboard_count">{{$data['category_count']}}</p>
                    <p class="dashboard_heading">Category</p>
                </div>

                <div class="module_section col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-12 col-xs-12">
                    <p class="dashboard_count">{{ $data['subcategory_count'] }}</p>
                    <p class="dashboard_heading">Sub Category</p>
                </div>

                <div class="module_section col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-12 col-xs-12">
                    <p class="dashboard_count">{{ $data['gallery_count'] }}</p>
                    <p class="dashboard_heading">Gallery</p>
                </div>

                <div class="module_section col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-12 col-xs-12">
                    <p class="dashboard_count">{{ $data['products_count'] }}</p>
                    <p class="dashboard_heading">Products</p>
                </div>

                <div class="module_section col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-12 col-xs-12">
                    <p class="dashboard_count">{{ $data['orders_count'] }}</p>
                    <p class="dashboard_heading">Orders</p>
                </div>

                <div class="module_section col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-12 col-xs-12">
                    <p class="dashboard_count">{{ $data['customers_count'] }}</p>
                    <p class="dashboard_heading">Customers</p>
                </div>
            </div>
        </div>
    </div>

  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="backend/js/bootstrap.min.js"></script>
<script>
	$('.menu').click(function(e)
	{
		e.preventDefault();
		$('#loadData').load($(this).attr('href'));
	});
</script>


</body>
</html>