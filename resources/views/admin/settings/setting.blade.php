@extends('admin.master')
@section('title', 'Setting')
@section('breadcrumb')
@endsection
@section('content')
    <form class="form-horizontal" action="{{ url('admin/settings', 1) }}" role="form" id="tripData" method="post"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <section class="content">
            <div class="container-fluid">

                <footer>
                    <div id="publishing-action">
                        <button type="submit" name="submit" class="btn btn-success" value="publish"> Update </button>
                    </div>
                    <div class="clearfix"></div>
                </footer>

                <div class="row">
                    <div class="col-12">
                        <!-- Custom Tabs -->
                        <div class="card">
                            <div class="card-header d-flex p-0">
                                <ul class="nav nav-pills ml-auto p4 mb10 mt10 nav-custom">
                                    <li class="nav-item active"><a class="nav-link active" href="#tab_1" data-toggle="tab">Contact Information</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab"> Social Media Links </a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab"> SEO</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        @include('admin.settings.contact')
                                    </div>
                                    <div class="tab-pane" id="tab_2">
                                        @include('admin.settings.socialMedia')
                                    </div>
                                    <div class="tab-pane" id="tab_3">
                                        @include('admin.seo.seo-form', [
                                            'seo' => $data->seo ?? null
                                        ])
                                    </div>
                                    <div class="tab-pane" id="tab_4">
                                        @include('admin.settings.flight')
                                    </div>
                                    <div class="tab-pane" id="tab_5">
                                        @include('admin.settings.usaDetails')
                                    </div>
                                    <div class="tab-pane" id="tab_6">
                                        @include('admin.settings.homeStatic')
                                    </div>
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- ./card -->
                    </div>
                    <!-- /.col -->
                </div>
            </div>
        </section>
    </form>

@endsection
@section('scripts')
    <script type="text/javascript">
        (function($) {
            $('#remove_logo').on('click', function(e) {
                e.preventDefault();
                if (confirm('Are you sure to delete??')) {
                    var csrf = $('meta[name="csrf-token"]').attr('content');
                    var id = $(this).attr('href');
                    var url = '{{ route('settings.destroy', ['setting' => ':id']) }}';

                    url = url.replace(':id', id);
                    $.ajax({
                        type: 'delete',
                        url: url,
                        data: {
                            _token: csrf
                        },
                        success: function(data) {
                            $('.logo' + id).remove();
                        },
                        error: function(data) {
                            alert('Error occurred!');
                        }
                    });
                }
            });

        }(jQuery));

        (function($) {
            $('#remove_worked_with').on('click', function(e) {
                e.preventDefault();
                if (confirm('Are you sure to delete??')) {
                    var csrf = $('meta[name="csrf-token"]').attr('content');
                    var id = $(this).attr('href');
                    var url = '{{ route('banner-destroy', ['id' => ':id']) }}';
                    // alert(url);
                    url = url.replace(':id', id);
                    $.ajax({
                        type: 'get',
                        url: url,
                        data: {
                            _token: csrf
                        },
                        success: function(data) {
                            $('.TTA1' + id).remove();
                        },
                        error: function(data) {
                            alert('Error occurred!');
                        }
                    });
                }
            });

        }(jQuery));

        (function($) {
            $('#Affiliated1').on('click', function(e) {
                e.preventDefault();
                if (confirm('Are you sure to delete??')) {
                    var csrf = $('meta[name="csrf-token"]').attr('content');
                    var id = $(this).attr('href');
                    var url = '{{ route('affiliated_destory', ['id' => ':id']) }}';
                    // alert(url);
                    url = url.replace(':id', id);
                    $.ajax({
                        type: 'get',
                        url: url,
                        data: {
                            _token: csrf
                        },
                        success: function(data) {
                            $('.Affiliated1' + id).remove();
                        },
                        error: function(data) {
                            alert('Error occurred!');
                        }
                    });
                }
            });

        }(jQuery));

        (function($) {
            $('#Affiliated2').on('click', function(e) {
                e.preventDefault();
                if (confirm('Are you sure to delete??')) {
                    var csrf = $('meta[name="csrf-token"]').attr('content');
                    var id = $(this).attr('href');
                    var url = '{{ route('affiliated_photo_destory', ['id' => ':id']) }}';
                    // alert(url);
                    url = url.replace(':id', id);
                    $.ajax({
                        type: 'get',
                        url: url,
                        data: {
                            _token: csrf
                        },
                        success: function(data) {
                            $('.Affiliated2' + id).remove();
                        },
                        error: function(data) {
                            alert('Error occurred!');
                        }
                    });
                }
            });

        }(jQuery));

        (function($) {
            $('#remove_affililiated_with').on('click', function(e) {
                e.preventDefault();
                if (confirm('Are you sure to delete??')) {
                    var csrf = $('meta[name="csrf-token"]').attr('content');
                    var id = $(this).attr('href');
                    var url = '{{ route('mob-banner-destroy', ['id' => ':id']) }}';
                    // alert(url);
                    url = url.replace(':id', id);
                    $.ajax({
                        type: 'get',
                        url: url,
                        data: {
                            _token: csrf
                        },
                        success: function(data) {
                            $('.TTA2' + id).remove();
                        },
                        error: function(data) {
                            alert('Error occurred!');
                        }
                    });
                }
            });

        }(jQuery));

        (function($) {
            $('#remove_flight').on('click', function(e) {
                e.preventDefault();
                if (confirm('Are you sure to delete??')) {
                    var csrf = $('meta[name="csrf-token"]').attr('content');
                    var id = $(this).attr('href');
                    var url = '{{ route('flight_photo_delete', ['id' => ':id']) }}';
                    // alert(url);
                    url = url.replace(':id', id);
                    $.ajax({
                        type: 'get',
                        url: url,
                        data: {
                            _token: csrf
                        },
                        success: function(data) {
                            $('.flight' + id).remove();
                        },
                        error: function(data) {
                            alert('Error occurred!');
                        }
                    });
                }
            });

        }(jQuery));
    </script>:
@endsection
