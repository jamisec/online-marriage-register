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
                    <div class="card card-primary">
                        <a href="/govt/nids/create">
                            <button class="btn btn-primary" style="margin-bottom:10px;">নতুন জাতীয় পরিচয় পত্র তৈরী করুন </button>
                        </a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">নাম </th>
                                    <th scope="col">ছবি </th>
                                    <th scope="col">রেজিস্ট্রেশন নম্বর</th>
                                    <th scope="col">ফোন</th>
                                    <th scope="col">ইমেইল   </th>
                                    <th scope="col">অ্যাকশন </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kazis as $kazi)
                                <tr>

                                    <th scope="row"><a href="/govt/kazis/{{$kazi->id}}">{{$kazi->id}}</a></th>
                                    <td><a href="/govt/kazis/{{$kazi->id}}">{{$kazi->name}}</a></td>
                                    <td><a href="/govt/kazis/{{$kazi->id}}"><img src="/{{$kazi->img}}" alt="" height="50" width="50" style="border-radious:50%;"></a></td>
                                    <td><a href="/govt/kazis/{{$kazi->id}}"> {{$kazi->reg}}</a></td>
                                    <td><a href="/govt/kazis/{{$kazi->id}}">{{$kazi->phone}}</a></td>
                                    <td><a href="/govt/kazis/{{$kazi->id}}">{{$kazi->email}}</a></td>

                                    <td>
                                        <a href="/govt/kazis/{{$kazi->id}}/edit">
                                            <button class="btn btn-primary">Edit</button>
                                        </a>

                                        <form action="/govt/kazis/{{$kazi->id}}" method="post" style="display:inline">
                                            @method('DELETE') @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div style="margin-left:38%">{{$kazis->links()}}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection