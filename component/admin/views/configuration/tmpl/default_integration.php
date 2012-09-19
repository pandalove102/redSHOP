<?php
/**
 * @copyright Copyright (C) 2010 redCOMPONENT.com. All rights reserved.
 * @license GNU/GPL, see license.txt or http://www.gnu.org/copyleft/gpl.html
 * Developed by email@recomponent.com - redCOMPONENT.com
 *
 * redSHOP can be downloaded from www.redcomponent.com
 * redSHOP is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License 2
 * as published by the Free Software Foundation.
 *
 * You should have received a copy of the GNU General Public License
 * along with redSHOP; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */
defined ( '_JEXEC' ) or die ( 'Restricted access' );

?>
<div id="config-document">
<table width="100%" cellpadding="0" cellspacing="0">
<tr valign="top">
	<td width="50%">
		<fieldset class="adminform">
		<legend><?php echo JText::_('COM_REDSHOP_GOOGLE_ANALYATICS' ); ?></legend>
			<?php echo $this->loadTemplate('analytics');?>
		</fieldset>
		<fieldset class="adminform">
		<legend><?php echo JText::_('COM_REDSHOP_CLICKATELL' ); ?></legend>
			<?php echo $this->loadTemplate('clicktell');?>
		</fieldset>
	</td>
	<td width="50%">
		<fieldset class="adminform">
		<legend><?php echo JText::_('COM_REDSHOP_POST_DENMART' ); ?></legend>
			<?php echo $this->loadTemplate('postdk');?>
		</fieldset>
	</td>
</tr>
<tr>
	<td colspan="2">
		<fieldset class="adminform">
		<legend><?php echo JText::_('COM_REDSHOP_ECONOMIC' ); ?></legend>
			<?php echo $this->loadTemplate('economic');?>
		</fieldset>
	</td>
</tr>
</table>
</div>
