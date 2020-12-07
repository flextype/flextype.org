<?php

declare(strict_types=1);

use Atomastic\Filesystem\Filesystem;
use Atomastic\Filesystem\File;
use Atomastic\Filesystem\Directory;

beforeEach(function (): void {
    $this->tempDir = __DIR__ . '/tmp';
    @mkdir($this->tempDir);
});

afterEach(function (): void {
    $filesytem = new Filesystem();
    $filesytem->directory($this->tempDir)->delete();
    unset($this->tempDir);
});

test('test instances', function (): void {
    $this->assertInstanceOf(Filesystem::class, new Filesystem);
    $this->assertInstanceOf(File::class, new File('/1/1.txt'));
    $this->assertInstanceOf(Directory::class, new Directory('/1'));
});

test('test filesytem helper', function (): void {
    $this->assertInstanceOf(Filesystem::class, filesystem());
});

test('test deleteDirectory() method', function (): void {
    @mkdir($this->tempDir . '/1');
    @mkdir($this->tempDir . '/1/2');
    @mkdir($this->tempDir . '/1/2/3');

    $filesytem = new Filesystem();
    $this->assertTrue($filesytem->directory($this->tempDir . '/1')->delete());
});

test('test put() method', function (): void {
    $filesytem = new Filesystem();
    $this->assertEquals(4, $filesytem->file($this->tempDir . '/2.txt')->put('test'));
});

test('test isFile() method', function (): void {
    $filesytem = new Filesystem();
    $filesytem->file($this->tempDir . '/1.txt')->put('test');
    $this->assertTrue($filesytem->file($this->tempDir . '/1.txt')->isFile());
});

test('test isWindowsPath() method', function (): void {
    $filesytem = new Filesystem();
    $this->assertTrue($filesytem->isWindowsPath('C:\file\1.txt'));
});

test('test isDirectory() method', function (): void {
    $filesytem = new Filesystem();
    $this->assertTrue($filesytem->directory($this->tempDir)->isDirectory());
});

test('test isReadable() method', function (): void {
    if (PHP_OS_FAMILY === 'Windows') {
        $this->markTestSkipped('The operating system is Windows');
    }

    $filesytem = new Filesystem();
    $filesytem->file($this->tempDir . '/1.txt')->put('test');

    @chmod($this->tempDir . '/1.txt', 0000);
    $this->assertFalse($filesytem->file($this->tempDir . '/1.txt')->isReadable());
    @chmod($this->tempDir . '/1.txt', 0777);
    $this->assertTrue($filesytem->file($this->tempDir . '/1.txt')->isReadable());

    $this->assertFalse($filesytem->file($this->tempDir . '/2.txt')->isReadable());
});


test('test isWritable() method', function (): void {

    if (PHP_OS_FAMILY === 'Windows') {
        $this->markTestSkipped('The operating system is Windows');
    }

    $filesytem = new Filesystem();
    $filesytem->file($this->tempDir . '/1.txt')->put('test');

    @chmod($this->tempDir . '/1.txt', 0444);
    $this->assertFalse($filesytem->file($this->tempDir . '/1.txt')->isWritable());
    @chmod($this->tempDir . '/1.txt', 0777);
    $this->assertTrue($filesytem->file($this->tempDir . '/1.txt')->isWritable());

    $this->assertFalse($filesytem->file($this->tempDir . '/2.txt')->isWritable());
});

test('test isStream() method', function (): void {
    $filesytem = new Filesystem();
    $this->assertTrue($filesytem->isStream('file://1.txt'));
});


test('test isAbsolute method', function (): void {
    $filesytem = new Filesystem();

    $this->assertFalse($filesytem->isAbsolute(''));
    $this->assertTrue($filesytem->isAbsolute('\\'));
    $this->assertTrue($filesytem->isAbsolute('//'));
    $this->assertFalse($filesytem->isAbsolute('file'));
    $this->assertFalse($filesytem->isAbsolute('dir:/file'));
    $this->assertFalse($filesytem->isAbsolute('dir:\file'));
    $this->assertTrue($filesytem->isAbsolute('c:/file'));
    $this->assertTrue($filesytem->isAbsolute('c:/file/file.txt'));
    $this->assertTrue($filesytem->isAbsolute('c:\file'));
    $this->assertTrue($filesytem->isAbsolute('C:\file'));
    $this->assertTrue($filesytem->isAbsolute('http://file'));
    $this->assertTrue($filesytem->isAbsolute('remote://file'));
});

test('test exists() method', function (): void {
    $filesytem = new Filesystem();
    $filesytem->file($this->tempDir . '/1.txt')->put('test');
    $this->assertTrue($filesytem->file($this->tempDir . '/1.txt')->exists());

    $filesytem->file($this->tempDir . '/1.txt')->put('test');
    $filesytem->file($this->tempDir . '/2.txt')->put('test');
    $this->assertTrue($filesytem->file($this->tempDir . '/1.txt')->exists());
    $this->assertTrue($filesytem->file($this->tempDir . '/2.txt')->exists());
});

test('test delete() method', function (): void {
    $filesytem = new Filesystem();
    $filesytem->file($this->tempDir . '/1.txt')->put('test');
    $this->assertTrue($filesytem->file($this->tempDir . '/1.txt')->delete());

    $filesytem->file($this->tempDir . '/1.txt')->put('test');
    $filesytem->file($this->tempDir . '/2.txt')->put('test');
    $this->assertTrue($filesytem->file($this->tempDir . '/1.txt')->delete());
    $this->assertTrue($filesytem->file($this->tempDir . '/2.txt')->delete());
});

test('test hash() method', function (): void {
    $filesytem = new Filesystem();
    $filesytem->file($this->tempDir . '/1.txt')->put('test');
    $this->assertEquals('098f6bcd4621d373cade4e832627b4f6', $filesytem->file($this->tempDir . '/1.txt')->hash());
});


test('test get() method', function (): void {
    $filesytem = new Filesystem();
    $filesytem->file($this->tempDir . '/1.txt')->put('test');
    $this->assertEquals('test', $filesytem->file($this->tempDir . '/1.txt')->get());
});

test('test prepend() method', function (): void {
    $filesytem = new Filesystem();
    $filesytem->file($this->tempDir . '/1.txt')->put('world');
    $this->assertEquals(11, $filesytem->file($this->tempDir . '/1.txt')->prepend('hello '));
    $this->assertEquals('hello world', $filesytem->file($this->tempDir . '/1.txt')->get());
});

test('test append() method', function (): void {
    $filesytem = new Filesystem();
    $filesytem->file($this->tempDir . '/1.txt')->put('hello');
    $this->assertEquals(6, $filesytem->file($this->tempDir . '/1.txt')->append(' world'));
    $this->assertEquals('hello world', $filesytem->file($this->tempDir . '/1.txt')->get());
});


test('test chmod() method', function (): void {
    if (PHP_OS_FAMILY === 'Windows') {
        $this->markTestSkipped('The operating system is Windows');
    }

    $filesytem = new Filesystem();
    $filesytem->file($this->tempDir . '/1.txt')->put('test');

    // Set
    $filesytem->file($this->tempDir . '/1.txt')->chmod(0755);
    $filePermission      = substr(sprintf('%o', fileperms($this->tempDir . '/1.txt')), -4);
    $expectedPermissions = DIRECTORY_SEPARATOR === '\\' ? '0666' : '0755';
    $this->assertEquals($expectedPermissions, $filePermission);

    // Get
    $filesytem->file($this->tempDir . '/2.txt')->put('test');
    chmod($this->tempDir . '/2.txt', 0755);
    $filePermission      = $filesytem->file($this->tempDir . '/1.txt')->chmod();
    $expectedPermissions = DIRECTORY_SEPARATOR === '\\' ? '0666' : '0755';
    $this->assertEquals($expectedPermissions, $filePermission);
});

test('test directory chmod() method', function (): void {
    if (PHP_OS_FAMILY === 'Windows') {
        $this->markTestSkipped('The operating system is Windows');
    }

    $filesytem = new Filesystem();

    // Set
    $filesytem->directory($this->tempDir)->chmod(0755);
    $filePermission      = substr(sprintf('%o', fileperms($this->tempDir)), -4);
    $expectedPermissions = DIRECTORY_SEPARATOR === '\\' ? '0666' : '0755';
    $this->assertEquals($expectedPermissions, $filePermission);

    // Get
    chmod($this->tempDir, 0755);
    $filePermission      = $filesytem->directory($this->tempDir)->chmod();
    $expectedPermissions = DIRECTORY_SEPARATOR === '\\' ? '0666' : '0755';
    $this->assertEquals($expectedPermissions, $filePermission);
});


test('test copy() method', function (): void {
    $filesytem = new Filesystem();
    $filesytem->file($this->tempDir . '/1.txt')->put('hello');
    $this->assertTrue($filesytem->file($this->tempDir . '/1.txt')->copy($this->tempDir . '/2.txt'));
});


test('test move() method', function (): void {
    $filesytem = new Filesystem();
    $filesytem->file($this->tempDir . '/1.txt')->put('hello');
    $filesytem->file($this->tempDir . '/1.txt')->move($this->tempDir . '/2.txt');
    $this->assertTrue($filesytem->file($this->tempDir . '/2.txt')->exists());
});

test('test directory create() method', function (): void {
    $filesytem = new Filesystem();
    $this->assertTrue($filesytem->directory($this->tempDir . '/1')->create());
    $this->assertTrue($filesytem->directory($this->tempDir . '/1/2/3/4/')->create(0755, true));
    $this->assertTrue($filesytem->directory($this->tempDir . '/2/3/4/')->create(0755, true));
});


test('test directory move() method', function (): void {
    @mkdir($this->tempDir . '/1');
    @mkdir($this->tempDir . '/3');

    $filesytem = new Filesystem();
    $this->assertTrue($filesytem->directory($this->tempDir . '/1')->move($this->tempDir . '/2'));
    $this->assertTrue($filesytem->directory($this->tempDir . '/3')->move($this->tempDir . '/4'));
});


test('test directory copy() method', function (): void {
    @mkdir($this->tempDir . '/1');
    @mkdir($this->tempDir . '/3');
    @mkdir($this->tempDir . '/4');

    $filesytem = new Filesystem();
    $this->assertTrue($filesytem->directory($this->tempDir . '/1')->copy($this->tempDir . '/2'));
    $this->assertTrue($filesytem->directory($this->tempDir . '/3')->copy($this->tempDir . '/4'));
});


test('test directory delete() method', function (): void {
    @mkdir($this->tempDir . '/1');
    @mkdir($this->tempDir . '/1/2');
    @mkdir($this->tempDir . '/1/2/3');

    $filesytem = new Filesystem();
    $this->assertTrue($filesytem->directory($this->tempDir . '/1')->delete());
});


test('test directory clean() method', function (): void {
    @mkdir($this->tempDir . '/1');
    $filesytem = new Filesystem();
    $filesytem->file($this->tempDir . '/1/1.txt')->put('hello');

    $filesytem = new Filesystem();
    $this->assertTrue($filesytem->directory($this->tempDir . '/1')->clean());
    $this->assertFalse($filesytem->file($this->tempDir . '/1/1.txt')->exists());
});


test('test glob() method', function (): void {
    $filesytem = new Filesystem();
    $filesytem->file($this->tempDir . '/1.txt')->put('hello');
    $filesytem->file($this->tempDir . '/2.txt')->put('world');

    $glob = $filesytem->glob($this->tempDir . '/*.txt');
    $this->assertContains($this->tempDir . '/1.txt', $glob);
    $this->assertContains($this->tempDir . '/2.txt', $glob);

    $glob = $filesytem->glob($this->tempDir . '/*.html');
    $this->assertEquals(0, count($glob));
});

test('test size() method', function (): void {
    $filesytem = new Filesystem();
    $filesytem->file($this->tempDir . '/1.txt')->put('hello world');

    $this->assertEquals(11, $filesytem->file($this->tempDir . '/1.txt')->size());
});


test('test direcotory size() method', function (): void {
    $filesytem = new Filesystem();
    @mkdir($this->tempDir . '/1');
    @mkdir($this->tempDir . '/1/2');
    $filesytem->file($this->tempDir . '/1/1.txt')->put('hello world');
    $filesytem->file($this->tempDir . '/1/2.txt')->put('hello world');
    $filesytem->file($this->tempDir . '/1/2/1.txt')->put('hello world');
    $filesytem->file($this->tempDir . '/1/2/2.txt')->put('hello world');

    $this->assertEquals(44, $filesytem->directory($this->tempDir . '/1')->size());
});

test('test lastModified() method', function (): void {
    $filesytem = new Filesystem();

    $filesytem->file($this->tempDir . '/1.txt')->put('hello world');
    $time = filemtime($this->tempDir . '/1.txt');

    $this->assertEquals($time, $filesytem->file($this->tempDir . '/1.txt')->lastModified());
});

test('test lastAccess() method', function (): void {
    $filesytem = new Filesystem();

    $filesytem->file($this->tempDir . '/1.txt')->put('hello world');
    $time = fileatime($this->tempDir . '/1.txt');

    $this->assertEquals($time, $filesytem->file($this->tempDir . '/1.txt')->lastAccess());
});

test('test mimeType() method', function (): void {
    $filesytem = new Filesystem();

    $filesytem->file($this->tempDir . '/1.txt')->put('hello world');

    $this->assertEquals('text/plain', $filesytem->file($this->tempDir . '/1.txt')->mimeType());
});

test('test type() method', function (): void {
    $filesytem = new Filesystem();

    $filesytem->file($this->tempDir . '/1.txt')->put('hello world');

    $this->assertEquals('file', $filesytem->file($this->tempDir . '/1.txt')->type());
    $this->assertEquals('dir', $filesytem->file($this->tempDir)->type());
});

test('test extension() method', function (): void {
    $filesytem = new Filesystem();

    $filesytem->file($this->tempDir . '/1.txt')->put('hello world');

    $this->assertEquals('txt', $filesytem->file($this->tempDir . '/1.txt')->extension());
});

test('test basename() method', function (): void {
    $filesytem = new Filesystem();

    $filesytem->file($this->tempDir . '/1.txt')->put('hello world');

    $this->assertEquals('1.txt', $filesytem->file($this->tempDir . '/1.txt')->basename());
});


test('test name() method', function (): void {
    $filesytem = new Filesystem();

    $filesytem->file($this->tempDir . '/1.txt')->put('hello world');

    $this->assertEquals('1', $filesytem->file($this->tempDir . '/1.txt')->name());
});

test('test find() method', function (): void {
    @mkdir($this->tempDir . '/1');

    $filesytem = new Filesystem();
    $filesytem->file($this->tempDir . '/1/1.txt')->put('hello world');

    $this->assertEquals(1, count(iterator_to_array($filesytem->find()->in($this->tempDir)->files()->name('*.txt'), false)));

    // alternative
    $this->assertEquals(1, count(iterator_to_array((new Filesystem)->find()->in($this->tempDir)->files()->name('*.txt'), false)));
});

test('test path() method', function (): void {
    $filesytem = new Filesystem();

    $this->assertEquals($this->tempDir . '/1.txt', $filesytem->file($this->tempDir . '/1.txt')->path());
    $this->assertEquals($this->tempDir, $filesytem->directory($this->tempDir)->path());
});

test('test macro() method', function (): void {
    @mkdir($this->tempDir . '/1');
    $filesytem = new Filesystem();
    $filesytem->file($this->tempDir . '/1/1.txt')->put('hello world');
    $filesytem->file($this->tempDir . '/1/2.txt')->put('hello world');

    Filesystem::macro('countFiles', function($path) {
        return count(iterator_to_array($this->find()->in($path)->files(), false));
    });

    $filesytem = new Filesystem();
    $this->assertEquals(2, $filesytem->countFiles($this->tempDir . '/1'));
});
