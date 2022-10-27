<meta charset="utf-8">
<?php
if (empty($_title))             $_title = 'Yuwell Thailand';
if (empty($_keywords))         $_keywords = '';
if (empty($_description))     $_description = '';
?>

<title>
    <?php echo $_title; ?>
</title>
<meta name="keywords" content="<?php echo $_keywords; ?>" />
<meta name="description" content="<?php echo $_description; ?>" />
<meta name="robot" content="index, follow" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">

<link type="image/ico" rel="shortcut icon" href="{{ asset('frontend/yuwell/images/favicon.ico') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;500;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('frontend/yuwell/css/bootstrap-datepicker3.standalone.min.css') }}">
<link type="text/css" rel="stylesheet" href="{{ asset('frontend/yuwell/css/layout.css') }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />