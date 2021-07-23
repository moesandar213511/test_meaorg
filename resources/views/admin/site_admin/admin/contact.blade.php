@extends('admin.layouts.site_admin.site_admin_design')
@section('title','Admin | Contact')
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
    Contact List
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <button type="button" name="button" class="btn btn-primary pull-right" data-keyboard="false" data-backdrop="static"></button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="datatable">
                                    <thead class=" text-primary">
                                    <th>
                                        No
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Subject
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

        <!-- Detail Modal -->
<div class="modal fade" id="detailData" tabindex="-1" role="dialog" aria-labelledby="detailDataTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
         {{-- <h4 class="" style="text-align:center;padding-left:-20px;">Contact Detail</h4> --}}
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {{-- <div class="modal-body text-center lg"> 
            <div class="table-responsive">  --}}
                <table class="table table-hovered">
                    <tbody>
                        <tr>
                        <td><b>Name</b></td>
                        <td id="name" class="name"></td>
                        </tr>
                        <tr>
                        <td><b>Email</b></td>
                        <td class="email"></td>
                        </tr>
                        <tr>
                        <td><b>Subject</b></td>
                        <td class="subject"></td>
                        </tr>
                        <tr>
                        <td><b>Message</b></td>
                        <td class="message"></td>
                        </tr>
                    </tbody>
                </table>
           {{-- </div> --}}
                {{-- <p class="name">

                </p>
                <p class="email">

                </p>
                <p class="subject">

                </p>
                <p class="message">

                </p> --}}
       {{-- </div>  --}}
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
            
            load();

            function load(){
                $.ajax({
                    url : "{{url('/get_all_contact')}}",
                    type : "get",
                    cache : false,
                    success : function(data){
                        var string = JSON.parse(data);
                        t.clear();
                        var no = 1;
                        for(var i = 0; i < string.length; i++){
                            t.row.add([
                                no++,
                                string[i]['name'],
                                string[i]['email'],
                                string[i]['subject'],
                                '<a href="mailto:'+string[i]['email']+'" class="btn btn-primary btn-sm">MailTo</a>'+         
                                '<button class="btn btn-danger btn-sm" onclick="delete_data('+string[i]['id']+')">Delete</button>'
                            ]).draw(false);
                        }
                    }
                });
            }

            delete_data = function(id){
                // alert(id);
                if(confirm('Are u sure you want to delete') == true){
                    $.ajax({
                        url : "../delete_contact/"+id,
                        type : "get",
                        success : function(data){
                            toastr.success('Delete Data Successful');
                            load();
                        }
                    }).fail(function(error){
                        console.log(error);
                    });
                }
            }
        });
    </script>
@endsection

