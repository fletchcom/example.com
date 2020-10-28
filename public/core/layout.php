<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Set session in php -->
<?php
function active($name){
  $current = $_SERVER['REQUEST_URI'];
  if($current === $name){
    return 'active';
  }

  return null;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
<!-- Add sanitized content -->
  <?php if(!empty($meta)): ?>

<?php if(!empty($meta['title'])): ?>
  <title><?php echo $meta['title']; ?></title>
<?php endif; ?>

<?php if(!empty($meta['description'])): ?>
  <meta name="description" content="<?php echo $meta['description']; ?>">
<?php endif; ?>

<?php if(!empty($meta['keywords'])): ?>
  <meta name="keywords" content="<?php echo $meta['keywords']; ?>">
<?php endif; ?>

<?php endif; ?>
<!-- End sanitized content -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello, I am Laura Fletcher</title>
    <link href="./dist/css/main.min.css" typeclass="nav-link"="text/css" rel="stylesheet">
</head>
<body>

  <header>
        <span class="logo">My Web Site</span>
        <a id="toggleMenu">Menu</a>
        <nav>
          <ul>
            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="resume.php">Resume</a></li>
            <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
            <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
            <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
          </ul>
        </nav>
      </header>

        <div class="row">
            <div id="Content">
                <?php echo $content; ?>
            </div>
            <div id="Sidebar">
              <div id="AboutMe">
                
    
              </div>
            </div>
        </div>



  </body>

</html>
