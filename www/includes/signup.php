<?php

  // session_start();

  $is_admin = false;

  if (isset($_SESSION)) {
      if (isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == true) {
          if ($_SESSION["user_type"] == "admin") {
              $is_admin = true;
          }
      }
  }


?>

            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="">First name</label>
                  <input type="text" class="form-control <?php echo (!empty($firstname_err)) ? 'is-invalid' : ''; ?>" name="form-text-fname" placeholder="" required value="<?php echo $firstname; ?>">
                  <div class="invalid-feedback"><?php echo $firstname_err; ?></div>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="">Last name</label>
                  <input type="text" class="form-control <?php echo (!empty($lastname_err)) ? 'is-invalid' : ''; ?>" name="form-text-lname" placeholder="" required value="<?php echo $lastname; ?>">
                  <div class="invalid-feedback"><?php echo $lastname_err; ?></div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="">Email address</label>
              <input type="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" name="form-text-email" required placeholder="" value="<?php echo $email; ?>">
              <div class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>

            <div class="form-group">
              <label for="">Password</label>
              <input type="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" name="form-text-password" required placeholder="" value="<?php echo $password; ?>">
              <div class="invalid-feedback"><?php echo $password_err; ?></div>
            </div>

            <?php
            if ($is_admin == true) {
                echo '
              <div class="form-group">
                <label for="">Make Admin User?</label>
                <select id="inputUserType" name="form-select-usertype" class="form-control">
                  <option value="">No</option>
                  <option value="admin">Yes</option>
                </select>
              </div>
              ';
            }
            ?>

            <button type="submit" name="submit" class="btn btn-primary btn-lg mt-2">Submit</button>
