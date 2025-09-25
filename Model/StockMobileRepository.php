<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace SArtaza\StockMobile\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use SArtaza\StockMobile\Api\Data\StockMobileInterface;
use SArtaza\StockMobile\Api\Data\StockMobileInterfaceFactory;
use SArtaza\StockMobile\Api\Data\StockMobileSearchResultsInterfaceFactory;
use SArtaza\StockMobile\Api\Data\StockMobileBulkSaveResponseInterface;
use SArtaza\StockMobile\Api\Data\StockMobileBulkSaveResponseInterfaceFactory;
use SArtaza\StockMobile\Api\StockMobileRepositoryInterface;
use SArtaza\StockMobile\Model\ResourceModel\StockMobile as ResourceStockMobile;
use SArtaza\StockMobile\Model\ResourceModel\StockMobile\CollectionFactory as StockMobileCollectionFactory;

class StockMobileRepository implements StockMobileRepositoryInterface
{

    /**
     * @var ResourceStockMobile
     */
    protected $resource;

    /**
     * @var StockMobile
     */
    protected $searchResultsFactory;

    /**
     * @var StockMobileCollectionFactory
     */
    protected $stockMobileCollectionFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var StockMobileInterfaceFactory
     */
    protected $stockMobileFactory;

    /**
     * @var StockMobileBulkSaveResponseInterfaceFactory
     */
    protected $bulkSaveResponseFactory;


    /**
     * @param ResourceStockMobile $resource
     * @param StockMobileInterfaceFactory $stockMobileFactory
     * @param StockMobileCollectionFactory $stockMobileCollectionFactory
     * @param StockMobileSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     * @param StockMobileBulkSaveResponseInterfaceFactory $bulkSaveResponseFactory
     */
    public function __construct(
        ResourceStockMobile $resource,
        StockMobileInterfaceFactory $stockMobileFactory,
        StockMobileCollectionFactory $stockMobileCollectionFactory,
        StockMobileSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor,
        StockMobileBulkSaveResponseInterfaceFactory $bulkSaveResponseFactory
    ) {
        $this->resource = $resource;
        $this->stockMobileFactory = $stockMobileFactory;
        $this->stockMobileCollectionFactory = $stockMobileCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->bulkSaveResponseFactory = $bulkSaveResponseFactory;
    }

    /**
     * @inheritDoc
     */
    public function save(StockMobileInterface $stockMobile)
    {
        try {
            $this->resource->save($stockMobile);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the stockMobile: %1',
                $exception->getMessage()
            ));
        }
        return $stockMobile;
    }

    /**
     * @inheritDoc
     */
    public function get($stockMobileId)
    {
        $stockMobile = $this->stockMobileFactory->create();
        $this->resource->load($stockMobile, $stockMobileId);
        if (!$stockMobile->getId()) {
            throw new NoSuchEntityException(__('StockMobile with id "%1" does not exist.', $stockMobileId));
        }
        return $stockMobile;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->stockMobileCollectionFactory->create();
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model;
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @inheritDoc
     */
    public function delete(StockMobileInterface $stockMobile)
    {
        try {
            $stockMobileModel = $this->stockMobileFactory->create();
            $this->resource->load($stockMobileModel, $stockMobile->getStockmobileId());
            $this->resource->delete($stockMobileModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the StockMobile: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($stockMobileId)
    {
        return $this->delete($this->get($stockMobileId));
    }

    /**
     * @inheritDoc
     */
    public function bulkSave(\SArtaza\StockMobile\Api\Data\StockMobileBulkSaveRequestInterface $bulkSaveRequest)
    {
        $items = $bulkSaveRequest->getItems();
        $savedItems = [];
        $errors = [];

        foreach ($items as $index => $itemData) {
            try {
                // Create StockMobile object from data
                $stockMobile = $this->stockMobileFactory->create();
                
                // Set data from the item
                if (isset($itemData['stockmobile_id']) && !empty($itemData['stockmobile_id'])) {
                    $stockMobile->setStockmobileId($itemData['stockmobile_id']);
                }
                if (isset($itemData['source'])) {
                    $stockMobile->setSource($itemData['source']);
                } elseif (isset($itemData['Source'])) {
                    $stockMobile->setSource($itemData['Source']);
                }
                if (isset($itemData['bar_code'])) {
                    $stockMobile->setBarCode($itemData['bar_code']);
                } elseif (isset($itemData['BarCode'])) {
                    $stockMobile->setBarCode($itemData['BarCode']);
                }
                if (isset($itemData['qty'])) {
                    $stockMobile->setQty($itemData['qty']);
                } elseif (isset($itemData['Qty'])) {
                    $stockMobile->setQty($itemData['Qty']);
                }
                if (isset($itemData['date'])) {
                    $stockMobile->setDate($itemData['date']);
                } elseif (isset($itemData['Date'])) {
                    $stockMobile->setDate($itemData['Date']);
                }
                if (isset($itemData['name_token'])) {
                    $stockMobile->setNameToken($itemData['name_token']);
                }

                // Save the item
                $savedStockMobile = $this->save($stockMobile);
                $savedItems[] = (object)[
                    'index' => $index,
                    'data' => (object)[
                        'stockmobile_id' => $savedStockMobile->getStockmobileId(),
                        'Source' => $savedStockMobile->getSource(),
                        'BarCode' => $savedStockMobile->getBarCode(),
                        'Qty' => $savedStockMobile->getQty(),
                        'Date' => $savedStockMobile->getDate(),
                        'name_token' => $savedStockMobile->getNameToken()
                    ]
                ];
            } catch (\Exception $exception) {
                $errors[] = (object)[
                    'index' => $index,
                    'error' => $exception->getMessage()
                ];
            }
        }

        $response = $this->bulkSaveResponseFactory->create();
        
        // Solo incluir errors si hay errores
        if (!empty($errors)) {
            $response->setErrors($errors);
        }
        
        $response->setTotalProcessed(count($items));
        $response->setSuccessful(count($savedItems));
        $response->setFailed(count($errors));
        
        return $response;
    }
}

