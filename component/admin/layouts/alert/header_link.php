<?php
/**
 * @package     RedSHOP.Backend
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2008 - 2016 redCOMPONENT.com. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die;

$model = JModelLegacy::getInstance("Alert", "RedshopModel");
$alertsCount = $model->countAlert();
$alerts = $model->getAlert(5);
?>
<li class="dropdown notifications-menu">
	<a title="<?php echo JText::_('COM_REDSHOP_ALERT'); ?>" href="#" class="dropdown-toggle" data-toggle="dropdown">
		<i class="fa fa-bell-o"></i>

		<?php if ($alertsCount > 0) : ?>
			<span class="label label-danger"><?php echo $alertsCount; ?></span>
		<?php endif ?>
	</a>
	<ul class="dropdown-menu">
		<?php foreach ($alerts as $alert) : ?>
			<li>
				<ul class="menu">
					<li>
						<a href="#"><?php echo $alert->message; ?></a>
					</li>
				</ul>
			</li>
		<?php endforeach ?>

		<li class="footer">
			<a href="<?php echo JRoute::_('index.php?option=com_redshop&view=alert') ?>">
				<?php echo JText::_('COM_REDSHOP_ALERT_VIEW_ALL') ?>
			</a>
		</li>
	</ul>
</li>
