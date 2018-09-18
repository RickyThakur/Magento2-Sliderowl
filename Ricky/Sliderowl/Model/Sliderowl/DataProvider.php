<?php
/** 
 * @package   Ricky_Sliderowl
 * @author    Ricky Thakur (Kapil Dev Singh)
 * @copyright Copyright (c) 2018 Ricky Thakur
 * @license   MIT license (see LICENSE.txt for details)
 */
namespace Ricky\Sliderowl\Model\Sliderowl;

use Ricky\Sliderowl\Model\ResourceModel\Sliderowl\CollectionFactory;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $entityCollectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $entityCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $entityCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        $this->loadedData = array();
        
        foreach ($items as $item) {
            $this->loadedData[$item->getId()] = $item->getData();
            $slideArr = json_decode($this->loadedData[$item->getId()]['slides'],true);
            if(!empty($slideArr)){
                foreach($slideArr as $k => $v){
                    $this->loadedData[$item->getId()][$k] = $v;
                }
            }
        }    
     
        
        return $this->loadedData;

    }
}