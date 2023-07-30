<html>
<head lang="en">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Invoice</title>
<link href="backend/css/bootstrap.min.css" rel="stylesheet">
<link href="backend/backend_style/style.css" rel="stylesheet">
</head>
<body style="background-color:gray" onload=window.print()>
    <div class="invoice_body col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <p class="invoice_logo_parah"><img class="invoice_logo" src="backend/image/logonew.png"  width="70%"></p>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <p class="invoice_head">INVOICE</p>
            </div>
        </div>
        <div class="sub_div col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                <p class="date">Date: <span class="invoice_no_det">{{ date('Y-m-d') }}</span></p>            
            </div>
            <div class="col-lg-offset-6 col-md-offset-6 col-lg-3 col-md-3 col-sm-6 col-xs-6">
                <p class="invoice_no">Invoice No: <span class="invoice_no_det">{{ $data['orders']->oid }}</span></p>
            </div>
        </div>
        <div class="sub_div col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                <p class="invoiced_to">Invoiced To:</p>
                <p class="invoiced_to_details">{{ $data['orders']->customer_name }}</p>
                <p class="invoiced_to_details"> {{ $data['orders']->phone_no }}</p>
                <p class="invoiced_to_details"> {{ $data['orders']->email }}</p>
            </div>
                <div class="col-lg-offset-6 col-md-offset-6 col-lg-3 col-md-3 col-sm-6 col-xs-6">
                <p class="pay_to">Pay To:</p>
                <p class="pay_to_details">Royal Jewellers <br> No.128, Jumma Masjid Road, Malleshwaram, Bangalore - 560055</p>
            </div>
        </div>
        <div class="sub_div col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="thead">Sl.No</th>
                            <th class="thead">Product ID</th>
                            <th class="thead">Product Name</th>
                            <th class="thead">Quantity</th>                            
                            <th class="thead">Grams</th>
                            <th class="thead">Amount</th>
                            <th class="thead">Total Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data['products'] as $p)
                    <?php if($p->pid == $data['orders']->prod_id): ?>
                        <tr>                            
                            <td class="tdata">1</td>
                            <td class="tdata">{{$p->product_id}}</td>
                            <td class="tdata">{{$p->p_name}}</td>
                            <td class="tdata">{{$data['orders']->quantity}}</td>
                            <td class="tdata">{{$p->grams}}</td>
                            <td class="tdata">{{$p->price}}</td>
                            <td class="amount">₹ <?php 
                            $price=$p->price ;
                            $price_new = floatval(str_replace(',','',$price)) ;
                            $price_product= $price_new * $data['orders']->quantity ;
                            $total=0;
                            $total+=$price_product;
                                    echo $price_product  ?>.00 </td>
                        </tr>
                        <?php endif ?>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6"  class="total">Grand Total:</td>
                            <td  class="amount">₹ <?php echo $total ?>.00</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>


    </div>
    
</body>
</html>