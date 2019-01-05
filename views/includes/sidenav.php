
<!-- Sidebar -->
<div class="sidebar-fixed position-fixed mt-5">

    <a class="logo-wrapper waves-effect">
        <img src="/libs/img/logo.jpg" class="img-fluid" alt="">
    </a>

    <div class="list-group list-group-flush">
        <a href="#" class="list-group-item active waves-effect">
            <i class="fas fa-chart-pie mr-3"></i>Dashboard
        </a>
        <?php
        if (isset($_SESSION['user']) && $_SESSION['user']['Type'] == "Data Entry Operator"){
        ?>
        <a class="list-group-item waves-effect"  data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            <i class="fa fa-table mr-3"></i>Register <i class="fa fa-angle-down"></i>
        </a>

        <!-- Collapsible element -->
        <div class="collapse list-group list-group-flush ml-4" id="collapseExample">
            <a href="/views/fuel" class="list-group-item  waves-effect">
                <i class="fa fa-sun-o mr-3"></i>Fuel
            </a>
            <a href="/views/lubricant" class="list-group-item waves-effect">
                <i class="fa fa-bars mr-3"></i>Lubricant
            </a>
        </div>

            <?php
        }
        ?>

        <a href="#" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-user mr-3"></i>Profile</a>
        <?php
        if (isset($_SESSION['user']) && $_SESSION['user']['Type'] == "Manager"){
            ?>
            <a href="#" class="list-group-item list-group-item-action waves-effect">
                <i class="fas fa-map mr-3"></i>Maps</a>
        <?php
        }
        ?>
        <a href="#" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-table mr-3"></i>Tables</a>

        <a href="#" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-money-bill-alt mr-3"></i>Orders</a>
    </div>

</div>
<!-- Sidebar -->