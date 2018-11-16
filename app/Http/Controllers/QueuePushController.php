<?php
/**
 * Created by PhpStorm.
 * User: peter
 * Date: 16.11.18
 * Time: 12:18
 */

namespace App\Http\Controllers;


class QueuePushController extends Controller
{
    public function push($message)
    {
        $connection = new \AMQPConnection(['localhost', 5672, 'guest', 'guest']);

        $connection->

        /** @var $channel AMQPChannel */
        $channel = $connection->channel();

        $channel->queue_declare(
            'pizzaTime',	#queue name - Имя очереди может содержать до 255 байт UTF-8 символов
            false,      	#passive - может использоваться для проверки того, инициирован ли обмен, без того, чтобы изменять состояние сервера
            false,      	#durable - убедимся, что RabbitMQ никогда не потеряет очередь при падении - очередь переживёт перезагрузку брокера
            false,      	#exclusive - используется только одним соединением, и очередь будет удалена при закрытии соединения
            false       	#autodelete - очередь удаляется, когда отписывается последний подписчик
        );

        $msg = new AMQPMessage($message);

        $channel->basic_publish(
            $msg,       	#message
            '',         	#exchange
            'pizzaTime' 	#routing key
        );

        $channel->close();
        $connection->close();
    }

}