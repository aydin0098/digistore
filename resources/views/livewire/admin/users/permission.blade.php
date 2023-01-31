@section('title','دسترسی کاربران')
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
            <h4 class="card-title">دسترسی کاربر {{$user->name}}</h4>
            <hr>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form wire:submit.prevent="store">
                        @include('errors.error')

                        <div class="form-group" wire:ignore>
                            <label for="exampleInputEmail12">سطح دسترسی ها:</label>

                            <div wire:ignore>
                                <select id="permissions" wire:model.lazy="permission"
                                        class=" js-example-basic-single form-control" multiple name=""
                                        style="width: 100%;">
                                    @foreach($permissions as $permission)
                                        <option {{in_array($permission->id ,$user->permissions()->pluck('id')->toArray()) ? 'selected' : ''}}
                                            value="{{$permission->id}}">{{$permission->description}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group" wire:ignore>
                            <label for="exampleInputEmail12">نقش کاربری:</label>

                            <div wire:ignore>
                                <select id="roles" wire:model.lazy="role"
                                        class=" js-example-basic-single form-control" multiple name=""
                                        style="width: 100%;">
                                    @foreach($roles as $role)
                                        <option {{in_array($role->id ,$user->roles()->pluck('id')->toArray()) ? 'selected' : ''}}
                                            value="{{$role->id}}">{{$role->description}}</option>
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

            $('#roles').select2();
            $('#roles').on('change', function (e) {
                let data = $(this).val();
            @this.set('role', data);
            });
            window.livewire.on('store', () => {
                $('#roles').select2();
            });



        });
    </script>
@endsection
