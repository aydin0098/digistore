@section('title','ویرایش نقش')
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
                                                <label for="exampleInputEmail111">عنوان نقش:</label>
                                                <input type="text" wire:model.lazy="role.title"
                                                       class="form-control" id="exampleInputEmail111">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail111">توضیحات نقش:</label>
                                                <input type="text" wire:model.lazy="role.description"
                                                       class="form-control" id="exampleInputEmail111">
                                            </div>
                                            <div class="form-group" wire:ignore>
                                                <label for="exampleInputEmail12">سطح دسترسی ها:</label>
                                                <div wire:ignore>
                                                    <select id="permissions" wire:model.lazy="permissions" multiple
                                                            class="js-example-basic-single form-control">

                                                        @foreach(\App\Models\Admin\Permissions\Permission::all() as $p)
                                                            <option
                                                                value="{{$p->id}}" {{in_array($p->id,$role->permissions()->pluck('id')->toArray()) ? 'selected' : ''}}>
                                                                {{$p->description}}
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
            $('#permissions').select2();
            $('#permissions').on('change', function (e) {
                let data = $(this).val();
            @this.set('permissions', data);
            });
            window.livewire.on('store', () => {
                $('#permissions').select2();
            });
        });
    </script>
@endsection
