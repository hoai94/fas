$(document).ready(function () {
    // activeMenu();
    
    $('.slide-5').on('setPosition', function () {
        $(this).find('.slick-slide').height('auto');
        var slickTrack = $(this).find('.slick-track');
        var slickTrackHeight = $(slickTrack).height();
        $(this)
            .find('.slick-slide')
            .css('height', slickTrackHeight + 'px');
        $(this)
            .find('.slick-slide > div')
            .css('height', slickTrackHeight + 'px');
        $(this)
            .find('.slick-slide .category-wrapper')
            .css('height', slickTrackHeight + 'px');
    });

    $('.breadcrumb-section').css('margin-top', $('.my-header').height() + 'px');
    $('.my-home-slider').css('margin-top', $('.my-header').height() + 'px');

    $(window).resize(function () {
        let height = $('.my-header').height();
        $('.breadcrumb-section').css('margin-top', height + 'px');
        $('.my-home-slider').css('margin-top', height + 'px');
    });

    // show more show less
    if ($('.category-item').length > 10) {
        $('.category-item:gt(9)').hide();
        $('#btn-view-more').show();
    }

    $('#btn-view-more').on('click', function () {
        $('.category-item:gt(9)').toggle();
        $(this).text() === 'Xem thêm' ? $(this).text('Thu gọn') : $(this).text('Xem thêm');
    });

    $('li.my-layout-view > img').click(function () {
        $('li.my-layout-view').removeClass('active');
        $(this).parent().addClass('active');
    });

    $('#sort-form select[name="sort"]').change(function () {
        // console.log(getUrlParam('filter_price'));
        if (getUrlParam('filter_price')) {
            $('#sort-form').append(
                '<input type="hidden" name="filter_price" value="' +
                    getUrlParam('filter_price') +
                    '">'
            );
        }

        if (getUrlParam('search')) {
            $('#sort-form').append(
                '<input type="hidden" name="search" value="' +
                    getUrlParam('search') +
                    '">'
            );
        }

        $('#sort-form').submit();
    });
    
    $("#quick_test").on("click", function() {
        var product_id = $(this).attr('data-id');
        console.log(product_id);
    
    });
    setTimeout(function () {
        $('#frontend-message').toggle('slow');
    }, 4000);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".quick_views").on("click", function() {
        let product_id = $(this).data('id');
        console.log(product_id);
        $.ajax({
            url:'/quick-view',
            method: "POST",
            dataType:"JSON",
            data:{product_id:product_id},
            
            success:function(data) {
                
                $("#product_name").html(data.product_name);
                $("#product_picture").html(data.product_picture);
                $("#product_price").html(data.product_price);
                $("#link_detail").html(data.link_detail);
                $("#product_description").html(data.product_description);
               
            }
        });
    });
    //load_best_sale();
    // $(".order_product").on("click", function() {
    //     var product_id = $(this).data('id');
    //     var url        = $(this).data('url');
    //     console.log(url);
    //     console.log(product_id);
    //     $.ajax({
    //         url:url,
    //         method: "GET",
    //         dataType:"JSON",
    //         data:{product_id:product_id},
    //         success:function(data) {
               
    //         }
    //     });
    // });

    //add to cart
    $(".btn-cart").on("click", function() {
        var id = $(this).data("product_id");
        var url = $(this).data("url");
        $.ajax({
            url: url,
            method: "POST",
            dataType:"JSON",
            data:{id:id},
            success:function(data) {
                $('#cart_item').html(data.cart_total);
            }
         });

    });
    //function add to cart
   

    //update quantity cart 
    $(".input-qty").on("change", function() {
        $('#update-qty').submit();
    });
    // $(".input-qty").on("change", function() {
    //     var product_id = $(this).data('product_id');
    //     var qty        = $(this).val();
    //     var url        = $(this).data('url');
    //     var _token = $('input[name="_token"]').val();
    //     console.log(url);
    //     $.ajax({
    //         url:url,
    //         method: "POST",
    //         dataType:"JSON",
    //         data:{product_id:product_id,qty:qty},
    //         success:function(data) {
                
    //         }
    //     });
    // });

    //start
    
    // function load_best_sale (id = '') {
    //     $.ajax({
    //     url: "frontend/best-sales",
    //     method: "POST",
        
    //     data:{id:id},  
    //     success:function(data) {
    //         $('#load_more_button').remove();
    //         $('#tabs_best_sale').append(data);
    //     }
    // });
    // }
    // $(document).on('click','#load_more_button',function () {
    //     var id = $(this).data('id');
    //     load_best_sale(id);
    // });

    //end
    
});

function activeMenu() {
    // let controller = getUrlParam('controller') == null ? 'index' : getUrlParam('controller');
    // let action = getUrlParam('action') == null ? 'index' : getUrlParam('action');
    let dataActive = controller + '-' + action;
    $(`a[data-active=${dataActive}]`).addClass('my-menu-link active');
}

function getUrlParam(key) {
    let searchParams = new URLSearchParams(window.location.search);
    return searchParams.get(key);
}





