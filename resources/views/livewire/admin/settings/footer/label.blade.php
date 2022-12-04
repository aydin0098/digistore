@section('title','برچسب فوتر')
<div class="col-12 box-margin">
    <div class="card">
        <div class="card-body pb-0">
            <div class="d-sm-flex">
                <div class="mail-side-menu mb-30">
                    <div class="ibox-content mailbox-content">
                        <div class="file-manager clearfix">

                            @include('livewire.admin.settings.includes.footer-sidebar')

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="mail-body--area">
                    <div class="form-group row">
                        <div class="col-lg-2">
                            <label class="col-form-label">متن برگشت به بالا</label>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" wire:model="upLabel">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-2">
                            <label class="col-form-label">تیتر فوتر اول</label>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" wire:model="widgetLabel1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-2">
                            <label class="col-form-label">تیتر فوتر دوم</label>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" wire:model="widgetLabel2">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-2">
                            <label class="col-form-label">تیتر فوتر سوم</label>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" wire:model="widgetLabel3">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-2">
                            <label class="col-form-label">تیتر فوتر چهارم</label>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" wire:model="widgetLabel4">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-2">
                            <label class="col-form-label">متن خبرنامه</label>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" wire:model="rssLabel">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-2">
                            <label class="col-form-label"></label>متن سوشال مدیا</label>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" wire:model="socialLabel">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-2">
                            <label class="col-form-label">متن پشتیبانی</label>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" wire:model="supportLabel">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-2">
                            <label class="col-form-label">متن شماره تلفن</label>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" wire:model="phoneLabel">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-2">
                            <label class="col-form-label">متن ایمیل</label>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" wire:model="emailLabel" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-2">
                            <label class="col-form-label">تیتر درباره فروشگاه</label>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" wire:model="aboutHeadLabel" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-2">
                            <label class="col-form-label">متن درباره فروشگاه</label>
                        </div>
                        <div class="col-lg-10">
                            <textarea type="text" class="form-control" wire:model="aboutbodyLabel"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-2">
                            <label class="col-form-label">متن کپی رایت</label>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" wire:model="copyright" >
                        </div>
                    </div>

                    <button wire:click='update' type="submit" class="btn btn-outline-success mb-2 mr-2" style="float:right;"><i class="fa fa-save"></i> ذخیره</button>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
