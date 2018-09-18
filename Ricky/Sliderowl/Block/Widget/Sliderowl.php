<?php 
namespace Ricky\Sliderowl\Block\Widget;

/**
 * Widget to display Slider 
 *
 * @author    Ricky Thakur (Kapil Dev Singh)
 */
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface; 
use Magento\Framework\View\Element\Template\Context;
use Ricky\Sliderowl\Model\ResourceModel\Sliderowl\CollectionFactory;
 
class Sliderowl extends Template implements BlockInterface {

	/* @var SliderCollection $_collectionFactory */
	protected $_collectionFactory ;

	/**
     * Selected Slider ID
     *
     * @var int
     */
    protected $_slider_id;

	protected $contentProcessor;

	public function __construct(
		Context $context,
		CollectionFactory $collectionFactory,
		\Magento\Cms\Model\Template\FilterProvider $contentProcessor,
        array $data = [])
    {
        parent::__construct($context,$data);
		
		$this->_collectionFactory = $collectionFactory;
		$this->contentProcessor = $contentProcessor;
		
	}	
	public function processContent($content)
	{
	    return $this->contentProcessor->getPageFilter()->filter($content);
	} 
	
	public function getSelectedSlider(){
		$this->_slider_id = $this->getData('select_slider');
		

		$collection = $this->_collectionFactory->create();
		$collection->addFieldToFilter('slider_id',$this->_slider_id);
		
		$item = $collection->getFirstItem();

		return $item->getData();
		
	}

	public function _toHtml()
	{
		$this->setTemplate("widget/slider.phtml");
		return parent::_toHtml();
	}

}