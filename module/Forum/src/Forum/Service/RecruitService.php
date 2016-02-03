<?php
namespace Forum\Service;
use Forum\Mapper\RecruitMapper;
use Forum\Model\Recruit;
use Zend\Filter\File\Rename;
use Zend\Filter\BaseName;
use Application\Common\WBasePath;
use Application\Common\WAuthUtil;
use Zend\Debug\Debug;

class RecruitService
{
    protected $recruitMapper;
    public function __construct(RecruitMapper $recruitMapper)
    {
        $this->recruitMapper = $recruitMapper;
    }
    /**
     * {@inheritDoc}
     */
    
    /*
     * 如过注册了，则schID=session中的schoolID
     * 如过没注册，那么为0，数据库中不存在为0的schoolID，所以不会反回结果
     */
    public function getRecruits($tag,$type)
    {
        // TODO: Implement findAllPosts() method.
        if(isset(WAuthUtil::get_auth()->schoolID))
            $schID=WAuthUtil::get_auth()->schoolID;
        else $schID=0;
        return $this->recruitMapper->findAll($schID,$tag,$type);
    }
    
    /**
     * {@inheritDoc}
     */
    public function getRecruit($id)
    {
        // TODO: Implement findPost() method.
        return $this->recruitMapper->find($id);
    }
    
    /*1、将文件写入txt文件，方便倒排
     * 路径为data\post\帖子id\content[乱码].txt
     * data\post\帖子id\file[乱码].txt
     *
     *2、$page对象添加刚更新的filepath，保存数据库
     *
     *
     *
     */
    public function saveRecruit(Recruit $recruit)
    {
        $filedir=$recruit->getRecruitID();
        $tmpuppcontentpath='public/tmpuprcontent.txt';
        $handle=fopen($tmpuppcontentpath,"w");
        $note=$recruit->getRcontent();
        if(fwrite($handle,$note)==false)
        {
            echo"写入文件失败";
        }
        if(!fclose($handle)){
            echo"failed in close";
        }
        //重命名pcontent文件，之所以存进txt为了倒排。
        $filter = new \Zend\Filter\File\Rename(array(
            "target"    => "public/data/recruit/".$filedir."/rcontent.txt",
            "randomize" => true,
        ));
        $filter->filter($tmpuppcontentpath);
    
        //         print_r($recruit);
        //         Debug::dump($recruit);
        //         数据库处理
        $this->recruitMapper->save($recruit);
    
    }
    public function getNewRecruitID(){
        return $this->recruitMapper->getNewRecruitID();//10001
    }
    public function getNewRecruitIDandMakedir(){
        $ID=$this->getNewRecruitID();
        $base=WBasePath::getBasePath();//public
        $dirpath=$base.'/data/recruit/'.$ID;
        if(!file_exists($dirpath))
            mkdir($dirpath);
        return $ID;
    }
}

?>