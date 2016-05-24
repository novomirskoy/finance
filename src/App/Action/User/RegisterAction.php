<?php

namespace App\Action\User;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template;

/**
 * Class RegisterAction
 * @package App\Action\User
 */
class RegisterAction
{
    /**
     * @var Template\TemplateRendererInterface
     */
    private $template;

    /**
     * RegisterAction constructor.
     * @param Template\TemplateRendererInterface $template
     */
    public function __construct(Template\TemplateRendererInterface $template)
    {
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
        return new HtmlResponse($this->template->render('app::user/register'));
    }
}
