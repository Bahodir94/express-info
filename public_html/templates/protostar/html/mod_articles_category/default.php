<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>
<ul class="category-module<?php echo $moduleclass_sfx; ?>">
	<?php if ($grouped) : ?>
		<?php foreach ($list as $group_name => $group) : ?>
		<li>
			<div class="mod-articles-category-group"><?php echo $group_name;?></div>
			<ul>
				<?php foreach ($group as $item) : ?>
					<li>
    				<?php if ($params->get('link_titles') == 1) : ?>
							<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
								<?php echo $item->title; ?>
							</a>
    				<?php else : ?>
    					<?php echo $item->title; ?>
    				<?php endif; ?>
	
						<?php if ($item->displayHits) : ?>
							<span class="mod-articles-category-hits">
								(<?php echo $item->displayHits; ?>)
							</span>
						<?php endif; ?>
	
						<?php if ($params->get('show_author')) : ?>
							<span class="mod-articles-category-writtenby">
								<?php echo $item->displayAuthorName; ?>
							</span>
						<?php endif; ?>
	
						<?php if ($item->displayCategoryTitle) : ?>
              <?php
                // Multicats - override ContentHelperRoute
                require_once( JPATH_SITE.DS.'components'.DS.'com_multicats'.DS.'helpers'.DS.'override'.DS.'route.php' );
                
                $catarray = explode(',',$item->catid);
                $db = JFactory::getDbo();
                $item->displayCategoryTitle = '';
                $url = array();
                foreach($catarray as $key => $cat){
                  if(!is_array($catids) || in_array($cat,$catids)){            
                    $query = "SELECT id, title FROM #__categories WHERE id = ".$cat;
                    $db->setQuery($query);
                    $category = $db->loadObject();
                    
                    $title = $category->title;
                    $url[] = '<a href="' . JRoute::_(MulticatsContentHelperRoute::getCategoryRoute($category->id)) . '">' . $title . '</a>';
                  }                
                }
                $item->displayCategoryTitle = implode(', ',$url);
             
              ?>
							<span class="mod-articles-category-category">
								(<?php echo $item->displayCategoryTitle; ?>)
							</span>
						<?php endif; ?>
	
						<?php if ($item->displayDate) : ?>
							<span class="mod-articles-category-date"><?php echo $item->displayDate; ?></span>
						<?php endif; ?>
	
						<?php if ($params->get('show_introtext')) : ?>
							<p class="mod-articles-category-introtext">
								<?php echo $item->displayIntrotext; ?>
							</p>
						<?php endif; ?>
	
						<?php if ($params->get('show_readmore')) : ?>
							<p class="mod-articles-category-readmore">
								<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
									<?php if ($item->params->get('access-view') == false) : ?>
										<?php echo JText::_('MOD_ARTICLES_CATEGORY_REGISTER_TO_READ_MORE'); ?>
									<?php elseif ($readmore = $item->alternative_readmore) : ?>
										<?php echo $readmore; ?>
										<?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
											<?php if ($params->get('show_readmore_title', 0) != 0) : ?>
												<?php echo JHtml::_('string.truncate', $this->item->title, $params->get('readmore_limit')); ?>
											<?php endif; ?>
									<?php elseif ($params->get('show_readmore_title', 0) == 0) : ?>
										<?php echo JText::sprintf('MOD_ARTICLES_CATEGORY_READ_MORE_TITLE'); ?>
									<?php else : ?>
										<?php echo JText::_('MOD_ARTICLES_CATEGORY_READ_MORE'); ?>
										<?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
									<?php endif; ?>
  							</a>
							</p>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</li>
		<?php endforeach; ?>
	<?php else : ?>
		<?php foreach ($list as $item) : ?>
			<li>
				<?php if ($params->get('link_titles') == 1) : ?>
					<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a>
				<?php else : ?>
					<?php echo $item->title; ?>
				<?php endif; ?>
        	
				<?php if ($item->displayHits) : ?>
					<span class="mod-articles-category-hits">
						(<?php echo $item->displayHits; ?>)
					</span>
				<?php endif; ?>
	
				<?php if ($params->get('show_author')) : ?>
					<span class="mod-articles-category-writtenby">
						<?php echo $item->displayAuthorName; ?>
					</span>
				<?php endif; ?>
	
				<?php if ($item->displayCategoryTitle) : ?>
          <?php
            /**
             * Multicats
             * taken from helper.php - TODO override directly helper.php             
             */                         
        		// Get an instance of the generic articles model
        		$articles = JModelLegacy::getInstance('Articles', 'ContentModel', array('ignore_request' => true));
        
        		// Set application parameters in model
        		$app       = JFactory::getApplication();
        		$appParams = $app->getParams();
        		$articles->setState('params', $appParams);
        
        		// Set the filters based on the module params
        		$articles->setState('list.start', 0);
        		$articles->setState('list.limit', (int) $params->get('count', 0));
        		$articles->setState('filter.published', 1);
        
        		// This module does not use tags data
        		$articles->setState('load_tags', $params->get('filter_tag', '') !== '' ? true : false);
        
        		// Access filter
        		$access     = !JComponentHelper::getParams('com_content')->get('show_noauth');
        		$authorised = JAccess::getAuthorisedViewLevels(JFactory::getUser()->get('id'));
        		$articles->setState('filter.access', $access);
        
        		// Prep for Normal or Dynamic Modes
        		$mode = $params->get('mode', 'normal');
        
        		switch ($mode)
        		{
        			case 'dynamic' :
        				$option = $app->input->get('option');
        				$view   = $app->input->get('view');
        
        				if ($option === 'com_content')
        				{
        					switch ($view)
        					{
        						case 'category' :
        							$catids = array($app->input->getInt('id'));
        							break;
        						case 'categories' :
        							$catids = array($app->input->getInt('id'));
        							break;
        						case 'article' :
        							if ($params->get('show_on_article_page', 1))
        							{
        								$article_id = $app->input->getInt('id');
        								$catid      = $app->input->getInt('catid');
        
        								if (!$catid)
        								{
        									// Get an instance of the generic article model
        									$article = JModelLegacy::getInstance('Article', 'ContentModel', array('ignore_request' => true));
        
        									$article->setState('params', $appParams);
        									$article->setState('filter.published', 1);
        									$article->setState('article.id', (int) $article_id);
        									$item   = $article->getItem();
        									$catids = array($item->catid);
        								}
        								else
        								{
        									$catids = array($catid);
        								}
        							}
        							else
        							{
        								// Return right away if show_on_article_page option is off
        								return;
        							}
        							break;
        
        						case 'featured' :
        						default:
        							// Return right away if not on the category or article views
        						return;
        					}
        				}
        				else
        				{
        					// Return right away if not on a com_content page
        					return;
        				}
        
        				break;
        
        			case 'normal' :
        			default:
        				$catids = $params->get('catid');
        				break;
        		}
        
        		// Category filter
        		if ($catids)
        		{
        			if ($params->get('show_child_category_articles', 0) && (int) $params->get('levels', 0) > 0)
        			{
        				// Get an instance of the generic categories model
        				$categories = JModelLegacy::getInstance('Categories', 'ContentModel', array('ignore_request' => true));
        				$categories->setState('params', $appParams);
        				$levels = $params->get('levels', 1) ? $params->get('levels', 1) : 9999;
        				$categories->setState('filter.get_children', $levels);
        				$categories->setState('filter.published', 1);
        				$categories->setState('filter.access', $access);
        				$additional_catids = array();
        
        				foreach ($catids as $catid)
        				{
        					$categories->setState('filter.parentId', $catid);
        					$recursive = true;
        					$items     = $categories->getItems($recursive);
        
        					if ($items)
        					{
        						foreach ($items as $category)
        						{
        							$condition = (($category->level - $categories->getParent()->level) <= $levels);
        
        							if ($condition)
        							{
        								$additional_catids[] = $category->id;
        							}
        						}
        					}
        				}
        
        				$catids = array_unique(array_merge($catids, $additional_catids));
        			}
        		}
            
            // Multicats - override ContentHelperRoute
            require_once( JPATH_SITE.DS.'components'.DS.'com_multicats'.DS.'helpers'.DS.'override'.DS.'route.php' );
            //require_once( JPATH_SITE.DS.'components'.DS.'com_multicats'.DS.'helpers'.DS.'multicats.php' );
            
            $db = JFactory::getDbo();
            //get article's all categories - item->catid was cut to current category, so we need to re-read them again
              $query = "SELECT catid FROM #__multicats_content_catid WHERE item_id = ".$item->id;
              $db->setQuery($query);
              $catid = $db->loadObject();
            $catarray = explode(',',$catid->catid);
                        
            $db = JFactory::getDbo();
            $item->displayCategoryTitle = '';
            $url = array();

            foreach($catarray as $key => $cat){
              if(!is_array($catids) || in_array($cat,$catids)){            
                $query = "SELECT id, title FROM #__categories WHERE id = ".$cat;
                $db->setQuery($query);
                $category = $db->loadObject();
                
                $title = $category->title;
                $url[] = '<a href="' . JRoute::_(MulticatsContentHelperRoute::getCategoryRoute($category->id)) . '">' . $title . '</a>';
              }                
            }
            $item->displayCategoryTitle = implode(', ',$url); 
            // End patch
          ?>
					<span class="mod-articles-category-category">
						(<?php echo $item->displayCategoryTitle; ?>)
					</span>
				<?php endif; ?>
	
				<?php if ($item->displayDate) : ?>
					<span class="mod-articles-category-date">
						<?php echo $item->displayDate; ?>
					</span>
				<?php endif; ?>
	
				<?php if ($params->get('show_introtext')) : ?>
					<p class="mod-articles-category-introtext">
						<?php echo $item->displayIntrotext; ?>
					</p>
				<?php endif; ?>
	
				<?php if ($params->get('show_readmore')) : ?>
					<p class="mod-articles-category-readmore">
						<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
							<?php if ($item->params->get('access-view') == false) : ?>
								<?php echo JText::_('MOD_ARTICLES_CATEGORY_REGISTER_TO_READ_MORE'); ?>
							<?php elseif ($readmore = $item->alternative_readmore) : ?>
								<?php echo $readmore; ?>
								<?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
							<?php elseif ($params->get('show_readmore_title', 0) == 0) : ?>
								<?php echo JText::sprintf('MOD_ARTICLES_CATEGORY_READ_MORE_TITLE'); ?>
							<?php else : ?>
								<?php echo JText::_('MOD_ARTICLES_CATEGORY_READ_MORE'); ?>
								<?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
							<?php endif; ?>
						</a>
					</p>
				<?php endif; ?>
			</li>
		<?php endforeach; ?>
	<?php endif; ?>
</ul>