<?php

declare(strict_types = 1);

use Atomastic\Registry\Registry;

test('test getInstance() method', function() {
    $this->assertEquals(Registry::getInstance(), Registry::getInstance());
});

test('test registry() helper', function() {
    $this->assertEquals(Registry::getInstance(), registry());
});

test('test set() method', function() {
    Registry::getInstance()->set('movies.the-thin-red-line.title', 'The Thin Red Line');

    $this->assertEquals('The Thin Red Line',
                        Registry::getInstance()->get('movies.the-thin-red-line.title'));
});

test('test get() method', function() {
    Registry::getInstance()->set('movies.the-thin-red-line.title', 'The Thin Red Line');

    $this->assertEquals('The Thin Red Line',
                        Registry::getInstance()->get('movies.the-thin-red-line.title'));
});

test('test has() method', function() {
    $this->assertTrue(Registry::getInstance()->has('movies.the-thin-red-line.title'));
    $this->assertFalse(Registry::getInstance()->has('movies.the-thin-red-line.description'));
});

test('test all() method', function() {
    $this->assertEquals(['movies' => ['the-thin-red-line' => ['title' => 'The Thin Red Line']]],Registry::getInstance()->all());
});

test('test delete() method', function() {
    Registry::getInstance()->delete('movies.the-thin-red-line.title');

    $this->assertFalse(Registry::getInstance()->has('movies.the-thin-red-line.title'));
});

test('test flush() method', function() {
    Registry::getInstance()->set('movies.the-thin-red-line.title', 'The Thin Red Line')
                           ->set('movies.the-thin-red-line.description', 'Lorem ipsum dolor sit amet');

    $this->assertTrue(Registry::getInstance()->has('movies.the-thin-red-line'));
    $this->assertEquals(null, Registry::getInstance()->flush());

    Registry::getInstance()->set('movies.the-thin-red-line.title', 'The Thin Red Line')
                           ->set('movies.the-thin-red-line.description', 'Lorem ipsum dolor sit amet');

    $this->assertTrue(Registry::getInstance()->has('movies.the-thin-red-line'));
});
