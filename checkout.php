<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<div class="wrapper">
		<div class="checkout_wrapper">
			<div class="product_info"></div>
				
				<div class="content">
					
				</div>
			<?php
			if(isset($_POST['place'])){
			?>
				<form action="cart.php" method="post">
			<div class="checkout_form">
				<p>Payment Section</p>
				<div class="details">
					<div class="section">
						<input type="text" placeholder="Card number" required>
					</div>
					<div class="section">
						<input type="text" placeholder="Name on card" required>
					</div>
					<div class="section last_section">
						<div class="item">
							<input type="text" placeholder="MM/YY" required>
						</div>
						<div class="item">
							<input type="text" placeholder="CVV" required>
						</div>
					</div>
					<div class="btn grey">
						<button type="submit" name="pay">Pay</button>
					</div>
				</div>
			</div>
			</form>
			<?php }else if(isset($_POST['buy'])){ 
				$id=$_POST['cid'];
				echo '
				<form action="home.php" method="post">
			<div class="checkout_form">
				<p>Payment Section</p>
				<div class="details">
					<div class="section">
						<input type="text" placeholder="Card number" required>
					</div>
					<div class="section">
						<input type="text" placeholder="Name on card" required>
					</div>
					<div class="section last_section">
						<div class="item">
							<input type="text" placeholder="MM/YY" required>
						</div>
						<div class="item">
							<input type="text" placeholder="CVV" required>
						</div>
					</div>
					<div class="btn grey">
						<button type="submit" name="pay" value='.$id.'>Pay</button>
					</div>
				</div>
			</div>
			</form>
			'; } ?>
		</div>
	</div>
