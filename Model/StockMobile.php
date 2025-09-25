<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace SArtaza\StockMobile\Model;

use Magento\Framework\Model\AbstractModel;
use SArtaza\StockMobile\Api\Data\StockMobileInterface;

class StockMobile extends AbstractModel implements StockMobileInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\SArtaza\StockMobile\Model\ResourceModel\StockMobile::class);
    }

    /**
     * @inheritDoc
     */
    public function getStockmobileId()
    {
        return $this->getData(self::STOCKMOBILE_ID);
    }

    /**
     * @inheritDoc
     */
    public function setStockmobileId($stockmobileId)
    {
        return $this->setData(self::STOCKMOBILE_ID, $stockmobileId);
    }

    /**
     * @inheritDoc
     */
    public function getSource()
    {
        return $this->getData(self::SOURCE);
    }

    /**
     * @inheritDoc
     */
    public function setSource($source)
    {
        return $this->setData(self::SOURCE, $source);
    }

    /**
     * @inheritDoc
     */
    public function getBarCode()
    {
        return $this->getData(self::BARCODE);
    }

    /**
     * @inheritDoc
     */
    public function setBarCode($barCode)
    {
        return $this->setData(self::BARCODE, $barCode);
    }

    /**
     * @inheritDoc
     */
    public function getQty()
    {
        return $this->getData(self::QTY);
    }

    /**
     * @inheritDoc
     */
    public function setQty($qty)
    {
        return $this->setData(self::QTY, $qty);
    }

    /**
     * @inheritDoc
     */
    public function getDate()
    {
        return $this->getData(self::DATE);
    }

    /**
     * @inheritDoc
     */
    public function setDate($date)
    {
        return $this->setData(self::DATE, $date);
    }

    /**
     * @inheritDoc
     */
    public function getNameToken()
    {
        return $this->getData(self::NAME_TOKEN);
    }

    /**
     * @inheritDoc
     */
    public function setNameToken($nameToken)
    {
        return $this->setData(self::NAME_TOKEN, $nameToken);
    }
}

