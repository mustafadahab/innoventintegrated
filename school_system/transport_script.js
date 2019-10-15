
//POST REQUEST
// for local operation
$(document).ready(function(){

    ///load the data
    loadData();

    $("#add_new").click(function(){

        $('#add_new_form').attr('action','./api/stransportschool/create.php');

        $("#add_new_form")[0].reset();

            $("#form_Modal").modal('show');
            $("#form_ModalLabel").html("Add New");
            $("#action").val("stransportschool_create");
        });




    $("#add_new_form").submit(function (e) {
            e.preventDefault();
            var jsonData = toJSONString( this );



            /************/
            $.when(
                $.ajax({
                    type: "POST",
                    url: $('#add_new_form').attr('action'),
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
                    url: "http://localhost/AD_task/public_system/api/IO.php",
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
        });


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
        url: "http://localhost/AD_task/private_system/api/stransportschool/read.php",
        success:function(data){

            if(data !== 0){
                //loop and display data
                var html = "";
                var id="";
                var data_set="";
                data.forEach(function(val) {
                    var keys = Object.keys(val);
                    html += "<tr>";
                    keys.forEach(function(key) {
                        html += "<td >"+ val[key] + "</td>";
                        data_set +=" data-"+key+"='"+val[key]+"'";
                        if(key == "ID"){
                            id =  val[key];
                        }

                    });
                    html += "<td><a  class='btn btn-danger' onclick='return delete_data("+id+")'>Delete</a></td>";
                    html += "<td><a  class='btn btn-info' onclick='update(this)' "+data_set+">Update</a></td>";
                    html += "</tr>";

                });

                $(".transport_tableBody").html(html);
            }else alert(" No data yet");


        },
        error:function(e){
            console.log(e);
            alert('Could not load data');
        }

    });
}
//GET REQUEST
function delete_data (id){


$confirm = window.confirm("Are you sure");
if($confirm){
    var jsonData = '{ "action":"stransportschool_delete", "id": '+id+'}';
    //var jsonData = toJSONString( this );

    /************/
    $.when(
        $.ajax({
            type: "POST",
            url: "http://localhost/AD_task/private_system/api/stransportschool/delete.php",
            //url: "http://localhost/AD_task/private_system/api/IO.php",
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
            //url: "http://localhost/AD_task/public_system/api/stransportschool/create.php",
            url: "http://localhost/AD_task/public_system/api/IO.php",
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

}
// full the form
function update(e){

    $('#add_new_form').attr('action','./api/stransportschool/update.php');

    $("#id").val(e.dataset.id);
    $("#SchoolUUId").val(e.dataset.schooluuid);
    $("#SchoolId").val(e.dataset.schoolid);
    $("#BranchId").val(e.dataset.branchid);
    $("#stationId").val(e.dataset.stationid);
    $("#TransportId").val(e.dataset.transportid);

    $("#form_Modal").modal('show');
    $("#form_ModalLabel").html("Update");

    $("#action").val("stransportschool_update");
}