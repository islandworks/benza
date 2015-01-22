<?php
/**
 * Islandworks Blog Extension
 * @version   1.0 12.09.2013
 * @author    Islandworks http://www.islandworks.net <info@islandworks.net>
 * @copyright Copyright (C) 2010 - 2013 Islandworks
 */

class Islandworks_Blog_Model_Layouts {

    protected $_options = null;

    public function toOptionArray() {
        if ($this->_options === null) {
            $this->_options = array();
            foreach (Mage::getSingleton('page/config')->getPageLayouts() as $layout) {
                $this->_options[] = array(
                    'value' => $layout->getTemplate(),
                    'label' => $layout->getLabel(),
                );
            }
        }
        return $this->_options;
    }

}
