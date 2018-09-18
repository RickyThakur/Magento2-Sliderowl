<?php
/** 
 * @package   Ricky_Sliderowl
 * @author    Ricky Thakur (Kapil Dev Singh)
 * @copyright Copyright (c) 2018 Ricky Thakur
 * @license   MIT license (see LICENSE.txt for details)
 */
namespace Ricky\Sliderowl\Model;

use Ricky\Sliderowl\Api\Data\SliderowlInterface;

class Sliderowl extends \Magento\Framework\Model\AbstractModel implements SliderowlInterface
{
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'sliderowl_records';

    /**
     * @var string
     */
    protected $_cacheTag = 'sliderowl_records';

    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'sliderowl_records';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('Ricky\Sliderowl\Model\ResourceModel\Sliderowl');
    }

    /**
     * Get SliderId.
     *
     * @return int
     */
    public function getSliderId()
    {
        return $this->getData(self::SLIDER_ID);
    }
 
    /**
     * Set SliderId.
     */
    public function setSliderId($sliderId)
    {
        return $this->setData(self::SLIDER_ID, $sliderId);
    }

    /**
     * Get Title.
     *
     * @return varchar
     */
    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }
 
    /**
     * Set Title.
     */
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    /**
     * Get Title Visible.
     *
     * @return varchar
     */
    public function getIsTitleVisible()
    {
        return $this->getData(self::ISTITLEVISIBLE);
    }
 
    /**
     * Set Title Visible.
     */
    public function setIsTitleVisible($isTitleVisible)
    {
        return $this->setData(self::ISTITLEVISIBLE, $isTitleVisible);
    }

    /**
     * Get Slides.
     *
     * @return varchar
     */
    public function getSlides()
    {
        return $this->getData(self::SLIDES);
    }
 
    /**
     * Set Slides.
     */
    public function setSlides($slides)
    {
        return $this->setData(self::SLIDES, $slides);
    }

    /**
     * Get Items.
     *
     * @return int
     */
    public function getItems(){
        return $this->getData(self::ITEMS);
    }

    /**
     * Set Items.
     */
    public function setItems($items){
        return $this->setData(self::ITEMS, $items);
    }

    /**
     * Get Margin.
     *
     * @return int
     */
    public function getMargin(){
        return $this->getData(self::MARGIN);
    }

    /**
     * Set Margin.
     */
    public function setMargin($margin){
        return $this->setData(self::MARGIN, $margin);
    }

    /**
     * Get Loop.
     *
     * @return bool
     */
    public function getLoop(){
        return $this->getData(self::LOOP);
    }

    /**
     * Set Loop.
     */
    public function setLoop($loop){
        return $this->setData(self::LOOP, $loop);
    }

    /**
     * Get Nav.
     *
     * @return bool
     */
    public function getNav(){
        return $this->getData(self::NAV);
    }

    /**
     * Set Nav.
     */
    public function setNav($nav){
        return $this->setData(self::NAV, $nav);
    }

    /**
     * Get NavText.
     *
     * @return varchar
     */
    public function getNavText(){
        return $this->getData(self::NAVTEXT);
    }

    /**
     * Set NavText.
     */
    public function setNavText($navText){
        return $this->setData(self::NAVTEXT, $navText);
    }

    /**
     * Get Dots.
     *
     * @return bool
     */
    public function getDots(){
        return $this->getData(self::DOTS);
    }

    /**
     * Set Dots.
     */
    public function setDots($dots){
        return $this->setData(self::DOTS, $dots);
    }

    /**
     * Get AutoPlay.
     *
     * @return bool
     */
    public function getAutoPlay(){
        return $this->getData(self::AUTOPLAY);
    }

    /**
     * Set AutoPlay.
     */
    public function setAutoPlay($autoPlay){
        return $this->setData(self::AUTOPLAY, $autoPlay);
    }

    /**
     * Get AutoPlayTimeout.
     *
     * @return int
     */
    public function getAutoPlayTimeout(){
        return $this->getData(self::AUTOPLAYTIMEOUT);
    }

    /**
     * Set AutoPlayTimeout.
     */
    public function setAutoPlayTimeout($autoPlayTimeout){
        return $this->setData(self::AUTOPLAYTIMEOUT, $autoPlayTimeout);
    }

    /**
     * Get AnimateOut.
     *
     * @return varchar
     */
    public function getAnimateOut(){
        return $this->getData(self::ANIMATEOUT);
    }

    /**
     * Set animateOut.
     */
    public function setAnimateOut($animateOut){
        return $this->setData(self::ANIMATEOUT, $animateOut);
    }

    /**
     * Get AnimateIn.
     *
     * @return varchar
     */
    public function getAnimateIn(){
        return $this->getData(self::ANIMATEIN);
    }

    /**
     * Set animateIn.
     */
    public function setAnimateIn($animateIn){
        return $this->setData(self::ANIMATEIN, $animateIn);
    }    
}