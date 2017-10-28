var Locations = function () {
};

Locations.prototype.getLocation = function (_data_id, id) {

    var _data_id_arr = _data_id.split('/');
    var location_type = _data_id_arr[0];
    var target = _data_id_arr[1];

    $.ajax({
        url: BASE_URL + 'locations/get_location_type/',
        data: {
            id: id,
            type: location_type
        },
        type: "POST",
        beforeSend: function () {
            $("#" + target).html('<option selected="selected">loading...</option>');

            //  If you are changing counrty, make the state and city fields blank
            if (target == 'state') {
                $('#city').html('');
                $('#state').html('');
            }

            //  If you are changing state, make the city fields blank
            if (target == 'city') {
                $('#city').html('');
            }
        },
        success: function (data) {

            $('#' + target).html(data);

        }

    });
};



Locations.prototype.getStates = function (country_id, selectedState) {

    /* $.ajax({
        url: BASE_URL + 'locations/get_locations/json',
        data: {
            id: country_id,
            selected_id: ((selectedState != '') ? selectedState : ''),
            location_type: 1
        },
        type: "POST",
        beforeSend: function () {
            $("#state").html('<option selected="selected">loading...</option>');
        },
        success: function (e) {
            var response = $.parseJSON(e);
            console.log(response);
            var option = '';
            if (response.length)
            {
                var locationsObj = new Locations();
                for (r in response)
                {
                    var id = response[r].location_id;
                    var name = response[r].name;
                    var citySelected = $("#cityselected").val();
                    if (id == selectedState)
                    {
                        option += '<option selected="selected" value="' + id + '">' + name + '</option>';
                        locationsObj.getCities(id, citySelected);

                    }
                    else
                    {
                        option += '<option value="' + id + '">' + name + '</option>';

                        if (r == 0)
                            locationsObj.getCities(id, citySelected);
                    }

                }
            }

            $('#state').html(option);
            
        }

    }); */
	$.ajax({
        url: BASE_URL + 'locations/populate_states',
        data: {
            id: country_id
        },
        type: "POST",
        beforeSend: function () {
            $("#state").html('<option selected="selected">loading...</option>');
        },
        success: function (e) {
            var response = $.parseJSON(e);

            var option = '';
            if (response.length)
            {
                var locationsObj = new Locations();
                for (r in response)
                {
                    var id = response[r].id;
                    var name = response[r].name;
                    var citySelected = $("#cityselected").val();
                    if (id == selectedState)
                    {
                        option += '<option selected="selected" value="' + id + '">' + name + '</option>';
                        locationsObj.getCities(id, citySelected);

                    }
                    else
                    {
                        option += '<option value="' + id + '">' + name + '</option>';

                        if (r == 0)
                            locationsObj.getCities(id, citySelected);
                    }

                }
            }

            $('#state').html(option);
            
        }

    });
};

Locations.prototype.getCities = function (state_id, selectedCity) {

    /* $.ajax({
        url: BASE_URL + 'locations/get_locations/json',
        data: {
            id: parent_id,
            selected_id: ((selectedCity != '') ? selectedCity : ''),
            location_type: 2
        },
        type: "POST",
        beforeSend: function () {
            $("#city").html('<option selected="selected">loading...</option>');
        },
        success: function (e) {
            var response = $.parseJSON(e);

            var option = '';
            for (r in response)
            {
                var id = response[r].location_id;
                var name = response[r].name;
                if (id == selectedCity) {
                    option += '<option selected="selected" value="' + id + '">' + name + '</option>';
                } else {
                    option += '<option value="' + id + '">' + name + '</option>';
                }
            }

            $('#city').html(option);
            
        }

    }); */
	$.ajax({
        url: BASE_URL + 'locations/populate_cities',
        data: {
            id: state_id
        },
        type: "POST",
        beforeSend: function () {
            $("#city").html('<option selected="selected">loading...</option>');
        },
        success: function (e) {
            var response = $.parseJSON(e);

            var option = '';
            for (r in response)
            {
                var id = response[r].id;
                var name = response[r].name;
                if (id == selectedCity) {
                    option += '<option selected="selected" value="' + id + '">' + name + '</option>';
                } else {
                    option += '<option value="' + id + '">' + name + '</option>';
                }
            }

            $('#city').html(option);
            
        }

    });
};


$(function () {
//    console.log('hh');
    
    /* if (countrySelected)
    {
        
        var locationsObj = new Locations();
        locationsObj.getStates(countrySelected, stateSelected);
    }

    if (stateSelected)
    {
        var locationsObj = new Locations();
        locationsObj.getCities(stateSelected, citySelected);
    } */

	
    $(document).on("change", "#country", function () {
        var obj = $(this);
        var id = obj.val();

        var locationsObj = new Locations();
        locationsObj.getStates(id);
    });



    $(document).on("change", "#state", function () {
        var obj = $(this);
        var id = $(this).val();

        var locationsObj = new Locations();
        locationsObj.getCities(id);
    });

});