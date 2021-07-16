
@extends('admin.master')
@section('main-content')
@php
    define('PAGE','subscriber')
    
@endphp


<div class="card p-4">

            <h3>Send Email </h3>
       
        <form action="{{route('admin.contact.sendmail')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email To</label>
                <input type="email" name="email" class="form-control" placeholder="Mail title"value="{{ $con->email }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email Subject</label>
                <input type="text" name="title" class="form-control" placeholder="Mail title"value="{{old('title')}}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email Body</label>
                <textarea type="text" name="detail" id="summernote" class="form-control" placeholder="Blog Detail" required>
                    {{old('detail')}}
                </textarea>
            </div>
           
            <div class="mb-3">
                <label class="form-label">Attachement</label>
                <div class="file-upload-wrapper" data-text="Select your file!">
                    <input name="file" type="file" class="file-upload-field" value="">
                  </div>
                  <br>
            </div>
           
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
