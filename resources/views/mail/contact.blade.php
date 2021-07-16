@extends('mail.layout')
@section('content')
    
@php
        $page=DB::table('pages')->first();
    
@endphp
<tr class="information">
    <td colspan="4">
       <h3>Thank you for Contacting us.We will get back to you as soon as possible.</h3>
       <p>{{$fname}} {{$lname}}</p>
       <p>{{$email}}</p>
       <p>{{$phone}}</p>
       <p>{{$msg}}</p>

    </td>
</tr>
@endsection