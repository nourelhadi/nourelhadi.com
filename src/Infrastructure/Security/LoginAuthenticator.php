<?php

namespace App\Infrastructure\Security;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Authenticator\Passport\PassportInterface;

class LoginAuthenticator extends AbstractAuthenticator
{
    public const LOGIN_ROUTE = 'app_login';

    public const SUCCESS_LOGIN_DASH = 'admin_dashboard';

    private UrlGeneratorInterface $urlGenerator;

    public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    public function supports(Request $request): ?bool
    {
        return (self::LOGIN_ROUTE === $request->attributes->get('_route') && $request->isMethod('POST'));
    }

    public function authenticate(Request $request): PassportInterface
    {
        $email = $request->request->get('email');
        $password = $request->request->get('password');
        $csrfToken = $request->request->get('_csrf_token');

        return new Passport(new UserBadge($email), new PasswordCredentials($password), [new CsrfTokenBadge('authenticate', $csrfToken)]);
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        return new RedirectResponse($this->urlGenerator->generate(self::SUCCESS_LOGIN_DASH));
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {
        return null;
    }

    public function createAuthenticatedToken(PassportInterface $passport, string $firewallName): TokenInterface
    {
        return parent::createAuthenticatedToken($passport, $firewallName);
    }

}
