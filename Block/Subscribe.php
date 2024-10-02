<?php

namespace OH\Core\Block;

use Magento\Framework\View\Element\Template\Context;
use Magento\Newsletter\Block\Subscribe as BaseSubscribe;
use Magento\Framework\View\Element\ButtonLockManager;

/**
 * Workaround 2.4.7-p2 broke block added
 * via CMS directivy and an object cannot be added from there
 */
class Subscribe extends BaseSubscribe
{
    public function __construct(
        ButtonLockManager $buttonLockManager,
        Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->setData('button_lock_manager', $buttonLockManager);
    }
}