<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>invoice</title>

<style>
 
#invoice-POS {
	box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
	padding: 2mm;
	margin: 0 auto;
	width: 44mm;
	background: #FFF;
}

#invoice-POS ::selection {
	background: #f31544;
	color: #FFF;
}

#invoice-POS ::moz-selection {
	background: #f31544;
	color: #FFF;
}

#invoice-POS h1 {
	font-size: 1.5em;
	color: #222;
}

#invoice-POS h2 {
	font-size: .9em;
}

#invoice-POS h3 {
	font-size: 1.2em;
	font-weight: 300;
	line-height: 2em;
}

#invoice-POS p {
	font-size: .7em;
	color: #666;
	line-height: 1.2em;
}

#invoice-POS #top, #invoice-POS #mid, #invoice-POS #bot {
    /* Targets all id with 'col-' */
	border-bottom: 1px solid #EEE;
}

#invoice-POS #top {
	min-height: 100px;
}

#invoice-POS #mid {
	min-height: 80px;
}

#invoice-POS #bot {
	min-height: 50px;
}

#invoice-POS #top .logo {
	height: 60px;
	width: 60px;
	
}


#invoice-POS .info {
	display: block;
	margin-left: 0;
}

#invoice-POS .title {
	float: right;
}

#invoice-POS .title p {
	text-align: right;
}

#invoice-POS table {
	width: 100%;
	border-collapse: collapse;
}

#invoice-POS .tabletitle {
	font-size: .5em;
	background: #EEE;
}

#invoice-POS .service {
	border-bottom: 1px solid #EEE;
}

#invoice-POS .item {
	width: 24mm;
}

#invoice-POS .itemtext {
	font-size: .5em;
}

#invoice-POS #legalcopy {
	margin-top: 5mm;
}
.text-center{
  text-align: center;
}
.bill{
  font-weight: 800;
  font-size: 21px;

}
.invoice_no{
  font-size: 14px;
}
.my-0{
  margin: 0!important;
}

.py-0{
  padding: 0!important;
}
.py-1{
  padding: 4px 0!important;
}
*,p,.itemtext{
    font-family: Arial, Helvetica, sans-serif!important;
    font-weight: 700!important;
    color: #000!important;
  }
</style>
</head>
<body>
    



<div id="invoice-POS">

   
  
    <!--End InvoiceTop-->
  
    <div id="mid">
      <div class="info">
        <div class="text-center">
        <img src="{{ asset('logo.png') }}" alt=""  style="margin: auto!important;width:50%">

        </div>
        <p class="text-center my-0 py-0">
          Biratnagar-12 Roadcess Chowk
        </br>
        In front of Saptakoshi Hospital
          <br>
           example@gmail.com
          </br>
           98232323232,9232223331
           <br>
          PAN NO : 609312071
          <br>
          Date : {{ date('d M Y') }}
        </p>
        <p class="text-center my-0 py-0 py-1">
           <span class="invoice_no">INVOICE : </span>  <span class="bill ">{{ $orderId }}</span>
        </p>
        
      </div>
    </div>
    <!--End Invoice Mid-->
  
    @php
        $order=DB::table('order_details')->join('menus','menus.id','order_details.menu_id')->select('order_details.*','menus.name')->where('order_id',$order_id)->get();
    @endphp
    <div id="bot">
  
      <div id="table">
        <table>
          <tr class="tabletitle">
            <td class="item">
              <h2>Item</h2>
            </td>
            <td class="Hours">
              <h2>Qty</h2>
            </td>
            <td class="Rate">
              <h2>Price (Rs)</h2>
            </td>
          </tr>
     @foreach ($order as $item)
      
          <tr class="service">
            <td class="tableitem">
              <p class="itemtext">{{ $item->name}}</p>
            </td>
            <td class="tableitem">
              <p class="itemtext">{{ $item->qty }}</p>
            </td>
            <td class="tableitem">
              <p class="itemtext">{{ $item->price }}</p>
            </td>
          </tr>
          @endforeach

       
         
  
          <tr class="tabletitle">
            <td></td>
            <td class="Rate">
              <h2>Total</h2>
            </td>
            <td class="payment">
              <h2>{{ $total }}</h2>
            </td>
          </tr>
  
        </table>
      </div>
      <!--End Table-->
  
      <div id="legalcopy">
        <p class="legal text-center my-0 py-0"><strong>Thank you for  visiting us!
        </strong>  
        <p class="text-center my-0 y-0 py-1">
          Wifi : Nopassword
        </p>
        <p class="text-center my-0 y-0 py-1">
          {{ mt_rand(1,1000000) }}
        </p>
        </p>
      </div>
  
    </div>
    <!--End InvoiceBot-->
  </div>
  <!--End Invoice-->

</body>
</html>