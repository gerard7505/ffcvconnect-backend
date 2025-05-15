<?php

namespace Lexik\Bundle\JWTAuthenticationBundle\Tests\Services;

use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTDecodedEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTEncodedEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Events;
use Lexik\Bundle\JWTAuthenticationBundle\Security\Authentication\Token\JWTUserToken;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTManager;
use Lexik\Bundle\JWTAuthenticationBundle\Services\PayloadEnrichmentInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Tests\Stubs\User as CustomUser;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Security\Core\User\InMemoryUser;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

/**
 * JWTManagerTest.
 *
 * @author Nicolas Cabot <n.cabot@lexik.fr>
 * @author Robin Chalas <robin.chalas@gmail.com>
 */
class JWTManagerTest extends TestCase
{
    /**
     * test create.
     */
    public function testCreate()
    {
        $dispatcher = $this->getEventDispatcherMock();
        $dispatcher
            ->expects($this->exactly(2))
            ->method('dispatch')
            ->withConsecutive(
                [$this->isInstanceOf(JWTCreatedEvent::class), $this->equalTo(Events::JWT_CREATED)],
                [$this->isInstanceOf(JWTEncodedEvent::class), $this->equalTo(Events::JWT_ENCODED)]
            );

        $encoder = $this->getJWTEncoderMock();
        $encoder
            ->expects($this->once())
            ->method('encode')
            ->willReturn('secrettoken');

        $manager = new JWTManager($encoder, $dispatcher, 'username');
        $this->assertEquals('secrettoken', $manager->create($this->createUser('user', 'password')));
    }

    public function testCreateWithPayloadEnrichment()
    {
        $dispatcher = $this->getEventDispatcherMock();
        $encoder = $this->getJWTEncoderMock();
        $encoder
            ->method('encode')
            ->with($this->arrayHasKey('baz'))
            ->willReturn('secrettoken');

        $manager = new JWTManager($encoder, $dispatcher, 'username', new class() implements PayloadEnrichmentInterface {
            public function enrich(UserInterface $user, array &$payload): void
            {
                $payload['baz'] = 'qux';
            }
        });

        $this->assertEquals('secrettoken', $manager->create($this->createUser('user', 'password')));
    }

    /**
     * test create.
     */
    public function testCreateFromPayload()
    {
        $dispatcher = $this->getEventDispatcherMock();

        $dispatcher
            ->expects($this->exactly(2))
            ->method('dispatch')
            ->withConsecutive(
                [$this->isInstanceOf(JWTCreatedEvent::class), $this->equalTo(Events::JWT_CREATED)],
                [$this->isInstanceOf(JWTEncodedEvent::class), $this->equalTo(Events::JWT_ENCODED)]
            );

        $encoder = $this->getJWTEncoderMock();
        $encoder
            ->expects($this->once())
            ->method('encode')
            ->willReturn('secrettoken');

        $manager = new JWTManager($encoder, $dispatcher, 'username');
        $payload = ['foo' => 'bar'];
        $this->assertEquals('secrettoken', $manager->createFromPayload($this->createUser('user', 'password'), $payload));
    }

    public function testCreateFromPayloadWithPayloadEnrichment()
    {
        $dispatcher = $this->getEventDispatcherMock();

        $encoder = $this->getJWTEncoderMock();
        $encoder
            ->method('encode')
            ->with($this->arrayHasKey('baz'))
            ->willReturn('secrettoken');

        $manager = new JWTManager($encoder, $dispatcher, 'username', new class() implements PayloadEnrichmentInterface {
            public function enrich(UserInterface $user, array &$payload): void
            {
                $payload['baz'] = 'qux';
            }
        });
        $payload = ['foo' => 'bar'];
        $this->assertEquals('secrettoken', $manager->createFromPayload($this->createUser('user', 'password'), $payload));
    }

    /**
     * test decode.
     */
    public function testDecode()
    {
        $dispatcher = $this->getEventDispatcherMock();
        $dispatcher
            ->expects($this->once())
            ->method('dispatch')
            ->with(
                $this->isInstanceOf(JWTDecodedEvent::class),
                $this->equalTo(Events::JWT_DECODED)
            );

        $encoder = $this->getJWTEncoderMock();
        $encoder
            ->expects($this->once())
            ->method('decode')
            ->willReturn(['foo' => 'bar']);

        $manager = new JWTManager($encoder, $dispatcher, 'username');
        $this->assertEquals(['foo' => 'bar'], $manager->decode($this->getJWTUserTokenMock()));
    }

    public function testParse()
    {
        $dispatcher = $this->getEventDispatcherMock();
        $dispatcher
            ->expects($this->once())
            ->method('dispatch')
            ->with(
                $this->isInstanceOf(JWTDecodedEvent::class),
                $this->equalTo(Events::JWT_DECODED)
            );

        $encoder = $this->getJWTEncoderMock();
        $encoder
            ->expects($this->once())
            ->method('decode')
            ->willReturn(['foo' => 'bar']);

        $manager = new JWTManager($encoder, $dispatcher, 'username');
        $this->assertEquals(['foo' => 'bar'], $manager->parse('jwt'));
    }

    /**
     * @group legacy
     */
    public function testIdentityField()
    {
        $dispatcher = $this->getEventDispatcherMock();
        $dispatcher
            ->expects($this->exactly(2))
            ->method('dispatch')
            ->withConsecutive(
                [$this->isInstanceOf(JWTCreatedEvent::class), $this->equalTo(Events::JWT_CREATED)],
                [$this->isInstanceOf(JWTEncodedEvent::class), $this->equalTo(Events::JWT_ENCODED)]
            );

        $encoder = $this->getJWTEncoderMock();
        $encoder
            ->expects($this->once())
            ->method('encode')
            ->willReturn('secrettoken');

        $manager = new JWTManager($encoder, $dispatcher, 'username');
        $manager->setUserIdentityField('email');
        $this->assertEquals('secrettoken', $manager->create(new CustomUser('user', 'password', 'victuxbb@gmail.com')));
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getJWTUserTokenMock()
    {
        $mock = $this
            ->getMockBuilder(JWTUserToken::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mock
            ->expects($this->once())
            ->method('getCredentials')
            ->willReturn('secrettoken');

        return $mock;
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getJWTEncoderMock()
    {
        return $this
            ->getMockBuilder(JWTEncoderInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getEventDispatcherMock()
    {
        return $this
            ->getMockBuilder(EventDispatcherInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    private function createUser(string $username, string $password): UserInterface
    {
        if (class_exists(InMemoryUser::class)) {
            return new InMemoryUser($username, $password);
        }

        return new User($username, $password);
    }
}
