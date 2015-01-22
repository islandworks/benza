<?php
/**
 * Islandworks Blog Extension
 * @version   1.0 12.09.2013
 * @author    Islandworks http://www.islandworks.net <info@islandworks.net>
 * @copyright Copyright (C) 2010 - 2013 Islandworks
 */

class Islandworks_Blog_Model_Sorter
{
    public function toOptionArray()
    {
        return array(
            array('value' => Varien_Data_Collection::SORT_ORDER_DESC , 'label' => Mage::helper('adminhtml')->__('Newest first')),
            array('value' => Varien_Data_Collection::SORT_ORDER_ASC, 'label' => Mage::helper('adminhtml')->__('Older first')),
        );
    }
}
