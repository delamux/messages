<?php
namespace CakeMojo\Messages\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

/**
 * MessagesBehavior behavior
 */
class MessagesBehavior extends Behavior
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [

    ];

    /**
     * This Function create a message from one model
     *
     * @param $id
     * @param $data
     *
     * @return void
     */
    public function addMessage($id, array $data)
    {
        $messagesTable = TableRegistry::get('Messages');
        $message = $messagesTable->newEntity();
        $message->foreign_key = $id;
        $message->subject = $data['subject'];
        $message->body = $data['body'];

        $messagesTable->save($message);
    }
}
