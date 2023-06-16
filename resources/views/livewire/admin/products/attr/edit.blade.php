@section('title','ویرایش ویژگی')
@section('styles')
    <link rel="stylesheet" href="{{asset('back/plugins/select2/css/select2.min.css')}}">
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice__display {
            color: #2f2f2f !important;
        }
    </style>
@endsection

<div style="width: 100%;" class="row">
    <div class="col-xl-12 box-margin">
        <div class="card card-body">
            <h4 class="card-title">ویرایش ویژگی {{$attr->title}}</h4>
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

                            <div class="col-12 d-flex">
                                <div class="mt-20 form-group ">
                                    <div class="custom-control custom-checkbox mr-sm-2 form-group" style="margin-top: 30px">
                                        <input wire:model="attribute.isFilter" type="checkbox" class="custom-control-input" checked id="checkbox2">
                                        <label class="custom-control-label" for="checkbox2">فیلتر باشد ؟</label>
                                    </div>
                                </div>
                                <div class="mt-20 form-group ">
                                    <div class="custom-control custom-checkbox mr-sm-2 form-group" style="margin-top: 30px">
                                        <input wire:model="attribute.isActive" type="checkbox" class="custom-control-input" checked id="checkbox3">
                                        <label class="custom-control-label" for="checkbox3">فعال</label>
                                    </div>
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
</div>



