<?php
/** 
 * @package   Ricky_Sliderowl
 * @author    Ricky Thakur (Kapil Dev Singh)
 * @copyright Copyright (c) 2018 Ricky Thakur
 * @license   MIT license (see LICENSE.txt for details)
 */
namespace Ricky\Sliderowl\Controller\Adminhtml\Manager;

use Magento\Backend\App\Action\Context;
use Ricky\Sliderowl\Model\SliderowlFactory;
use Magento\Framework\Controller\ResultFactory;
    
class Addnew extends \Magento\Backend\App\Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Ricky_Sliderowl::manager';

    
    /**
     * @var \Ricky\Sliderowl\Model\SliderowlFactory
     */
    private $entityFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Ricky\Sliderowl\Model\SliderowlFactory $entityFactory
     */
    public function __construct(
        Context $context,
        SliderowlFactory $entityFactory
    ) {
        parent::__construct($context);
        $this->entityFactory = $entityFactory;            
    }
    

    /**
     * Create new Slider
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {   
        
        $this->entityFactory->create();
        
        
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->setActiveMenu('Ricky_Sliderowl::menu_1');
        
        $title = "Slider Information";
        
        $resultPage->getConfig()->getTitle()->prepend($title);
        
        return $resultPage;
    }
}  