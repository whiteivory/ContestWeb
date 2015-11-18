<?php
// Filename: /module/Forum/src/Blog/Service/PostService.php
namespace Forum\Service;
use Forum\Mapper\ZendDbSqlMapper;
use Forum\Model\Page;
use Zend\Filter\File\Rename;
use Zend\Filter\BaseName;
use Application\Common\WBasePath;

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
    public function getPages()
    {
        // TODO: Implement findAllPosts() method.
        return $this->pageMapper->findAll();
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
        $filetmpstr=$file['filepath']['tmp_name'];
        
        $filedir=$page->getPageID();//待更改
        $tmpuppcontentpath='public/tmpuppcontent.txt';
        //写入文件
//         $tmp_src="up/tmptxt.txt";
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
        $filter = new \Zend\Filter\File\Rename(array(
            "target"    => "public/data/post/".$filedir."/".$suffixname,
            "randomize" => true,
        ));

        $filepath=$filter->filter($filetmpstr);
        $page->setFilepath($filepath);
        
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