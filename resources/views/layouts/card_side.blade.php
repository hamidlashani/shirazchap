<section id="basket_1">
    <div class="basket_header">

        <div class="title">
            <i class="fas fa-shopping-basket"></i>
            سبد خرید
        </div>
        <div class="close cardclose">×</div>
    </div>
    <div class="basket_empty" style="display: none ;">
        <p class="basket_empty_title">سبد خرید خالی است</p>
        <!--<img class="basket_empty_img" alt="سبد خرید خالی است" src="/images/emptyBasket.gif"/>-->
    </div>
    <div class="basket_main">




        <div class="errorMessageBox" id="errorMessage">
            <div class="errorMessageBoxForm">
                <div class="errorMessageBoxTitle">اخطار!</div>
                <div class="errorMessageBoxContent">
                    <strong>عدم اتصال به اینترنت</strong>
                </div>
                <div class="errorMessageBoxButtons">
                    <span class="errorMessageBoxButtonClose">بستن</span>
                </div>
            </div>
        </div>
        <div class="basket_loading">
            <img class="basket_loading_img" alt="سبد خرید خالی است" src="/img/loading1.gif"/>
        </div>
        <!-- table basket -->
        <form method="post" action="{{ route('card.payment') }}" >
            @csrf



        <table class="shop_table">
            <thead>
            <tr>
                <th class="product-remove">شماره سفارش</th>
                <th class="product-name">عنوان سفارش</th>
                <!--                    <th class="product-price">قیمت فی</th>-->
                <th class="product-quantity">تعداد</th>
                <th class="product-subtotal">مبلغ سفارش</th>
            </tr>
            </thead>


                <tbody>




            </tbody>

        </table>
                <div class="enter_basket">
                    <button type="submit" class="enter_basket_button">نهایی کردن خرید</button>
                </div>

    </div>


    </form>

</section>

<script>
    //get site unit and unitName
    var unit = '1';
    var unitName = ' تومان ';
    var userId = -1;
    var roleId = -1;
    var cartModule = (function () {
        //controller action
        var action = 'site';

        //Dom Object
        var cartList = [];
        var festivals;
        var $table = $('table.shop_table');
        var $tableBody = $table.find('tbody');
        var $basket_loading = $('.basket_loading');
        var $sectionBasket = $('section#basket_1');
        var $errorMessage = $('#errorMessage');
        var $emptyBasket = $('.basket_empty');

        //get cart from site
        function getCart() {
            //clear table
            clearTable();
            hideError();
            showLoading();
            hideEmptyBasket();
            $sectionBasket.addClass('active');
            $sectionBasket.addClass('loaded');
            $('.enter_basket').hide();
            //ajax request
            $.get('{{ route('card.get_card_ajax') }}', function (data) {
                if (data) {
                    $table.show();
                    var items = data.items;
                    festivals = data.festivals;
                    //console.log(items);
                    //initial cart item
                    if (items && items !== 'undefined') {
                        initCartItem(items);
                    }
                    //append cart item to list
                } else {
                    //if not success
                    showError(data.message != null && data.message.length > 0 ? data.message[0] : 'خطا')
                }
                hideLoading();
                drawCart();
            }).fail(function () {
                cartList = [];
                hideLoading();
                drawCart();
                showError('خطا در ارسال درخواست')
            });
        }

        //change factor Count
        function changeCount(id, count) {
            hideError();
            var index = findByFactorId(id);
            if (index !== -1) {
                var item = cartList[index];
            }
            if (item && item !== 'undefined') {
                showLoading();
                $.ajax({
                    type: "POST",
                    url: "/order/update-order",
                    data: {
                        order_id: id,
                        count: count
                    },
                    dataType: "json",
                    success: function (data) {
                        if (data.success) {
                            if (parseInt(data.code) === 205) {
                                var element = $('.cart_item[data-id="' + id + '"]');
                                element.hide(1000, function () {
                                    element.remove();
                                });
                                //remove from list
                                cartList.splice(index, 1);
                                showError(data.message != null && data.message.length > 0 ? data.message[0] : 'خطا');
                            } else {
                                var response = data.result;
                                item.totalPaid = response.total_paid;
                                item.userTotal = response.user_payment_amount;
                                item.count = response.factor_item.count;
                            }

                        } else {
                            showError(data.message != null && data.message.length > 0 ? data.message[0] : 'خطا');
                        }
                        hideLoading();
                        drawCart();
                    },
                    error: function (data) {
                        hideLoading();
                        showError('خطا در ارسال درخواست')
                    }
                });
            }

        }

        //remove factor
        function removeItem(id, removeElement) {
            var index = findByFactorId(id);
            hideError();
            if (index !== -1) {
                //decrease badge
                $.ajax({
                    type: "POST",
                    url: "/order/user-delete-order",
                    data: {
                        order_id: id
                    },
                    dataType: "json",
                    success: function (data) {
                        $table.css({'filter': 'blur(0px)'});
                        if (data.success) {
                            removeElement.hide(1000, function () {
                                removeElement.remove();
                            });
                            //remove from list
                            cartList.splice(index, 1);
                            //update price
                            // if (action === 'cart') {
                            //     updatePrice(calcTotal());
                            //     itemRemoved(id,calcTotal());
                            // }
                        } else {
                            showError(data.message[0]);
                        }
                        drawCart();

                    },
                    error: function (data) {
                        $table.css({'filter': 'blur(0px)'});
                        showError('خطا در ارسال درخواست')
                    }
                });
                //re cal price
                $('table.shop_table .Price-total-all').html(calcTotal().toLocaleString())
            }
        }

        function isOptionPriceHidden(id, options) {
            for (var index in options) {
                if (options.hasOwnProperty(index)) {
                    for (let i = 0; i < options[index].length; i++) {
                        if (parseInt(id) === parseInt(options[index][i].id)) {
                            return parseInt(options[index][i].option_group_hidden) === 1;
                        }
                    }
                }
            }
            return true;
        }

        //create cart item list
        function initCartItem(items) {

            for (var i = 0; i < items.length; i++) {
                var item = items[i];

                var cartItem = null;
                    cartItem = new CartItem(
                        item.id,
                        item.order_id,
                        item.title,
                        item.device_name,
                        item.thickness_name,
                        item.height,
                        item.width,
                        item.pass_name,
                        item.count,
                        item.image,
                        item.price,
                    );

                cartList.push(cartItem);
            }
        }

        //add html tag to cart table
        function drawCart() {
            if (cartList.length > 0) {
                $('.basket_main , .enter_basket').show();
                $tableBody.html('');
                //set cart badge
                $('.card-count-badge').html(cartList.length);
                hideEmptyBasket();
                for (var j = 0; j < cartList.length; j++) {
                    var cart = cartList[j];

                    //console.log(cartList);


                    var newTr = '';

                    newTr = '<tr class="basket_1_cart-item cart_item" data-id="' + cart.id + '" id="order_' + cart.id + '">' +

                        '<td class="product-remove">' +
                            '<span onclick="ordedelete('+cart.id+')">'+
                        '<span  type="button" style="border: none !important;box-shadow: none;background: transparent;"> ' +
                        '<i  class="far fa-trash-alt" ></i>'+
                        '</span >'+
                        '</span>'+
                        '<input type="hidden" value="'+cart.id+'" name="orderid[]"> '+
                        '<span onclick="onepay('+cart.id+')" class="btn btn-success btn-sm mr-2">پرداخت</span> '+
                        '</td>';

                        newTr += '<td class="product-nameService">' +
                                '<a style="color:#1b1e21 " href="/showorder/'+cart.id+'">'+
                    cart.title +
                                '</a>'+
                     '</td>';

                       newTr += '<td class="product-quantity">'+cart.count+'</td>';

                    // cart.getPrice() +

                    newTr += '<td class="product-subtotal" data-title="جمع کل">' +
                            '<input type="hidden" class="orderprice" value="'+parseInt(cart.price)+'"> '+
                        '<span class="total_amount">' +
                        parseInt((cart.price)).toLocaleString() +
                        '<span class="Price-currencySymbol">' +
                        ' تومان ' +
                        '</span>' +
                        '</span>' +
                        '</td>'+
                        '</tr>';
                    $tableBody.append(newTr);
                }

                $tableBody.append(calcTotalPriceTrHtml());
                var totalPrice = calcTotal();
                $tableBody.append(calcFestivalTrHtml(totalPrice));

            } else {
                clearTable();
                showEmptyBasket();
            }
        }

        //فستیوال



        //مجموع کل سفارش
        function calcTotalPriceTrHtml() {
            var totalPrice = calcTotal();
            return '<tr>' +
                '<td colspan="3" class="basketTotalTitle">' +
                'جمع کل' +
                '</td>' +
                '<td colspan="1" class="basketTotalPrice">' +
                '<span class="Price-total-all">' + totalPrice.toLocaleString() + '</span>' +
                '<span class="Price-currency">' +
                unitName +
                '</span>' +
                '</td>' +
                '</tr>'
        }


        function showEmptyBasket() {
            $('.basket_main , .enter_basket').hide();
            $emptyBasket.fadeIn(600);
            $('.card-count-badge').html(0);
        }

        function hideEmptyBasket() {
            $emptyBasket.hide();
        }

        function clearTable() {
            $table.hide();
            cartList = [];
            $tableBody.html('');
        }

        function hideError() {
            $errorMessage.hide();
        }

        function showError(message) {
            $errorMessage.show();
            $errorMessage.find('.errorMessageBoxContent strong').html(message);
        }

        function showLoading() {
            $basket_loading.fadeIn();
        }

        function hideLoading() {
            $basket_loading.fadeOut('slow');
        }

        function findByFactorId(id) {
            for (var i = 0; i < cartList.length; i++) {
                if (parseInt(cartList[i].factorId) === parseInt(id)) {
                    return i;
                }
            }
            return -1;
        }

        function calcTotal() {
            var sum = 0;
            for (var i = 0; i < cartList.length; i++) {
                var cart = cartList[i];
                sum += parseInt(cart.price);
            }
            return sum / unit;
        }

        function calcUserTotal() {
            var sum = 0;
            for (var i = 0; i < cartList.length; i++) {
                var cart = cartList[i];
                sum += parseInt(cart.userTotal);
            }
            return sum / unit;
        }

        getCart();

        //revealing function
        return {
            getCart: getCart,
            changeCount: changeCount,
            removeItem: removeItem
        };
    })();

    //Cart Item
    var CartItem = (function (
        id,
        order_id,
        title,
        device_name,
        thickness_name,
        height,
        width,
        pass_name,
        count,
        image,
        price
    ) {
        this.id = id;
        this.order_id = order_id;
        this.title = title;
        this.device_name = device_name;
        this.thickness_name = thickness_name;
        this.height = height;
        this.width = width;
        this.pass_name = pass_name;
        this.count = count;
        this.image = image;
        this.price = price;


    });






</script>

<div class="cart">
    <span class="badge badge-pill badge-danger card-count-badge">0</span>
    <i class="fas fa-shopping-basket"></i>
</div>

