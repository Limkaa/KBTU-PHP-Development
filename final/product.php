<?php 
session_start();
require_once 'php/db.php';
$user_id = $_SESSION['user_id'];

$product_id = $_GET['product_id'];
$get_product_query = "SELECT * FROM products WHERE id='$product_id'";
$product = mysqli_query($conn, $get_product_query)->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="images//nikita/jusan1.jpg"/>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="styles/nikita/a.css" />
    <link rel="stylesheet" href="styles/arslan/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Jmart</title>
  </head>
  <body>
  <?php include("php/arslan/jmart_header.php") ?>
    <div class="container">
      <input type="text" value="<?php echo $product['id']?>" id="product_id" class="hidden">

      <div class='summa2'>
      <main>

        <section class="thumbnails">
          <img
            src='images/arslan/products/<?php echo $product['photo_path']?>' alt='<?php echo $product['photo_path']?>'
            class="main-thumbnail invisible-mob"
          />
        </section>
        <section class="content">
          <br>
          <p class="company">Jmart</p>
          <h1 class="title" style=" font-family: Arial, sans-serif; font-weight:bold"><?php echo $product['name']?></h1>
          
          

          <p class="info">
            <p><?php echo (substr($product['description'], 0, 99)); ?>...</p>     
          </p>
          
          <span class="span1"><a href="#go">Полное описание </a><img src="images//nikita/arrow.svg" height="15px" width="15px" /></span>
          <br><br>
          <div class="price">
            <div class="new-price">
            <br>
              <p class="now"><?php echo $product['price']?>₸</p>
            </div>
          </div>
          <div class="buttons">
            <div class="amount-btn">
              <button id="minus">
                <img src="images/nikita/icon-minus.svg" alt="minus" />
              </button>
              
              <p class="amount" id="product_quantity">0</p>
              
              <button id="plus">
                <img src="images/nikita/icon-plus.svg" alt="plus" />
              </button>
            </div>
            <button class="add_btn" id="add_to_cart">
              <img src="images/nikita/icon-cart.svg" alt="cart" />
              Добавить
            </button>
          </div>
        </section>
      </main>
    </div>
</div>
<div class='summa3' id="go">
    <h1 style=" font-family: Arial, sans-serif; font-weight:bold">Описание</h1>
    <div class="spoiler_wrap">
        <input type="checkbox" class="read-more-state" id="visible" />
        <div class="spoiler_content">
            <p><?php echo $product['description']; ?></p>
        </div>
    </div>
</div>
<br> 
<div class="container"> 
     <h1 class="mt-5 mb-5">Отзывы и Рейтинг</h1> 
     <div class="card"> 
      <div class="card-header"><?php echo $product['name']?></div> 
      <div class="card-body"> 
       <div class="row"> 
        <div class="col-sm-4 text-center"> 
         <h1 class="text-warning mt-4 mb-4"> 
          <b><span id="average_rating">0.0</span> / 5</b> 
         </h1> 
         
         <h3><span id="total_review">0</span> Оценок</h3> 
          </div> 
              <div class="col-sm-4"> 
                <p> 
                  <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div> 
                  <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div> 
                  <div class="progress"> 
                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div> 
                  </div> 
                </p> 
                <p> 
                  <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div> 
                  <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div> 
                  <div class="progress"> 
                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div> 
                  </div>                
                </p> 
          <p> 
                  <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div> 
                  <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div> 
                  <div class="progress"> 
                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div> 
                   </div>                
                </p> 
          <p> 
              <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div> 
                          
                <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div> 
                  <div class="progress"> 
                  <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div> 
                </div>                
          </p> 
          <p> 
            <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div> 
              
            <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div> 
            <div class="progress"> 
                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div> 
            </div>                
          </p> 
        </div> 
        <div class="col-sm-4 text-center"> 
         <h3 class="mt-4 mb-3">Оставить отзыв о продукте здесь</h3> 
         <button type="button" name="add_review" id="add_review" class="btn btn-primary" style="background-color: orange;" >Отзыв</button> 
        </div> 
       </div> 
      </div> 
     </div> 
     <div class="mt-5" id="review_content"></div> 
    </div>

    <script src="js/nikita/app.js"></script>
  </body>
</html>



<div id="review_modal" class="modal" tabindex="-1" role="dialog">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title">Оставить отзыв</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="background-color: orange;">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
	      	<div class="modal-body">
	      		<h4 class="text-center mt-2 mb-4">
	        		<i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
	        	</h4>
	        	<div class="form-group">
	        		<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Введите ваше Имя" />
	        	</div>
	        	<div class="form-group">
	        		<textarea name="user_review" id="user_review" class="form-control" placeholder="Текст"></textarea>
	        	</div>
	        	<div class="form-group text-center mt-4">
	        		<button type="button" class="btn btn-primary" id="save_review">Загрузить</button>
	        	</div>
	      	</div>
    	</div>
  	</div>
</div>

<style>
.progress-label-left
{
    float: left;
    margin-right: 0.5em;
    line-height: 1em;
}
.progress-label-right
{
    float: right;
    margin-left: 0.3em;
    line-height: 1em;
}
.star-light
{
	color:gray;
}
</style>

<script>

$(document).ready(function(){

	var rating_data = 0;

    $('#add_review').click(function(){

        $('#review_modal').modal('show');

    });

    $(document).on('mouseenter', '.submit_star', function(){

        var rating = $(this).data('rating');

        reset_background();

        for(var count = 1; count <= rating; count++)
        {

            $('#submit_star_'+count).addClass('text-warning');

        }

    });

    function reset_background()
    {
        for(var count = 1; count <= 5; count++)
        {

            $('#submit_star_'+count).addClass('star-light');

            $('#submit_star_'+count).removeClass('text-warning');

        }
    }

    $(document).on('mouseleave', '.submit_star', function(){

        reset_background();

        for(var count = 1; count <= rating_data; count++)
        {

            $('#submit_star_'+count).removeClass('star-light');

            $('#submit_star_'+count).addClass('text-warning');
        }

    });

    $(document).on('click', '.submit_star', function(){

        rating_data = $(this).data('rating');

    });

    $('#add_to_cart').click(function() {
      if (+$('#product_quantity').text() == 0) {
        alert('Выберите количество товара');
        return;
      }
      $.ajax({
        url:"/final/php/nikita/add_to_cart.php",
        method:"POST",
        data:{product_id: $('#product_id').val(), quantity: +$('#product_quantity').text()},
        success:function(data)
        {
            $('#review_modal').modal('hide');

            load_rating_data();

            alert("Товар добавлен в корзину");
            $('#product_quantity').text('0')
        }
      })
    })

    $('#save_review').click(function(){

        var user_name = $('#user_name').val();

        var user_review = $('#user_review').val();

        if(user_name == '' || user_review == '')
        {
            alert("Please Fill Both Field");
            return false;
        }
        else
        {
            $.ajax({
                url:"/final/php/nikita/submit_rating.php",
                method:"POST",
                data:{
                  rating_data:rating_data, 
                  user_name:user_name, 
                  user_review:user_review, 
                  product_id: $('#product_id').val()
                },
                success:function(data)
                {
                    $('#review_modal').modal('hide');
                    $('#user_name').val('');
                    $('#user_review').val('');
                    load_rating_data();
                    alert(data);
                }
            })
        }

    });

    load_rating_data();

    function load_rating_data()
    {
        $.ajax({
            url:"/final/php/nikita/submit_rating.php",
            method:"POST",
            data:{action:'load_data', product_id: $('#product_id').val()},
            dataType:"JSON",
            success:function(data)
            {
                $('#average_rating').text(data.average_rating);
                $('#total_review').text(data.total_review);

                var count_star = 0;

                $('.main_star').each(function(){
                    count_star++;
                    if(Math.ceil(data.average_rating) >= count_star)
                    {
                        $(this).addClass('text-warning');
                        $(this).addClass('star-light');
                    }
                });

                $('#total_five_star_review').text(data.five_star_review);

                $('#total_four_star_review').text(data.four_star_review);

                $('#total_three_star_review').text(data.three_star_review);

                $('#total_two_star_review').text(data.two_star_review);

                $('#total_one_star_review').text(data.one_star_review);

                $('#five_star_progress').css('width', (data.five_star_review/data.total_review) * 100 + '%');

                $('#four_star_progress').css('width', (data.four_star_review/data.total_review) * 100 + '%');

                $('#three_star_progress').css('width', (data.three_star_review/data.total_review) * 100 + '%');

                $('#two_star_progress').css('width', (data.two_star_review/data.total_review) * 100 + '%');

                $('#one_star_progress').css('width', (data.one_star_review/data.total_review) * 100 + '%');

                if(data.review_data.length > 0)
                {
                    var html = '';

                    for(var count = 0; count < data.review_data.length; count++)
                    {
                        html += '<div class="row mb-3">';

                        html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">'+data.review_data[count].user_name.charAt(0)+'</h3></div></div>';

                        html += '<div class="col-sm-11">';

                        html += '<div class="card">';

                        html += '<div class="card-header"><span>'+data.review_data[count].datetime+'</span><br/><b>'+data.review_data[count].user_name+'</b></div>';

                        html += '<div class="card-body">';

                        for(var star = 1; star <= 5; star++)
                        {
                            var class_name = '';

                            if(data.review_data[count].rating >= star)
                            {
                                class_name = 'text-warning';
                            }
                            else
                            {
                                class_name = 'star-light';
                            }

                            html += '<i class="fas fa-star '+class_name+' mr-1"></i>';
                        }

                        html += '<br />';

                        html += data.review_data[count].user_review;

                        html += '</div>';


                        html += '</div>';

                        html += '</div>';

                        html += '</div>';
                    }

                    $('#review_content').html(html);
                }
            }
        })
    }

});

</script>


