<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>List Project</title>

        <!-- Bootstrap -->
<!--        <link href="<?php echo base_url(); ?>asset/css/bootstrap.css" rel="stylesheet"/>
        <link href="<?php echo base_url(); ?>asset/css/bootstrap-theme.css" rel="stylesheet"/>-->
        <link href="<?php echo base_url(); ?>asset/css/cerulean.css" rel="stylesheet"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/font-awesome.css">
        <link href="<?php echo base_url(); ?>asset/css/custom.css" rel="stylesheet"/>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div class="container" style="margin-top: 30px;">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Login</h3>
                </div>
                <div class="panel-body">

                    <a href="<?php echo site_url(SiteConfig::CONTROLLER_HOME . SiteConfig::METHOD_HOME_MASTER); ?>" class="btn btn-success"><i class="fa fa-globe fa-lg"></i>&nbsp;Enter Site</a>


                </div>
                <div class="panel-footer">Developed By Winexsoft Technology</div>
            </div>
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo base_url(); ?>script/core/bootstrap.js"></script>
    </body>
</html>
