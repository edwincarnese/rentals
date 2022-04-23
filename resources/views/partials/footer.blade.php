<!--Footer section start-->
<footer class="footer-section section">
    <div class="footer-top section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-60 pb-lg-40 pb-md-30 pb-sm-20 pb-xs-10">
        <div class="container">
            <div class="row row-25">
                <div class="footer-widget col-lg-4 col-md-6 col-12 mb-40">
                    {{-- <img src="assets/images/logo-footer.png" alt=""> --}}
                    <p>BXU Property Finder</p>
                    {{-- <div class="footer-social">
                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                        <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                        <a href="#" class="pinterest"><i class="fa fa-pinterest-p"></i></a>
                    </div> --}}
                </div>
                <!--Footer Widget end-->
                
                <!--Footer Widget start-->
                <div class="footer-widget col-lg-4 col-md-6 col-12 mb-40">
                    <h4 class="title"><span class="text">Contact us</span><span class="shape"></span></h4>
                    <ul>
                        <li><i class="fa fa-map-o"></i><span>Butuan City, Philippines</span></li>
                        <li><i class="fa fa-phone"></i><span><a href="#">+63 910 123 4561</a><a href="#">+63 905 987 6543</a></span></li>
                        <li><i class="fa fa-envelope-o"></i><span><a href="#">bxupropertyfinder</a></span></li>
                    </ul>
                </div>
                
                <div class="footer-widget col-lg-4 col-md-6 col-12 mb-40">
                    <h4 class="title"><span class="text">Pages</span><span class="shape"></span></h4>
                    <ul>
                        <li><a href="{{ route('pages.home') }}">Home</a></li>
                        {{-- <li><a href="{{ route('pages.about') }}">About</a></li> --}}
                        <li><a href="{{ route('pages.owners.index') }}">Property Owners</a></li>
                        <li><a href="{{ route('pages.properties.index', ['status' => 'for-sale']) }}">Property For Sale</a></li>
                        <li><a href="{{ route('pages.properties.index', ['status' => 'for-rent']) }}">Property For Rent</a></li>
                   </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Footer Top end-->
    
    <!--Footer bottom start-->
    <div class="footer-bottom section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="copyright text-center">
                        <p>Copyright &copy; {{ date('Y') }} <a  href="#">Capstone</a>. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Footer bottom end-->
    
 </footer>
 <!--Footer section end-->