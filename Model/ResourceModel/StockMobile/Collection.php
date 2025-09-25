<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace SArtaza\StockMobile\Model\ResourceModel\StockMobile;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'stockmobile_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \SArtaza\StockMobile\Model\StockMobile::class,
            \SArtaza\StockMobile\Model\ResourceModel\StockMobile::class
        );
    }
}

