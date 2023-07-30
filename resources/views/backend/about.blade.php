<html>
<head lang="en">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>About Royal</title>
<link href="backend/css/bootstrap.min.css" rel="stylesheet">
<link href="backend/backend_style/style.css" rel="stylesheet">
</head>
<body class="body" >    

<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12 ">
    <form id="aboutform">
            <input type="hidden" name="about_id" id="about_id" value="{{$data['about']->id}}">
            <input type="hidden" name="_token" id="token2" value="{{ csrf_token() }}">

            <div class="top_section form-group col-lg-offset-1 col-lg-11 col-md-offset-1 col-md-11 col-sm-12 col-xs-12">
            
                <h3>Add Data</h3>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <label for="about_description">Description</label>
                    <textarea rows="3" id="about_description" name="about_description" type="text" class="entry_field form-control" >{{ $data['about']->description }}</textarea>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button type="submit" class="submit_button btn btn-default">Submit</button>
                </div>

            
        </div>
		</form>
    </div>

<script src="backend/js/jquery.validate.min.js"></script>
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>	
	Flag=0;
	$('.submit_button').click(function(e)
			{
				
				e.preventDefault();
				$("#aboutform").validate({
					rules:{

						about_description:
						{
							required:true
							
						}                        
					},
					messages:
					{
						about_description:
						{
							required: "Please Enter Description"
                        }              
						
					}  
					
				});
				if($("#aboutform").valid())
				{ 
					if(Flag==0)
					{
						Flag++;
						$.ajax({
							url:"aboutFetch",
							type:"POST",
							data:$('#aboutform').serialize(), 
							success:function(data)
							{
							    alert('Successfully Inserted Description!!!');
								$('#loadData').load('about');
							}
						});
					}
				}
			});
</script>

<script>
CKEDITOR.replace( 'about_description' );
</script>


</body>
</html>