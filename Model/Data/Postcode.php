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
     * @inheritdoc
     */
    public function getPostcodeId()
    {
        return $this->_get(self::POSTCODE_ID);
    }

    /**
     * @inheritdoc
     */
    public function setPostcodeId($postcodeId)
    {
        return $this->setData(self::POSTCODE_ID, $postcodeId);
    }

    /**
     * @inheritdoc
     */
    public function getPostcode()
    {
        return $this->_get(self::POSTCODE);
    }

    /**
     * @inheritdoc
     */
    public function setPostcode($postcode)
    {
        return $this->setData(self::POSTCODE, $postcode);
    }

    /**
     * @inheritdoc
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * @inheritdoc
     */
    public function setExtensionAttributes(
        \Ianitsky\ViaCep\Api\Data\PostcodeExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * @inheritdoc
     */
    public function getStreet()
    {
        return $this->_get(self::STREET);
    }

    /**
     * @inheritdoc
     */
    public function setStreet($street)
    {
        return $this->setData(self::STREET, $street);
    }

    /**
     * @inheritdoc
     */
    public function getComplement()
    {
        return $this->_get(self::COMPLEMENT);
    }

    /**
     * @inheritdoc
     */
    public function setComplement($complement)
    {
        return $this->setData(self::COMPLEMENT, $complement);
    }

    /**
     * @inheritdoc
     */
    public function getNeighborhood()
    {
        return $this->_get(self::NEIGHBORHOOD);
    }

    /**
     * @inheritdoc
     */
    public function setNeighborhood($neighborhood)
    {
        return $this->setData(self::NEIGHBORHOOD, $neighborhood);
    }

    /**
     * @inheritdoc
     */
    public function getCity()
    {
        return $this->_get(self::CITY);
    }

    /**
     * @inheritdoc
     */
    public function setCity($city)
    {
        return $this->setData(self::CITY, $city);
    }

    /**
     * @inheritdoc
     */
    public function getState()
    {
        return $this->_get(self::STATE);
    }

    /**
     * @inheritdoc
     */
    public function setState($state)
    {
        return $this->setData(self::STATE, $state);
    }

    /**
     * @inheritdoc
     */
    public function getIbge()
    {
        return $this->_get(self::IBGE);
    }

    /**
     * @inheritdoc
     */
    public function setIbge($ibge)
    {
        return $this->setData(self::IBGE, $ibge);
    }

    /**
     * @inheritdoc
     */
    public function getRegion()
    {
        return $this->_get(self::REGION);
    }

    /**
     * @inheritdoc
     */
    public function setRegion($region)
    {
        return $this->setData(self::REGION, $region);
    }

    /**
     * @inheritdoc
     */
    public function getRegionId()
    {
        return $this->_get(self::REGION_ID);
    }

    /**
     * @inheritdoc
     */
    public function setRegionId($regionId)
    {
        return $this->setData(self::REGION_ID, $regionId);
    }
}
