@section('title','سطل زباله دسترسی ها')

<div class="col-12 box-margin" wire:init="loadLogo" >
    <div class="card">
        <div class="card-body pb-0">
            <div class="">
                <div class="">
                    <div class="row">
                        <div class="col-12 col-lg-12 box-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-2">لیست دسترسی ها</h4>
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
                                            <th class="sorting">عنوان دسترسی</th>
                                            <th class="sorting">توضیحات دسترسی</th>
                                            <th class="sorting">نقش کاربری</th>
                                            <th class="sorting">عملیات</th>
                                        </tr>
                                        </thead>
                                        @if($readyToLoad)
                                            <tbody>

                                            @foreach($permissions as $permission)
                                                <tr role="row" class="odd">
                                                    <td>{{$permission->title}}</td>
                                                    <td>{{$permission->description}}</td>
                                                    <td>
                                                        @foreach($permission->roles as $role)
                                                            <span class="badge badge-success">{{$role->description}}</span>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        <a title="بازیابی" wire:click="restore({{$permission->id}})"
                                                           href="#"
                                                           class="action-icon">
                                                            <i class="zmdi zmdi-refresh zmdi-custom"></i>
                                                        </a>
                                                        <a href="javascript:void(0);"
                                                           wire:click="deleteId({{$permission->id}})"
                                                           data-toggle="modal"
                                                           data-target="#exampleModal"
                                                           class="action-icon">
                                                            <i class="zmdi zmdi-delete zmdi-custom"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            {{$permissions->links()}}
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
