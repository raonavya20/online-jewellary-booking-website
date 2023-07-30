@include('frontend/layouts/header')

<div class="top_cover col-lg-12 col-md-12 col-sm-12 col-xs-12" >
    <div class="cover col-lg-offset-4 col-lg-8 col-md-offset-4 col-md-8 col-sm-12 col-xs-12">
        <section class="cover_section ">
            <p class="main_line">JEWELS FOR ALL OCCASIONS</p>
            <p class="cover_line"> Make your day look <span class="royal"> ROYAL </span> with wide collections of jewels...</p>
        </section>
    </div>
</div>

<div class="know_section col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <p class="know_us_heading">KNOW US</p>
    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
        <section class="know_us_parah">
            <p >Royal Jewellers is an independent family jeweller with over 80 years' experience and expertise in the beautiful world of jewellery. We are passionate about offering the highest quality of service and our wealth of knowledge guarantees you and your precious jewellery will be exceptionally cared for.</p>
            <p >We specialise in the finest quality jewellery repairs, remodelling and custom designs, and offer a one-on-one, personalised design service with quality workmanship and attention to detail. </p>
            <p class="readmore_btn"><a href="aboutus" class="readmore_button btn btn-default" role="button">READ MORE</a></p>
        </section>
    </div>
    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
        <img class="know_us_image" src="frontend/image/royal1.jpg"/>
    </div>    
</div>

<div class="promise col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <p class="know_us_heading">OUR PROMISE</p>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"><p class="promise_image"><img src="frontend/image/cover-bride.jpeg" width="90%"></p></div>
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="media">
                    <div class="media-left">
                     <img class="media-object" src="frontend/image/maintenance.png" width="100">
                    </div>
                    <div class="media-body">
                        <p>Assured Lifetime Maintenance</p>
                    </div>
                </div>
                <div class="media">
                    <div class="media-left">
                     <img class="media-object" src="frontend/image/exchange.png" width="110"/>
                    </div>
                    <div class="media-body">
                        <p >Easy Exchange</p>
                    </div>
                </div>
                <div class="media">
                    <div class="media-left">
                     <img class="media-object" src="frontend/image/insurance.png" width="100"/>
                    </div>
                    <div class="media-body">
                        <p >Your Jewellery Is Insured</p>
                    </div>
                </div>
                <div class="media">
                    <div class="media-left">
                     <img class="media-object" src="frontend/image/return.png" width="80"/>
                    </div>
                    <div class="media-body">
                        <p >14 Days Return Policy</p>
                    </div>
                </div>           
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="media">
                    <div class="media-left">
                     <img class="media-object" src="frontend/image/trusted.png" width="90">
                    </div>
                    <div class="media-body">
                        <p  >Tested & Certified Diamonds</p>
                    </div>
                </div>
                <div class="media">
                    <div class="media-left">
                     <img class="media-object" src="frontend/image/deduction.png" width="95"/>
                    </div>
                    <div class="media-body">
                        <p >Zero Deduction Gold Exchange</p>
                    </div>
                </div>
                <div class="media">
                    <div class="media-left">
                     <img class="media-object" src="frontend/image/hallmark.png" width="90"/>
                    </div>
                    <div class="media-body">
                        <p >BIS 916 Hallmarked Pure Gold</p>
                    </div>
                </div>
                <div class="media">
                    <div class="media-left">
                     <img class="media-object" src="frontend/image/buyback.png" width="70"/>
                    </div>
                    <div class="media-body">
                        <p >Guaranteed Buyback</p>
                    </div>
                </div>           
            </div>
            </div>
        </div>
    </div>       
</div>

<div id="category_section" class= "category_section col-lg-12 col-md-12 col-sm-12 col-xs-12">
    
    <p class="category_heading">CATEGORIES</p>
    <div class="category column">
        @foreach($data['categoryloop'] as $c)
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="thumbnail category_thumbnail">
                <img class="category_image" src="{{$c->c_image}}" style="height:300px"/>   
            <div class="caption"><h3>{{ $c->c_name }}</h3></div>
            <p class="explore_btn"><a href="ourproducts#{{$c->c_name}}" class="explore_button btn btn-default" role="button">EXPLORE NOW</a></p>
            </div>
        </div>
        @endforeach
    </div>      

</div>

@include('frontend/layouts/footer')