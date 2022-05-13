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
							<h1 class="page-header">YOUR CART</h1>
							<div class="box box-solid">
								<div class="box-body">
									<table class="table table-bordered">
										<thead>
											<th></th>
											<th>Photo</th>
											<th>Name</th>
											<th>Price</th>
											<th width="20%">Quantity</th>
											<th>Subtotal</th>
										</thead>
										<tbody id="tbody">
										</tbody>
									</table>
								</div>
							</div>
							<?php
							if (isset($_SESSION['user'])) {


								// echo "
								// 	<div id='paypal-button'></div>
								// ";

								echo "
	        				  <a href='#Checkout' data-toggle='modal' class='btn btn-primary btn-sm btn-flat checkout'>Checkout</a>
	        				";
							} else {
								echo "
	        					<h4>You need to <a href='login.php'>Login</a> to checkout.</h4>
	        				";
							}
							?>
						</div>
						<div class="col-sm-3">
							<?php include 'includes/sidebar.php'; ?>
						</div>
					</div>
				</section>

			</div>
		</div>
		<?php $pdo->close(); ?>
		<?php include 'includes/footer.php'; ?>
	</div>


	<div class="modal fade" id="Checkout">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><b>Checkout</b></h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" method="POST" action="cart_checkout.php">
						<input type="hidden" class="userid" name="id">
						<div class="form-group">
							<label for="product" class="col-sm-3 control-label">Payment Method</label>

							<div class="col-sm-9">
								<select class="form-control select2" style="width: 100%;" name="paymentmethod" id="PaymentMethodDLL" required>
									<option value="COD" selected>COD</option>
									<option value="GCASH">GCASH</option>
									<option value="Bank">Bank</option>
								</select>
							</div>
						</div>

						<div class="form-group">

							<label for="Email" class="col-sm-3 control-label">Email</label>

							<div class="col-sm-9">
								<input type="text" class="form-control" id="Email" name="Email" required>
							</div>

						</div>

						<div class="form-group">

							<label for="ContactNumber" class="col-sm-3 control-label">Contact Number</label>

							<div class="col-sm-9">
								<input type="text" class="form-control" id="ContactNumber" name="ContactNumber" required>
							</div>
						</div>

						<div class="form-group">

							<label for="Address" class="col-sm-3 control-label">Address</label>

							<div class="col-sm-9">
								<input type="text" class="form-control" id="Address" name="Address" required>
							</div>
						</div>

						<div class="form-group">

							<label for="Total" class="col-sm-3 control-label">Total</label>

							<label for="Total" class="col-sm-9 control-label total" style="text-align: left;">Total</label>

						</div>

						<div class="form-group divgcash" style="display: none;">

							<label for="SendGcash" class="col-sm-3 control-label">Seller Number: </label>

							<label for="SendGcash" class="col-sm-9 control-label SendGcash" style="text-align: left;"></label>

						</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
					<button type="submit" class="btn btn-primary btn-flat" name="saveCart" id="savemodal"><i class="fa fa-save"></i> Confirm</button>
					</form>
				</div>
			</div>
		</div>
	</div>


	<?php include 'includes/scripts.php'; ?>
	<script>

		var total = 0;
		$(function() {
			$(document).on('click', '.checkout', function(e) {
				e.preventDefault();
				$('#Checkout .total').text($('.totalcart').text());

				$.ajax({
					type: 'POST',
					url: 'cart_checkout_getmember.php',
					dataType: 'json',
					success: function(response) {
						$('#ContactNumber').val(response.contact);
						$('#Address').val(response.address);
						$('#Email').val(response.email);
					}
				});

			});

			$(document).on('change', '#PaymentMethodDLL', function() {

				$('.divgcash').hide();

				if($(this).val() == "GCASH"){
					$('.divgcash').show();

					$.ajax({
					type: 'POST',
					url: 'cart_checkout_select_gcash.php',
					dataType: 'json',
					success: function(response) {
						$('.SendGcash').text("Send Gcash to " +  response.contact);
					}
				});

				}


			});

			$(document).on('click', '.cart_delete', function(e) {
				e.preventDefault();
				var id = $(this).data('id');
				$.ajax({
					type: 'POST',
					url: 'cart_delete.php',
					data: {
						id: id
					},
					dataType: 'json',
					success: function(response) {
						if (!response.error) {
							getDetails();
							getCart();
							getTotal();
						}
					}
				});
			});

			$(document).on('click', '.minus', function(e) {
				e.preventDefault();
				var id = $(this).data('id');
				var qty = $('#qty_' + id).val();
				if (qty > 1) {
					qty--;
				}
				$('#qty_' + id).val(qty);
				$.ajax({
					type: 'POST',
					url: 'cart_update.php',
					data: {
						id: id,
						qty: qty,
					},
					dataType: 'json',
					success: function(response) {
						if (!response.error) {
							getDetails();
							getCart();
							getTotal();
						}
					}
				});
			});

			$(document).on('click', '.add', function(e) {
				e.preventDefault();
				var id = $(this).data('id');
				var qty = $('#qty_' + id).val();
				qty++;
				$('#qty_' + id).val(qty);
				$.ajax({
					type: 'POST',
					url: 'cart_update.php',
					data: {
						id: id,
						qty: qty,
					},
					dataType: 'json',
					success: function(response) {
						if (!response.error) {
							getDetails();
							getCart();
							getTotal();
						}
					}
				});
			});

			getDetails();
			getTotal();

		});

		function getDetails() {
			$.ajax({
				type: 'POST',
				url: 'cart_details.php',
				dataType: 'json',
				success: function(response) {
					$('#tbody').html(response);
					getCart();
				}
			});
		}

		function getTotal() {
			$.ajax({
				type: 'POST',
				url: 'cart_total.php',
				dataType: 'json',
				success: function(response) {
					total = response;
				}
			});
		}
	</script>
	<!-- Paypal Express -->
	<script>
		paypal.Button.render({
			env: 'sandbox', // change for production if app is live,

			client: {
				sandbox: 'ASb1ZbVxG5ZFzCWLdYLi_d1-k5rmSjvBZhxP2etCxBKXaJHxPba13JJD_D3dTNriRbAv3Kp_72cgDvaZ',
				//production: 'AaBHKJFEej4V6yaArjzSx9cuf-UYesQYKqynQVCdBlKuZKawDDzFyuQdidPOBSGEhWaNQnnvfzuFB9SM'
			},

			commit: true, // Show a 'Pay Now' button

			style: {
				color: 'gold',
				size: 'small'
			},

			payment: function(data, actions) {
				return actions.payment.create({
					payment: {
						transactions: [{
							//total purchase
							amount: {
								total: total,
								currency: 'USD'
							}
						}]
					}
				});
			},

			onAuthorize: function(data, actions) {
				return actions.payment.execute().then(function(payment) {
					window.location = 'sales.php?pay=' + payment.id;
				});
			},

		}, '#paypal-button');
	</script>
	
</body>

</html>