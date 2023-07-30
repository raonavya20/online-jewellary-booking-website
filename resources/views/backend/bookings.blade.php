<html>
<head lang="en">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bookings</title>
<link href="backend/css/bootstrap.min.css" rel="stylesheet">
<link href="backend/backend_style/style.css" rel="stylesheet">
</head>
<body class="body" >    
    
    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12 ">        
    

        <div class="bottom_section col-lg-offset-1 col-lg-11 col-md-offset-1 col-md-11 col-sm-12 col-xs-12" style="margin-top:1%" >
            <h3 >List of Orders</h3>
            <div class="table_section col-lg-12 col-md-12 col-sm-12 col-xs-12"  >
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>                        
                        <th>Date</th>
                        <th>Customer Name</th>
                        <th>Product Id</th>
                        <th>Product Name</th>                        
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Product Price</th>
                        <th>Quantity</th>                        
                        <th>Total Amount</th>
                        <th>Invoice</th>                        
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody> 
                @foreach($data['ordersloop'] as $o)         
                   
                    <tr>                                              
                        <td>{{$o->date}}</td>
                        <td>{{$o->customer_name}}</td>
                        @foreach($data['productloop'] as $p) 
                            <?php if($o->prod_id == $p->pid): ?>
                            <td>{{ $p->product_id }}</td>
                            <td>{{ $p->p_name }}</td>                            
                            <td>{{$o->phone_no}}</td>
                            <td>{{$o->email}}</td>
                            <td>₹ {{$p->price}}.00</td>
                            <td>{{$o->quantity}}</td>                             
                            <td>₹ <?php 
                            $price=$p->price ;
                            $price_new = floatval(str_replace(',','',$price)) ;
                            $price_product= $price_new * $o->quantity ;
                                    echo $price_product  ?>.00 </td>                               
                            <td><a href="invoice_bk?oid={{$o->oid}}">Invoice</a></td>   
                        <?php endif ?>  
                        @endforeach                
                        <td><abbr title="Delete"><button class="delete_btn btn btn-default" onclick="deleteOrder({{$o->oid}})"  ><img src="backend/image/delete.png" width="18"/></button></abbr></td>
                        
                    </tr>                                  
                 @endforeach  
                </tbody>
            </table>
            </div>
        </div>
    </div>

    
<script src="backend/js/jquery.validate.min.js"></script>

<script>
        function deleteOrder(Did)
			{
				$.ajax({
					url:"deleteOrder",
					type:"GET",
					data:'&Did='+Did,
					success:function(data)
					{
                        if(data==1)
                        {
						    alert( "Sucessfully Deleted Order!!", "success");   
						    $('#loadData').load('bookings');
                        }
					}
				})
			}
</script>


</body>
</html>