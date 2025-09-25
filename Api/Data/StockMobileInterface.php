<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace SArtaza\StockMobile\Api\Data;

interface StockMobileInterface
{

    const DATE = 'date';
    const NAME_TOKEN = 'name_token';
    const SOURCE = 'source';
    const BARCODE = 'bar_code';
    const STOCKMOBILE_ID = 'stockmobile_id';
    const QTY = 'qty';

    /**
     * Get stockmobile_id
     * @return string|null
     */
    public function getStockmobileId();

    /**
     * Set stockmobile_id
     * @param string $stockmobileId
     * @return \SArtaza\StockMobile\StockMobile\Api\Data\StockMobileInterface
     */
    public function setStockmobileId($stockmobileId);

    /**
     * Get Source
     * @return string|null
     */
    public function getSource();

    /**
     * Set Source
     * @param string $source
     * @return \SArtaza\StockMobile\StockMobile\Api\Data\StockMobileInterface
     */
    public function setSource($source);

    /**
     * Get BarCode
     * @return string|null
     */
    public function getBarCode();

    /**
     * Set BarCode
     * @param string $barCode
     * @return \SArtaza\StockMobile\StockMobile\Api\Data\StockMobileInterface
     */
    public function setBarCode($barCode);

    /**
     * Get Qty
     * @return string|null
     */
    public function getQty();

    /**
     * Set Qty
     * @param string $qty
     * @return \SArtaza\StockMobile\StockMobile\Api\Data\StockMobileInterface
     */
    public function setQty($qty);

    /**
     * Get Date
     * @return string|null
     */
    public function getDate();

    /**
     * Set Date
     * @param string $date
     * @return \SArtaza\StockMobile\StockMobile\Api\Data\StockMobileInterface
     */
    public function setDate($date);

    /**
     * Get name_token
     * @return string|null
     */
    public function getNameToken();

    /**
     * Set name_token
     * @param string $nameToken
     * @return \SArtaza\StockMobile\StockMobile\Api\Data\StockMobileInterface
     */
    public function setNameToken($nameToken);
}

