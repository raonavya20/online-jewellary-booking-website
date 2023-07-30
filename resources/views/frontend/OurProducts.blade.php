@include('frontend/layouts/header')

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
    <div class="img_container" >
        <img src="frontend/image/brides copy.jpg" style="width:100%">        
    </div>
</div>

<div class="shop col-lg-12 col-md-12 col-sm-12 col-xs-12" id="shop">
    <p class="know_us_heading">Shop by Category</p>    
    <div class="shop_category col-lg-12 col-md-12 col-sm-12 col-xs-12" >
        @foreach($data['categoryloop'] as $head)
            <div class="category_name_section col-lg-2 col-md-2 col-sm-12 col-xs-12" ><a href="#{{$head->c_name}}" class="category_name">{{$head->c_name}}</a></div>
        @endforeach        
    </div>
</div>

<a href="#shop" onclick="topFunction()" role="button" class="btn btn-lg top_button" id="myBtn">TOP</a>


@foreach($data['categoryloop'] as $cat)
<div class="jewel_section col-lg-12 col-md-12 col-sm-12 col-xs-12" id="{{$cat->c_name}}">
    <h2 class="jewel_heading">{{$cat->c_name}}</h2>    
    <div class="jewel_type" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >             
        @foreach ($data['subcategoryloop'] as $sub)
            <?php if($sub->category == $cat->cid ): ?>                                         
                <a href="#<?php echo $sub->sid ?>" class="product_button btn btn-lg" role="button" ><?php echo $sub->subcategory ?></a>
            <?php endif ;?> 
        @endforeach
    </div>
        
    @foreach ($data['subcategoryloop']->where('category',$cat->cid) as $sub)
        <div class="product col-lg-12 col-md-12 col-sm-12 col-xs-12" id="<?php echo $sub->sid ?>">
            <ol class="breadcrumb breadcrumb_prodhead">
                <li><a href="#{{$cat->c_name}}">{{$cat->c_name}}</a></li>            
                <li class="active">{{$sub->subcategory}}</li>
            </ol>                 

            @foreach ($data['productloop'] as $p)
            <?php if($p->p_category==$cat->cid and $p->p_subcategory == $sub->sid ): ?>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="thumbnail product_thumbnail">                        
                        <img class="prod_image" src="{{$p->p_image}}"/>  
                        <p class="product_title">{{$p->p_name}} <?php $uq=uniqid();?></p>
                        <p class="product_price">Price: ₹ {{$p->price}}.00</p>                        
                        <p style="text-align:center">
                            <button class="view_details_btn btn btn-default"  type="button" data-toggle="collapse" data-target="#<?php echo $uq;?>" aria-expanded="false" aria-controls="<?php echo $uq;?>">View Details</button>
                            <a href="booknow?pid={{$p->pid}}" class="book_now_btn btn btn-default" >BUY NOW</a>
                        </p>
                        <div class="prod_details collapse" id="<?php echo $uq;?>" >
                            <h4 class="prod_details_heading">Product Details</h4>
                            <div class="prod_details_parah">
                                <p>Product Id: {{$p->product_id}} </p>
                                <p>Grams: {{$p->grams}} grams </p>
                                <p>Purity: {{$p->purity}}  </p>
                            </div>
                        </div>
                    </div>
                </div> 
            <?php endif ;?>
            @endforeach        
        </div>
    @endforeach          
</div>           
@endforeach

@include('frontend/layouts/footer')










