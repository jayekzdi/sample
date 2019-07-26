<nav class="navbar navbar-inverse">
		<div class="container-fluid">
				<div class="navbar-header">
				<button class="navbar-toggle" data-toggle="collapse" data-target="#navbara">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						</button>
						<a class="nav-item"><img src="img/kagahin1.png" style="width:175px;height:51px;"></a>
				</div>
				<div class="collapse navbar-collapse" id="navbara">
		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="nbell">
            	<?php echo notifcount($connect); ?>
             <i class="glyphicon glyphicon-bell"></i>
          </a>
          <ul class="dropdown-menu">
          	<?php echo notifs($connect); ?>
          	 <li class="notif-footer"><a href="notification.php">View all</a></li>
          </ul>
      </li>
	<li class="dropdown">
	 <a class="dropdown-toggle" data-toggle="dropdown" href="#">
		<?php
			echo $_SESSION["admin_name"];
		 ?>
			 <span class="caret"></span>
		 </a>
		<ul class="dropdown-menu">
			<li><a href="admin_logout.php"><?php echo " LOGOUT "; ?></a></li>
			</ul>
		</li>
		</ul>
		</div><!--.nav-header-->
	</div><!--container-fluid-->
</nav>
