@section('title','کاربران')

<div class="col-12 box-margin" wire:init="loadLogo">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-2">لیست کاربران</h4>
                <a href="{{route('admin.users.trashed')}}" class="btn btn-danger mb-2 mr-2"
                   style="float:left;margin-top:-37px;"><i class="fa fa-refresh"></i> سطل زباله
                    <span class="badge badge-warning">{{\App\Models\User::onlyTrashed()->count()}}</span>
                </a>
                <button type="button" class="btn btn-primary mb-2 mr-2" style="float:left;margin-top:-37px;"><i
                        class="fa fa-file-excel-o"></i> خروجی اکسل
                </button>
                <hr>
                <div class="col-sm-12">
                    <div id="datatable-buttons_filter" class="dataTables_filter">
                        <div class="form-group">
                            <input wire:model="search" type="search" class="form-control mb-2 w-40"
                                   placeholder="جستجو...">
                        </div>
                    </div>

                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                        <tr>
                            <th>تصویر</th>
                            <th>نام</th>
                            <th>سمت</th>
                            <th>ایمیل</th>
                            <th>موبایل</th>
                            <th>نوع کاربر</th>
                            <th>وضعیت</th>
                            <th>تاریخ ایجاد</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        @if($readyToLoad)
                            <tbody>
                            @foreach($users as $user)
                                <tr class="text-center">
                                    <td><img src="{{asset($user->profilePhoto)}}" width="50px"></td>
                                    <td>{{$user->name}}</td>
                                    <td>
                                        @foreach($user->roles as $role)
                                            <span class="badge badge-info">{{$role->description}}</span>
                                        @endforeach
                                    </td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->mobile}}</td>
                                    <td>
                                        @switch($user->typeUser)
                                            @case('user')
                                                کاربر عادی
                                                @break
                                                @case('admin')
                                                مدیر
                                                @break
                                            @default
                                                دیگر
                                        @endswitch
                                    </td>
                                    <td>
                                        @if($user->isActive==1)
                                            <span class="badge badge-success"
                                                  wire:click="changeStatus({{$user->id}})">فعال</span>
                                        @else
                                            <span class="badge badge-danger"
                                                  wire:click="changeStatus({{$user->id}})">غیرفعال</span>
                                        @endif


                                            @if($user->mobile_verified_at!= null)
                                                <span class="badge badge-primary"
                                                      wire:click="changeStatusMobile({{$user->id}})">تاییدیه موبایل</span>
                                            @else
                                                <span class="badge badge-danger"
                                                      wire:click="changeStatusMobile({{$user->id}})">موبایل تایید نشده</span>
                                            @endif

                                            @if($user->email_verified_at!= null)
                                                <span class="badge badge-primary"
                                                      wire:click="changeStatusEmail({{$user->id}})">تاییدیه ایمیل</span>
                                            @else
                                                <span class="badge badge-danger"
                                                      wire:click="changeStatusEmail({{$user->id}})">ایمیل تایید نشده</span>
                                            @endif

                                    </td>
                                    <td>{{$user->created_at}}</td>
                                    <td>
                                        @can('info_users')
                                            <a href="{{route('admin.users.info',$user->id)}}" style="font-size:20px;" title="اطلاعات کاربر"><i class="fa fa-eye" style="color:#234124;"></i></a>
                                        @endcan
                                        @can('account_users')
                                            <a href="" wire:click="loginForce({{$user->id}})" style="font-size:20px;" title="ورود به پنل کاربر"><i class="fa fa-sign-in" style="color:green;"></i></a>
                                        @endcan

                                        @can('permission_users')
                                            <a href="{{route('admin.users.permission',$user->id)}}" style="font-size:20px;" title="سطح دسترسی کاربر"><i class="fa fa-user-secret" style="color:darkblue;"></i></a>
                                        @endcan
                                        @can('buy_users')
                                            <a href="" style="font-size:20px;" title="خرید های کاربر"><i class="fa fa-shopping-basket" style="color:rgb(115, 194, 108);"></i></a>
                                        @endcan
                                        <a href="{{route('admin.users.edit',$user->id)}}" style="font-size:20px;"><i class="fa fa-edit" style="color:#04a9f5;"></i></a>
                                        <a href="" style="font-size:20px;" wire:click="deleteId({{$user->id}})"
                                           data-toggle="modal"
                                           data-target="#exampleModal">
                                            <i class="fa fa-trash" style="color:#dc3545;"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                            {{$users->links()}}
                        @else
                            <div class="alert alert-warning">
                                در حال بارگزاری اطلاعات ...
                            </div>
                        @endif
                    </table>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
        @include('livewire.admin.include.modal')
    </div>

