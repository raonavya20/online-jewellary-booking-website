<html>
<head lang="en">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sub Category</title>
<link href="backend/css/bootstrap.min.css" rel="stylesheet">
<link href="backend/backend_style/style.css" rel="stylesheet">
</head>
<body class="body" >      
    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12 ">
        <form id="subcategoryform">
                <input type="hidden" name="subcategory_id" id="subcategory_id">
                <input type="hidden" name="_token" id="token2" value="{{ csrf_token() }}">
            <div class="top_section form-group col-lg-offset-1 col-lg-11 col-md-offset-1 col-md-11 col-sm-12 col-xs-12">                
            
            <h3>Add Sub Category</h3>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12">
                        <label for="category">Category Name</label>
                        <select class="form-control" name="category">
                        @foreach($data['categoryloop'] as $c)
                            <option value="{{$c->name}}">{{$c->name}}</option>
                        @endforeach
                        </select>                   
                    </div>
                    <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12">
                        <label for="subcategory">Sub Category Name</label>
                        <input id="subcategory" name="subcategory" type="text" class="entry_field form-control" >
                    </div>
                </div>                                      
                                   
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button type="submit" class="submit_button btn btn-default">Submit</button>
                </div>
            </div>
        </form>
    

        <div class="bottom_section col-lg-offset-1 col-lg-11 col-md-offset-1 col-md-11 col-sm-12 col-xs-12">
            <h3 >List of Sub Categories</h3>
            <div class="table_section col-lg-12 col-md-12 col-sm-12 col-xs-12"  >
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>                        
                        <th>Category Name</th>
                        <th>Sub Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>                    
                @foreach($data['subcategoryloop'] as $c)
                <tr>
                    <td>{{$c->category}}</td>
                    <td>{{$c->subcategory}}</td>
                    <td><abbr title="Edit"><button class="edit_btn btn btn-default" id="edit" name="edit" ><img src="backend/image/pen.png" width="18"/></button></abbr>
                    <abbr title="Delete"><button class="delete_btn btn btn-default" id="delete" name="delete" ><img src="backend/image/delete.png" width="18"/></button></abbr></td>
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
	$('.submit_button').click(function(e)
			{
				
				e.preventDefault();
				$("#subcategoryform").validate({
					rules:{

						category:
						{
							required:true
							
						},
                        subcategory:
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
							required: "Please Enter Sub Category Name"
                        }
                        
					}  
					
				});
				if($("#subcategoryform").valid())
				{ 
					if(Flag==0)
					{
						Flag++;
						$.ajax({
							url:"subcategoryFetch",
							type:"POST",
							data:$('#subcategoryform').serialize(), 
							success:function(data)
							{
							    alert('Successfully Inserted Sub Category!!!');
								$('#loadData').load('subcategory');
							}
						});
					}
				}
			});
</script>
</body>
</html>