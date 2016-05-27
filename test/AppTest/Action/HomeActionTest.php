<?php

namespace AppTest\Action;
use App\Action\HomeAction;
use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequest;
use Zend\Expressive\Router\RouterInterface;

/**
 * Class HomeActionTest
 * @package AppTest\Action
 */
class HomeActionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var RouterInterface
     */
    protected $router;
    
    protected function setUp()
    {
        $this->router = $this->prophesize(RouterInterface::class);
    }
    
    public function testResponse()
    {
        $homePage = new HomeAction($this->router->reveal(), null);
        $response = $homePage(new ServerRequest(['/']), new Response(), function () {});
        
        $this->assertInstanceOf(Response::class, $response);
    }    
}
