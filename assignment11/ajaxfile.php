
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<div id='loading'>
    <p>Loading...</p>
</div>

<div id='operations' >
    <div class="state" style="display: none;">
        <label>State</label>
        <select id="state" >
            <option value="">Select state</option>
        </select>        
        <br>
    </div>

    <div class="city" style="display: none;">
        <label class="city" >City</label>
        <select id="city" class="city">
            <option value="">Select city</option>        
        </select>        
        <br>
    </div>

    <button id="go" style="display: none;" onclick="setStateCity();">Set Location</button>
    
    <hr/>
</div>


<script>
    var dataLocation, state_name, state_code; 

    setTimeout(function(){
        $.ajax({
            type: "GET",
            url:"sample.json",
            success: function(res){
                $('#loading').hide();
                if(res.Location){
                    $('.state').show();
                    dataLocation = res.Location;
                    var states = [];
                    for (var i = 0; i < dataLocation.length; i++) {
                        states[dataLocation[i].state] = dataLocation[i];
                    }

                    for (var j in states) {
                        state_name = states[j].ofc_state;
                        state_code = states[j].state;
                        $('#state').append('<option value="'+state_code+'">'+state_name+'</option>');
                    }
                }
            },
            error: function(res) {
                console.log('Error');
            }
        }); 
    }, 500);

    $('#state').on('change', function(){
        $('.city').show();
        var city = [], cityName;
        var stateCode = $('#state').val();
        $('#city').html('');
        $('#city').append('<option value="">Select city</option>');
        
        for (var i = 0; i < dataLocation.length; i++) {
            cityName = dataLocation[i].ofc_city;
            if(dataLocation[i].state == stateCode) {
                $('#city').append('<option value="'+cityName+'">'+cityName+'</option>');
            }
        }
    });
    
    $('#city').on('change', function(){
        $('#go').show();
    });
</script>

