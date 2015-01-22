<?php
/**
 * Islandworks Blog Extension
 * @version   1.0 12.09.2013
 * @author    Islandworks http://www.islandworks.net <info@islandworks.net>
 * @copyright Copyright (C) 2010 - 2013 Islandworks
 */

class Islandworks_Blog_Block_Rss_List extends Mage_Rss_Block_List {

    public function getRssMiscFeeds() {
        parent::getRssMiscFeeds();
        $this->BlogFeed();
        return $this->getRssFeeds();
    }

    public function BlogFeed() {
        $route = Mage::helper('blog')->getRoute() . '/rss';
        $title = Mage::getStoreConfig('blog/blog/title');
        $this->addRssFeed($route, $title);
        return $this;
    }

}
