@extends('admin.master')
<style>
    .image-input {
	text-aling: center;
}

.image-input input {
	display: none;
}

.image-input label {
	display: block;
	color: #FFF;
	background: #000;
	padding: .3rem .6rem;
	font-size: 115%;
	cursor: pointer;
}

.image-input label i {
	font-size: 125%;
	margin-right: .3rem;
}

.image-input label:hover i {
	animation: shake .35s;
}

.image-input img {
	max-width: 175px;
	display: none;
}

.image-input span {
	display: none;
	text-align: center;
	cursor: pointer;
}
.image-preview1,.image-preview2,.image-preview3,.image-preview4,.image-preview5{
    max-height: 100px;
}
@keyframes shake {
	0% {
		transform: rotate(0deg);
	}

	25% {
		transform: rotate(10deg);
	}

	50% {
		transform: rotate(0deg);
	}

	75% {
		transform: rotate(-10deg);
	}

	100% {
		transform: rotate(0deg);
	}
}

</style>
@section('main-content')
@php
    define('PAGE','product')
@endphp
<div class="card">
        <h3>Edit Product</h3>
    <h4>Required Field <span class="text-danger">*</span></h4>
<br>
        <form action="{{route('admin.product.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $product->id }}" name="id">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Product Name<span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control"  value="{{ $product->name }}" required>
                    </div>
                </div>
                <div class="col-md-6">
    
                    <div class="mb-3">
                        <label class="form-label">Select Category<span class="text-danger">*</span></label>
                        <select name="category"  class="form-control category data" data-text="category" required>
                            <option value="" disabled>--select category---</option>
                            @foreach ($category as $item)
                            <option value="{{$item->id}}" @if ($item->id==$product->category_id)
                                selected
                            @endif>{{$item->category}}</option>
        
                            @endforeach
                        </select>
                    </div>
                </div>
           
                <div class="col-md-6">
  
            <div class="mb-3">
                <label class="form-label">Select Subcategory</label>
                <select name="subcategory"  class="form-control subcategory data" data-text="subcategory" >
                    <option value="" disabled>--select subcategory---</option>
                    
                </select>
            </div>
        </div>
        <div class="col-md-6">
  
            <div class="mb-3">
                <label class="form-label">Select Recipient  <span class="text-danger">*</span></label>
                <select name="recipt"  class="form-control  " data-text="" >
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Kids">Kids</option>
                    <option value="Unisex">Unisex</option>


                    
                </select>
            </div>
        </div>
        <div class="col-md-6">

             <div class="mb-3">
                <label class="form-label">Price<span class="text-danger">*</span></label>
                <input type="number" name="price" class="form-control price"  value="{{$product->price}}" required>
            </div>
        </div>
        <div class="col-md-6">

            <div class="mb-3">
            
                <input type="hidden" value="{{ $product->comission }}" name="comission">
               <label class="form-label">Price After Adding {{ $product->comission }}% Commission<span class="text-danger">*</span></label>
               <input type="number" name="price_after_comission" class="form-control comission_price"  value="{{$product->price_after_comission}}" required readonly>
           </div>
       </div>

       <div class="col-md-6">

        <div class="mb-3">
            <label class="form-label">Delivery Time<span class="text-danger">*</span></label>
            <input type="text" name="delivery_time"  required class="form-control" value="{{ $product->delivery_time }}">
          
        </div>
    </div>

        {{-- <div class="col-md-6">

            <div class="mb-3">
                <label class="form-label">Quantity<span class="text-danger">*</span></label>
                <input type="number" name="quantity" class="form-control"  value="{{$product->qty}}" required>
            </div>
        </div> --}}
       
             
        <div class="col-md-6">

            <div class="mb-3">
                <label class="form-label">Main Thumbnail  (size:550X700) <span class="text-danger">*</span><span class="text-danger">*</span></label>
                <div class="image-input">
                    <input type="file" accept="image/*" id="imageInput1" name="file" >
                    <label for="imageInput1" class="image-button"><i class="far fa-image"></i> Choose image</label>
                   
                  </div>
                  <div class="d-flex">
                    <img src="" class="image-preview1 mr-2">

                    <img src="{{asset($product->image)}}" alt="" width="70" class='image1'>
                  </div>

            </div>
        </div>
        <div class="col-md-6">

            <div class="mb-3">
                <label class="form-label">Front view (size:550X700)</label>

                  <div class="image-input">
                    <input type="file" accept="image/*" id="imageInput2" name="front" >
                    <label for="imageInput2" class="image-button"><i class="far fa-image"></i> Choose image</label>                   
                  </div>

                  <div class="d-flex">
                    <img src="" class="image-preview2 mr-2">
                    <img src="{{asset($product->front)}}" alt="" width="70 " class='image2'>
                  </div>
            </div>
        </div>
        <div class="col-md-6">

            <div class="mb-3">
                <label class="form-label">Back view (size:550X700)</label>
                <div class="image-input">
                    <input type="file" accept="image/*" id="imageInput3" name="back" >
                    <label for="imageInput3" class="image-button"><i class="far fa-image"></i> Choose image</label>               
                  </div>
                  <div class="d-flex">
                    <img src="" class="image-preview3 mr-2">

                    <img src="{{asset($product->back)}}" alt="" width="70" class='image3'>
                  </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Left view (size:550X700)</label>
                <div class="image-input">

                <input type="file" accept="image/*" id="imageInput4" name="left" >
                <label for="imageInput4" class="image-button"><i class="far fa-image"></i> Choose image</label>             
              </div>
              <div class="d-flex">
                <img src="" class="image-preview4 mr-2">

                <img src="{{asset($product->left)}}" alt="" width="70" class='image4'>
              </div>
            </div>
        </div>
        <div class="col-md-6">

            <div class="mb-3">
                <label class="form-label">Right view (size:550X700)</label>

                <div class="image-input">
                    <input type="file" accept="image/*" id="imageInput5" name="right" >
                    <label for="imageInput5" class="image-button"><i class="far fa-image"></i> Choose image</label>
                  
                  </div>
                  <div class="d-flex">
                    <img src="" class="image-preview5 mr-2">

                    <img src="{{asset($product->right)}}" alt="" width="70" class='image5'>
                  </div>
            </div>
        </div>

            </div>
            <div class="mb-3">
                <label class="form-label">Short Description<span class="text-danger">*</span></label>
               <textarea name="short_description" id="" class="form-control" required>{{$product->short_desc}}</textarea>
               </textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Materials Used</label>
               <textarea name="material_used" id="summernote4" class="form-control" required>{{$product->material }}</textarea>
               </textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Term & Conditions<span class="text-danger">*</span></label>
               <textarea name="term" id="summernote4" class="form-control" required>{{ $product->term }}</textarea>
               </textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Long Description<span class="text-danger">*</span></label>
               <textarea name="long_description"  class="form-control" required id="summernote1">{!! $product->descr!!}             
            </textarea>
            </div>
            <h3>SEO PART</h3>
            <div class="mb-3">
                <label class="form-label">Meta Keyword(optional)</label>
                <input type="text" name="meta_keyword" class="form-control" value="{{$product->meta_keyword}}" >
            </div>
            <div class="mb-3">
                <label class="form-label">Meta Title(optional)</label>
                <input type="text" name="meta_title" class="form-control"  value="{{$product->meta_title}}" >
            </div>
            <div class="mb-3">
                <label class="form-label">Meta Description(optional)</label>
                <textarea name="meta_description" id="" class="form-control">{{$product->meta_descr}}            
                </textarea>
            </div>
           
          

           <h3>Extra Option</h3>
           <div class="row my-3">
               <div class="col-md-4 col-6">
                   <label><input type="checkbox" name="iscustomized" value="1" @if ($product->Iscustomized==1)
                       checked
                   @endif> Enable Customization</label>
               </div>
               <div class="col-md-4 col-6">
                   <label><input type="checkbox" name="featured" value="1"> Featured Product</label>
               </div>
               <div class="col-md-4 col-6">
                <label><input type="checkbox" name="top_rated" value="1"> Top Rated Product</label>
            </div>  
            <div class="col-md-4 col-6">
                <label><input type="checkbox" name="bestseller" value="1"> Best Seller Product</label>
            </div>
          
            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>
</div>
@endsection
@push('scripts')
          {{-- custom input fielsd file  --}}
	  <script>
		// Add the following code if you want the name of the file appear on select

		$('#imageInput1').on('change', function() {

$input = $(this);

if($input.val().length > 0) {
  fileReader = new FileReader();
  fileReader.onload = function (data) {
       $('.image1').css('display','none')
  $('.image-preview1').attr('src', data.target.result);
  }
  fileReader.readAsDataURL($input.prop('files')[0]);
//   $('.image-button').css('display', 'none');
  $('.image-preview1').css('display', 'block');
  $('.change-image').css('display', 'block');
}
});


	// Add the following code if you want the name of the file appear on select
    $('#imageInput2').on('change', function() {

$input = $(this);

if($input.val().length > 0) {
  fileReader = new FileReader();
  fileReader.onload = function (data) {
        $('.image2').css('display','none')
  $('.image-preview2').attr('src', data.target.result);
  }
  fileReader.readAsDataURL($input.prop('files')[0]);
//   $('.image-button').css('display', 'none');
  $('.image-preview2').css('display', 'block');
  $('.change-image').css('display', 'block');
}
});

	// Add the following code if you want the name of the file appear on select
    $('#imageInput3').on('change', function() {

$input = $(this);

if($input.val().length > 0) {
  fileReader = new FileReader();
  fileReader.onload = function (data) {
        $('.image3').css('display','none')
  $('.image-preview3').attr('src', data.target.result);
  }
  fileReader.readAsDataURL($input.prop('files')[0]);
//   $('.image-button').css('display', 'none');
  $('.image-preview3').css('display', 'block');
  $('.change-image').css('display', 'block');
}
});
	// Add the following code if you want the name of the file appear on select
    $('#imageInput4').on('change', function() {

$input = $(this);

if($input.val().length > 0) {
  fileReader = new FileReader();
  fileReader.onload = function (data) {
        $('.image4').css('display','none')
  $('.image-preview4').attr('src', data.target.result);
  }
  fileReader.readAsDataURL($input.prop('files')[0]);
//   $('.image-button').css('display', 'none');
  $('.image-preview4').css('display', 'block');
  $('.change-image').css('display', 'block');
}
});
	// Add the following code if you want the name of the file appear on select
    $('#imageInput5').on('change', function() {

$input = $(this);

if($input.val().length > 0) {
  fileReader = new FileReader();
  fileReader.onload = function (data) {
        $('.image5').css('display','none')
  $('.image-preview5').attr('src', data.target.result);
  }
  fileReader.readAsDataURL($input.prop('files')[0]);
//   $('.image-button').css('display', 'none');
  $('.image-preview5').css('display', 'block');
  $('.change-image').css('display', 'block');
}
});


</script>
@endpush