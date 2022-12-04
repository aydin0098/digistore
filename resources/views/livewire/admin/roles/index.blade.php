@section('title','نقش ها')
@section('styles')
    <link rel="stylesheet" href="{{asset('back/plugins/select2/css/select2.min.css')}}">
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice__display {
            color: #2f2f2f !important;
        }
    </style>
@endsection

<div style="width: 100%;" class="row">
    <div class="col-xl-4 box-margin">
        <div class="card card-body">
            <h4 class="card-title">افزودن نقش</h4>
            <hr>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form wire:submit.prevent="store">
                        @include('errors.error')

                        <div class="form-group">
                            <label for="exampleInputEmail111">عنوان نقش (لاتین):</label>
                            <input type="text" wire:model.lazy="role.title" class="form-control"
                                   id="exampleInputEmail111">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail111">توضیحات نقش (فارسی):</label>
                            <input wire:model.lazy="role.description" type="text" class="form-control"
                                   id="exampleInputEmail111">
                        </div>

                        <div class="form-group" wire:ignore>
                            <label for="exampleInputEmail12">سطح دسترسی ها:</label>

                            <div wire:ignore>
                                <select id="permissions" wire:model.lazy="permission"
                                        class=" js-example-basic-single form-control" multiple name=""
                                        style="width: 100%;">
                                    @foreach($permissions as $permission)
                                        <option value="{{$permission->id}}">{{$permission->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-success mb-2 mr-2" style="float:left;"><i
                                class="fa fa-save"></i> ذخیره
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-8 box-margin" wire:init="loadLogo">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-2">لیست نقش ها</h4>
                <a href="{{route('admin.roles.trashed')}}" class="btn btn-danger mb-2 mr-2"
                   style="float:left;margin-top:-37px;"><i class="fa fa-refresh"></i> سطل زباله
                    <span
                        class="badge badge-warning">{{\App\Models\Admin\Permissions\Role::onlyTrashed()->count()}}</span>
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
                </div>

                <table id="datatable-buttons"
                       class="table table-striped dt-responsive nowrap w-100" style="width: 686px;">
                    <thead>
                    <tr role="row">
                        <th class="sorting">عنوان نقش</th>
                        <th class="sorting">توضیحات نقش</th>
                        <th class="sorting">سطح دسترسی ها</th>
                        <th class="sorting">عملیات</th>
                    </tr>
                    </thead>
                    @if($readyToLoad)
                        <tbody>

                        @foreach($roles as $role)
                            <tr role="row" class="odd">
                                <td>{{$role->title}}</td>
                                <td>{{$role->description}}</td>
                                <td>
                                    @foreach($role->permissions as $permission)
                                        <span class="badge badge-success">{{$permission->description}}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{route('admin.roles.edit',$role->id)}}"
                                       class="action-icon">
                                        <i class="zmdi zmdi-edit zmdi-custom"></i>
                                    </a>
                                    <a href="{{route('admin.setting.footer.menu.update',$role->id)}}"
                                       class="action-icon">
                                        <i class="zmdi zmdi-edit zmdi-custom"></i>
                                    </a>
                                    <a href="javascript:void(0);"
                                       wire:click="deleteId({{$role->id}})"
                                       data-toggle="modal"
                                       data-target="#exampleModal"
                                       class="action-icon">
                                        <i class="zmdi zmdi-delete zmdi-custom"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        {{$roles->links()}}
                        </tbody>
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





@section('scripts')
    <script src="{{asset('back/plugins/select2/js/select2.full.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#permissions').select2();
            $('#permissions').on('change', function (e) {
                let data = $(this).val();
            @this.set('permission', data);
            });
            window.livewire.on('store', () => {
                $('#permissions').select2();
            });
        });
    </script>
@endsection
