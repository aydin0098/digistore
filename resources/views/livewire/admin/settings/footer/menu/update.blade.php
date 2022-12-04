@section('title','ویرایش منو فوتر')

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
                                <li class="active"><a href="{{route('admin.setting.footer.menu.index')}}">منو های فوتر</a></li>
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
                                                <label for="exampleInputEmail111">عنوان منو:</label>
                                                <input type="text" wire:model.lazy="footerMenu.title"
                                                       class="form-control" id="exampleInputEmail111">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail111">لینک منو:</label>
                                                <input type="text" wire:model.lazy="footerMenu.url"
                                                       class="form-control" id="exampleInputEmail111">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail12">جایگاه منو:</label>
                                                <select wire:model.lazy="footerMenu.type"
                                                        class="js-example-basic-single form-control">
                                                    <option value="" data-select2-id="select2-data-3-u838">
                                                        --هیچکدام--
                                                    </option>
                                                    @php
                                                        $i=1;
                                                    @endphp
                                                    @foreach($headerMenu as $key=>$header)
                                                        <option value="widgetLabel{{$i}}" data-select2-id="select2-data-3-u838">
                                                            {{$header}}
                                                        </option>
                                                        @php
                                                            $i++;
                                                        @endphp
                                                    @endforeach
                                                </select>
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
