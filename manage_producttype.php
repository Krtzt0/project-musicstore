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

    <title>จัดการข้อมูลประเภทสินค้า</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
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
                    <h1 class="h3 mb-4 text-gray-800">จัดการข้อมูลประเภทสินค้า</h1>   

                    <form id="addproducttype">
                    <div class="form-group">
                        <label for="categoryname">ชื่อประเภทสินค้า:</label>
                        <input type="text" class="form-control" placeholder="" id="Type_name" name="Type_name">
                    </div>
                    <input type="submit" class="btn btn-primary"value="บันทึก">
                    <input type="hidden" id="Type_id" name="Type_id">
                    </form>

                    <?php 
                    //เชื่อมต่อฐานข้อมูล
                        include("connectdb.php");

                        $sql="select * from producttype";
                        $result=mysqli_query($conn,$sql)or die ("sql ผิด");
                        //นับจำนวนข้อมูล
                        $total=mysqli_num_rows($result);
                        echo"จำนวนประเภทสินค้า".$total."ประเภท <hr>";
                        echo "<table class='table' id='table_id'>";
                        echo"<thead>";
                        echo"<tr>";
                        echo"<th>รหัสประเภทสินค้า</th>";
                        echo"<th>ชื่อประเภทสินค้า</th>";
                        echo"<th>แก้ไข</th>";
                        echo"<th>ลบ</th>";
                        echo"</tr>";
                        echo"</thead>";
                        echo"<tboby>";
                        while($row=mysqli_fetch_assoc($result))
                        {
                            echo"<tr>";
                            echo"<td>".$row["Type_id"]."</td>";
                            echo"<td>".$row["Type_name"]."</td>";
                            echo"<th><input type='button' value='แก้ไข' name='edit' class='btn btn-warning' id='".$row["Type_id"]."'></th>";
                            echo"<th><input type='button' value='ลบ' name='delete' class='btn btn-danger' id='".$row["Type_id"]."'></th>";
                            echo"</tr>";

                
                        }
                        echo"<tboby>";



                        echo"</tr>";


                        echo"</table>";
                        mysqli_close($conn);
                    ?>

                        <!-- The Modal -->
                        <div class="modal" id="deleteModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">ต้องการลบจริงหรือไม่</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form id="deleteproducttype">
                                        <div class="form-group">
                                            <label for="categoryname">ชื่อประเภทสินค้า:</label>
                                            <input type="text" class="form-control" placeholder="" id="Type_name_del" name="Type_name_del" readonly>
                                        </div>
                                        
                                        <input type="submit" class="btn btn-primary"value="ลบ">
                                        <input type="hidden" id="Type_id_del" name="Type_id_del">
                                    </form>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>

                                </div>
                            </div>
                        </div>

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
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>

        <script>
            $(document).ready( function () {
            $('#table_id').DataTable();

            //แก้ไข
            $(document).on("click","input[name='edit']",function(){
                var uid=$(this).attr("id"); //อ่านค่า ID
                //alert(uid);
                $.ajax({
                    url:"fetch_edit_producttype.php",
                    method:"post",
                    data:{id:uid},
                    dataType:"json",
                    success:function(data){
                        $('#Type_id').val(data.Type_id);
                        $('#Type_name').val(data.Type_name);
                        $('#description').val(data.description);
                        
                    }
                })
            });

            //ลบ
            $(document).on("click","input[name='delete']",function(){
                var uid=$(this).attr("id"); //อ่านค่า ID
                //alert(uid);
                $.ajax({
                    url:"fetch_edit_producttype.php",
                    method:"post",
                    data:{id:uid},
                    dataType:"json",
                    success:function(data){
                        $('#Type_id_del').val(data.Type_id);
                        $('#Type_name_del').val(data.Type_name);
                        $('#description_del').val(data.description);
                        $('#deleteModal').modal('show');
                        
                    }
                })
            });
            
            //บันทึกข้อมูล
            $('#addproducttype').on('submit',function(e){
                var form = $('#addproducttype')[0];
                var formData = new FormData(form);
                e.preventDefault();
                $.ajax({
                    url:"insert_producttype_sql.php",
                    type:"POST",
                    processData:false,
                    contentType:false,
                    data:formData,
                    beforeSend:function(){
                        alert("ยืนยันการบันทึกข้อมูล");
                    },
                    success:function(data){
                        alert(data);
                        $('#addproducttype')[0].reset();
                        location.reload();
                    }



                });
            });

            //ลบข้อมูล
            $('#deleteproducttype').on('submit',function(e){
                var form = $('#deleteproducttype')[0];
                var formData = new FormData(form);
                e.preventDefault();
                $.ajax({
                    url:"delete_producttype_sql.php",
                    type:"POST",
                    processData:false,
                    contentType:false,
                    data:formData,
                    beforeSend:function(){
                        //alert("ลบข้อมูลเรียบร้อยแล้ว");
                    },
                    success:function(data){
                        alert(data);
                        $('#deleteproducttype')[0].reset();
                        $('#deleteModal').modal('hide');
                        location.reload();
                    }



                });
            });



            });
        </script>

</body>

</html>