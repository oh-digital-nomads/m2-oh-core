<?php

namespace OH\Core\Logger\Handler;

use Magento\Framework\Logger\Handler\Base;
use Monolog\Logger;

class OHLogger extends Base
{
    protected $fileName = '/var/log/oh/debug.log';
    protected $loggerType = Logger::DEBUG;
}