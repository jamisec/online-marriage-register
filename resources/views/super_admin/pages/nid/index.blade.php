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
                                    <th scope="col">পরিচয় পত্রের নম্বর </th>
                                    <th scope="col">জন্ম তারিখ </th>
                                    <th scope="col">অ্যাকশন </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($nids as $n)
                                <tr>

                                    <th scope="row"><a href="/govt/nids/{{$n->id}}">{{$n->id}}</a></th>
                                    <td><a href="/govt/nids/{{$n->id}}">{{$n->name}}</a></td>
                                    <td><a href="/govt/nids/{{$n->id}}"><img src="/{{$n->img}}" alt="" height="50" width="50" style="border-radious:50%;"></a></td>
                                    <td><a href="/govt/nids/{{$n->id}}"> {{$n->num}}</a></td>
                                    <td><a href="/govt/nids/{{$n->id}}">{{$n->dob}}</a></td>

                                    <td>
                                        <a href="/govt/nids/{{$n->id}}/edit">
                                            <button class="btn btn-primary">Edit</button>
                                        </a>

                                        <form action="/govt/nids/{{$n->id}}" method="post" style="display:inline">
                                            @method('DELETE') @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div style="margin-left:38%">{{$nids->links()}}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection