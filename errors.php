<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Errors</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
<div class="container text-center mt-5">
    <? if (isset($errormessage)) :?>
        <p class="alert alert-danger" role="alert"><?= $errormessage; ?></p>
    <? endif; ?>
    <a class="back btn btn-lg btn-primary" href="<?= $_SERVER['HTTP_REFERER'];?>">Back</a>

</div>
</body>
</html>
