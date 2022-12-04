@include('admin.layout._header')
@include('admin.layout._sidebar')
<div id="page-wrapper">
    <div class="container-fluid">
        @include('admin.layout.breadcrumb')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-wrapper collapse in" aria-expanded="true">
                        <div class="panel-body">
                            <!--<div class="view-details-section-ueser">-->
                            <form class="form-horizontal" role="form">

                                <div class="form-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover">
                                            <tbody>
                                            <tr>
                                                <th style="width: 15%;">Area Name</th>
                                                <td style="width: 25%;">{{isset($arr_data['area_name']) ? ucfirst($arr_data['area_name']) :'NA'}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th style="width: 15%;">Location List</th>
                                                <td style="width: 25%;">{{isset($arr_data['location_list']) ? ucfirst($arr_data['location_list']) :'NA'}}
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </form>
                            <div class="form-group">
                                <a href="{{ $module_url_path }}"  class="fcbtn btn btn-primary btn-outline btn-1e">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    @include('admin.layout._footer')


