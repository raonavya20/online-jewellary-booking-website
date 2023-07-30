
<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12  left-nav"> 
    <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 p_div"  >
        <h3>Orders History</h3>
        <div class="table_section">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>                        
                        <th>Order ID</th>
                        <th>Order Date</th>
                        <th>Product ID</th>
                        <th>Product Name</th> 
                        <th>Product Price</th>
                        <th>Quantity</th>                                           
                        <th>Total Price</th>
                        <th>Invoice</th>                           
                    </tr>
                </thead>
                <tbody> 
                @foreach($data['orders'] as $o)    
                <tr>
                    <?php if ($o->o_status=='0' ): ?>  
                        <td>{{$o->oid}}</td>                   
                        <td>{{$o->date}}</td>
                        @foreach($data['products'] as $p)
                            <?php if ($p->pid == $o->prod_id ): ?>
                            <td>{{$p->product_id}}</td>
                            <td>{{$p->p_name}}</td>  
                            <td> ₹ {{$p->price}}.00</td>  
                            <td>{{$o->quantity}}</td>                                          
                            <td>₹ <?php 
                            $price=$p->price ;
                            $price_new = floatval(str_replace(',','',$price)) ;
                            $price_product= $price_new * $o->quantity ;
                                    echo $price_product  ?>.00 </td>
                            <td><a href="invoice?oid={{$o->oid}} " >Invoice</a></td>      
                            <?php endif ?>                            
                        @endforeach       
                        <?php endif ?>               
                    </tr>                
                @endforeach                    
                </tbody>
            </table>
        </div>
    </div>

</div>

