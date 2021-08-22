<footer class="footer border-top border-success">
        <div class="container">
            <div class="row py-5">
                <div class="col-lg-4">
                    <!-- logo -->
                    <img src="{{ asset('frontend/img/logow.png') }}" width="120">
                </div>
                <div class="col-lg-4">
                    <!-- Contact us -->
                    <h5>Contact us</h5>

                    @foreach ($footer as $row)

                    <i class="fa fa-phone" aria-hidden="true"></i> <span style="color: green;">{{ $row->number }}</span> <br>
                    <a href="mailto:zerowastepac@gmail.com"> <i class="fa fa-envelope" aria-hidden="true"></i> {{ $row->email }}</a> <br>
                    <a href="{{ $row->facebook }}" target="_blank" class="fa fa-facebook mr-3 pt-2"></a>
                    <a href="{{ $row->twitter }}" target="_blank" class="fa fa-twitter mr-3"></a>
                    <a href="{{ $row->youtube }}" target="_blank" class="fa fa-youtube"></a>

                     @endforeach

                </div>
                <div class="col-lg-4 terms_condition">
                    <!-- Terms and Conditions -->
                    <h5>Terms and Conditions</h5>
                    <ul class="list-group">
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Refund Policy</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row m-0 bg-success text-white py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p class="pt-3">Copyright © 2021, Developed by <a href="http://geopac.co/" style="color: #fff;">Glamworld IT</a></p>
                    </div>
                    <div class="col-md-6 text-right "><span>We Accept:<img src="{{ asset('frontend/img/payments.png') }}" width="250px;" style="display: inline-block;"></span></div>
                </div>
            </div>
        </div>
    </footer>