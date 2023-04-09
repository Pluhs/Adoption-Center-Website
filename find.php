<?php $pageTitle = "Find an animal";
include('header.php'); ?>
  <div class="article">
    <fieldset class="container2">
        <p id="title">Find a Dog/Cat form</p>
        <form id="findform" method="POST" action="browse.php" onsubmit="return validation()">
            <div class="form__input">
                <label>Please select the type of animal:</label>
                <input type="radio" name="animal" value="dog"> Dog
                <input type="radio" name="animal" value="cat"> Cat 
            </div>
            <div class="form__input">
                <p>Please select the animal breed:</p>
                <label id="dogform">Dog breed:</label>
                <select id="selectd" class="form_input2" name="dog_breed">
                    <option value="">None</option>
                    <option value="not">Doesn't matter</option>
                    <option value="affenpinscher">Affenpinscher</option>
                    <option value="airedale terrier">Airedale Terrier</option>
                    <option value="akita">Akita</option>
                    <option value="american bulldog">American Bulldog</option>
                </select>
                <label id="catform">Cat Breed:</label>
                <select id="selectc" class="form_input2" name="cat_breed">
                  <option value="">None</option>
                    <option value="not">Doesn't matter</option>
                    <option value="persian">Persian</option>
                    <option value="bengal">Bengal</option>
                    <option value="shorthair">Shorthair</option>
                    <option value="american curl">American Curl</option>
                </select>
            </div>
            <div class="form__input">
                <label id="ageform">Please select the preferred age of the animal:</label>
                <select id="age" class="form_input2" name="age">
                    <option value="not">Doesn't matter</option>
                    <option value="0-1">0-1 year</option>
                    <option value="1-3">1-3 years</option>
                    <option value="4+">4+ years</option>
                </select>
            </div>
            <div class="form__input">
                <label>Please select the preferred gender of the animal:</label>
                <input type="radio" name="gender" value="male"> Male
                <input type="radio" name="gender" value="female"> Female 
                <input type="radio" name="gender" value="not"> Doesn't matter
            </div>
            <div class="form__input">
                <label>Pick as many as apply for the animal:</label>
                <input type="checkbox" name="gets_along_with_dogs"> Gets along with other dogs
                <input type="checkbox" name="gets_along_with_cats"> Gets along with other cats
                <input type="checkbox" name="gets_along_with_children"> Gets along with children
            </div>
            <div class="form__input">
                <input type="submit" value="submit" id="submit" class="form_button">
                </div> 
                <div class="form__input">
                <input type="reset" value="reset" id="reset" class="form_button"> 
            </div>
        </form>
    </fieldset>
</div>
</div>
<?php include('footer.php'); ?>
</body>
</html>