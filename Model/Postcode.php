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

namespace Ianitsky\ViaCep\Model;

use Ianitsky\ViaCep\Api\Data\PostcodeInterface;
use Ianitsky\ViaCep\Api\Data\PostcodeInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;

class Postcode extends \Magento\Framework\Model\AbstractModel
{

    protected $_eventPrefix = 'ianitsky_viacep_postcode';
    protected $postcodeDataFactory;

    protected $dataObjectHelper;


    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param PostcodeInterfaceFactory $postcodeDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Ianitsky\ViaCep\Model\ResourceModel\Postcode $resource
     * @param \Ianitsky\ViaCep\Model\ResourceModel\Postcode\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        PostcodeInterfaceFactory $postcodeDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Ianitsky\ViaCep\Model\ResourceModel\Postcode $resource,
        \Ianitsky\ViaCep\Model\ResourceModel\Postcode\Collection $resourceCollection,
        array $data = []
    ) {
        $this->postcodeDataFactory = $postcodeDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve postcode model with postcode data
     * @return PostcodeInterface
     */
    public function getDataModel()
    {
        $postcodeData = $this->getData();
        
        $postcodeDataObject = $this->postcodeDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $postcodeDataObject,
            $postcodeData,
            PostcodeInterface::class
        );
        
        return $postcodeDataObject;
    }
}
