<?php
require '../core/functions.php';
require '../../config/keys.php';
require '../core/db_connect.php';

$message=null;

$args = [
    'title'=>FILTER_SANITIZE_STRING, //strips HMTL
    'meta_description'=>FILTER_SANITIZE_STRING, //strips HMTL
    'meta_keywords'=>FILTER_SANITIZE_STRING, //strips HMTL
    'body'=>FILTER_UNSAFE_RAW  //NULL FILTER
];

$input = filter_input_array(INPUT_POST, $args);

if(!empty($input)){

    //Strip white space, begining and end
    $input = array_map('trim', $input);

    //Allow only whitelisted HTML
    $input['body'] = cleanHTML($input['body']);

    //Create the slug
    $slug = slug($input['title']);

    //Sanitiezed insert
    $sql = 'INSERT INTO posts SET id=uuid(), title=?, slug=?, body=?';

    if($pdo->prepare($sql)->execute([
        $input['title'],
        $slug,
        $input['body']
    ])){
       header('LOCATION:/posts');
    }else{
        $message = 'Something bad happened';
    }
}

$content = <<<EOT
<h1>Add a New Post</h1>
{$message}
<form method="post">

<div class="form-group">
    <label for="title">Title</label>
    <input id="title" name="title" type="text" class="form-control" 
    value="{$valid->userInput('title')}">
    <div class="text-error">{$valid->error('title')}</div>
</div>

<div class="form-group">
    <label for="body">Body</label>
    <textarea id="body" name="body" rows="8" class="form-control" 
    value="{$valid->userInput('body')}"></textarea>
    <div class="text-error">{$valid->error('body')}</div>
</div>

<div class="row">
    <div class="form-group col-md-6">
        <label for="meta_description">Description</label>
        <textarea id="meta_description" name="meta_description" rows="2" class="form-control" 
        value="{$valid->userInput('description')}"></textarea>
        <div class="text-error">{$valid->error('description')}</div>
    </div>

    <div class="form-group col-md-6">
        <label for="meta_keywords">Keywords</label>
        <textarea id="meta_keywords" name="meta_keywords" rows="2" class="form-control"
        alue="{$valid->userInput('keywords')}">></textarea>
        div class="text-error">{$valid->error('keywords')}</div>
</div>

<div class="form-group">
    <input type="submit" value="Submit" class="btn btn-primary">
</div>
</form>
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
EOT;

include '../core/layout.php';