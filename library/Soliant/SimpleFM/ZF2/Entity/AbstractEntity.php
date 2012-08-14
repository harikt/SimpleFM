<?php
/**
 * This source file is subject to the MIT license that is bundled with this package in the file LICENSE.txt.
 *
 * @package   Soliant\SimpleFM\ZF2
 * @copyright Copyright (c) 2007-2012 Soliant Consulting, Inc. (http://www.soliantconsulting.com)
 * @author    jsmall@soliantconsulting.com
 */

namespace Soliant\SimpleFM\ZF2\Entity;

abstract class AbstractEntity
{
    protected $recid;
    protected $modid;
    
    public function __construct($array = array())
    {
        $this->unserialize($array);
    }
    
    /**
     * @note FileMaker internal recid
     */
    public function getRecid()
    {
        return $this->recid;
    }

    /**
     * @note FileMaker internal modid
     */
    public function getModid()
    {
        return $this->modid;
    }
    
    /**
     * @note Can be a concrete field e.g. $this->name, 
     * or return derived value based on business logic
     */
    abstract public function getName(); 
    
    /**
     * @note Maps a SimpleFM\Adapter row onto the Entity
     */
    abstract public function unserialize($array = array());
    
    /**
     * @note Return the alias defined for the entity's controller class in the
     * module.config.php to be used as Uri route segment.
     * Example return: waterfall-work-request
     */
    abstract public function getControllerAlias(); 

    /**
     * Example return: Application\Entity\Entity
     * @return string
     */
    public function getEntityName()
    {
        return get_class($this);
    }
    
    /**
     * Example return: WorkRequestAttachment
     * @return string
     */
    public function getClassName()
    {
        return substr(get_class($this), strlen(__NAMESPACE__) + 1);
    }
    
}