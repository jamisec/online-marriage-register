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
                <form action="" method="post">
        
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="card card-primary">
                            <div class="card-header"><strong>বর </strong><small> এর সম্পর্কে তথ্য </small></div>
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">জাতীয় পরিচয় পত্রের নম্বর </label>
                                    <input  type="text"  placeholder="1234567890" class="form-control" name="groom_nid" v-model="groom_nid">
                                </div>
                                <div class="groom-block">
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">বরের নাম ( বাংলায় )</label>
                                    <input readonly type="text"  placeholder="" class="form-control"  v-model="groom_name" name="groom_name" >
                                </div>
                                <div class="form-group">
                                    <label for="street" class=" form-control-label">জন্ম তারিখ </label>
                                    <input readonly type="text"  placeholder="YYYY-MM-DD" class="form-control"  v-model="groom_dob" name="groom_dob">
                                </div>
                                
                                <div class="form-group">
                                    <label for="city" class=" form-control-label">পিতার নাম ( বাংলায় )</label>
                                    <input readonly type="text"  placeholder="" class="form-control"  v-model="groom_fathers_name" name="groom_father_name">
                                </div>
                                
                                <div class="form-group">
                                    <label for="country" class=" form-control-label">মাতার নাম ( বাংলায় )</label>
                                    <input readonly type="text" id="groom_mother" placeholder="" class="form-control"  v-model="groom_mothers_name" name="groom_mother_name">
                                </div>
        
                                <div class="form-group">
                                    <label for="country" class=" form-control-label">পূর্ব বিবাহিত কি না ?</label>
                                    <input readonly type="text" id="prev_wife" placeholder="" class="form-control" name="prev_wife" v-model="prev_wife">
                                </div>
        
                                <div class="form-group">
                                    <label for="country" class=" form-control-label">পূর্ব বিবাহিত স্ত্রীর জাতীয় পরিচয় পত্রের নম্বর </label>
                                    <input readonly type="text" id="prev_wife_nid" placeholder="" class="form-control" name="prev_wife_nid" v-model="prev_wife_nid">
                                </div>
                                
                                </div>
                                <button type="button" @click="groom_info" class="form-control btn btn-primary btn-block">তথ্য যাচাই করুন </button>
        
                               
        
                            </div>
                        </div>
                    </div>
        
                    <div class="col-lg-6 col-md-6">
                    <div class="card card-primary">
                            <div class="card-header"><strong>কনে </strong><small> এর সম্পর্কে তথ্য </small></div>
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">জাতীয় পরিচয় পত্রের নম্বর </label>
                                    <input  type="text" id="nid" placeholder="1234567890" class="form-control" name="bride_nid" v-model="bride_nid">
                                </div>

                                <div class="bride-block">

                                <div class="form-group">
                                    <label for="name" class=" form-control-label">কনের নাম ( বাংলায় )</label>
                                    <input readonly type="text" id="cname" placeholder="" class="form-control" v-model="bride_name" name="bride_name">
                                </div>

                                <div class="form-group">
                                    <label for="dob" class=" form-control-label">জন্ম তারিখ </label>
                                    <input readonly type="text" id="dob" placeholder="YYYY-MM-DD" class="form-control" v-model="bride_dob" name="bride_dob">
                                </div>
                                
                                <div class="form-group">
                                    <label for="fname" class=" form-control-label">পিতার নাম ( বাংলায় )</label>
                                    <input readonly type="text" id="fname" placeholder="" class="form-control" v-model="bride_fathers_name" name="bride_father_name">
                                </div>
                                
                                <div class="form-group">
                                    <label for="mname" class=" form-control-label">মাতার নাম ( বাংলায় )</label>
                                    <input readonly type="text" id="mname" placeholder="" class="form-control" v-model="bride_mothers_name" name="bride_mother_name">
                                </div>
        
                                <div class="form-group">
                                    <label for="country" class=" form-control-label">পূর্ব বিবাহিতা কি না ?</label>
                                    <input readonly type="text" id="prev_hus" placeholder="" class="form-control" name="prev_hus" v-model="prev_hus">
                                </div>
        
                                <div class="form-group">
                                    <label for="country" class=" form-control-label">পূর্ব বিবাহিতা স্বামীর জাতীয় পরিচয় পত্রের নম্বর </label>
                                    <input readonly type="text" id="prev_hus_nid" placeholder="" class="form-control" name="prev_hus_nid" v-model="prev_hus_nid">
                                </div>
        
                                </div>

                                <button type="button" @click="bride_info" class="form-control btn btn-primary btn-block">তথ্য যাচাই করুন </button>
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
            groom_name: '',
            groom_fathers_name: '',
            groom_mothers_name: '',
            groom_dob: '',
            bride_name: '',
            bride_fathers_name: '',
            bride_mothers_name: '',
            bride_dob: '',
            groom_nid: '',
            bride_nid: '',
            prev_wife:'',
            prev_wife_nid:'',
            prev_hus:'',
            prev_hus_nid:''
        },

        methods:{
            groom_info:function(){
                axios.get('http://127.0.0.1:8000/api/get-nid?nid='+vi.groom_nid)
                .then(function(response){
                    console.log(response.data);
                    var groom=response.data;
                    vi.groom_name=groom.nid.name;
                    vi.groom_fathers_name=groom.nid.fathers_name;
                    vi.groom_mothers_name=groom.nid.mothers_name;
                    vi.groom_dob=groom.nid.dob;
                    if(groom.marriage != null){
                        vi.prev_wife=groom.marriage;
                        vi.prev_wife_nid=groom.marriage.num;
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

            bride_info:function(){
                axios.get('http://127.0.0.1:8000/api/get-nid?nid='+vi.bride_nid)
                .then(function(response){
                    console.log(response.data);
                    var bride=response.data;
                    vi.bride_name=bride.nid.name;
                    vi.bride_fathers_name=bride.nid.fathers_name;
                    vi.bride_mothers_name=bride.nid.mothers_name;
                    vi.bride_dob=bride.nid.dob;
                    if(bride.marriage != null){
                        vi.prev_wife=bride.marriage;
                        vi.prev_wife_nid=bride.marriage.num;
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

