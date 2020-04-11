<?php
/**
 * @author Joshua Estes
 * @copyright 2012-2015 Joshua Estes
 * @license https://github.com/diadal/bitcoind-php/blob/2.x/LICENSE MIT
 */

namespace Diadal\Http\Message;

use Laminas\Diactoros\Request as DiactorosRequest;

/**
 * @since 2.0.0
 *
 * @deprecated - please use a separate PSR-7 request implementation
 */
class Request extends DiactorosRequest
{
    /**
     * HTTP Methods
     *
     * @var string
     *
     * @deprecated - constant was kept just for BC compliance
     */
    const HTTP_POST = 'POST';
}
