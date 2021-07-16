<style>

</style>
<section class="section-main padding-y px-0 mx-0">
    <h6 class="bg-blue text-center text-white mb-0 p-2">Popular Category</h6>
   
    @php
$category=DB::table('categories')->where('status',1)->InRandomOrder()->get();
@endphp
<div class="owl-carousel mt-3  category owl-theme">
    @foreach ($category as $item)
    <div class="text-center"><a href="{{ route('store.category',['id'=>$item->id,'name'=>$item->category]) }}"> <img src="{{ asset($item->image) }} " alt="{{ $item->category }}" >
    <p>
        {{ $item->category }} </p></div>
    </a>
    @endforeach
   
  </div>
  </section>

