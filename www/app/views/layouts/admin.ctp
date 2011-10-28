<?php
/* SVN FILE: $Id$ */

/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework (http://www.cakephp.org)
 * Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 * @link          http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.view.templates.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>
	<title>
		<?php __('CakePHP: the rapid development php framework:'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $html->meta('icon');

		#echo $html->css('cake.generic');
        echo $html->css('admin');
        echo $html->css('960/reset');
        echo $html->css('960/text');
        echo $html->css('960/960');
        #echo $html->css('960/demo');

        echo $html->css('style');
        echo $html->css('formalize');
        echo $html->css('buttons');

		echo $scripts_for_layout;
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1>SMSCanada</h1>
		</div>
		<div id="topmenu">
			<h4>Topmenu</h4>
			<ul>
				<li><a href="/index.php/admin/products">Products</a></li>
				<li><a href="">Categories</a></li>
				<li><a href="">Manufacturers</a></li>
				<li><a href="">Images</a></li>
				<li><a href="">Dealers</a></li>				
			</ul>
		</div>
		<div id="content">

			<?php $session->flash(); ?>

			<?php echo $content_for_layout; ?>

		</div>
		<div id="footer">
			<?php echo $html->link(
					$html->image('cake.power.gif', array('alt'=> __("CakePHP: the rapid development php framework", true), 'border'=>"0")),
					'http://www.cakephp.org/',
					array('target'=>'_blank'), null, false
				);
			?>
		</div>
	</div>
	<?php echo $cakeDebug; ?>
</body>
</html>