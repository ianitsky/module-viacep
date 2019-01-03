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

class ViaCep
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
     * @var \Magento\Directory\Model\ResourceModel\Region\CollectionFactory
     */
    protected $regionCollectionFactory;

    /**
     * @var \GuzzleHttp\ClientInterface
     */
    protected $httpClient;

    /**
     * ViaCep constructor.
     * @param PostcodeFactory $postcodeFactory
     * @param ResourceModel\Postcode $postcodeResourceModel
     * @param \GuzzleHttp\ClientInterface $httpClient
     */
    public function __construct(
        PostcodeFactory $postcodeFactory,
        ResourceModel\Postcode $postcodeResourceModel,
        \Magento\Directory\Model\ResourceModel\Region\CollectionFactory $regionCollectionFactory,
        \GuzzleHttp\ClientInterface $httpClient
    ) {
        $this->postcodeFactory = $postcodeFactory;
        $this->postcodeResourceModel = $postcodeResourceModel;
        $this->regionCollectionFactory = $regionCollectionFactory;
        $this->httpClient = $httpClient;
    }

    /**
     * @param $postcode
     * @return Postcode
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function find($postcode)
    {
        $response = $this->httpClient->request('GET', 'https://viacep.com.br/ws/'.$postcode.'/json/unicode');
        $data = json_decode($response->getBody(), true);
        if (array_key_exists('erro', $data) && $data['erro'] === true) {
            throw new \Magento\Framework\Exception\NotFoundException(__('Postcode not found'));
        }

        /**
         * @var \Magento\Directory\Model\Region
         */
        $regionModel = $this->regionCollectionFactory->create()
            ->addFieldToFilter('country_id', 'BR')
            ->addFieldToFilter('code', $data['uf'])
            ->getFirstItem();

        /**
         * @var Postcode
         */
        $postcodeModel = $this->postcodeFactory->create()
            ->setPostcode(preg_replace('/\D/', '', $data['cep']))
            ->setStreet($data['logradouro'])
            ->setComplement($data['complemento'])
            ->setNeighborhood($data['bairro'])
            ->setCity($data['localidade'])
            ->setRegion($data['uf'])
            ->setRegionId($regionModel->getId())
            ->setIbge($data['ibge']);

        $this->postcodeResourceModel->save($postcodeModel);

        return $postcodeModel;
    }
}