<div class="col-xs-12" id="collapseExample">
    <div class="table-configuration-wrap">
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