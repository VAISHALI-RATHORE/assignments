<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<form method="POST" action="javascript:void(0)">
    <input id="city" type="text" placeholder="Search city " value="">
     <div class="state">
        <select id="state" class="state">
            <option value="">Select state</option>        
        </select>        
        <br>
    </div>
    <button id="search" onclick="show();">Submit</button>
    <hr>
    <p id="result"></p>
</form>

 <script>
   var state_name;
   var states;
    $.ajax({
        type: "GET",
        url:"api.php",
        
        success: function(data){
            
             $('.state').show();
                
                states = JSON.parse(data);
     
            for (var i = 0; i < states.length; i++) {
                // console.log(data[i].name);
                $('#state').append('<option value="'+states[i].id+'">'+states[i].name+'</option>');

            }
        },
    });

      function show(){
        var insertStr = $('#city').val();
        var sel_state = $('#state').val();
        $.ajax({
            url : 'apiSecond.php',
            type : 'POST',
            data: {
                city: insertStr,
                state: sel_state
            },
            success : function(res) {
                // console.log(res);
                
            //     res = JSON.parse(res);
            //     if(res.city) {
            //         var message = res.city +', '+res.state;
            //         $("#result").html(message);
            //     } else {
            //         $("#result").html('Location Not Available!');
            //     }
            }
        });
    }       
</script>   