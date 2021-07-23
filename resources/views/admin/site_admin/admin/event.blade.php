@extends('admin.layouts.site_admin.site_admin_design')
@section('title','Admin | Event')
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
    Event
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
                                        Title
                                    </th>
                                    <th>
                                        Date
                                    </th>
                                    <th>Action</th>
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
                        <h4 class="modal-title">Create New Event</h4>
                        <button data-dismiss="modal" class="close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="insert_event" enctype="multipart/form-data" class="md-form">
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
                                                <label for="title">Title</label>
                                                <textarea name="title" class="form-control" id="title" required rows="1"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="date">Date</label>
                                                <input type="date" name="date" class="form-control" id="date" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="timing">Timing</label>
                                                <textarea name="timing" class="form-control" id="timing" rows="1" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="location">Location</label>
                                        <textarea name="location" class="form-control" id="location" required rows="1"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Category</label>
                                        <select name="category" id="" class="form-control" required>
                                            <option value=""><---select category---></option>
                                            <option value="academy">Academy</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="detail
                                            "><b>Detail</b></label><br>
                                        <textarea name="detail" rows="8" class="form-control" id="detail" required></textarea>
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
                        <h4 class="modal-title">Edit Event</h4>
                        <button data-dismiss="modal" class="close">&times;</button>
                    </div>
                    <div class="modal-body">


                        <form id="update_data">
                            {{csrf_field()}}

                            <div class="row">
                                <div class="col-sm-4 imgUp">
                                    <input type="hidden" name="id" class="form-control" id="id_edit" value="">
                                    <img src="{{asset('images/default.jpg')}}" id="imgs" class="imagePreview img-thumbnail">
                                    <label class="btn btn-primary upload_btn">
                                        Upload<input type="file" accept="image/png,image/jpeg,image/jpg" onchange="displaySelectedPhoto('update_photo','imgs')" id="update_photo" name="photo" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                    </label>
                                </div>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="update_title">Title</label>
                                                <textarea name="title" class="form-control" id="update_title" required rows="1"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="update_date">Date</label>
                                                <input type="date" name="date" class="form-control" id="update_date" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="update_timing">Timing</label>
                                                <textarea name="timing" class="form-control" id="update_timing" rows="1" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_location">Location</label>
                                        <textarea name="location" class="form-control" id="update_location" required rows="1"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Category</label>
                                        <select name="category" id="update_category" class="form-control">
                                            <option value="academy">Academy</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_detail
                                            "><b>Detail</b></label><br>
                                        <textarea name="detail" rows="8" class="form-control" id="update_detail" required></textarea>
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
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function () {

            var t=$("#datatable").DataTable({
                "ordering": false,
                // "paging": false,
                "bInfo" : false,
                // "bPaginate": false,
                "bLengthChange": false
                // "bFilter": true,
                // "bAutoWidth": false
            });
            function reset(){
                $('#update_data')[0].reset();
            }

            load();

            function load(){
                $.ajax({
                    type: "POST",
                    url: "{{url('admin/get_all_event')}}",

                    cache: false,
                    success: function(data){
                        var data_return=JSON.parse(data);
                        //console.log(data);
                        t.clear();
                        var no = 1;
                        for(var i = 0;i<data_return.length;i++){
                            var link = "{{ url('admin/event_detail') }}/"+data_return[i]['id'];
                            t.row.add( [
                                no++,
                                '<img src="'+data_return[i]['photo_url']+'" alt="" style="width:100px;height:100px">',
                                data_return[i]['title'],
                                data_return[i]['date'],
                                // data_return[i]['detail'].replace(/(<([^>]+)>)/ig,"").length > 40 ? data_return[i]['detail'].replace(/(<([^>]+)>)/ig,"").substring(0,40)+'.....' : data_return[i]['detail'],
                                '<a href="'+link+'" target="_blank" class="btn btn-primary btn-sm">Detail</a>'+
                                '<button class="btn btn-info btn-sm" onclick="edit_data('+data_return[i]['id']+')" data-target="#edit_modalBox" data-toggle="modal" data-keyboard="false" data-backdrop="static">Edit</button>'+
                                '<button class="btn btn-danger btn-sm" onclick="delete_data('+data_return[i]['id']+')">Delete</button>'
                            ] ).draw( false );
                        }

                        $('#insert_event')[0].reset();
                        $("#detail").summernote('reset');

                        $('#image').attr('src','{{asset('images/default.jpg')}}');

                    }
                });
            }

            $('#insert_event').on('submit',function (e)
            {
                e.preventDefault();
                var alldata = new FormData(this);
                $.ajax
                ({
                    type: "POST",
                    url: "{{url('admin/insert_event')}}",
                    data:alldata,
                    cache:false,
                    processData: false,
                    contentType: false,
                    success: function(data){
                        //console.log(data);
                        // $("#detail").summernote('reset');
                        $('#modalBox').modal('hide');
                        toastr.success('Insert event data successful');
                        load();
                    }
                });
                return false;
            });

            edit_data=function(id){

                $.ajax({
                    type: "GET",
                    url: "./edit_event/"+id,

                    cache: false,
                    success: function(data){
                        reset();
                        var event=JSON.parse(data);

                        //console.log(product);
                        $("#imgs").attr("src", event['photo_url']);
                        $('#id_edit').val(event['id']);
                        $('#update_title').val(event['title']);
                        $('#update_fee').val(event['fee']);
                        $('#update_date').val(event['date']);
                        $('#update_timing').val(event['timing']);
                        $('#update_location').val(event['location']);
                        $('#update_category').val(event['category']);
                        $('#update_detail').summernote({
                            height : "150px",
                            toolbar: [
                                ['style', ['style','bold', 'italic', 'underline', 'clear','fontname','fontsize']],
                                ['font', ['strikethrough', 'superscript', 'subscript']],
                                ['color', ['color']],
                                ['para', ['ul', 'ol', 'paragraph']],
                                ['height', ['height']],
                                ['view', ['fullscreen', 'codeview', 'help']],
                                ['insert', ['link']],
                            ],
                        });
                        $('#update_detail').summernote('code',event['detail']);

                        $('#edit_modalBox').modal('show');
                    }
                });
            }

            $('#update_data').on('submit',function (e)
            {
                e.preventDefault();
                var updateData = new FormData(this);
                $.ajax
                ({
                    type: 'POST',
                    url: "{{url('admin/update_event')}}",
                    data:updateData,
                    cache:false,
                    processData: false,
                    contentType: false,
                    success: function(data){
                        //console.log(data);
                        //alert(data);
                        $("#detail").summernote('reset');
                        $('#edit_modalBox').modal('hide'); 
                        toastr.success('Update event data successful');
                        load();
                    }
                });
                return false;
            });

            delete_data=function(id){
                if(confirm('Are u sure you want to delete') == true){
                    $.ajax({
                       type : 'get',
                       url : "./delete_event/"+id,
                       cache : false,
                       success : function (data) {
                           toastr.success('Delete Event Data Successful');
                           load();
                       } 
                    });
                }
            }


            // start summernote

            $("#detail").summernote({
                height : "150px",
                placeholder: 'Detail',
                toolbar: [
                    ['style', ['style','bold', 'italic', 'underline', 'clear','fontname','fontsize']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                    ['insert', ['link']],
                ],
            });
        });
    </script>
@endsection