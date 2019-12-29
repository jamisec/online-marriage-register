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
            <div class="row">
                @if($errors->any())
                <p class="alert alert-danger">অনুগ্রহ করে সঠিক তথ্য প্রদান করুন {{$errors->first()}}</p>
                @endif
                <form action="/govt/kazi/marriage/witness" method="post">
                    <input type="hidden" name="__page" value="religion">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="card card-primary">
                            <div class="card-header"><strong>সাক্ষীর</strong><small> এর সম্পর্কে তথ্য </small></div>
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">জাতীয় পরিচয় পত্রের নম্বর </label>
                                    <input  type="text"  placeholder="1234567890" class="form-control" name="witness1_nid" v-model="witness1_nid">
                                </div>
                                <div class="groom-block">
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">সাক্ষীর নাম ( বাংলায় )</label>
                                    <input readonly type="text"  placeholder="" class="form-control"  v-model="witness1_name" name="witness1_name" >
                                </div>
                                <div class="form-group">
                                    <label for="street" class=" form-control-label">জন্ম তারিখ </label>
                                    <input readonly type="text"  placeholder="YYYY-MM-DD" class="form-control"  v-model="witness1_dob" name="witness1_dob">
                                </div>
                                
                                <div class="form-group">
                                    <label for="city" class=" form-control-label">সাক্ষীর পিতার নাম ( বাংলায় )</label>
                                    <input readonly type="text"  placeholder="" class="form-control"  v-model="witness1_fathers_name" name="witness1_father_name">
                                </div>
                                
                                <div class="form-group">
                                    <label for="country" class=" form-control-label">সাক্ষীর মাতার নাম ( বাংলায় )</label>
                                    <input readonly type="text" id="groom_mother" placeholder="" class="form-control"  v-model="witness1_mothers_name" name="witness1_mother_name">
                                </div>
                                
                                </div>
                                <button type="button" @click="witness1_info" class="form-control btn btn-primary btn-block">তথ্য যাচাই করুন </button>
                            </div>
                        </div>
                    </div>
        
                    <div class="col-lg-6 col-md-6">
                    <div class="card card-primary">
                        <div class="card-header"><strong>প্রথম সাক্ষী</strong><small> এর সম্পর্কে তথ্য </small></div>
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">জাতীয় পরিচয় পত্রের নম্বর </label>
                                    <input  type="text" id="nid" placeholder="1234567890" class="form-control" name="witness2_nid" v-model="witness2_nid">
                                </div>

                                <div class="bride-block">

                                <div class="form-group">
                                    <label for="name" class=" form-control-label">সাক্ষীর নাম ( বাংলায় )</label>
                                    <input readonly type="text" id="cname" placeholder="" class="form-control" v-model="witness2_name" name="witness2_name">
                                </div>

                                <div class="form-group">
                                    <label for="dob" class=" form-control-label">জন্ম তারিখ </label>
                                    <input readonly type="text" id="dob" placeholder="YYYY-MM-DD" class="form-control" v-model="witness2_dob" name="witness2_dob">
                                </div>
                                
                                <div class="form-group">
                                    <label for="fname" class=" form-control-label">সাক্ষীর পিতার নাম ( বাংলায় )</label>
                                    <input readonly type="text" id="fname" placeholder="" class="form-control" v-model="witness2_fathers_name" name="witness2_father_name">
                                </div>
                                
                                <div class="form-group">
                                    <label for="mname" class=" form-control-label">সাক্ষীর মাতার নাম ( বাংলায় )</label>
                                    <input readonly type="text" id="mname" placeholder="" class="form-control" v-model="witness2_mothers_name" name="witness2_mother_name">
                                </div>
        
                                </div>

                                <button type="button" @click="witness2_info" class="form-control btn btn-primary btn-block">তথ্য যাচাই করুন </button>
                            </div>
                        </div>
                    </div>
                </div>
                @csrf
                <button type="submit" class="form-control btn btn-block btn-primary">পরবর্তী ধাপ </button>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script type="module">
    let vi=new Vue({
        el:'.content',
        data:{
            witness1_name: '',
            witness1_fathers_name: '',
            witness1_mothers_name: '',
            witness1_dob: '',
            witness2_name: '',
            witness2_fathers_name: '',
            witness2_mothers_name: '',
            witness2_dob: '',
            witness1_nid: '',
            witness2_nid: '',
        },

        methods:{
            witness1_info:function(){
                axios.get('http://127.0.0.1:8000/api/get-nid?nid='+vi.witness1_nid)
                .then(function(response){
                    console.log(response.data);
                    var witness1=response.data;
                    vi.witness1_name=witness1.nid.name;
                    vi.witness1_fathers_name=witness1.nid.fathers_name;
                    vi.witness1_mothers_name=witness1.nid.mothers_name;
                    vi.witness1_dob=witness1.nid.dob;
                    if(witness1.marriage != null){
                        vi.prev_wife=witness1.marriage;
                        vi.prev_wife_nid=witness1.marriage.num;
                    }
                    else{
                        vi.prev_wife="N/A";
                        vi.prev_wife_nid="N/A";
                    }
                })
                .catch(function(error){
                    console.log(error);
                    $('.groom-block').hide();
                });
                $('.groom-block').show();
            },

            witness2_info:function(){
                axios.get('http://127.0.0.1:8000/api/get-nid?nid='+vi.witness2_nid)
                .then(function(response){
                    console.log(response.data);
                    var witness2=response.data;
                    vi.witness2_name=witness2.nid.name;
                    vi.witness2_fathers_name=witness2.nid.fathers_name;
                    vi.witness2_mothers_name=witness2.nid.mothers_name;
                    vi.witness2_dob=witness2.nid.dob;
                    if(witness2.marriage != null){
                        vi.prev_wife=witness2.marriage;
                        vi.prev_wife_nid=witness2.marriage.num;
                    }
                    else{
                        vi.prev_hus="N/A";
                        vi.prev_hus_nid="N/A";
                    }
                })
                .catch(function(error){
                    console.log(error);
                    $('.bride-block').hide();
                });
                $('.bride-block').show();
            },
            mounted(){
            $('.bride-block').hide();
            $('.groom-block').hide();
        }
        }

    })
</script>

