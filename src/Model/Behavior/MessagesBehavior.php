<?php
namespace CakeMojo\Messages\Model\Behavior\CakeMojo;

use Cake\Datasource\RepositoryInterface;
use Cake\ORM\Behavior;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

/**
 * MessagesBehavior behavior
 */
class CakeMojo/MessagesBehavior extends Behavior
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
     * @param $id get Id to create a foreign key in Messages Behavior
     * @param $data[] Array to create fields in Messages Behavior
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
        $message->model = empty($data['model']) ? RepositoryInterface::alias();

        $messagesTable->save($message);
    }
}
