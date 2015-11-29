<?PHP if($_SESSION['mem_name']=="admin_"){?>
<ul class="nav navbar-nav navbar-right" id="signOutBtn">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-user fa-fw"></i><?PHP echo $_SESSION['mem_name']."" ?><span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li class="dropdown-header"><?PHP echo $_SESSION['mem_name']." ".$_SESSION['mem_lastname'] ?></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-footer"><a href="logout.php"><i class="fa fa-lock fa-fw"></i> Sign out</a></li>
        </ul>
    </li>
</ul>
<?PHP }else{ ?>
<ul class="nav navbar-nav navbar-right" id="signOutBtn">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-user fa-fw"></i><?PHP echo $_SESSION['mem_name']."" ?><span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li class="dropdown-header"><?PHP echo $_SESSION['mem_name']." ".$_SESSION['mem_lastname'] ?></li>
            </li>
            <li><a href="#mem_page" class="page-scroll" onclick="showProfile();" id="profile"><i class="fa fa-user fa-fw"></i> Profile</a></li>
            <li><a href="#mem_page" class="page-scroll" onclick="showPurchase();"><i class="fa fa-inbox fa-fw"></i> Purchase</a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-footer"><a href="logout.php"><i class="fa fa-lock fa-fw"></i> Sign out</a></li>
        </ul>
    </li>
</ul>
<?PHP } ?>