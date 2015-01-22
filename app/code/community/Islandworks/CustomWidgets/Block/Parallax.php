<?php
class Islandworks_CustomWidgets_Block_Parallax extends Mage_Core_Block_Template
{
    /**
     * Set default template.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->setData('template', 'islandworks/custom_widgets/parallax.phtml');
        parent::_construct();
    }

    /**
     * Return absolute url to the image file.
     *
     * @return string
     */
    public function getImageUrl()
    {
        return Mage::getBaseUrl('media') . $this->getImage();
    }
}