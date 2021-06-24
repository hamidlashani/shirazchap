<footer class="ftr_1031 block - init lightb - back">
    <div class="ftr_1031__container container">
        <div class="ftr_1031__row row align-items-top text-center">
            <div class="ftr_1031__bottom__col col-12 col-md-12 col-lg-10 text-center text-lg-right">
                <p>

                    چاپخانه شیراز چاپ از سال 1388 فعالیت خود را در زمینه چاپ لارج فورمت آغاز نموده و تا کنون افتخار همکاری با نهادها ، ادارات دولتی ، شرکت ها و بانک های گوناگونی را داشته است که در زیر به تعدادی از آنها اشاره می گردد. این مجموعه از زمان تاسیس با توجه به اعتقاد واقعی اعضاء مجموعه به اصل مشتری مداری موفق شده است که تا به امروز با بیش از 300 اداره دولتی ،موسسات ، شرکت ها ی کوچک و بزرگ همکاری موفق ای را داشته باشد، که این خود برگ زرینی و ضمانتی است در جهت اهداف بزرگ این مجموعه امید است که بتوانیم رضایت کامل شما را هم جلب نمائیم. این مجموعه با بکارگیری بهترین دستگاههای چاپ دنیا در کنار متخصصین زبده این حرفه تا کنون توانسته تمامی نیازهای مشتریان خود را برآورده کند .

                </p>
            </div>

            <div class="ftr_1031__bottom__col col-12 col-md-12 col-lg-2 text-center text-lg-right">
                <div class="namad">
                    <a target="_blank" href="https://trustseal.enamad.ir/?id=18448&amp;Code=rckvnBSjG6E8u2BuRhow"><img src="https://Trustseal.eNamad.ir/logo.aspx?id=18448&amp;Code=rckvnBSjG6E8u2BuRhow" alt="" style="cursor:pointer" id="rckvnBSjG6E8u2BuRhow"></a>
                </div>
            </div>


        </div>
    </div>
    <div class="ftr_1031__copyright copyright mt-3 pt-3">
        <div class="ftr_1031__container container">
            <div class="ftr_1031__row row">
                <div class="ftr_1031__copyright__main col-12 col-md-6 col-lg-6 text-md-right text-center ">
                      طراحی و مدیریت <a class="footer_socket" href="#">حمید لشنی</a>
                </div>
                <div class="ftr_1031__copyright__main col-12 col-md-6 col-lg-6 text-md-left text-center  en-font">
                    POWERED BY <a class="footer_socket" href="#">Hamid Lashani</a>
                </div>
            </div>
        </div>
    </div>
	
</footer>
<script>

    $('.cart').click(function() {
        $("#basket_1").css("right",0);
    });
    $('.close').click(function() {
        $("#basket_1").css("right","-730px");
    });


function onepay(id) {
    alert(id)
}


function ordedelete(id) {


    swal({
        title: "پیام سیستم",
        text: ("آیا از حذف سفارش اطمینان ارید ؟ "),
        type: "warning", //type and imageUrl have been replaced with a single icon option.
        icon:'warning', //The right way
        showCancelButton: true, //showCancelButton and showConfirmButton are no longer needed. Instead, you can set buttons: true to show both buttons, or buttons: false to hide all buttons. By default, only the confirm button is shown.
        confirmButtonColor: '#d33', //you should specify all stylistic changes through CSS. As a useful shorthand, you can set dangerMode: true to make the confirm button red. Otherwise, you can specify a class in the button object.
        confirmButtonText: "بله", // everything is in the buttons argument now
        closeOnConfirm: false,
        buttons:true,//The right way
        buttons: ["خیر", "بله"] //The right way to do it in Swal1
    })
        .then(function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: "{{ route('order.delete') }}",
                    data:{
                        "_token": "{{ csrf_token() }}",
                        id:id},
                    type: "POST",
                    cache: false,
                    success: function(res){

                        $('#order_'+res.id).remove();

                        var totalprice = $('.orderprice').map((_,el) => el.value).get();

                        var total = 0;
                        $.each(totalprice,function() {
                            total += parseInt(this, 10);
                        });

                        if(total == 0){
                            $('.enter_basket_button').attr('disabled','disabled')

                        }
                        $('.Price-total-all').html(total.toLocaleString());

                        swal(
                            'پیام سیستم',
                            'سفارش '+ res.title +' با موفقیت حذف شد.',
                            'success'
                        )

                    }
                });
            }
        });






}






</script>