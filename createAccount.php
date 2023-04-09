<?php 
$pageTitle = "Register";
include('header.php'); 
$login_file = "login.txt";
function usernameExists($username, $login_file) {
  $file = fopen($login_file, "r");
  while(!feof($file)) {
    $line = trim(fgets($file));
    if($line) {
      list($existing_username, $password) = explode(":", $line);
      if($username == $existing_username) {
        fclose($file);
        return true;
      }
    }
  }
  fclose($file);
  return false;
}

function writeToLoginFile($username, $password, $login_file) {
  $file = fopen($login_file, "a");
  fwrite($file, $username . ":" . $password . "\n");
  fclose($file);
}
  if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if(usernameExists($username, $login_file)) {
      $message = "Username already exists. Please choose another one.";
    } else {
      if(preg_match("/^[a-zA-Z0-9]+$/", $username) && preg_match("/^(?=.*[0-9])(?=.*[a-zA-Z])[a-zA-Z0-9]{4,}$/", $password)) {
        writeToLoginFile($username, $password, $login_file);
        $message = "Account created successfully. You may now login whenever you are ready.";
      } else {
        $message = "Invalid username or password format.";
      }
    }
  }
?>
<div class="article">
  <div class ="container1">
    <form action ="createAccount.php" method="POST" class="form" id="createacc">
      <h1 class="form_title">Create Account</h1>
        <div class="form_message form_message--error"></div>
        <div class ="form__input">
  <input type="text" name="username" id="signupusername" class="form_input" autofocus placeholder="Username">
  <div class="form_input-error-message"></div>
</div>
<div class="form__input-description">
  <p>A username can contain letters (both upper and lower case) and digits only.</p>
</div>
<div class ="form__input">
  <input type="password" name="password" id="signuppassword" class="form_input" autofocus placeholder="Password">
  <div class="form_input-error-message"></div>
</div>
<div class="form__input-description">
  <p>A password must be at least 4 characters long (characters are to be letters and digits only), have at least one letter and at least one digit.</p>
</div>
        <button type ="submit" name="submit" class="form_button">Continue</button> 
        <?php
if(isset($message) && $message == "Account created successfully. You may now login whenever you are ready.") {
  echo '<div class="form_message form_message--success">' . $message . '</div>';
}
else if(isset($message) && $message == "Invalid username or password format."){
  echo '<div class="form_message form_message--error">' . $message . '</div>';
}
else if (isset($message) && $message == "Username already exists. Please choose another one."){
  echo '<div class="form_message form_message--error">' . $message . '</div>';
}
  
?>
      </form>
  </div>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>

<?php include('footer.php'); ?>
</body>
</html>