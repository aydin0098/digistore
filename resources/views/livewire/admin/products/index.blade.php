@section('title','لیست محصولات')
@section('styles')
    <link rel="stylesheet" href="{{asset('back/plugins/select2/css/select2.min.css')}}">
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice__display {
            color: #2f2f2f !important;
        }
    </style>
@endsection


<div style="width: 100%;" class="row">
    <div class="col-12 col-lg-12 box-margin" wire:init="loadLogo">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-2">لیست محصولات</h4>

                <a href="{{ route('admin.products.trashed') }}" type="button"
                   class="btn btn-danger mb-2 mr-2" style="float:left;margin-top:-37px;"><i
                        class="fa fa-trash"></i> سطل زباله <span class="badge badge-danger">
                                                {{ \App\Models\Admin\products\Product::onlyTrashed()->count() }}
                                            </span></a>

                <a href="{{ route('admin.products.create') }}" type="button"
                   class="btn btn-success mb-2 mr-2" style="float:left;margin-top:-37px;"><i
                        class="fa fa-plus"></i> افزودن محصول </a>

                {{-- <button type="button" class="btn btn-primary mb-2 mr-2"
                    style="float:left;margin-top:-37px;"><i class="fa fa-file-excel-o"></i> خروجی
                    اکسل</button> --}}
                <hr>
                <input wire:model="search" type="search" class="form-control mb-2 w-50 float-left"
                       placeholder="جستجو...">

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
                                        <a wire:click="changeSpecial({{ $product->id }})"
                                           style="cursor:pointer"><span
                                                class="badge badge-success">بله</span></a>
                                    @else
                                        <a wire:click="changeSpecial({{ $product->id }})"
                                           style="cursor:pointer"><span
                                                class="badge badge-danger">خیر</span></a>
                                    @endif



                                </td>
                                <td>

                                    @if ($product->isActive == 1)
                                        <a wire:click="changeStatus({{ $product->id }})"
                                           style="cursor:pointer"><span
                                                class="badge badge-success">فعال</span></a>
                                    @else
                                        <a wire:click="changeStatus({{ $product->id }})"
                                           style="cursor:pointer"><span
                                                class="badge badge-danger">غیرفعال</span></a>
                                    @endif



                                </td>
                                <td>

                                    <a href="{{route('admin.products.edit',$product->id)}}"
                                       class="action-icon"> <i
                                            class="zmdi zmdi-edit zmdi-custom"></i></a>



                                    <button wire:click="deleteId({{ $product->id }})"
                                            data-toggle="modal" data-target="#exampleModal"
                                            class="action-icon"> <i
                                            class="zmdi zmdi-delete zmdi-custom"></i></button>
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

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
    @include('livewire.admin.include.modal')
</div>



<!-- end row-->


