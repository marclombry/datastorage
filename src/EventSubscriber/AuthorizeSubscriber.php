<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\KernelEvents;

class AuthorizeSubscriber implements EventSubscriberInterface
{

    public function onKernelRequest(RequestEvent $event): void
    {
        $request = $event->getRequest();
        $secretQuery = $request->query->get('api_secret') ?? null;
        $tokenQuery = $request->query->get('api_token') ?? null;
        $passQuery = $request->query->get('api_pass') ?? null;
        $nameQuery = $request->query->get('api_name') ?? null;

        $apiSecret = $_ENV['API_SECRET'] ?? null;
        $apiToken = $_ENV['API_TOKEN'] ?? null;
        $apiPass = $_ENV['API_PASS'] ?? null;
        $apiName = $_ENV['API_NAME'] ?? null;

        $autorized = $secretQuery === $apiSecret && $tokenQuery === $apiToken
            && $passQuery === $apiPass && $nameQuery === $apiName;
        if(!$autorized)
        {
            throw new AccessDeniedHttpException('This action needs a valid token!');
        }
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => [
                ['onKernelRequest', 200]
            ]
        ];
    }
}
