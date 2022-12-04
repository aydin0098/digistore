@section('title','ثبت نام در دیجی استور')
<div>
    <div id="main">
        <div class="col-lg-4 col-md-6 col-xs-12 mx-auto">
            <div class="account-box">
                <a href="{{route('home.index')}}" class="logo-account"><img src="{{asset('home/assets/images/logo-login.png')}}" alt="logo"></a>
                <span class="account-head-line">ثبت نام در دیجی‌استور</span>
                <div class="content-account">
                    <div class="massege-light">ثبت نام تنها با شماره تلفن همراه امکان پذیر است.</div>
                    <form id="register" wire:submit.prevent="registerForm">
                        @include('errors.error')
                        <label for="email-phone">نام و نام خانوادگی :</label>
                        <input type="text" id="email-phone" wire:model.lazy="name" class="input-email-account" placeholder="">
                        <label for="email-phone">شماره موبایل :</label>
                        <input type="text" id="email-phone" wire:model.lazy="mobile" class="input-email-account" placeholder="">
                        <label for="password">رمز عبور</label>
                        <input type="password" id="password" wire:model.lazy="password" class="input-password" placeholder="">
                        <label for="password">تکرار رمز عبور</label>
                        <input type="password" id="password" wire:model.lazy="password_confirmation" class="input-password" placeholder="">

                        <div class="parent-btn">
                            <button type="submit" class="dk-btn dk-btn-info text-center">
                                ثبت نام
                                <i class="mdi mdi-account-plus-outline sign-in"></i>
                            </button>
                        </div>
                        <div class="form-auth-row">
                            <label for="remember" class="ui-checkbox">
                                <input type="checkbox" value="1" name="login" checked="" id="remember">
                                <span class="ui-checkbox-check"></span>
                            </label>
                            <label for="remember" class="remember-me"><a href="#">حریم خصوصی</a> و <a href="#">شرایط
                                    قوانین</a>استفاده از سرویس های سایت دیجی‌استور را مطالعه نموده و با کلیه موارد آن
                                موافقم.</label>
                        </div>
                    </form>
                </div>

                <div class="account-footer">
                    <span>قبلا در دیجی‌استور ثبت‌نام کرده‌اید؟</span>
                    <a href="{{route('login')}}" class="btn-link-register">وارد شویــد</a>
                </div>
            </div>
        </div>
    </div>
</div>
