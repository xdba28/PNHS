<link rel="stylesheet" href="css/bin/diy.css">
<nav class="navbar navbar-inverse navbar-fixed-top navigation-side" id="sidebar-wrapper" role="navigation">
    <ul class="nav sidebar scrollbar sidebar-nav" id="style-4">
        <li class="sidebar-brand">                       
            <a href="#">
                Menu
                <button type="button" class="hamburger is-closed hamburger-side" data-toggle="offcanvas">
                <span class="hamb hamb-top"></span>
                <span class="hamb hamb-middle"></span>
                <span class="hamb hamb-bottom"></span>
                </button>
            </a>
        </li>
        <li>
            <a href="index.php"><i class="fa fa-fw fa-home"></i> Home</a>
        </li>
        <!-- CSS -->
            <?php 
                if($css_priv=="1"){ ?>
        <li>
            <a href="modules/CSS/admin/section.php" ><i class="icon-calendar" aria-expanded="false"></i> Class Scheduling</a>
        </li>      
            <?php        
                } ?>

        <!-- OES -->
        <?php 
                if($oes_priv=="1" ){ ?>
        <li>
            <a href="modules/OES/my_subjects.php"><i class="icon icon-book" aria-expanded="false"></i> My Subjects</a>
        </li>    
            <?php
            }
            ?>

         <!-- SCMS -->
            <?php 
                if($scms_priv=="1"){ ?>
        <li>
            <a href="modules/scms/pages/stuper/index.php"><i class="icon-aid-kit" aria-expanded="false"></i> Medical Records</a>
        </li>     
            <?php        
                }
            ?>

    </ul>
</nav>

        