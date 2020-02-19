<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_categories
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
       
$input  = JFactory::getApplication()->input;
$option = $input->getCmd('option');
$view   = $input->getCmd('view');
$id     = $input->getInt('id');

// Multicats - override ContentHelperRoute
require_once( JPATH_SITE.DS.'components'.DS.'com_multicats'.DS.'helpers'.DS.'override'.DS.'route.php' );
 
foreach ($list as $item) : ?>
	<li<?php if ($id == $item->id && $view == 'category' && $option == 'com_content') echo ' class="active"'; ?>> <?php $levelup = $item->level - $startLevel - 1; ?>
		<h<?php echo $params->get('item_heading') + $levelup; ?>>
		<a href="<?php echo JRoute::_(MulticatsContentHelperRoute::getCategoryRoute($item->id)); ?>">
		<?php echo $item->title;?>
			<?php if ($params->get('numitems')) : ?>
				<?php 	$item->numitems = MulticatsContentHelperRoute::getNumItems($item->id); // Multicats ?>
        (<?php echo $item->numitems; ?>)        
			<?php endif; ?>
		</a>
   		</h<?php echo $params->get('item_heading') + $levelup; ?>>

		<?php if ($params->get('show_description', 0)) : ?>
			<?php echo JHtml::_('content.prepare', $item->description, $item->getParams(), 'mod_articles_categories.content'); ?>
		<?php endif; ?>
		<?php if ($params->get('show_children', 0) && (($params->get('maxlevel', 0) == 0)
			|| ($params->get('maxlevel') >= ($item->level - $startLevel)))
			&& count($item->getChildren())) : ?>
			<?php echo '<ul>'; ?>
			<?php $temp = $list; ?>
			<?php $list = $item->getChildren(); ?>
			<?php require JModuleHelper::getLayoutPath('mod_articles_categories', $params->get('layout', 'default') . '_items'); ?>
			<?php $list = $temp; ?>
			<?php echo '</ul>'; ?>
		<?php endif; ?>
	</li>
<?php endforeach; ?>