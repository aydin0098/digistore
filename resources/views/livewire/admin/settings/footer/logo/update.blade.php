@section('title','ویرایش لگو فوتر')

<div class="col-12 box-margin">
    <div class="card">
        <div class="card-body pb-0">
            <div class="d-sm-flex">
                <div class="mail-side-menu mb-30">
                    <div class="ibox-content mailbox-content">
                        <div class="file-manager clearfix">

                            <ul class="folder-list">
                                <li class="{{request()->routeIs('admin.setting.footer.label') ? 'active' : ''}}"><a href="{{route('admin.setting.footer.label')}}">برچسب ها </a></li>
                                <li class="{{request()->routeIs('admin.setting.footer.social') ? 'active' : ''}}"><a href="{{route('admin.setting.footer.social')}}">شبکه های اجتماعی</a></li>
                                <li class="active"><a href="{{route('admin.setting.footer.logo.index')}}">لوگو های فوتر</a></li>
                            </ul>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="mail-body--area">
                    <div class="row">
                        <div class="col-xl-12 box-margin height-card">
                            <div class="card card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        @include('errors.error')
                                        <form wire:submit.prevent="store" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="exampleInputEmail111">عنوان لوگو:</label>
                                                <input type="text" wire:model.lazy="footerLogo.title" class="form-control" id="exampleInputEmail111">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail111">لینک لوگو:</label>
                                                <input type="text" wire:model.lazy="footerLogo.url" class="form-control" id="exampleInputEmail111">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail12">جایگاه لوگو:</label>
                                                <select  wire:model.lazy="footerLogo.type" class="js-example-basic-single form-control">
                                                    <option value="" data-select2-id="select2-data-3-u838">
                                                        --هیچکدام--
                                                    </option>
                                                    <option value="top" data-select2-id="select2-data-3-u838">لوگوی
                                                        بالای فوتر
                                                    </option>
                                                    <option value="bottom" data-select2-id="select2-data-3-u838">لوگوی
                                                        پایین فوتر
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input type="file" class="form-control" id="image" wire:model.lazy="image">
                                                <span class="mt-2 text-danger" wire:loading wire:target="image">درحال اپلود عکس ...</span>
                                                <div wire:ignore  id="progressbar" style="display: none" class="progress mb-20">
                                                    <div  class="progress-bar progress-bar-striped"
                                                          role="progressbar" style="width: 0%;"
                                                          aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                                </div>
                                                @if($logo->image)
                                                    <img style="width: 200px;" src="{{url($logo->image)}}" class="form-control">
                                                @endif
                                                @if($image)
                                                    <img style="width: 200px;" src="{{$image->temporaryUrl()}}" class="form-control">
                                                @endif
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
    <script>
        document.addEventListener('livewire:load',()=>{
            let progressSection = document.querySelector('#progressbar');
            let progressBar = document.querySelector('.progress-bar');

            document.addEventListener('livewire-upload-start',()=>{
                console.log('شروع بارگزاری');
                progressSection.style.display = 'flex';
            });
            document.addEventListener('livewire-upload-finish', () => {
                console.log('اتمام آپلود');
                progressSection.style.display = 'none';
            });
            document.addEventListener('livewire-upload-error',()=>{
                console.log('خطا در بارگزاری');
                progressSection.style.display = 'none';
            });
            document.addEventListener('livewire-upload-progress',(event)=>{
                console.log(`${event.detail.progress}%`);
                progressBar.style.width = `${event.detail.progress}%`;
                progressBar.textContent = `${event.detail.progress}%`;
            });

        })
    </script>
@endsection
