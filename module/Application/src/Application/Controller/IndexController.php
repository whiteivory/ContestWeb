<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Common\WAuthUtil;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $auth=WAuthUtil::get_auth();
        WAuthUtil::addUserpanelToLayout($this, '/');
        return new ViewModel();
    }
}
