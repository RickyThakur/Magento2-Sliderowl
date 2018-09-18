<?php
/** 
 * @package   Ricky_Sliderowl
 * @author    Ricky Thakur (Kapil Dev Singh)
 * @copyright Copyright (c) 2018 Ricky Thakur
 * @license   MIT license (see LICENSE.txt for details)
 */
namespace Ricky\Sliderowl\Controller\Adminhtml\Manager;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;

class Edit extends \Magento\Backend\App\Action
{
    /**
         * Authorization level of a basic admin session
         *
         * @see _isAllowed()
         */
        const ADMIN_RESOURCE = 'Ricky_Sliderowl::manager';

        /**
         * @var \Magento\Framework\Registry
         */
        private $coreRegistry;
    
        /**
         * @var \Ricky\Sliderowl\Model\SliderowlFactory
         */
        private $entityFactory;
    
        /**
         * @param \Magento\Backend\App\Action\Context $context
         * @param \Magento\Framework\Registry $coreRegistry,
         * @param \Ricky\Sliderowl\Model\SliderowlFactory $entityFactory
         */
        public function __construct(
            \Magento\Backend\App\Action\Context $context,
            \Magento\Framework\Registry $coreRegistry,
            \Ricky\Sliderowl\Model\SliderowlFactory $entityFactory
        ) {
            parent::__construct($context);
            $this->coreRegistry = $coreRegistry;
            $this->entityFactory = $entityFactory; 
        }
    
       
        public function execute()
        {
            $rowId = (int) $this->getRequest()->getParam('slider_id');
            $rowData = $this->entityFactory->create();
            
            
            if ($rowId) {
                
                $rowData = $rowData->load($rowId);
                
                if (!$rowData->getSliderId()) {
                    $this->messageManager->addError(__('row data no longer exist.'));
                    $this->_redirect('*/*/index');
                    return;
                }
            }
            //echo "<pre>"; print_r($rowData->getSlides()); die();
    
            $this->coreRegistry->register('row_data', $rowData);
            $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
            $resultPage->setActiveMenu('Ricky_Sliderowl::menu_1');
            $title = "Slider Information";
            $resultPage->getConfig()->getTitle()->prepend($title);
            return $resultPage;
        }
    
      
    }