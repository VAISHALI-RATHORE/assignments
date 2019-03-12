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
<p id="print"></p>

 <script>
   var state_name;
   var states;
    $.ajax({
        type: "GET",
        url:"states.php",
        
        success: function(data){
        	$('#loading').hide();
             $('.state').show();
                
        		states = JSON.parse(data);
     
        	for (var i = 0; i < states.length; i++) {
             	// console.log(data[i].name);
             	$('#state').append('<option value="'+states[i].id+'">'+states[i].name+'</option>');

			}
        },
    });
          
    $('#state').on('change', function(){
    	$("#print").html('');
        $('.city').show();
        var cities;
        var stateId = $('#state').val();
       
        $('#city').html('');
        $('#city').append('<option value="">Select city</option>');
       
        $.ajax({
	        type: "POST",
	        url:"cities.php",
	        data:{
	        	state_id : stateId
	        },
	        success: function(data){
	        	console.log(data);
	        	cities = JSON.parse(data);
	        	for (var i = 0; i < cities.length; i++) {
		            $('#city').append('<option value="'+cities[i].id+'">'+cities[i].name+'</option>');
		        }
	        },
	    });
    });    

    $('#city').on('change', function(){
        $('#go').show();
        $("#print").html('');
    });
    
    function setStateCity(){
        state_name= $('#state option:selected').text();
        cityName= $('#city option:selected').text();
        // document.getElementById("go").innerHTML=" ";
        var message = cityName +', '+state_name;
        $("#print").html(message);
    }  
            
   </script>