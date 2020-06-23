$(function(){
    $('.prod').on('mouseover', function(){
        var name = $(this).text();
        var body = $(this).attr('data-body');
        var catalog = $(this).attr('data-catalog');
        var price = $(this).attr('data-price');
        var picture = $(this).attr('data-picture');
        $('#empty_prod_name').text(name);
        $('#empty_prod_body').html(body);
        $('#empty_prod_catalog').text(catalog);
        $('#empty_prod_price').text(price);
        $('#empty_prod_picture').attr('src', picture);
    });
})
