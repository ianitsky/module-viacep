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

use Ianitsky\ViaCep\Model\ResourceModel\Postcode\CollectionFactory as PostcodeCollectionFactory;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Ianitsky\ViaCep\Model\ResourceModel\Postcode as ResourcePostcode;
use Ianitsky\ViaCep\Api\Data\PostcodeSearchResultsInterfaceFactory;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Exception\NoSuchEntityException;
use Ianitsky\ViaCep\Api\PostcodeRepositoryInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Ianitsky\ViaCep\Api\Data\PostcodeInterfaceFactory;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Reflection\DataObjectProcessor;

class PostcodeRepository implements PostcodeRepositoryInterface
{

    protected $dataObjectProcessor;

    protected $postcodeCollectionFactory;

    protected $dataPostcodeFactory;

    private $storeManager;

    protected $extensibleDataObjectConverter;
    protected $dataObjectHelper;

    protected $postcodeFactory;

    protected $searchResultsFactory;

    protected $extensionAttributesJoinProcessor;

    protected $resource;

    private $collectionProcessor;


    /**
     * @param ResourcePostcode $resource
     * @param PostcodeFactory $postcodeFactory
     * @param PostcodeInterfaceFactory $dataPostcodeFactory
     * @param PostcodeCollectionFactory $postcodeCollectionFactory
     * @param PostcodeSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourcePostcode $resource,
        PostcodeFactory $postcodeFactory,
        PostcodeInterfaceFactory $dataPostcodeFactory,
        PostcodeCollectionFactory $postcodeCollectionFactory,
        PostcodeSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->postcodeFactory = $postcodeFactory;
        $this->postcodeCollectionFactory = $postcodeCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataPostcodeFactory = $dataPostcodeFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Ianitsky\ViaCep\Api\Data\PostcodeInterface $postcode
    ) {
        /* if (empty($postcode->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $postcode->setStoreId($storeId);
        } */
        
        $postcodeData = $this->extensibleDataObjectConverter->toNestedArray(
            $postcode,
            [],
            \Ianitsky\ViaCep\Api\Data\PostcodeInterface::class
        );
        
        $postcodeModel = $this->postcodeFactory->create()->setData($postcodeData);
        
        try {
            $this->resource->save($postcodeModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the postcode: %1',
                $exception->getMessage()
            ));
        }
        return $postcodeModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getById($postcodeId)
    {
        $postcode = $this->postcodeFactory->create();
        $this->resource->load($postcode, $postcodeId);
        if (!$postcode->getId()) {
            throw new NoSuchEntityException(__("Postcode with id '%1' does not exist.", $postcodeId));
        }
        return $postcode->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->postcodeCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Ianitsky\ViaCep\Api\Data\PostcodeInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Ianitsky\ViaCep\Api\Data\PostcodeInterface $postcode
    ) {
        try {
            $postcodeModel = $this->postcodeFactory->create();
            $this->resource->load($postcodeModel, $postcode->getPostcodeId());
            $this->resource->delete($postcodeModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Postcode: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($postcodeId)
    {
        return $this->delete($this->getById($postcodeId));
    }
}
