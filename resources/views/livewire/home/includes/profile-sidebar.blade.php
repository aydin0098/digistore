<div class="box-sidebar">
    <div class="profile-box">
        <div class="profile-box-avator">
            @if($user->profilePhoto)
            <img src="{{asset('storage')}}{{$user->profilePhoto}}" alt="profile">
            @else
                <img src="{{asset($user->profilePhoto)}}" alt="profile">
            @endif
        </div>

        <div class="profile-box-content">
            <span class="profile-box-nameuser">{{$user->name}}</span>
            <span class="profile-box-phone">{{$user->mobile}}</span>
        </div>

        <a href="#" class="profile-box-row-arrow">
            <div class="profile-box-title">کیف پول</div>
            <div class="profile-box-price">
                <div class="wallet-amount">0</div>
                <div class="profile-box-currency">تومان</div>
                <i class="fa fa-angle-left"></i>
            </div>
            <p class="profile-box-wallet-link">افزایش موجودی</p>
        </a>

        <a href="#" class="profile-box-row-arrow">
            <div class="profile-box-title">دیجی کلاب</div>
            <div class="profile-box-price">
                <div class="wallet-amount">0</div>
                <div class="profile-box-currency">امتیاز</div>
                <i class="fa fa-angle-left"></i>
            </div>
        </a>
    </div>
    <ul class="profile-menu-items">
        <li><a href="profile.html" class="profile-menu-url active-profile"><span
                    class="mdi mdi-account-outline"></span>پروفایل</a></li>
        <li><a href="profile-order.html" class="profile-menu-url"><span class="mdi mdi-basket"></span>همه
                سفارش ها</a></li>
        <li><a href="profile-order-return.html" class="profile-menu-url"><span
                    class="mdi mdi-autorenew"></span>در خواست مرجوعی</a></li>
        <li><a href="profile-favorites.html" class="profile-menu-url"><span
                    class="mdi mdi-heart-outline"></span>لیست
                علاقه مندی ها</a></li>
        <li><a href="profile-comments.html" class="profile-menu-url"><span
                    class="mdi mdi-comment-multiple-outline"></span>نقد و نظرات</a></li>
        <li><a href="profile-addresses.html" class="profile-menu-url"><span
                    class="mdi mdi-map-marker-outline"></span>آدرس
                ها</a></li>
        <li><a href="#" class="profile-menu-url"><span class="mdi mdi-history"></span>بازدید های اخیر</a>
        </li>
        <li><a href="profile-personal-info.html" class="profile-menu-url"><span
                    class="mdi mdi-account-circle"></span>اطلاعات شخصی</a></li>
        <li>
            <form action="{{route('logout')}}" method="post">
                @csrf
                <button type="submit" class="profile-menu-url bg-white"><span class="mdi mdi-power"></span> خروج</button>
            </form>
        </li>
    </ul>
</div>
