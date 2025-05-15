<?php

namespace Lexik\Bundle\JWTAuthenticationBundle\Tests\Security\Http\Authentication;

use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Events;
use Lexik\Bundle\JWTAuthenticationBundle\Security\Authentication\Token\JWTUserToken;
use Lexik\Bundle\JWTAuthenticationBundle\Security\Http\Authentication\AuthenticationSuccessHandler;
use Lexik\Bundle\JWTAuthenticationBundle\Security\Http\Cookie\JWTCookieProvider;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTManager;
use PHPUnit\Framework\TestCase;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\InMemoryUser;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * AuthenticationSuccessHandlerTest.
 *
 * @author Nicolas Cabot <n.cabot@lexik.fr>
 */
class AuthenticationSuccessHandlerTest extends TestCase
{
    /**
     * test onAuthenticationSuccess method.
     */
    public function testOnAuthenticationSuccess()
    {
        $request = $this->getRequest();
        $token = $this->getToken();

        $response = (new AuthenticationSuccessHandler($this->getJWTManager('secrettoken'), $this->getDispatcher()))
            ->onAuthenticationSuccess($request, $token);

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());

        $content = json_decode($response->getContent(), true);
        $this->assertArrayHasKey('token', $content);
        $this->assertEquals('secrettoken', $content['token']);
    }

    public function testHandleAuthenticationSuccess()
    {
        $response = (new AuthenticationSuccessHandler($this->getJWTManager('secrettoken'), $this->getDispatcher()))
            ->handleAuthenticationSuccess($this->getUser());

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());

        $content = json_decode($response->getContent(), true);
        $this->assertArrayHasKey('token', $content);
        $this->assertEquals('secrettoken', $content['token']);
    }

    public function testHandleAuthenticationSuccessWithGivenJWT()
    {
        $response = (new AuthenticationSuccessHandler($this->getJWTManager(), $this->getDispatcher()))
            ->handleAuthenticationSuccess($this->getUser(), 'jwt');

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());

        $content = json_decode($response->getContent(), true);
        $this->assertArrayHasKey('token', $content);
        $this->assertEquals('jwt', $content['token']);
    }

    public function testOnAuthenticationSuccessSetCookie()
    {
        $request = $this->getRequest();
        $token = $this->getToken();

        $cookieProvider = new JWTCookieProvider('access_token', 60);

        $response = (new AuthenticationSuccessHandler($this->getJWTManager('testheader.testpayload.testsignature'), $this->getDispatcher(), [$cookieProvider]))
            ->onAuthenticationSuccess($request, $token);

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertSame(Response::HTTP_NO_CONTENT, $response->getStatusCode(), $response->getContent());
        $this->assertEmpty(json_decode($response->getContent(), true));

        $cookie = $response->headers->getCookies()[0];
        $this->assertSame('access_token', $cookie->getName());
        $this->assertSame('testheader.testpayload.testsignature', $cookie->getValue());
    }

    public function testOnAuthenticationSuccessSetSplitCookie()
    {
        $request = $this->getRequest();
        $token = $this->getToken();

        $headerPayloadCookieProvider = new JWTCookieProvider('jwt_hp', 60, null, null, null, true, false, ['header', 'payload']);
        $signatureCookieProvider = new JWTCookieProvider('jwt_s', 60, null, null, null, true, true, ['signature']);

        $response = (new AuthenticationSuccessHandler($this->getJWTManager('secretheader.secretpayload.secretsignature'), $this->getDispatcher(), [$headerPayloadCookieProvider, $signatureCookieProvider]))
            ->onAuthenticationSuccess($request, $token);

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertSame(Response::HTTP_NO_CONTENT, $response->getStatusCode(), $response->getContent());
        $this->assertEmpty(json_decode($response->getContent(), true));

        $headerPayloadCookie = $response->headers->getCookies()[0];
        $this->assertSame('jwt_hp', $headerPayloadCookie->getName());
        $this->assertSame('secretheader.secretpayload', $headerPayloadCookie->getValue());

        $signatureCookie = $response->headers->getCookies()[1];
        $this->assertSame('jwt_s', $signatureCookie->getName());
        $this->assertSame('secretsignature', $signatureCookie->getValue());
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getRequest()
    {
        $request = $this
            ->getMockBuilder(Request::class)
            ->disableOriginalConstructor()
            ->getMock();

        return $request;
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getToken()
    {
        $token = $this
            ->getMockBuilder(JWTUserToken::class)
            ->disableOriginalConstructor()
            ->getMock();

        $token
            ->expects($this->any())
            ->method('getUser')
            ->will($this->returnValue($this->getUser()));

        return $token;
    }

    private function getUser(): UserInterface
    {
        if (class_exists(InMemoryUser::class)) {
            return new InMemoryUser('username', 'password');
        }

        return new User('username', 'password');
    }

    private function getJWTManager($token = null)
    {
        $jwtManager = $this->getMockBuilder(JWTManager::class)
            ->disableOriginalConstructor()
            ->getMock();

        if (null !== $token) {
            $jwtManager
                ->expects($this->any())
                ->method('create')
                ->will($this->returnValue($token));
        }

        return $jwtManager;
    }

    private function getDispatcher()
    {
        $dispatcher = $this->getMockBuilder(EventDispatcher::class)
            ->disableOriginalConstructor()
            ->getMock();

        $dispatcher
            ->expects($this->once())
            ->method('dispatch')
            ->with(
                $this->isInstanceOf(AuthenticationSuccessEvent::class),
                $this->equalTo(Events::AUTHENTICATION_SUCCESS)
            );

        return $dispatcher;
    }
}
