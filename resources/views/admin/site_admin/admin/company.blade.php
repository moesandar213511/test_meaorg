@extends('admin.layouts.site_admin.site_admin_design')
@section('title','Admin | Company')
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
    Company List
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            {{-- <h3>Company List</h3> --}}
                            <button type="button" name="button" class="btn btn-success pull-right" data-target="#modalBox" data-toggle="modal" data-keyboard="false" data-backdrop="static">Add</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="datatable">
                                    <thead class=" text-primary">
                                    <th width="10%">
                                        No
                                    </th>
                                    <th width="20%">
                                        Logo
                                    </th>
                                    <th width="15%">
                                        Name
                                    </th>
                                    <th width="10%">
                                        Email
                                    </th>
                                    <th width="100%">Action</th>
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
                    @if(\Illuminate\Support\Facades\Auth::user()->type == "admin")
                    <div class="modal-header">
                        <h4 class="modal-title">Create New Company</h4>
                        <button data-dismiss="modal" class="close">&times;</button>
                    </div>
                    @endif
                    <div class="modal-body">
                        <form id="insert_company" enctype="multipart/form-data" class="md-form">
                            {{csrf_field()}}
              
                            <div class="row">
                                <div class="col-sm-4 imgUp">
                                    <img src="{{asset('images/default.jpg')}}" id="image" class="imagePreview img-thumbnail">
                                    <label class="btn btn-primary upload_btn">
                                        Upload Logo<input type="file" accept="image/png,image/jpeg,image/jpg" onchange="displaySelectedPhoto('upload_logo','image')" id="upload_logo" class="uploadFile img" name="logo" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;" required>
                                    </label>
                                </div>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name"><b>Company Name</b></label>
                                                <input type="text" name="name" class="form-control" id="name" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                
                                                <label for="member"><b>Select Member</b></label><br>
                                                <select name="member_id" class="form-control" required>
                                                <option value="">--Select Member--</option>
                                                    @foreach($all_member as $member)
                                                <option value="{{$member['id']}}">{{$member['name']}}</option>
                                                    @endforeach
                                                </select>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="type"><b>Company Type(Ads or Normal)</b></label>
                                                <select name="company_type" class="form-control">
                                                    <option value="">--Select Company Type--</option>
                                                   <option value="ads">Ads Company</option>
                                                   <option value="normal">Normal Company</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="date"><b>Ads Date</b></label>
                                                <input type="date" name="ad_date" id="date" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="category"><b>Category</b></label>
                                                <select name="category_id" class="form-control" id="category">
                                                <option value="">--Select Category--</option>
                                                    @foreach ($category as $cat)
                                                    <option value="{{$cat['id']}}">{{$cat['name']}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="email"><b>Email</b></label>
                                                <input type="email" name="email" class="form-control" id="email" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="btn btn-primary upload_btn">
                                                    Upload Photos<input type="file" accept="image/png,image/jpeg,image/jpg" id="upload_photo" class="uploadFile img" value="Upload Photos" style="width: 0px;height: 0px;overflow: hidden;" name="photos[]" required multiple="multiple">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="phone"><b>Phone</b></label>
                                        <input type="phone" name="phone" class="form-control" id="phone" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address
                                            "><b>Address</b></label>
                                        <textarea rows="3" class="form-control" name="address" id="address" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="web_url
                                            "><b>web-url</b></label>
                                        <input type="text" class="form-control" name="web_url" id="web_url" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="facebook_url
                                            "><b>facebook-url</b></label>
                                        <input type="text" class="form-control" name="fb_link" id="facebook_url" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="what_we_do"
                                            "><b>what-we-do</b></label><br>
                                        <textarea rows="3" class="form-control" name="what_we_do" id="what_we_do" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="why_join_us
                                            "><b>why-join-us</b></label><br>
                                        <textarea rows="3" class="form-control" name="why_join_us" id="why_join_us" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="vision
                                            "><b>vision</b></label><br>
                                        <textarea rows="3" class="form-control" name="vision" id="vision" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mission
                                            "><b>mission</b></label><br>
                                        <textarea rows="3" class="form-control" name="mission" id="mission" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="about_us
                                            "><b>about us</b></label><br>
                                        <textarea rows="3" class="form-control" id="about_us" name="about_us" required></textarea>
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
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Company Data</h4>
                        <button data-dismiss="modal" class="close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="update_company" class="md-form">
                            {{csrf_field()}}
                            <input type="hidden" name="id" id="id_edit">
                            <div class="row">
                                <div class="col-sm-4 imgUp">
                                    <img src="{{asset('images/default.jpg')}}" id="imgs" class="imagePreview img-thumbnail">
                                    <label class="btn btn-primary upload_btn">
                                        Upload Logo<input type="file" accept="image/png,image/jpeg,image/jpg" onchange="displaySelectedPhoto('update_logo','imgs')" id="update_logo" name="logo" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                    </label>
                                </div>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="update_name">CompanyName</label>
                                                <input type="text" name="name" class="form-control" id="update_name" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="update_company"><b>Company Type (Ads or Normal)</b></label>
                                                <select name="company_type" class="form-control" id="update_company">
                                                    <option value="normal">Normal Company</option>
                                                    <option value="ads">Ads Company</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="update_adsdate"><b>Ads Date</b></label>
                                                <input type="date" name="ad_date" id="update_adsdate" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                        <label for=""><b>Select Member</b></label><br>
                                        <select name="member_id" class="form-control">
                                            @foreach($all_member as $member)
                                        <option value="{{$member['id']}}" {{$member['name'] == $company_data['0']['member_id'] ? 'selected' : ''}}>{{$member['name']}}</option>
                                            @endforeach
                                        </select>
                                        
                                    </div>
                                </div>
                              <div class="col-md-12">
                                    <div class="form-group">
                                        <label for=""><b>Category</b></label>
                                        <select name="category_id" class="form-control">
                                             <option value="">-- Select Category --</option>
                                            @foreach ($category as $cat)
                                                <option value="{{$cat['id']}}" {{ $cat['name'] == $company_data['0']['category_id'] ? 'selected' : '' }}>{{$cat['name']}}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_email">Email</label>
                                        <input type="email" name="email" class="form-control" id="update_email" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_phone">Phone</label>
                                        <input type="tel" name="phone" class="form-control" id="update_phone" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_address"><b>Address</b></label><br>
                                        <textarea rows="3" name="address" class="form-control" id="update_address" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_web_url"><b>web-url</b></label><br>
                                        <input type="text" name="web_url" class="form-control" id="update_web_url" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_fb_url"><b>facebook-url</b></label><br>
                                        <input type="text" name="fb_link" class="form-control" id="update_fb_url" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_what_we_do"><b>what-we-do</b></label><br>
                                        <textarea rows="3" name="what_we_do" class="form-control" id="update_what_we_do" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_why_join_us"><b>why-join-us</b></label><br>
                                        <textarea rows="3" name="why_join_us" class="form-control" id="update_why_join_us" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_vision"><b>vision</b></label><br>
                                        <textarea rows="3" name="vision" class="form-control" id="update_vision" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_mission"><b>mission</b></label><br>
                                        <textarea rows="3" name="mission" class="form-control" id="update_mission" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_about_us"><b>about us</b></label><br>
                                        <textarea rows="3" class="form-control" name="about_us" id="update_about_us" required></textarea>
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

            $('#insert_company').on('submit',function(e){
                e.preventDefault();
                var alldata = new FormData(this);
                $.ajax({
                    type : "post",
                    url : "{{url('admin/insert_company')}}",
                    data : alldata,
                    cache : false,
                    processData : false,
                    contentType : false,
                    success : function(data){
                        toastr.success('Create Company Successful');
                        $('#modalBox').modal('hide');
                        load();
                    }
                });
            });

            load();

            function load(){
                $.ajax({
                    type : "get",
                    url : "{{url('admin/get_all_company')}}",
                    cache : false,
                    success : function (data){
                        var string_data = JSON.parse(data);
                        t.clear();
                        var no = 1;
                        for(var i=0 ; i < string_data.length; i++){
                            var link = "{{url('/company/detail/')}}/"+string_data[i]['id'];
                            var photos_link = "{{url('/company_photos/')}}/"+string_data[i]['id'];
                            t.row.add([
                                no++,
                                '<img src="'+string_data[i]['logo_url']+'" alt="" width="100px" height="100px">',
                                string_data[i]['name'],
                                string_data[i]['email'],
                                '<a href="'+link+'" class="btn btn-success btn-sm" target="_blank">Detail</a>'+
                                '<button type="button" data-toggle="modal" data-target="#edit_modalBox" onclick="edit_data('+string_data[i]['id']+')" class="btn btn-primary btn-sm">Edit</button>'+
                                '<a href="'+photos_link+'" class="btn btn-info btn-sm" target="_blank">Photos</a>'+
                                '<button type="button" onclick="delete_data('+string_data[i]['id']+')" class="btn btn-danger btn-sm">Delete</button>'
                            ]).draw(false);
                        }
                        $('#insert_company')[0].reset();
                    }
                }).fail(function(error){
                console.log(error);
            });
            }

            edit_data = function(id){
                // alert(id);
                $.ajax({
                    type : "GET",
                    url : "../edit/company/"+id,
                    cache : false,
                    success : function(data){
                        var string_data = JSON.parse(data);
                        $('#id_edit').val(string_data['id']);
                        $('#imgs').attr('src',string_data['logo_url']);
                        $('#update_name').val(string_data['name']);
                        $('#update_company').val(string_data['company_type']);
                        $('#update_adsdate').val(string_data['ad_date']);
                        // $('#update_member').val(string_data['member_id']);
                        // $('#update_category').val(string_data['category_id']);
                        $('#update_email').val(string_data['email']);
                        $('#update_phone').val(string_data['phone']);
                        $('#update_address').val(string_data['address']);
                        $('#update_web_url').val(string_data['web_url']);
                        $('#update_fb_url').val(string_data['fb_link']);
                        $('#update_what_we_do').val(string_data['what_we_do']);
                        $('#update_why_join_us').val(string_data['why_join_us']);
                        $('#update_vision').val(string_data['vision']);
                        $('#update_mission').val(string_data['mission']);
                        $('#update_about_us').val(string_data['about_us']);
                        $('#edit_modalBox').modal('hide');

                    }
                });
            }

            $('#update_company').on('submit',function (e) {
                e.preventDefault();
                var all_data = new FormData(this);
                $.ajax({
                    type : "POST",
                    url : "{{url('/admin/update_company')}}",
                    data : all_data,
                    cache : false,
                    processData : false,
                    contentType : false,
                    success : function (data) {
                        toastr.success('Update Company Data Successful');
                        $('#edit_modalBox').modal('hide');
                        load();
                    }
                });

            })

            delete_data = function(id){
                if(confirm('Are u sure you want to delete') == true){
                    $.ajax({
                    type : "GET",
                    url : "../delete/company/"+id,
                    cache : false,
                    success : function (data) {
                        toastr.success('Delete Data Successful');
                        load();
                    }
                });
                }

            }

        });


    </script>


@endsection


