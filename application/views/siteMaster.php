<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard</title>

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
        
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo base_url(); ?>script/core/bootstrap.js"></script>
    </head>
    <body>

        <div class="container" style="margin-top: 30px;">
            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li <?php echo ($nav == 1) ? 'class="active"' : ''; ?>><a href="<?php echo site_url(SiteConfig::CONTROLLER_HOME . SiteConfig::METHOD_HOME_MASTER); ?>"><i class="fa fa-home fa-lg"></i>&nbsp;Home</a></li>
                            <li <?php echo ($nav == 2) ? 'class="active"' : ''; ?>><a href="<?php echo site_url(SiteConfig::CONTROLLER_HOME . SiteConfig::METHOD_HOME_PROSPECTIVE_USERS); ?>"><i class="fa fa-list fa-lg"></i>&nbsp;Prospective Users</a></li>
                            <li <?php echo ($nav == 3) ? 'class="active"' : ''; ?>><a href="<?php echo site_url(SiteConfig::CONTROLLER_HOME . SiteConfig::METHOD_HOME_CURRENT_USERS); ?>"><i class="fa fa-list fa-lg"></i>&nbsp;Current Users</a></li>
                            <li class="dropdown <?php echo ($nav == 4) ? 'active' : ''; ?>">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-adn fa-lg"></i>&nbsp;Filter <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?php echo site_url(SiteConfig::CONTROLLER_HOME . SiteConfig::METHOD_HOME_FILTER . '/list1'); ?>">In List1 and not in List2</a></li>
                                    <li><a href="<?php echo site_url(SiteConfig::CONTROLLER_HOME . SiteConfig::METHOD_HOME_FILTER . '/list2'); ?>">in List2 and not in List1</a></li>
                                    <li><a href="<?php echo site_url(SiteConfig::CONTROLLER_HOME . SiteConfig::METHOD_HOME_FILTER . '/both'); ?>">Both List</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
            <?php
            if (isset($content)) {
                echo $content;
            }
            ?>
        </div>

    </body>
</html>
