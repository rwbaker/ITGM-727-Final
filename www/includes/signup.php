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
                <div class="form-group <?php echo (!empty($firstname_err)) ? 'has-error' : ''; ?>">
                  <label for="">First name</label>
                  <input type="text" class="form-control" name="form-text-fname" placeholder="" required value="<?php echo $firstname; ?>">
                  <span class="help-block"><?php echo $firstname_err; ?></span>
                </div>
              </div>
              <div class="col">
                <div class="form-group <?php echo (!empty($lastname_err)) ? 'has-error' : ''; ?>">
                  <label for="">Last name</label>
                  <input type="text" class="form-control" name="form-text-lname" placeholder="" required value="<?php echo $lastname; ?>">
                  <span class="help-block"><?php echo $lastname_err; ?></span>
                </div>
              </div>
            </div>

            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
              <label for="">Email address</label>
              <input type="email" class="form-control" name="form-text-email" required placeholder="" value="<?php echo $email; ?>">
              <span class="help-block"><?php echo $email_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
              <label for="">Password</label>
              <input type="password" class="form-control" name="form-text-password" required placeholder="" value="<?php echo $password; ?>">
              <span class="help-block"><?php echo $password_err; ?></span>
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
