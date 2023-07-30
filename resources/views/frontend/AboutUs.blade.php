@include('frontend/layouts/header')

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
       <img class="know_better_image" src="frontend/image/royal8.jpg" />
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <p class="know_us_better_parah">KNOW US BETTER</p>
        <ol class="breadcrumb breadcrumb_about">
            <li><a href="#">Home</a></li>            
            <li class="active">About Us</li>
        </ol>
    </div>
</div>

<div class="about_us col-lg-12 col-md-12 col-sm-12 col-xs-12" >
    <p class="about_us_heading">ABOUT US</p>
    <div class=" about_us_section about_us_parah col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?php echo $data['about']->description; ?>
    </div>
</div>

<div class="goals col-lg-12 col-md-12 col-sm-12 col-xs-12" >
    <p class="goal_logo_parah"><img class="goal_logo" src="frontend/image/logosymbol.png"></p>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" >
        <p class="goal_heading">OUR MISSION</p>
        <p class="goal_parah"><?php echo $data['goals']->mission; ?></p>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" >
        <p class="goal_heading">OUR VISION</p>
        <p class="goal_parah"><?php echo $data['goals']->mission; ?>
           </p>
    </div>
</div>
  

<div class="glance col-lg-12 col-md-12 col-sm-12 col-xs-12" >
    <p class="glance_heading">A QUICK GLANCE</p>
    <div class="row">
        @foreach($data['galleryloop'] as $g)
             <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <img src="{{$g->image}}" class="glance_image" width="100%" style="height:280px" />                
            </div>
        @endforeach
        </div>
</div>

@include('frontend/layouts/footer')