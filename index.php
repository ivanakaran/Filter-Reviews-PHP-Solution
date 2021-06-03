<?php
require 'reviews.php';
$reviews = getReviews();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Filter Reviews</title>
</head>

<body>
  <div class="container py-5">
    <div class="row">
      <div class="col-lg-6 offset-3">
        <h2 class="text-center">Filter Reviews</h2>
        <form action="index.php" method="post">
          <div class="form-group">
            <label for="orderByRating" class="font-weight-bold">Order by rating:</label>
            <select name="rating" id="orderByRating" class="form-control">
              <option value="highest">Highest First</option>
              <option value="lowest">Lowest First</option>
            </select>
          </div>
          <div class="form-group">
            <label for="orderByRatingNumber" class="font-weight-bold">Minimum Rating:</label>
            <select name="rating_number" class="form-control" id="orderByRatingNumber">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </div>
          <div class="form-group">
            <label for="text" class="font-weight-bold">Order by date:</label>
            <select name="date" id="text" class="form-control">
              <option value="oldest">Oldest</option>
              <option value="newest">Newest</option>
            </select>
          </div>
          <div class="form-group">
            <label for="text" class="font-weight-bold">Prioritize by text:</label>
            <select name="text" id="text" class="form-control">
              <option value="yes">Yes</option>
              <option value="no">No</option>
            </select>
          </div>

          <button type="submit" class="btn btn-primary" name="filter">Filter</button>
        </form>
      </div>
    </div>

    <div class="row py-5">
      <div class="col-lg-8 offset-2">
        <table class="table table-stripped table-bordered">
          <thead>
            <tr>
              <th>Review Text</th>
              <th>Rating</th>
              <th>Review Date</th>
            </tr>
          </thead>
          <tbody>
            <?php
         if(isset($_POST['filter'])){
          //  Get input values
           $rating = $_POST['rating'];
           $rating_number = $_POST['rating_number'];
           $date = $_POST['date'];
           $text = $_POST['text'];


          //  Associate input values with json data
          foreach($reviews as $review){
            $rating = $review['rating'];
            $date  = $review['reviewCreatedOnDate'];
            $text = $review['reviewFullText'];

            ?>
            <tr>
              <td><?=$text?></td>
              <td><?=$rating?></td>
              <td><?=$date?></td>
            </tr>
            <?php
          }
         }
         ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>

</html>