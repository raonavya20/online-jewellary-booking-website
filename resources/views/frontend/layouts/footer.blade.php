<div class="footer col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <p class="footer_logo_image"><img class="footer_logo" src="frontend/image/logonew.PNG" /></p>
        <p class="footer_logo_parah">Royal Jewellers is an independent family jeweller with over 80 years' experience and expertise in the beautiful world of jewellery. We are passionate about offering the highest quality of service and our wealth of knowledge guarantees you and your precious jewellery will be exceptionally cared for.</p>
        <p class="footer_logo_parah">Follow Us:  <a href="https://www.facebook.com"><img class="footer_link" src="frontend/image/facebook.png" width="40"/></a>
            <a href="https://www.instagram.com/"><img class=" footer_link " src="frontend/image/instagram.png" width="35"/></a> 
            <a href="https://www.twitter.com"><img class=" footer_link" src="frontend/image/twitter.png" width="40"/></a> </p>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="links col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <p class="link_heading">Quick Links</p>
                <ul class="quick_links">
                    <li><a href="/" class="link">Home</a></li>
                    <li><a href="aboutus" class="link">About Us</a></li>
                    <li><a href="ourproducts" class="link">Our Products</a></li>
                    <li><a href="contactus" class="link">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <p class="link_heading">Our Policies</p>
                <ul class="quick_links">
                    <li ><a href="contactus#refund" class="link">Refund Policy</a></li>
                    <li><a href="contactus#buyback" class="link">Buyback Policy</a></li>
                    <li><a href="contactus#exchange" class="link">Exchange Policy</a></li>
                    <li><a href="contactus#shipping" class="link">Shipping Policy</a></li>
                    <li><a href="contactus#cancellation" class="link">Cancellation Policy</a></li>
                    <li><a href="contactus#privacy" class="link">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
        <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <p class="link_heading">At Your Service </p>
            <p class="quick_links"><img src="frontend/image/call.png" width="35"/> +91 9835672003/9835672004</p>
            <p class="quick_links"><img src="frontend/image/mail.png" width="30"/><a href="https://mail.google.com" class="link"> royaljewellers@gmail.com</a></p>
            <p class="quick_links"><img src="frontend/image/location.png" width="30"/> No.128, Jumma Masjid Road, Malleshwaram, Bangalore - 560055</p>
        </div>        
    </div>
</div>

<div class=" copyright col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <p class="copyright_line" >© 2022 Royal Jewellers. All Rights Reserved.</p>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->

<script src="frontend/js/jquery.validate.min.js"></script>
<script src="frontend/js/bootstrap.min.js"></script>


<script>
    function hover(element) {
    element.setAttribute('src', 'frontend/image/profile2.png');    
    }

    function unhover(element) {
    element.setAttribute('src',  'frontend/image/profile.png');
    }
</script>

<script>
    let mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
    if (document.body.scrollTop > 800 || document.documentElement.scrollTop > 800) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }
</script>


<script>
	$('.menu').click(function(e)
	{
		e.preventDefault();
		$('#loadData').load($(this).attr('href'));
	});
</script>



<!---------------------------------------------order form----------------------------->



<script>    	
	Flag=0;
	$('.order_button').click(function(e)
			{
				
				e.preventDefault();
				$("#orderform").validate({
					rules:{
						date:
						{
							required:true
							
						},
                        quantity:
						{
							required:true
							
						},
                        customer_name:
						{
							required:true
							
						},
                        phone_no:
						{
							required:true
							
						},
                        email:
						{
							required:true
							
						},
                        address:
						{
							required:true
							
						}
					},
					messages:
					{
						date:
						{
							required: "Please Enter Date"
                        },
                        quantity:
						{
                            required: "Please Enter Quantity"
                        },
                        customer_name:
						{
							required: "Please Enter Full Name"
                        },
                        phone_no:
						{
							required: "Please Enter Phone Number"
                        },
                        email:
						{
							required: "Please Enter Email Address"
                        },
                        address:
						{
							required: "Please Enter Address"
                        }

                        					
					}  
					
				});
				if($("#orderform").valid())
				{ 
					if(Flag==0)
					{
						Flag++;
						$.ajax({
							url:"orderFetch",
							type:"POST",
							data:$('#orderform').serialize(), 
							success:function(data)
							{
							    alert('Order Placed!!!');
								location.reload();
							}
						});
					}
				}
			});      
        
</script>

<!------------------------------------update profile details------------------------->
<script>
	
	Flag=0;
	$('.profile_submit').click(function(e)
			{
				
				e.preventDefault();
				$("#profileform").validate({
					rules:{

						fname:
						{
							required:true
							
						},
                        lname:
						{
							required:true
							
						} ,
                        email:
						{
							required:true
							
						},
                        dob:
						{
							required:true
							
						},
                        mobile:
						{
							required:true
							
						},
                        gender:
						{
							required:true
							
						}                       

					},
					messages:
					{
						fname:
						{
							required: "Please Enter First Name"
                        },
                        lname:
						{
							required: "Please Enter Last Name"
                        },
                        email:
						{
							required: "Please Enter Email"
                        },
                        dob:
						{
							required: "Please Enter Date of Birth"
                        },
                        mobile:
						{
							required: "Please Enter Mobile"
                        },
                        gender:
						{
							required: "Please Enter Gender"
                        }
                    
                           
						
					}  
					
				});
				if($("#profileform").valid())
				{ 
					if(Flag==0)
					{
						Flag++;
						$.ajax({
							url:"profile_update",
							type:"POST",
							data:$('#profileform').serialize(), 
							success:function(data)
							{
							    alert('Successfully Updated Profile Details!!!');
								window.location.assign('customerprofile');
							}
						});
					}
				}
			});
</script>







</body>
</html>