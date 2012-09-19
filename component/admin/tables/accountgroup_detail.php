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
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.model');


class Tableaccountgroup_detail extends JTable
{
	var $accountgroup_id = null;
	var $accountgroup_name = null;	
	var $economic_vat_account = null;
	var $economic_nonvat_account = null;
	var $economic_discount_vat_account = null;
	var $economic_discount_nonvat_account = null;
	var $economic_shipping_vat_account = null;
	var $economic_shipping_nonvat_account = null;
	var $economic_discount_product_number = null;
	var $published = 1;
	
		
	function Tableaccountgroup_detail(& $db) 
	{
	  $this->_table_prefix = '#__redshop_';
			
		parent::__construct($this->_table_prefix.'economic_accountgroup', 'accountgroup_id', $db);
	}

	function bind($array, $ignore = '')
	{
		if (key_exists( 'params', $array ) && is_array( $array['params'] )) {
			$registry = new JRegistry();
			$registry->loadArray($array['params']);
			$array['params'] = $registry->toString();
		}
		return parent::bind($array, $ignore);
	}
}
?>

