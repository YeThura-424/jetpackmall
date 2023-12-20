$(document).ready(function() {
    cartNoti();
    getshowData();
    removeItem();
    $('.addtocartBtn').on('click', function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var codeno = $(this).data('codeno');
        var photo = $(this).data('photo');
        var unitprice = $(this).data('unitprice');
        var discount = $(this).data('discount');
        var qty = 1;

        var mylist = {
            id: id,
            name: name,
            photo: photo,
            unitprice: unitprice,
            discount: discount,
            qty: qty
        };

        // console.log(mylist);
        // qty plus when id is same
        var local = localStorage.getItem('item');
        if (local == null) {
            var localItem = Array();
        } else {
            var localItem = JSON.parse(local);
        }

        var status = false;

        $.each(localItem, function(i, v) {
            if (id == v.id) {
                v.qty++;
                status = true;
            }

        })
        if (!status) {
            localItem.push(mylist);
        }

        localStorage.setItem('item', JSON.stringify(localItem));
        cartNoti();
        removeItem();
        getshowData();

    })

    // get data from localstorage and show in the table

    function getshowData() {
        var local = localStorage.getItem('item');
        var localItem = JSON.parse(local);
        var cartItem = '';
        if (local) {
            $.each(localItem, function(i, v) {
                var id = v.id;
                var name = v.name;
                var photo = v.photo;
                var unitprice = v.price;
                var discount = v.discount;
                var qty = v.qty;

                if (discount) {
                    var price = discount;
                } else {
                    var price = unitprice;
                }

                var subtotal = price * qty;

                cartItem += `<tr>
                <td class="shoping__cart__item">
                <img src="${photo}" class="img-fluid" width = "100">
                <h5>${name}</h5>
                </td>
                <td class="shoping__cart__price">
                ${price}
                </td>
                <td class="shoping__cart__quantity">
                <div class="quantity">
                <div class="pro-qty">
                <i class="icofont-plus" data-id="${i}"></i>
                <input type="text" value="${qty}">  
                <i class="icofont-minus" data-id="${i}"></i>
                </div>
                </div>
                </td>
                <td class="shoping__cart__total">
                ${subtotal}
                </td>
                <td class="shoping__cart__item__close">
                <span class="icon_close" data-id="${i}"></span>
                </td>
                </tr>`
            })

            $('#result').html(cartItem);
        } else {
            $('#result').html('There is no item in the cart!');
        }
        increaseQty();
        decreaseQty();
        removeItem();
    }
    // shopping cart notifation and cart total notification
    function cartNoti() {
        var local = localStorage.getItem('item');
        if (local) {
            var localItem = JSON.parse(local);
            var total = 0; //total kyats for cart
            var noti = 0; //total qty for cart
            $.each(localItem, function(i, v) {
                var unitprice = v.price;
                var discount = v.discount;
                var qty = v.qty;
                //putting value price of item without discount items
                if (discount) {
                    var price = discount;
                } else {
                    var price = unitprice;
                }

                var subtotal = price * qty;
                noti += qty++;
                total += subtotal++;
            })
            $('.shoppingcartNoti').html(noti);
            $('.shoppingcartTotal').html(total + "MMK");
        } else {
            $('.shoppingcartNoti').html(0);
            $('.shoppingcartTotal').html(0 + "MMK");
        }
        removeItem();
    }

    // qty increase 
    function increaseQty() {
        $('.icofont-plus').on('click', function() {
            var id = $(this).data('id');
            // alert(`${id}`);
            var local = localStorage.getItem('item');
            var localItem = JSON.parse(local);
            $.each(localItem, function(i, v) {
                if (i == id) {
                    v.qty++;
                }
            })
            localStorage.setItem('item', JSON.stringify(localItem));
            cartNoti();
            getshowData();
        })
    }
    // qty decrease
    function decreaseQty() {
        $('.icofont-minus').on('click', function() {
            var id = $(this).data('id');
            // alert(`${id}`);
            var local = localStorage.getItem('item');
            var localItem = JSON.parse(local);
            $.each(localItem, function(i, v) {
                if (i == id) {
                    v.qty--;

                    if (v.qty == 0) {
                        localItem.splice(id, 1);
                    }
                }
            })
            localStorage.setItem('item', JSON.stringify(localItem));
            cartNoti();
            getshowData();
        })
    }

    // romove item

    function removeItem() {
        $('.icon_close').on('click', function() {
            var local = localStorage.getItem('item');
            var localItem = JSON.parse(local);
            var id = $(this).data('id');
            // alert(id);

            localItem.splice(id, 1);

            localStorage.setItem('item', JSON.stringify(localItem));
            getshowData();
            cartNoti();
        })
    }

    $('.checkoutBtn').click(function() {
        var cart = localStorage.getItem('item');
        var note = $('#note').val();

        // console.log(cart);
        // console.log(note);

        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        })

        $.post('/order', { data: cart, note: note }, function(response) {
            localStorage.clear();
            location.href = "ordersuccess";
        })
    })
})
