<div>
    <div id="main">
        <div class="col-lg-4 col-md-6 col-xs-12 mx-auto">
            <div class="account-box">
                <a href="{{route('home.index')}}" class="logo-account"><img src="{{asset('home/assets/images/logo-login.png')}}" alt="logo"></a>
                <span class="account-head-line">تغییر رمز عبور</span>
                <div class="content-account">
                    <form wire:submit.prevent="changePassword" id="password-change">
                        @include('errors.error')
                        <label for="password-new">رمز عبور جدید</label>
                        <input wire:model.lazy="password" type="password" id="password-new" class="input-password" placeholder="">
                        <label for="password_confirmation">تکرار رمز عبور جدید</label>
                        <input wire:model.lazy="password_confirmation" type="password" id="password_confirmation" class="input-password" placeholder="">
                        <div class="parent-btn">
                            <button class="dk-btn dk-btn-info" type="submit">
                                تغییر رمز عبور
                                <i class="fa fa-refresh sign-in"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
