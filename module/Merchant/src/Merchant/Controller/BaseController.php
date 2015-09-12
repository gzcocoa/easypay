<?php
namespace Merchant\Controller;

use Application\Controller\AclController;
use Zend\View\Model\ViewModel;


/**
 * BaseController
 *
 * @author
 *
 * @version
 *
 */
class BaseController extends AclController
{
    public $AclResourceName = __CLASS__;
    
    function __construct() {
        
        //@session_start();
        //$_SESSION['testMerchant'] = '1';
    }

    public function onDispatch(\Zend\Mvc\MvcEvent $e){
        
        $this->AclResourceName = __CLASS__;
        $this->AclPrivilegeName = $e->getRouteMatch()->getParam('action');
        
        return parent::onDispatch($e);
    }
    
    protected function setChildViews(ViewModel $view_page) {
    
        $view_menu = new ViewModel(array(
            'RouteName'=>$this->getEvent()->getRouteMatch()->getMatchedRouteName()
        ));
        $view_menu->setTemplate('merchant/common/menu');
        $view_page->addChild($view_menu,'menu');
    
        return $view_page;
    }

}