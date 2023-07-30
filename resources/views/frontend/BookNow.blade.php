@include('frontend/layouts/header')


<div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12"  >
 
<ol class="breadcrumb bc_head ">
    <li><a href="/">Home</a></li>            
    <li><a href="ourproducts">Our Products</a></li>
    <li><a href="ourproducts" >{{$data['productdetails']->c_name}}</a></li>     
    <li><a href="ourproducts"></a>{{$data['productdetails']->subcategory}}</li>
    
    <li class="active" >{{$data['productdetails']->p_name}}</li>

</ol>
 
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
    <h2 class="booknow">Book Now</h2>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <img src="{{$data['productdetails']->p_image}}" width="100%">
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <h2 class="pname" >{{$data['productdetails']->p_name}}</h2>
        <p class="price">₹ {{$data['productdetails']->price}}.00</p>

        <table class="ptable table table-responsive table-hover">
            <thead>
                <th>Product Details</th>
                <th><p style="text-align:right"><span class=" glyphicon glyphicon-menu-down "></span></p></th>
            </thead>
            <tbody>
                <tr>
                    <td>Product Category</td>
                    <td><p style="text-align:right">{{$data['productdetails']->c_name}}</p></td>
                </tr>
                <tr>
                    <td>Product Sub Category</td>
                    <td><p style="text-align:right">{{$data['productdetails']->subcategory}}</p></td>
                </tr>
                <tr>
                    <td>Product ID</td>
                    <td><p style="text-align:right">{{$data['productdetails']->product_id}}</p></td>
                </tr>
                <tr>
                    <td>Product Weight</td>
                    <td><p style="text-align:right">{{$data['productdetails']->grams}} grams</p></td>
                </tr>
                <tr>
                    <td>Product Purity</td>
                    <td><p style="text-align:right">{{$data['productdetails']->purity}}</p></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="ordernow col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <h2 class="booknow">Order Now</h2>
    <form id="orderform" class="form-horizontal">
        <input type="hidden" name="order_id" id="order_id">        
        <input type="hidden" name="customer_id" id="customer_id" value="{{$data['uid']}}">

        <input type="hidden" name="pid" id="pid" value="{{$data['pid']}}">
        <input type="hidden" name="_token" id="token2" value="{{ csrf_token() }}">
               
    <div class="col-lg-offset-2 col-md-offset-2 col-lg-8 col-md-8 col-sm-12 col-xs-12">
        
        <div class="form-group">
            <label for="quantity" class="col-sm-3 control-label field_name">Quantity: </label>
            <div class=" col-lg-2 col-md-2 col-xs-12 col-sm-12">
                <input type="number" class="form-control input_field"  name="quantity" id="quantity" placeholder="Quantity">
            </div>
        </div>
        <div class="form-group">
                <label for="customer_name" class="col-sm-3 control-label field_name">Customer Name: </label>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <input type="text" class="form-control input_field" name="customer_name" id="customer_name" placeholder="Customer Name">
                </div>
            </div>
        <div class="form-group">
            <label for="phone_no" class="col-sm-3 control-label field_name">Phone Number: </label>
            <div class=" col-lg-6 col-md-6 col-xs-12 col-sm-12">
                <input type="number" class="form-control input_field" name="phone_no" id="phone_no" placeholder="Phone Number">
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-3 control-label field_name">Email: </label>
            <div class=" col-lg-6 col-md-6 col-xs-12 col-sm-12">
                <input type="email" class="form-control input_field" name="email" id="email" placeholder="Email">
            </div>
        </div>
        <div class="form-group">
            <label for="address" class="col-sm-3 control-label field_name">Address: </label>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <textarea type="text" rows="3" class="form-control input_field" name="address" id="address" placeholder="Address"></textarea>
            </div>
        </div>
        <div class="col-lg-offset-4 col-md-offset-4 col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
            <?php if ($data['uid']=='0')
                {
                ?>
                    <a href="customerlogin" type="submit" class="order_button_login btn"> Place your Order</a>
                <?php }
                else
                {?>
                    <button type="submit" class="order_button"> Place your Order</button>
            <?php }?>            
        </div>
    </div>
    </form>
</div>



@include('frontend/layouts/footer')
