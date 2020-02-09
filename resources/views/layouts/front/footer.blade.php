<!-- footer Box -->

<footer>
    <div class="container">
        <div class="row ">
            <div class="col-md-12 col-lg-3 pr-5">
                <img src="{{ asset('front/dist/img/logo.png') }}" class="mb-3" alt="" />
                <p> Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or
                    web designs.</p>
                <p> Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or
                    web designs.</p>
            </div>

            <div class="col-md-12 col-lg-3 pr-5">
                <h5 class="h5"> Address: </h5>
                <address>
                    <p> {!! config('app.address') !!} </p>
                </address>

                <h5 class="h5"> Email: </h5>
                <p> {{ config('app.email') }} </p>

                <h5 class="h5"> Follow: </h5>
                <ul class="social">
                    <li> <a href="{{ config('app.twitter') }}"> <i class="fa fa-twitter"> </i> </a> </li>
                    <li> <a href="{{ config('app.fb') }}"> <i class="fa fa-facebook"> </i> </a> </li>
                    <li> <a href="{{ config('app.insta') }}"> <i class="fa fa-instagram"> </i> </a> </li>
                </ul>
            </div>

            <div class="col-md-12 col-lg-4">
                <h5 class="h5"> Instagram: </h5>
                <div class="instabx">
                    <img src="{{ asset('front/dist/img/home/insta1.jpg') }}" class="img-fluid" />
                    <img src="{{ asset('front/dist/img/home/insta2.jpg') }}" class="img-fluid" />
                    <img src="{{ asset('front/dist/img/home/insta3.jpg') }}" class="img-fluid" />
                    <img src="{{ asset('front/dist/img/home/insta4.jpg') }}" class="img-fluid" />
                    <img src="{{ asset('front/dist/img/home/insta5.jpg') }}" class="img-fluid" />
                    <img src="{{ asset('front/dist/img/home/insta6.jpg') }}" class="img-fluid" />
                </div>
            </div>

            <div class="col-md-12 col-lg-2">
                <h5 class="h5"> Useful Links: </h5>
                <ul class="ulinks">
                    <li> <a href="{{ url('/about-us') }}"> About us </a> </li>
                    <li> <a href="{{ url('/csr-market-place') }}">CSR Market Place</a> </li>
                    <li> <a href="{{ url('/success-stories') }}"> Success Story </a> </li>
                    <li> <a href="{{ url('/contact-us') }}"> Contact Us </a> </li>
                </ul>
            </div>

            <div class="col-md-12 col-lg-12 btmfooter mt-5">
                <p> {!! config('app.copyright') !!} </p>
                <ul class="ulinks">
                    <li> <a href="#"> Privacy Policy </a> </li>
                    <li> <a href="#"> | </a> </li>
                    <li> <a href="#"> Terms Of Services</a> </li>
                </ul>
            </div>
        </div>
    </div>

</footer>

<!-- Modal -->
@if(Session::has('cart') ? Session::get('cart')->totalQty : '0' > 0)
<?php $itmes = Session::has('cart') ? Session::get('cart')->items : '' ?>
@foreach($itmes as $item)
<div class="modal fade" id="QueryForm-@if(!empty($item['item']->initiative_name)){{ $item['item']->id }}@elseif(!empty($item['item']->service_name)){{ $item['item']->id }}@endif" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@if(!empty($item['item']->initiative_name)){{ $item['item']->initiative_name }} [On-ground]@elseif(!empty($item['item']->service_name)){{ $item['item']->service_name }} [Digital Service]@endif</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/submit-query') }}" method="Post">
					{{ csrf_field() }}
					<div class="form-group">
						<input type="text" name="name" class="form-control" placeholder="Full Name">
					</div>
					<div class="form-group">
						<input type="email" name="email" class="form-control" placeholder="Email Address">
					</div>
					<div class="form-group">
						<input type="tel" name="phone" class="form-control" placeholder="Phone Number">
					</div>
					<div class="form-group">
						<input type="text" name="position" class="form-control" placeholder="Position">
					</div>
					<div class="form-group">
						<input type="text" name="organization" class="form-control" placeholder="Organization">
					</div>
					<div class="form-group d-none">
						<input type="text" name="type" class="form-control" value="@if(!empty($item['item']->initiative_name)){{ 'Onground' }}@elseif(!empty($item['item']->service_name)){{ '360' }}@endif">
					</div>
					<div class="form-group d-none">
						<input type="text" name="impact_id" class="form-control" value="@if(!empty($item['item']->initiative_name)){{ $item['item']->id }}@elseif(!empty($item['item']->service_name)){{ $item['item']->id }}@endif">
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary" value="Submit">
					</div>
				</form>
            </div>
            <!-- <div class="modal-footer"> -->
                <!-- <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Close</button> -->
                <!-- <input type="submit" class="btn btn-primary" value="Submit"> -->
            <!-- </div> -->
        </div>
    </div>
</div>
@endforeach
@endif