@section('title','سطل زباله کاربران')

<div class="col-12 box-margin" wire:init="loadLogo" >
    <div class="card">
        <div class="card-body pb-0">
            <div class="">
                <div class="">
                    <div class="row">
                        <div class="col-12 col-lg-12 box-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-2">لیست کاربران</h4>
                                    <hr>
                                </div>
                                <div class="col-sm-12">
                                    <div id="datatable-buttons_filter" class="dataTables_filter">
                                        <div class="form-group">
                                            <input wire:model="search" type="search" class="form-control mb-2 w-40" placeholder="جستجو...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatable-buttons"
                                           class="table table-striped dt-responsive nowrap w-100" style="width: 686px;">
                                        <thead>
                                        <tr role="row">
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
                                                <tr role="row" class="odd">
                                                    <td><img src="{{$user->profilePhoto}}" width="50px"></td>
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
                                                        @if($user->isActive ==1)
                                                            <span class="badge badge-success">فعال</span>
                                                        @else
                                                            <span class="badge badge-danger">غیرفعال</span>
                                                        @endif
                                                    </td>
                                                    <td>{{$user->created_at}}</td>
                                                    <td>
                                                        <a title="بازیابی" wire:click="restore({{$user->id}})"
                                                           href="#"
                                                           class="action-icon">
                                                            <i class="zmdi zmdi-refresh zmdi-custom"></i>
                                                        </a>
                                                        <a href="javascript:void(0);"
                                                           wire:click="deleteId({{$user->id}})"
                                                           data-toggle="modal"
                                                           data-target="#exampleModal"
                                                           class="action-icon">
                                                            <i class="zmdi zmdi-delete zmdi-custom"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            {{$users->links()}}
                                            </tbody>
                                        @else
                                            <div class="alert alert-warning">
                                                در حال بارگزاری اطلاعات ...
                                            </div>
                                        @endif
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> <!-- end card body-->
                @include('livewire.admin.include.modal')
            </div> <!-- end card -->
        </div>
    </div>
</div>
