<?php 
include("../../conn.php");
include("query/countData.php");

// Admin user fetch
$adminQuery = $conn->query("SELECT admin_user FROM admin_acc LIMIT 1");
$adminData = $adminQuery->fetch(PDO::FETCH_ASSOC);
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Teacher | PG </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
     
    <!-- MAIN CSS FILES -->
    <link href="./main.css" rel="stylesheet">
        <link href="css/custom-course.css" rel="stylesheet">
    <link href="css/sweetalert.css" rel="stylesheet">
</head>

<!-- TooltipDemo button fixed at top for color options, visible in both desktop and mobile view -->

<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    <div class="app-header header-shadow">
        <div class="app-header__logo">
            <div class="site-logo mr-auto w-25">
                <img src="../../../../../webImg/ProtidinGerman-admin.svg">
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
            <i class="fas fa-user-alt" style="margin-right: 15px;font-size: 22px;"></i>
            <p>
            <?php if ($adminData): ?>
                <p><?php echo htmlspecialchars($adminData['admin_user']); ?></p>
            <?php else: ?>
                <p>Not Found</p>
            <?php endif; ?>
            </p>
            </div>
        </div>

        <div class="app-header__content">
            <div class="app-header-right">
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right">
                                    <div class="btn-group">
                                    <i class="fas fa-user-alt" style="margin-right: 15px;font-size: 22px;"></i>
                                    <p>
                                    <?php if ($adminData): ?>
                                        <p><?php echo htmlspecialchars($adminData['admin_user']); ?></p>
                                    <?php else: ?>
                                        <p>Not Found</p>
                                    <?php endif; ?>
                                    </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

