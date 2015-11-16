<?php
namespace Forum\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Forum\Service\PageServiceInterface;
use Forum\Service\PageService;
use Zend\View\Model\ViewModel;

class PageController  extends AbstractActionController
{
    protected $pageService;
    
    public function __construct(PageService $pageService)
    {
        $this->pageService = $pageService;
    }
    
    public function indexAction()
    {
        return new ViewModel(array(
            'pages' => $this->pageService->getPages()
        ));
    }
    public function detailAction(){
        
    }
    public function addAction()
    {
        $request = $this->getRequest();
        
      
        if($request->isPost()&&isset($request->getPost()['editor1'])){
            print_r($request->getPost()['editor1']);
        }
    }

    public function addUpPicSerAction(){
        $path_for_route="data/user/postimg/";//由于在apache配置文件里设置到了public
        $path_for_frame="public/".$path_for_route;//实际存的时候存放的地址。

//         if (file_exists($path. $_FILES["upload"]["name"]))
//         {
//              echo $_FILES["upload"]["name"] . " already exists please choose another image.";
//         }
             move_uploaded_file($_FILES["upload"]["tmp_name"],
             $path_for_frame . $_FILES["upload"]["name"]);
             echo "Stored in: " . $path_for_frame . $_FILES["upload"]["name"];
             // Required: anonymous function reference number as explained above.
             $funcNum = $_GET['CKEditorFuncNum'] ;
             // Optional: instance name (might be used to load a specific configuration file or anything else).
             $CKEditor = $_GET['CKEditor'] ;
             // Optional: might be used to provide localized messages.
             $langCode = $_GET['langCode'] ;
             
             // Check the $_FILES array and save the file. Assign the correct path to a variable ($url).
             $url = $path_for_route . $_FILES["upload"]["name"];
             // Usually you will only assign something here if the file could not be uploaded.
             $message = '';
             echo "<script type='text/javascript'> window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
        
        $viewfordisable=new ViewModel();
        $viewfordisable->setTerminal(true); //disable layout
        return $viewfordisable;
    }
}