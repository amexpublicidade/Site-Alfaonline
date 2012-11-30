<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?=$title_for_layout?></title>
<?PHP
echo $this->fetch('meta');
echo $this->Html->css('/usuarios/css/login.css');
echo $this->fetch('css');
echo $this->fetch('script');
?>
</head>

<body>
    <?=$this->fetch('content')?>
</body>
</html>