<?php

class Islandworks_OneClickInstaller_Adminhtml_InstallerFormController extends Mage_Adminhtml_Controller_Action
{
    protected $_storeId = null;

    public function indexAction()
    {
        $this->loadLayout()->renderLayout();
    }
    
		protected function deleteBlock($id){
	        $block = Mage::getModel('cms/block')
	                ->setStoreId($this->_storeId)
	                ->load($id);
	
			$block->delete();
		}
    
    public function uninstallAction()
    {
		$post = $this->getRequest()->getPost();
		$message = "";
        try {
            if (empty($post)) {
                Mage::throwException($this->__('Invalid form data.'));
            }
			$storeId = $post['design']['store_id'];		
			$this->_storeId = $storeId;	
			if($storeId == 0) {
				$scope = 'default';
			}else{
				$scope = 'stores';
			}
			Mage::getConfig()->saveConfig('design/package/name','default', $scope, $storeId);
			Mage::getConfig()->saveConfig('design/theme/template', 'default', $scope, $storeId);
			Mage::getConfig()->saveConfig('design/theme/skin', 'default', $scope, $storeId);
			Mage::getConfig()->saveConfig('design/theme/layout', 'default', $scope, $storeId);
			Mage::getConfig()->saveConfig('design/theme/default', 'default', $scope, $storeId);
			
			$message = $this->__('iw_benza theme was uninstalled successfully. ');
			Mage::getSingleton('adminhtml/session')->addSuccess($message);
        } catch (Exception $e) {
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
        }
		$this->_redirect('*/*');		
    }
    public function installAction()
    {
      $post = $this->getRequest()->getPost();
      $message = "";
      try {
      	if (empty($post)) {
                Mage::throwException($this->__('Invalid form data.'));
        }
				$storeId 			= $post['design']['store_id'];
				$InstallBlock 	= $post['design']['install_block'];
				$InstallSlideshow 	= $post['design']['install_slideshow'];
				$stores = array($storeId); 	//Used at all blocks
				$RootCategoryId = Mage::app()->getStore($storeId)->getRootCategoryId();			
				$islandworks_uploaded = false;
				$design = Mage::getModel('core/design_package')->getPackageList();
				foreach ($design as $package){
					if($package == "islandworks") {
						$islandworks_uploaded = true;
						break;
					}
				}
				if (!$islandworks_uploaded){
					Mage::throwException($this->__('iw_benza Theme was not found. Please upload the theme first.'));				
				}					
				if($storeId == 0) {
					$scope = 'default';
				}else{
					$scope = 'stores';
				}
				//Configuration 
				//Design
				Mage::getConfig()->saveConfig('design/package/name', "islandworks", $scope, $storeId);
				Mage::getConfig()->saveConfig('design/theme/template', "iw_benza", $scope, $storeId);
				Mage::getConfig()->saveConfig('design/theme/skin', "iw_benza", $scope, $storeId);		
				Mage::getConfig()->saveConfig('design/theme/layout', "iw_benza", $scope, $storeId);
				Mage::getConfig()->saveConfig('design/theme/default', "iw_benza", $scope, $storeId);
				//Coppyright
				Mage::getConfig()->saveConfig('design/footer/copyright', "&copy; 2013 Eda Magento Theme. All Rights Reserved. Designed by <a href=\"http://mentothemes.com/\" title=\"MentoThemes\">MentoThemes</a>",$scope, $storeId);
				//Header
				Mage::getConfig()->saveConfig('design/header/logo_src', "images/logo.png", $scope, $storeId);
				//Setup Static Block							
				
				$model = Mage::getModel('core/store');
				$storeName = Mage::getModel('core/store')->load($storeId)->getName();
				$storeCode = Mage::getModel('core/store')->load($storeId)->getCode();
				$store = Mage::app()->getStore($storeId);
			
				$message = $this->__('iw_benza Theme was successfully installed on <i>'.$storeName.'</i>!');
        Mage::getSingleton('adminhtml/session')->addSuccess($message);
      } catch (Exception $e) {
        Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
      }
      $this->_redirect('*/*');
		}    
}