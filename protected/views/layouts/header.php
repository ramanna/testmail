<!DOCTYPE HTML>
<html lang="en" style="overflow: hidden;">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title>Test Mail Functionality</title>
        <!-- Bootstrap core CSS -->
        <link href="/css/bootstrap.css" rel="stylesheet">
        <!--external css-->
        <link href="/css/font-awesome.min.css" rel="stylesheet">

        <script src="//cdn.ckeditor.com/4.5.6/standard/ckeditor.js"></script>        
        <!-- Custom styles for this template -->
        <link href="/css/style.css" rel="stylesheet">
        <link href="/css/style-responsive.css" rel="stylesheet">
        <script src="/js/angular/angular.min.js"></script>
        <script type="text/javascript" src="/js/controllers/mailController.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

        <link href="/css/dataTables.bootstrap.css" />
        <link href="/css/datatables.min.css" />
        <script src="/js/jquery.dataTables.min.js"></script>
        <script src="/js/dataTables.bootstrap.min.js"></script>
    </head>

    <body class="wysihtml5-supported" ng-app="applicationAppOne" >

        <section id="container">
            <!--header start-->
            <header class="header black-bg">
                <div class="sidebar-toggle-box">
                    <div class="tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
                </div>
                <!--logo start-->
                <a href="#/" class="logo"><b>Test<span>Mail</span></b></a>
                <!--logo end-->
            <?php if(!empty(Yii::app()->session['userId'])){ ?>
                <div class="top-menu">
                    <ul class="nav pull-right top-menu">
                        <li><a class="logout" href="/user/logout">Logout</a></li>
                    </ul>
                </div>
            <?php } ?>
            </header>
            <!--header end-->