@section('title','سطل زباله دسته بندی ها')
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
                <h4 class="card-title mb-2">لیست دسته بندی ها</h4>

                <hr>
                <input wire:model="search" type="search" class="form-control mb-2 w-50 float-left"
                       placeholder="جستجو...">

                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap"
                       style="width:102%" wire:init='loadLogo'>
                    <thead>
                    <tr>
                        <th>نام دسته بندی</th>
                        <th>دسته مادر</th>
                        <th>سطح</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>

                    @if ($readyToLoad)
                        <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->title }}</td>
                                <td>{{ isset($category->parent->title) ? $category->parent->title : '-' }}
                                </td>
                                <td>سطح {{ $category->level }}</td>

                                <td>



                                    <button wire:click="deleteId({{ $category->id }})"
                                            data-toggle="modal" data-target="#exampleModal"
                                            class="action-icon"> <i
                                            class="zmdi zmdi-delete zmdi-custom"></i></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        {{ $categories->links() }}
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






@section('scripts')

    <script src="{{asset('back/js/MaxLength.min.js')}}"></script>

    <script>
        $(document).ready(function() {

            //Specifying the Character Count control explicitly
            $("#meta-title").MaxLength({
                MaxLength: 60,
                CharacterCountControl: $('#counter1')
            });
            $("#meta-description").MaxLength({
                MaxLength: 160,
                CharacterCountControl: $('#counter2')
            });

        });
    </script>

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

