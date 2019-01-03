<?php
/**
 * A Magento 2 module named Ianitsky/ViaCep
 * Copyright (C) 2018 Douglas Ianitsky <ianitsky@gmail.com>
 * 
 * This file is part of Ianitsky/ViaCep.
 * 
 * Ianitsky/ViaCep is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

namespace Ianitsky\ViaCep\Model\Data;

use Ianitsky\ViaCep\Api\Data\PostcodeInterface;

class Postcode extends \Magento\Framework\Api\AbstractExtensibleObject implements PostcodeInterface
{

    /**
     * Get postcode_id
     * @return string|null
     */
    public function getPostcodeId()
    {
        return $this->_get(self::POSTCODE_ID);
    }

    /**
     * Set postcode_id
     * @param string $postcodeId
     * @return \Ianitsky\ViaCep\Api\Data\PostcodeInterface
     */
    public function setPostcodeId($postcodeId)
    {
        return $this->setData(self::POSTCODE_ID, $postcodeId);
    }

    /**
     * Get postcode
     * @return string|null
     */
    public function getPostcode()
    {
        return $this->_get(self::POSTCODE);
    }

    /**
     * Set postcode
     * @param string $postcode
     * @return \Ianitsky\ViaCep\Api\Data\PostcodeInterface
     */
    public function setPostcode($postcode)
    {
        return $this->setData(self::POSTCODE, $postcode);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Ianitsky\ViaCep\Api\Data\PostcodeExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Ianitsky\ViaCep\Api\Data\PostcodeExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Ianitsky\ViaCep\Api\Data\PostcodeExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get street
     * @return string|null
     */
    public function getStreet()
    {
        return $this->_get(self::STREET);
    }

    /**
     * Set street
     * @param string $street
     * @return \Ianitsky\ViaCep\Api\Data\PostcodeInterface
     */
    public function setStreet($street)
    {
        return $this->setData(self::STREET, $street);
    }

    /**
     * Get complement
     * @return string|null
     */
    public function getComplement()
    {
        return $this->_get(self::COMPLEMENT);
    }

    /**
     * Set complement
     * @param string $complement
     * @return \Ianitsky\ViaCep\Api\Data\PostcodeInterface
     */
    public function setComplement($complement)
    {
        return $this->setData(self::COMPLEMENT, $complement);
    }

    /**
     * Get neighborhood
     * @return string|null
     */
    public function getNeighborhood()
    {
        return $this->_get(self::NEIGHBORHOOD);
    }

    /**
     * Set neighborhood
     * @param string $neighborhood
     * @return \Ianitsky\ViaCep\Api\Data\PostcodeInterface
     */
    public function setNeighborhood($neighborhood)
    {
        return $this->setData(self::NEIGHBORHOOD, $neighborhood);
    }

    /**
     * Get city
     * @return string|null
     */
    public function getCity()
    {
        return $this->_get(self::CITY);
    }

    /**
     * Set city
     * @param string $city
     * @return \Ianitsky\ViaCep\Api\Data\PostcodeInterface
     */
    public function setCity($city)
    {
        return $this->setData(self::CITY, $city);
    }

    /**
     * Get state
     * @return string|null
     */
    public function getState()
    {
        return $this->_get(self::STATE);
    }

    /**
     * Set state
     * @param string $state
     * @return \Ianitsky\ViaCep\Api\Data\PostcodeInterface
     */
    public function setState($state)
    {
        return $this->setData(self::STATE, $state);
    }

    /**
     * Get ibge
     * @return string|null
     */
    public function getIbge()
    {
        return $this->_get(self::IBGE);
    }

    /**
     * Set ibge
     * @param string $ibge
     * @return \Ianitsky\ViaCep\Api\Data\PostcodeInterface
     */
    public function setIbge($ibge)
    {
        return $this->setData(self::IBGE, $ibge);
    }
}
