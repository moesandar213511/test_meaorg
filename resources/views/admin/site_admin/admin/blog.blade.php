@extends('admin.layouts.site_admin.site_admin_design')
@section('title','Admin | Blog')
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
    Blog
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
                                    <thead class=" text-primary">
                                    <th>
                                        No
                                    </th>
                                    <th>
                                        Photo
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Text
                                    </th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                        
                                        {{-- <button>Delete</button> --}}

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
                        <h4 class="modal-title">Create New Blog</h4>
                        <button data-dismiss="modal" class="close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="insert_blog" enctype="multipart/form-data" class="md-form">
                            {{csrf_field()}}

                            <div class="row">
                                <div class="col-sm-4 imgUp">
                                    <img src="{{asset('images/default.jpg')}}" id="image" class="imagePreview img-thumbnail">
                                    <label class="btn btn-primary upload_btn">
                                        Upload<input type="file" accept="image/png,image/jpeg,image/jpg" onchange="displaySelectedPhoto('upload_photo','image')" id="upload_photo" name="photo" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;" required>
                                    </label>
                                </div>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <textarea name="name" id="name" rows="1" required class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="text"><b>Text</b></label><br>
                                        <textarea rows="8" name="content" class="form-control" id="text" required></textarea>
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
                        <h4 class="modal-title">Edit Blog</h4>
                        <button data-dismiss="modal" class="close">&times;</button>
                    </div>
                    <div class="modal-body">


                        <form id="update_blog">
                            {{csrf_field()}}
                            <input type="hidden" id="id_edit" name="id">
                            <div class="row">
                                <div class="col-sm-4 imgUp">
                
                                    <img src="{{asset('images/default.jpg')}}" id="imgs" class="imagePreview img-thumbnail">
                                    <label class="btn btn-primary upload_btn">
                                        Upload<input type="file" accept="image/png,image/jpeg,image/jpg" onchange="displaySelectedPhoto('update_photo','imgs')" id="update_photo" name="photo" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                    </label>
                                </div>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="update_name">Name</label>
                                                <textarea class="form-control" id="update_name" name="name" required rows="1"></textarea>
                                            </div>
                                        </div>
                        
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_text
                                            "><b>Content</b></label><br>
                                        <textarea rows="8" name="content" class="form-control" id="update_content" required></textarea>
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

        $(document).ready(function() {
            var t = $('#datatable').DataTable();
            
            load();

            function load() {
                $.ajax({
                    type : "GET",
                    url : "{{ url('/admin/get_all_blog') }}",
                    cache : false,
                    success : function (data){
                       var data_return = JSON.parse(data);
                       t.clear();
                       console.log(data_return);
                       for(var i = 0; i < data_return.length; i++){
                         t.row.add([
                            data_return[i]['id'],
                            '<img src="'+data_return[i]['photo_url']+'" width="100px;" height="100px;" alt="">',
                            data_return[i]['name'],
                            data_return[i]['content'],
                            '<button class="btn btn-info btn-sm" onclick="edit_data('+data_return[i]['id']+')" data-toggle="modal" data-target="#edit_modalBox" data-keyboard="false" data-backdrop="static">Edit</button>'+
                            '<button class="btn btn-danger btn-sm" data-toggle="modal" onclick="delete_data('+data_return[i]['id']+')">Delete</button>'
                         ]).draw(false);
                       }
                       $('#insert_blog')[0].reset();
                    }
                });
            }
            

            $('#insert_blog').on('submit',function(e){
                e.preventDefault();
                var alldata = new FormData(this);
                $.ajax({
                   type : "POST",
                   url : "{{ url('admin/insert_blog') }}",
                   data : alldata,
                   cache : false,
                   processData : false,
                   contentType : false,
                   success :function(data){
                    //    console.log(data);
                       $('#modalBox').modal('hide');
                       toastr.success('Insert Blog Successful');
                       load();
                   }

                });
            });

            edit_data = function(id){
                $.ajax({
                    type : "get",
                    url : "./edit_blog/"+id,
                    cache : false,
                    success : function(data){
                        var blog = JSON.parse(data);
                        // console.log(blog);
                        $('#id_edit').val(blog['id']);
                        $('#imgs').attr('src',blog['photo_url']);
                        $('#update_name').val(blog['name']);
                        $('#update_content').val(blog['content']);
                        
                        $('#edit_modalBox').modal('show');
                    }

                });
            }

            $('#update_blog').on('submit',function (e) {
                e.preventDefault();
                var alldata = new FormData(this);
                $.ajax({
                   type : "post",
                   url : "{{ url('admin/update_blog') }}", 
                   data : alldata,
                   cache : false,
                   processData : false,
                   contentType : false,
                   success : function(data){
                       $('#edit_modalBox').modal('hide');
                        toastr.success('Blog Update Successful');
                        load();
                   }
                });
            });

            delete_data=function(id){
                if(confirm('Are u sure you want to delete!') == true){
                    $.ajax({
                       type : 'get',
                       url : "./delete_blog/"+id,
                       cache : false,
                        success : function(data){
                            toastr.success('Delete blog Data successful');
                            load();
                        }
                    });
                }else{
                    return false;
                }

            }

        //    $('#text').summernote({
        //     height: '150px',
        //     toolbar: [
        //         ['style', ['style']],
        //         ['font', ['bold', 'underline', 'clear']],
        //         ['fontname', ['fontname']],
        //         ['color', ['color']],
        //         ['para', ['ul', 'ol', 'paragraph']],
        //         ['table', ['table']],
        //         ['insert', ['link', 'picture', 'video']],
        //         ['view', ['fullscreen', 'codeview', 'help']],
        //     ]
        //     });
        });
    </script>
@endsection