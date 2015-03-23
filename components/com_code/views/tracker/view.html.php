<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_code
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * The HTML Joomla Code tracker view.
 */
class CodeViewTracker extends JViewLegacy
{
	/**
	 * Execute and display a template script.
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  mixed  A string if successful, otherwise a Error object.
	 */
	public function display($tpl = null)
	{
		$this->state  = $this->get('State');
		$this->item   = $this->get('Item');
		$this->items  = $this->get('Items');
		$this->page   = $this->get('Pagination');
		$this->user   = JFactory::getUser();
		$this->params = JFactory::getApplication()->getParams('com_code');

		// Priorities map, from integer to string
		$this->priorities = array(
			'1' => JText::_('High'),
			'2' => JText::_('Medium High'),
			'3' => JText::_('Medium'),
			'4' => JText::_('Low'),
			'5' => JText::_('Very Low'),
		);

		// URL to submit the form to
		$id = JFactory::getApplication()->input->getInt('Itemid', 0);
		$itemid = $id ? '&Itemid=' . (int) $id : '';

		$this->formURL = JRoute::_(
			'index.php?option=com_code&view=tracker&tracker_id=' . $this->item->tracker_id .
			'&tracker_alias=' . $this->item->alias . $itemid
		);


		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode("\n", $errors));

			return false;
		}

		$this->page->setAdditionalUrlParam('tracker_alias', $this->item->alias);

		return parent::display($tpl);
	}
}
