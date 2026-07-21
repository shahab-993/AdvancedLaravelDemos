

$(document).ready(function(){
    $('#country').on('change',getStates);
    $('#state').on('change',getCities);
});
function getStates(){
    var countryId= $(this).val();
    if(countryId){
        $.ajax({
            url: '/get-states/' + countryId,
            type:'GET',
            dataType: 'json',
            success: function(states){
                  $('#state').empty().append('<option value=""> Selelet State</option>');
                  $('#city').empty().append('<option value=""> Selelet City</option>');

                  $.each(states, function(key, states){
                $('#state').append(
                  '<option value="' + states.id + '">' + states.name + '</option>'
);

                  });
            
            }
    
        });
    }
    else{
        $('#state').empty().append('<option value=""> Selelet State</option>');
        $('#city').empty().append('<option value=""> Selelet City</option>');
    }
}
function getCities(){
    var stateId= $(this).val();
    if(stateId){
        $.ajax({
            url: '/get-cities/' + stateId,
            type:'GET',
            dataType: 'json',
            success: function(cities){
                  $('#city').empty().append('<option value=""> Selelet City</option>');

                  $.each(cities, function(key, city){
                $('#city').append(
                  '<option value="' + city.id + '">' + city.name + '</option>'
);

                  });
            
            }
    
        });
    }
    else{
        $('#city').empty().append('<option value=""> Selelet City</option>');
    }
}