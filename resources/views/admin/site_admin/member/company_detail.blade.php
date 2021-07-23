@extends('admin.layouts.site_admin.site_admin_design')
@section('title','Admin | Company Detail')
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
   Company Detail
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        {{-- <div class="card-header card-header-primary">
                        <button type="button" name="button" class="btn btn-success pull-right" data-keyboard="false" data-backdrop="static"><a href="">Update Photos</a></button>
                        </div> --}}
                        <div class="card-body">
                            <div class="table-responsive">
                               <table class="table table-hovered">
                                    <tbody>
                                     <tr>
                                        <td><b>Logo</b></td>
                                        {{-- @foreach($company_detail['photos'] as $photos) --}}
                                     <td><img src="{{$company_detail['logo_url']}}" alt="" width="150px;" height="100px;"></td>
                                        {{-- @endforeach --}}
                                      </tr>
                                      <tr>
                                        <td><b>Name</b></td>
                                      <td>{{$company_detail['name']}}</td>
                                      </tr>
                                      <tr>
                                        <td><b>Member</b></td>
                                        <td>{{$company_detail['member_id']}}</td>
                                      </tr>
                                      <tr>
                                        <td><b>Company Type</b></td>
                                        <td>{{$company_detail['company_type']}}</td>
                                      </tr>
                                      <tr>
                                        <td><b>Ad Date</b></td>
                                        <td>{{$company_detail['ad_date']}}</td>
                                      </tr>
                                      <tr>
                                        <td><b>Category</b></td>
                                        <td>{{$company_detail['category_id']}}</td>
                                      </tr>
                                      <tr>
                                        <td><b>Email</b></td>
                                        <td>{{$company_detail['email']}}</td>
                                      </tr>
                                      <tr>
                                        <td><b>Phone</b></td>
                                        <td>{{$company_detail['phone']}}</td>
                                      </tr>
                                      <tr>
                                        <td><b>Address</b></td>
                                        <td>{{$company_detail['address']}}</td>
                                      </tr>
                                      <tr>
                                        <td><b>Web Url</b></td>
                                        <td>{{$company_detail['web_url']}}</td>
                                      </tr>
                                      <tr>
                                        <td><b>Facebook Url</b></td>
                                        <td>{{$company_detail['fb_link']}}</td>
                                      </tr>
                                       <tr>
                                        <td><b>What we do</b></td>
                                        <td>{{$company_detail['what_we_do']}}</td>
                                      </tr>
                                       <tr>
                                        <td><b>Why join us</b></td>
                                        <td>{{$company_detail['why_join_us']}}</td>
                                      </tr>
                                       <tr>
                                        <td><b>Vision</b></td>
                                        <td>{{$company_detail['vision']}}</td>
                                      </tr>
                                       <tr>
                                        <td><b>Mission</b></td>
                                        <td>{{$company_detail['mission']}}</td>
                                      </tr>
                                       <tr>
                                        <td><b>About us</b></td>
                                        <td>{{$company_detail['about_us']}}</td>
                                      </tr>
                                    </tbody>
                                  </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection