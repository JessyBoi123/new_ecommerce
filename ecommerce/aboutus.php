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
                            <h1 class="page-header">About US</h1>
                            <p style="font-size: medium;">We want to provide the customers with the best online rice store to order different rice and other rice brands.
                                We will also cater bulk orders for customers who wish to start their own rice business.
                                We are going to supply locally produced rice from our local farmers.</p>
                            <p style="font-size: medium;">Therefore, every purchase you make will benefit their efforts as well.
                                We will create an essential and easy-to-use website it will assist customers in swiftly locating what they want and have it delivered to them efficiently.
                                Our purpose is to assist our fellow Filipinos in obtaining high-quality rice supplied quickly and help local farmers to create job opportunities.</p>

                            <a>Contact Us : 0917299485002</a>
                        </div>
                </section>

            </div>
        </div>
        <?php $pdo->close(); ?>
        <?php include 'includes/footer.php'; ?>
    </div>





</body>

</html>