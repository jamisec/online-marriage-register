@extends('super_admin.layouts.super_admin_main') 
@section('super_content')
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
                <div class="col-md-8 offset-md-2">
                    <div class="card card-primary">
                        @if($errors->any())
                        <p class="alert alert-danger">{{$errors->first()}}</p>
                        @endif
                        <form action="/govt/kazis/{{$kazi->id}}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="card-header"><strong>কাজীর পরিচয় পত্রের </strong>&nbsp;<small> ফরম</small></div>
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label for="name" class=" form-control-label">নাম (ইংরেজিতে)</label>
                                <input type="text" id="name" placeholder="Enter your name " value="{{$kazi->name}}"  class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="নাম (বাংলায় )" class=" form-control-label">ইমেইল</label>
                                    <input type="text" id="নাম (বাংলায় )" placeholder="ইমেইল" class="form-control" value="{{$kazi->email}}" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="পিতার নাম (বাংলায় )" class=" form-control-label">ফোন নং</label>
                                    <input type="text" id="phone" placeholder="ফোন নং" value="{{$kazi->phone}}" class="form-control" name="phone">
                                </div>
                                <div class="form-group">
                                    <label for="passowrd" class=" form-control-label">পাসওয়ার্ড</label>
                                    <input type="password" id="password" placeholder="পাসওয়ার্ড" class="form-control"  name="password">
                                </div>
                                <div class="form-group">
                                    <label for="ছবি" class=" form-control-label">ছবি </label>
                                <input type="file" id="" placeholder="photo" class="form-control"  value="{{$kazi->img}}" name="img">
                                </div>

                                <div class="form-group">
                                    <label for="বিভাগ " class=" form-control-label">বিভাগ </label>
                                    <select name="division" id="division" class="form-control" @change="loadDist">
                                        @foreach ($divisions as $division)
                                        <option value="{{$division->bn_name}}" <?php print($division->bn_name ==$kazi->division?'selected':'') ?>>{{$division->bn_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="জিলা " class=" form-control-label">জিলা </label>
                                    <select name="district" @change="loadUpz" class="form-control">
                                    <option v-for="dist in dists" :value="dist.bn_name">@{{dist.bn_name}}</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="উপজিলা " class=" form-control-label">উপজিলা </label>
                                    <select name="upuzilla" class="form-control">

                                    <option v-for="upz in upzs" :value="upz.bn_name">@{{upz.bn_name}}</option>

                                    </select>
                                </div>

                                <button class="btn btn-block btn-primary form-control" type="submit">জমা দিন </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script type="module">
  let v=new Vue({
    el:'.card',
    data:{
      dists:[],
      upzs:[]
    },

    methods:{
      loadDist:function(){
      var val=$("select[name='division']").children("option:selected").val();
      axios.get('http://127.0.0.1:8000/api/dist?division='+val)
      .then(function(response){
        v.dists=response.data;
        // console.log(response.data);
      })
      .catch(function(error){
        console.log(error);
      })
    },

      loadUpz:function(){
        var val2=$("select[name='district']").children("option:selected").val();
        axios.get('http://127.0.0.1:8000/api/upuzila?district='+val2)
        .then(function(response){
          v.upzs=response.data;
          // console.log(response.data);
        })
        .catch(function(error){
          console.log(error);
        })
      }
    }

  })
</script>