@section('title','ورود به پنل کاربری')
<div>
    <div id="main">
        <div class="col-lg-4 col-md-6 col-xs-12 mx-auto">
            <div class="account-box">
                <a href="{{route('home.index')}}" class="logo-account"><img src="{{asset('home/assets/images/logo-login.png')}}" alt="logo"></a>
                <span class="account-head-line">ورود به دیجی‌استور</span>
                <div class="content-account">
                    <form action="#" id="login" wire:submit.prevent="loginForm">
                        @include('errors.error')
                        <label for="email-phone">شماره موبایل:</label>
                        <input type="text" wire:model.lazy="mobile" id="email-phone" class="input-email-account" placeholder="">
                        <a href="{{route('forget.password')}}" class="account-link-password">رمز خود را فراموش کرده ام</a>
                        <label for="password">رمز عبور</label>
                        <input wire:model.lazy="password" type="password" id="password" class="input-password" placeholder="">
                        <div class="parent-btn">
                            <button type="submit" class="dk-btn dk-btn-info text-center">
                                ورود
                                <i class="fa fa-sign-in sign-in"></i>
                            </button>
                        </div>
                        <div class="form-auth-row">
                            <label for="remember" class="ui-checkbox">
                                <input type="checkbox" value="1" name="login" checked="" id="remember">
                                <span class="ui-checkbox-check"></span>
                            </label>
                            <label for="remember" class="remember-me">مرا به خاطر داشته باش</label>
                        </div>
                    </form>
                </div>
                <div class="account-footer">
                    <span>کاربر جدید هستید؟</span>
                    <a href="{{route('register')}}" class="btn-link-register">ثبت‌نام در دیجی‌استور</a>
                </div>
            </div>
        </div>
    </div>
</div>
