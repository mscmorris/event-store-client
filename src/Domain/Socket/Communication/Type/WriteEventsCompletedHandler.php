<?php

namespace EventStore\Client\Domain\Socket\Communication\Type;

use EventStore\Client\Domain\Socket\Communication\Communicable;
use EventStore\Client\Domain\Socket\Message\MessageType;
use EventStore\Client\Domain\Socket\Message\SocketMessage;
use EventStore\Client\Domain\Socket\Data;

/**
 * Class WriteEventsCompleted
 * @package EventStore\Client\Domain\Socket\Communication\Type
 * @author  Dariusz Gafka <d.gafka@madkom.pl>
 */
class WriteEventsCompletedHandler implements Communicable
{

    /**
     * @inheritDoc
     */
    public function handle(MessageType $messageType, $correlationID, $data)
    {
        $dataObject = new Data\WriteEventsCompleted();
        $dataObject->parseFromString($data);
        $dataObject->dump();

        return new SocketMessage($messageType, $correlationID, $dataObject);
    }

}