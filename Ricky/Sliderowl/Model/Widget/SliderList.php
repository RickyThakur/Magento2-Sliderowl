<?php
namespace Ricky\Sliderowl\Model\Widget;

 
class SliderList implements \Magento\Framework\Option\ArrayInterface
{
    protected $collectionFactory;
    
    public function __construct(
        \Ricky\Sliderowl\Model\ResourceModel\Sliderowl\CollectionFactory $collectionFactory 
    )
    {
        $this->collectionFactory = $collectionFactory;
    }

    public function sliderCollection(){
        $collection = $this->collectionFactory->create();
        $listArr = array();
        while($object=$collection->fetchItem()){
            $listArr[] = ['value'=> $object->getSliderId(), 'label'=> ucfirst($object->getTitle())] ;
        }  
        return $listArr;
    }

    public function toOptionArray()
    {
        $sliderList = $this->sliderCollection();
        return $sliderList;        
    }
}
