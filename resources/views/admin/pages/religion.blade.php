@extends('admin.layouts.admin_main') @section('main_content')
<div class="content-wrapper" style="min-height: 976.13px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">হোম</a></li>
                        <li class="breadcrumb-item active">ড্যাশবোর্ড</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="/govt/kazi/marriage/religion" method="post">
                <input type="hidden" name="__page" value="religion">
            <div class="row">
                <div class="col-lg-12">
                    @if($errors->any())
                    <p class="alert alert-danger">অনুগ্রহ করে সঠিক তথ্য প্রদান করুন  {{$errors->first()}}</p>
                    @endif
                    <div class="card">
                        <!-- <div class="card-header"><strong>বর </strong><small> এর সম্পর্কে তথ্য </small></div> -->
                        <div class="card-body card-block">
                            
                            <div class="form-group">
                                <label for="city" class=" form-control-label">কোন রীতি তে বিবাহ সম্পন্ন  হচ্ছে ?</label>
                                <select name="religion" id="" @change="hide">
                                    <option value="1" selected >ইসলাম ধর্ম </option>
                                    <option value="2">সনাতন ধর্ম </option>
                                    <option value="3" >খ্রিষ্ট ধর্ম </option>
                                    <option value="4" >বৌদ্ধ ধর্ম  </option>
                                    <option value="5" >অন্যান্য </option>
                                </select>
                            </div>
                            
                        <div id="block">
            
                            <div class="form-group">
                                <label for="city" class=" form-control-label">স্বামী স্ত্রী কে তালাক প্রদানের ক্ষমতা অর্পণ করেছে কি না ?</label>
                                <select name="ability_of_divorce" id="">
                                    <option value="0">না </option>
                                    <option value="1">হ্যা </option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="country" class=" form-control-label">তালাক প্রদানের শর্ত কি ?</label>
                                <input type="text" id="country" placeholder="" class="form-control" name="divorce_condition">
                            </div>
            
                            <div class="form-group">
                                <label for="country" class=" form-control-label">দেনমোহর এর পরিমান </label>
                                <input type="text" id="country" placeholder="" class="form-control" name="dowry">
                            </div>
            
                            <div class="form-group">
                                <label for="country" class=" form-control-label">স্বামীর তালাক প্রদানের অধিকার কোনো প্রকার খর্ব হয়েছে কি না ?</label>
                                <input type="text" id="country" placeholder="" class="form-control" name="divorce_">
                            </div>
                        </div>
            
                        </div>
                    </div>
                </div>
            
            </div>
            @csrf
            <button type="submit" class="form-control btn btn-block btn-primary">পরবর্তী ধাপ </button>
            </form>
        </div>
    </section>
</div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script type="module">
    let va=new Vue({
        el:'.card',
        methods:{
            hide:function(){
                var a=$("select[name='religion']").children("option:selected").val();
                if(a==1){
                    $('#block').show();
                }
                else{
                    $('#block').hide();
                }
            }
        }
    })
</script>
