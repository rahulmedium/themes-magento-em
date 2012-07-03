<?php
class EM_Blog_Block_Adminhtml_Category extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_category';
    $this->_blockGroup = 'blog';
    $this->_headerText = Mage::helper('blog')->__('Category Manager');
    $this->_addButtonLabel = Mage::helper('blog')->__('Add Category');
    parent::__construct();
    $this->setTemplate('em_blog/categories.phtml');
  }

  public function _prepareLayout()
  {
        /**
         * Display store switcher if system has more one store
         */
        if (!Mage::app()->isSingleStoreMode()) {
            $this->setChild('store_switcher',
                $this->getLayout()->createBlock('adminhtml/store_switcher')
                    ->setUseConfirm(false)
                    ->setSwitchUrl($this->getUrl('*/*/*', array('store'=>null)))
            );
        }
        parent::_prepareLayout();
  }
}