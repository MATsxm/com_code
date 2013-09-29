<?php
/**
 * @package     Joomla.BugSquad
 * @subpackage  com_trackerstats
 *
 * @copyright   Copyright (C) 2011 Mark Dexter. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('behavior.tooltip');

// $jsonSource = $this->baseurl . "/components/com_trackerstats/json/getbarchartdata.php";
$jsonSource = $this->baseurl . '/index.php?option=com_trackerstats&amp;task=activity.display&amp;format=json';

JHtml::_('barchart.barchart', 'barchart', 'barchart', false, true, 50);
?>

<h2>Total Bug Squad Activity By Type</h2>
<div id="barchart" style="width:600px; height:300px;" data-href="<?php echo $jsonSource; ?>"></div>

<br />
<h3>Chart Options</h3>

<div class="form-inline">
	<fieldset>
		<label>Period</label>
		<select id="period" name="period" class="input-small" size="1" >
			<option value="1" selected="selected">7 Days</option>
			<option value="2">30 Days</option>
			<option value="3">90 Days</option>
		</select>
		<label>Type</label>
		<select id="type" name="type" class="input-small" size="1" >
			<option value="0" selected="selected">All</option>
			<option value="1">Tracker</option>
			<option value="2">Test</option>
			<option value="3">Code</option>
		</select>
		<button class="button" id="dataUpdate" >Update Chart</button>
	</fieldset>
</div>
