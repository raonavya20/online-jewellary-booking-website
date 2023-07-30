<html>
<head lang="en">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Gallery</title>
<link href="backend/css/bootstrap.min.css" rel="stylesheet">
<link href="backend/backend_style/style.css" rel="stylesheet">
</head>
<body class="body" >    
    
    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12 ">
    <form id="galleryform">
        <div class="top_section form-group col-lg-offset-1 col-lg-11 col-md-offset-1 col-md-11 col-sm-12 col-xs-12">
        <input type="hidden" name="gallery_id" id="gallery_id">
            <input type="hidden" name="_token" id="token2" value="{{ csrf_token() }}">

                <h3>Add Images</h3>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <label for="images">Image</label>
                    <input id="images" name="images" type="file" class="entry_field form-control" >
					<div id="img"></div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button type="submit" class="submit_button btn btn-default">Submit</button>
                </div>
            </form>
        </div>

        <div class="bottom_section col-lg-offset-1 col-lg-11 col-md-offset-1 col-md-11 col-sm-12 col-xs-12">
            <h3 >List of Images</h3>
            <div class="row">
            @foreach($data['galleryloop'] as $g)
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <img src="{{$g->image}}" class="gallery_image" width="100%" style="height:200px"/>                    
					<abbr title="Edit"><button class="edit_btn btn btn-default" onclick="editImage({{$g->id}})"   ><img src="backend/image/pen.png" width="18"/></button></abbr>
                    <abbr title="Delete"><button class="delete_btn btn btn-default"  onclick="deleteImage({{$g->id}})"><img src="backend/image/delete.png" width="18"/></button></abbr>
                             
            </div>
            @endforeach  
        </div> 
        </div>
    </div>

<script src="backend/js/jquery.validate.min.js"></script>
<script>	
	Flag=0;
	$('#galleryform').on('submit',(function(e)
			{
				
				e.preventDefault();
				$("#galleryform").validate({
					rules:{
						
					},
					messages:
					{
						
                        					
					}  
					
				});
				if($("#galleryform").valid())
				{ 
					if(Flag==0)
					{
						Flag++;
						$.ajax({
							url:"galleryFetch",
							type:"POST",
							data: new FormData(this),
        					contentType: false,       
        					cache: false,             
        					processData:false,
							success:function(data)
							{
							    alert('Successfully Inserted Images!!!');
								$('#loadData').load('gallery');
							}
						});
					}
				}
			}));

			function deleteImage(Did)
			{
				$.ajax({
					url:"deleteImage",
					type:"GET",
					data:'&Did='+Did,
					success:function(data)
					{
                        if(data==1)
                        {
                            alert("Sucessfully!", "Sucessfully Deleted Skill", "success");   
                            $('#loadData').load('gallery');
                        }
                    }
				})
			}


                function editImage(Eid)

	                {
				    	$.ajax({
						url:"editImage",
						type:"GET",
    					data:'&Eid='+Eid,
                      	success:function(data)
						{
                          
						    var obj=JSON.parse(data);
                                               
						      $('#gallery_id').val(obj.id);
						      $('#img').html("<img src=/"+obj.image+" style='width:200px;height:75px'>");
							  $('#update_image').val(obj.image);
						  
						}
					});
				}
</script>
</body>
</html>