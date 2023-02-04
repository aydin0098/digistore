@section('title','ویرایش برند')
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
            <h4 class="card-title">ویرایش برند {{$brand->title}}</h4>
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
</div>



