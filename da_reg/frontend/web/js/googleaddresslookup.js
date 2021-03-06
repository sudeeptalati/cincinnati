// This example displays an address form, using the autocomplete feature
// of the Google Places API to help users fill in the information.

// This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">




var valuesinform={
    street_number: 'customers-address_line_1',
    route: 'customers-address_line_2',
    locality: 'customers-address_line_3',
    postal_town: 'customers-town',
    administrative_area_level_2: 'customers-county', //this is county like east ayrshire
    administrative_area_level_1: null, //this is like Scotland, England
    country: 'Customer_country',
    postal_code: 'customers-postcode',
    latitudes: 'customers-lat',
    longitudes: 'customers-lng'


}

$( "#address_autocomplete" ).keyup(function() {
    console.log( "address_autocomplete for .keyup() called." );
    geolocate();
});

// A $( document ).ready() block.
$( document ).ready(function() {
    geolocate();
});

function geolocate() {
    google_maps_api_key=$( "#google_maps_api_key").val();
    address_keyword=$( "#address_autocomplete").val();



    if (checkifelementexists(address_keyword))
    {

        address_keyword=address_keyword.replace( /\s/g, "")

        if (address_keyword.length>3)
        {
            address_lookup_url="https://maps.googleapis.com/maps/api/geocode/json?address="+address_keyword+"&components=country:UK&key="+google_maps_api_key;

            console.log(address_lookup_url);
            $.get( address_lookup_url, function( data ) {
                //$( ".result" ).html( data );
                formatdatatoaddress(data)

            });

        }///end of if (address_keyword.length>3)

    }//end of     if (address_keyword!==null || address_keyword!=='' )

}///end of geolocate



function formatdatatoaddress(address_data_obj)
{
    //console.log(address_data_obj.results[0].address_components[0].long_name);
    //console.log(address_data_obj.results[0].address_components[0].types[0]);

    address_components=address_data_obj.results[0].address_components;

    geometry_location=address_data_obj.results[0].geometry.location;
    //console.log(geometry_location.lat);
    //console.log(geometry_location.lng);

    $("#"+valuesinform['latitudes']).val( geometry_location.lat);
    $("#"+valuesinform['longitudes']).val(geometry_location.lng);

    for (var i=0;i<address_components.length;i++)
    {
        //console.log(address_components[i]);
        castaddressinfields( address_components[i]);
    }

}///end of formatdatatoaddress(address_datastring)


function castaddressinfields( addresscomponent)
{

    area_type=addresscomponent.types[0];
    $("#"+valuesinform[area_type]).val(addresscomponent.long_name);

}///end of function castaddressinfields( addresscomponent)


//Disable return Key from Submitting the form
function stopRKey(evt) {
    var evt = (evt) ? evt : ((event) ? event : null);
    var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
    if ((evt.keyCode == 13) && (node.type=="text"))  {return false;}
}

document.onkeypress = stopRKey;

function checkifelementexists(element)
{
    if( typeof element !== 'undefined' ) {
        // myVar could get resolved and it's defined
        //console.log(element+' is defined');
        return true;
    }else
    {
        //console.log(element+' is undefined');
        return false;
    }

}///end of function checkifelementexists()


$( "#Customer_mobile" ).keyup(function() {
    countrycode=$( "#code_disp_textField" ).val();
    customer_mobile=$( "#Customer_mobile" ).val();

    if(customer_mobile.startsWith(0))
    {
        customer_mobile = customer_mobile.substring(1);
        $( "#Customer_mobile" ).val(customer_mobile);
        console.log(customer_mobile);

    }
});///endof $( "#Customer_mobile" ).keyup(function() {


