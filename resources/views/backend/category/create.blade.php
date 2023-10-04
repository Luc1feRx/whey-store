@extends('backend.layouts.master')

@section('title') Thêm mới danh mục @stop

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Advanced Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Advanced Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Select2 (Default Theme)</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: block;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Minimal</label>
                                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                    data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option selected="selected" data-select2-id="3">Alabama</option>
                                    <option>Alaska</option>
                                    <option>California</option>
                                    <option>Delaware</option>
                                    <option>Tennessee</option>
                                    <option>Texas</option>
                                    <option>Washington</option>
                                </select><span class="select2 select2-container select2-container--default" dir="ltr"
                                    data-select2-id="2" style="width: 100%;"><span class="selection"><span
                                            class="select2-selection select2-selection--single" role="combobox"
                                            aria-haspopup="true" aria-expanded="false" tabindex="0"
                                            aria-disabled="false" aria-labelledby="select2-429t-container"><span
                                                class="select2-selection__rendered" id="select2-429t-container"
                                                role="textbox" aria-readonly="true" title="Alabama">Alabama</span><span
                                                class="select2-selection__arrow" role="presentation"><b
                                                    role="presentation"></b></span></span></span><span
                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Disabled</label>
                                <select class="form-control select2 select2-hidden-accessible" disabled=""
                                    style="width: 100%;" data-select2-id="4" tabindex="-1" aria-hidden="true">
                                    <option selected="selected" data-select2-id="6">Alabama</option>
                                    <option>Alaska</option>
                                    <option>California</option>
                                    <option>Delaware</option>
                                    <option>Tennessee</option>
                                    <option>Texas</option>
                                    <option>Washington</option>
                                </select><span
                                    class="select2 select2-container select2-container--default select2-container--disabled"
                                    dir="ltr" data-select2-id="5" style="width: 100%;"><span class="selection"><span
                                            class="select2-selection select2-selection--single" role="combobox"
                                            aria-haspopup="true" aria-expanded="false" tabindex="-1"
                                            aria-disabled="true" aria-labelledby="select2-h5ko-container"><span
                                                class="select2-selection__rendered" id="select2-h5ko-container"
                                                role="textbox" aria-readonly="true" title="Alabama">Alabama</span><span
                                                class="select2-selection__arrow" role="presentation"><b
                                                    role="presentation"></b></span></span></span><span
                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6" data-select2-id="30">
                            <div class="form-group">
                                <label>Multiple</label>
                                <select class="select2 select2-hidden-accessible" multiple=""
                                    data-placeholder="Select a State" style="width: 100%;" data-select2-id="7"
                                    tabindex="-1" aria-hidden="true">
                                    <option>Alabama</option>
                                    <option>Alaska</option>
                                    <option>California</option>
                                    <option>Delaware</option>
                                    <option>Tennessee</option>
                                    <option>Texas</option>
                                    <option>Washington</option>
                                </select><span class="select2 select2-container select2-container--default" dir="ltr"
                                    data-select2-id="8" style="width: 100%;"><span class="selection"><span
                                            class="select2-selection select2-selection--multiple" role="combobox"
                                            aria-haspopup="true" aria-expanded="false" tabindex="-1"
                                            aria-disabled="false">
                                            <ul class="select2-selection__rendered">
                                                <li class="select2-search select2-search--inline"><input
                                                        class="select2-search__field" type="search" tabindex="0"
                                                        autocomplete="off" autocorrect="off" autocapitalize="none"
                                                        spellcheck="false" role="searchbox" aria-autocomplete="list"
                                                        placeholder="Select a State" style="width: 769.5px;"></li>
                                            </ul>
                                        </span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group" data-select2-id="29">
                                <label>Disabled Result</label>
                                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                    data-select2-id="9" tabindex="-1" aria-hidden="true">
                                    <option selected="selected" data-select2-id="11">Alabama</option>
                                    <option data-select2-id="35">Alaska</option>
                                    <option disabled="disabled" data-select2-id="36">California (disabled)</option>
                                    <option data-select2-id="37">Delaware</option>
                                    <option data-select2-id="38">Tennessee</option>
                                    <option data-select2-id="39">Texas</option>
                                    <option data-select2-id="40">Washington</option>
                                </select><span
                                    class="select2 select2-container select2-container--default select2-container--below"
                                    dir="ltr" data-select2-id="10" style="width: 100%;"><span class="selection"><span
                                            class="select2-selection select2-selection--single" role="combobox"
                                            aria-haspopup="true" aria-expanded="false" tabindex="0"
                                            aria-disabled="false" aria-labelledby="select2-rmqw-container"><span
                                                class="select2-selection__rendered" id="select2-rmqw-container"
                                                role="textbox" aria-readonly="true" title="Alabama">Alabama</span><span
                                                class="select2-selection__arrow" role="presentation"><b
                                                    role="presentation"></b></span></span></span><span
                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <h5>Custom Color Variants</h5>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Minimal (.select2-danger)</label>
                                <select class="form-control select2 select2-danger select2-hidden-accessible"
                                    data-dropdown-css-class="select2-danger" style="width: 100%;" data-select2-id="12"
                                    tabindex="-1" aria-hidden="true">
                                    <option selected="selected" data-select2-id="14">Alabama</option>
                                    <option>Alaska</option>
                                    <option>California</option>
                                    <option>Delaware</option>
                                    <option>Tennessee</option>
                                    <option>Texas</option>
                                    <option>Washington</option>
                                </select><span class="select2 select2-container select2-container--default" dir="ltr"
                                    data-select2-id="13" style="width: 100%;"><span class="selection"><span
                                            class="select2-selection select2-selection--single" role="combobox"
                                            aria-haspopup="true" aria-expanded="false" tabindex="0"
                                            aria-disabled="false" aria-labelledby="select2-jteb-container"><span
                                                class="select2-selection__rendered" id="select2-jteb-container"
                                                role="textbox" aria-readonly="true" title="Alabama">Alabama</span><span
                                                class="select2-selection__arrow" role="presentation"><b
                                                    role="presentation"></b></span></span></span><span
                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Multiple (.select2-purple)</label>
                                <div class="select2-purple">
                                    <select class="select2 select2-hidden-accessible" multiple=""
                                        data-placeholder="Select a State" data-dropdown-css-class="select2-purple"
                                        style="width: 100%;" data-select2-id="15" tabindex="-1" aria-hidden="true">
                                        <option>Alabama</option>
                                        <option>Alaska</option>
                                        <option>California</option>
                                        <option>Delaware</option>
                                        <option>Tennessee</option>
                                        <option>Texas</option>
                                        <option>Washington</option>
                                    </select><span class="select2 select2-container select2-container--default"
                                        dir="ltr" data-select2-id="16" style="width: 100%;"><span
                                            class="selection"><span
                                                class="select2-selection select2-selection--multiple" role="combobox"
                                                aria-haspopup="true" aria-expanded="false" tabindex="-1"
                                                aria-disabled="false">
                                                <ul class="select2-selection__rendered">
                                                    <li class="select2-search select2-search--inline"><input
                                                            class="select2-search__field" type="search" tabindex="0"
                                                            autocomplete="off" autocorrect="off" autocapitalize="none"
                                                            spellcheck="false" role="searchbox" aria-autocomplete="list"
                                                            placeholder="Select a State" style="width: 769.5px;"></li>
                                                </ul>
                                            </span></span><span class="dropdown-wrapper"
                                            aria-hidden="true"></span></span>
                                </div>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer" style="display: block;">
                    Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and
                    information
                    about
                    the plugin.
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection