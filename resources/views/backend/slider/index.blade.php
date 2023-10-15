@extends('backend.layouts.master')

@section('title') Quản lý slider @stop

@section('content')
    @if (count($sliders) <= 0) @include('backend.partials.noData')
    @else
        <div class="content-wrapper">
            <section class="content">
                <section class="content-header">
                    <div class="container-fluid">

                        <div class="col-xs-12">
                            <div class="table-configuration-wrap">
                                <span class="configuration-close-btn btn-show-table-options"><i class="fa fa-times"></i></span>
                                <div class="wrapper-filter">
                                    <form action="" method="GET">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" name="keyword" class="form-control" id="keyword" placeholder="{{ __('admin::messages.doctor.search_reviewScheduleDoctor') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <select name="doctor_id" class="form-control" id="doctor_id">

                                                    </select>
                                                    <input id="input-avatar" type="hidden" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <select name="specialty_id" id="specialty_id" class="form-control">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <select name="deleted_at" class="form-control">
                                                        <option value="">{{ __('admin::messages.doctor.select_deleted_at') }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <select name="approval" class="form-control">
                                                        <option value="">{{ __('admin::messages.doctor.select_approval') }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class='input-group date' id='time-from'>
                                                        <input type='text' name="from" class="form-control" placeholder="{{ __('admin::messages.doctor.search_time-from') }}" />
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class='input-group date' id='time-to'>
                                                        <input type='text' name="to" class="form-control" placeholder="{{ __('admin::messages.doctor.search_time-to') }}" />
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-info btn-search">
                                                        <i class="fa fa-search"></i> {{ __('admin::messages.common.search') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Simple Tables</h1>
                            </div>
                            <div class="col-sm-6">
                                @include('backend.partials.breadcrumb', [
                                    'breadcrumb' => [['title' => 'Danh sách slider', 'url' => '#']],
                                ])
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <a href="{{ route('admin.sliders.create') }}" class="btn btn-info">Thêm mới slider</a>

                                    <form class="card-tools" action="" method="GET">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="keyword" class="form-control float-right"
                                                placeholder="Search">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover table-bordered text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tên slider</th>
                                                <th>Slug</th>
                                                <th>Ảnh</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sliders as $slider)
                                                <tr>
                                                    <td>{{ $slider->id }}</td>
                                                    <td>{{ $slider->name }}</td>
                                                    <td>{{ $slider->slug }}</td>
                                                    <td>
                                                        <img style="width: 300px;" src="{{ asset('storage/'.$slider->thumbnail) }}" alt="" srcset="">
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.sliders.edit', ['id'=>$slider->id]) }}" class="btn btn-icon btn-sm tip"><i
                                                                class="fas fa-pencil-alt"></i></a>
                                                        <a data-id="{{ $slider->id }}" data-image="{{ $slider->thumbnail }}" class="btn btn-icon btn-sm deleteDialog tip "
                                                            data-toggle="tooltip" title=""><i
                                                                class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="card-footer clearfix">
                                        {!! $sliders->links('pagination::bootstrap-4') !!}
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endif
@endsection

@section('addJs')
    @if (session('success'))
        @include('backend.layouts.toastr')
    @endif
    <script type="text/javascript">
        var data_model = 'slider';
        $(document).ready(function () {
            $('.deleteDialog').on('click', function () {
                var data_id = $(this).data('id');
                var data_thumbnail = $(this).data('image');
                destroy(data_id, data_model, '{{ route('admin.ajax.destroy') }}', 'Bạn đã chắc chắn chưa?', null, false, data_thumbnail);
            });
        });
    </script>
    @include('backend.slider.script')
@endsection
