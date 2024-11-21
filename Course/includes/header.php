<?php 
  include("conn.php");
  include("query/selectData.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>CEE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
     
    <!-- MAIN CSS FILES -->
    <link href="./main.css" rel="stylesheet">
    <link href="css/sweetalert.css" rel="stylesheet">
</head>

<!-- TooltipDemo button fixed at top for color options, visible in both desktop and mobile view -->
<div id="TooltipDemo" class="btn-open-options btn btn-warning" style="position: fixed; top: 9px;right: 100px; z-index: 1000; padding: 0px 20px; border-radius: 30px;background:#8BC34A;border:none;color:#fff;">
    <i class="fa fa-moon fa-w-16 fa-2x" style="margin-top: -2px;font-size: 22px;"></i>
</div>

<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    <div class="app-header header-shadow">
        <div class="app-header__logo">
            <div class="site-logo mr-auto w-25">
                <a href="../index.php">
                    <img src="../webImg/Protidn-german-Home.svg" style="width:92px; height:50px;">
                </a>
            </div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
        <div class="app-header__menu">
            <div class="btn-group">
                <?php 
                echo strtoupper($selExmneeData['exmne_fullname']);
                ?>
            </div>
        </div>

        <div class="app-header__content">
            <div class="app-header-left">
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <?php 
                                        echo strtoupper($selExmneeData['exmne_fullname']);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

