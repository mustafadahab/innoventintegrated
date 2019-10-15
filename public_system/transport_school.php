<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="./transport_script.js"></script>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container-fluId">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">TS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="./">Home </a>
                    </li>
                    <li class="nav-item active" >
                        <a class="nav-link" href="transport_school.php">Transport School <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
</div>
<div class="container">
    <div class="row">
        <div class="col-6">
            <span>Transport School</span>
            &nbsp;&nbsp;&nbsp;
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" id="add_new" >
                +
            </button>
        </div>
        <div class="col-6"></div>
    </div>
    <div class="row">
        <div class="col-12">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">TransportID</th>
                    <th scope="col">StationID</th>
                    <th scope="col">BranchID</th>
                    <th scope="col">SchoolID</th>
                    <th scope="col">SchoolUUID</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                </tr>
                </thead>
                <tbody class="transport_tableBody">

                </tbody>
            </table>
        </div>
    </div>


</div>


<!-- Modal -->
<div class="modal fade" id="form_Modal" tabindex="-1" role="dialog" aria-labelledby="form_ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="form_ModalLabel">Title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add_new_form">
                    <div class="form-group">
                        <label for="TransportId">TransportID</label>
                        <input type="text" class="form-control" id="TransportId" name="transportId" aria-describedby="transportIDHelp" placeholder="Enter TransportId">
                    </div>
                    <div class="form-group">
                        <label for="StationId">StationID</label>
                        <input type="text" class="form-control" id="stationId" name="stationId" aria-describedby="textHelp" placeholder="Enter StationId">
                    </div>
                    <div class="form-group">
                        <label for="BranchId">BranchID</label>
                        <input type="text" class="form-control" id="BranchId" name="branchId" aria-describedby="BranchIDHelp" placeholder="Enter BranchId">
                    </div>
                    <div class="form-group">
                        <label for="SchoolId">SchoolID</label>
                        <input type="text" class="form-control" id="SchoolId" name="schoolId" aria-describedby="SchoolIDHelp" placeholder="Enter SchoolId">
                    </div>
                    <div class="form-group">
                        <label for="SchoolUUId">SchoolUUID</label>
                        <input type="text" class="form-control" id="SchoolUUId" name="schooluuId" aria-describedby="SchoolUUIDHelp" placeholder="Enter SchoolUUId">
                    </div>
                    <input type="hidden" name="action" id="action">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>






