@section('title','گزارشات سیستمی')

<div class="col-12 box-margin" wire:init="loadLogo">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-2">گزارشات سیستمی</h4>
            <hr>

            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                <thead>
                <tr>
                    <th>نام کاربر</th>
                    <th>موبایل کاربر</th>
                    <th>آی پی</th>
                    <th>نوع کار</th>
                    <th>شرح عملیات</th>
                    <th>تاریخ انجام</th>
                </tr>
                </thead>
                @if($readyToLoad)
                    <tbody>

                    @foreach($logs as $log)
                        <tr role="row" class="odd">
                            <td>{{$log->users->name}}</td>
                            <td>-</td>
                            <td>{{$log->ip}}</td>
                            <td>
                                @switch($log->actionType)
                                    @case('insert')
                                        <span class="badge badge-success">ایجاد</span>
                                        @break
                                    @case('delete')
                                        <span class="badge badge-danger">حذف</span>
                                        @break
                                    @case('sendSms')
                                        <span class="badge badge-info">ارسال پیامک</span>
                                        @break
                                    @case('restore')
                                        <span class="badge badge-warning">بازیابی</span>
                                        @break
                                    @case('update')
                                        <span class="badge badge-primary">ویرایش</span>
                                        @break
                                    @default
                                @endswitch
                            </td>
                            <td>{{$log->description}}</td>
                            <td>{{$log->created_at}}</td>
                        </tr>
                    @endforeach
                    {{$logs->links()}}
                    </tbody>
                @else
                    <div class="alert alert-warning">
                        در حال بارگزاری اطلاعات ...
                    </div>
                @endif
            </table>

        </div> <!-- end card body-->
    </div> <!-- end card -->
</div>

