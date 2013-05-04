<?php
/**
 * @subpackage	com_trackerstats
 * @copyright	Copyright (C) 2011 Mark Dexter. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
// Code to support edit links for joomaprosubs
// Create a shortcut for params.

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
JHtml::_('behavior.tooltip');

$listOrder	= '';
$listDirn	= '';
$listFilter = '';
// $jsonSource = $this->baseurl . "/components/com_trackerstats/json/getbarchartdata.php";
$jsonSource = $this->baseurl . '/index.php?option=com_trackerstats&task=snapshot.display&format=json';
JHtml::_('barchart.barchart', 'barchart', 'barchart', false, true, 20);
?>

<h2>Total Open Issues by Status</h2>
<div id="barchart" style="width:500px; height:300px;" href="<?php echo $jsonSource; ?>"></div>
<a href="<?php echo $jsonSource; ?>">Data</a>
</br>

<h3>Chart Options</h3>

<div class="form-inline">
<fieldset>
		<label>Period</label>
		<select id="period" name="period" class="input-small" size="1" >
			<option value="1" selected="selected">Days</option>
			<option value="2">7 Days</option>
			<option value="3">30 Days</option>
		</select>
		<button class="button" id="dataUpdate" >Update Chart</button>
</fieldset>
</div>