<?php
/** 
 * @package   Ricky_Sliderowl
 * @author    Ricky Thakur (Kapil Dev Singh)
 * @copyright Copyright (c) 2018 Ricky Thakur
 * @license   MIT license (see LICENSE.txt for details)
 */

namespace Ricky\Sliderowl\Controller\Adminhtml\Manager;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Ricky\Sliderowl\Model\SliderowlFactory;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Session\SessionManagerInterface;

class Save extends Action
{

    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Ricky_Sliderowl::manager';

    /**
     * @var EntityFactory
    */
    protected $entityFactory;
    
    /**
     * @var PageFactory
    */
    protected $resultPageFactory;

    /**
     * @var SessionManagerInterface
    */
    protected $sessionManager;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory,
     * @param \Ricky\Sliderowl\Model\SliderowlFactory $entityFactory,
     * @param \Magento\Framework\Session\SessionManagerInterface $sessionManager
     */
    public function __construct(
        Context $context,
        SliderowlFactory $entityFactory,
        PageFactory  $resultPageFactory,
        SessionManagerInterface $sessionManager
    )
    {
        parent::__construct($context);
        $this->entityFactory = $entityFactory;
        $this->resultPageFactory = $resultPageFactory;
        $this->sessionManager = $sessionManager;
        
    }
    
    /**
     * Save action
    */
    public function execute()
    {   
        $resultRedirect     = $this->resultRedirectFactory->create();
        $entityModel        = $this->entityFactory->create();
        //$data               = $this->getRequest()->getPostValue(); 
        $data               = $this->getRequest()->getPost(); 
        //echo "<pre>"; print_r($data); die();
        
        try{
            if (!empty($data['slider_id'])) {
                
                $rowData = $entityModel->load($data['slider_id']);
                
                if (!$rowData->getSliderId()) {
                    $this->messageManager->addError(__('Slider is no longer exist.'));
                    $this->_redirect('*/*/index');
                    return;
                }
                $entityModel->setSliderId($data['slider_id']);
            }
            $entityModel->setData('title', $data['title']);
            $entityModel->setData('items', $data['items']);
            $entityModel->setData('margin', $data['margin']);
            $entityModel->setData('autoplayTimeout', $data['autoplayTimeout']);
            $entityModel->setData('animateOut', $data['animateOut']);
            $entityModel->setData('animateIn', $data['animateIn']);
            $entityModel->setData('loop', $data['loop']);
            $entityModel->setData('nav', $data['nav']);
            $entityModel->setData('dots', $data['dots']);
            $entityModel->setData('autoplay', $data['autoplay']);
            $entityModel->setData('navText', $data['navText']);
            
            $slideArr = array();
        
            for($i=1;$i<=8;$i++){                                
                $key = 'slide'.$i;
                if(!empty($data[$key])){                                
                    $slideArr[$key] = $data[$key];       
                }            
                unset($data[$key]);
            }
            
            $entityModel->setData('slides', json_encode($slideArr));
           // echo "<pre>"; print_r($entityModel->getData());  die();
            //$entityModel->setData($data);
            $entityModel->save();
            //check for `back` parameter
            if ($this->getRequest()->getParam('back')) { 
                return $resultRedirect->setPath('*/*/edit', ['slider_id' => $entityModel->getId(), '_current' => true, '_use_rewrite' => true]);
            }
            
            $this->messageManager->addSuccess(__('The slider has been saved.'));

        }catch(\Exception $e){
            $this->messageManager->addError(__($e->getMessage()));
        } 
        $this->_redirect('*/*');       
        
    }
}