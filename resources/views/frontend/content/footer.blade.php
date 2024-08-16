<div class="footer-area-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="footer-box">
                    {{-- @dd($footer->instagram) --}}
                    <a href="/">
                        @if (@$footer->logo == NULL)
                            <img class="img-responsive" src="{{asset('Assets/Frontend/img/logo-footer.png')}}" alt="logo">
                        @else
                            <img class="img-responsive" src="{{asset('storage/images/logo/' .$footer->logo)}}" alt="logo">
                        @endif
                    </a>
                    <div class="footer-about">
                        <p> {{@$footer->desc}} </p>
                    </div>
                    @if($footer !== null)

                    <ul class="footer-social">
                        @if($footer->twitter !== null)
                        <li onMouseOver="this.querySelector('svg').style.color = 'black'"
                        onMouseOut="this.querySelector('svg').style.color = 'rgb(182, 182, 182)'">
                        <a href="{{$footer->twitter}}" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="16px" style="color: rgb(182, 182, 182)" class="twittericon">
                                <path d="M16 8.24537V15.5C16 19.0899 13.0899 22 9.5 22C5.91015 22 3 19.0899 3 15.5C3 11.9101 5.91015 9 9.5 9C10.0163 9 10.5185 9.06019 11 9.17393V12.3368C10.5454 12.1208 10.0368 12 9.5 12C7.567 12 6 13.567 6 15.5C6 17.433 7.567 19 9.5 19C11.433 19 13 17.433 13 15.5V2H16C16 4.76142 18.2386 7 21 7V10C19.1081 10 17.3696 9.34328 16 8.24537Z"></path>
                            </svg>
                        </a>
                    </li>
                        @endif
                        @if($footer->facebook !== null)
                        <li><a href="{{$footer->facebook}}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        @endif
                        @if($footer->instagram !== null)
                        <li><a href="{{$footer->instagram}}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        @endif
                    </ul>
                    @endif
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="footer-box">
                    <h3>Informasi</h3>
                    <ul class="corporate-address">
                        <li><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:{{@$footer->telp}}"> {{@$footer->telp}}</a></li>
                        <li><i class="fa fa-envelope-o" aria-hidden="true"></i>{{@$footer->email}}</li>
                    </ul>
                    <div class="newsletter-area">
                        <h3>Ingin mendapat berita terupdate ?</h3>
                        <div class="input-group stylish-input-group">
                            <input type="text" placeholder="Masukan email kamu disini" class="form-control">
                            <span class="input-group-addon">
                                    <button type="submit">
                                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                    </button>
                                </span>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="footer-box">
                    <h3>Photos</h3>
                    <ul class="flickr-photos">
                        <li>
                            <a href="#"><img class="img-responsive" src="{{asset('Assets/Frontend/img/footer/1.jpg')}}" alt="flickr"></a>
                        </li>
                        <li>
                            <a href="#"><img class="img-responsive" src="{{asset('Assets/Frontend/img/footer/2.jpg')}}" alt="flickr"></a>
                        </li>
                        <li>
                            <a href="#"><img class="img-responsive" src="{{asset('Assets/Frontend/img/footer/3.jpg')}}" alt="flickr"></a>
                        </li>
                        <li>
                            <a href="#"><img class="img-responsive" src="{{asset('Assets/Frontend/img/footer/4.jpg')}}" alt="flickr"></a>
                        </li>
                        <li>
                            <a href="#"><img class="img-responsive" src="{{asset('Assets/Frontend/img/footer/5.jpg')}}" alt="flickr"></a>
                        </li>
                        <li>
                            <a href="#"><img class="img-responsive" src="{{asset('Assets/Frontend/img/footer/6.jpg')}}" alt="flickr"></a>
                        </li>
                    </ul>
                </div>
            </div> --}}
        </div>
    </div>
</div>
<div class="footer-area-bottom">
    <div class="container">
        <div class="row">
            {{-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <ul class="payment-method">
                    <li>
                        <a href="#"><img alt="payment-method" src="img/payment-method1.jpg"></a>
                    </li>
                    <li>
                        <a href="#"><img alt="payment-method" src="img/payment-method2.jpg"></a>
                    </li>
                    <li>
                        <a href="https://theidioms.com"><img alt="Idioms" src="img/payment-method3.jpg"></a>
                    </li>
                    <li>
                        <a href="#"><img alt="payment-method" src="img/payment-method4.jpg"></a>
                    </li>
                </ul>
            </div> --}}
        </div>
    </div>
</div>
