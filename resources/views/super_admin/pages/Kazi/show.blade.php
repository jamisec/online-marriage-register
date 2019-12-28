@extends('super_admin.layouts.super_admin_main') @section('super_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">ড্যাশবোর্ড</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">হোম</a></li>
                        <li class="breadcrumb-item active">ড্যাশবোর্ড</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="card-header"><strong>কাজীর পরিচয় পত্র </strong>&nbsp;<small>{{$kazi->reg}}</small></div>
                    <div class="card-body card-block">
                        <label for="নাম (বাংলায় )" class=" form-control-label">ছবি :</label>
                        <img src="/{{$kazi->img}}" alt="" height="100" width="100">
                        <div class="form-group" style="margin-top:20px;">
                            <label for="name" class=" form-control-label">Name:</label>
                            <input disabled type="text" value="{{$kazi->name}}" id="name" placeholder="Enter your name " class="form-control" name="name">

                        </div>
                        <div class="form-group">
                            <label for="পিতার নাম (বাংলায় )" class=" form-control-label">ইমেইল </label>
                            <input disabled type="text" value="{{$kazi->email}}" id="পিতার নাম (বাংলায় )" placeholder="পিতার নাম (বাংলায় )" class="form-control" name="fathers_name">
                        </div>

                        <div class="form-group">
                            <label for="country" class=" form-control-label">ফোন  </label>
                            <input disabled type="text" value="{{$kazi->phone}}" id="country" placeholder="YYYY-MM-DD" class="form-control" name="dob">
                        </div>

                        <div class="form-group">
                            <label for="বিভাগ " class=" form-control-label">বিভাগ </label>
                            <input disabled type="text" value="{{$kazi->division}}" id="বিভাগ " placeholder="বিভাগ " class="form-control" name="division">
                        </div>
                        <div class="form-group">
                            <label for="জিলা " class=" form-control-label">জিলা </label>
                            <input disabled type="text" value="{{$kazi->district}}" id="জিলা " placeholder="জিলা " class="form-control" name="district">
                        </div>
                        <div class="form-group">
                            <label for="উপজিলা/ইউনিয়ন " class=" form-control-label">উপজিলা/ইউনিয়ন </label>
                            <input disabled type="text" value="{{$kazi->upuzilla}}" id="উপজিলা/ইউনিয়ন " placeholder="উপজিলা/ইউনিয়ন " class="form-control" name="upozilla">
                        </div>
                        <td>
                            <a href="/govt/kazis/{{$kazi->id}}/edit">
                                <button class="btn btn-primary">Edit</button>
                            </a>

                            <form action="/govt/kazis/{{$kazi->id}}" method="post" style="display:inline">
                                @method('DELETE') 
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection