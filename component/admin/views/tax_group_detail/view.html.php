<?php
/**
 * @package     RedSHOP.Backend
 * @subpackage  View
 *
 * @copyright   Copyright (C) 2005 - 2013 redCOMPONENT.com. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die;

jimport('joomla.application.component.view');

class tax_group_detailVIEWtax_group_detail extends JView
{
	public function display($tpl = null)
	{
		$db = jFactory::getDBO();

		JToolBarHelper::title(JText::_('COM_REDSHOP_TAX_GROUP_MANAGEMENT_DETAIL'), 'redshop_vatgroup48');

		$option = JRequest::getVar('option', '', 'request', 'string');

		$document = JFactory::getDocument();

		$uri = JFactory::getURI();

		$this->setLayout('default');

		$lists = array();

		$detail =& $this->get('data');

		$isNew = ($detail->tax_group_id < 1);

		if ($detail->tax_group_id > 0)
		{
			JToolBarHelper::custom('tax', 'redshop_tax_tax32', JText::_('COM_REDSHOP_TAX'), JText::_('COM_REDSHOP_TAX'), false, false);
		}

		$text = $isNew ? JText::_('COM_REDSHOP_NEW') : JText::_('COM_REDSHOP_EDIT');

		JToolBarHelper::title(JText::_('COM_REDSHOP_TAX_GROUP') . ': <small><small>[ ' . $text . ' ]</small></small>', 'redshop_vatgroup48');

		JToolBarHelper::save();

		if ($isNew)
		{
			JToolBarHelper::cancel();
		}
		else
		{
			JToolBarHelper::cancel('cancel', 'Close');
		}

		$lists['published'] = JHTML::_('select.booleanlist', 'published', 'class="inputbox" size="1"', $detail->published);

		$this->assignRef('lists', $lists);
		$this->assignRef('detail', $detail);
		$this->assignRef('request_url', $uri->toString());

		parent::display($tpl);
	}
}
