@extends('admin.layouts.site_admin.site_admin_design')
@section('title','Admin | Sub Category')
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
    Category
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
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
                                        Logo
                                    </th>
                                    <th width="18%">
                                        Name
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
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create New Category</h4>
                        <button data-dismiss="modal" class="close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="insert_category" enctype="multipart/form-data" class="md-form">
                            {{csrf_field()}}
                              <div class="row">
                                <div class="col-sm-4 imgUp">
                                    <img src="{{asset('images/default.jpg')}}" id="image" class="imagePreview img-thumbnail">
                                    <label class="btn btn-primary upload_btn">
                                        Upload<input type="file" accept="image/png,image/jpeg,image/jpg" onchange="displaySelectedPhoto('upload_photo','image')" id="upload_photo" name="logo" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;" required>
                                    </label>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" id="name" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right" id="btn_submit">Create</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- edit modal -->
        <div class="modal fade" id="edit_modalBox">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Category</h4>
                        <button data-dismiss="modal" class="close">&times;</button>
                    </div>
                    <div class="modal-body">


                        <form id="update_data">
                            {{csrf_field()}}
                            <div class="row">
                                <input type="hidden" name="id" class="form-control" id="id_edit" value="">
                                <div class="col-sm-4 imgUp">
                                    <img src="{{asset('images/default.jpg')}}" id="imgs" class="imagePreview img-thumbnail">
                                    <label class="btn btn-primary upload_btn">
                                        Upload<input type="file" accept="image/png,image/jpeg,image/jpg" onchange="displaySelectedPhoto('update_photo','imgs')" id="update_photo" name="logo" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                    </label>
                                </div>
                                <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="update_name">Name</label>
                                                    <input type="text" name="name" id="update_name" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>

                            <button class=" btn btn-primary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary pull-right" id="update_btn">Update</button>
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

            $('#insert_category').on('submit',function(e){
                e.preventDefault();
                var alldata = new FormData(this);
                $.ajax({
                   type : "post",
                   url : "{{url('admin/insert_category')}}", 
                   data : alldata,
                   cache : false,
                   processData : false,
                   contentType : false,
                   success : function(data){

                       $('#modalBox').modal('hide');
                       toastr.success('Category Successful');
                       load();
                   }
                });
            });
            
            load();
            function load(){
                $.ajax({
                    type : "get",
                    url : "{{url('admin/get_all_category')}}",
                    cache : false,
                    success : function (data) {
                        var string_data = JSON.parse(data);
                        t.clear();
                        var no = 1;
                        for(var i=0; i < string_data.length; i++){
                            t.row.add([
                                no++,
                                '<img src="'+string_data[i]['logo_url']+'" alt="" width="100px" height="100px">',
                                string_data[i]['name'],
                                '<button class="btn btn-primary btn-sm" data-toggle="modal" onclick="edit_data('+string_data[i]['id']+')" data-target="#edit_modalBox">Edit</button>'+
                                '<button onclick="delete_data('+string_data[i]['id']+')" class="btn btn-danger btn-sm">Delete</button>'
                            ]).draw(false);
                        }
                       $('#insert_category')[0].reset();
                    }
                });
            }

            edit_data = function(id){
                $.ajax({
                    type : "GET",
                    url : "../edit_cat/"+id,
                    cache : false,
                    success : function(data){
                        var string=JSON.parse(data);
                        $('#id_edit').val(string['id']);
                        $('#imgs').attr('src',string['logo_url']);
                        $('#update_name').val(string['name']);
                        $('#edit_modalBox').modal('show');
                    }
                });
            }

            $('#update_data').on('submit',function(e){
                e.preventDefault();
                var alldata = new FormData(this);
                $.ajax({
                    type : "post",
                    url : "{{url('admin/update_category')}}",
                    data : alldata,
                    cache : false,
                    processData : false,
                    contentType : false,
                    success : function(data){
                        $('#edit_modalBox').modal('hide');
                        toastr.success('Update Category Successful');
                        load();
                    }
                });
            });
            
            delete_data = function (id) {
                var delete_cat = "{{url('/delete_category')}}/"+id;
                var url = "{{url('/category/count_company')}}/"+id;
                $.ajax({
                    url : url,
                    type : "get",
                    success : function (response){
                        var string=JSON.parse(response);
                        if(confirm('This category has '+ string +' company.Are u sure you want to delete')){
                            $.ajax({
                                url : delete_cat,
                                type : "post",
                                cache : false,
                                success : function (data){
                                    toastr.success('Delete Category Successful');
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

