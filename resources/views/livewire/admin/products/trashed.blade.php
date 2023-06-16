@section('title','سطل زباله محصولات')

<div class="col-12 box-margin" wire:init="loadLogo" >
    <div class="card">
        <div class="card-body pb-0">
            <div class="">
                <div class="">
                    <div class="row">
                        <div class="col-12 col-lg-12 box-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-2">سطل زباله محصولات</h4>
                                    <hr>
                                </div>
                                <div class="col-sm-12">
                                    <div id="datatable-buttons_filter" class="dataTables_filter">
                                        <div class="form-group">
                                            <input wire:model="search" type="search" class="form-control mb-2 w-40" placeholder="جستجو...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap"
                                           style="width:102%" wire:init='loadLogo'>
                                        <thead>
                                        <tr>
                                            <th>نام محصول</th>
                                            <th>مبلغ</th>
                                            <th>مبلغ با تخفیف</th>
                                            <th>مشاهده محصول</th>
                                            <th>محصول ویژه</th>
                                            <th>وضعیت</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>

                                        @if ($readyToLoad)
                                            <tbody>
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td>{{$product->title}}</td>
                                                    <td>{{$product->price}}</td>
                                                    <td>{{$product->discount_price}}</td>
                                                    <td>{{$product->viewCount}}</td>
                                                    <td>

                                                        @if ($product->special == 1)
                                                            <a
                                                               style="cursor:pointer"><span
                                                                    class="badge badge-success">بله</span></a>
                                                        @else
                                                            <a
                                                               style="cursor:pointer"><span
                                                                    class="badge badge-danger">خیر</span></a>
                                                        @endif



                                                    </td>
                                                    <td>
                                                        <a title="بازیابی" wire:click="restore({{$product->id}})"
                                                           href="#"
                                                           class="action-icon">
                                                            <i class="zmdi zmdi-refresh zmdi-custom"></i>
                                                        </a>
                                                        <a href="javascript:void(0);"
                                                           wire:click="deleteId({{$product->id}})"
                                                           data-toggle="modal"
                                                           data-target="#exampleModal"
                                                           class="action-icon">
                                                            <i class="zmdi zmdi-delete zmdi-custom"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            {{ $products->links() }}
                                        @else
                                            <div class="alert alert-warning">
                                                در حال بارگزاری اطلاعات ....
                                            </div>
                                        @endif
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> <!-- end card body-->
                @include('livewire.admin.include.modal')
            </div> <!-- end card -->
        </div>
    </div>
</div>
