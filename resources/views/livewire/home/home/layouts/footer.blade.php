 <footer>
        <div class="footer-jump">
            <a href="#">
                <span class="footer-jump-angle"><i class="fa fa-angle-up"></i>{{$footer->upLabel}}</span>
            </a>
        </div>
        <div class="container">
            <div class="footer-inner-box">
                @foreach($topLogo as $logo)
                <a href="{{$logo->url}}" class="footer-badge">
                    <img src="{{url($logo->image)}}" alt="badge">
                    <span class="item-feature">{{$logo->title}}</span>
                </a>
                @endforeach
            </div>
        </div>
        <div class="col-12">
            <div class="middle-bar-footer">
                <div class="col-lg-6 col-xs-12 pull-right">
                    <div class="footer-links">
                        <div class="links-col">
                            <a href="#" class="head-line">{{$footer->widgetLabel1}}</a>
                            <ul class="links-ul">
                                @foreach($menus1 as $menu)
                                <li><a href="{{$menu->url}}">{{$menu->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="links-col">
                            <a href="#" class="head-line">{{$footer->widgetLabel2}}</a>
                            <ul class="links-ul">
                                @foreach($menus2 as $menu)
                                    <li><a href="{{$menu->url}}">{{$menu->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="links-col">
                            <a href="#" class="head-line">{{$footer->widgetLabel3}}</a>
                            <ul class="links-ul">
                                @foreach($menus3 as $menu)
                                    <li><a href="{{$menu->url}}">{{$menu->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4 col-xs-12 pull-left">
                    <div class="footer-form">
                        <span class="newslitter-form">{{$footer->rssLabel}} :
                        </span>

                        <form action="#">
                            <input type="text" class="input-footer" placeholder="???????? ?????????? ?????? ???? ???????? ????????">

                            <button class="btn-footer-post">??????????</button>
                        </form>
                    </div>

                    <div class="footer-social">
                        <span class="newslitter-form-social">{{$footer->socialLabel}} :</span>

                        <div class="social-links">
                            <a href="{{$footer->socialLink1}}"><i class="fa {{$footer->socialIcon1}}"></i></a>
                            <a href="{{$footer->socialLink2}}"><i class="fa {{$footer->socialIcon2}}"></i></a>
                            <a href="{{$footer->socialLink3}}"><i class="fa {{$footer->socialIcon3}}"></i></a>
                            <a href="{{$footer->socialLink4}}"><i class="fa {{$footer->socialIcon4}}"></i></a>
                            <a href="{{$footer->socialLink5}}"><i class="fa {{$footer->socialIcon5}}"></i></a>
                            <a href="{{$footer->socialLink6}}"><i class="fa {{$footer->socialIcon6}}"></i></a>
                            <a href="{{$footer->socialLink7}}"><i class="fa {{$footer->socialIcon7}}"></i></a>
                            <a href="{{$footer->socialLink8}}"><i class="fa {{$footer->socialIcon8}}"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="footer-address">
                <div class="footer-contact">
                    <ul>
                        <li>{{$footer->supportLabel}}</li>
                        <li style="float:right">{{$footer->phoneLabel}} : <a href="#" class="phone-contact">{{$footer->phone}}
                               </a></li>
                        <li class="email-title">{{$footer->emailLabel}} : <a href="mailto:{{$footer->email}}">{{$footer->email}}</a></li>
                    </ul>
                </div>

                <div class="address-images">
                    <a href="#">
                        <img src="{{asset('home/assets/images/footer-img/1090a120.png')}}" alt="address">
                        <img src="{{asset('home/assets/images/footer-img/71abe5c9.png')}}" alt="address">
                    </a>
                </div>
            </div>
        </div>

        <div class="more-info">
            <div class="col-12">
                <div class="about-site">
                    <h1>{{$footer->aboutHeadLabel}}</h1>
                    <p>
                        {{$footer->aboutbodyLabel}}
                    </p>

                    <div class="footer-inner-box">
                        @foreach($bottomLogo as $logo)
                        <a href="{{$logo->url}}" class="footer-badge">
                            <img src="{{url($logo->image)}}" style="width: 130px !important;"
                                alt="badge">
                        </a>
                        @endforeach
                    </div>
                </div>

                <div class="copy-right-footer">
                    <p>
                        {{$footer->copyright}}
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!--   Footer---------------------------->
