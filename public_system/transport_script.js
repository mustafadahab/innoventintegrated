
//POST REQUEST

$(document).ready(function(){

    ///load the data
    loadData();

    $("#add_new").click(function(){
            $("#form_Modal").modal('show');
            $("#form_ModalLabel").html("Add New");
            $("#action").val("stransportschool_create");
        }

    );


    $("#add_new_form").submit(
        function (e) {
            e.preventDefault();
            var jsonData = toJSONString( this );

            /************/
            $.when(
                $.ajax({
                    type: "POST",
                    url: "../private_system/api/stransportschool/create.php",
                    data: jsonData,
                    success: function(data){

                        console.log(data);
                    },
                    error:function(e){
                        console.log(e);
                    },
                    dataType: "json",
                    contentType : "application/json"
                }),
                $.ajax({
                    type: "POST",
                    url: "./api/IO.php",
                    data: jsonData,
                    success: function(data){

                        console.log(data);
                    },
                    error:function(e){
                        console.log(e);
                    },
                    dataType: "json",
                    contentType : "application/json"
                })
            ).then( function(){
                loadData();
                $("#form_Modal").modal('hide');

            });
        }
    );


});

/*convert form data into json*/

function toJSONString( form ) {
    var obj = {};
    var elements = form.querySelectorAll( "input, select, textarea" );
    for( var i = 0; i < elements.length; ++i ) {
        var element = elements[i];
        var name = element.name;
        var value = element.value;

        if( name ) {
            obj[ name ] = value;
        }
    }

    return JSON.stringify( obj );
}
/* load database to the table*/
function loadData(){
    $.ajax({
        type:"GET",
        url: "../private_system/api/stransportschool/read.php",
        success:function(data){

            if(data !== 0){
                //loop and display data
                var html = "";
                data.forEach(function(val) {
                    var keys = Object.keys(val);
                    html += "<tr>";
                    keys.forEach(function(key) {
                        html += "<td>"+ val[key] + "</td>";
                    });
                    html += "</tr>";

                });

                $(".transport_tableBody").html(html);
            }else alert(" No data yet");


        },
        error:function(){
            alert('Could not load data');
        }

    });
}
//GET REQUEST
