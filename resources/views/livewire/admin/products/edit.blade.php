@section('title','ایجاد محصول')
@section('styles')
    <link rel="stylesheet" href="{{asset('back/css/default-assets/datatables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('back/css/default-assets/responsive.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('back/css/default-assets/buttons.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('back/css/default-assets/select.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('back/css/default-assets/notification.css')}}">
    <link rel="stylesheet" href="{{asset('back/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('back/css/bootstrap-datepicker.min.css')}}">
@endsection

<div style="width: 100%" class="row">
    <div class="col-12 col-lg-12 box-margin height-card">
        <div class="card card-body">
            <h4 class="card-title">افزودن محصول</h4>
            <hr>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    @include('errors.error')
                    <form wire:submit.prevent="store" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleInputEmail111">عنوان فارسی محصول:</label>
                                <input wire:model="product.title" type="text" class="form-control" id="exampleInputEmail111">
                            </div>
                            <div class="form-group col-6">
                                <label for="exampleInputEmail12">عنوان انگلیسی محصول:</label>
                                <input wire:model="product.ename" type="text" class="form-control" id="exampleInputEmail111">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4" wire:ignore>
                                <label>برچسب ها</label>
                                <select id="tag_id" multiple wire:model="tag_id" class="js-example-basic-single form-control" name="" style="width: 100%;">
                                    @foreach($tags as $t)
                                        <option
                                            value="{{$t->id}}" {{in_array($t->id,$product->tags()->pluck('id')->toArray()) ? 'selected' : ''}}>
                                            {{$t->title}}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-4" wire:ignore>
                                <label>گارانتی ها</label>
                                <select wire:model="product.warranty_id" class="js-example-basic-single form-control" name="" style="width: 100%;">
                                    <option>--انتخاب گارانتی --</option>
                                    @foreach($warranties as $w)

                                        <option value="{{$w->id}}" @if($w->id == $product->warranty_id) selected @endif>{{$w->title}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-4" wire:ignore>
                                <label>رنگ ها</label>
                                <select id="color_id" multiple wire:model="color_id" class="js-example-basic-single form-control" name="" style="width: 100%;">
                                    @foreach($colors as $co)
                                        <option
                                            value="{{$co->id}}" {{in_array($co->id,$product->colors()->pluck('id')->toArray()) ? 'selected' : ''}}>
                                            {{$co->title}}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-3 mt-20">
                                <label for="exampleInputEmail12">دسته بندی سطح 1:</label>
                                <select wire:model="product.level1_id" class="js-example-basic-single form-control" name="" style="width: 100%;">
                                    @foreach($categories as $cat)
                                        <option {{$cat->id == $product->level1_id ? 'selected' : ''}} value="{{$cat->id}}">{{$cat->title}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group col-3 mt-20">
                                <label for="exampleInputEmail12">دسته بندی سطح 2:</label>
                                <select wire:model="product.level2_id" class="js-example-basic-single form-control" name="" style="width: 100%;">
                                    @foreach($sub as $s)
                                        <option {{$s->id == $product->level2_id}} value="{{$s->id}}">{{$s->title}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group col-3 mt-20">
                                <label for="exampleInputEmail12">دسته بندی سطح 3:</label>
                                <select wire:model="product.level3_id" class="js-example-basic-single form-control" name="" style="width: 100%;">
                                    @foreach($child as $c)
                                        <option {{$c->id == $product->level3_id ? 'selected' : ''}} value="{{$c->id}}">{{$c->title}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group col-3 mt-20">
                                <label for="exampleInputEmail12">برند محصول:</label>
                                <select wire:model="product.brand_id" class="js-example-basic-single form-control" name="" style="width: 100%;">
                                    <option>-- انتخاب برند --</option>
                                    @foreach($brands as $b)
                                        <option {{$b->id == $product->brand_id ? 'selected' : ''}} value="{{$b->id}}">{{$b->title}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail111">توضیحات کوتاه:</label>
                            <textarea wire:model="product.description" class="form-control" rows="5" id="exampleInputEmail111"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail111">توضیحات کامل:</label>
                            <textarea wire:model="product.body" class="form-control" rows="10" id="exampleInputEmail111"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-3 mt-20">
                                <label for="exampleInputEmail111">قیمت محصول:</label>
                                <input wire:model="product.price" type="text" class="form-control" id="exampleInputEmail111">
                            </div>
                            <div class="col-3 mt-20">
                                <label for="exampleInputEmail111">قیمت با تخفیف:</label>
                                <input wire:model="product.discount_price" type="text" class="form-control" id="exampleInputEmail111">
                            </div>
                            <div class="col-3 mt-20">
                                <label for="exampleInputEmail111">موجودی انبار:</label>
                                <input wire:model="product.count" type="text" class="form-control" id="exampleInputEmail111">
                            </div>
                            <div class="col-3 mt-20">
                                <label for="exampleInputEmail111">وزن محصول:</label>
                                <input wire:model="product.weight" type="text" class="form-control" id="exampleInputEmail111">
                            </div>
                            <div class="col-3 mt-20">
                                <label for="exampleInputEmail111">حداکثر سفارش:</label>
                                <input wire:model="product.orderMax" type="text" class="form-control" id="exampleInputEmail111">
                            </div>
                            <div class="col-3 mt-20">
                                <label for="exampleInputEmail111">حداکثر سفارش:</label>
                                <input wire:model="product.orderMin" type="text" class="form-control" id="exampleInputEmail111">
                            </div>
                            <div class="col-3 mt-20 form-group ">
                                <div class="form-group" style="margin-top: 28px">
                                    <div class="input-group cust-file-button mb-3">
                                        <div class="custom-file">
                                            <input type="file" wire:model.lazy="image"
                                                   class="custom-file-input form-control" id="inputGroupFile03">
                                            <label class="custom-file-label" for="inputGroupFile03">تصویر
                                                پروفایل</label>
                                            <span class="text-info" wire:target='image' wire:loading>درحال
                                                        بارگزاری...</span>
                                        </div>
                                    </div>
                                    <div wire:ignore  id="progressbar" style="display: none" class="progress mb-20">
                                        <div  class="progress-bar progress-bar-striped"
                                              role="progressbar" style="width: 0%;"
                                              aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                    </div>
                                    @if($product->image)
                                        <img style="width: 100px;" src="{{asset($product->image)}}" class="form-control">



                                    @endif

                                    @if($image)
                                        <img style="width: 100px;" src="{{$image->temporaryUrl()}}" class="form-control">
                                    @endif

                                </div>
                            </div>
                            <div class="col-1 mt-20 form-group ">
                                <div class="custom-control custom-checkbox mr-sm-2 form-group" style="margin-top: 30px">
                                    <input wire:model="product.isActive" type="checkbox" class="custom-control-input" checked id="checkbox2">
                                    <label class="custom-control-label" for="checkbox2">فعال</label>
                                </div>
                            </div>
                            <div class="col-2 mt-20 form-group ">
                                <div class="custom-control custom-checkbox mr-sm-2" style="margin-top: 30px">
                                    <input wire:model="product.special" type="checkbox" class="custom-control-input" id="checkbox1">
                                    <label class="custom-control-label" for="checkbox1">محصول ویژه</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-success mb-2 mr-2" style="float:left;"><i class="fa fa-save"></i> ذخیره</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@section('scripts')
    <script src="{{asset('back/plugins/select2/js/select2.full.min.js')}}"></script>
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
    <script>
        $(document).ready(function () {
            $('#tag_id').select2();
            $('#tag_id').on('change', function (e) {
                let data = $(this).val();
            @this.set('tag_id', data);
            });
            window.livewire.on('store', () => {
                $('#tag_id').select2();

            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#color_id').select2();
            $('#color_id').on('change', function (e) {
                let data = $(this).val();
            @this.set('color_id', data);
            });
            window.livewire.on('store', () => {
                $('#color_id').select2();

            });
        });
    </script>
@endsection
