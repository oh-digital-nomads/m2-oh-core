<?php
declare(strict_types=1);

namespace OH\Core\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\Url;
use Magento\Framework\UrlInterface;

class Generic extends AbstractHelper
{
    /**
     * Url Builder
     *
     * @var UrlInterface
     */
    private $frontendUrlBuilder;

    public function __construct(
        Url $frontendUrlBuilder,
        Context $context
    ) {
        parent::__construct($context);
        $this->frontendUrlBuilder = $frontendUrlBuilder;
    }

    /**
     * Get frontend url,
     *
     * This is workaround for urlBuilder that have a preference and all urls are generated for the admin side
     *
     * @param string $routePath
     * @param null $scope
     * @param null $store
     * @param null $params
     * @return string
     */
    public function getFrontendUrl($routePath, $scope = null, $store = null, $params = null): string
    {
        if ($scope) {
            $this->frontendUrlBuilder->setScope($scope);
            $paramsOrg = [
                '_current' => false,
                '_nosid' => true,
                '_query' => [\Magento\Store\Model\StoreManagerInterface::PARAM_NAME => $store]
            ];

            $href = $this->frontendUrlBuilder->getUrl(
                $routePath,
                $params ? array_merge($params, $paramsOrg) : $paramsOrg
            );
        } else {
            $paramsOrg = [
                '_current' => false,
                '_nosid' => true
            ];

            $href = $this->frontendUrlBuilder->getUrl(
                $routePath,
                $params ? array_merge($params, $paramsOrg) : $paramsOrg
            );
        }

        return $href;
    }
}
