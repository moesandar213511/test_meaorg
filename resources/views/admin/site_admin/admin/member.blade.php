@extends('admin.layouts.site_admin.site_admin_design')
@section('title','Admin | Member')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
      
        .imagePreview {
            width: 100%;
            height: 150px;
            background-position: center center;
            background:url('http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg');
            background-color:#fff;
            background-size: cover;
            background-repeat:no-repeat;
            display: inline-block;
            /* box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2); */
        }
        .upload_btn
        {
            display:block;
            border-radius:10px;
            /* box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2); */
            margin-bottom: 15px;
        }
        .imgUp
        {
            margin-bottom:15px;
        }
    </style>
@endsection

@section('nav_bar_text')
    Member Account
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
{{--                           <h5> Member List</h5>--}}
                            <button type="button" name="button" class="btn btn-success pull-right" data-target="#modalBox" data-toggle="modal" data-keyboard="false" data-backdrop="static">Add</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="datatable">
                                    <thead class="text-primary">
                                    <th width="8%">
                                        No
                                    </th>
                                    <th width="18%">
                                        Name
                                    </th>
                                    <th width="20%">
                                        Phone
                                    </th>
                                    <th width="30%">
                                        Position
                                    </th>
                                    <th width="30%">Action</th>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- insert_model --}}
        <div class="modal fade" id="modalBox">
            <div class="modal-dialog modal-md" style="max-width:800px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create New Member</h4>
                        <button data-dismiss="modal" class="close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="insert_member" enctype="multipart/form-data" class="md-form">
                            {{csrf_field()}}
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <img src="{{asset('images/default.jpg')}}" id="image" class="imagePreview img-thumbnail" style="width:200px!important">

                                        <label class="btn btn-primary upload_btn" style="width:200px;">
                                        Upload<input type="file" accept="image/png,image/jpeg,image/jpg" onchange="displaySelectedPhoto('upload_photo','image')" id="upload_photo" class="uploadFile img" value="Upload Photo" name="photo" style="width: 0px;height: 0px;overflow: hidden;" required>
                                    </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                         <input type="phone" name="phone" class="form-control" id="phone" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="position">Position</label>
                                         <input type="text" name="position" class="form-control" id="position" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="c_password">Confirm Password</label>
                                        <input type="password" name="c_password" id="c_password" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address
                                            "><b>Address</b></label><br>
                                        <textarea  rows="2" name="address" class="form-control" id="address" required></textarea>
                                    </div>
                                </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="education"><b>Education</b></label><br>
                                        <input type="text" name="education" id="education" class="form-control" required>
                                    </div>
                                </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="detail
                                            "><b>Detail</b></label><br>
                                        <textarea id="detail" name="detail" rows="2" class="form-control" required></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="fb_link
                                            "><b>Facebook</b></label><br>
                                        <input type="text" name="fb_link" id="fb_link" class="form-control">
                                    </div>
                                </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="tw_link
                                            "><b>Twitter</b></label><br>
                                        <input type="text" name="tw_link" id="tw_link" class="form-control">
                                    </div>
                                </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="in_link
                                            "><b>Instagram</b></label><br>
                                        <input type="text" name="in_link" id="in_link" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Create</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- edit modal -->
        <div class="modal fade" id="edit_modalBox">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Member Data</h4>
                        <button data-dismiss="modal" class="close">&times;</button>
                    </div>
                    <div class="modal-body">

                         <form id="update_member">
                            {{csrf_field()}}
                            <input type="hidden" name="id" id="id_edit">
                              <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <img src="{{asset('images/default.jpg')}}" id="imgs" class="imagePreview img-thumbnail">
                                        <label class="btn btn-primary upload_btn">
                                        Upload<input type="file" accept="image/png,image/jpeg,image/jpg" onchange="displaySelectedPhoto('upload_img','imgs')" id="upload_img" name="photo" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                    </label>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_name">Name</label>
                                        <input type="text" name="name" class="form-control" id="update_name" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_phone">Phone</label>
                                         <input type="phone" name="phone" class="form-control" id="update_phone" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_position">Position</label>
                                         <input type="text" name="position" class="form-control" id="update_position" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_address
                                            "><b>Address</b></label><br>
                                        <textarea rows="2" name="address" class="form-control" id="update_address" required></textarea>
                                    </div>
                                </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_education"><b>Education</b></label><br>
                                        <input type="text" name="education" id="update_education" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_detail"><b>Detail</b></label><br>
                                        <textarea id="update_detail" name="detail" rows="2" class="form-control" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_fb_link
                                            "><b>Facebook</b></label><br>
                                        <input type="text" name="fb_link" id="update_fb_link" class="form-control">
                                    </div>
                                </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_tw_link
                                            "><b>Twitter</b></label><br>
                                        <input type="text" name="tw_link" id="update_tw_link" class="form-control">
                                    </div>
                                </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_in_link
                                            "><b>Instagram</b></label><br>
                                        <input type="text" name="in_link" id="update_in_link" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Update</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('js')
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function(){
            var t = $('#datatable').DataTable();

            $('#insert_member').on('submit',function(e){
                e.preventDefault();
                var alldata = new FormData(this);
                $.ajax({
                    type : "post",
                    url : "{{url('admin/insert_member')}}",
                    data : alldata,
                    cache : false,
                    processData : false,
                    contentType : false,
                    success : function(data){
                        toastr.success('Create Member Account Successful');
                        $('#modalBox').modal('hide');
                        load();
                    }
                });
            });

            load();
            function load(){
                $.ajax({
                    type : "GET",
                    url : "{{ url('/admin/get_all_member') }}",
                    cache : false,
                    success : function (data){
                       var data_return = JSON.parse(data);
                       t.clear();
                       console.log(data_return);
                       for(var i = 0; i < data_return.length; i++){
                         t.row.add([
                            data_return[i]['id'],
                            data_return[i]['name'],
                            data_return[i]['phone'],
                            data_return[i]['position'],
                            '<button class="btn btn-info btn-sm" onclick="edit_data('+data_return[i]['id']+')" data-toggle="modal" data-target="#edit_modalBox" data-keyboard="false" data-backdrop="static">Edit</button>'+
                            '<button class="btn btn-danger btn-sm" onclick="delete_data('+data_return[i]['id']+')">Delete</button>'
                         ]).draw(false);
                       }
                       $('#insert_member')[0].reset();
                    }
                });
            }
            
            edit_data = function(id){
                $.ajax({
                    type : "get",
                    url : "./edit_member/"+id,
                    cache : false,
                    success : function (data) {
                        var string = JSON.parse(data);
                        $('#id_edit').val(string['id']);
                        $('#update_name').val(string['name']);
                        $('#update_phone').val(string['phone']);
                        $('#update_position').val(string['position']);
                        $('#update_address').val(string['address']);
                        $('#update_education').val(string['education']);
                        $('#update_detail').val(string['detail']);
                        $('#imgs').attr('src',string['photo_url']);
                        $('#update_fb_link').val(string['fb_link']);
                        $('#update_tw_link').val(string['tw_link']);
                        $('#update_in_link').val(string['in_link']);
                        $('#edit_modalBox').modal('show');
                    }

                });
            }

            $('#update_member').on('submit',function(e){
                e.preventDefault();
                var alldata = new FormData(this);
                $.ajax({
                    type : "post",
                    url : "{{url('admin/update_member')}}",
                    data : alldata,
                    cache : false,
                    processData : false,
                    contentType : false,
                    success : function(data){
                        toastr.success('Update data successful');
                        $('#edit_modalBox').modal('hide');
                        load();
                    }
                });
            });

            delete_data = function(id){
                var delete_url = "{{url('/delete_member')}}/"+id;
                var url = "{{url('/member/count_company')}}/"+id;
                $.ajax({
                    url : url,
                    type : "get",
                    cache : false,
                    success : function (response) {
                        var string = JSON.parse(response);
                        if(confirm("This member has "+string+" company. Are u sure you want to delete") == true){
                        $.ajax({
                            type : "post",
                            url : delete_url,
                            cache : false,
                            success : function (data) {
                                toastr.success('Delete Data Successful');
                                load();
                            }
                        }).fail(function(error){
                            console.log(error);
                        });
                    }

                    }
                }).fail(function(error){
                    console.log(error);
                });
            }

        });
    </script>
@endsection
