<?php /* Smarty version Smarty-3.1.18, created on 2017-06-06 16:29:41
         compiled from "/Applications/MAMP/htdocs/d025c936/templates/DefaultHome.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5448473235936bc550fb404-70727211%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c9e442025b737b4c984365fe354985d871b6e95' => 
    array (
      0 => '/Applications/MAMP/htdocs/d025c936/templates/DefaultHome.tpl',
      1 => 1496759308,
      2 => 'file',
    ),
    'ac95ab05c866a450b35e4ae1f57fe13029f6c5e2' => 
    array (
      0 => '/Applications/MAMP/htdocs/d025c936/templates/Master.tpl',
      1 => 1496759308,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5448473235936bc550fb404-70727211',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ROOT_URL' => 0,
    'nav' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5936bc553628b8_17326120',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5936bc553628b8_17326120')) {function content_5936bc553628b8_17326120($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Applications/MAMP/htdocs/phreeze/libs/smarty/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<html lang="en">
	<head>
	
		<meta charset="utf-8">
		<meta http-equiv="X-Frame-Options" content="deny">
		<base href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
" />
		<title>D025C936 | Home</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="D025C936" />
		<meta name="author" content="phreeze builder | phreeze.com" />

		<!-- Le styles -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
		<link href="styles/style.css" rel="stylesheet" />
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link href="bootstrap/css/font-awesome.min.css" rel="stylesheet" />
		<!--[if IE 7]>
		<link rel="stylesheet" href="bootstrap/css/font-awesome-ie7.min.css">
		<![endif]-->
		<link href="bootstrap/css/datepicker.css" rel="stylesheet" />
		<link href="bootstrap/css/timepicker.css" rel="stylesheet" />
		<link href="bootstrap/css/bootstrap-combobox.css" rel="stylesheet" />
		
		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
			<script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Le fav and touch icons -->
		<link rel="shortcut icon" href="images/favicon.ico" />
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/apple-touch-icon-114-precomposed.png" />
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72-precomposed.png" />
		<link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon-57-precomposed.png" />

		<script type="text/javascript" src="scripts/libs/LAB.min.js"></script>
		<script type="text/javascript">
			$LAB
				.script("//code.jquery.com/jquery-1.8.2.min.js").wait()
				.script("bootstrap/js/bootstrap.min.js")
				.script("bootstrap/js/bootstrap-datepicker.js")
				.script("bootstrap/js/bootstrap-timepicker.js")
				.script("bootstrap/js/bootstrap-combobox.js")
				.script("scripts/libs/underscore-min.js").wait()
				.script("scripts/libs/underscore.date.min.js")
				.script("scripts/libs/backbone-min.js")
				.script("scripts/app.js")
				.script("scripts/model.js").wait()
				.script("scripts/view.js").wait()
		</script>

	

	
	

	</head>

	<body>

		

			<?php if (!isset($_smarty_tpl->tpl_vars['nav']->value)) {?><?php $_smarty_tpl->tpl_vars["nav"] = new Smarty_variable("home", null, 0);?><?php }?>

			<div class="navbar navbar-inverse navbar-fixed-top">
				<div class="navbar-inner">
					<div class="container">
						<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</a>
						<a class="brand" href="./">D025C936</a>
						<div class="nav-collapse collapse">
							<ul class="nav">
								<li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='customers') {?> class="active"<?php }?>><a href="./customers">Customers</a></li>
								<li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='packages') {?> class="active"<?php }?>><a href="./packages">Packages</a></li>
								<li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='purchases') {?> class="active"<?php }?>><a href="./purchases">Purchases</a></li>
								<li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='services') {?> class="active"<?php }?>><a href="./services">Services</a></li>
								<li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='statuscodes') {?> class="active"<?php }?>><a href="./statuscodes">StatusCodes</a></li>
							</ul>

							<ul class="nav pull-right">
								<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-lock"></i> Login <i class="caret"></i></a>
								<ul class="dropdown-menu">
									<li><a href="./loginform">Login</a></li>
									<li><a href="./secureuser">Example User Page <i class="icon-lock"></i></a></li>
									<li><a href="./secureadmin">Example Admin Page <i class="icon-lock"></i></a></li>
								</ul>
								</li>
							</ul>
						</div><!--/.nav-collapse -->
					</div>
				</div>
			</div>
		

		

	<div class="modal hide fade" id="getStartedDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>Getting Started With Phreeze</h3>
		</div>
		<div class="modal-body" style="max-height: 300px">
			<p>This site has been generated by Phreeze classbuilder and contains basic DB
			read and write capability.  One UI page has been created for each table in your
			database.  Click on the links in the top navigation bar to view the pages.</p>

			<p>The application is not intended to use as-is unless you only want
			a simple web interface to your data tables and you require some type
			of authorization to access the app.  In order to convert this into
			a real working application you will need to customize each page as needed.
			The philosophy behind the auto-generated code is to
			generate more code than you need.  You can and should delete the controllers,
			methods and views that you don't need.</p>

			<h4>UI Controls</h4>

			<p>The UI controls for editing fields are generated based on the database column types.
			The generator doesn't know the <i>purpose</i> of each field, though.  For example an INT
			field may be best displayed as a regular input, a slider or an on/off switch.  It's
			possible that the field shouldn't be editable by the user at all.
			The generator doesn't know these things and so it makes a best guess based on
			column types and sizes.  You will most likely have to switch out UI controls that
			are best for your application.  Bootstrap provides a lot of great UI controls
			for you to use.</p>

			<h4>Controllers</h4>

			<p>One controller has been created for each table in the application.
			The controllers are located in /libs/Controller/.
			If a particular table is not directly editable then the controller and
			view templates should be deleted.  An example might be a table
			used in a many-to-many assignment.</p>

			<h4>Models</h4>

			<p>Several Model files have been created for each table in the application.
			The model files are located in /libs/Model/.
			If your schema changes you can re-generate only the DAO (data-access object)
			files by selecting the DAO-Only package in class builder.  As long as you
			don't touch files in the /libs/Model/DAO/ folder then you can safely make
			changes to your database schema and regenerate code without losing any
			of your customizations.</p>

		</div>
		<div class="modal-footer">
			<button id="okButton" data-dismiss="modal" class="btn btn-primary">Let's Rock...</button>
		</div>
	</div>

	<div class="container">

		<!-- Main hero unit for a primary marketing message or call to action -->
		<div class="hero-unit">
			<h1>Tr&#232;s Bon <i class="icon-thumbs-up"></i></h1>
			<p>This application has been automatically generated by Phreeze.  This code should be
			considered a starting point with some of the repetitive work done for you. This leaves you to
			focus on the functionality that makes your app unique.  Read below for more information about
			the technologies used to generate this application.</p>
			
			<p>The default Bootstrap style of this application can be easily customized and extended with
			a drop-in replacement theme from
			<a href="https://wrapbootstrap.com/?ref=phreeze">{wrap}bootstrap</a>
			and <a href="http://www.google.com/search?q=bootstrap+themes">many others resources</a>.</p>
			
			
			<p><em>Generated with Phreeze 3.3.8 HEAD.
			Running on Phreeze <?php echo $_smarty_tpl->tpl_vars['PHREEZE_VERSION']->value;?>
<?php if (($_smarty_tpl->tpl_vars['PHREEZE_PHAR']->value)) {?> (<?php echo basename($_smarty_tpl->tpl_vars['PHREEZE_PHAR']->value);?>
)<?php }?>.</em></p>
			
			
			<p><a class="btn btn-primary btn-large" data-toggle="modal" href="#getStartedDialog">Get Started &raquo;</a></p>
		</div>

		<!-- Example row of columns -->
		<div class="row">
			<div class="span3">
				<h2><i class="icon-cogs"></i> Phreeze</h2>
				 <p>Phreeze is a MVC+ORM framework for PHP that provides
				 URL routing, object-oriented DB access and
				 RESTful JSON services which are consumed by the view layer.</p>
				<p><a class="btn" href="http://phreeze.com/">About Phreeze &raquo;</a></p>
			</div>
			<div class="span3">
				<h2><i class="icon-th"></i> Backbone</h2>
				 <p>Backbone.js is a Javascript framework that is utilized to provide
				 client-side templates, model binding and persistance using AJAX
				 calls to the back-end RESTful services.</p>
				<p><a class="btn" href="http://documentcloud.github.com/backbone/">About Backbone &raquo;</a></p>
		 	</div>
			<div class="span3">
				<h2><i class="icon-twitter-sign"></i> Bootstrap</h2>
				<p>Bootstrap by Twitter provides a clean, cross-browser layout
				and user interface components.  Bootstrap is a complete front-end toolkit with
				ready-to-use functional components.</p>
				<p><a class="btn" href="http://twitter.github.com/bootstrap/">About Bootstrap &raquo;</a></p>
			</div>
			<div class="span3">
				<h2><i class="icon-signin"></i> Libraries</h2>
				<p>The following open-source libraries are used in this application:
				<a href="https://github.com/eternicode/bootstrap-datepicker">datepicker</a>,
				<a href="https://github.com/danielfarrell/bootstrap-combobox">combobox</a>,
				<a href="http://fortawesome.github.com/Font-Awesome/">FontAwesome</a>,
				<a href="http://jquery.com/">jQuery</a>,
				<a href="http://labjs.com/">LABjs</a>,
				<a href="http://documentcloud.github.com/underscore/">Underscore</a>,
				<a href="http://www.smarty.net">Smarty</a>,
				<a href="https://github.com/jdewit/bootstrap-timepicker">timepicker</a>,
				<a href="http://docs.jquery.com/Qunit">QUnit</a>.
				All libraries and plugins have a permissive license for personal and commercial use.
				</p>
			</div>
		</div>

		<hr>

		<footer>
			<p>&copy; <?php echo smarty_modifier_date_format(time(),'%Y');?>
 D025C936</p>
		</footer>

	</div> <!-- /container -->



		
		

	</body>
</html><?php }} ?>
