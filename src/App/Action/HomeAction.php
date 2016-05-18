<?php

namespace App\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Expressive\Router;
use Zend\Expressive\Template;

/**
 * Class HomeAction
 * @package App\Action
 */
class HomeAction
{
    /**
     * @var Router\RouterInterface
     */
    private $router;

    /**
     * @var Template\TemplateRendererInterface
     */
    protected $template;

    /**
     * HomeAction constructor.
     *
     * @param Router\RouterInterface $router
     * @param Template\TemplateRendererInterface|null $template
     */
    public function __construct(Router\RouterInterface $router, Template\TemplateRendererInterface $template = null)
    {
        $this->router = $router;
        $this->template = $template;
    }

    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param callable|null $next
     * 
     * @return ResponseInterface
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        if (!$this->template) {
            return new JsonResponse(['ack' => time()]);
        }

        return new HtmlResponse($this->template->render('app::home-page', ['ack' => time()]));
    }
}
