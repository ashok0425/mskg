<!DOCTYPE html>
<html>

<head>
   
    <style>
      
        body{
            padding:0;
            margin:0;
            box-sizing:border-box;
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            color: #000;
         padding-left:30px;
         padding-right:30px;
            background: #fff;

        }
        
        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }
        
        .invoice-box table td {
            padding: 8px 0;
            vertical-align: top;
        }
        .padding{
            padding-left:400px;
        }
     
        
        .invoice-box table tr.top table td {
            padding-bottom: 30px;
        }
        
       
        
        .invoice-box table tr.information table td {
            padding-bottom: 70px;
        }
    
        .invoice-box table tr.heading td {
            border-bottom: 2px solid #005aa6;
            font-weight: bold;
          
padding-top: 1rem;
padding-bottom: 1rem;


        }
        
        .invoice-box table tr.details td {
            border-bottom: 2px solid gray;

            padding-bottom: 20px;
        }
        .invoice-box table tr.details td:last-child {
           

            padding-bottom: 20px;
        }
        
      
        
        .invoice-box table tr.total td {
            border-top: 2px solid #005aa6;
            border-bottom: 2px solid #005aa6;
           
        }
       
        @media only screen and (max-width: 600px) {
            .padding{
            padding-left:0px;
        }
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }
            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
         
        }
        /** RTL **/
        
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }
        
        .rtl table {
            text-align: right;
        }
        
        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
        .add{
            font-size: 20.5px;
            margin: 0!important; 
            padding-left: -60px!important;
            line-height: 1.3;
            font-weight:0!important;
        }
        
        .bill h3,.invoice h3{
            color:#005aa6;
            font-size: 1.8rem;
            font-weight: 700;
        }
       
        
.border_bottom{
    width:120%;
    position:fixed;
    bottom:-50px;
    height:80px;
    background:#005aa6;
    padding:0;
    left:-100px;
    margin:0;
   
}
.links{
    padding:20px 100px;
}
.links a{
   
   margin-left:20px;
    margin-right:20px;
    color:#fff;
    text-decoration:none;
}

    </style>
</head>

<body>
    <div class="invoice-box">
     
        @php
        $web=DB::table('websites')->first();

    @endphp
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="4">
                    <table>
                        <tr>
                            <td class="title ">
                              <a href="https://krafftbox.com/"class='add' >
                                    <img src="{{ asset('kraft.png') }}" style="width: 100%; max-width: 400px" />
                              </a>
                          <div class="text">
                              
                                
                            <div class='add'>
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;{{$web->phone1}}
       
                                     </div>
                              <div class='add'>
                              &nbsp;  &nbsp; &nbsp;    &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; {{$web->email1}}

                              </div>
                              <div class='add'>
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;{{$web->address1}}
       
                                     </div>
                          </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            @yield('content')
        </table>
        <h4>
        Please do not hesitate to reach us at  <a href='tel:9818212439'>9818212439</a>or 
        
            <a href='mailto:support@krafftbox.com'>support@krafftbox.com</a> 
        
        

- if you have any questions or queries.
</h4>
        <br><br><br><br>
    <div class='border_bottom '>
      
 <div class='links'>
            <a href='mailto:{{$web->email1}}'>{{$web->email1}}</a> <a herf='https://krafftbox.com'>www.krafftbox.com</a> <a href='tel:{{$web->phone1}}'>{{$web->phone1}}</a>
 </div>
    </div>
</body>

</html>