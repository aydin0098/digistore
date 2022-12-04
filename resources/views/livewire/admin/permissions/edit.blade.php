@section('title','ویرایش دسترسی')
@section('styles')
    <link rel="stylesheet" href="{{asset('back/plugins/select2/css/select2.min.css')}}">
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice__display {
            color: #2f2f2f !important;
        }
    </style>
@endsection
<div class="col-12 box-margin">
    <div class="card">
        <div class="card-body pb-0">
            <div class="d-sm-flex">

                <div class="mail-body--area">
                    <div class="row">
                        <div class="col-xl-12 box-margin height-card">
                            <div class="card card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        @include('errors.error')
                                        <form wire:submit.prevent="store" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="exampleInputEmail111">عنوان دسترسی (لاتین):</label>
                                                <input type="text" wire:model.lazy="permission.title"
                                                       class="form-control" id="exampleInputEmail111">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail111">توضیحات دسترسی:</label>
                                                <input type="text" wire:model.lazy="permission.description"
                                                       class="form-control" id="exampleInputEmail111">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail12">نقش ها:</label>
                                                <div wire:ignore>
                                                    <select id="roles" wire:model.lazy="roles" multiple
                                                            class="js-example-basic-single form-control">

                                                        @foreach(\App\Models\Admin\Permissions\Role::all() as $r)
                                                            <option
                                                                value="{{$r->id}}" {{in_array($r->id,$permission->roles()->pluck('id')->toArray()) ? 'selected' : ''}}>
                                                                {{$r->description}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <button type="submit"
                                                    class="btn btn-outline-success mb-2 mr-2" style="float:left;">
                                                <i class="fa fa-save"></i> ذخیره
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div>
    </div>
</div>
@section('scripts')
    <script src="{{asset('back/plugins/select2/js/select2.full.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#roles').select2();
            $('#roles').on('change', function (e) {
                let data = $(this).val();
            @this.set('roles', data);
            });
            window.livewire.on('store', () => {
                $('#roles').select2();
            });
        });
    </script>
@endsection
