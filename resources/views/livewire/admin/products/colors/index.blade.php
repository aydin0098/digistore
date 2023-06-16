@section('title','رنگ بندی محصولات')
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

            <h4 class="card-title">افزودن رنگ</h4>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form wire:submit.prevent='store'>
                        @include('errors.error')
                        <div class="form-group">
                            <label for="exampleInputEmail111">عنوان رنگ:</label>
                            <input type="text" wire:model.lazy='color.title' class="form-control"
                                   id="exampleInputEmail111">
                        </div>

                        <div class="form-group" wire:ignore>
                            <label for="exampleInputEmail111">کد رنگ:</label>
                            <input type="color" wire:model.lazy='color.value' class="form-control"
                                   id="exampleInputEmail111">
                        </div>

                        <button type="submit" class="btn btn-outline-success mb-2 mr-2"
                                style="float:left;"><i class="fa fa-save"></i> ذخیره</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-8 box-margin" wire:init="loadLogo">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-2">لیست زنگ ها</h4>

                <a href="{{ route('admin.colors.trashed') }}" type="button"
                   class="btn btn-danger mb-2 mr-2" style="float:left;margin-top:-37px;"><i
                        class="fa fa-trash"></i> سطل زباله <span class="badge badge-danger">
                                                {{ \App\Models\Admin\products\Color::onlyTrashed()->count() }}
                                            </span></a>

                {{-- <button type="button" class="btn btn-primary mb-2 mr-2"
                    style="float:left;margin-top:-37px;"><i class="fa fa-file-excel-o"></i> خروجی
                    اکسل</button> --}}
                <hr>
                <input wire:model="search" type="search" class="form-control mb-2 w-50 float-left"
                       placeholder="جستجو...">

                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap"
                       style="width:102%" wire:init='loadLogo'>
                    <thead>
                    <tr>
                        <th>نام رنگ</th>
                        <th>وضعیت</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>

                    @if ($readyToLoad)
                        <tbody>
                        @foreach ($colors as $color)
                            <tr>
                                <td><span style="background-color: {{$color->value}}">{{ $color->title }}</span></td>
                                <td>

                                    @if ($color->isActive == 1)
                                        <a wire:click="changeStatus({{ $color->id }})"
                                           style="cursor:pointer"><span
                                                class="badge badge-success">فعال</span></a>
                                    @else
                                        <a wire:click="changeStatus({{ $color->id }})"
                                           style="cursor:pointer"><span
                                                class="badge badge-danger">غیرفعال</span></a>
                                    @endif



                                </td>
                                <td>

                                    <a href="{{route('admin.colors.edit',$color->id)}}"
                                       class="action-icon"> <i
                                            class="zmdi zmdi-edit zmdi-custom"></i></a>



                                    <button wire:click="deleteId({{ $color->id }})"
                                            data-toggle="modal" data-target="#exampleModal"
                                            class="action-icon"> <i
                                            class="zmdi zmdi-delete zmdi-custom"></i></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        {{ $colors->links() }}
                    @else
                        <div class="alert alert-warning">
                            در حال بارگزاری اطلاعات ....
                        </div>
                    @endif
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
    @include('livewire.admin.include.modal')
</div>



<!-- end row-->


