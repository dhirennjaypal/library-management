<?php
	require("./Database.php");
    use dboperations\helper\Plans as plans;
	if(isset($_POST["submit"])){
		$name=$_POST['name'];
		$isbn=$_POST['isbn'];
		$authorName=$_POST['authorName'];
		$price=$_POST['price'];
		$pages=$_POST['pages'];
		$publisher=$_POST['publisher'];
		$bookType=$_POST['bookType'];
		$publishedYear=$_POST['publishedYear'];
		$qty=$_POST['qty'];
		$edition=$_POST['edition'];
		
		$result=plans::insert($name, $isbn, $authorName, $price, $pages, $publisher, $bookType, $publishedYear, $qty, $edition);
		if($result)
			header("Location: ./index.php");
		else
			$error=true;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Insert Book</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
<head>
<body class="bg-dark">

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php">Admin</a></li>
		<li class="breadcrumb-item"><a href="viewBooks.php">Books</a></li>
		<li class="breadcrumb-item active" aria-current="page">Insert New Book</li>
	</ol>
</nav>

<div class="row">
<div class="col-2">
</div>
<div class="col-8">

<div class="card bg-info rounded-lg m-5">
<div class="card-header bg-primary text-white text-center">
	<font size="5px"><b>Create New Plan</b></font>
</div>
<center>
<?php
if($error)
		echo "<font style='color: white'>Something went wrong</font>";
?>
<form method="post" action="./createPlans.php">

            <div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Name</span>
				</div>
				<input type="text" class="form-control" placeholder="Planname" name="name">
			</div>
			
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Plan Days Count</span>
				</div>
				<input type="number" class="form-control" placeholder="days" name="daysCount" max=365>
			</div>
			
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Maximum Books</span>
				</div>
				<input type="number" class="form-control" placeholder="any number less than 12" name="maxBooks" max=12>
			</div>
			
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Amount</span>
				</div>
				<input type="number" class="form-control" placeholder="amount" name="amount">
			</div>
			
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Maximum Issue Duration</span>
				</div>
				<input type="number" class="form-control" placeholder="days" name="maxIssueDuration">
			</div>
			
			
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="addon-wrapping">Penalty Amount</span>
				</div>
				<input type="number" class="form-control" placeholder="amount" name="penaltyAmount">
			</div>
			<input class="btn btn-block btn-primary" type="submit" name="submit" value="save">
    </form>
</center>
</div>
</div>
</div>
</body>
</html>