@section('title','ویرایش کاربر')

<div class="col-12 box-margin">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-2">ویرایش کاربر {{$user->name}}</h4>
            <hr>
            @include('errors.error')
            <form wire:submit.prevent="store" enctype="multipart/form-data">
            <div class="row">
                <div class="col-3">
                    <b for="">نام و نام خانوادگی:</b>
                    <input class="form-control" wire:model="user.name" type="text">
                </div>
                <div class="col-3">
                    <b for="">موبایل:</b>
                    <input class="form-control" wire:model="user.mobile" type="text">
                </div>
                <div class="col-3">
                    <b for="">پست الکترونیکی:</b>
                    <input class="form-control" wire:model="user.email" type="text">
                </div>
                <div class="col-3">
                    <b for="exampleInputEmail12">نوع کاربر:</b>
                    <select  wire:model.lazy="user.typeUser" class="js-example-basic-single form-control">

                        <option value="vendor" data-select2-id="select2-data-3-u838">
                            فروشنده
                        </option>
                        <option value="admin" data-select2-id="select2-data-3-u838">
                            مدیر
                        </option>
                        <option value="user" data-select2-id="select2-data-3-u838">
                            کاربر عادی
                        </option>
                    </select>
                </div>
            </div>
            <div class="row mt-15">
                <div class="col-3">
                    <b for="">رمز عبور:</b>
                    <input class="form-control" wire:model="password" type="text">
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <div class="input-group cust-file-button mb-3">
                            <div class="custom-file">
                                <input type="file" wire:model.lazy="profilePhoto"
                                       class="custom-file-input form-control" id="inputGroupFile03">
                                <label class="custom-file-label" for="inputGroupFile03">تصویر
                                    پروفایل</label>
                                <span class="text-info" wire:target='profilePhoto' wire:loading>درحال
                                                        بارگزاری...</span>
                            </div>
                        </div>
                        <div wire:ignore  id="progressbar" style="display: none" class="progress mb-20">
                            <div  class="progress-bar progress-bar-striped"
                                  role="progressbar" style="width: 0%;"
                                  aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                        </div>
                        @if($profilePhoto)
                            <img style="width: 100px;" src="{{$profilePhoto->temporaryUrl()}}" class="form-control">
                        @endif
                    </div>
                </div>
                <div class="col-3">
                    @if($user->profilePhoto)
                        <img style="width: 100px;" src="{{asset($user->profilePhoto)}}" class="form-control">
                    @endif
                </div>
            </div>

                <div class="row">
                    <div class="col-2 mt-15">
                        <div class="checkbox checkbox-primary d-inline">
                            <input type="checkbox" wire:model="user.isActive" id="checkbox-p-1">
                            <label for="checkbox-p-1" class="cr">فعال</label>
                        </div>

                    </div>
                    <div class="col-2 mt-15">
                        <div class="checkbox checkbox-primary d-inline">
                            <input type="checkbox" wire:model="user.mobile_verified_at"
                                   id="checkbox-p-2">
                            <label for="checkbox-p-2" class="cr">تائید موبایل</label>
                        </div>

                    </div>
                    <div class="col-2 mt-15">
                        <div class="checkbox checkbox-primary d-inline">
                            <input type="checkbox" wire:model.lazy="user.email_verified_at"
                                   id="checkbox-p-3">
                            <label for="checkbox-p-3" class="cr">تائید ایمیل</label>
                        </div>

                    </div>
                </div>

                <button type="submit"
                        class="btn btn-outline-success mb-2 mr-2" style="float:left;">
                    <i class="fa fa-save"></i> ذخیره
                </button>
            </form>



            </div>
            <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
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
