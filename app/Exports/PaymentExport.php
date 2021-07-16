<?php

namespace App\Exports;

use App\Payment;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use DB;
class PaymentExport implements FromView
{
   
   
        protected $data;
        protected $from;
        protected $to;
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
            $data="SELECT payments.*,users.name,users.id as vid FROM payments JOIN users ON users.id=payments.vendor_id WHERE payments.payment_mode != '' ";
    
            if(isset($this->data['vendor']) && !empty($this->data['vendor'])){
                $data .="  AND users.id = $this->vendor ";
            }
          
            if(isset($this->data['status']) && !empty($this->data['status'])){
                $data .="  AND payments.payment_mode = '$this->status' ";
            }
          
            if(isset($this->data['to']) && !empty($this->data['to']) ||isset($this->data['from']) && !empty($this->data['from'])){
                $data .=" AND   payments.created_at BETWEEN '$this->from' AND '$this->to' ";
            }
       
            
          
       
    
    
            return view('backend.payment.excel', [
                'payment' =>DB::select($data)
            ]);
        }
}
