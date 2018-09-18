<?php
/** 
 * @package   Ricky_Sliderowl
 * @author    Ricky Thakur (Kapil Dev Singh)
 * @copyright Copyright (c) 2018 Ricky Thakur
 * @license   MIT license (see LICENSE.txt for details)
 */

namespace Ricky\Sliderowl\Api\Data;


interface SliderowlInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const SLIDER_ID = 'slider_id';
    const TITLE = 'title';
    const ISTITLEVISIBLE = 'isTitleVisible';
    const SLIDES = 'slides';
    const ITEMS = 'items';
    const MARGIN = 'margin';
    const LOOP = 'loop';
    const NAV = 'nav';
    const NAVTEXT = 'navText';
    const DOTS = 'dots';
    const AUTOPLAY = 'autoplay';
    const AUTOPLAYTIMEOUT = 'autoplayTimeout';
    const ANIMATEOUT = 'animateOut';
    const ANIMATEIN = 'animateIn';

    /**
     * Get SliderId.
     *
     * @return int
     */
    public function getSliderId();
 
    /**
     * Set SliderId.
     */
    public function setSliderId($sliderId);

    /**
     * Get Title.
     *
     * @return varchar
     */
    public function getTitle();
 
    /**
     * Set Title.
     */
    public function setTitle($title);

    /**
     * Get Title Visible.
     *
     * @return varchar
     */
    public function getIsTitleVisible();
 
    /**
     * Set Title Visible.
     */
    public function setIsTitleVisible($isTitleVisible);

    /**
     * Get Slides.
     *
     * @return varchar
     */
    public function getSlides();
 
    /**
     * Set Slides.
     */
    public function setSlides($slides);

    /**
     * Get Items.
     *
     * @return int
     */
    public function getItems();

    /**
     * Set Items.
     */
    public function setItems($items);

    /**
     * Get Margin.
     *
     * @return int
     */
    public function getMargin();

    /**
     * Set Margin.
     */
    public function setMargin($margin);

    /**
     * Get Loop.
     *
     * @return bool
     */
    public function getLoop();

    /**
     * Set Loop.
     */
    public function setLoop($loop);

    /**
     * Get Nav.
     *
     * @return bool
     */
    public function getNav();

    /**
     * Set Nav.
     */
    public function setNav($nav);

    /**
     * Get NavText.
     *
     * @return varchar
     */
    public function getNavText();

    /**
     * Set NavText.
     */
    public function setNavText($navText);

    /**
     * Get Dots.
     *
     * @return bool
     */
    public function getDots();

    /**
     * Set Dots.
     */
    public function setDots($dots);

    /**
     * Get AutoPlay.
     *
     * @return bool
     */
    public function getAutoPlay();

    /**
     * Set AutoPlay.
     */
    public function setAutoPlay($autoPlay);

    /**
     * Get AutoPlayTimeout.
     *
     * @return int
     */
    public function getAutoPlayTimeout();

    /**
     * Set AutoPlayTimeout.
     */
    public function setAutoPlayTimeout($autoPlayTimeout);

    /**
     * Get AnimateOut.
     *
     * @return varchar
     */
    public function getAnimateOut();

    /**
     * Set animateOut.
     */
    public function setAnimateOut($animateOut);

    /**
     * Get AnimateIn.
     *
     * @return varchar
     */
    public function getAnimateIn();

    /**
     * Set animateIn.
     */
    public function setAnimateIn($animateIn);
}