@section('title','لوگو های فوتر')
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

                   <div class="row">
                    <div class="col-xl-4 box-margin height-card">
                        <div class="card card-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form>
                                        <div class="form-group">
                                            <label for="exampleInputEmail111">عنوان لوگو:</label>
                                            <input type="text" class="form-control" id="exampleInputEmail111">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail12">جایگاه لوگو:</label>
                                            <select class="js-example-basic-single form-control select2-hidden-accessible" name="" style="width: 100%;" data-select2-id="select2-data-1-xnu8" tabindex="-1" aria-hidden="true">
                                                <option value="top" data-select2-id="select2-data-3-u838">لوگوی بالای فوتر</option>
                                                <option value="bottom" data-select2-id="select2-data-3-u838">لوگوی پایین فوتر</option>
                                              </select>
                                        </div>
                                        <div class="checkbox checkbox-primary d-inline">
                                            <input type="checkbox" name="isActive" id="checkbox-p-1" checked="">
                                            <label for="checkbox-p-1" class="cr">فعال</label>
                                        </div>
                                        <button wire:click='update()' type="submit" class="btn btn-outline-success mb-2 mr-2" style="float:left;">
                                            <i class="fa fa-save"></i> ذخیره
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-8 box-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-2">لیست لوگوها</h4>
                                <button type="button" class="btn btn-danger mb-2 mr-2" style="float:left;margin-top:-37px;"><i class="fa fa-refresh"></i> سطل زباله</button>
                                <button type="button" class="btn btn-primary mb-2 mr-2" style="float:left;margin-top:-37px;"><i class="fa fa-file-excel-o"></i> خروجی اکسل</button>
                                <hr>
                            </div>
                            <div class="col-sm-12 col-md-6"><div id="datatable-buttons_filter" class="dataTables_filter">
                                <label class="d-flex">جستجو:
                                    <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="datatable-buttons">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info" style="width: 686px;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc">تصویر</th>
                                            <th class="sorting">عنوان لوگو</th>
                                            <th class="sorting">جایگاه</th>
                                            <th class="sorting">وضعیت</th>
                                            <th class="sorting">عملیات</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                    <tr role="row" class="odd">
                                            <td tabindex="0" class="sorting_1">نام کاربری</td>
                                            <td>سیستم</td>
                                            <td>شرکت</td>
                                            <td>35</td>
                                            <td>
                                                <a href="javascript:void(0);" class="action-icon">
                                                 <i class="zmdi zmdi-edit zmdi-custom"></i>
                                                </a>
                                                <a href="javascript:void(0);" class="action-icon">
                                                     <i class="zmdi zmdi-delete zmdi-custom"></i>
                                                </a>
                                            </td>
                                        </tr></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

               </div> <!-- end card body-->
                    </div> <!-- end card -->
                    </div>
                   </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
