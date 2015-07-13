<?php

require_once 'app/init.php';

if (isset($_GET['id'])) {
    $articleId = $_GET['id'];

    $article = $es->get([
        'index' => 'articles',
        'type' => 'article',
        'id' => $articleId
        ]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php echo $article['_source']['title']; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="public/stylesheets/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!-- <link href="navbar.css" rel="stylesheet"> -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <!-- Static navbar -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">elastic-articles</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="add.php">Add article</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>

    <div class="container">
        <div class="row">

                <form class="form-inline" action="index.php" method="get">
                    <div class="form-group">
                        <input type="text" class="form-control" id="search" name="q" value="<?php if (isset($_GET['q'])) { echo $_GET['q']; } ?>" placeholder="Search...">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default">Search</button>
                    </div>
                </form>

        </div>
        <hr>
        <div class="row">
            <?php
            if (isset($article)) {
            ?>
                <h2><?php echo $article['_source']['title']; ?></h2>
                <p><?php echo $article['_source']['body']; ?></p>
            <?php
            }
            ?>
        </div>
        <br>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="public/javascripts/jquery.min.js"></script>
    <script src="public/javascripts/bootstrap.min.js"></script>
</body>
</html>
