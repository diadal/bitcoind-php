<?php
/**
 * @author Joshua Estes
 * @copyright 2012-2015 Joshua Estes
 * @license https://github.com/diadal/bitcoind-php/blob/2.x/LICENSE MIT
 */

namespace Diadal\Http\Message;

use Laminas\Diactoros\Uri as DiactorosUri;

/**
 * @since 2.0.0
 *
 * @deprecated - please use a separate PSR-7 URI implementation
 */
class Uri extends DiactorosUri
{
}
