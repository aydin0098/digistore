<ul class="folder-list">
    <li class="{{request()->routeIs('admin.setting.footer.label') ? 'active' : ''}}"><a href="{{route('admin.setting.footer.label')}}">برچسب ها </a></li>
    <li class="{{request()->routeIs('admin.setting.footer.social') ? 'active' : ''}}"><a href="{{route('admin.setting.footer.social')}}">شبکه های اجتماعی</a></li>
    <li class="{{request()->routeIs('admin.setting.footer.logo') ? 'active' : ''}}"><a href="{{route('admin.setting.footer.logo')}}">لوگو های فوتر</a></li>
</ul>
