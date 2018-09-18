<?php
namespace Ricky\Sliderowl\Controller\Adminhtml\Test;

 
class Test extends \Magento\Backend\App\Action
{
    protected $collectionFactory;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
            \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Ricky\Sliderowl\Model\ResourceModel\Sliderowl\CollectionFactory $collectionFactory)
    {
        parent::__construct($context);
                $this->resultPageFactory = $resultPageFactory;
        $this->collectionFactory = $collectionFactory;
    }
  


    public function execute()
    {
        $collection = $this->collectionFactory->create();
        $listArr = array();
        
        while($object=$collection->fetchItem()){
            $listArr[] = ['value'=> $object->getSliderId(), 'label'=> ucfirst($object->getTitle())] ;
        
        } 
    
    
         die();
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Ricky_Sliderowl::menu_1');

        $resultPage->getConfig()->getTitle()->prepend((__('Owl Slider Manager')));

        return $resultPage;
    }
}
