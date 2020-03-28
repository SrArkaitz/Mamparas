<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mamparas Jesus</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- /Bootstrap -->
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand ml-2" href="<?php echo e(route('index')); ?>"><img src="<?php echo e(asset('img/logo.png')); ?>" height="42" width="42"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo e(route('index')); ?>">Inicio </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Crear pregunta</a>
            </li>
            <li class="nav-item">
            </li>
        </ul>
        <form class="form-inline mr-5" action="/index" method="get">
            <select class="form-control" name="tema_id">
                <option value="">Temas</option>

            </select>
            <input class="form-control mr-sm-2" type="search"  id="titulo" name="titulo" placeholder="Buscar" aria-label="Search">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
        </form>
        <ul class="nav navbar-nav navbar-right">

            <li><a class="nav-link" href="">Log Out</a></li>
        </ul>
    </div>
</nav>
<?php echo $__env->yieldContent('content'); ?>
</body>
</html>
<?php /**PATH /home/vagrant/Code/resources/views/layouts/master.blade.php ENDPATH**/ ?>