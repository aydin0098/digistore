@section('title','نمادهای سایت')
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
                                <li class="{{request()->routeIs('admin.setting.footer.logo.index') ? 'active' : ''}}"><a href="{{route('admin.setting.footer.logo.index')}}">لوگو های فوتر</a></li>
                                <li class="{{request()->routeIs('admin.setting.footer.menu.index') ? 'active' : ''}}"><a href="{{route('admin.setting.footer.menu.index')}}">منو های فوتر</a></li>
                                <li class="active"><a href="{{route('admin.setting.footer.apps')}}">نمادهای سایت</a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="mail-body--area">
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label class="col-form-label">مجوزهای سایت (شامل نماد اعتماد و ...)</label>
                        </div>
                        <div class="col-lg-8">
                            <textarea type="text" class="form-control" wire:model="enamad"></textarea>
                        </div>
                    </div>

                    <label style="font-weight: bold">اپلیکیشن موبایل</label>

                    <div class="form-group row">
                        <div class="col-lg-6">
                            <input placeholder="لینک اپلیکیشن" type="text" class="form-control" wire:model="linkApp1">
                        </div>
                        <div class="col-lg-6">
                            <input placeholder="تصویر" title="تصویر" type="text" class="form-control ltr"
                                   wire:model="imageApp1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <input placeholder="لینک اپلیکیشن" type="text" class="form-control" wire:model="linkApp2">
                        </div>

                        <div class="col-lg-6">
                            <input placeholder="تصویر" title="تصویر" type="text" class="form-control ltr"
                                   wire:model="imageApp2">
                        </div>
                    </div>



                    <button wire:click='update' type="submit" class="btn btn-outline-success mb-2 mr-2"
                            style="float:right;"><i class="fa fa-save"></i> ذخیره
                    </button>


                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
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
