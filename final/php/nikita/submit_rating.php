<?php

// $connect = new PDO("mysql:host=localhost;dbname=webfinal", "root", "");
require(dirname(dirname(__FILE__))."/db.php");
 

if(isset($_POST["rating_data"]))
{
	$user_name = $_POST["user_name"];
	$user_rating =	$_POST["rating_data"];
	$user_review =	$_POST["user_review"];
	$product_id =	$_POST["product_id"];

	$query = "
	INSERT INTO feedbacks 
	(name, product_id, rating, text) 
	VALUES ('$user_name', $product_id, $user_rating, '$user_review')
	";

	mysqli_query($conn, $query);

	echo "Your Review & Rating Successfully Submitted";

}

if(isset($_POST["action"]))
{

	$product_id = $_POST["product_id"];

	$average_rating = 0;
	$total_review = 0;
	$five_star_review = 0;
	$four_star_review = 0;
	$three_star_review = 0;
	$two_star_review = 0;
	$one_star_review = 0;
	$total_user_rating = 0;
	$review_content = array();

	$get_allFeedbacks = "SELECT * FROM feedbacks WHERE product_id=$product_id ORDER BY id DESC";
	
	$result = mysqli_query($conn, $get_allFeedbacks);

	while($row = $result->fetch_assoc()) {
		$row_data = array(
			'user_name'		=>	$row["name"],
			'user_review'	=>	$row["text"],
			'rating'		=>	$row["rating"],
			'datetime'		=>	$row["created_at"]
		);

		array_push($review_content, $row_data);


		if($row["rating"] == '5')
		{
			$five_star_review++;
		}

		if($row["rating"] == '4')
		{
			$four_star_review++;
		}

		if($row["rating"] == '3')
		{
			$three_star_review++;
		}

		if($row["rating"] == '2')
		{
			$two_star_review++;
		}

		if($row["rating"] == '1')
		{
			$one_star_review++;
		}

		$total_review++;

		$total_user_rating = $total_user_rating + $row["rating"];

	}

	$average_rating = $total_user_rating / $total_review;

	$output = array(
		'average_rating'	=>	number_format($average_rating, 1),
		'total_review'		=>	$total_review,
		'five_star_review'	=>	$five_star_review,
		'four_star_review'	=>	$four_star_review,
		'three_star_review'	=>	$three_star_review,
		'two_star_review'	=>	$two_star_review,
		'one_star_review'	=>	$one_star_review,
		'review_data'		=>	$review_content
	);

	echo json_encode($output);

}

?>