<?php
require './core/bootstrap.php';
// 1. Connect to the database
require './core/db_connect.php';
include './core/app_logic.php';

$goto = $_SERVER['PHP_SELF'];
//$goto = '/';

// 2. Filter the user inputs
$input = filter_input_array(INPUT_POST,[
    'email'=>FILTER_SANITIZE_EMAIL,
    'password'=>FILTER_UNSAFE_RAW
]);

// 3. Check for a POST request
if(!empty($input)){

    // 4. Query the database for the requested user
    $input = array_map('trim', $input);
    $sql='SELECT id, hash FROM users WHERE email=:email';
    $stmt=$pdo->prepare($sql);
    $stmt->execute([
        'email'=>$input['email']
    ]);
    $row=$stmt->fetch();

    if($row){
        // 5. Attempt a password match
        $match = password_verify($input['password'], $row['hash']);
        if($match){
            // 6.1 Set a session
            $_SESSION['user'] = [];
            $_SESSION['user']['id']=$row['id'];

            // 6.2 Redirect the user //Lab
            //header('LOCATION: ' . $_POST['goto']);
            header('LOCATION: ./posts/');
        }else{
            $loginMsg = "<p>Your login was incorrect.</p>";
        }
    }
}
$meta=[];
$meta['title']="Login";

$content=<<<EOT
<h1>{$meta['title']}</h1>
<form method="post" autocomplete="off">
    <div class="form-group">
        <label for="email">Email</label>
        <input 
            class="form-control"
            id="email"
            name="email"
            type="email"
        >
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input 
            class="form-control" 
            id="password" 
            name="password" 
            type="password"
        >
        <p><a href="enter_email.php">Forgot your password?</a></p>
    </div>
    <input name="goto" value="{$goto}" type="hidden">
    <input type="submit" class="btn btn-primary">
    <span class="error">* <?php echo $loginMsg></span>
</form>
EOT;

require './core/layout.php';

