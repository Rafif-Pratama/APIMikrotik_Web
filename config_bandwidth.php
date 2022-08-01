<!DOCTYPE html>
<html lang="en">

<head>
<?php
  include 'koneksi_database.php';
  session_start();
  if($_SESSION['status'] !="login"){
    header("location:login.php");
  }
  ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Web Mikrotik</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laptop-code"></i>
                </div>
                <div class="sidebar-brand-text mx-3">MikrotikAPI</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="status.php">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Status</span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Config</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="config_bandwidth.php">Manajemen Bandwith</a>
                        <a class="collapse-item" href="config_ip_address.php">IP Address</a>
                        <!-- <a class="collapse-item" href="config_ping.php">Ping</a> -->
                    </div>
                </div>
            </li>

            <!-- Divider -->

            <!-- Heading -->

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="traffic.php" >
                    <i class="fas fa-network-wired"></i>
                    <span>Traffic</span>
                </a>
            </li>


            <!-- Nav Item - Logout -->
            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <i class="fas fa-power-off"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <h4>Manajamen Bandwidth</h4>
                    </form>
                   
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

        
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php include 'koneksi_database.php'; echo  $_SESSION['username']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                   <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <!--<h1 class="h3 mb-0 text-gray-800">Manajamen Bandwith</h1>-->
                        <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
                    </div>

                    <!-- Modal -->

                    <div id="contact">
                        <button type="button" class="btn btn-info btn" data-toggle="modal" data-target="#contact-modal">Tambah Client</button>
                    </div>
                    <br>
                    <div id="contact-modal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3>Tambah Client</h3>
                                    <a class="close" data-dismiss="modal">×</a>
                                </div>
                                <form id="contactForm" name="contact" role="form" method="post">
                                    <div class="modal-body">                
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" placeholder="Name" name="name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="target">Target</label>
                                            <input type="text" placeholder="192.168.X.X" name="target" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="limit">Upload Max Limit / Download Max Limit : </label>
                                            <select id="limit_bandwith" onchange="isi_limit()">
                                                <option value="0">--Pilih--</option>
                                                <option value="64K/64K">64K/64K</option>
                                                <option value="128K/128K">128K/128K</option>
                                                <option value="256K/256K">256K/256K</option>
                                                <option value="512K/512K">512K/512K</option>
                                                <option value="768K/768K">768K/768K</option>
                                                <option value="1M/1M">1M/1M</option>
                                                <option value="2M/2M">2M/2M</option>
                                                <option value="3M/3M">3M/3M</option>
                                                <option value="5M/5M">5M/5M</option>
                                                <option value="7M/7M">7M/7M</option>
                                                <option value="10M/10M">10M/10M</option>
                                            </select>
                                            <input type="text" name="limit" id="limit" readonly class="form-control">
                                                 <script type="text/javascript">
                                                    function isi_limit(){
                                                        var data = document.getElementById("limit_bandwith").value;
                                                        document.getElementById("limit").value=data;
                                                    }
                                                 </script>
                                            </input>
                                        </div>     
                                    </div>
                                    <div class="modal-footer">                  
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <input type="submit" value="Tambahkan" name="submit" class="btn btn-success" id="submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                        <!-- script adding queue -->

                    <?php
                        require('routeros_api.class.php');

                        if (isset($_POST['submit'])) {

                        $API = new RouterosAPI();
                        // Aktifkan debug
                        $API->debug = false;

                        $nama = $_POST['name'];
                        $ip = $_POST['target'];
                        $limit = $_POST['limit'];

                        if ($API->connect('192.168.13.1', 'admin', ''))
                        {       
                                               
                            $API->write('/queue/simple/add', false);
                            $API->write('=name='.$nama,false);
                            $API->write('=target='.$ip, false);
                            $API->write('=max-limit='.$limit, false);
                            $API->write('=disabled=no');
                            $ARRAY = $API->read();

                        }
                            $API->disconnect();
                            echo "<p>Queue telah ditambahkan..<br>";
                        }
                          
                    ?>
                    <!-- //end of script queue -->

                    <!-- DataTables Example -->
                    <div id="homepanggil"></div>

                        <!-- Card Item -->
                        <!-- Isi dari halaman menu List Manajemen Bandwith -->
                        <script src="./vendor/jquery/jquery.min.js"></script>
                          
                          <script>
                            $(document).ready(function() {                                
                              var interval = setInterval(function() {
                                $.ajax({
                                  url: './realtime/client-bandwith.php? ',
                                  success: function(data) {                              
                                    $('#homepanggil').html(data);
                                  }
                                });
                              }, 1000);
                            });
                        </script>            
                </div>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Rafif</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>
</html>