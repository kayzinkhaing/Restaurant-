<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="<?php echo URLROOT; ?>/public/images/dashboard.png" alt="Logo" class="img-fluid" style="width: 40px; height: 40px; animation: rotate 2s linear infinite;">
        </div>
        <div class="sidebar-brand-text mx-3 text-animation">Restaurant Admin</div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link animated" href="<?php echo URLROOT;?>/dashboard/admin">
        <i class="fi fi-rr-dashboard-monitor"></i>

            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">Interface</div>

    <!-- Nav Item - Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed animated" href="<?php echo URLROOT; ?>/menuController/index" data-toggle="collapse" data-target="#collapseMenu"
            aria-expanded="true" aria-controls="collapseMenu">
            <i class="fa-solid fa-bowl-food"></i>
            <span>Menu</span>
        </a>
        <div id="collapseMenu" class="collapse" aria-labelledby="headingMenu" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo URLROOT; ?>/menuController/index">All Menu</a>
                <a class="collapse-item" href="<?php echo URLROOT; ?>/menuController/create">Add Menu</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Category -->
    <li class="nav-item">
        <a class="nav-link collapsed animated" href="<?php echo URLROOT; ?>/categoryController/index" data-toggle="collapse" data-target="#collapseCategory"
            aria-expanded="true" aria-controls="collapseCategory">
            <i class="fa-solid fa-book"></i>
            <span>Category</span>
        </a>
        <div id="collapseCategory" class="collapse" aria-labelledby="headingCategory"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo URLROOT; ?>/categoryController/index">All Category</a>
                <a class="collapse-item" href="<?php echo URLROOT;?>/categoryController/create">Add Category</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Orders -->
    <li class="nav-item">
        <a class="nav-link animated" href="<?php echo URLROOT; ?>/cartController/orderView">
            <i class="fa-solid fa-cart-plus"></i>
            <span>Orders</span>
        </a>
    </li>

    <!-- Nav Item - Tables -->
    <!-- <li class="nav-item">
        <a class="nav-link collapsed animated" href="<?php echo URLROOT; ?>/tableController" data-toggle="collapse" data-target="#collapseTables"
            aria-expanded="true" aria-controls="collapseTables">
            <i class="fa-solid fa-table"></i>
            <span>Tables</span>
        </a>
        <div id="collapseTables" class="collapse" aria-labelledby="headingTables" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <a class="collapse-item" href="<?php //echo URLROOT; ?>/tableController/index">All Tables</a> -->
                <!-- <a class="collapse-item" href="<?php //echo URLROOT; ?>/tableController/create">Add Table</a> -->
            <!-- </div>
        </div>
    </li>  -->

    <!-- Nav Item - Users -->
    <li class="nav-item">
        <a class="nav-link animated" href="<?php echo URLROOT; ?>/userController/user">
            <i class="fa-solid fa-user-secret"></i>
            <span>Users</span>
        </a>
    </li>

    <!-- Nav Item - Employees -->
    <!-- <li class="nav-item">
        <a class="nav-link collapsed animated" href="<?php echo URLROOT; ?>/employeeController" data-toggle="collapse" data-target="#collapseEmployees"
            aria-expanded="true" aria-controls="collapseEmployees">
            <i class="fa-solid fa-user-tie"></i>
            <span>Employees</span>
        </a>
        <div id="collapseEmployees" class="collapse" aria-labelledby="headingEmployees"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo URLROOT; ?>/employeeController/index">All Employees</a>
                <a class="collapse-item" href="<?php echo URLROOT;?>/employeeController/create">Add Employee</a>
                <a class="collapse-item" href="<?php echo URLROOT;?>/positionController/index">All Position</a>
                <a class="collapse-item" href="<?php echo URLROOT;?>/positionController/create">Add Position</a>
            </div>
        </div>
    </li> -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Settings -->
    <li class="nav-item">
        <a class="nav-link collapsed animated" href="<?php echo URLROOT;?>/controllers/" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-cog"></i>
            <span>Setting</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <a class="collapse-item" href="login.html">About Us</a> -->
                <a class="collapse-item" href="<?php echo URLROOT;?>/contactController/index">Contact Us</a>
                <a class="collapse-item" href="<?php echo URLROOT;?>/controllers/Pages/login">Logout</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            </div>
        </div>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

<style>
    @keyframes rotate {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
    
    .sidebar {
        background-image: url('<?php echo URLROOT; ?>/public/images/sidebar-bg.jpg');
        background-size: cover;
        background-position: center;
    }

    .text-animation {
        font-family: 'Poppins', sans-serif;
        font-weight: bold;
        font-size: 1.2rem;
        transition: transform 0.3s, color 0.3s, font-size 0.3s;
    }

    .text-animation:hover {
        transform: scale(1.1) rotate(5deg);
        color: #FFD700;
        font-size: 1.3rem;
    }

    .animated {
        transition: transform 0.2s ease;
    }

    .animated:hover {
        transform: scale(1.05);
        background-color: rgba(255, 255, 255, 0.1);
    }
</style>
