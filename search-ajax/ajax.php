<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<form method="POST" action="javascript:void(0)">
    <input id="city" type="text" placeholder="Search city & state" value="">
    <button id="search" onclick="show();">Go</button>
    <hr>
    <p id="result"></p>
</form>

<script>
    // var states=[],cityName,stateName;
    function show(){
        var searchStr = $('#city').val();
        $.ajax({
            url : 'api.php',
            type : 'POST',
            data: {
                city: searchStr
            },
            success : function(res) {
                res = JSON.parse(res);
                if(res.city) {
                    var message = res.city +', '+res.state;
                    $("#result").html(message);
                } else {
                    $("#result").html('Location Not Available!');
                }
            }
        });
    }       
</script>   