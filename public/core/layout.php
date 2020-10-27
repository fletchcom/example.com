<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello, I am Laura Fletcher</title>
    <link href="./dist/css/main.min.css" type="text/css" rel="stylesheet">
</head>
<body>

  <header>
        <span class="logo">My Web Site</span>
        <a id="toggleMenu">Menu</a>
        <nav>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="resume.php">Resume</a></li>
            <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
            <li><a class="nav-link" href="logout.php">Logout</a></li>
            <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
            <li><a href="contact.php">Contact</a></li>
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
