@section('title','برند ها')
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
            <h4 class="card-title">افزودن برند</h4>
            <hr>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form wire:submit.prevent="store">
                        @include('errors.error')

                        <div class="form-group">
                            <label for="exampleInputEmail111">عنوان برند:</label>
                            <input type="text" wire:model.lazy="brand.title" class="form-control"
                                   id="exampleInputEmail111">
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
                <h4 class="card-title mb-2">لیست برند ها</h4>
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
                        <th class="sorting">عنوان برند</th>
                        <th class="sorting">عملیات</th>
                    </tr>
                    </thead>
                    @if($readyToLoad)
                        <tbody>

                        @foreach($brands as $brand)
                            <tr role="row" class="odd">
                                <td>{{$brand->title}}</td>
                                <td>
                                    <a href="{{route('admin.brands.edit',$brand->id)}}"
                                       class="action-icon">
                                        <i class="zmdi zmdi-edit zmdi-custom"></i>
                                    </a>
                                    <a href="javascript:void(0);"
                                       wire:click="deleteId({{$brand->id}})"
                                       data-toggle="modal"
                                       data-target="#exampleModal"
                                       class="action-icon">
                                        <i class="zmdi zmdi-delete zmdi-custom"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        {{$brands->links()}}
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



