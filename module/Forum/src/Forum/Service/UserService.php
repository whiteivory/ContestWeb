<?php
// Filename: /module/Forum/src/Forum/Service/PostService.php
namespace Forum\Service;

use Zend\Db\Adapter\Adapter;
use Forum\Model\User;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Debug\Debug;

use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Adapter\DbTable ;

class UserService
{
    /**
     * @var Adapter
     *
     */
    protected  $dbAdapter;
    public function __construct(AdapterInterface $dbAdapter)
    {
         $this->dbAdapter = $dbAdapter;
    }
    
    /*用户注册获取注册ID并存入数据库的过程
     * 最原始的数据库操作方式
     * 
     */
    public function save(User $user){
        //select
        $sql1='select max(userID) from user';
        $statement=$this->dbAdapter->query($sql1);
        $result=$statement->execute();
        $row=$result->current();
//         Debug::dump($row  );
        $user->setUserID($row['max(userID)']+1);
        //insert
        $sql='insert into user(userID,username,upassword,schoolID) values('.$user->getUserID().',"'.$user->getUsername().'","'.$user->getUpassword().'","'.$user->getSchoolID().'")' ;
//         echo $sql;
        $this->dbAdapter->query($sql, Adapter::QUERY_MODE_EXECUTE);
    }
    //用户认证，并用session存储
    public function auth(User $user){
        $auth = new AuthenticationService();
        $authAdapter = new DbTable($this->dbAdapter);
        $authAdapter
        ->setTableName('user')
        ->setIdentityColumn('username')
        ->setCredentialColumn('upassword')
        ;
        $authAdapter
        ->setIdentity($user->getUsername())
        ->setCredential($user->getUpassword())
        ;
        $result = $auth->authenticate($authAdapter);
        if($result->isValid()){
            $storage=$auth->getStorage();
            $storage->write($authAdapter->getResultRowObject(array(
                'userID',
        'username',
        'schoolID',
            )));
            return true;
        }
        else {
            print_r($result->getMessages());
        }
    }
}