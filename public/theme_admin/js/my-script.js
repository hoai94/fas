$(document).ready(function () {
    $('#btn-search').on('click', function () {
        $('#filter-form').submit();
    });
    $('#filter_group').on('change',function () {
        var data = $(this).val();
        $.ajax({
            url: '/backend/list-user', // Link mà nó sẽ gọi đến,
            method: 'GET',
            // data: {id: 1, group_acp: 1},
            dataType: 'json',
            success: function (data) {
                
            },
        });
    });
    $('[name="select-status"]').on('change', function () {
        let currentElement = $(this);
        let url = currentElement.data('url');
        url = url.replace("value_new", currentElement.val());
        $.ajax({
            url: url, // Link mà nó sẽ gọi đến,
            method: 'GET',
            // data: {id: 1, group_acp: 1},
            dataType: 'json',
            success: function (data) {
                alert('Thay đổi trạng thái đơn hàng thành công!');
            },
        });
    });
    $('#filter_status').on('change',function () {
        // e.preventDefault();
        $('#filter-form').submit();
    });
});

