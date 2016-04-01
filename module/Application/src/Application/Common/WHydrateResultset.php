<?php
namespace Application\Common;
use Zend\Db\ResultSet\HydratingResultSet;
use ArrayObject;
use Zend\Stdlib\Hydrator\ArraySerializable;
use Zend\Stdlib\Hydrator\HydratorInterface;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/*
 * 针对多表连接的类，需要保证传入的arr是一个arrayobject数组
 * 要保证传入的classmethod hydrate在工厂里面已经加入了相应的filter，比如getUser的filter
 * 采用的算法是依次检查传入sql的select列表里面的属性是否与各个model名字相同，
 * 并以prototypeOri为主类，arr里面的类为其成员对象，返回主类对象。
 */
class WHydrateResultset extends HydratingResultSet
{
    /**
     * @var \ArrayObject;
     */
    protected $objectPrototypeArr = null;
    protected $objectPrototypeOri =null;
    /**
     * 
     */
    public function __construct(HydratorInterface $hydrator = null, $objectPrototypeOri=null,$objectPrototypeArr = null)
    {
        $this->setHydrator(($hydrator) ?: new ArraySerializable);
        $this->objectPrototypeOri=$objectPrototypeOri;
        $this->setObjectPrototype(($objectPrototypeArr) ?: new ArrayObject);
        if(is_array($objectPrototypeArr)){
            foreach ($objectPrototypeArr as $objectPrototype) {
                $this->setObjectPrototype($objectPrototype);
            }
            return ;
        }

    }
    
    public function setObjectPrototype($objectPrototypeArr)
    {
        if(!$objectPrototypeArr instanceof ArrayObject){
            throw new InvalidArgumentException('An ArrayObject should be provided');
        }
//         if (!is_object($objectPrototype)) {
//             throw new \InvalidArgumentException(
//                 'An object must be set as the object prototype, a ' . gettype($objectPrototype) . ' was provided.'
//             );
//         }
        $this->objectPrototypeArr=$objectPrototypeArr;
        return $this;
    }
    
    public function current()
    {
        if ($this->buffer === null) {
            $this->buffer = -2; // implicitly disable buffering from here on
        } elseif (is_array($this->buffer) && isset($this->buffer[$this->position])) {
            return $this->buffer[$this->position];
        }
        $data = $this->dataSource->current();
        $object = is_array($data) ? $this->hydrator->hydrate($data, clone $this->objectPrototypeOri) : false;
        foreach ($this->objectPrototypeArr as $objectPrototype){
            $name=get_class($objectPrototype);     
            $ar=explode('\\', $name);
            $len=count($ar);
            $name=$ar[$len-1];
            $setAtrStr="set".$name;
                
            $objecttmp = is_array($data) ? $this->hydrator->hydrate($data, clone $objectPrototype) : false;
//             $object->$name=$objecttmp;

            if(!method_exists($object,$setAtrStr)){
                throw new \Exception('wyj The'.$setAtrStr.' method is not defined!');
            }
            $object->{$setAtrStr}($objecttmp);//调用对象的一个方法
        }
//         $object = is_array($data) ? $this->hydrator->hydrate($data, clone $this->objectPrototype) : false;
    
        if (is_array($this->buffer)) {
            $this->buffer[$this->position] = $object;
        }
    
        return $object;
    }
}

?>