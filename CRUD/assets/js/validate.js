$(function() {
    $("input[name='product_marketprice']").on('input', function(e) {
        $(this).val($(this).val().replace(/[^.0-9]/g, ''));
    });
    $("input[name='product_sellingprice']").on('input', function(e) {
        $(this).val($(this).val().replace(/[^.0-9]/g, ''));
    });
    $("input[name='product_quantity']").on('input', function(e) {
        $(this).val($(this).val().replace(/[^.0-9]/g, ''));
    });
    $("input[name='shop_phone']").on('input', function(e) {
        $(this).val($(this).val().replace(/[^.0-9]/g, ''));
    });
    $("input[name='commission']").on('input', function(e) {
        $(this).val($(this).val().replace(/[^.0-9]/g, ''));
    });
    $("input[name='gst']").on('input', function(e) {
        $(this).val($(this).val().replace(/[^.0-9]/g, ''));
    });
});