<?php

define('EMAIL_FOR_REPORTS', '');
define('RECAPTCHA_PRIVATE_KEY', '@privatekey@');
define('FINISH_URI', '<?= $_SERVER["PHP_SELF"]; ?>');
define('FINISH_ACTION', 'redirect');
define('FINISH_MESSAGE', 'Thanks for filling out my form!');
define('UPLOAD_ALLOWED_FILE_TYPES', 'doc, docx, xls, csv, txt, rtf, html, zip, jpg, jpeg, png, gif');

define('_DIR_', str_replace('\\', '/', dirname(__FILE__)) . '/');
require_once _DIR_ . '/handler.php';

?>

<?php if (frmd_message()): ?>
<link rel="stylesheet" href="<?php echo dirname($form_path); ?>/formoid-solid-green.css" type="text/css" />
<span class="alert alert-success"><?php echo FINISH_MESSAGE; ?></span>
<?php else: ?>
<!-- Start Formoid form-->
<link rel="stylesheet" href="<?php echo dirname($form_path); ?>/formoid-solid-green.css" type="text/css" />
<script type="text/javascript" src="<?php echo dirname($form_path); ?>/jquery.min.js"></script>
<form class="formoid-solid-green" style="background-color:#ffffff;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px" method="post"><div class="title"><h2>Registration Form</h2></div>
	<div class="element-name<?php frmd_add_class("name"); ?>"><label class="title"></label><span class="nameFirst"><input placeholder=" First Name" type="text" size="8" name="name[first]" /><span class="icon-place"></span></span><span class="nameLast"><input placeholder=" Last Name" type="text" size="14" name="name[last]" /><span class="icon-place"></span></span></div>
	<div class="element-email<?php frmd_add_class("email"); ?>"><label class="title"></label><div class="item-cont"><input class="large" type="email" name="email" value="" placeholder="Email"/><span class="icon-place"></span></div></div>
	<div class="element-radio<?php frmd_add_class("radio"); ?>"><label class="title">Sex</label>		<div class="column column2"><label><input type="radio" name="radio" value="Male" /><span>Male</span></label></div><span class="clearfix"></span>
		<div class="column column2"><label><input type="radio" name="radio" value="Female" /><span>Female</span></label></div><span class="clearfix"></span>
</div>
	<div class="element-select<?php frmd_add_class("select1"); ?>"><label class="title"></label><div class="item-cont"><div class="large"><span><select name="select1" >

		<option value="Morocco">Morocco</option>
		<option value="Italy">Italy</option>
		<option value="Germany">Germany</option></select><i></i><span class="icon-place"></span></span></div></div></div>
	<div class="element-multiple<?php frmd_add_class("multiple"); ?>"><label class="title"></label><div class="item-cont"><div class="large"><select data-no-selected="Nothing selected" name="multiple[]" multiple="multiple" >

		<option value="C">C</option>
		<option value="C++">C++</option>
		<option value="Java">Java</option>
		<option value="PHP">PHP</option>
		<option value="C#">C#</option></select><span class="icon-place"></span></div></div></div>
	<div class="element-checkbox<?php frmd_add_class("checkbox1"); ?>"><label class="title">Business areas</label>		<div class="column column3"><label><input type="checkbox" name="checkbox1[]" value="Computer"/ ><span>Computer</span></label></div><span class="clearfix"></span>
		<div class="column column3"><label><input type="checkbox" name="checkbox1[]" value="Management"/ ><span>Management</span></label></div><span class="clearfix"></span>
		<div class="column column3"><label><input type="checkbox" name="checkbox1[]" value="Pedagogy"/ ><span>Pedagogy</span></label></div><span class="clearfix"></span>
</div>
<div class="submit"><input type="submit" value="Submit"/></div></form><script type="text/javascript" src="<?php echo dirname($form_path); ?>/formoid-solid-green.js"></script>

<!-- Stop Formoid form-->
<?php endif; ?>

<?php frmd_end_form(); ?>