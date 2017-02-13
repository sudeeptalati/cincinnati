/**
 * Created by sudeeptalati on 10/02/2017.
 */

function format_customer_address_for_html() {

    address_customer_div_html='';

    if( $('#customers-title').val()) {
        address_customer_div_html=address_customer_div_html+' '+$('#customers-title').val();
    }
    if( $('#customers-first_name').val()) {
        address_customer_div_html=address_customer_div_html+' '+$('#customers-first_name').val();
    }
    if( $('#customers-last_name').val()) {
        address_customer_div_html=address_customer_div_html+' '+$('#customers-last_name').val();
    }


    if( $('#customers-address_line_1').val()) {
        address_customer_div_html=address_customer_div_html+'<br>'+$('#customers-address_line_1').val();
    }
    if( $('#customers-address_line_2').val()) {
        address_customer_div_html=address_customer_div_html+'<br>'+$('#customers-address_line_2').val();
    }

    if( $('#customers-address_line_3').val()) {
        address_customer_div_html=address_customer_div_html+'<br> '+$('#customers-address_line_3').val();
    }

    if( $('#customers-town').val()) {
        address_customer_div_html=address_customer_div_html+'<br> '+$('#customers-town').val();
    }

    if( $('#customers-county').val()) {
        address_customer_div_html=address_customer_div_html+'<br> '+$('#customers-county').val();
    }

    if( $('#customers-postcode').val()) {
        address_customer_div_html=address_customer_div_html+'<br> '+$('#customers-postcode').val();
    }

    console.log(address_customer_div_html);

   // $('.customer_address_printed').html(address_customer_div_html);


    $('.customer_address_printed').each(function() {
        console.log('called');
        $(this).html( address_customer_div_html );
    });




}