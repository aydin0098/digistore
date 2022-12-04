@section('title','فراموشی رمز عبور')
<div>
    <div id="main">
        <div class="col-lg-4 col-md-6 col-xs-12 mx-auto">
            <div class="account-box">
                <a href="{{route('home.index')}}" class="logo-account"><img src="{{asset('home/assets/images/logo-login.png')}}" alt="logo"></a>
                <span class="account-head-line">فراموشی رمز عبور</span>
                <div class="content-account">
                    <form action="#" id="login" wire:submit.prevent="forgetForm">
                        @include('errors.error')
                        <label for="email-phone">شماره موبایل:</label>
                        <input type="text" wire:model.lazy="mobile" id="email-phone" class="input-email-account" placeholder="">
                        <div class="parent-btn">
                            <button type="submit" class="dk-btn dk-btn-info text-center">
                                ارسال کد تایید
                                <i class="fa fa-sign-in sign-in"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
