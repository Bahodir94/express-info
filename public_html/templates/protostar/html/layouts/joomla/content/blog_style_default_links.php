<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

// Multicats - override ContentHelperRoute
require_once( JPATH_SITE.DS.'components'.DS.'com_multicats'.DS.'helpers'.DS.'override'.DS.'route.php' );
 
?>
<ol class="nav nav-tabs nav-stacked">
<?php foreach ($displayData->get('link_items') as $item) : ?>
	<li> 
		<?php echo JHtml::_('link', JRoute::_(MulticatsContentHelperRoute::getArticleRoute($item->slug, $item->catid, $item->language)), $item->title); ?>     
	</li>
<?php endforeach; ?>
</ol>