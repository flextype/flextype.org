<?php

declare(strict_types=1);

use Atomastic\Macroable\Macroable;

beforeEach(function (): void {
    $this->EmptyMacroable = new class() {
        use Macroable;
    };

    $this->TestMacroable = new class()
    {
        use Macroable;

        protected $protectedVariable = 'instance';

        protected static function getProtectedStatic()
        {
            return 'static';
        }
    };

    $this->TestMixin = new class()
    {
        public function methodOne()
        {
            return function ($value) {
                return $this->methodTwo($value);
            };
        }

        protected function methodTwo()
        {
            return function ($value) {
                return $this->protectedVariable.'-'.$value;
            };
        }

        protected function methodThree()
        {
            return function () {
                return 'foo';
            };
        }
    };

    $this->Macroable = $this->EmptyMacroable;

});

afterEach(function (): void {

});

test('test Register Macro', function (): void {
    $macroable = $this->Macroable;
    $macroable::macro(__CLASS__, function () {
        return 'Foo';
    });
    $this->assertSame('Foo', $macroable::{__CLASS__}());
});

test('test Register Macro And Call Without Static', function (): void {
    $macroable = $this->Macroable;
    $macroable::macro(__CLASS__, function () {
        return 'Foo';
    });
    $this->assertSame('Foo', $macroable->{__CLASS__}());
});

test('test When Calling Macro Closure Is Bound To Object', function (): void {
    $this->TestMacroable::macro('tryInstance', function () {
         return $this->protectedVariable;
     });
     $this->TestMacroable::macro('tryStatic', function () {
         return static::getProtectedStatic();
     });
     $instance = new $this->TestMacroable;

     $result = $instance->tryInstance();
     $this->assertSame('instance', $result);

     $result = $this->TestMacroable::tryStatic();
     $this->assertSame('static', $result);
});

test('test Class Based Macros No Replace', function (): void {
    $this->TestMacroable::macro('methodThree', function () {
        return 'bar';
    });
    $this->TestMacroable::mixin(new $this->TestMixin, false);
    $instance = new $this->TestMacroable;
    $this->assertSame('bar', $instance->methodThree());

    $this->TestMacroable::mixin(new $this->TestMixin);
    $this->assertSame('foo', $instance->methodThree());
});
