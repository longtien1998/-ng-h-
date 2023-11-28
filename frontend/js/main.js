(function ($) {
    "use strict";

    let dataCartStorage = JSON.parse(localStorage.getItem('cartData')) || [];
    console.log(dataCartStorage)
    let sumCart = document.querySelector('.sum-cart');
    sumCart.innerText = dataCartStorage.length || 0;


    function getParent(Element, Selector) {
        while (Element.parentElement) {
            if (Element.parentElement.matches(Selector)) {
                return Element.parentElement;
            } else {
                Element = Element.parentElement;
            }
        }
    }


    function addDataCart() {
        const btnAddCart = document.querySelectorAll('.btn-add-cart');
        let toastMessage = document.querySelector('.toast-message');

        btnAddCart.forEach((item, index) => {
            item.onclick = () => {
                if (item.matches('.btn-add-cart')) {
                    let parent = getParent(item, '.product-item');
                    let data = {};
                    data.id = parent.getAttribute('data-index');
                    data.name = parent.querySelector('.product-name').innerText;
                    data.price = Number((parent.querySelector('.product-price').innerText).replace('$', ''));
                    data.quantity = parent.querySelector('input[name="quantity"]') || 1;
                    data.thumbnail = parent.querySelector('.product-thumbnail').src;


                    // nếu giỏ hàng không rỗng
                    if (dataCartStorage.length > 0) {

                        // tạo id lưu trữ sản phẩm
                        let id;

                        // lặp qua mảng giỏ hàng
                        let check = dataCartStorage.some((item, index) => {
                            if (item.id === data.id) {
                                id = index;
                            }

                            return item.id === data.id;
                        })

                        // nếu sản phẩm đã tồn tại trong giỏ hàng, tăng số lượng sản phẩm thêm 1
                        // ngược lại sẽ thêm sản phẩm vào giỏ hàng
                        if (check) {
                            dataCartStorage[id].quantity += 1;
                        } else {
                            dataCartStorage.push(data);
                        }

                    } else {
                        dataCartStorage.push(data);
                    }

                    sumCart.innerText = dataCartStorage.length;

                    toastMessage.style.display = 'block';

                    item.innerHTML =
                        `<div class="spinner-border spinner-border-sm" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>`;



                    setTimeout(() => {
                        toastMessage.style.display = 'none';
                        item.innerHTML = `Show cart <i class="fa-solid fa-arrow-right ml-1"></i>`;
                        item.classList.remove('btn-add-cart');
                        item.setAttribute('href', './cart.php');
                    }, 500)

                    // Lưu dữ liệu vào biến localStorage
                    localStorage.setItem('cartData', JSON.stringify(dataCartStorage));
                }
            }


        })
    }

    // get cart data
    function getDataCart() {
        if (document.getElementById('table-cart')) {
            const tableCart = document.querySelector('#table-cart tbody');
            const subTotalCart = document.querySelector('.subtotal-cart');
            const totalCart = document.querySelector('.total-cart');
            let result = 0;
            let htmls;

            if (dataCartStorage.length > 0) {
                htmls = dataCartStorage.map((item, index) => {

                    result += item.quantity * item.price;

                    return `
                        <tr>
                            <td class="align-middle">${index + 1} <input type="hidden" name="" id="" value="${index + 1}"></td>
                            <td class="align-middle"><img src="${item.thumbnail}" alt="" style="width: 50px;"> ${item.name} <input type="hidden" name="" id="" value="${item.name}"></td>
                            <td class="align-middle">$${item.price}<input type="hidden" name="" id="" value="${item.price}"></td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus" >
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-gray-200 text-center" value="${item.quantity}">
                                    <input type="hidden" class="form-control" name="quantityUpdate" value="${item.quantity}">
                                    <input type="hidden" name="" id="" value="${item.quantity}">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">$${item.price * item.quantity} <input type="hidden" name="" id="" value="${item.price * item.quantity}"></td>
                            <td class="align-middle"><button class="btn-delete-cart btn btn-sm btn-primary" data-delete="${item.id}"> <i class="fa fa-times"></i></button></td>
                        </tr>
                        
                    `;
                });

                subTotalCart.innerText = `$${result}`;
                totalCart.innerText = `$${result + 10}`;

                tableCart.innerHTML = htmls.join('');

            };


        }
    }

    function updateCart() {
        if (document.querySelector('.btn-update-cart') && dataCartStorage.length > 0) {
            const btnUpdateCart = document.querySelector('.btn-update-cart');
            let toastMessage = document.querySelector('.toast-message');
            const quantityUpdate = document.querySelectorAll('input[name="quantityUpdate"]');

            btnUpdateCart.onclick = () => {

                quantityUpdate.forEach((item, index) => {
                    if (item.value != dataCartStorage[index].quantity) {
                        dataCartStorage[index].quantity = item.value;
                    }
                });

                localStorage.setItem('cartData', JSON.stringify(dataCartStorage));

                location.reload();


                // toastMessage.style.display = 'block';                        

                // setTimeout(() => {
                //     toastMessage.style.display = 'none';
                // }, 500)
            }
        }
    }

    function deleteCart() {
        if (document.querySelectorAll('.btn-delete-cart') && dataCartStorage.length > 0) {
            const btnDeleteCart = document.querySelectorAll('.btn-delete-cart');

            btnDeleteCart.forEach((item, index) => {
                item.onclick = () => {
                    getParent(item, 'tr').remove();

                    dataCartStorage.splice(index, 1);

                    localStorage.setItem('cartData', JSON.stringify(dataCartStorage));

                    location.reload();

                    // getDataCart();

                    // toastMessage.style.display = 'block';                        

                    // setTimeout(() => {
                    //     toastMessage.style.display = 'none';
                    // }, 500)
                }
            })
        }
    }


    function handleCheckout() {
        if (document.querySelector('.btn-proceed-ckeckout')) {
            const btnRedirect = document.querySelector('.btn-proceed-ckeckout');
            let toastMessage = document.querySelector('.toast-message');

            btnRedirect.onclick = (event) => {
                if (dataCartStorage.length <= 0) {
                    event.preventDefault();

                    toastMessage.style.display = 'block';

                    setTimeout(() => {
                        toastMessage.style.display = 'none';
                    }, 1000)
                }
            }

        }

        
        // render view checkout 
        if (dataCartStorage.length > 0 && document.querySelector('.order-products')) {
            const girdOrderProduct = document.querySelector('.order-products');
            let subTotalCheckout = document.querySelector('.subtotal-checkout');
            let totalCheckout = document.querySelector('.total-checkout');
            let result = 0;
            let i = 0;
            let tong = 0;
            const htmls = dataCartStorage.map((item) => {
                result += item.price * item.quantity;
                i++;
                tong = i;
                return `
                    <div class="d-flex justify-content-between">
                        <p>${item.name} x ${item.quantity}</p>
                        <input type="hidden" id="" name="name${i}" value="${item.name}">
                        <input type="hidden" id="" name="quantity${i}" value="${item.quantity}">
                        <p>$${item.price * item.quantity}</p>
                        <input type="hidden" id="" name="total${i}" value="${item.price * item.quantity}"> 
                    </div>
                    
                `;
            });

            girdOrderProduct.innerHTML = htmls.join('');
            subTotalCheckout.innerText = `$${result}`;
            totalCheckout.innerText = `$${result + 10}`;
            document.querySelector('.tongloai').innerHTML=tong;
            document.querySelector('.tong').value = tong;
        }
    }


    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }

        if ($(this).scrollTop() > 240) {
            $('.header-nav').addClass('header-nav-fixed');
        } else {
            $('.header-nav').removeClass('header-nav-fixed');
        }

    });
    $('.back-to-top').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 1500, 'easeInOutExpo');
        return false;
    });


    // Vendor carousel
    $('.vendor-carousel').owlCarousel({
        loop: true,
        margin: 29,
        nav: false,
        autoplay: true,
        smartSpeed: 1000,
        responsive: {
            0: {
                items: 2
            },
            576: {
                items: 3
            },
            768: {
                items: 4
            },
            992: {
                items: 5
            },
            1200: {
                items: 6
            }
        }
    });


    // Related carousel
    $('.related-carousel').owlCarousel({
        loop: true,
        margin: 29,
        nav: false,
        autoplay: true,
        smartSpeed: 1000,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 2
            },
            768: {
                items: 3
            },
            992: {
                items: 4
            }
        }
    });

    addDataCart();
    getDataCart();
    updateCart();
    deleteCart();
    handleCheckout();


    // Product Quantity
    $('.quantity button').on('click', function () {
        var button = $(this);
        var oldValue = button.parent().parent().find('input').val();
        if (button.hasClass('btn-plus')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        button.parent().parent().find('input').val(newVal);
    });

    // Silder main
    $(".slider-inner").slick({
        infinite: true,
        autoplay: true,
        autoplaySpeed: 1000,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        cssEase: "ease-in-out",
        prevArrow: '<a type="button" class="slick-prev"><i class="fa-solid fa-chevron-left"></i></a>',
        nextArrow: '<a type="button" class="slick-next"><i class="fa-solid fa-chevron-right"></i></a>'
    })


    //Product detail slider
    $(".product-slick-inner").slick({
        infinite: true,
        autoplay: true,
        autoplaySpeed: 3000,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
        easing: "linner",
        prevArrow: '<a type="button" class="slick-product-prev"><i class="fa-solid fa-chevron-left"></i></a>',
        nextArrow: '<a type="button" class="slick-product-next"><i class="fa-solid fa-chevron-right"></i></a>',
        asNavFor: "#slick-slide-navfor"
    });

    $("#slick-slide-navfor").slick({
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrow: false,
        focusOnSelect: true,
        asNavFor: ".product-slick-inner"
    })

})(jQuery);




        function showimg(id) {
            // alert('them')
            const  im =document.getElementById(0);
            const  im1 =document.getElementById(id);
          
           const im2= im1.getAttribute('src');
            im.setAttribute('src',im2)
        

        }
      
       
        var modal1 = document.getElementById("modal");
        var openButton1 = document.querySelector(".fa-eye");
        var closeButton1 = document.getElementsByClassName("close")[0];

        openButton1.addEventListener("click", function() {
        modal1.style.display = "block";
        });

        closeButton1.addEventListener("click", function() {
        modal1.style.display = "none";
        });
    
        
   
        var modal2 = document.getElementById("modal2");
        var openButton2 = document.querySelector(".play");
        var closeButton2 = document.getElementsByClassName("close2")[0];

        openButton2.addEventListener("click", function() {
        modal2.style.display = "block";
        });

        closeButton2.addEventListener("click", function() {
        modal2.style.display = "none";
        });
    
        