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

class ConsultManagement implements \Ianitsky\ViaCep\Api\ConsultManagementInterface
{
    /**
     * @var PostcodeFactory
     */
    protected $postcodeFactory;

    /**
     * @var ResourceModel\Postcode
     */
    protected $postcodeResourceModel;

    /**
     * @var ViaCep
     */
    protected $viaCep;

    /**
     * ConsultManagement constructor.
     * @param PostcodeFactory $postcodeFactory
     * @param ResourceModel\Postcode $postcodeResourceModel
     * @param ViaCep $viaCep
     */
    public function __construct(
        PostcodeFactory $postcodeFactory,
        ResourceModel\Postcode $postcodeResourceModel,
        ViaCep $viaCep
    ) {
        $this->postcodeFactory = $postcodeFactory;
        $this->postcodeResourceModel = $postcodeResourceModel;
        $this->viaCep = $viaCep;
    }

    /**
     * {@inheritdoc}
     */
    public function getAddress($postcode)
    {
        $postcode = preg_replace('/\D/', '', $postcode);

        /**
         * @var Postcode
         */
        $postcodeModel = $this->postcodeFactory->create();
        $this->postcodeResourceModel->load($postcodeModel, $postcode, 'postcode');

        if ($postcodeModel->getId()) {
            return $postcodeModel;
        }

        /**
         * If code is not loaded, try to search in the viacep and save in the database
         */

        $postcodeModel = $this->viaCep->find($postcode);

        return $postcodeModel;
    }
}
