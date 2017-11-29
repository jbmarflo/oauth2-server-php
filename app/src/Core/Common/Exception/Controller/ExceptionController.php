<?php

namespace Core\Common\Exception\Controller;

use Core\Common\Exception\ExceptionInterface;
use Symfony\Component\Debug\Exception\FlattenException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Log\DebugLoggerInterface;
use Symfony\Bundle\TwigBundle\Controller\ExceptionController as BaseExceptionController;

/**
 * Class ExceptionController
 *
 * @package Aptitus\Common\Symfony\Controller
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class ExceptionController extends BaseExceptionController
{
    public function showAction(
        Request $request,
        FlattenException $exception,
        DebugLoggerInterface $logger = null,
        $format = 'json'
    ) {

        $currentContent = $this->getAndCleanOutputBuffering($request->headers->get('X-Php-Ob-Level', -1));
        $showException = $request->attributes->get('showException', $this->debug);

        $code = $exception->getCode();
        $message = $exception->getMessage();

        $implementClasses = class_implements($exception->getClass());
        if (! in_array(ExceptionInterface::class, $implementClasses)) {
            $code = $exception->getStatusCode();
        }

        $data = [
            'code'    => $code,
            'message' => $message
        ];

        if ($showException && $this->debug) {
            $data['content'] = $currentContent;
        }

        return new JsonResponse(array_filter($data), $code);
    }
}
