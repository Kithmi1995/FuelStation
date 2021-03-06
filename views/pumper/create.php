<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['user'])){
    header("Location: ".$_SERVER['DOCUMENT_ROOT']."/index.php");
    exit(0);
}
$document_root = $_SERVER['DOCUMENT_ROOT'];
require_once ($document_root."/controllers/deo/pumper/index.php");

$update_path = "/controllers/deo/pumper/update.php";
$delete_path = "/controllers/deo/pumper/delete.php";
$create_path = "/controllers/deo/pumper/store.php";

$include_path = $document_root."/views/includes";

?>
<!doctype html>
<html>
<head>
    <title>Pumper Register</title>
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
                    Pumper Register

                </div>
                <div class="card-body">

                    <form action="<?php echo $create_path; ?>" method="post">


                        <div class="md-form">
                            <label for="nic">Pumper NIC</label><br>
                            <input class="form-control" type="text" id="nic" name="nic" required><br>

                        </div>



                        <div class="md-form">
                            <label for="pumperid">Pumper ID</label><br>
                            <input class="form-control" type="text" id="pumperid" name="pumperid" required><br>

                        </div>

                        <div class="md-form">
                            <label for="fname">Pumper First Name</label><br>
                            <input class="form-control" type="text" id="firstname" name="firstname" required><br>

                        </div>

                        <div class="md-form">
                            <label for="lastname">Pumper Last Name</label><br>
                            <input class="form-control" type="text" id="lastname" name="lastname" ><br>

                        </div>



                        <div class="md-form">
                            <label for="dob">Date of Birth</label><br>
                            <input class="form-control" type="date" id="dob" name="dob" ><br>

                        </div>


                        <div class="md-form">
                            <label for="address">Address</label><br>
                            <input class="form-control" type="text" id="address" name="address" ><br>

                        </div>

                        <div class="md-form">
                            <label for="cno">Contact Number</label><br>
                            <input class="form-control" type="text" id="cno" name="cno" required><br>

                        </div>


                        <div class="md-form">
                            <label for="basicsalary">Basic Salary</label><br>
                            <input class="form-control" type="text" id="basicsalary" name="basicsalary" required><br>

                        </div>


                        <div class="md-form">
                            <label for="allowances">Allowances</label><br>
                            <input class="form-control" type="text" id="allowances" name="allowances" required><br>

                        </div>


                        <div class="md-form">
                            <input type="submit" name="submit" value="Submit" class="form-control btn btn-primary">
                        </div>

                    </form>


                </div>
            </div>


        </div>


    </div>





    <?php
    include_once($include_path."/scripts.php");
    include_once ($include_path.'/footer.php');
    ?>

</body>
</html>