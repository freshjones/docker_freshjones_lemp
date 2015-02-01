<?php

$link = mysql_connect('localhost', 'root', 'welcome');

$title = 'A Creative Agency';

?>
<html>
	<head>
		<link href='http://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>

		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #B0BEC5;
				display: table;
				font-weight: 100;
				font-family: 'Lato';
			}

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.content {
				text-align: center;
				display: inline-block;
			}

			.logo {
				width:400px;
				height:235px;
				overflow:hidden;
				background-image: url("freshjones.png");
				background-position: 0 0;
				text-indent: 100%;
				white-space: nowrap;
			}

			.title {
				font-size: 35px;
				margin-top:40px;
			}

		</style>
	</head>
	<body>
		<div class="container">
			<div class="content">
				<div class="logo"><?php print $title; ?></div>
				<div class="title"><?php print $title; ?></div>
				<?php if(!$link) { ?>
					<p>Can't connect to local MySQL Server!</p>
				<?php } else { ?>
					<p>MySQL Server version: <?php echo mysql_get_server_info(); ?></p>
				<?php } ?>
			</div>
		</div>
	</body>
</html>
