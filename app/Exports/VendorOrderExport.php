<?php

namespace App\Exports;

use App\Order;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use DB;
use Auth;
class VendorOrderExport implements FromView
{
   
   
        protected $data;
        protected $from;
        protected $to;
        protected $name;
        protected $status;
        protected $vendor;
        protected $rider;
    
    
    
    
        function __construct($data) {
            $this->data = $data;
            $this->from=$this->data['from'];
            $this->to=$this->data['to'];
            $this->status=$this->data['status'];
            $this->vendor=$this->data['vendor'];
    
    
    
     }
    
        public function view(): View
        {
            $id=Auth::user()->id;
            $data="SELECT order_details.*,orders.status,orders.tracking_code,products.name,products.image FROM order_details JOIN orders ON orders.id=order_details.order_id JOIN products ON products.id=order_details.product_id WHERE order_details.vendor_id = $id ";
    
            if(isset($this->data['vendor']) && !empty($this->data['vendor'])){
                $data .="  AND order_details.qty = '$this->vendor' ";
            }
           
             if(isset($this->data['status']) && !empty($this->data['status'])){
                $data .="  AND orders.status = $this->status ";
            }
          
          
            if(isset($this->data['to']) && !empty($this->data['to']) ||isset($this->data['from']) && !empty($this->data['from'])){
                $data .=" AND   order_details.created_at BETWEEN '$this->from' AND '$this->to' ";
            }
       
    
            return view('vendorpanel.order.excel', [
                'order' =>DB::select($data)
            ]);
        }
}
