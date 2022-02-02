@extends('admin.layout.master')

@section('content')
   <div class="card shadow">
       <div class="card-header d-flex justify-content-between align-items-center py-3">
        <h6 class="m-0 font-weight-bold text-primary pt-2">SELL'S Report in Chart</h6>
    
       </div>
   </div>
   <div class="row">
<div class="col-md-5">
   <div class="card shadow">

    <div class="card-body">
  
    @php
    use carbon\carbon;
              $d1=DB::table('orders')->whereYear('created_at',carbon::now()->year)->whereMonth('created_at',carbon::now()->month)->whereDay('created_at',carbon::now()->day)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get()->count();
           
           $d2=DB::table('orders')->whereYear('created_at',carbon::now()->year)->whereMonth('created_at',carbon::now()->month)->whereDay('created_at',carbon::now()->subDay(1))->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get()->count();
           
           $d3=DB::table('orders')->whereYear('created_at',carbon::now()->year)->whereMonth('created_at',carbon::now()->month)->whereDay('created_at',carbon::now()->subDay(2))->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get()->count();

           $d4=DB::table('orders')->whereYear('created_at',carbon::now()->year)->whereMonth('created_at',carbon::now()->month)->whereDay('created_at',carbon::now()->subDay(3))->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get()->count();

           $d5=DB::table('orders')->whereYear('created_at',carbon::now()->year)->whereMonth('created_at',carbon::now()->month)->whereDay('created_at',carbon::now()->subDay(4))->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get()->count();

           $d6=DB::table('orders')->whereYear('created_at',carbon::now()->year)->whereMonth('created_at',carbon::now()->month)->whereDay('created_at',carbon::now()->subDay(5))->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get()->count();

           $d7=DB::table('orders')->whereYear('created_at',carbon::now()->year)->whereMonth('created_at',carbon::now()->month)->whereDay('created_at',carbon::now()->subDay(6))->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get()->count();
           $D1=date('D');
    $D1=date('D');
    $D2=date('D',strtotime('-1 day'));
    $D3=date('D',strtotime('-2 day'));
    $D4=date('D',strtotime('-3 day'));
    $D5=date('D',strtotime('-4 day'));
    $D6=date('D',strtotime('-5 day'));
    $D7=date('D',strtotime('-6 day'));
    @endphp
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Day', 'Order Per Week'],
          ["{{ $D1}}",     {{ $d1 }}],
          ["{{ $D2}}",      {{ $d2 }}],
          ["{{ $D3}}", {{ $d3 }}],
          ["{{ $D4}}",{{ $d4 }}],
          ["{{ $D5}}",   {{ $d5 }}],
          ["{{ $D6}}",    {{ $d6 }}],
          ["{{ $D7}}",   {{ $d7 }}]

        ]);

        var options = {
          title: 'Order Detail of current week Days',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
    <div id="piechart_3d" style="width: 100%; height: 400px;"></div>

 
</div>
       </div>
       </div>







       <div class="col-md-7">
        <div class="card shadow">
     
         <div class="card-body">
       
         @php

                   $d1=DB::table('orders')->whereYear('created_at',carbon::now()->year)->whereMonth('created_at',carbon::now()->month)->whereDay('created_at',carbon::now()->day)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('paid');
                
                $d2=DB::table('orders')->whereYear('created_at',carbon::now()->year)->whereMonth('created_at',carbon::now()->month)->whereDay('created_at',carbon::now()->subDay(1))->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('paid');
                
                $d3=DB::table('orders')->whereYear('created_at',carbon::now()->year)->whereMonth('created_at',carbon::now()->month)->whereDay('created_at',carbon::now()->subDay(2))->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('paid');
     
                $d4=DB::table('orders')->whereYear('created_at',carbon::now()->year)->whereMonth('created_at',carbon::now()->month)->whereDay('created_at',carbon::now()->subDay(3))->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('paid');
     
                $d5=DB::table('orders')->whereYear('created_at',carbon::now()->year)->whereMonth('created_at',carbon::now()->month)->whereDay('created_at',carbon::now()->subDay(4))->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('paid');
     
                $d6=DB::table('orders')->whereYear('created_at',carbon::now()->year)->whereMonth('created_at',carbon::now()->month)->whereDay('created_at',carbon::now()->subDay(5))->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('paid');
     
                $d7=DB::table('orders')->whereYear('created_at',carbon::now()->year)->whereMonth('created_at',carbon::now()->month)->whereDay('created_at',carbon::now()->subDay(6))->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('paid');
                $D1=date('D');
         $D1=date('D');
         $D2=date('D',strtotime('-1 day'));
         $D3=date('D',strtotime('-2 day'));
         $D4=date('D',strtotime('-3 day'));
         $D5=date('D',strtotime('-4 day'));
         $D6=date('D',strtotime('-5 day'));
         $D7=date('D',strtotime('-6 day'));
         @endphp
         
         <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
         <script type="text/javascript">
           google.charts.load('current', {'packages':['bar']});
           google.charts.setOnLoadCallback(drawChart);
     
           function drawChart() {
             var data = google.visualization.arrayToDataTable([
                ['Day', 'Order Amount Per Day',],
          ["{{ $D1}}",     {{ $d1 }}],
          ["{{ $D2}}",      {{ $d2 }}],
          ["{{ $D3}}", {{ $d3 }}],
          ["{{ $D4}}",{{ $d4 }}],
          ["{{ $D5}}",   {{ $d5 }}],
          ["{{ $D6}}",    {{ $d6 }}],
          ["{{ $D7}}",   {{ $d7 }}]
             ]);
        
             var options = {
               chart: {
                 title: 'Weekly per day order of current week',
               }
             };
     
             var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
     
             chart.draw(data, google.charts.Bar.convertOptions(options));
           }
         </script>
         <div id="columnchart_material" style="width: 100%; height: 400px;"></div>
     
      
     </div>
            </div>
            </div>
        </div>











 
@endsection