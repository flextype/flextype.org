<?php

declare(strict_types=1);

use Atomastic\Session\Session;

beforeEach(function (): void {
    $_SESSION      = [];
    $this->session = new Session();
    $this->session->setId('foo');
    $this->session->setName('foo');
    $this->session->setOptions([
        'cache_limiter' => 'nocache',
        'cookie_samesite' => 'Lax',
    ]);
    $this->session->setCookieParams(60, '/', '', false, false);
    $this->session->start();
});

afterEach(function (): void {
    $this->session->destroy();
    unset($this->session);
});

test('test instance', function (): void {
    $this->assertInstanceOf(Session::class, $this->session);
});

test('test getOptions methods', function (): void {
    $this->assertEquals('nocache', $this->session->getOptions()['cache_limiter']);
});

test('test getId method', function (): void {
    $this->assertEquals('foo', $this->session->getId());
});

test('test getName method', function (): void {
    $this->assertEquals('foo', $this->session->getName());
});

test('test set get all delete has flush methods', function (): void {
    $this->session->set('foo', 'bar');
    $this->assertEquals('bar', $this->session->get('foo'));
    $this->assertEquals(null, $this->session->get('bar'));

    $this->assertEquals(['foo' => 'bar'], $this->session->all());

    $this->session->delete('foo');
    $this->assertFalse($this->session->has('foo'));

    $this->session->set('foo', 'bar');
    $this->session->flush();
    $this->assertEquals(0, count($_SESSION));
});

test('test isStarted getId regenerateId methods', function (): void {
    $this->assertTrue($this->session->isStarted());
    $this->assertNotEmpty($this->session->getId());
    $oldId = $this->session->getId();
    $this->session->regenerateId();
    $newId = $this->session->getId();
    $this->assertNotSame($oldId, $newId);
});

test('test getCookieParams methods', function (): void {
    $cookie = $this->session->getCookieParams();
    $this->assertNotEmpty($cookie);
    $this->assertSame(60, $cookie['lifetime']);
    $this->assertSame('/', $cookie['path']);
    $this->assertSame('', $cookie['domain']);
    $this->assertFalse($cookie['secure']);
    $this->assertFalse($cookie['httponly']);
});
