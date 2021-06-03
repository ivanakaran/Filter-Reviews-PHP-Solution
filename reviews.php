<?php
function getReviews(){
  // Read reviews.json
  $file = file_get_contents('reviews.json');
  $reviews = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $file), true);

  // Sort multidimensional array by text, rating and date
  $sort = [];
  foreach($reviews as $k=>$v){
    $sort['reviewFullText'][$k] = $v['reviewFullText'];
    $sort['rating'][$k] = $v['rating'];
    $sort['reviewCreatedOnDate'][$k] = $v['reviewCreatedOnDate'];
  }

  array_multisort($sort['reviewFullText'], SORT_DESC, $sort['rating'], SORT_ASC, $sort['reviewCreatedOnDate'], SORT_DESC, $reviews);
    
  // echo '<pre>';
  // echo print_r($reviews);
  // echo '</pre>';

  return $reviews;

}