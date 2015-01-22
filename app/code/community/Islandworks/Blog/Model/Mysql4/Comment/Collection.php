<?php
/**
 * Islandworks Blog Extension
 * @version   1.0 12.09.2013
 * @author    Islandworks http://www.islandworks.net <info@islandworks.net>
 * @copyright Copyright (C) 2010 - 2013 Islandworks
 */

class Islandworks_Blog_Model_Mysql4_Comment_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract {

    public function _construct() {
        $this->_init('blog/comment');
    }

    public function addApproveFilter($status) {
        $this->getSelect()
                ->where('status = ?', $status);
        return $this;
    }

    public function addPostFilter($postId) {
        $this->getSelect()
                ->where('post_id = ?', $postId);
        return $this;
    }

}
