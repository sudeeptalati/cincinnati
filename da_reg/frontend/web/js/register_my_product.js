/**
 * Created by admin on 27/01/2017.
 */
$("#brand_search_box").focus();
////$("#appliance_search_box").focus();


$( "#brand_search_box" ).keyup(function() {

    start_brand_search();

});


function start_brand_search()
{
    var brand_name_keyword= $( "#brand_search_box" ).val();

    if (brand_name_keyword.length<3)
    {
        $('#brand_search_data').html("").show();
    }

    var baseurl=$( "#baseUrl" ).val();



    brand_search_url=baseurl+"/registermyproduct/brandsearch";

    dataString= 'brand_name_keyword='+ brand_name_keyword;

    console.log("Enter search_url "+brand_search_url);
    console.log("Enter dataString "+dataString);


    $.ajax({
        type: "GET",
        url: brand_search_url,
        data:dataString,
        success: function(server_response)
        {
            $('#brand_search_data').html(server_response).show();

        }//end of success
    });//end of $.ajax

}//end of {function call_ajax_search(keyword)


function select_the_brand(id, name, brand_code)
{
    brand_icon_id= brand_code.toLowerCase()+'_brand_icon';
    icon_html_code=$('#'+brand_icon_id);
    console.log(icon_html_code);

    $('#selected_brand').html(icon_html_code.html());

    $('#products-brand_id').val(id);



    ///Now hide the brands and select appliance

    $('#brand_div_box').hide("slow");
    $('#appliance_div_box').show("slow");
    start_appliance_search();



}///end of function select_the_brand(id, name, brand_code)


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////Appliance search
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

console.log("Enter Appliance search dataString ");


$( "#appliance_search_box" ).keyup(function() {

    start_appliance_search();

    console.log("appl clicked");

});


function start_appliance_search(){

    var appliance_name_keyword= $( "#appliance_search_box" ).val();


    var baseurl=$( "#baseUrl" ).val();
    appliance_search_url=baseurl+"/registermyproduct/appliancesearch";

    dataString= 'appliance_name_keyword='+ appliance_name_keyword;

    console.log("Enter appliance_search_url "+appliance_search_url);
    console.log("Enter dataString "+dataString);

    $.ajax({
        type: "GET",
        url: appliance_search_url,
        data:dataString,
        success: function(server_response)
        {
            $('#appliance_search_data').html(server_response).show();

        }//end of success
    });//end of $.ajax




}////end of function start_appliance_search(){




function select_the_appliance(id, name, appliance_code)
{
    appliance_icon_id= appliance_code.toLowerCase()+'_appliance_icon';
    icon_html_code=$('#'+appliance_icon_id);
    console.log("appliance_icon_id  "+appliance_icon_id);
    console.log("icon_html_code  "+icon_html_code.html());


    $('#selected_appliance').html(icon_html_code.html());

    $('#products-appliance_id').val(id);


    ///Now hide the brands and select appliance

    $('#appliance_div_box').hide("slow");
    $('#product_div_box').show("slow");
    $('#customer_div_box').show("slow");
    $('#register_button_div_box').show("slow");



}///end of function select_the_brand(id, name, brand_code)

