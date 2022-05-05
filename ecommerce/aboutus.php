<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

        <?php include 'includes/navbar.php'; ?>

        <div class="content-wrapper">
            <div class="container">

            <main role="main" class="container">
            <div class="starter-template">
                <h1 class="text-center">Rice Next Door</h1>
                <p class="lead text-center">We want to provide the customers with the best online rice store to order different rice and other rice brands.
                                We will also cater bulk orders for customers who wish to start their own rice business.
                                We are going to supply locally produced rice from our local farmers.<br></p>
            </div>
            <div class="text-center">
                <img src="images/prince-nagtatago.png" alt="Tago pa prince">
                <p class="lead text-center">Therefore, every purchase you make will benefit their efforts as well.
                                We will create an essential and easy-to-use website it will assist customers in swiftly locating what they want and have it delivered to them efficiently.
                                Our purpose is to assist our fellow Filipinos in obtaining high-quality rice supplied quickly and help local farmers to create job opportunities.<br></p>
            </div>
            <div class="text-center">
                <img style="max-width: 600px;" src="images/Mapa-ng-tindahan-ni-jessie.png" alt="Mapa ng Secret Shop">
                <p class="lead text-center">Ilang-ilang st.,<br></p>
                <p class="lead text-center">Rosario Paralejas compund,<br></p>
                <p class="lead text-center">Darangan Bridge, Binangonan<br></p>
                <p class="lead text-center">1940 Rizal<br></p>
            </div>
            
            </main>

            </div>
        </div>
        <?php $pdo->close(); ?>
        <?php include 'includes/footer.php'; ?>
    </div>





</body>

</html>