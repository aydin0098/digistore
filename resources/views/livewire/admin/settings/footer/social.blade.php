@section('title','شبکه های اجتماعی')
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
                            <label class="col-form-label">ایمیل فورشگاه</label>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" wire:model="email">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-2">
                            <label class="col-form-label">تلفن فورشگاه</label>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" wire:model="phone">
                        </div>
                    </div>

                    <label style="font-weight: bold">شبکه های اجتماعی</label>

                    <div class="form-group row">
                        <div class="col-lg-6">
                            <input placeholder="آیکون" type="text" class="form-control" wire:model="socialIcon1">
                        </div>
                        <div class="col-lg-6">
                            <input placeholder="لینک شبکه اجتماعی" type="text" class="form-control"
                                   wire:model="socialLink1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <input placeholder="آیکون" type="text" class="form-control" wire:model="socialIcon2">
                        </div>
                        <div class="col-lg-6">
                            <input placeholder="لینک شبکه اجتماعی" type="text" class="form-control"
                                   wire:model="socialLink2">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <input placeholder="آیکون" type="text" class="form-control" wire:model="socialIcon3">
                        </div>
                        <div class="col-lg-6">
                            <input placeholder="لینک شبکه اجتماعی" type="text" class="form-control"
                                   wire:model="socialLink3">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <input placeholder="آیکون" type="text" class="form-control" wire:model="socialIcon4">
                        </div>
                        <div class="col-lg-6">
                            <input placeholder="لینک شبکه اجتماعی" type="text" class="form-control"
                                   wire:model="socialLink4">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <input placeholder="آیکون" type="text" class="form-control" wire:model="socialIcon5">
                        </div>
                        <div class="col-lg-6">
                            <input placeholder="لینک شبکه اجتماعی" type="text" class="form-control"
                                   wire:model="socialLink5">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <input placeholder="آیکون" type="text" class="form-control" wire:model="socialIcon6">
                        </div>
                        <div class="col-lg-6">
                            <input placeholder="لینک شبکه اجتماعی" type="text" class="form-control"
                                   wire:model="socialLink6">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <input placeholder="آیکون" type="text" class="form-control" wire:model="socialIcon7">
                        </div>
                        <div class="col-lg-6">
                            <input placeholder="لینک شبکه اجتماعی" type="text" class="form-control"
                                   wire:model="socialLink7">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <input placeholder="آیکون" type="text" class="form-control" wire:model="socialIcon8">
                        </div>
                        <div class="col-lg-6">
                            <input placeholder="لینک شبکه اجتماعی" type="text" class="form-control"
                                   wire:model="socialLink8">
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
</div>
