<?php
class Islandworks_CustomWidgets_Block_Latest extends Mage_Core_Block_Template
{
    /**
     * Set default template.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->setData('template', 'islandworks/custom_widgets/latest_tweets.phtml');
        parent::_construct();
    }
}