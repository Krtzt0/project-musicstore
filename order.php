<?php
@session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ข้อมูลการสั่งซื้อ</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- DataTable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->

    <?php
	    include("sidebar.php");
	?>


        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                
			<?php
	include("topbar.php");
	?>

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">ข้อมูลการสั่งซื้อ</h1>
                    <a href="order_pdf.php" target="_black" class="btn btn-primary">รายงานข้อมูลการสั่งซื้อ(pdf)</a>
                    <a href="report_order_excel.php" target="_black" class="btn btn-primary">รายงานข้อมูลการสั่งซื้อ(Excel)</a>
                    <?php
                        //เชื่อมต่อฐานข้อมูล
                        include("connectdb.php");
                        //เขียน sql
                        $sql="SELECT orders.Order_id,customer.Customer_name,product.Product_name,employees.Employee_firstname
                        FROM orders INNER JOIN customer ON orders.Customer_id = customer.Customer_id
                        INNER JOIN product ON orders.Product_id = product.Product_id
                        INNER JOIN employees ON orders.Employee_id = employees.Employee_id";
                        //รัน sql
                        $result=mysqli_query($conn,$sql) or die ("sql ผิด");
                        //นับจำนวนข้อมูล
                        $total=mysqli_num_rows($result);
                        echo "<hr> จำนวน".$total."ออเดอร์ <hr>";
                        echo "<table class='table' id='table_id'>";
                        echo "<thead>";
                            echo "<tr>";
                                echo"<th>รหัสการสั่งซื้อ</th>";
                                echo"<th>ชื่อลูกค้า</th>";
                                echo"<th>ชื่อสินค้า</th>";
                                echo"<th>ชื่อพนักงาน</th>";
                            echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                            while($row=mysqli_fetch_assoc($result))
                            {
                                echo "<tr>";
                                echo "<td>".$row["Order_id"]."</td>";
                                echo "<td>".$row["Customer_name"]."</td>";
                                echo "<td>".$row["Product_name"]."</td>";
                                echo "<td>".$row["Employee_firstname"]."</td>";
                                echo "</td>";
                            }
                        echo "</tbody>";
                        echo "</table>";
                        mysqli_close($conn);

                    ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->

			<?php
	include("Footer.php");
	?>

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
    
			<?php
	include("modal_logout.php");
	?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
</body>

</html>