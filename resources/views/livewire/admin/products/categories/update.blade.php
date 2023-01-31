@section('title','ویرایش دسته بندی')
@section('styles')
    <link rel="stylesheet" href="{{asset('back/plugins/select2/css/select2.min.css')}}">
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice__display {
            color: #2f2f2f !important;
        }
    </style>
@endsection


@can('manage_categories')
    <div style="width: 100%;" class="row">
        <div class="col-xl-12 box-margin">
            <div class="card card-body">
                <h4 class="card-title">ویرایش دسته {{$category->title}}</h4>
                <hr>
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <form wire:submit.prevent='store'>
                            @include('errors.error')
                            <div class="form-group">
                                <label for="exampleInputEmail111">عنوان دسته بندی:</label>
                                <input type="text" wire:model.lazy='category.title' class="form-control"
                                       id="exampleInputEmail111">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail111">توضیحات دسته بندی:</label>
                                <textarea wire:model.lazy='category.description' class="form-control" id="exampleInputEmail111"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail111">کد آیکون:</label>
                                <input type="text" wire:model.lazy='category.icon' class="form-control"
                                       id="exampleInputEmail111">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail111">عنوان متا:</label>
                                <input type="text" wire:model.lazy='category.metaTitle'
                                       class="form-control" id="meta-title">
                                <div id="counter1" style="font-size:12px"></div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail111">توضیحات متا:</label>
                                <textarea wire:model.lazy='category.metaDescription' class="form-control" id="meta-description"></textarea>
                                <div id="counter2" style="font-size:12px"></div>
                            </div>


                            <div class="input-group cust-file-button mb-3">
                                <div class="custom-file">
                                    <input type="file" wire:model="image"
                                           class="custom-file-input form-control" id="inputGroupFile03">
                                    <label class="custom-file-label" for="inputGroupFile03">تصویر
                                        دسته بندی</label>
                                    <span class="text-info" wire:target='image' wire:loading>درحال
                                                        بارگزاری...</span>
                                </div>
                            </div>

                            <div wire:ignore id="progressbar" class="progress mb-0 mt-1 mb-1"
                                 style="display: none">
                                <div class="progress-bar" role="progressbar" style="width: 0%;"
                                     aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0٪
                                </div>
                            </div>

                            @if ($category->image)
                                <img style="width: 100px;height: 100px" class="form-control mt-3 mb-3" src="{{asset($category->image)}}"
                                     alt="">
                            @endif

                            @if ($image)
                                <img style="width: 100px;height: 100px" class="form-control mt-3 mb-3" src="{{ $image->temporaryUrl() }}"
                                     alt="">
                            @endif

                            <button type="submit" class="btn btn-outline-success mb-2 mr-2"
                                    style="float:left;"><i class="fa fa-save"></i> ذخیره</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- end row-->
@endcan






@section('scripts')

    <script src="{{asset('back/js/MaxLength.min.js')}}"></script>

    <script>
        $(document).ready(function() {

            //Specifying the Character Count control explicitly
            $("#meta-title").MaxLength({
                MaxLength: 60,
                CharacterCountControl: $('#counter1')
            });
            $("#meta-description").MaxLength({
                MaxLength: 160,
                CharacterCountControl: $('#counter2')
            });

        });
    </script>

    <script>
        document.addEventListener('livewire:load', () => {
            let progressSection = document.querySelector('#progressbar');
            let progressBar = document.querySelector('.progress-bar');

            document.addEventListener('livewire-upload-start', () => {
                console.log('شروع بارگزاری');
                progressSection.style.display = 'flex';
            });
            document.addEventListener('livewire-upload-finish', () => {
                console.log('اتمام آپلود');
                progressSection.style.display = 'none';
            });
            document.addEventListener('livewire-upload-error', () => {
                console.log('خطا در بارگزاری');
                progressSection.style.display = 'none';
            });
            document.addEventListener('livewire-upload-progress', (event) => {
                console.log(`${event.detail.progress}%`);
                progressBar.style.width = `${event.detail.progress}%`;
                progressBar.textContent = `${event.detail.progress}%`;
            });

        })
    </script>
@endsection

