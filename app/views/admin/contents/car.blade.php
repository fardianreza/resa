@extends('admin.layouts.index')
@section('content')
<script>
    $(document).ready(function() {

        $('#loc-tab a[href="#cars"]').tab('show');
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
            $('#calendar').fullCalendar('destroy');
            $('#calendar').fullCalendar({
            disableDragging: true,
                    header: {
                    left: 'prev,next',
                            center: 'title',
                            right: 'month,agendaWeek,agendaDay'
                    },
                    editable: false,
                    events: {{ $telo }},
        });
    });
    });
</script>
<div class="container">
    <!-- Breadcrumbs line -->
    <div class="crumbs">
        <ul id="breadcrumbs" class="breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="index.html">Dashboard</a>
            </li>
            <li class="current">
                <a href="pages_calendar.html" title="">Office Locations</a>
            </li>
        </ul>
    </div>
    <!-- /Breadcrumbs line -->

    <!--=== Page Header ===-->
    <div class="page-header">
        <div class="page-title">
            <h3>Mobil Inventory</h3>
        </div>
    </div>
    <!-- /Page Header -->

    <!--=== Page Content ===-->
    <!--=== Box Tabs ===-->
    <div class="row">
        <div class="col-md-12">
            <div class="tabbable tabbable-custom tabbable-full-width">
                <ul class="nav nav-tabs" id="loc-tab">
                    <li><a href="#cars" data-toggle="tab" >Mobil</a></li>
                    <li><a href="#car-new" data-toggle="tab">Tambah Mobil</a></li>
                    

                </ul>
                <div class="tab-content" id="loc-content">
                    <div class="tab-pane active" id="cars">
                        <div class="alert alert-info">
                            <strong>Daftar Mobil </strong>
                            </div>
                        <button type="submit" class="btn btn-primary" id="save-car">Save Change</button>
                        <br/>
                        <br/>
                        <?php
                        $type = Datatable::table()
                                ->addColumn('Delete', 'Nomor Polisi', 'Merk/Model', 'Lokasi', 'Action')       // these are the column headings to be shown
                                ->setUrl(route('api.car'))   // this is the route where data will be retrieved
                                ->noScript();
                        ?> 
                        {{ $type->render('admin.template.template-type') }} {{ $type->script('admin.template.javascript'); }}
                    </div>
                    <div class="tab-pane" id="car-new">
                        @section('new')
                        @include('admin.contents.car-new',$selectbox)
                        @show
                    </div>
                    <div class="tab-pane" id="avail">
                        <div class="col-md-12">
                            <div class="widget">
                                <div class="widget-header">
                                    <h4><i class="icon-calendar"></i> Calendar</h4>
                                </div>
                                <div class="widget-content">
                                    <div id="calendar"></div>
                                </div>
                            </div> <!-- /.widget box -->
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- /.col-md-12 -->
    </div> <!-- /.row -->
    <!-- /Box Tabs -->
    <!-- /Page Content -->
</div>
@endsection