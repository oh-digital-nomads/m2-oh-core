<?php

declare(strict_types=1);

namespace OH\Core\Controller\Adminhtml\Docs;

use Magento\Backend\App\Action;

class Index extends Action
{
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setUrl($this->getDocsUrl());
        return $resultRedirect;
    }

    private function getDocsUrl()
    {
        return 'https://mars-docs.ohecommerce.agency/';
    }
}