@extends('mail.layout')
@section('content')
    
@php
        $page=DB::table('pages')->first();
    
@endphp
<tr class="information">
    <td colspan="4">
       <h2>Product Report</h2>
       
       <p>{!! strip_tags($report)!!}</p>
    </td>
</tr>
@endsection