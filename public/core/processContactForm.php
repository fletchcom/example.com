<?php
require './core/about/src/validation/validate.php';
require '../vendor/autoload.php';
require './core/bootstrap.php';
use Mailgun\Mailgun;
use about\validation;

$valid = new about\validation\validate();

$filters = [
    'name'=>FILTER_SANITIZE_STRING,
    'email'=>FILTER_SANITIZE_EMAIL,
    'message'=>FILTER_SANITIZE_STRING,
];
$input = filter_input_array(INPUT_POST, $filters);

if(!empty($input)){
    $valid->validation = [
        'email'=>[[
                'rule'=>'email',
                'message'=>'Please enter a valid email'
            ],[
                'rule'=>'notEmpty',
                'message'=>'Please enter an email'
        ]],
        'name'=>[[
            'rule'=>'notEmpty',
            'message'=>'Please enter your first name'
        ]],
        'message'=>[[
            'rule'=>'notEmpty',
            'message'=>'Please add a message'
        ]],
    ];

    $valid->check($input);

    if(empty($valid->errors)){

# Instantiate the client.
$mgClient = Mailgun::create(MG_KEY,MG_API); //MailGun key 
$domain = MG_DOMAIN; //API Hostname
$from = "Mailgun Sandbox <postmaster@{$domain}>";

# Make the call to the client.
$result = $mgClient->messages()->send($domain,
array   (  
          'from'    => "{$input['name']} <{$input['email']}>",     
          'to'      => 'Laura <fletchcomm@gmail.com>',
          'subject' => 'Hello Laura',
          'text'    => $input['message']
        )
    );   
/* Use To Show Input When Needed
var_dump($result);
*/

    $message = "<div class=\"message-success\">Your form has been submitted!</div>";
    }else{
        $message = "<div class=\"message-error\">Your form has errors!</div>";
    }
}