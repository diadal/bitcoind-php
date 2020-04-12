<?php
/**
 * @author Diadal Nigeria Ltd
 * @copyright 2020 Diadal Nigeria Ltd
 * @license https://github.com/diadal/bitcoind-php/blob/2.x/LICENSE MIT
 */

namespace Diadal\Http;

use Diadal\Command\CommandInterface;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

/**
 * @since 2.0.0
 */
class Client implements ClientInterface
{
    
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    protected $response;

    /**
     * @var \Diadal\Http\Driver\DriverInterface
     */
    // protected $driver;

    /**
     * Creates a new Client object
     *
     * Currently you MUST pass in a DSN so the client knows where to send
     * commands to.
     *
     * ```php
     * $client = new \Diadal\Http\Client('https://username:password@localhost:18332');
     * ```
     *
     * @since 2.0.0
     * @param string $dsn Data Source Name
     *
     * @throws \InvalidArgumentException
     */
    public function __construct()
    {
        
    }

    /**
     * @since 2.0.0
     * {@inheritdoc}
     */
    public function sendCommand(CommandInterface $command)
    {        


      $data =  collect([['bitcoin-cli'], [$command->getMethod()] , $command->getParameters()]);
      $collapsed = $data->collapse();

       $data = $collapsed->all();

        $process = new Process($data);

        $process->run();
           if (!$process->isSuccessful()) {
              $this->response = 445;
              return $this->response;
          }
        
        /** @var \Psr\Http\Message\ResponseInterface */
        $this->response = $process->getOutput();

        return $this->response;
    }

    /**
     * Returns the current Response object
     *
     * @since 2.0.0
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function getResponse()
    {
        return $this->response;
    }
}
