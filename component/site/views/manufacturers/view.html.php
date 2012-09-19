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
defined('_JEXEC') or die ('restricted access');
jimport('joomla.application.component.view');

class manufacturersViewmanufacturers extends JView
{
   	function display ($tpl=null)
   	{
   		global $mainframe;

		$producthelper = new producthelper();
		$redhelper   = new redhelper();
		$document =& JFactory::getDocument();
		$option	= JRequest::getVar('option');
		$print = JRequest::getVar('print');
		$layout	= JRequest::getVar('layout','default');
   		$params = &$mainframe->getParams($option);

		$mid = 0;
		$lists = array();
		$model = $this->getModel('manufacturers');
		$detail	=& $this->get('data');
		$limit = $params->get('maxproduct');
		if(!$limit)
		{
			$limit = $detail[0]->product_per_page;
		}
		$model->setProductLimit($limit);
		$pageheadingtag = '';
		$disabled = "";
		if($print)
		{
			$disabled = "disabled";
		}

		JHTML::Script('attribute.js', 'components/com_redshop/assets/js/',false);
		JHTML::Script('common.js', 'components/com_redshop/assets/js/',false);
		JHTML::Script('fetchscript.js', 'components/com_redshop/assets/js/',false);
		JHTML::Stylesheet('fetchscript.css', 'components/com_redshop/assets/css/');

		if($layout!='default')
		{
			$manufacturer = $detail[0];
			$mid = $manufacturer->manufacturer_id;
			if($manufacturer->manufacturer_id)
			{
				$document->setMetaData( 'robots', $manufacturer->metarobot_info);

			// for page title
				if(AUTOGENERATED_SEO && SEO_PAGE_TITLE_MANUFACTUR != '')
				{
						$pagetitletag = SEO_PAGE_TITLE_MANUFACTUR;
						$pagetitletag = str_replace("{manufacturer}",$manufacturer->manufacturer_name,$pagetitletag);
						$pagetitletag = str_replace("{shopname}",SHOP_NAME,$pagetitletag);
				}
				if($manufacturer->pagetitle != '' && AUTOGENERATED_SEO && SEO_PAGE_TITLE_MANUFACTUR != '')
				{
					$pagetitletag = $pagetitletag." ".$manufacturer->pagetitle;
					$document->setTitle($pagetitletag);
				} else {
					if($manufacturer->pagetitle != '')
				    {
				    	$pagetitletag = $manufacturer->pagetitle;
						$document->setTitle($manufacturer->pagetitle);
				    }
				    else if(AUTOGENERATED_SEO && SEO_PAGE_TITLE_MANUFACTUR != '')
					{
						$document->setTitle($pagetitletag);
					}
					else
					{
						$pagetitletag = $mainframe->getCfg('sitename');
						$document->setTitle($mainframe->getCfg('sitename'));
					}
				}
				
				if($layout=='products')
				{
					$pagetitletag = JText::_("COM_REDSHOP_MANUFACTURER_PRODUCT")." ".$pagetitletag;
					$document->setTitle($pagetitletag);
				}
				
				
				
				// for meta keyword
				
				if(AUTOGENERATED_SEO && SEO_PAGE_KEYWORDS_MANUFACTUR != '')
				{
					$pagekeywordstag = SEO_PAGE_KEYWORDS_MANUFACTUR;
					$pagekeywordstag = str_replace("{manufacturer}",$manufacturer->manufacturer_name,$pagekeywordstag);
					$pagekeywordstag = str_replace("{shopname}",SHOP_NAME,$pagekeywordstag);
					
				}
				if($manufacturer->metakey != '' && AUTOGENERATED_SEO && SEO_PAGE_KEYWORDS_MANUFACTUR != '')
				{
					$pagekeywordstag = $pagekeywordstag.", ".$manufacturer->metakey;
					$document->setMetaData('keywords',$pagekeywordstag);
				
				} else {
					if($manufacturer->metakey != '')
				    {
						$document->setMetaData( 'keywords', $manufacturer->metakey );
				    }
				    else if(AUTOGENERATED_SEO && SEO_PAGE_KEYWORDS_MANUFACTUR != '')
					{
						$document->setMetaData('keywords',$pagekeywordstag);
					}
					else
					{
						$document->setMetaData( 'keywords', $manufacturer->manufacturer_name);
					}
				}
				
				// for meta description
				if(AUTOGENERATED_SEO && SEO_PAGE_DESCRIPTION_MANUFACTUR != '')
				{
					$pagedesctag = SEO_PAGE_DESCRIPTION_MANUFACTUR;
					$pagedesctag = str_replace("{manufacturer}",$manufacturer->manufacturer_name,$pagedesctag);
					$pagedesctag = str_replace("{shopname}",SHOP_NAME,$pagedesctag);
					
				}
				if($manufacturer->metadesc != '' && AUTOGENERATED_SEO && SEO_PAGE_DESCRIPTION_MANUFACTUR != '')
				{
					$pagedesctag = $pagedesctag." ".$manufacturer->metadesc;
					$document->setMetaData('description',$pagedesctag);
				} else {
					if($manufacturer->metadesc != '')
				    {
						$document->setMetaData( 'description', $manufacturer->metadesc );
				    }
				    else if(AUTOGENERATED_SEO && SEO_PAGE_DESCRIPTION_MANUFACTUR != '')
					{
						$document->setMetaData('description',$pagedesctag);
					}
					else
					{
						$document->setMetaData( 'description', $manufacturer->manufacturer_name);
					}
				}
				if($manufacturer->metarobot_info != '')
				{
					$document->setMetaData( 'robots', $manufacturer->metarobot_info );
				}
				else
				{
					if(AUTOGENERATED_SEO && SEO_PAGE_ROBOTS != '')
					{
						$pagerobotstag = SEO_PAGE_ROBOTS;
						$document->setMetaData( 'robots', $pagerobotstag );
					}
					else
					{
						$document->setMetaData('robots', "INDEX,FOLLOW");
					}
				}
				// for page heading
		   		if(AUTOGENERATED_SEO && SEO_PAGE_HEADING_MANUFACTUR != '')
				{
					$pageheadingtag = SEO_PAGE_HEADING_MANUFACTUR;
					$pageheadingtag = str_replace("{manufacturer}",$manufacturer->manufacturer_name,$pageheadingtag);
				}
	
				if(trim($manufacturer->pageheading) != '' && AUTOGENERATED_SEO && SEO_PAGE_HEADING_MANUFACTUR != '')
				{
					 $pageheadingtag = $pageheadingtag." ".$manufacturer->pageheading;
				}
				else
				{
				    if(trim($manufacturer->pageheading) != '')
				    {
						$pageheadingtag = $manufacturer->pageheading;
				    }
				    else if(AUTOGENERATED_SEO && SEO_PAGE_HEADING_MANUFACTUR != '')
					{
						$pageheadingtag = $pageheadingtag;
					}
	
				}
			}
			else
			{
				$document->setMetaData( 'keywords', $mainframe->getCfg('sitename') );
				$document->setMetaData( 'description', $mainframe->getCfg('sitename') );
				$document->setMetaData( 'robots', $mainframe->getCfg('sitename') );
			}
			$this->setLayout($layout);
		}
		// Breadcrumbs
		$producthelper->generateBreadcrumb($mid);
		// Breadcrumbs end

		if($layout=="products")
		{
			$order_by_select = JRequest::getVar( 'order_by', DEFAULT_MANUFACTURER_PRODUCT_ORDERING_METHOD );
			$order_data = $redhelper->getOrderByList();
		} else {
			$order_by_select = JRequest::getVar( 'order_by', DEFAULT_MANUFACTURER_ORDERING_METHOD );
			$order_data = $redhelper->getManufacturerOrderByList();
		}
		$lists['order_select'] = JHTML::_('select.genericlist',$order_data,'order_by','class="inputbox" size="1" onchange="document.orderby_form.submit();" '.$disabled.' ','value','text',$order_by_select);

		$categorylist = $model->getCategoryList();
		$temps = array();
		$temps[0]->value="0";
		$temps[0]->text=JText::_('COM_REDSHOP_SELECT');
		$categorylist = array_merge($temps,$categorylist);
		$filter_by_select = JRequest::getVar( 'filter_by', 0 );
		$lists['filter_select'] = JHTML::_('select.genericlist',$categorylist,'filter_by','class="inputbox" size="1" onchange="document.filter_form.submit();" '.$disabled.' ','value','text',$filter_by_select);

		$pagination = $this->get('Pagination');

		$this->assignRef('detail',		$detail);
		$this->assignRef('lists',		$lists);
		$this->assignRef('pagination',	$pagination);
		$this->assignRef('pageheadingtag',	$pageheadingtag);
		$this->assignRef('params',$params);
   		parent::display($tpl);
  	}
}?>