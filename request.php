<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>


<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

    <?php include 'includes/navbar.php'; ?>

    <div class="content-wrapper">
        <div class="container">

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-sm-9">
                        <?php
                        if (isset($_SESSION['error'])) {
                            echo "
	        					<div class='alert alert-danger'>
	        						" . $_SESSION['error'] . "
	        					</div>
	        				";
                            unset($_SESSION['error']);
                        }
                        ?>
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="images/banner1.png" alt="First slide">
                                </div>
                                <div class="item">
                                    <img src="images/banner2.png" alt="Second slide">
                                </div>
                                <div class="item">
                                    <img src="images/banner3.png" alt="Third slide">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="fa fa-angle-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="fa fa-angle-right"></span>
                            </a>
                        </div>
                        <h2>Request A Product</h2>

                        <?php
                        if (isset($_SESSION['confirm_message']) && $_SESSION['confirm_message'] === true):
                            ?>
                            <div class="card bg-success mb-5 p-5 text-20 text-center">
                                Your request is processing.<br>
                                Our team will contact with you in a moment.
                            </div>
                            <?php
                            unset($_SESSION['confirm_message']);
                        endif;
                        ?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-solid">
                                    <div class="box-body">
                                        <p>Please submit the form to request a product</p>
                                        <form action="request-product.php" method="POST">
                                            <div class="form-group has-feedback">
                                                <input type="text" class="form-control" name="product_name"
                                                       placeholder="Product Name"
                                                       value="<?php echo (isset($_SESSION['product_name'])) ? $_SESSION['product_name'] : '' ?>"
                                                       required>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <textarea class="form-control" name="product_details"
                                                          placeholder="Type Product Description eg. color or size or quantity"
                                                          rows="5"
                                                          required><?php echo (isset($_SESSION['product_details'])) ? $_SESSION['product_details'] : '' ?></textarea>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <input type="text" class="form-control" name="reference_link"
                                                       placeholder="Reference Link"
                                                       value="<?php echo (isset($_SESSION['reference_link'])) ? $_SESSION['reference_link'] : '' ?>"
                                                       required>
                                                <span class="glyphicon glyphicon-link form-control-feedback"></span>
                                                <small><span class="text-danger">*</span><i>Link limit is 120
                                                        characters</i></small>
                                            </div>
                                            <div class="row mt-5">
                                                <div class="col-xs-3">
                                                    <button type="submit" class="btn btn-primary btn-block btn-flat"
                                                            name="request">
                                                        Make A Request
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <?php include 'includes/sidebar.php'; ?>
                    </div>
                </div>
            </section>

        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>