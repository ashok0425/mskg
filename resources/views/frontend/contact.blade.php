@extends('frontend.master')
@section('content')

      <section class="container my-5">
        <!--Contact heading-->
        <div class="row">
          
           <!--Grid column-->
           <div class="col-sm-12 mb-4 col-md-5">
              <!--Form with header-->
              <div class="card border-primary rounded-0">
                 <div class="card-header p-0">
                    <div class="bg-primary text-white text-center py-2">
                       <h3><i class="fa fa-envelope"></i> Leave us a message here!</h3>
                     
                    </div>
                 </div>
                 <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                 <div class="card-body p-3">
                    
                       <div class="form-group">
                       <label> Your Name </label>
                       <div class="input-group">
                          <input value="" type="text" name="name" class="form-control" id="inlineFormInputGroupUsername" placeholder="Full Name">
                       </div>
                     </div>
                       <div class="form-group">
                          <label>Your Email Address</label>
                          <div class="input-group mb-2 mb-sm-0">
                             <input type="email" value="" name="email" class="form-control" id="inlineFormInputGroupUsername" placeholder="Email Address">
                          </div>
                       </div>
                       <div class="form-group">
                          <label>Your Contact Number</label>
                          <div class="input-group mb-2 mb-sm-0">
                             <input type="number" name="phone" class="form-control" id="inlineFormInputGroupUsername" placeholder="Contact Number">
                          </div>
                       </div>
                       <div class="form-group">
                          <label>Your Message</label>
                          <div class="input-group mb-2 mb-sm-0">
                             <textarea type="text" class="form-control" name="msg"></textarea>
                          </div>
                       </div>
                       <div class="text-center">
                          <input type="submit" name="submit" value="submit" class="btn btn-primary btn-block rounded-0 py-2">
                       </div>
                  
                      </div>
                    </form>
                       
                 </div>
              </div>
           <!--Grid column-->
           
           <!--Grid column-->
           <div class="col-sm-12 col-md-7">
              <!--Google map-->
              <div class="mb-4">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28576.086240231616!2d87.12246695172996!3d26.455381454616667!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ef0bd891e8660f%3A0xe20451268b159566!2sDewanganj!5e0!3m2!1sen!2snp!4v1622622426202!5m2!1sen!2snp" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
              </div>
              <!--Buttons-->
              <div class="row text-center">
                 <div class="col-md-4">
                    <a class="bg-primary px-3 py-2 rounded text-white mb-2 d-inline-block"><i class="fa fa-map-marker"></i></a>
                    <p> {{ $contact->address1 }}</p>
                 </div>
                 <div class="col-md-4">
                    <a class="bg-primary px-3 py-2 rounded text-white mb-2 d-inline-block"><i class="fa fa-phone"></i></a>
                    <p>{{ $contact->phone1 }}</p>
                 </div>
                 <div class="col-md-4">
                    <a class="bg-primary px-3 py-2 rounded text-white mb-2 d-inline-block"><i class="fa fa-envelope"></i></a>
                    <p>{{ $contact->email1 }}</p>
                 </div>
              </div>
           </div>
           <!--Grid column-->
             </div>
     </section>
@endsection
