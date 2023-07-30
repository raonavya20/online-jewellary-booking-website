<html>
<head lang="en">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Category</title>
<link href="backend/css/bootstrap.min.css" rel="stylesheet">
<link href="backend/backend_style/style.css" rel="stylesheet">
</head>
<body class="body" >      
    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12 ">
    <form id="categoryform">
        <div class="top_section form-group col-lg-offset-1 col-lg-11 col-md-offset-1 col-md-11 col-sm-12 col-xs-12">                
            <input type="hidden" name="category_id" id="category_id">
            <input type="hidden" name="_token" id="token2" value="{{ csrf_token() }}">
            <input type="hidden" name="update_image" id="update_image" class="form-control">

                <h3>Add Category</h3>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12">
                        <label for="category_name">Category Name</label>
                        <input id="category_name" name="category_name" type="text" class="entry_field form-control" >
                    </div>
                    <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12">
                        <label for="category_image">Category Image</label>
                        <input id="category_image" name="category_image" type="file" class="entry_field form-control" >
                        <div id="img"></div>
                    </div>                    
                </div>                    
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button type="submit" class="submit_button btn btn-default">Submit</button>
                </div>
            </div>
        </form>

        <div class="bottom_section col-lg-offset-1 col-lg-11 col-md-offset-1 col-md-11 col-sm-12 col-xs-12">
            <h3 >List of Categories</h3>
            <div class="table_section col-lg-12 col-md-12 col-sm-12 col-xs-12"  >
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>                        
                        <th>Category Name</th>
                        <th>Category Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>                    
                @foreach($data['categoryloop'] as $c)
                <tr>
                    <td>{{$c->c_name}}</td>
                    <td><img src="{{$c->c_image}}" width="10%"/></td>
                    <td><abbr title="Edit"><button class="edit_btn btn btn-default"  onclick="editCategory({{$c->cid}})"><img src="backend/image/pen.png" width="18"/></button></abbr>
                    <abbr title="Delete"><button class="delete_btn btn btn-default"  onclick="deleteCategory({{$c->cid}})" ><img src="backend/image/delete.png" width="18"/></button></abbr></td>
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
	$('#categoryform').on('submit',(function(e)
			{
				
				e.preventDefault();
				$("#categoryform").validate({
					rules:{
						category_name:
						{
							required:true
							
						}
					},
					messages:
					{
						category_name:
						{
							required: "Please Enter Category Name"
                        }
                        					
					}  
					
				});
				if($("#categoryform").valid())
				{ 
					if(Flag==0)
					{
						Flag++;
						$.ajax({
							url:"categoryFetch",
							type:"POST",
							data: new FormData(this),
        					contentType: false,       
        					cache: false,             
        					processData:false,
							success:function(data)
							{
							    alert('Successfully Inserted Category!!!');
								$('#loadData').load('category');
							}
						});
					}
				}
			}));            


            function deleteCategory(Did)
			{
				$.ajax({
					url:"deleteCategory",
					type:"GET",
					data:'&Did='+Did,
					success:function(data)
					{
                        if(data==1)
                        {
						    alert("Sucessfully Deleted Category!!", "success");   
						    $('#loadData').load('category');
                        }
					}
				})
			}

            function editCategory(Eid)
	        {
				$.ajax({
						url:"editCategory",
						type:"GET",
    					data:'&Eid='+Eid,
                      	success:function(data)
						{                          
						    var obj=JSON.parse(data);                               
                            
                                $('#category_id').val(obj.cid);
                                $('#category_name').val(obj.c_name);
                                
                                $('#img').html("<img src=/"+obj.c_image+" style='width:150px;height:100px'>");
							  $('#update_image').val(obj.image);                           
                              
						  
						}
					});		
	            }

</script>

</body>
</html>