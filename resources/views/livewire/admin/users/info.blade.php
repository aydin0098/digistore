@section('title','اطلاعات کاربران')

<div class="col-12 box-margin">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-2">اطلاعات کاربر {{$user->name}}</h4>
            <hr>

            <div class="row">
                <div class="col-3">
                    <b>نام و نام خانوادگی : </b> {{$user->name}}
                </div>
                <div class="col-3">
                    <b>موبایل : </b> <a href="tel:{{$user->mobile}}">{{$user->mobile}}</a>
                </div>
                <div class="col-3">
                    <b>ایمیل : </b> <a href="mailto:{{$user->email}}">{{$user->email}}</a>
                </div>
                <div class="col-3">
                    <b>وضعیت کاربر : </b>
                    @if($user->isActive ==1)
                        <span class="badge badge-success"> فعال</span>
                    @else
                        <span class="badge badge-danger">غیرفعال</span>
                    @endif

                    @if($user->mobile_verified_at)
                        <span class="badge badge-info"> موبایل تایید شده</span>
                    @else
                        <span class="badge badge-danger">موبایل تایید نشده است</span>
                    @endif
                </div>
            </div>

            <div class="row mt-15">
                <div class="col-3">
                    <b>تاریخ ایجاد کاربر : </b> {{$user->created_at}}
                </div>
                <div class="col-3">
                    <b>تاریخ ویرایش کاربر : </b> {{$user->updated_at}}
                </div>
                <div class="col-3">
                    <b>نوع کاربر : </b>
                    @if($user->typeUser == 'admin')
                        <span class="badge badge-dark">مدیر سایت</span>
                    @elseif($user->typeUser == 'vendor')
                        <span class="badge badge-warning">فروشنده</span>
                    @elseif($user->typeUser == 'user')
                        <span class="badge badge-primary">کاربر عادی</span>
                    @endif
                </div>
                <div class="col-3">
                    <b>نقش کاربری : </b>
                    @foreach($user->roles as $role)
                        <span class="badge badge-secondary">{{$role->description}}</span>
                    @endforeach
                </div>
            </div>

            <div class="row mt-15">
                <div class="col-12">
                    <b>سطح دسترسی های کاربر : </b>
                    <br>
                    <br>
                    <div class="row">

                    @foreach($user->permissions as $p)
                            <div class="col-md-2 text-center" style="margin-top: 25px">
                                <span class="badge-outline-success p-1" style="font-size: 12px" ><b>{{$p->description}}</b></span>
                            </div>
                    @endforeach
                    </div>
                </div>

            </div>

            <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
