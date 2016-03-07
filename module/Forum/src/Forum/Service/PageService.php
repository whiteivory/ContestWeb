<?php
// Filename: /module/Forum/src/Blog/Service/PostService.php
namespace Forum\Service;
use Forum\Mapper\ZendDbSqlMapper;
use Forum\Model\Page;
use Zend\Filter\File\Rename;
use Zend\Filter\BaseName;
use Application\Common\WBasePath;
use Application\Common\WAuthUtil;
use Zend\Debug\Debug;

class PageService
{
    protected $pageMapper;
    public function __construct(ZendDbSqlMapper $pageMapper)
    {
        $this->pageMapper = $pageMapper;
    }
    /**
     * {@inheritDoc}
     */
    
    /*
     * 如过注册了，则schID=session中的schoolID
     * 如过没注册，那么为0，数据库中不存在为0的schoolID，进一步交给mapper处理
     */
    public function getPages($secID,$ptype)
    {
        // TODO: Implement findAllPosts() method.
        if(isset(WAuthUtil::get_auth()->schoolID))
            $schID=WAuthUtil::get_auth()->schoolID;
        else $schID=0;
        return $this->pageMapper->findAll($secID,$ptype,$schID);
    }

    /**
     * {@inheritDoc}
     */
    public function getPage($id)
    {
        // TODO: Implement findPost() method.
        return $this->pageMapper->find($id);
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
    public function savePage(Page $page,$file)
    {
        //获取时间
        $page->setPtime(date('y-m-d h:i:s',time()));
        //设置默认值
        $page->setPclicknum(0);
        $page->setPreplynum(0);
        $page->setPzannum(0);
        
        $filetmpstr=$file['filepath']['tmp_name'];
        $filedir=$page->getPageID();
        $tmpuppcontentpath='public/tmpuppcontent.txt';
        $handle=fopen($tmpuppcontentpath,"w");
        $note=$page->getPcontent();
        if(fwrite($handle,$note)==false)
        {
            echo"写入文件失败";
        }
        if(!fclose($handle)){
            echo"failed in close";
        }
        //重命名pcontent文件，之所以存进txt为了倒排。
        $filter = new \Zend\Filter\File\Rename(array(
            "target"    => "public/data/post/".$filedir."/pcontent.txt",
            "randomize" => true,
        ));
        $filter->filter($tmpuppcontentpath);
        //重命名上传文件
        $suffilter = new BaseName();
        $suffixname = $suffilter->filter($file['filepath']['name']);
        $basepath=WBasePath::getBasePath();//public
        $filter = new \Zend\Filter\File\Rename(array(
            "target"    => $basepath.'/'."data/post/".$filedir."/".$suffixname,
            "randomize" => true,
        ));

        $filepath=$filter->filter($filetmpstr);
        $filepath=substr($filepath, strlen($basepath));
        $page->setFilepath($filepath);
//         print_r($page);
//         Debug::dump($page);
//         数据库处理
        $this->pageMapper->save($page);
        
    }
    public function getNewPageID(){
        return $this->pageMapper->getNewPageID();//10001
    }
    public function getNewPageIDandMakedir(){
        $ID=$this->getNewPageID();
        $base=WBasePath::getBasePath();//public
            $dirpath=$base.'/data/post/'.$ID;
        if(!file_exists($dirpath))
            mkdir($dirpath);
        return $ID;
    }
}