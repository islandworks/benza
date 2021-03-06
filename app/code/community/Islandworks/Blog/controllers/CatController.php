<?php
/**
 * Islandworks Blog Extension
 * @version   1.0 12.09.2013
 * @author    Islandworks http://www.islandworks.net <info@islandworks.net>
 * @copyright Copyright (C) 2010 - 2013 Islandworks
 */

class Islandworks_Blog_CatController extends Mage_Core_Controller_Front_Action {

    public function preDispatch() {
       
        parent::preDispatch();
        if (!Mage::helper('blog')->getEnabled())
            $this->_redirectUrl(Mage::helper('core/url')->getHomeUrl());
    }

    public function viewAction() {

        $identifier = $this->getRequest()->getParam('identifier', $this->getRequest()->getParam('id', false));

        if (!Mage::helper('blog/cat')->renderPage($this, $identifier)) {
            $this->_forward('NoRoute');
        }
    }

    public function noRouteAction($coreRoute = null) {
        $this->getResponse()->setHeader('HTTP/1.1', '404 Not Found');
        $this->getResponse()->setHeader('Status', '404 File not found');

        $pageId = Mage::getStoreConfig('web/default/cms_no_route');
        if (!Mage::helper('cms/page')->renderPage($this, $pageId)) {
            $this->_forward('defaultNoRoute');
        }
    }

}
