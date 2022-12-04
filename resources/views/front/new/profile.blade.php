@extends('front.new.layout')
@if(\App::isLocale('th'))
    @section('title','ข้อมูลส่วนตัว '.$user->first_name.' '.$user->last_name)
@else
    @section('title','Profile '.$user->first_name.' '.$user->last_name)
@Endif
@if(\App::isLocale('th'))
@section('metadesc',$settings->meta_description)
@else
@section('metadesc',$settings->meta_description_en)
@endif
<div style="margin-top: 60px">
@section('content')
<?php
$badges = $badges_en;
if(\App::isLocale('th')) {
    $badges = $badges_th;
    $m1 = "<strong>คุณต้องการให้ <br  /><u> แต้ม 1 วัน 1 แต้ม</u></strong>";
    $m2 = "ตกลง";
    $m3 = "ยกเลิก";
    $m4 = "บันทึกสำเร็จ";
    $m5 = "วันนี้คุณได้ให้ผู้ใช้คนอื่นแล้ว";
    $m6 = "ยกเลิกหารใช้แต้ม";
    $m7 = "แต้มที่ได้";
    $m8 = "ให้แต้ม 1 วัน 1 แต้ม";
    $m9 = "จำนวนความคิดเห็น";
}else{
    $m1 = "<strong>You want <br /><u> 1 day 1 point</u></strong>";
    $m2 = "OK";
    $m3 = "Cancel";
    $m4 = "Save successfully";
    $m5 = "You have given it to another user today.";
    $m6 = "Cancel division, Use points";
    $m7 = "Points";
    $m8 = "Give 1 point 1 day 1 point";
    $m9 = "Comment Count";
}
?>
<div class="container-profile">
    <section class="container text-center pt-5">

        <div class="mt-5 row">
            <div class="col-md-3 text-right"></div>
            <div class="col-md-6 text-right">
                @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close close-btn1" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ trans('index.successinbox') }}
                            </div>
                        @endif

                        @if(count($errors) > 0)
                                <div class="alert alert-danger alert-dismissible">
                                 <a href="#" class="close close-btn1" data-dismiss="alert" aria-label="close">&times;</a>
                                 {{ trans('validation.errorinbox') }}
                                </div>
                        @endif
                <div class="contactus-box container text-center" style="background:#F5F5F5">
                    <h2>
                        {{ trans('index.about') }}
                    </h2>

<!--                    <div class="text-center">-->
<!--                        <img class="seprator-img" src="{{asset('theme/images/seperator-mid.png')}}" />-->
<!--                    </div>-->

                    <div class="mt-2 text-center">
                        {{---
                      @if($user->admin_status==3)
                            <img style="height: 150px" src="{{asset('assets/badges/admin.png')}}"
                            alt=""
                            class="img-rounded" />
                        @elseif($user->admin_status==2 || $user->admin_status==1)
                            <img style="height: 150px" src="{{asset('assets/badges/advertiser.png')}}"
                            alt=""
                            class="img-rounded" />
                        @elseif($user->rank > 0 && $user->rank <= 75)
                            <img style="height: 150px" src="{{asset($badges[0]['image'])}}"
                            alt=""
                            class="img-rounded" />
                        @elseif($user->rank > 75 && $user->rank <= 150)
                            <img style="height: 150px" src="{{asset($badges[1]['image'])}}"
                            alt=""
                            class="img-rounded" />
                        @elseif($user->rank > 150 && $user->rank <= 225)
                            <img style="height: 150px" src="{{asset($badges[2]['image'])}}"
                            alt=""
                            class="img-rounded" />
                        @elseif($user->rank > 225 && $user->rank <= 300)
                            <img style="height: 150px" src="{{asset($badges[3]['image'])}}"
                            alt=""
                            class="img-rounded" />
                        @elseif($user->rank > 300 && $user->rank <= 375)
                            <img style="height: 150px" src="{{asset($badges[4]['image'])}}"
                            alt=""
                            class="img-rounded" />
                        @elseif($user->rank > 375 && $user->rank <= 450)
                             <img style="height: 150px" src="{{asset($badges[5]['image'])}}"
                              alt=""
                              class="img-rounded" />
                        @elseif($user->rank > 450 && $user->rank <= 525)
                             <img style="height: 150px" src="{{asset($badges[6]['image'])}}"
                             alt=""
                             class="img-rounded" />
                        @elseif($user->rank > 525)
                             <img style="height: 150px" src="{{asset($badges[7]['image'])}}"
                              alt=""
                              class="img-rounded" />
                        @else
                             <img style="height: 150px" src="{{asset($badges[0]['image'])}}"
                              alt=""
                              class="img-rounded" />
                        @endif
                        ---}}
                        <img style="height: 150px" class="badges" src="{{asset('assets/badges/'.$user->badges_system_id.'.png')}}"alt="" class="img-rounded" />
                      <p class="blue-color">
                        @if($user->admin_status==3)
                                                    Admin
                                                @elseif($user->admin_status==1 || $user->admin_status==2)
                                                    Advertiser
                          @else
                          @if($user->rank > 0 && $user->rank <= 75)
                          {{$badges[0]['question']}}
                          @elseif($user->rank > 75 && $user->rank <= 150)
                          {{$badges[1]['question']}}
                          @elseif($user->rank > 150 && $user->rank <= 225)
                          {{$badges[2]['question']}}
                          @elseif($user->rank > 225 && $user->rank <= 300)
                          {{$badges[3]['question']}}
                          @elseif($user->rank > 300 && $user->rank <= 375)
                          {{$badges[4]['question']}}
                          @elseif($user->rank > 375 && $user->rank <= 450)
                          {{$badges[5]['question']}}
                          @elseif($user->rank > 450 && $user->rank <= 525)
                          {{$badges[6]['question']}}
                          @elseif($user->rank > 525)
                          {{$badges[7]['question']}}
                          @else
                          {{$badges[0]['question']}}
                          @endif
                          @endif
                      </p>

                      <p style="text-shadow: 3px 3px 3px #707070;color:#00000">
                        {{$user->user_name}}
                        {{$user->user_id}}
                      </p>

                      <p>
                        {{ trans('index.commentcount') }} : {{$user->rank}}
                      </p>
                      <p>
                      <?php print($m7);?> : <b class="point">{{$user->badges_point}}</b>
                      </p>

                      <p>
                        <a href="{{asset('commenthistory/'.$user->id)}}" style="color:#03BAFF" href="">
                          {{ trans('index.commenthistory') }}
                        </a>
                      </p>

                      <p style="color:#707070">
                        {{ trans('index.joined') }} : {{date('Y-m-d H:i',strtotime('+7 hour',strtotime($user->created_at)))}}
                      </p>

                    </div>
                    <?php
                        $star = $user->badges_point/50;

                        if(intval($star) > 1){
                            for ($i=0; $i < intval($star); $i++) {
                               // print($i);
                               //print("<i class='fa fa-star fa-2x' style='color: #f33535'></i>");
                               print('<i class="bi bi-square-fill fs-2x" style="color: #0EFF00"></i> ');
                            }
                        }
                        $star = $user->badges_point%50;
                        if($star >= 25 && $star < 50){
                            print("<i class='bi bi-square-half fs-2x' style='color: #053B01'></i>");
                        }

                    ?>

                    @if($ismessage)


                    <form accept-charset="UTF-8" action="{{route('sendmessage',array('user'=>$user))}}" method="POST">
                      @csrf
                      <div class="form-group text-left profile-message">
                          <textarea style="padding: 3.5rem 0.75rem;" name="message" placeholder="{{trans('index.placeholdermessage')}}" class="form-control">{{old('message')}}</textarea>
                       </div>
                       <?php if(isset($arr_user) && $arr_user!= null){?>
                      <button class="btn btn-pr" style="width: auto;padding-left:50px;padding-right:50px;">{{ trans('index.sendmessage') }}</button>
                      <input type="button" class="btn btn-info" onclick="b()" style="width: auto;padding-left:50px;padding-right:50px;" value=" <?php print($m8);?>">
                        <?php } ?>
                    </form>

                    @endif

                    <br />
                    <br />
                </div>
            </div>
            <div class="col-md-3 text-right"></div>
        </div>

    </section>
    <br />
    <br />
    <br />
    <br />
</div>
</div>
<script>
    function b(){
        Swal.fire({
                    title: '<?php print($m1);?>',
                    icon: 'info',
                    showCloseButton: true,
                    showCancelButton: true,
                    focusConfirm: false,
                    confirmButtonText:'<i class="fa fa-thumbs-up"></i> <?php print($m2);?>!',
                    confirmButtonAriaLabel: 'Thumbs up, great!',
                    cancelButtonText:'<i class="fa fa-thumbs-down"></i> <?php print($m3);?>',
                    cancelButtonAriaLabel: 'Thumbs down'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
                        let formData = new FormData();
                        formData.append('id', {{$user->id}});
                        $.ajax({
                                type: 'POST',
                                url: '{{ url('/badges') }}',
                                data: formData,
                                async: false,
                                cache: false,
                                contentType: false,
                                enctype: 'multipart/form-data',
                                processData: false
                            , })
                            .done(function(data) {
                                console.log(data);
                                if(data.success){
                                    //console.log(data.badges_point);
                                    $(".point").html(data.badges_point);
                                    var img = "{{asset('assets/badges')}}/"+data.badges_system_id+".png";
                                    console.log(img);
                                    $(".badges").attr("src",img);
                                    Swal.fire('<?php print($m4);?>', '', 'success')
                                }else{
                                    Swal.fire('<?php print($m5);?>', '', 'warning')
                                }
                            }).fail(function(res) {

                            });

                    } else if (result.isDenied) {
                        Swal.fire('<?php print($m6);?>', '', 'info')
                    }
                    })
    }
</script>
@stop
