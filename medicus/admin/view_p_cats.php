<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login/index.php','_self')</script>";

}

else {

?>

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">View Product Categories</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                       <center>
              


<div class="table-responsive"><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped"><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>

                                    <th>Product Category Id</th>
                                    <th>Product Category Title</th>
                                    <th>Product Category Description</th>
                                    <th>Delete Product Category</th>
                                    <th>Edit Product Category</th>


                                </tr>

                            </thead>

                            <tbody>
                                <?php

$i=0;

$get_p_cats = "select * from product_categories";
$run_p_cats = mysqli_query($con,$get_p_cats);
while($row_p_cats = mysqli_fetch_array($run_p_cats)){
$p_cat_id = $row_p_cats['p_cat_id'];
$p_cat_title = $row_p_cats['p_cat_title'];
$p_cat_desc = $row_p_cats['p_cat_desc'];
$i++;

?>

                                    <tr>

                                        <td>
                                            <?php echo $i; ?> </td>

                                        <td>
                                            <?php echo $p_cat_title; ?> </td>

                                        <td width="300">
                                            <?php echo $p_cat_desc; ?> </td>

                                        <td>

                                            <a href="index.php?delete_p_cat=<?php echo $p_cat_id; ?>">

<i class="fa fa-trash-o"></i> Delete

</a>

                                        </td>

                                        <td>

                                            <a href="index.php?edit_p_cat=<?php echo $p_cat_id; ?>">

<i class="fa fa-pencil"></i> Edit

</a>

                                        </td>


                                    </tr>

<?php } ?>

</tbody><!-- tbody Ends -->

</table><!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends -->



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
