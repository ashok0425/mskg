
<style>
	footer .fab{
		font-size: 1.8rem;
	}
</style>
<footer class="section-footer bg-secondary">
	<div class="container">
		<section class="footer-top padding-y-lg text-white pl-md-5">
			<div class="row">
				<aside class="col-md-3 col-6">
					<h6 class="title">Find it Fast</h6>
					<ul class="list-unstyled">
						<li> <a href="{{ route('profile') }}"> Profile </a></li>

						<li> <a href="{{ route('store.category',['id'=>1,'name'=>'allproduct']) }}">Shop</a></li>
						<li> <a href="{{ route('blog',['id'=>1,'name'=>'category_blog']) }}">Blog</a></li>

						<li> <a href="{{ route('contact') }}">Contact</a></li>

					</ul>
				</aside>
				<aside class="col-md-3 col-6">
					<h6 class="title">About</h6>
					<ul class="list-unstyled">
						<li> <a href="{{ route('about') }}">Krafftbox </a></li>
						<li> <a href="{{ route('term') }}">Terms of Use </a></li>
						<li> <a href="{{ route('privacy') }}">Policies</a></li>
						<li> <a href="{{ route('price') }}">Seller Handbook </a></li>
						<li> <a href="{{ route('faq') }}">faq </a></li>

					</ul>
				</aside>
				
				<aside class="col-md-3 col-6">
					<h6 class="title">Account</h6>
					<ul class="list-unstyled">
						<li> <a href="{{ route('login') }}">  Login </a></li>
						<li> <a href="{{ route('register') }}">  Register </a></li>
						<li> <a href="{{ route('cart') }}">  Cart </a></li>

						<li> <a href="{{ route('wishlist') }}"> My Wishlist </a></li>
						<li> <a href="{{ route('order') }}"> My Orders </a></li>

					</ul>
				</aside>
				@php
					$social=DB::table('websites')->first();
				@endphp
				<aside class="col-md-1 ">
					<h6 class="title  text-center">Social</h6>
					<ul class="list-unstyled d-flex justify-content-center">
						
						<li class="mx-2"><a href="{{ $social->instagram1 }}" target="_blank"> <i class="fab fa-instagram"></i>  </a></li>
						<li class="mx-2"><a href="{{ $social->facebook1 }}" target="_blank"> <i class="fab fa-facebook"></i>  </a></li>
						<li class="mx-2"><a href="{{ $social->twitter1 }}" target="_blank"> <i class="fab fa-pinterest"></i>  </a></li>
					</ul>
				</aside>
			</div> <!-- row.// -->
		</section>	<!-- footer-top.// -->

		<section class="footer-bottom text-center">
		
				<p class="text-muted"> &copy {{date('Y')}} Krafftbox. All Rights Reserved.

				</p>
				<br>
		</section>
	</div><!-- //container -->
</footer>