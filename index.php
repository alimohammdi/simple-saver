
<?php 

require_once('./Class/Message.php');
$_message = new Message();
$ip = $_SERVER['REMOTE_ADDR'];
if (isset($_POST['submit'])  &&  $_SERVER['REQUEST_METHOD'] === 'POST'  && !empty($_POST['message'])){
     

    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $message = $_POST['message'];
    $add_message  = $_message->add($ip,$user_agent,$message);

    header('location: '.$_SERVER['PHP_SELF']);
     
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>

        <div class="container">
                <header>
                        <h1 class="text-center">Simple saver</h1>
                </header>
        
        <main>
                <form action="<?php  htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                        <div class="form-group">
                                <label for="text">Text :</label>
                        <textarea  name="message" id="text" class="form-control" placeholder="type something...."><?php  echo   $_message->getMessage($ip) ?></textarea>
                        
                        </div>
                        <div class="form-group mt-3">
                                <input type="submit" name="submit" value="Save" class="form-control btn btn-primary">
                        </div>

                </form>
        </main>
        </div>





        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>