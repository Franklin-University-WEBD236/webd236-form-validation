<!DOCTYPE html>
<html>
  <head>
    <title><?php echo(htmlspecialchars(CONFIG['applicationName']. " - " . $title)); ?></title>
    <link rel="shortcut icon" href="https://cdn.glitch.com/7635e9c3-2015-4ec8-967a-16ca37cc9e55%2Ffavicon.ico" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/static/style.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
    <script src="/static/custom.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <a class="navbar-brand" href="#">
          <img src="https://cdn.glitch.com/39f04206-072c-4cf2-8d43-ddaa3d940384%2Frocket.svg?v=1589138182563" width="30" height="30" class="d-inline-block align-top" alt="">&nbsp;<?php echo(htmlspecialchars(CONFIG['applicationName'])); ?></a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/about">About</a>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownToolsLink" data-toggle="dropdown">
              <span class="material-icons" style="vertical-align:bottom">build</span> Tools
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="nav-link" href="https://glitch.com/edit/#!/remix/<?php echo(htmlspecialchars(getenv('PROJECT_DOMAIN'))); ?>">Remix</a>
              <a class="nav-link" onclick="post('/reset');" style="cursor:pointer">DB Reset</a>
              <a class="nav-link" href="/phpliteadmin.php" target="_blank" style="cursor:pointer">DB Admin</a>
            </div>
          </li>
        </ul>          
        <ul class="navbar-nav">
<?php  if (isLoggedIn()): ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUserLink" data-toggle="dropdown">
              <span class="material-icons" style="vertical-align:bottom">account_circle</span> <?php echo(htmlspecialchars($_SESSION['user']['firstName'])); ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="/user/edit/<?php echo(htmlspecialchars($_SESSION['user']->id)); ?>">Edit profile</a>
              <a class="dropdown-item" href="/user/change_password/<?php echo(htmlspecialchars($_SESSION['user']->id)); ?>">Change password</a>
              <a class="dropdown-item" href="/user/logout">Logout</a>
            </div>
          </li>
<?php  else: ?>
          <li class="nav-item">
            <a class="nav-link" onclick="get('/user/login');" style="cursor:pointer">Login</a>
          </li>
<?php  endif; ?>
        </ul>
    </nav>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="display-4"><?php echo(htmlspecialchars(CONFIG['applicationName']. " - " . $title)); ?></h1>
          <p class="lead"><?php echo(htmlspecialchars(CONFIG['leadDescription'])); ?></p>
          <p><em>Author: <?php echo(htmlspecialchars(CONFIG['authorName'])); ?></em></p>
          <hr>
        </div>
      </div>

<?php  if (isset($_SESSION['flash'])): ?>
<div class="alert alert-success alert-dismissible flash-message" role="alert" id="flash">
  <?php echo($_SESSION['flash']); ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $("div.flash-message").fadeTo(1000,1).delay(2000).fadeOut(1000);
  });
</script>
<?php  
   unset($_SESSION['flash']);
   endif;
?>


<div class="row">
  <div class="col-lg-12">
    <h1><?php echo(htmlspecialchars($title)); ?></h1>
    
    <p>
      Try submitting the form below to see how the validation (in
      <code>controllers/IndexController.php</code>) processes it for
      validity using both the <code>include/Validator.php</code> and
      the <code>include/FormValidator.php</code>.
    </p>
    
<?php  if (isset($errors) && $errors): ?>
<div class="row">
  <div class="col-lg-12">
    <div class="alert alert-danger">
      Please fix the errors indicated below.
    </div>
  </div>
</div>
<?php  endif;?>
    
    <form action="/index" method="post">
      <div class="form-group">
        <label for="required_field">A required field</label>
        <input type="text" min="1" id="required_field" name="form[required_field]" class="form-control <?php echo(htmlspecialchars($this->is_invalid($errors['required_field']))); ?>" placeholder="Enter something" value="<?php echo(htmlspecialchars($this->value($form['required_field']))); ?>" />
        <small class="text-danger"><?php echo(htmlspecialchars($this->value($errors['required_field']))); ?></small>
      </div>
      <div class="form-group">
        <label for="phone_field">A phone number</label>
        <input type="text" min="1" id="phone_field" name="form[phone_field]" class="form-control <?php echo(htmlspecialchars($this->is_invalid($errors['phone_field']))); ?>" placeholder="Enter something" value="<?php echo(htmlspecialchars($this->value($form['phone_field']))); ?>" />
        <small class="text-danger"><?php echo(htmlspecialchars($this->value($errors['phone_field']))); ?></small>
      </div>
      <div class="form-group">
        <label for="email_field">An email address</label>
        <input type="text" min="1" id="email_field" name="form[email_field]" class="form-control <?php echo(htmlspecialchars($this->is_invalid($errors['email_field']))); ?>" placeholder="Enter something" value="<?php echo(htmlspecialchars($this->value($form['email_field']))); ?>" />
        <small class="text-danger"><?php echo(htmlspecialchars($this->value($errors['email_field']))); ?></small>
      </div>
      <div class="form-group">
        <label for="integer_field">An integer</label>
        <input type="text" min="1" id="integer_field" name="form[integer_field]" class="form-control <?php echo(htmlspecialchars($this->is_invalid($errors['integer_field']))); ?>" placeholder="Enter something" value="<?php echo(htmlspecialchars($this->value($form['integer_field']))); ?>" />
        <small class="text-danger"><?php echo(htmlspecialchars($this->value($errors['integer_field']))); ?></small>
      </div>
      <div class="form-group">
        <label for="float_field">A floating point number</label>
        <input type="text" min="1" id="float_field" name="form[float_field]" class="form-control <?php echo(htmlspecialchars($this->is_invalid($errors['float_field']))); ?>" placeholder="Enter something" value="<?php echo(htmlspecialchars($this->value($form['float_field']))); ?>" />
        <small class="text-danger"><?php echo(htmlspecialchars($this->value($errors['float_field']))); ?></small>
      </div>
      <div class="form-group">
        <label for="money_field">An amount of money</label>
        <input type="text" min="1" id="money_field" name="form[money_field]" class="form-control <?php echo(htmlspecialchars($this->is_invalid($errors['money_field']))); ?>" placeholder="Enter something" value="<?php echo(htmlspecialchars($this->value($form['money_field']))); ?>" />
        <small class="text-danger"><?php echo(htmlspecialchars($this->value($errors['money_field']))); ?></small>
      </div>
      <div class="form-group">
        <label for="password1_field">A strong password</label>
        <input type="text" min="1" id="password1_field" name="form[password1_field]" class="form-control <?php echo(htmlspecialchars($this->is_invalid($errors['password1_field']))); ?>" placeholder="Enter something" value="<?php echo(htmlspecialchars($this->value($form['password1_field']))); ?>" />
        <small class="text-danger"><?php echo(htmlspecialchars($this->value($errors['password1_field']))); ?></small>
      </div>
      <div class="form-group">
        <label for="password2_field">Must match above password</label>
        <input type="text" min="1" id="password2_field" name="form[password2_field]" class="form-control <?php echo(htmlspecialchars($this->is_invalid($errors['password2_field']))); ?>" placeholder="Enter something" value="<?php echo(htmlspecialchars($this->value($form['password2_field']))); ?>" />
        <small class="text-danger"><?php echo(htmlspecialchars($this->value($errors['password2_field']))); ?></small>
      </div>
      <div class="form-group">
        <label for="between_field" class="control-label">Must be between 25 and 555</label>
        <input type="text" min="1" id="between_field" name="form[between_field]" class="form-control <?php echo(htmlspecialchars($this->is_invalid($errors['between_field']))); ?>" placeholder="Enter something" value="<?php echo(htmlspecialchars($this->value($form['between_field']))); ?>" />
        <small class="text-danger"><?php echo(htmlspecialchars($this->value($errors['between_field']))); ?></small>
      </div>
      <div class="form-group mt-4">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button class="btn btn-secondary" onclick="get('/index')">Cancel</button>
      </div>
    </form>
  </div>
</div>
          
    </div>
    <footer class="footer">
      <div class="container">
        <span class="text-muted">WEBD 236 examples copyright &copy; 2019 <a href="https://www.franklin.edu/">Franklin University</a>.</span>
      </div>
    </footer>
  </body>
</html> 