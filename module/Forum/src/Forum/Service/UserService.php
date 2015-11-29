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
use Zend\Db\Sql\Update;
use Zend\Db\Sql\Sql;
use Zend\Db\Adapter\Driver\ResultInterface;
 use Zend\Stdlib\Hydrator\HydratorInterface;
class UserService
{
    /**
     * @var Adapter
     *
     */
    protected  $dbAdapter;
    protected $hydrator;
    public function __construct(AdapterInterface $dbAdapter,         HydratorInterface $hydrator)
    {
         $this->dbAdapter = $dbAdapter;
         $this->hydrator=$hydrator;
    }
    
    /*用户注册获取注册ID并存入数据库的过程
     * 最原始的数据库操作方式
     * 
     */
    /**
     * 
     * @param string $userID
     * @return User
     */
    public function updateUser(User $userObject){
        $postData = $this->hydrator->extract($userObject);
         $action = new Update('user');
         $action->set($postData);
         $action->where(array('userID = ?' => $userObject->getUserID()));
        $sql    = new Sql($this->dbAdapter);
        $stmt   = $sql->prepareStatementForSqlObject($action);
        $result = $stmt->execute();
         
        if ($result instanceof ResultInterface) {
//             if ($newId = $result->getGeneratedValue()) {
//                 // When a value has been generated, set it on the object
//                 $postObject->setId($newId);
//             }
            return true;
        }
    }
    public function getUser($userID){
        $sql="select * from user where userID=$userID";
        $statement=$this->dbAdapter->query($sql);
        $result=$statement->execute();
        $userObject=new User();
        $userObject->exchangeArray($result->current());
        return $userObject;
    }
    public function save(User $user){
        //select
        $sql1='select max(userID) from user';
        $statement=$this->dbAdapter->query($sql1);
        $result=$statement->execute();
        $row=$result->current();
//         Debug::dump($row  );
        $user->setUserID($row['max(userID)']+1);
        //insert
        $defaultfaceimgpath='/data/face/defaultfaceimg.png';
        $sql='insert into user(userID,username,upassword,schoolID,faceimgpath) values('.$user->getUserID().',"'.$user->getUsername().'","'.$user->getUpassword().'","'.$user->getSchoolID().'","'. $defaultfaceimgpath.'")' ;
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