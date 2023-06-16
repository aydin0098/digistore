@section('title','ویژگی محصولات')
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
            <h4 class="card-title">افزودن ویژگی</h4>
            <hr>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form wire:submit.prevent="store">
                        @include('errors.error')

                        <div class="form-group">
                            <label for="exampleInputEmail111">عنوان ویژگی:</label>
                            <input type="text" wire:model.lazy="attribute.title" class="form-control"
                                   id="exampleInputEmail111">
                        </div>
                        <div class="mt-20 form-group ">
                            <div class="custom-control custom-checkbox mr-sm-2 form-group" style="margin-top: 30px">
                                <input wire:model="attribute.isFilter" type="checkbox" class="custom-control-input" checked id="checkbox2">
                                <label class="custom-control-label" for="checkbox2">فیلتر باشد ؟</label>
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
                <h4 class="card-title mb-2">لیست ویژگی ها</h4>
                <a href="{{ route('admin.attr.trashed') }}" type="button"
                   class="btn btn-danger mb-2 mr-2" style="float:left;margin-top:-37px;"><i
                        class="fa fa-trash"></i> سطل زباله <span class="badge badge-danger">
                                                {{ \App\Models\Admin\products\Attribute::onlyTrashed()->count() }}
                                            </span></a>
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
                        <th class="sorting">عنوان ویژگی</th>
                        <th class="sorting">وضعیت</th>
                        <th class="sorting">فیلتر؟</th>
                        <th class="sorting">عملیات</th>
                    </tr>
                    </thead>
                    @if($readyToLoad)
                        <tbody>

                        @foreach($attr as $at)
                            <tr role="row" class="odd">
                                <td>{{$at->title}}</td>
                                <td>

                                    @if ($at->isActive == 1)
                                        <a wire:click="changeStatus({{ $at->id }})"
                                           style="cursor:pointer"><span
                                                class="badge badge-success">فعال</span></a>
                                    @else
                                        <a wire:click="changeStatus({{ $at->id }})"
                                           style="cursor:pointer"><span
                                                class="badge badge-danger">غیرفعال</span></a>
                                    @endif



                                </td>
                                <td>

                                    @if ($at->isFilter == 1)
                                        <a wire:click="changeFilter({{$at->id}})"
                                           style="cursor:pointer"><span
                                                class="badge badge-success">بله</span></a>
                                    @else
                                        <a wire:click="changeFilter({{$at->id}})"
                                           style="cursor:pointer"><span
                                                class="badge badge-danger">خیر</span></a>
                                    @endif



                                </td>
                                <td>
                                    <a href="{{route('admin.attr.edit',$at->id)}}"
                                       class="action-icon">
                                        <i class="zmdi zmdi-edit zmdi-custom"></i>
                                    </a>
                                    <a href="javascript:void(0);"
                                       wire:click="deleteId({{$at->id}})"
                                       data-toggle="modal"
                                       data-target="#exampleModal"
                                       class="action-icon">
                                        <i class="zmdi zmdi-delete zmdi-custom"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        {{$attr->links()}}
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



