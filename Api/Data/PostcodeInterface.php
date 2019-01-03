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

namespace Ianitsky\ViaCep\Api\Data;

interface PostcodeInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const STREET = 'street';
    const POSTCODE_ID = 'postcode_id';
    const NEIGHBORHOOD = 'neighborhood';
    const IBGE = 'ibge';
    const STATE = 'state';
    const POSTCODE = 'postcode';
    const CITY = 'city';
    const COMPLEMENT = 'complement';

    /**
     * Get postcode_id
     * @return string|null
     */
    public function getPostcodeId();

    /**
     * Set postcode_id
     * @param string $postcodeId
     * @return \Ianitsky\ViaCep\Api\Data\PostcodeInterface
     */
    public function setPostcodeId($postcodeId);

    /**
     * Get postcode
     * @return string|null
     */
    public function getPostcode();

    /**
     * Set postcode
     * @param string $postcode
     * @return \Ianitsky\ViaCep\Api\Data\PostcodeInterface
     */
    public function setPostcode($postcode);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Ianitsky\ViaCep\Api\Data\PostcodeExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Ianitsky\ViaCep\Api\Data\PostcodeExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Ianitsky\ViaCep\Api\Data\PostcodeExtensionInterface $extensionAttributes
    );

    /**
     * Get street
     * @return string|null
     */
    public function getStreet();

    /**
     * Set street
     * @param string $street
     * @return \Ianitsky\ViaCep\Api\Data\PostcodeInterface
     */
    public function setStreet($street);

    /**
     * Get complement
     * @return string|null
     */
    public function getComplement();

    /**
     * Set complement
     * @param string $complement
     * @return \Ianitsky\ViaCep\Api\Data\PostcodeInterface
     */
    public function setComplement($complement);

    /**
     * Get neighborhood
     * @return string|null
     */
    public function getNeighborhood();

    /**
     * Set neighborhood
     * @param string $neighborhood
     * @return \Ianitsky\ViaCep\Api\Data\PostcodeInterface
     */
    public function setNeighborhood($neighborhood);

    /**
     * Get city
     * @return string|null
     */
    public function getCity();

    /**
     * Set city
     * @param string $city
     * @return \Ianitsky\ViaCep\Api\Data\PostcodeInterface
     */
    public function setCity($city);

    /**
     * Get state
     * @return string|null
     */
    public function getState();

    /**
     * Set state
     * @param string $state
     * @return \Ianitsky\ViaCep\Api\Data\PostcodeInterface
     */
    public function setState($state);

    /**
     * Get ibge
     * @return string|null
     */
    public function getIbge();

    /**
     * Set ibge
     * @param string $ibge
     * @return \Ianitsky\ViaCep\Api\Data\PostcodeInterface
     */
    public function setIbge($ibge);
}
