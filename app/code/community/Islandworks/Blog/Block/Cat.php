<?php
/**
 * Islandworks Blog Extension
 * @version   1.0 12.09.2013
 * @author    Islandworks http://www.islandworks.net <info@islandworks.net>
 * @copyright Copyright (C) 2010 - 2013 Islandworks
 */

class Islandworks_Blog_Block_Cat extends Islandworks_Blog_Block_Abstract
{

    public function getPosts()
    {
        $category = $this->getCategory();

        if (!$category->getCatId()) {
            return false;
        }

        $collection = parent::_prepareCollection()->addCatFilter($category->getCatId());

        parent::_processCollection($collection, $category);

        return $collection;
    }

    public function getCategory()
    {
        return Mage::getSingleton('blog/cat');
    }

    protected function _prepareLayout()
    {
        $post = $this->getCategory();
        $breadcrumbs = $this->getCrumbs();
        if ($breadcrumbs) {
            $breadcrumbs->addCrumb('blog', array('label' => self::$_helper->getTitle(), 'title' => $this->__('Return to %s', self::$_helper->getTitle()), 'link' => $this->getBlogUrl()));
            $breadcrumbs->addCrumb('blog_page', array('label' => $post->getTitle(), 'title' => $post->getTitle()));
        }

        parent::_prepareMetaData($post);
    }

}
