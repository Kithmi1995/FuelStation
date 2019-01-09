<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['user'])){
    header("Location: ".$_SERVER['DOCUMENT_ROOT']."/index.php");
    exit(0);
}
$document_root = $_SERVER['DOCUMENT_ROOT'];
require_once ($document_root."/controllers/deo/tank/index.php");

$update_path = "/controllers/deo/tank/update.php";
$delete_path = "/controllers/deo/tank/delete.php";

$include_path = $document_root."/views/includes";

?>

<!doctype html>
<html>
<head>
    <title>Tank Details</title>
    <?php
    include_once($include_path."/styles.php");
    ?>
</head>
<body>
<?php
include_once($include_path."/navbar.php");
?>

<div class="mt-4">
    <div class="row">
        <div class="col-md-3">
            <?php
            include_once($include_path."/sidenav.php");
            ?>
        </div>
        <div class="col-md-7 pt-5">
            <div class="card">
                <div class="card-header">
                    Tank Details

                </div>
                <div class="card-body">

                    <div class="table responsive">
                        <table class="table table-striped datatable" cellspacing="0" width="100%">

                            <thead>
                            <tr>

                                <th>TankId</th>
                                <th>FuelId</th>
                                <th>Capacity</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($tanks as $tank){
                                $id = $tank["id"];
                                echo "<tr>";

                                echo "<td>".$tank["TankId"]."</td>";
                                echo "<td>".$tank["FuelId"]."</td>";
                                echo "<td>".$tank["Capacity"]."</td>";


                                echo "<td>";
                                echo "<button class='btn btn-warning edit-modal-btn btn-sm' type='button' data-toggle='modal' data-target='#edit-modal' data-id='$id'>Edit</button>";
                                echo "<button class='btn btn-danger btn-sm delete-modal-btn' type='button' data-toggle='modal' data-target='#delete-modal' data-id='$id'>Delete</button>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            ?>
                            </tbody>

                        </table>
                    </div>



                </div>

                <div id="edit-modal" class="modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Edit Tank Record</h4>
                            </div>
                            <div class="modal-body">
                                <!--                            <div id="status-text"></div>
                                -->
                                <form action="<?php echo $update_path; ?>" method="post" class="form-horizontal" role="form" id="edit-form">

                                    <input type="hidden" id="edit_id" name="edit_id" value="">

                                    <div class="md-form">
                                        <label for="TankId">TankId</label>
                                        <input type="text" value=" " name="TankId" id="TankId"   class="form-control">
                                    </div>
                                    <div class="md-form">
                                        <label for="FuelId">FuelId</label>
                                        <input type="text" value=" " name="FuelId" id="FuelId"   class="form-control">
                                    </div>
                                    <div class="md-form">
                                        <label for="Capacity">Capacity</label>
                                        <input type="text" value=" " name="Capacity" id="Capacity" class="form-control">
                                    </div>


                                    <div class="md-form">
                                        <input type="submit" class="btn btn-default" name="submit" id="submit-edit">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>


                                </form>


                                <div id="fuel-data">

                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <div id="delete-modal" class="modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">

                                <h4 class="modal-title">Delete Tank Record</h4>

                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <!--                            <div id="status-text"></div>
                                -->
                                Are you sure you want to delete this?
                                <form action="<?php echo $delete_path; ?>" method="post" class="form-horizontal" role="form" id="delete-form">

                                    <input type="hidden" id="delete_id" name="delete_id" value="">
                                    <div class="form-group pull-right">
                                        <input type="submit"  class="btn btn-default btn-sm" name="submit" id="submit-delete">
                                        <button type="button" class="btn btn-default btn-sm close" data-dismiss="modal">Close</button>
                                    </div>


                                </form>


                                <div id="fuel-data">

                                </div>
                            </div>

                        </div>

                    </div>
                </div>


            </div>


        </div>


    </div>



    <script>
        var tanks = JSON.parse('<?php echo(json_encode($tanks)); ?>');
        $(document).ready(function () {

            $(".edit-modal-btn").click(function (e) {
                // e.preventDefault();
                var id = $(this).attr("data-id");
                $("#edit_id").attr("value", id);

                var len = tanks.length;
                console.log(len);
                for (var i = 0; i < len; i++){
                    var tank = tanks[i];
                    if (tank.id == id){
                        console.log(tank);
                        $.each(tank, function (key, value) {
                            $("#"+key).attr("value", value);

                        });
                    }

                }

                $("#edit-modal").show();
            });

            /*$("#submit-edit").click(function (e) {
                e.preventDefault();
                $.ajax({
                    url: "update.php",
                    data: $("#edit-form").serializeArray(),
                    method: "post",
                    success: function (data) {
                        console.log("data: "+data);
                        $("#status-text").html("Server sent: "+data);
                    },
                    error: function (err) {
                        $("#status-text").html("An error occured: "+err);
                    }

                });
            });*/

            $(".delete-modal-btn").click(function (e) {
                e.preventDefault();
                var id = $(this).attr("data-id");
                console.log(id);
                $("#delete_id").attr("value", id);
                $("#delete-modal").show();
            });

            /*$(".close").click(function (e) {
                e.preventDefault();
                $('.modal').hide();
            });*/

        });
    </script>




    <?php
    include_once($include_path."/scripts.php");
    include_once ($include_path.'/footer.php');
    ?>


</body>
</html>
