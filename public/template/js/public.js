
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function loadMore() {
    const page = $('#page').val();
    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        data: { page },
        url: '/services/load-product',
        success: function (result) {
            if (result.html != '') {
                $('#loadProduct').append(result.html);
                $('#page').val(page + 1);
            } else {
                $('#button-loadMore').css('display', 'none');
            }
        }
    });
}
// Live search index
$(document).ready(function () {
    $('#inputSearch').on('keyup', function () {
        var query = $(this).val();
        if (query != '') {
            $.ajax({
                url: "search",
                type: "get",
                data: { 'search': query },
                success: function (data) {
                    $('#show-list').html(data);
                }
            });
        } else {
            $('#show-list').html('');
        }
    });
});
//Live search o phan san pham
$(document).ready(function () {
    $('#keyword').on('keyup', function () {
        var query = $(this).val();
        if (query != '') {
            $.ajax({
                url: "search_pro",
                type: "get",
                data: { 'search_pro': query },
                success: function (data) {
                    $('#loadProduct').html(data);
                }
            });
        } else {
            $('#loadProduct').html('');
        }
    });
});
//Loc tat ca
$(document).ready(function () {
    $('#locall').on('click', function () {
        $.ajax({
            url: "locall",
            type: "post",
            dataType: 'json',
            data: '_token = <?php echo csrf_token() ?>',
            success: function (data) {
                // $('#page').html(data);
                $('#button-loadMore').html('');
                $('#loadProduct').html(data);

            }
        });
        //end of ajax call
    });
});



// Loc tat ca gia tien
$(document).ready(function () {
    $('#costall').on('click', function () {
        $.ajax({
            url: "locall",
            type: "post",
            dataType: 'json',
            data: '_token = <?php echo csrf_token() ?>',
            success: function (data) {
                $('#button-loadMore').html('');
                $('#loadProduct').html(data);

            }
        });
    });
});
// gia tien <200000
$(document).ready(function () {
    $('#200').on('click', function () {
        $.ajax({
            url: "cost200",
            type: "post",
            dataType: 'json',
            data: '_token = <?php echo csrf_token() ?>',
            success: function (data) {
                $('#button-loadMore').html('');
                $('#loadProduct').html(data);

            }
        });
    });
});
// gia tien 200000-500000
$(document).ready(function () {
    $('#250').on('click', function () {
        $.ajax({
            url: "cost250",
            type: "post",
            dataType: 'json',
            data: '_token = <?php echo csrf_token() ?>',
            success: function (data) {
                $('#button-loadMore').html('');
                $('#loadProduct').html(data);

            }
        });
    });
});
// gia tien >= 500000
$(document).ready(function () {
    $('#500').on('click', function () {
        $.ajax({
            url: "cost500",
            type: "post",
            dataType: 'json',
            data: '_token = <?php echo csrf_token() ?>',
            success: function (data) {
                $('#button-loadMore').html('');
                $('#loadProduct').html(data);

            }
        });
    });
});
// gia tien thap den cao
$(document).ready(function () {
    $('#asc').on('click', function () {
        $.ajax({
            url: "asc",
            type: "post",
            dataType: 'json',
            data: '_token = <?php echo csrf_token() ?>',
            success: function (data) {
                $('#button-loadMore').html('');
                $('#loadProduct').html(data);

            }
        });
    });
});
// gia tien cao xuong thap
$(document).ready(function () {
    $('#desc').on('click', function () {
        $.ajax({
            url: "desc",
            type: "post",
            dataType: 'json',
            data: '_token = <?php echo csrf_token() ?>',
            success: function (data) {
                $('#button-loadMore').html('');
                $('#loadProduct').html(data);

            }
        });
    });
});
// Gộp chung search menu
$(document).ready(function () {
    $('#1').on('click', function () {;
        var value = $(this).val();
       $.ajax({
            url: "test",
            type: "post",
            dataType: 'json',
            data: {query: value},
            success: function (data) {
                $('#loadProduct').html(data);
                $('#button-loadMore').html('');
            }
        });
    });
});
$(document).ready(function () {
    $('#4').on('click', function () {;
        var value = $(this).val();
       $.ajax({
            url: "test",
            type: "post",
            dataType: 'json',
            data: {query: value},
            success: function (data) {
                $('#loadProduct').html(data);
                $('#button-loadMore').html('');
            }
        });
    });
});
$(document).ready(function () {
    $('#5').on('click', function () {;
        var value = $(this).val();
       $.ajax({
            url: "test",
            type: "post",
            dataType: 'json',
            data: {query: value},
            success: function (data) {
                $('#loadProduct').html(data);
                $('#button-loadMore').html('');
            }
        });
    });
});
$(document).ready(function () {
    $('#6').on('click', function () {;
        var value = $(this).val();
       $.ajax({
            url: "test",
            type: "post",
            dataType: 'json',
            data: {query: value},
            success: function (data) {
                $('#loadProduct').html(data);
                $('#button-loadMore').html('');
            }
        });
    });
});
$(document).ready(function () {
    $('#7').on('click', function () {;
        var value = $(this).val();
       $.ajax({
            url: "test",
            type: "post",
            dataType: 'json',
            data: {query: value},
            success: function (data) {
                $('#loadProduct').html(data);
                $('#button-loadMore').html('');
            }
        });
    });
});
$(document).ready(function () {
    $('#8').on('click', function () {;
        var value = $(this).val();
       $.ajax({
            url: "test",
            type: "post",
            dataType: 'json',
            data: {query: value},
            success: function (data) {
                $('#loadProduct').html(data);
                $('#button-loadMore').html('');
            }
        });
    });
});

