<?php
session_start();

$pageTitle = "Give an animal";
include('header.php');
$login_file = "login.txt";
$pet_info_file = "pet_info.txt";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $file = fopen($login_file, 'r');
    $users = [];

    while (($line = fgets($file)) !== false) {
      list($user, $pass) = explode(':', trim($line));
      $users[] = ['username' => $user, 'password' => $pass];
    }

    fclose($file);

    $user = null;

    $validUser = false;
    foreach ($users as $u) {
      if ($u['username'] === $username && $u['password'] === $password) {
        $user = $u;
        $validUser = true;
        break;
      }
    }

    if ($validUser) {
      $_SESSION['username'] = $user['username'];

      echo "<script> 
        document.addEventListener('DOMContentLoaded', function() {
          let form1 = document.querySelector('#form1');
          let form2 = document.querySelector('#form2');

          if (form1 && form2) {
            form1.style.display = 'none';
            form2.style.display = 'block';
          }
        });
      </script>";
    } else {
      echo '<script>alert("Invalid username or password")</script>';
    }
  } else if (isset($_POST['animal']) && isset($_POST['gender']) && isset($_POST['info'])) {
    $animal = $_POST['animal'];
    $breed = $animal == 'dog' ? $_POST['dog_breed'] : $_POST['cat_breed'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $info = $_POST['info'];
    $petFile = fopen($pet_info_file, 'a');
    $lines = file($pet_info_file);
    $counter = count($lines) + 1;
    
    $newEntry = $counter . ':' . $_SESSION['username'] . ':' . $animal . ':' . $breed . ':' . $age . ':' . $gender . ':' . $info . "\n";

    fwrite($petFile, $newEntry);
    fclose($petFile);

    echo '<script>alert("Submission successful!")</script>';
  }
}
if (isset($_SESSION['username'])) {
  echo "<script> 
  document.addEventListener('DOMContentLoaded', function() {
    let form1 = document.querySelector('#form1');
    let form2 = document.querySelector('#form2');

    if (form1 && form2) {
      form1.style.display = 'none';
      form2.style.display = 'block';
    }
  });
</script>";
}
?>

<div class="article">
  <div class="container1" id="form1" style="display:block; margin-bottom: 19rem;">
    <form method="POST" class="form" id="login">
      <h1 class="form_title">Login</h1>
      <div class="form_message form_message--error"></div>
      <div class="form__input">
        <input type="text" name="username" id="username" class="form_input" autofocus required placeholder="Username">
        <div class="form_input-error-message"></div>
      </div>
      <div class="form__input">
        <input type="password" name="password" id="password" class="form_input" autofocus required placeholder="Password">
        <div class="form_input-error-message"></div>
      </div>
      <button type="submit" name="submit" class="form_button" id="submit">Continue</button>
      <p class="form_text">
        <a href="createAccount.php" class="form_link" id="linkacc"> Don't have an account? Create account</a>
      </p>
    </form>
  </div>
  <fieldset class="container2"id="form2" style="display:none;">
  <p id="title">Giving an Animal form</p>
  <form id="giveform" method="POST" onsubmit="return validation()">
    <label>Please select the type of animal you wish to give away:</label>
   <input type="radio" name="animal" value="dog" id="dog"> Dog
   <input type="radio" name="animal" value="cat" id="cat"> Cat
    <p> Please select the animal breed:</p>
    <div class="form__input"><label id="dogform">Dog breed:</label></div>
    <div class="form__input"><select id="selectd" name="dog_breed" class="form_input2">
      <option value="">None</option>
      <option value="not">Doesn't matter</option>
      <option value="affenpinscher">Affenpinscher</option>
      <option value="airedale">Airedale Terrier</option>
      <option value="akita">Akita</option>
      <option value="american">American Bulldog</option>
    </select></div>
    <div class="form__input"><label id="catform">Cat Breed:</label></div>
    <div class="form__input"><select id="selectc" name="cat_breed" class="form_input2">
      <option value="">None</option>
      <option value="not">Doesn't matter</option>
      <option value="persian">Persian</option>
      <option value="siamese">Siamese</option>
      <option value="ragdoll">Ragdoll</option>
      <option value="sphynx">Sphynx</option>
    </select></div>
    <label>Age:</label>
    <div class="form__input"><input type="text" name="age" id="age"  placeholder="Age" class="form_input2" ></div>
    <label>Gender:</label>
    <div class="form__input"><select id="gender" name="gender" class="form_input2">
      <option value="">Select gender</option>
      <option value="male">Male</option>
      <option value="female">Female</option>
    </select></div>
    <label>Additional Information:</label>
    <div class="form__input"><textarea id="additional" name="info" rows="10" cols="50" class="form_input2" ></textarea></div>
    <Label>First Name </Label>
    <div class="form__input"><input type = "text" name = "firstname" size = "20" id= "FirstName" class="form_input2"></div>
                <Label id="last">Last Name</label>
                <div class="form__input"><input type = "text" name = "familyname" size = "20" id ="FamilyName" class="form_input2"></div>
                  <label>Email</label>
                  <div class="form__input"> <input type="text" name="email" size ="20" id = "email" class="form_input2"></div>
    <div class="form__input"><button type="submit" name="submit" value="Submit" class="form_button">Submit</button></div>
    <div class="form__input"> <button type = "reset" value = "reset" id = "reset" class = "form_button">Reset</button></div>
  </form>
</fieldset>
</div>
</div>
<?php include('footer.php'); ?>
</body>
</html>

