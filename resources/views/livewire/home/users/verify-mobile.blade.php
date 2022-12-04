@section('styles')
    <script src="{{asset('home/assets/js/alpine.min.js')}}"></script>
@endsection
<div>
    <style>
        #main .account-box .form-account form>input{
            width: 100%;
            height: 45px;
            background: #fff;
            outline: none;
            font: 14px iranyekan;
            color: #777;
            text-align: left;
            float: right;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 10px;
            padding: 0 10px;
        }
    </style>
    <div id="main">
        <div class="col-lg-4 col-md-6 col-xs-12 mx-auto">
            <div class="account-box">
                <a href="{{route('home.index')}}" class="logo-account"><img src="{{asset('home/assets/images/logo-login.png')}}" alt="logo"></a>
                <div class="message-light">
                    <div class="massege-light">
                        برای شماره همراه {{$user->mobile}} کد تایید ارسال گردید
                        <br>
                        <a href="{{route('login')}}" class="form-edit-number">
                            ویرایش شماره
                        </a>
                    </div>
                    <div class="form-account">
                        <div class="form-account-title">کد تایید را وارد کنید</div>
                        <div class="form-account-row">
                            @include('errors.error')
                            <form wire:submit.prevent="verifyCode">

                                <input type="number" min="4" wire:model.lazy="code" id="email-phone" class="input-email-account" placeholder="">


                                <div class="parent-btn">
                                    <button type="submit" class="dk-btn dk-btn-info text-center">
                                        تایید کد فعالسازی
                                        <i class="mdi mdi-account-plus-outline sign-in"></i>
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div x-data="{show:true}" x-show="show"
                         x-init="setTimeout(()=> show = false , 180000)">
                        <div class="form-account-row">دریافت مجدد کد تایید(
                            <span data-countdownseconds="180" id="countdown">
                                03:00
                            </span>
                            ) دیگر
                        </div>
                    </div>
                    <div style="display: none"
                         x-data="{show:false}" x-show="show"
                         x-init="setTimeout(()=> show = true , 180000)">
                        <a href="#" wire:click="resendSms({{$this->user->id}})" class="link-border-verify form-account-link">ارسال مجدد</a>
                    </div>


                </div>
                <div class="account-footer">
                    <span>کاربر جدید هستید؟</span>
                    <a href="{{route('register')}}" class="btn-link-register">ثبت‌نام در دیجی‌استور</a>
                </div>
            </div>
        </div>
    </div>
</div>
@section('scripts')
    <script>
        var seconds , temp;
        var givenTime = document.getElementById('countdown').innerHTML;

        function countdown(){
            time = document.getElementById('countdown').innerHTML;
            timeArray = time.split(':');
            seconds = timeToSeconds(timeArray);
            console.log(seconds);
            if(seconds==0)
            {
                clearTimeout(timeoutMyOsWego);
                return;
            }
            seconds--;
            temp = document.getElementById('countdown');
            temp.innerHTML = secondsToTime(seconds);
            timeoutMyOsWego = setTimeout(countdown,1000);
        }
        countdown();

        function timeToSeconds(timeArray)
        {
            var minutes = (timeArray[0]*1);
            var seconds = (minutes*60) + (timeArray[1] * 1);
            return seconds;
        }

        function secondsToTime(secs)
        {
            var hours = Math.floor(secs/(60*60));
            hours = hours<10 ? '0'+minutes : minutes;
            var divisor_for_minutes = secs %(60*60);
            var minutes = Math.floor(divisor_for_minutes/60);
            minutes = minutes <10 ? '0' +minutes : minutes;
            var divisor_for_seconds = divisor_for_minutes % 60;
            var seconds = Math.ceil(divisor_for_seconds);
            seconds = seconds < 10 ? '0'+seconds : seconds;
            return minutes + ':' + seconds;


        }

    </script>
@endsection
