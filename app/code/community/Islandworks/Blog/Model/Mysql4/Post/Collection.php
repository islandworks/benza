<?php
/**
 * Islandworks Blog Extension
 * @version   1.0 12.09.2013
 * @author    Islandworks http://www.islandworks.net <info@islandworks.net>
 * @copyright Copyright (C) 2010 - 2013 Islandworks
 */

class Islandworks_Blog_Model_Mysql4_Post_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract {

    protected $_previewFlag;

    protected function _construct() {
        $this->_init('blog/blog');
    }

    public function toOptionArray() {
        return $this->_toOptionArray('identifier', 'title');
    }

    public function addStoreFilter($store) {

        if (!Mage::app()->isSingleStoreMode()) {

            if ($store instanceof Mage_Core_Model_Store) {
                $store = $store->getId();
            }

            $store = (array) $store;
            array_push($store, 0);

            $this->getSelect()
                    ->distinct()
                    ->join(array('store_table' => $this->getTable('store')), 'main_table.post_id = store_table.post_id', array())
                    ->where('store_table.store_id in (?)', array($store));
        }

        return $this;
    }

    public function addStatusFilter($status = array(Islandworks_Blog_Model_Status::STATUS_ENABLED, Islandworks_Blog_Model_Status::STATUS_HIDDEN)) {

        if ($status == '*') {
            $status = array(Islandworks_Blog_Model_Status::STATUS_ENABLED, Islandworks_Blog_Model_Status::STATUS_HIDDEN, Islandworks_Blog_Model_Status::STATUS_DISABLED);
        }

        if (is_string($status)) {
            $status = (array) $status;
        }

        $this->getSelect()->where('main_table.status IN (?)', $status);

        return $this;
    }

}
