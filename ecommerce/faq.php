<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

        <?php include 'includes/navbar.php'; ?>

        <div class="content-wrapper">
            <div class="container">

            <main role="main" class="container">
            <div class="starter-template">
                <h1 class="text-center">Frequently Ask Questions</h1></br>

                <h2 id="q1" class="text-left" style="cursor: pointer" ><a>+</a> Where is your location?</h2>
                <p  id="a1" class="lead text-left" style="display:none ">We are located at Ilang-ilang st. Rosario Paralejas compound, Darangan Bridge, Binangonan, Rizal.<br></p>

                <h2 id="q2" class="text-left" style="cursor: pointer" ><a>+</a> What is your contact no.?</h2>
                <p  id="a2" class="lead text-left" style="display:none ">Our contact no. is 09361158354.<br></p>

                <h2 id="q3" class="text-left" style="cursor: pointer" ><a>+</a> What is your price ranges?</h2>
                <p  id="a3" class="lead text-left" style="display:none ">Our price ranges from 200 pesos to 1250 pesos.<br></p>

                <h2 id="q4" class="text-left" style="cursor: pointer" ><a>+</a> What are the mode of payments?</h2>
                <p  id="a4" class="lead text-left" style="display:none ">We have Cash on delivery(COD), Bank transfer, Gcash.<br></p>

                <h2 id="q5" class="text-left" style="cursor: pointer" ><a>+</a> What is your operating hours?</h2>
                <p  id="a5" class="lead text-left" style="display:none ">8:00AM to 6:00PM PH time.<br></p>
            </div>
            
   
            
            </main>

            </div>
        </div>
        <?php $pdo->close(); ?>
        <?php include 'includes/footer.php'; ?>
    </div>

    <?php include 'includes/scripts.php'; ?>

    <script>
$(function(){

	$('#q1').click(function(e){
        

        if( $('#q1 a').text() == "-")
        {
            $('#q1 a').text("+");
        }
       
        else if( $('#q1 a').text() == "+")
        {
            $('#q1 a').text("-");
        }

		$('#a1').toggle();
	});
	
    $('#q2').click(function(e){	
        
        if( $('#q2 a').text() == "-")
        {
            $('#q2 a').text("+");
        }
       
        else if( $('#q2 a').text() == "+")
        {
            $('#q2 a').text("-");
        }

		$('#a2').toggle();
	});
    $('#q3').click(function(e){		

        if( $('#q3 a').text() == "-")
        {
            $('#q3 a').text("+");
        }
       
        else if( $('#q3 a').text() == "+")
        {
            $('#q3 a').text("-");
        }

		$('#a3').toggle();
	});
    
    $('#q4').click(function(e){		

        if( $('#q4 a').text() == "-")
        {
            $('#q4 a').text("+");
        }
       
        else if( $('#q4 a').text() == "+")
        {
            $('#q4 a').text("-");
        }

		$('#a4').toggle();
	});
    $('#q5').click(function(e){		

        if( $('#q5 a').text() == "-")
        {
            $('#q5 a').text("+");
        }
       
        else if( $('#q5 a').text() == "+")
        {
            $('#q5 a').text("-");
        }
        
		$('#a5').toggle();
	});

});
</script>
</body>

</html>