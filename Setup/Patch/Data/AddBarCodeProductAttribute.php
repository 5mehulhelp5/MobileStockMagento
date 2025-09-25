<?php
declare(strict_types=1);

namespace SArtaza\StockMobile\Setup\Patch\Data;

use Magento\Catalog\Model\Product;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class AddBarCodeProductAttribute implements DataPatchInterface
{
    /** @var ModuleDataSetupInterface */
    private $moduleDataSetup;

    /** @var EavSetupFactory */
    private $eavSetupFactory;

    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        EavSetupFactory $eavSetupFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function apply()
    {
        $this->moduleDataSetup->getConnection()->startSetup();

        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);

        // Remove if exists to avoid duplicate errors (idempotent)
        if ($eavSetup->getAttributeId(Product::ENTITY, 'bar_code')) {
            $eavSetup->removeAttribute(Product::ENTITY, 'bar_code');
        }

        $eavSetup->addAttribute(
            Product::ENTITY,
            'bar_code',
            [
                'type' => 'varchar',
                'label' => 'Bar Code',
                'input' => 'text',
                'required' => false,
                'sort_order' => 210,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'user_defined' => true,
                'group' => 'General',
                'visible_on_front' => false,
                'is_html_allowed_on_front' => false,
                'used_in_product_listing' => true,
                'unique' => false,
                'backend' => '',
                'frontend' => '',
                'note' => 'External bar code (max 50 chars)',
                'validate_rules' => json_encode(['max_text_length' => 50]),
            ]
        );

        $this->moduleDataSetup->getConnection()->endSetup();
    }

    public static function getDependencies()
    {
        return [];
    }

    public function getAliases()
    {
        return [];
    }
}



