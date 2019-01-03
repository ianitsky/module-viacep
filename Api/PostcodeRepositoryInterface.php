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

namespace Ianitsky\ViaCep\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface PostcodeRepositoryInterface
{

    /**
     * Save Postcode
     * @param \Ianitsky\ViaCep\Api\Data\PostcodeInterface $postcode
     * @return \Ianitsky\ViaCep\Api\Data\PostcodeInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Ianitsky\ViaCep\Api\Data\PostcodeInterface $postcode
    );

    /**
     * Retrieve Postcode
     * @param string $postcodeId
     * @return \Ianitsky\ViaCep\Api\Data\PostcodeInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($postcodeId);

    /**
     * Retrieve Postcode matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Ianitsky\ViaCep\Api\Data\PostcodeSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Postcode
     * @param \Ianitsky\ViaCep\Api\Data\PostcodeInterface $postcode
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Ianitsky\ViaCep\Api\Data\PostcodeInterface $postcode
    );

    /**
     * Delete Postcode by ID
     * @param string $postcodeId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($postcodeId);
}
