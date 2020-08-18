<?php
//Include non-vendor files
require './core/about/src/validation/validate.php';

//Declare Namespaces
use about\validation;

//Validate Declarations
$valid = new About\Validation\Validate();
$args = [
  'first_name'=>FILTER_SANITIZE_STRING,
  'last_name'=>FILTER_SANITIZE_STRING,
  'subject'=>FILTER_SANITIZE_STRING,
  'message'=>FILTER_SANITIZE_STRING,
  'email'=>FILTER_SANITIZE_EMAIL,
];
$input = filter_input_array(INPUT_POST, $args);

if(!empty($input)){

    $valid->validation = [
        'first_name'=>[[
            'rule'=>'notEmpty',
            'message'=>'Please enter your first name'
        ]],
        'last_name'=>[[
            'rule'=>'notEmpty',
            'message'=>'Please enter your last name'
        ]],
        'email'=>[[
                'rule'=>'email',
                'message'=>'Please enter a valid email'
            ],[
                'rule'=>'notEmpty',
                'message'=>'Please enter an email'
        ]],
        'subject'=>[[
            'rule'=>'notEmpty',
            'message'=>'Please enter a subject'
        ]],
        'message'=>[[
            'rule'=>'notEmpty',
            'message'=>'Please add a message'
        ]],
    ];


    $valid->check($input);
}

if(empty($valid->errors) && !empty($input)){
    $message = "<div>Thanks, you've successfully filled out the form!</div>";
}else{
    $message = "<div>Please fill out the form below completely!</div>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laura Fletcher</title>
    <link href="./dist/css/main.min.css" type="text/css" rel="stylesheet">
</head>
<body>
  <header>
    <span class="logo">My Web Site</span>
    <a id="toggleMenu">Menu</a>
    <nav>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="resume.html">Resume</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <br>
    <br>
    <h1>Contact Me</h1>

      <?php echo (!empty($message)?$message:null); ?>

      <form action="contact.php" method="POST">
        
        <input type="hidden" name="subject" value="New submission!">
 <br>    
 <div>
          <label for="name">First Name</label>
          <input id="first_name" type="text" name="first_name" value="<?php echo $valid->userInput('name'); ?>">
          <div class="text-error"><?php echo $valid->error('name'); ?></div>
        </div>   
        <br>
        <div>
          <label for="name">Last Name</label>
          <input id="last_name" type="text" name="last_name" value="<?php echo $valid->userInput('name'); ?>">
          <div class="text-error"><?php echo $valid->error('name'); ?></div>
        </div>
<br>
        <div>
          <label for="email">Email</label>
          <input id="email" type="text" name="email" value="<?php echo $valid->userInput('email'); ?>">
          <div class="text-error"><?php echo $valid->error('email'); ?></div>
        </div>
<br>
        <div>
          <label for="message">Message</label>
          <textarea id="message" name="message"><?php echo $valid->userInput('message'); ?></textarea>
          <div class="text-error"><?php echo $valid->error('message'); ?></div>
        </div>
<br>
        <div>
          <input type="submit" value="Send">
        </div>

      </form>
    </main>
  </main>
  <script>

    var toggleMenu = document.getElementById('toggleMenu');
    var nav = document.querySelector('nav');
    toggleMenu.addEventListener(
      'click',
      function(){
        if(nav.style.display=='block'){
          nav.style.display='none';
        }else{
          nav.style.display='block';
        }
      }
    );
  </script>
</body>
</html>