<?php
$pageTitle = "Browse";
include('header.php');
$file_contents = file("pet_info.txt", FILE_IGNORE_NEW_LINES);
$animal = $_POST['animal'];
$dog_breed = $_POST['dog_breed'];
$cat_breed = $_POST['cat_breed'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$card_output = '';

foreach ($file_contents as $line) {
  $fields = explode(":", $line);
  $id = $fields[0];
  $user = $fields[1];
  $pet_animal = $fields[2];
  $pet_breed = strtolower($fields[3]);
  $pet_age = $fields[4];
  $pet_gender = $fields[5];
  
  if (($pet_animal == $animal || $animal == 'not')
      && (
          ($pet_animal == 'cat' && ($cat_breed == 'not' || strtolower($pet_breed) == strtolower($cat_breed))) ||
          ($pet_animal == 'dog' && ($dog_breed == 'not' || strtolower($pet_breed) == strtolower($dog_breed)))
         )
      && (($age == 'not') ||
          (($age == '0-1' && $pet_age <= 1) ||
           ($age == '1-3' && ($pet_age > 1 && $pet_age <= 3)) ||
           ($age == '4+' && $pet_age > 3)))
      && ($pet_gender == $gender || $gender == 'not')
  ) {
    $card = "<div class='card' style='display:block' id='$id'>";
    $card .= "<div class='card-image img$id'></div>";
    $card .= "<h2>$pet_breed • $pet_age • $pet_gender</h2>";
    $card .= "<button class='interested'>Interested</button></div>";
    $card_output .= $card;
  }
}

if (!$card_output) {
  $card_output = "<div class='card' style='display:block'><p>No available pets</p></div>";
}
?>

<div class="article">
<div class="container">
<p id="title">Browse Available Pets</p>
<?php echo $card_output; ?>
</div>
</div>
<?php include('footer.php'); ?>
</body>
</html>

