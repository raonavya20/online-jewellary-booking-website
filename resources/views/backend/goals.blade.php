<html>
<head lang="en">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Goals</title>
<link href="backend/css/bootstrap.min.css" rel="stylesheet">
<link href="backend/backend_style/style.css" rel="stylesheet">
</head>
<body class="body" >    

<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12 ">
    <form id="goalsform">
            <input type="hidden" name="goals_id" id="goals_id" value="{{$data['goals']->id}}">
            <input type="hidden" name="_token" id="token2" value="{{ csrf_token() }}">

            <div class="top_section form-group col-lg-offset-1 col-lg-11 col-md-offset-1 col-md-11 col-sm-12 col-xs-12">
            
                <h3>Add Goals</h3>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <label for="mission">Mission</label>
                    <textarea rows="3" id="mission" name="mission" type="text" class="entry_field form-control" >{{ $data['goals']->mission }}</textarea>
                </div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <label for="vision">Vision</label>
                    <textarea rows="3" id="vision" name="vision" type="text" class="entry_field form-control" >{{ $data['goals']->vision }}</textarea>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button type="submit" class="submit_button btn btn-default">Submit</button>
                </div>            
        </div>
		</form>
    </div>

<script src="backend/js/jquery.validate.min.js"></script>

<script>	
	Flag=0;
	$('.submit_button').click(function(e)
			{
				
				e.preventDefault();
				$("#goalsform").validate({
					rules:{

						mission:
						{
							required:true
							
						} ,
						vision:
						{
							required:true
							
						}                        
					},
					messages:
					{
						mission:
						{
							required: "Please Enter Mission"
                        } ,
						vision:
						{
							required: "Please Enter Vision"
                        }              
						
					}  
					
				});
				if($("#goalsform").valid())
				{ 
					if(Flag==0)
					{
						Flag++;
						$.ajax({
							url:"goalsFetch",
							type:"POST",
							data:$('#goalsform').serialize(), 
							success:function(data)
							{
							    alert('Successfully Inserted Goals!!!');
								$('#loadData').load('goals');
							}
						});
					}
				}
			});
</script>



</body>
</html>