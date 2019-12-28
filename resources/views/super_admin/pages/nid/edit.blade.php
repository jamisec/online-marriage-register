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
                        <form action="/govt/nids/{{$nid->id}}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="card-header"><strong>জাতীয় পরিচয় পত্রের </strong>&nbsp;<small> ফরম </small></div>
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label for="name" class=" form-control-label">নাম (ইংরেজিতে)</label>
                                <input type="text" id="name" placeholder="Enter your name " value="{{$nid->name_eng}}"  class="form-control" name="name_eng">
                                </div>
                                <div class="form-group">
                                    <label for="নাম (বাংলায় )" class=" form-control-label">নাম (বাংলায় )</label>
                                    <input type="text" id="নাম (বাংলায় )" placeholder="নাম (বাংলায় )" class="form-control" value="{{$nid->name}}" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="পিতার নাম (বাংলায় )" class=" form-control-label">পিতার নাম (বাংলায় )</label>
                                    <input type="text" id="পিতার নাম (বাংলায় )" placeholder="পিতার নাম (বাংলায় )" value="{{$nid->fathers_name}}" class="form-control" name="fathers_name">
                                </div>
                                <div class="form-group">
                                    <label for="মাতার নাম (বাংলায় )" class=" form-control-label">মাতার নাম (বাংলায় )</label>
                                    <input type="text" id="মাতার নাম (বাংলায় )" placeholder="মাতার নাম (বাংলায় )" class="form-control" value="{{$nid->mothers_name}}" name="mothers_name">
                                </div>
                                <div class="form-group">
                                    <label for="ছবি" class=" form-control-label">ছবি </label>
                                <input type="file" id="" placeholder="photo" class="form-control"  value="{{$nid->img}}" name="img">
                                </div>
                                <div class="form-group">
                                    <label for="জন্ম তারিখ" class=" form-control-label">জন্ম তারিখ </label>
                                    <input type="text" id="country" placeholder="YYYY-MM-DD" class="form-control"  value="{{$nid->dob}}" name="dob">
                                </div>

                                <div class="form-group">
                                    <label for="বিভাগ " class=" form-control-label">বিভাগ </label>
                                    <select name="division" id="division" class="form-control" @change="loadDist">
                                        @foreach ($divisions as $division)
                                        <option value="{{$division->bn_name}}" <?php print($division->bn_name ==$nid->division?'selected':'') ?>>{{$division->bn_name}}</option>
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

                                <div class="form-group">
                                    <label for="লিঙ্গ" class=" form-control-label">লিঙ্গ</label>
                                    <select name="sex" class="form-control">
                                        <option value="0" <?php print($nid->sex==0? 'selected':'') ?>>পুরুষ </option>
                                        <option value="1"<?php print($nid->sex==1? 'selected':'') ?>>মহিলা </option>
                                        <option value="2"<?php print($nid->sex==2? 'selected':'') ?>>অন্যান্য </option>
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