@extends('profile.layout')

@section('main')
    <div class="container rounded bg-white mt-5 mb-5 profile">
        @if($errors->all())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

        @endif
        <form action="" method="post">
            @csrf
            <div class="row">
                <div class="col-md-4 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="rounded-circle mt-5 avatarimg" src="@if($user->avatar){{ '/avatars/'.$user->avatar}} @else /images/avatar.png @endif ">
<form>
                        <label for="file" class="editavatar"><i class="fas fa-edit"></i></label>
                        <input type="file" name="file" id="file" style="display: none">
</form>
                        <div class="progress" style="display: none">
                            <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                        </div>
                        <span class="font-weight-bold">{{ $user->name }}</span>
                        <span class="text-black-50">{{ $user->company }}</span>
                    </div>

<style>
    .progress {
        height: 1rem;
        overflow: hidden;
        line-height: 0;
        font-size: 0.675rem;
        background-color: #e9ecef;
        border-radius: 0;
        position: absolute;
        top: 50px;
        width: 100% !important;
    }
    .progress-bar{
        background: #0a090b;
    }
</style>


                    <script>


                        $('#file').on('change', function() {
                            $('.progress').show('slow');



                            var file_data = $('#file').prop('files')[0];
                            var form_data = new FormData();
                            form_data.append('file', file_data);
                            form_data.append('_token', '{{ @csrf_token() }}');
                            $.ajax({
                                xhr: function() {
                                    var xhr = new window.XMLHttpRequest();

                                    xhr.upload.addEventListener("progress", function(evt) {

                                        if (evt.lengthComputable) {
                                            var percentComplete = evt.loaded / evt.total;
                                            percentComplete = parseInt(percentComplete * 100);
                                            $('.progress-bar').width(percentComplete+'%');
                                            $('.progress-bar').html(percentComplete+'%');
                                            if(percentComplete == 100){
                                                $('.progress').hide();
                                            }
                                        }
                                    }, false);

                                    return xhr;
                                },
                                url: '{{ route('avatar') }}', // point to server-side PHP script
                                dataType: 'text',  // what to expect back from the PHP script, if anything
                                cache: false,
                                contentType: false,
                                processData: false,
                                data: form_data,
                                type: 'post',
                                success: function(response) {
                                    var unique = $.now();
                                    $('.avatarimg').attr('src', '/avatars/'+response+'?' + unique);

                                }
                            });
                        });


                    </script>














                </div>
                <div class="col-md-8 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">ویرایش اطلاعات کاربری</h4>
                        </div>

                        <div class="row">

                            <div class="col-md-6 mt-3">
                                <label class="labels">نام و نام خانوادگی</label>
                                <input required name="name" type="text" class="form-control" value="{{ $user->name }}" placeholder="نام و نام خانوادگی">
                            </div>

                            <div class="col-md-6 mt-3">
                                <label class="labels">تلفن همراه</label>
                                <input pattern="09(1[0-9]|3[1-9]|2[0-9])-?[0-9]{3}-?[0-9]{4}" required name="cellphone" type="tel" class="form-control" value="{{ $user->cellphone }}" placeholder="تلفن همراه">
                            </div>

                            <div class="col-md-6 mt-3">
                                <label class="labels">پست الکترونیک</label>
                                <input readonly name="email" type="email" class="form-control" value="{{ $user->email }}" placeholder="پست الکترونیک">
                            </div>

                            <div class="col-md-6 mt-3">
                                <label class="labels">نام شرکت</label>
                                <input required name="company" type="text" class="form-control" value="{{ $user->company }}" placeholder="نام شرکت">
                            </div>

                            <div class="col-md-6 mt-3">
                                <label  class="labels">تلفن ثابت</label>
                                <input pattern="^0[0-9]{2,}[0-9]{7,}$" name="phone" type="tel" class="form-control" value="{{ $user->phone }}" placeholder="تلفن ثابت">
                            </div>

                            <div class="col-md-6 mt-3">
                                <label class="labels">آدرس</label>
                                <input required name="address" type="text" class="form-control" value="{{ $user->address }}" placeholder="آدرس">
                            </div>

                            <div class="col-md-6 mt-3">
                                <label class="labels">کلمه عبور</label>
                                <input minlength="8"
                                       pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                       title="کلمه عبور می بایست از حروف کوچک و بزرگ به همراه کارکتر خاص تشکیل شود"
                                       name="password"
                                       type="password" class="form-control" value="" placeholder="کلمه عبور">
                            </div>

                            <div class="col-md-6 mt-3">
                                <label class="labels">تکرار کلمه عبور</label>
                                <input name="password_confirm" type="password" class="form-control" value="" placeholder="تکرار کلمه عبور">
                            </div>
<!--
                            <div class="col-md-4 mt-3">
                                <label class="labels">ورود 2 مرحله ای</label>
                                <input name="two_factor"
                                       type="checkbox"
                                       class="form-control"
                                       @if($user->two_factor == 1)
                                        checked
                                       @endif
                                       value="1">
                            </div>
-->


                        </div>

                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">ثبت تغییرات</button></div>
                    </div>
                </div>
          </div>
        </form>
    </div>


    <style>
        .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8
        }

        .profile-button {
            background: rgb(99, 39, 120);
            box-shadow: none;
            border: none
        }

        .profile-button:hover {
            background: #682773
        }

        .profile-button:focus {
            background: #682773;
            box-shadow: none
        }

        .profile-button:active {
            background: #682773;
            box-shadow: none
        }

        .profile img{
            width: 150px;
            height: 150px;
        }
        .profile label{
            float: right;
        }
    </style>



    <script src="/js/lc_switch.js" type="text/javascript"></script>

    <script type="text/javascript">
        lc_switch('input[type=checkbox], input[type=radio]', {
        on_txt: 'فعال',
        off_txt: 'غیرفعال',
        on_color: false,
        compact_mode: false
        });
</script>
@endsection

