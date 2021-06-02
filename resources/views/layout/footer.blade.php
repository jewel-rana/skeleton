<div class="container">
    <div class="row">
        <div class="col-5">
            <div class="footer-box">
                <h5 class="white-color">CONTACT US</h5>
                <ul>
                    <li><a href="tel:{{ getOption('company_phone', '0343 538 6611') }}">Ph.: {{ getOption('company_phone', '0343 538 6611') }}</a></li>
                    <li><a href="tel:{{ getOption('company_fax', '0343 538 6666') }}">Fx.: {{ getOption('company_fax', '0343 538 6666') }}</a></li>
                    <li><a href="malito:{{ getOption('company_email', 'email@poptelecom.com') }}">{{ getOption('company_email', 'email@poptelecom.com') }}</a></li>
                    <li><a href="#">Find A Store</a></li>
                </ul>
            </div>
        </div>
        <div class="col-5">
            <div class="footer-box">
                <h5 class="white-color">RESIDENTIAL</h5>
                @if(getMenu(getOption('footer1_menu')) != null)
                    {!! getMenu(getOption('footer1_menu')) !!}
                @else
                    <ul class="footer-link">
                        <li><a href="#">SUPERFAST PACKAGES</a></li>
                        <li><a href="#">BROADBAND</a></li>
                        <li><a href="#">PHONE</a></li>
                        <li><a href="#">BROADBAND & PHONE</a></li>
                        <li><a href="#">MOBILE</a></li>
                    </ul>
                @endif
            </div>
        </div>
        <div class="col-5">
            <div class="footer-box">
                <h5 class="white-color">CONTACT US</h5>
                @if(getMenu(getOption('footer2_menu')) != null)
                    {!! getMenu(getOption('footer2_menu')) !!}
                @else
                    <ul class="footer-link">
                        <li><a href="#">ABOUT US</a></li>
                        <li><a href="#">TERMS AND CONDITIONS</a></li>
                        <li><a href="#">AFFILIATES</a></li>
                    </ul>
                @endif
            </div>
        </div>
        <div class="col-5">
            <div class="footer-box">
                <h5 class="white-color">CORPORATE INFORMATION</h5>
                @if(getMenu(getOption('footer3_menu')) != null)
                    {!! getMenu(getOption('footer3_menu')) !!}
                @else
                    <ul class="footer-link">
                        <li><a href="#">Partners</a></li>
                    </ul>
                @endif
                <h5 class="white-color">HELP & SUPPORT</h5>
                @if(getMenu(getOption('footer4_menu')) != null)
                    {!! getMenu(getOption('footer4_menu')) !!}
                @else
                    <ul class="footer-link">
                        <li><a href="{{route('faq')}}">FREQUENTLY ASKED QUESTIONS</a></li>
                        <li><a href="#">MY ACCOUNT</a></li>
                        <li><a href="#">MAKE A PAYMENT</a></li>
                    </ul>
                @endif
            </div>
        </div>
        <div class="col-5">
            <div class="footer-box social-media-box">
                <div class="footer-logo">
                    <img src="./assets/images/Logo.png">
                </div>
                <ul>
                    <li><a href="{{ getOption('social_instagram') }}"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <li><a href="{{ getOption('social_twitter') }}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="{{ getOption('social_facebook') }}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="live-chat-box">
    <a href="#" class="button pink-bg">Live CHAT <img src="./assets/images/live-chat-icon.png"></a>
</div>
