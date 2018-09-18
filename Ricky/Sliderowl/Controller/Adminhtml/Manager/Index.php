<?php
/** 
 * @package   Ricky_Sliderowl
 * @author    Ricky Thakur (Kapil Dev Singh)
 * @copyright Copyright (c) 2018 Ricky Thakur
 * @license   MIT license (see LICENSE.txt for details)
 */
    namespace Ricky\Sliderowl\Controller\Adminhtml\Manager;

    class Index extends \Magento\Backend\App\Action
    {
        /**
         * Authorization level of a basic admin session
         *
         * @see _isAllowed()
         */
        const ADMIN_RESOURCE = 'Ricky_Sliderowl::manager';

        /**
        * @var \Magento\Framework\View\Result\PageFactory
        */
        protected $resultPageFactory;

        /**
         * Constructor
         *
         * @param \Magento\Backend\App\Action\Context $context
         * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
         */
        public function __construct(
            \Magento\Backend\App\Action\Context $context,
            \Magento\Framework\View\Result\PageFactory $resultPageFactory
        ) {
                parent::__construct($context);
                $this->resultPageFactory = $resultPageFactory;
        }

        /**
         *
         * @return \Magento\Framework\View\Result\Page
         */
        public function execute()
        {
            $resultPage = $this->resultPageFactory->create();
            $resultPage->setActiveMenu('Ricky_Sliderowl::menu_1');

            $resultPage->getConfig()->getTitle()->prepend((__('Owl Slider Manager')));

            return $resultPage;
        }
        
    }
?>
  