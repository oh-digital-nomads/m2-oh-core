<?php
declare(strict_types=1);

namespace OH\Core\Model;

use Magento\Framework\App\ProductMetadataInterface;

/**
 * Core Product edition resolver
 */
class EditionResolver
{
    /**
     * @var ProductMetadataInterface
     */
    private ProductMetadataInterface $productMetadata;

    public function __construct(
        ProductMetadataInterface $productMetadata
    ) {
        $this->productMetadata = $productMetadata;
    }

    /**
     * Retrieve if current edition is enterprise
     *
     * @return bool
     */
    public function isEnterprise(): bool
    {
        return $this->productMetadata->getEdition() != \Magento\Framework\App\ProductMetadata::EDITION_NAME;
    }

    /**
     * Retrieve edition name
     *
     * @return string
     */
    public function getEditionName(): string
    {
        return $this->productMetadata->getName();
    }
}