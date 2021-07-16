<?php

namespace App\Exports;

use App\Order;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use DB;
class OrderExport implements FromView
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
            $data="SELECT orders.*,shippings.name,shippings.email,shippings.phone FROM  orders JOIN shippings ON shippings.order_id=orders.id WHERE orders.id !='' ";
    
            if(isset($this->data['vendor']) && !empty($this->data['vendor'])){
                $data .="  AND orders.payment_type = '$this->vendor' ";
            }
           
             if(isset($this->data['status']) && !empty($this->data['status'])){
                $data .="  AND orders.status = $this->status ";
            }
          
          
            if(isset($this->data['to']) && !empty($this->data['to']) ||isset($this->data['from']) && !empty($this->data['from'])){
                $data .=" AND   orders.created_at BETWEEN '$this->from' AND '$this->to' ";
            }
       
    
            return view('backend.order.excel', [
                'order' =>DB::select($data)
            ]);
        }
}
