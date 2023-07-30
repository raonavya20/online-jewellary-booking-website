<html>
<head lang="en">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Products</title>
<link href="backend/css/bootstrap.min.css" rel="stylesheet">
<link href="backend/backend_style/style.css" rel="stylesheet">
</head>
<body class="body" >    
    
<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12 ">
    <form id="productform">  
        <div class="top_section form-group col-lg-offset-1 col-lg-11 col-md-offset-1 col-md-11 col-sm-12 col-xs-12">
            <input type="hidden" name="pid" id="pid">
            <input type="hidden" name="_token" id="token2" value="{{ csrf_token() }}">
            <input type="hidden" name="update_image" id="update_image" class="form-control">

            <h3>Add Product</h3>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12">
                    <label for="category">Category Name</label>
                    
                    <select class="form-control entry_field" onchange="loadSubcategory()"  name="category" id="category">
                    <option >Select Category</option>
                        @foreach($data['categoryloop'] as $c)
                            <option value="{{$c->cid}}">{{$c->c_name}}</option>
                        @endforeach
                    </select>                   
                </div>
                <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12">
                <label for="subcategory">Sub Category Name</label>
                    <select id="subcategory" name="subcategory"  class="entry_field form-control" >
                    <option>Select Sub Category</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12">
                    <label for="product_name">Product Name</label>
                    <input id="product_name" name="product_name" type="text" class="entry_field form-control" >
                </div>
                <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12">
                    <label for="product_id">Product Id</label>
                    <input id="product_id" name="product_id" type="text" class="entry_field form-control" >
                </div>                    
            </div>     
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12">
                    <label for="product_grams">Grams</label>
                    <input id="product_grams" name="product_grams" type="text" class="entry_field form-control" >
                </div>
                <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12">
                    <label for="product_image">Product Image</label>
                    <input id="product_image" name="product_image" type="file" class="entry_field form-control" >
                    <div id="img"></div>
                </div>                                        
            </div>   
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12">
                    <label for="product_purity">Purity</label>
                    <input id="product_purity" name="product_purity" type="text" class="entry_field form-control" >
                </div>
                <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12">
                    <label for="product_price">Price</label>
                    <input id="product_price" name="product_price" type="text" class="entry_field form-control" >
                </div>
            </div>                 
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button type="submit" class="submit_button btn btn-default">Submit</button>
            </div>
        </div>
    </form>
   

        <div class="bottom_section col-lg-offset-1 col-lg-11 col-md-offset-1 col-md-11 col-sm-12 col-xs-12">
            <h3 >List of Products</h3>
            <div class="table_section col-lg-12 col-md-12 col-sm-12 col-xs-12"  >
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>                        
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Product Name</th>
                        <th>Product Id</th>
                        <th>Image</th>
                        <th>Grams</th>
                        <th>Purity</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>                    
                    <tr>    
                    @foreach($data['productloop'] as $p)  
                    
                        @foreach($data['categoryloop'] as $c)
                        <?php if($p->p_category == $c->cid):?>
                        <td><?php echo $c->c_name ?></td>
                        <?php endif ;?>
                        @endforeach
                        
                        @foreach($data['subcategoryloop'] as $s)
                        <?php if($s->sid == $p->p_subcategory ):?>
                        <td><?php echo $s->subcategory ?></td>
                        <?php endif ;?>
                        @endforeach
                        
                        
                        <td>{{$p->p_name}}</td>
                        <td>{{$p->product_id}}</td>
                        <td><img src="{{$p->p_image}}" width="100%"/></td>
                        <td>{{$p->grams}}</td>
                        <td>{{$p->purity}}</td>
                        <td>{{$p->price}}</td>
                        <td><abbr title="Edit"><button class="edit_btn btn btn-default"  onclick="editProduct({{$p->pid}})"><img src="backend/image/pen.png" width="18"/></button></abbr>
                            <abbr title="Delete"><button class="delete_btn btn btn-default"  onclick="deleteProduct({{$p->pid}})" ><img src="backend/image/delete.png" width="18"/></button></abbr></td>
                    </tr>                    
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
</div>

<script src="backend/js/jquery.validate.min.js"></script>

<script>   
    Flag=0;
	$('#productform').on('submit',(function(e)
			{				
				e.preventDefault();
				$("#productform").validate({
					rules:{	
                        category:
						{
							required:true
							
						},
                        subcategory:
						{
							required:true
							
						},					
                        product_name:
						{
							required:true
							
						},
                        product_id:
						{
							required:true
							
						},
                        product_grams:
						{
							required:true
							
						},
                        product_purity:
						{
							required:true
							
						},
                        product_price:
						{
							required:true
							
						}
					},
					messages:
					{
                        category:
						{
							required: "Please Select Category"
                        },
                        subcategory:
						{
							required: "Please Select Sub Category "
                        },
                        product_name:
						{
							required: "Please Enter Product Name"
                        },
                        product_id:
						{
							required: "Please Enter Product ID"
                        },
                        product_grams:
						{
							required: "Please Enter Product Grams"
                        },	
                        product_purity:
						{
							required: "Please Enter Product Purity"
                        },
                        product_price:
						{
							required: "Please Enter Product Price"
                        }

					}  
					
				});
				if($("#productform").valid())
				{ 
					if(Flag==0)
					{
						Flag++;
						$.ajax({
							url:"productFetch",
							type:"POST",
							data: new FormData(this),
        					contentType: false,       
        					cache: false,             
        					processData:false,
							success:function(data)
							{
							    alert('Successfully Inserted Product!!!');
								$('#loadData').load('products');
							}
						});
					}
				}
			}));       

            function deleteProduct(Did)
			{
				$.ajax({
					url:"deleteProduct",
					type:"GET",
					data:'&Did='+Did,
					success:function(data)
					{
                        if(data==1)
                        {
						    alert("Sucessfully!", "Sucessfully Deleted Product!!", "success");   
						    $('#loadData').load('products');
                        }
					}
				})
			}


            function editProduct(Eid)
	        {
				$.ajax({
						url:"editProduct",
						type:"GET",
    					data:'&Eid='+Eid,
                      	success:function(data)
						{                          
						    var obj=JSON.parse(data);                               
                            
                                $('#pid').val(obj.pid);
                                $('#category').val(obj.p_category);
                                                               
                                $('#product_name').val(obj.p_name);
						        $('#product_id').val(obj.product_id);
                                $('#product_grams').val(obj.grams);
                                $('#product_purity').val(obj.purity);
                                $('#product_price').val(obj.price);
                                $('#img').html("<img src=/"+obj.p_image+" style='width:150px;height:100px'>");
							  $('#update_image').val(obj.p_image);  

                              $('#category').hasvalue(loadSubcategory());
                              /* $('select[id="subcategory"]').val(obj.p_subcategory);
                               $('#subcategory').setvalue(obj.p_subcategory); 
                               $('#category').on('hasvalue',function()
                                {
                                    if(sub.sid == obj.p_subcategory)
                                    {
                                        $('#subcategory').val(sub.subcategory);   
                                    }
                                }
                              );
                              
                              */
						}
					});		
	        }

            
            function loadSubcategory()
			{           
                $("#subcategory").html(''); 
                    category=$('#category').val();
                    $.ajax({
							url:"loadSubcategory",
							type:"GET",
							data:'&category='+category, 
                            success:function(data)
                            {   
                                var sub=JSON.parse(data);
                                for(i=0;i<sub.length;i++)
                                {                                    
                                    $("#subcategory").append("<option value='"+sub[i].sid+"'>"+sub[i].subcategory+"</option>");
                                    
                                }
                                
                            }                        
                        })
            }
            
</script>
</body>
</html>