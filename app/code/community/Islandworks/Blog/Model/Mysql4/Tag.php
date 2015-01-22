<?php
/**
 * Islandworks Blog Extension
 * @version   1.0 12.09.2013
 * @author    Islandworks http://www.islandworks.net <info@islandworks.net>
 * @copyright Copyright (C) 2010 - 2013 Islandworks
 */

class Islandworks_Blog_Model_Mysql4_Tag extends Mage_Core_Model_Mysql4_Abstract {

    protected function _construct() {
        $this->_init('blog/tag', 'id');
    }

}
