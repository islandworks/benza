<?php
/**
 * Islandworks Blog Extension
 * @version   1.0 12.09.2013
 * @author    Islandworks http://www.islandworks.net <info@islandworks.net>
 * @copyright Copyright (C) 2010 - 2013 Islandworks
 */

class Islandworks_Blog_Block_Homeblog extends Islandworks_Blog_Block_Abstract
{
	
	/**
     * Initialize block's cache
     */
    protected function _construct()
    {
        parent::_construct();
			
		$this->addData(array(
            'cache_lifetime'    => 86400,
            'cache_tags'        => array(Islandworks_Blog_Model_Blog::CACHE_TAG),
			'cache_key'			=> Islandworks_Blog_Model_Blog::CACHE_TAG.'_homeblock'
        ));
		
		$this->setData('perPageOverride', 2);
    }
	
    public function getPosts()
    {
		
        $collection = parent::_prepareCollection();

        $tag = $this->getRequest()->getParam('tag');
        if ($tag) {
            $collection->addTagFilter(urldecode($tag));
        }

        parent::_processCollection($collection);

        return $collection;
    }

}
