@extends('mail.layout')
@section('content')
    
@php
        $page=DB::table('pages')->first();
    
@endphp
<tr class="information">
    <td colspan="4">
       <h2>Thank you for subscribing our newsletter.</h2>
       
       <p>{!! strip_tags($page->about)!!}</p>
    </td>
</tr>
@endsection