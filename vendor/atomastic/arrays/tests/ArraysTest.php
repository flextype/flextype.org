<?php

declare(strict_types=1);

use Atomastic\Arrays\Arrays;

test('test arrays() helper', function (): void {
    $this->assertEquals(Arrays::create(), arrays());
});

test('test create() method', function (): void {
    $this->assertInstanceOf(Arrays::class, Arrays::create());
    $this->assertInstanceOf(Arrays::class, Arrays::create([]));
    $this->assertInstanceOf(Arrays::class, Arrays::create(new Arrays()));
    $this->assertEquals(['foo'], Arrays::create(new Arrays(['foo']))->toArray());
    $this->assertEquals(['foo', 'bar'], Arrays::create(new Arrays(['foo']))->append('bar')->toArray());
    $this->assertEquals(['foo'], (new Arrays(new Arrays(['foo'])))->toArray());
    $this->assertEquals(['foo', 'bar'], (new Arrays(new Arrays(['foo'])))->append('bar')->toArray());
});

test('test createFromJson() method', function (): void {
    $arrays = Arrays::createFromJson('{"foo": "bar"}');
    $arrays = $arrays->all();

    $this->assertEquals(['foo' => 'bar'], $arrays);
});

test('test arraysFromJson() helper', function (): void {
    $arrays = arraysFromJson('{"foo": "bar"}');
    $arrays = $arrays->all();

    $this->assertEquals(['foo' => 'bar'], $arrays);
});

test('test createFromString() method', function (): void {
    $arrays = Arrays::createFromString('foo,bar', ',');
    $arrays = $arrays->all();

    $this->assertEquals([0 => 'foo', 1 => 'bar'], $arrays);
});

test('test arraysFromString() helper', function (): void {
    $arrays = arraysFromString('foo,bar', ',');
    $arrays = $arrays->all();

    $this->assertEquals([0 => 'foo', 1 => 'bar'], $arrays);
});

test('test createWithRange() method', function (): void {
    $arrays = Arrays::createWithRange(1, 5);
    $arrays = $arrays->all();

    $this->assertEquals([1, 2, 3, 4, 5], $arrays);

    $arrays = Arrays::createWithRange(1, 5, 2);
    $arrays = $arrays->all();

    $this->assertEquals([1, 3, 5], $arrays);
});

test('test arraysWithRange() helper', function (): void {
    $arrays = arraysWithRange(1, 5);
    $arrays = $arrays->all();

    $this->assertEquals([1, 2, 3, 4, 5], $arrays);

    $arrays = arraysWithRange(1, 5, 2);
    $arrays = $arrays->all();

    $this->assertEquals([1, 3, 5], $arrays);
});

test('test all() method', function (): void {
    $this->assertEquals(['SG-1', 'SG-2'], Arrays::create(['SG-1', 'SG-2'])->all());
});

test('test set() method', function (): void {
    $this->assertEquals(
        ['movies' => ['SG-1' => ['stars' => ['Jack', 'Daniel', 'Sam']]]],
        Arrays::create([])->set('movies', ['SG-1' => ['stars' => ['Jack', 'Daniel', 'Sam']]])->all()
    );

    $this->assertEquals(
        ['movies' => ['SG-1' => ['stars' => ['Jack', 'Daniel', 'Sam']]]],
        Arrays::create([])->set('movies.SG-1.stars', ['Jack', 'Daniel', 'Sam'])->all()
    );

    $this->assertEquals(
        ['movies' => ['SG-1' => ['stars' => ['Jack', 'Daniel', 'Sam']]]],
        Arrays::create()->set('movies.SG-1.stars', ['Jack', 'Daniel', 'Sam'])->all()
    );

    $this->assertEquals(
        ['movies' => ['SG-1' => ['stars' => []]]],
        Arrays::create()->set('movies.SG-1.stars', [])->all()
    );

    $this->assertEquals(
        ['movies' => ['SG-1' => ['stars' => []]]],
        Arrays::create()->set(null, ['movies' => ['SG-1' => ['stars' => []]]])->all()
    );
});

test('test get() method', function (): void {
    $this->assertEquals(
        ['Jack', 'Daniel', 'Sam'],
        Arrays::create(['stars' => ['Jack', 'Daniel', 'Sam']])->get('stars')
    );
    $this->assertEquals(
        ['Jack', 'Daniel', 'Sam'],
        Arrays::create(['movies' => ['SG-1' => ['stars' => ['Jack', 'Daniel', 'Sam']]]])->get('movies.SG-1.stars')
    );
    $this->assertEquals(
        ['test'],
        Arrays::create(['movies' => ['SG-1' => ['stars' => ['Jack', 'Daniel', 'Sam']]]])->get('film.scores', ['test'])
    );

    $this->assertEquals(
        ['test'],
        Arrays::create(null)->get('film.scores', ['test'])
    );

    $this->assertEquals(
        null,
        Arrays::create(null)->get('film.scores')
    );
});

test('test has() method', function (): void {
    $this->assertTrue(Arrays::create(['movies' => ['SG-1' => ['stars' => ['Jack', 'Daniel', 'Sam'], 'score' => ['5', '4']]]])->has(['movies.SG-1.stars', 'movies.SG-1.score']));
    $this->assertTrue(Arrays::create(['movies' => ['SG-1' => ['stars' => ['Jack', 'Daniel', 'Sam']]]])->has('movies.SG-1.stars'));
    $this->assertFalse(Arrays::create(['movies' => ['SG-1' => ['Jack', 'Daniel', 'Sam']]])->has('movies.SG-1.scores'));

    $this->assertTrue(Arrays::create(['movies' => [0 => ['stars' => ['Jack', 'Daniel', 'Sam']]]])->has('movies.0.stars'));
    $this->assertFalse(Arrays::create(['movies' => [0 => ['stars' => ['Jack', 'Daniel', 'Sam']]]])->has('movies.0.scores'));

    $this->assertFalse(Arrays::create([])->has([null]));
    $this->assertTrue(Arrays::create(['' => 'foobar'])->has(''));
    $this->assertTrue(Arrays::create(['' => 'foobar'])->has(['']));
    $this->assertFalse(Arrays::create([''])->has(''));
    $this->assertFalse(Arrays::create([])->has(''));
    $this->assertFalse(Arrays::create([])->has(['']));

});

test('test delete() method', function (): void {
    $array = Arrays::create(['film' => ['stars' => ['Jack', 'Daniel', 'Sam']]]);
    $array->delete('film.stars');
    $this->assertFalse($array->has('film.stars'));

    $array = Arrays::create(['film' => ['stars' => ['Jack', 'Daniel', 'Sam'], 'score' => ['5', '4']]]);
    $array->delete('film.stars');
    $array->delete('film.score');
    $this->assertFalse($array->has(['film.stars', 'film.score']));
});

test('test dot() method', function (): void {
    $this->assertEquals(
        [
            'movies.the_thin_red_line.title' => 'The Thin Red Line',
            'movies.the_thin_red_line.directed_by' => 'Terrence Malick',
            'movies.the_thin_red_line.produced_by' => 'Robert Michael, Geisler Grant Hill, John Roberdeau',
            'movies.the_thin_red_line.decription' => 'Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.',
        ],
        Arrays::create([
            'movies' => [
                'the_thin_red_line' => [
                    'title' => 'The Thin Red Line',
                    'directed_by' => 'Terrence Malick',
                    'produced_by' => 'Robert Michael, Geisler Grant Hill, John Roberdeau',
                    'decription' => 'Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.',
                ],
            ],
        ])->dot()->all()
    );
});

test('test undot() method', function (): void {
    $this->assertEquals(
        [
            'movies' => [
                'the_thin_red_line' => [
                    'title' => 'The Thin Red Line',
                    'directed_by' => 'Terrence Malick',
                    'produced_by' => 'Robert Michael, Geisler Grant Hill, John Roberdeau',
                    'decription' => 'Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.',
                ],
            ],
        ],
        Arrays::create([
            'movies.the_thin_red_line.title' => 'The Thin Red Line',
            'movies.the_thin_red_line.directed_by' => 'Terrence Malick',
            'movies.the_thin_red_line.produced_by' => 'Robert Michael, Geisler Grant Hill, John Roberdeau',
            'movies.the_thin_red_line.decription' => 'Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.',
        ])->undot()->all()
    );
});


test('test flush() method', function (): void {
    $arrays = Arrays::create()->set('stars', ['Jack', 'Daniel', 'Sam']);
    $arrays->flush();
    $this->assertEquals([], $arrays->all());
});

test('test sortBy() method', function (): void {
    // Default
    $arrays_original = [
        0 => ['title' => 'Post 1'],
        1 => ['title' => 'Post 2'],
    ];

    $arrays_result = Arrays::create([
        1 => ['title' => 'Post 2'],
        0 => ['title' => 'Post 1'],
    ])->sortBy('title')->all();

    $array_equal = static function ($a, $b) {
        return serialize($a) === serialize($b);
    };

    $this->assertTrue($array_equal($arrays_original, $arrays_result));

    // SORT ASC
    $arrays_original = [
        0 => ['title' => 'Post 1'],
        1 => ['title' => 'Post 2'],
    ];

    $arrays_result = Arrays::create([
        1 => ['title' => 'Post 2'],
        0 => ['title' => 'Post 1'],
    ])->sortBy('title', 'ASC')->all();

    $array_equal = static function ($a, $b) {
        return serialize($a) === serialize($b);
    };

    $this->assertTrue($array_equal($arrays_original, $arrays_result));

    // SORT DESC
    $arrays_original = [
        1 => ['title' => 'Post 2'],
        0 => ['title' => 'Post 1'],
    ];

    $arrays_result = Arrays::create([
        1 => ['title' => 'Post 2'],
        0 => ['title' => 'Post 1'],
    ])->sortBy('title', 'DESC')->all();

    $array_equal = static function ($a, $b) {
        return serialize($a) === serialize($b);
    };

    $this->assertTrue($array_equal($arrays_original, $arrays_result));

    $arrays_original = Arrays::create([
        'movies' => [
            'the_thin_red_line' => [
                'title' => 'The Thin Red Line',
                'directed_by' => 'Terrence Malick',
                'produced_by' => 'Robert Michael, Geisler Grant Hill, John Roberdeau',
                'decription' => 'Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.',
            ],
            'bad_times_at_the_el_royale' => [
                'title' => 'Bad Times at the El Royale',
                'directed_by' => 'Drew Goddard',
                'produced_by' => 'Drew Goddard, Steve Asbell',
                'decription' => 'Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.',
            ],
        ],
    ]);
    $movies          = $arrays_original->get('movies');
    $arrays_result   = Arrays::create($movies)->sortBy('title', 'DESC')->all();

    $array_equal = static function ($a, $b) {
        return serialize($a) === serialize($b);
    };

    $this->assertTrue($array_equal($movies, $arrays_result));

    $arrays_original = Arrays::create([
        'movies' => [
            'the_thin_red_line' => [
                'title' => 'The Thin Red Line',
                'directed_by' => 'Terrence Malick',
                'produced_by' => 'Robert Michael, Geisler Grant Hill, John Roberdeau',
                'decription' => 'Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.',
            ],
            'bad_times_at_the_el_royale' => [
                'title' => 'Bad Times at the El Royale',
                'directed_by' => 'Drew Goddard',
                'produced_by' => 'Drew Goddard, Steve Asbell',
                'decription' => 'Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.',
            ],
        ],
    ]);
    $movies          = $arrays_original->get('movies');
    $arrays_result   = Arrays::create($movies)->sortBy('title', 'ASC')->all();

    $array_equal = static function ($a, $b) {
        return serialize($a) === serialize($b);
    };

    $this->assertFalse($array_equal($movies, $arrays_result));

    $arrays_original = Arrays::create([
        'movies' => [
            'the_thin_red_line' => [
                'title' => 'The Thin Red Line',
                'directed_by' => 'Terrence Malick',
                'produced_by' => 'Robert Michael, Geisler Grant Hill, John Roberdeau',
                'decription' => 'Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.',
            ],
            'bad_times_at_the_el_royale' => [
                'title' => 'Bad Times at the El Royale',
                'directed_by' => 'Drew Goddard',
                'produced_by' => 'Drew Goddard, Steve Asbell',
                'decription' => 'Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.',
            ],
        ],
    ]);
    $movies          = $arrays_original->get('movies');
    $arrays_result   = Arrays::create($movies)->sortBy('title', 'ASC', SORT_NATURAL)->all();

    $array_equal = static function ($a, $b) {
        return serialize($a) === serialize($b);
    };

    $this->assertFalse($array_equal($movies, $arrays_result));

    $arrays_original = Arrays::create([
        'movies' => [
            'the_thin_red_line' => [
                'title' => 'The Thin Red Line',
                'directed_by' => 'Terrence Malick',
                'produced_by' => 'Robert Michael, Geisler Grant Hill, John Roberdeau',
                'decription' => 'Adaptation of James Jones autobiographical 1962 novel, focusing on the conflict at Guadalcanal during the second World War.',
            ],
            'bad_times_at_the_el_royale' => [
                'title' => 'Bad Times at the El Royale',
                'directed_by' => 'Drew Goddard',
                'produced_by' => 'Drew Goddard, Steve Asbell',
                'decription' => 'Early 1970s. Four strangers check in at the El Royale Hotel. The hotel is deserted, staffed by a single desk clerk. Some of the new guests reasons for being there are less than innocent and some are not who they appear to be.',
            ],
        ],
    ]);
    $movies          = $arrays_original->get('movies');
    $arrays_result   = Arrays::create($movies)->sortBy('title', 'DESC', SORT_NATURAL)->all();

    $array_equal = static function ($a, $b) {
        return serialize($a) === serialize($b);
    };

    $this->assertTrue($array_equal($movies, $arrays_result));
});

test('test sortByAsc() method', function (): void {
    // SORT ASC
    $arrays_original = [
        0 => ['title' => 'Post 1'],
        1 => ['title' => 'Post 2'],
    ];

    $arrays_result = Arrays::create([
        1 => ['title' => 'Post 2'],
        0 => ['title' => 'Post 1'],
    ])->sortByAsc('title')->all();

    $array_equal = static function ($a, $b) {
        return serialize($a) === serialize($b);
    };

    $this->assertTrue($array_equal($arrays_original, $arrays_result));
});

test('test sortByDesc() method', function (): void {
    // SORT DESC
    $arrays_original = [
        1 => ['title' => 'Post 2'],
        0 => ['title' => 'Post 1'],
    ];

    $arrays_result = Arrays::create([
        1 => ['title' => 'Post 2'],
        0 => ['title' => 'Post 1'],
    ])->sortByDesc('title')->all();

    $array_equal = static function ($a, $b) {
        return serialize($a) === serialize($b);
    };

    $this->assertTrue($array_equal($arrays_original, $arrays_result));
});

test('test count() method', function (): void {
    $this->assertEquals(3, Arrays::create(['Jack', 'Daniel', 'Sam'])->count());
    $this->assertEquals(1, Arrays::create(['names' => ['Jack', 'Daniel', 'Sam']])->count());
    $this->assertEquals(2, Arrays::create(['names' => ['Jack', 'Daniel', 'Sam'], 'tags' => ['star', 'movie']])->count('tags'));
    $this->assertEquals(2, Arrays::create(['collection' => ['names' => ['Jack', 'Daniel', 'Sam'], 'tags' => ['star', 'movie']]])->count('collection.tags'));
});

test('test divide() method', function (): void {
    $this->assertEquals([['name'], ['Daniel']], Arrays::create(['name' => 'Daniel'])->divide());
});

test('test isEqual() method', function (): void {
    $this->assertTrue(Arrays::create([])->isEqual([]));
    $this->assertTrue(Arrays::create(['name' => 'Daniel'])->isEqual(['name' => 'Daniel']));
    $this->assertFalse(Arrays::create(['name' => 'Daniel'])->isEqual(['name' => 'Sam']));
});

test('test isAssoc() method', function (): void {
    $this->assertTrue(Arrays::create(['a' => 'a', 0 => 'b'])->isAssoc());
    $this->assertTrue(Arrays::create([1 => 'a', 0 => 'b'])->isAssoc());
    $this->assertTrue(Arrays::create([1 => 'a', 2 => 'b'])->isAssoc());
    $this->assertFalse(Arrays::create([0 => 'a', 1 => 'b'])->isAssoc());
    $this->assertFalse(Arrays::create(['a', 'b'])->isAssoc());
});

test('test toQuery() method', function (): void {
    $this->assertEquals('', Arrays::create([])->toQuery());
    $this->assertEquals('foo=bar', Arrays::create(['foo' => 'bar'])->toQuery());
    $this->assertEquals('foo=bar&bar=baz', Arrays::create(['foo' => 'bar', 'bar' => 'baz'])->toQuery());
    $this->assertEquals('foo=bar&bar=1', Arrays::create(['foo' => 'bar', 'bar' => true])->toQuery());
    $this->assertEquals('foo=bar', Arrays::create(['foo' => 'bar', 'bar' => null])->toQuery());
    $this->assertEquals('foo=bar&bar=', Arrays::create(['foo' => 'bar', 'bar' => ''])->toQuery());
});

test('test toArray() method', function (): void {
    $this->assertEquals(['SG-1', 'SG-2'], Arrays::create(['SG-1', 'SG-2'])->toArray());
});

test('test toJson() method', function (): void {
    $this->assertEquals('["SG-1","SG-2"]', Arrays::create(['SG-1', 'SG-2'])->toJson());
    $this->assertEquals('{"foo":"bar","bar":"baz"}', Arrays::create(['foo' => 'bar', 'bar' => 'baz'])->toJson());
});

test('test toString() method', function (): void {
    $this->assertEquals('SG-1,SG-2', Arrays::create(['SG-1', 'SG-2'])->toString());
    $this->assertEquals('foo1,bar1,foo2,bar2', Arrays::create(['foo1' => 'bar1', 'foo2' => 'bar2'])->toString(',', true));
    $this->assertEquals('foo1,bar1,foo2,bar2', Arrays::create(['foo1' => 'bar1 ', 'foo2' => ' bar2'])->toString(',', true, true));
});

test('test first() method', function (): void {
    $this->assertEquals('SG-1', Arrays::create(['SG-1', 'SG-2'])->first());
    $this->assertEquals('bar1', Arrays::create(['foo1' => 'bar1', 'foo2' => 'bar2'])->first());
    $this->assertEquals(null, Arrays::create(null)->first());
});

test('test firstKey() method', function (): void {
    $this->assertEquals(0, Arrays::create(['SG-1', 'SG-2'])->firstKey());
    $this->assertEquals('foo1', Arrays::create(['foo1' => 'bar1', 'foo2' => 'bar2'])->firstKey());
});

test('test last() method', function (): void {
    $this->assertEquals('SG-2', Arrays::create(['SG-1', 'SG-2'])->last());
    $this->assertEquals('bar2', Arrays::create(['foo1' => 'bar1', 'foo2' => 'bar2'])->last());
    $this->assertEquals(null, Arrays::create(null)->last());
});

test('test lastKey() method', function (): void {
    $this->assertEquals(1, Arrays::create(['SG-1', 'SG-2'])->lastKey());
    $this->assertEquals('foo2', Arrays::create(['foo1' => 'bar1', 'foo2' => 'bar2'])->lastKey());
});

test('test pull() method', function (): void {
    $array = Arrays::create(['movies' => ['SG-1', 'Mulan']]);
    $this->assertTrue($array->has('movies.1'));

    $array->pull('movies.1');
    $this->assertFalse($array->has('movies.1'));
});

test('test append() method', function (): void {
    $this->assertEquals([0 => 'foo', 1 => 'bar'], Arrays::create(['foo'])->append('bar')->toArray());
    $this->assertEquals([0 => 'foo', 1 => ['bar']], Arrays::create(['foo'])->append(['bar'])->toArray());
    $this->assertEquals([0 => 'foo', 1 => ['bar', 'foo']], Arrays::create(['foo'])->append(['bar', 'foo'])->toArray());
});

test('test prepend() method', function (): void {
    $this->assertEquals([0 => 'bar', 1 => 'foo'], Arrays::create(['foo'])->prepend('bar')->toArray());
    $this->assertEquals([0 => ['bar'], 1 => 'foo'], Arrays::create(['foo'])->prepend(['bar'])->toArray());
    $this->assertEquals([0 => ['bar', 'foo'], 1 => 'foo'], Arrays::create(['foo'])->prepend(['bar', 'foo'])->toArray());
});

test('test chunk() method', function (): void {
    $this->assertEquals(
        [0 => [0 => 'a', 1 => 'b']],
        Arrays::create(['a', 'b'])->chunk(2)->toArray()
    );
    $this->assertEquals(
        [0 => [0 => 'a', 1 => 'b']],
        Arrays::create(['a' => 'a', 'b' => 'b'])->chunk(2)->toArray()
    );
    $this->assertEquals(
        [0 => ['a' => 'a', 'b' => 'b']],
        Arrays::create(['a' => 'a', 'b' => 'b'])->chunk(2, true)->toArray()
    );
});

test('test combine() method', function (): void {
    $this->assertEquals(
        ['green' => 'avacado', 'red' => 'apple', 'yellow' => 'banana'],
        Arrays::create(['green', 'red', 'yellow'])->combine(['avacado', 'apple', 'banana'])->toArray()
    );

    $this->assertEquals(
        [],
        Arrays::create(['green', 'red', 'yellow'])->combine(['avacado', 'apple', 'banana', 'tomato'])->toArray()
    );
});

test('test diff() method', function (): void {
    $this->assertEquals(
        [0 => 'foo', 1 => 'bar'],
        Arrays::create(['foo', 'bar'])->diff(['one', 'two'])->toArray()
    );
    $this->assertEquals(
        [],
        Arrays::create(['foo', 'bar'])->diff(['foo', 'bar'])->toArray()
    );
});

test('test shuffle() method', function (): void {
    $this->assertNotEquals(
        Arrays::create(range(0, 100, 10))->shuffle(),
        Arrays::create(range(0, 100, 10))->shuffle()
    );
    $this->assertNotEquals(
        Arrays::create(range(0, 100, 10))->shuffle(42),
        Arrays::create(range(0, 100, 10))->shuffle(4242)
    );
    $this->assertEquals(
        Arrays::create(range(0, 100, 10))->shuffle(42),
        Arrays::create(range(0, 100, 10))->shuffle(42)
    );
});

test('test filter() method', function (): void {
    $this->assertEquals(
        [0 => 6, 2 => 8, 4 => 10, 6 => 12],
        Arrays::create([6, 7, 8, 9, 10, 11, 12])->filter(static function ($var) {
                               return ! ($var & 1);
        })->toArray()
    );

    $this->assertEquals(
        [2 => 10],
        Arrays::create([2 => 10, 6 => 20, 13 => 23, 30 => 50])
              ->filter(static function ($value, $key) {
                  return $key < 10 && $value < 20;
              })->toArray()
    );
});

test('test flip() method', function (): void {
    $this->assertEquals(
        ['oranges' => 0, 'apples' => 1, 'pears' => 2],
        Arrays::create(['oranges', 'apples', 'pears'])->flip()->toArray()
    );
});

test('test intersect() method', function (): void {
    $this->assertEquals(
        ['a' => 'green', 0 => 'red'],
        Arrays::create(['a' => 'green', 'red', 'blue'])->intersect(['b' => 'green', 'yellow', 'red'])->toArray()
    );
});

test('test intersectAssoc() method', function (): void {
    $this->assertEquals(
        ['a' => 'green'],
        Arrays::create(['a' => 'green', 'b' => 'brown', 'c' => 'blue', 'red'])->intersectAssoc(['a' => 'green', 'b' => 'yellow', 'blue', 'red'])->toArray()
    );
});

test('test intersectKey() method', function (): void {
    $this->assertEquals(
        ['blue' => 1, 'green' => 3],
        Arrays::create(['blue' => 1, 'red' => 2, 'green' => 3, 'purple' => 4])->intersectKey(['green' => 5, 'blue' => 6, 'yellow' => 7, 'cyan' => 8])->toArray()
    );
});

test('test map() method', function (): void {
    $this->assertEquals(
        [0 => 1, 1 => 8, 2 => 27, 3 => 64, 4 => 125],
        Arrays::create([1, 2, 3, 4, 5])->map(static function ($n) {
                            return $n * $n * $n;
        })->toArray()
    );
});

test('test merge() method', function (): void {
    $this->assertEquals(
        ['color' => 'green', 0 => 2, 1 => 4, 2 => 'a', 3 => 'b', 'shape' => 'trapezoid', 4 => 4],
        Arrays::create(['color' => 'red', 2, 4])->merge(['a', 'b', 'color' => 'green', 'shape' => 'trapezoid', 4])->toArray()
    );

    $this->assertEquals(
        ['color' => ['favorite' => [0 => 'red', 1 => 'green'], 0 => 'blue'], 0 => 5, 1 => 10],
        Arrays::create(['color' => ['favorite' => 'red'], 5])->merge([10, 'color' => ['favorite' => 'green', 'blue']], true)->toArray()
    );
});

test('test pad() method', function (): void {
    $this->assertEquals(
        [12, 10, 9, 0, 0],
        Arrays::create([12, 10, 9])->pad(5, 0)->toArray()
    );
});

test('test reindex() method', function (): void {
    $this->assertEquals(
        [0 => 'foo', 1 => 'bar'],
        Arrays::create([10 => 'foo', 111 => 'bar'])->reindex()->toArray()
    );
});

test('test replace() method', function (): void {
    $this->assertEquals(
        ['cherry', 'banana', 'apple', 'raspberry'],
        Arrays::create(['orange', 'banana', 'apple', 'raspberry'])->replace([0 => 'cherry'])->toArray()
    );

    $this->assertEquals(
        ['citrus' => [0 => 'pineapple'], 'berries' => [0 => 'blueberry', 1 => 'raspberry']],
        Arrays::create(['citrus' => ['orange'], 'berries' => ['blackberry', 'raspberry']])->replace(['citrus' => ['pineapple'], 'berries' => ['blueberry']], true)->toArray()
    );
});


test('test reverse() method', function (): void {
    $this->assertEquals(
        [0 => [0 => 'green', 1 => 'red'], 1 => 8, 2 => 'php'],
        Arrays::create(['php', 8, ['green', 'red']])->reverse()->toArray()
    );

    $this->assertEquals(
        [0 => 'php', 1 => 8, 2 => [0 => 'green', 1 => 'red']],
        Arrays::create(['php', 8, ['green', 'red']])->reverse(true)->toArray()
    );
});

test('test slice() method', function (): void {
    $this->assertEquals(
        ['c', 'd', 'e'],
        Arrays::create(['a', 'b', 'c', 'd', 'e'])->slice(2)->toArray()
    );

    $this->assertEquals(
        ['d'],
        Arrays::create(['a', 'b', 'c', 'd', 'e'])->slice(-2, 1)->toArray()
    );

    $this->assertEquals(
        ['a', 'b', 'c'],
        Arrays::create(['a', 'b', 'c', 'd', 'e'])->slice(0, 3)->toArray()
    );
});

test('test skip() method', function (): void {
    $this->assertEquals(
        ['c', 'd', 'e'],
        Arrays::create(['a', 'b', 'c', 'd', 'e'])->skip(2)->toArray()
    );
});

test('test offset() method', function (): void {
    $this->assertEquals(
        ['c', 'd', 'e'],
        Arrays::create(['a', 'b', 'c', 'd', 'e'])->offset(2)->toArray()
    );
});

test('test limit() method', function (): void {
    $this->assertEquals(
        ['a', 'b', 'c'],
        Arrays::create(['a', 'b', 'c', 'd', 'e'])->limit(3)->toArray()
    );
});

test('test offset() and limit() method', function (): void {
    $this->assertEquals(
        ['c'],
        Arrays::create(['a', 'b', 'c', 'd', 'e'])->offset(2)->limit(1)->toArray()
    );
});

test('test unique() method', function (): void {
    $this->assertEquals(
        ['a' => 'green', 0 => 'red', 1 => 'blue'],
        Arrays::create(['a' => 'green', 'red', 'b' => 'green', 'blue', 'red'])->unique()->toArray()
    );

    $this->assertEquals(
        [0 => 4, 2 => '3'],
        Arrays::create([4, '4', '3', 4, 3, '3'])->unique()->toArray()
    );
});

test('test walk() method', function (): void {
    $this->assertEquals(
        ['a' => 'a', 'b' => 'b', 'c' => 'c'],
        Arrays::create(['a' => 'lemon', 'b' => 'orange', 'c' => 'banana'])
                ->walk(static function (&$value, $key): void {
                    $value = $key;
                })
                ->toArray()
    );

    $this->assertEquals(
        ['a' => 'a', 'b' => 'b', 'c' => 'c'],
        Arrays::create(['a' => 'lemon', 'b' => 'orange', 'c' => 'banana'])
                ->walk(static function (&$value, $key): void {
                    $value = $key;
                }, true)
                ->toArray()
    );
});

test('test search() method', function (): void {
    $this->assertEquals(
        2,
        Arrays::create([0 => 'blue', 1 => 'red', 2 => 'green', 3 => 'red'])->search('green')
    );
});

test('test indexOf() method', function (): void {
    $this->assertEquals(
        2,
        Arrays::create([0 => 'blue', 1 => 'red', 2 => 'green', 3 => 'red'])->indexOf('green')
    );
});

test('test reduce() method', function (): void {
    $this->assertEquals(
        4,
        Arrays::create([2, 2])->reduce(static function ($carry, $item) {
            $carry += $item;

            return $carry;
        })
    );
});

test('test only() method', function (): void {
    $this->assertEquals(
        ['b' => 2, 'e' => 5],
        Arrays::create(['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5])->only(['b', 'e'])->toArray()
    );
});

test('test except() method', function (): void {
    $this->assertEquals(
        ['a' => 1, 'c' => 3, 'd' => 4],
        Arrays::create(['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5])->except(['b', 'e'])->toArray()
    );
});

test('test copy() method', function (): void {
    $foo = Arrays::create(['foo', 'bar']);
    $bar = $foo->copy();

    $this->assertInstanceOf(Arrays::class, $foo->flush());
    $this->assertInstanceOf(Arrays::class, $bar);
    $this->assertCount(2, $bar->toArray());
});


test('test nth() method', function (): void {
    $this->assertEquals(
        [0 => 1, 2 => 3, 4 => 5],
        Arrays::create([1, 2, 3, 4, 5])->nth(2)->toArray()
    );

    $this->assertEquals(
        [1 => 2, 3 => 4],
        Arrays::create([1, 2, 3, 4, 5])->nth(2, 1)->toArray()
    );
});

test('test getValues() method', function (): void {
    $this->assertEquals(
        [1, 2, 3, 4, 5],
        Arrays::create([1, 2, 3, 4, 5])->getValues()
    );
});

test('test where() method', function (): void {
    $this->assertEquals(
        [1 => ['title' => 'Bar']],
        Arrays::create([
            0 => ['title' => 'Foo'],
            1 => ['title' => 'Bar'],
        ])
                        ->where('title', '=', 'Bar')
                        ->toArray()
    );

    $this->assertEquals(
        [1 => ['title' => 'Bar', 'foo' => ['title' => 'FooBar']]],
        Arrays::create([0 => ['title' => 'Foo'], 1 => ['title' => 'Bar', 'foo' => ['title' => 'FooBar']]])->where('foo.title', '=', 'FooBar')->toArray()
    );

    $this->assertEquals(
        [1 => ['title' => 'Bar', 'category' => 'A']],
        Arrays::create([
            0 => ['title' => 'Foo'],
            1 => ['title' => 'Bar', 'category' => 'A'],
            2 => ['title' => 'Zed', 'category' => 'A', 'tag' => 'apple'],
            3 => ['title' => 'Zed', 'category' => 'A', 'tag' => 'apple', 'flag' => 5],
        ])
                    ->where('title', '=', 'Bar')
                    ->where('category', '=', 'A')
                    ->toArray()
    );

    $this->assertEquals(
        [1 => ['title' => 'Bar', 'category' => 'A']],
        Arrays::create([
            0 => ['title' => 'Foo'],
            1 => ['title' => 'Bar', 'category' => 'A'],
            2 => ['title' => 'Zed', 'category' => 'A', 'tag' => 'apple'],
            3 => ['title' => 'Zed', 'category' => 'A', 'tag' => 'apple', 'flag' => 5],
        ])
                    ->where('title', '=', 'Bar')
                    ->where('category', '=', 'A')
                    ->toArray()
    );

    // operator: starts_with

    $this->assertEquals(
        [0 => ['title' => 'Foo']],
        Arrays::create([
            0 => ['title' => 'Foo'],
            1 => ['title' => 'Bar'],
        ])
                    ->where('title', 'starts_with', 'Foo')
                    ->toArray()
    );

    $this->assertEquals(
        [0 => ['title' => 'FooBar']],
        Arrays::create([
            0 => ['title' => 'FooBar'],
            1 => ['title' => 'BarFoo'],
        ])
                    ->where('title', 'starts_with', 'Foo')
                    ->toArray()
    );

    $this->assertEquals(
        [0 => ['title' => 'FòôBar']],
        Arrays::create([
            0 => ['title' => 'FòôBar'],
            1 => ['title' => 'BarFoo'],
        ])
                    ->where('title', 'starts_with', 'Fòô')
                    ->toArray()
    );

    // operator: ends_with

    $this->assertEquals(
        [1 => ['title' => 'Bar']],
        Arrays::create([
            0 => ['title' => 'Foo'],
            1 => ['title' => 'Bar'],
        ])
                    ->where('title', 'ends_with', 'Bar')
                    ->toArray()
    );

    $this->assertEquals(
        [0 => ['title' => 'FooBar']],
        Arrays::create([
            0 => ['title' => 'FooBar'],
            1 => ['title' => 'BarFoo'],
        ])
                    ->where('title', 'ends_with', 'Bar')
                    ->toArray()
    );

    $this->assertEquals(
        [1 => ['title' => 'BarFòô']],
        Arrays::create([
            0 => ['title' => 'FòôBar'],
            1 => ['title' => 'BarFòô'],
        ])
                    ->where('title', 'ends_with', 'Fòô')
                    ->toArray()
    );

    // operator: between

    $this->assertEquals(
        [1 => ['price' => '150'], 2 => ['price' => '200']],
        Arrays::create([['price' => '100'], ['price' => '150'], ['price' => '200']])
            ->where('price', 'between', [150, 200])
            ->toArray()
    );

    // operator: nbetween

    $this->assertEquals(
        [0 => ['price' => '100']],
        Arrays::create([['price' => '100'], ['price' => '150'], ['price' => '200']])
            ->where('price', 'nbetween', [150, 200])
            ->toArray()
    );

    // operator: contains like

    $this->assertEquals(
        [
            0 => ['title' => 'FòôBar'],
            1 => ['title' => 'BarFòô'],
        ],
        Arrays::create([
            0 => ['title' => 'FòôBar'],
            1 => ['title' => 'BarFòô'],
        ])
            ->where('title', 'contains', 'Fòô')
            ->toArray()
    );

    $this->assertEquals(
        [
            0 => ['title' => 'FòôBar'],
            1 => ['title' => 'BarFòô'],
        ],
        Arrays::create([
            0 => ['title' => 'FòôBar'],
            1 => ['title' => 'BarFòô'],
        ])
            ->where('title', 'like', 'Fòô')
            ->toArray()
    );

    $this->assertEquals(
        [],
        Arrays::create([
            0 => ['title' => 'FòôBar'],
            1 => ['title' => 'BarFòô'],
        ])
            ->where('title', 'ncontains', 'Fòô')
            ->toArray()
    );

    $this->assertEquals(
        [],
        Arrays::create([
            0 => ['title' => 'FòôBar'],
            1 => ['title' => 'BarFòô'],
        ])
            ->where('title', 'nlike', 'Fòô')
            ->toArray()
    );

    $this->assertEquals(
        [2 => ['title' => 'Zed']],
        Arrays::create([
            0 => ['title' => 'FòôBar'],
            1 => ['title' => 'BarFòô'],
            2 => ['title' => 'Zed'],
        ])
            ->where('title', 'nlike', 'Fòô')
            ->toArray()
    );

    // operator: neq, !=

    $this->assertEquals(
        [0 => ['title' => 'FòôBar']],
        Arrays::create([
            0 => ['title' => 'FòôBar'],
            1 => ['title' => 'BarFòô'],
        ])
            ->where('title', '!=', 'BarFòô')
            ->toArray()
    );

    $this->assertEquals(
        [0 => ['title' => 'FòôBar']],
        Arrays::create([
            0 => ['title' => 'FòôBar'],
            1 => ['title' => 'BarFòô'],
        ])
            ->where('title', 'neq', 'BarFòô')
            ->toArray()
    );

    // operator: eq, =

    $this->assertEquals(
        [0 => ['title' => 'FòôBar']],
        Arrays::create([
            0 => ['title' => 'FòôBar'],
            1 => ['title' => 'BarFòô'],
        ])
            ->where('title', '=', 'FòôBar')
            ->toArray()
    );

    $this->assertEquals(
        [1 => ['title' => 'BarFòô', 'published' => true]],
        Arrays::create([
            0 => ['title' => 'FòôBar'],
            1 => ['title' => 'BarFòô', 'published' => true],
            2 => ['title' => 'BarFòô', 'published' => false],
        ])
            ->where('title', '=', 'BarFòô')
            ->where('published', 'eq', true)  // and where
            ->toArray()
    );

    $this->assertEquals(
        [0 => ['title' => 'FòôBar']],
        Arrays::create([
            0 => ['title' => 'FòôBar'],
            1 => ['title' => 'BarFòô'],
        ])
            ->where('title', 'eq', 'FòôBar')
            ->toArray()
    );

    // operator: in

    $this->assertEquals(
        [0 => ['title' => 'FòôBar']],
        Arrays::create([
            0 => ['title' => 'FòôBar'],
            1 => ['title' => 'BarFòô'],
        ])
            ->where('title', 'in', ['FòôBar'])
            ->toArray()
    );

    // operator: nin

    $this->assertEquals(
        [1 => ['title' => 'BarFòô']],
        Arrays::create([
            0 => ['title' => 'FòôBar'],
            1 => ['title' => 'BarFòô'],
        ])
            ->where('title', 'nin', ['FòôBar'])
            ->toArray()
    );

    // operator: lt, <

    $this->assertEquals(
        [0 => ['price' => 10]],
        Arrays::create([
            0 => ['price' => 10],
            1 => ['price' => 20],
        ])
        ->where('price', 'lt', 20)
        ->toArray()
    );

    $this->assertEquals(
        [0 => ['price' => 10]],
        Arrays::create([
            0 => ['price' => 10],
            1 => ['price' => 20],
        ])
        ->where('price', '<', 20)
        ->toArray()
    );

    // operator: gt, >

    $this->assertEquals(
        [1 => ['price' => 20]],
        Arrays::create([
            0 => ['price' => 10],
            1 => ['price' => 20],
        ])
        ->where('price', 'gt', 10)
        ->toArray()
    );

    $this->assertEquals(
        [1 => ['price' => 20]],
        Arrays::create([
            0 => ['price' => 10],
            1 => ['price' => 20],
        ])
        ->where('price', '>', 10)
        ->toArray()
    );

    // operator: gte, >=

    $this->assertEquals(
        [
            0 => ['price' => 10],
            1 => ['price' => 20],
        ],
        Arrays::create([
            0 => ['price' => 10],
            1 => ['price' => 20],
        ])
        ->where('price', 'gte', 10)
        ->toArray()
    );

    $this->assertEquals(
        [
            0 => ['price' => 10],
            1 => ['price' => 20],
        ],
        Arrays::create([
            0 => ['price' => 10],
            1 => ['price' => 20],
        ])
        ->where('price', '>=', 10)
        ->toArray()
    );

    // operator: lte, =<

    $this->assertEquals(
        [
            0 => ['price' => 10],
            1 => ['price' => 20],
        ],
        Arrays::create([
            0 => ['price' => 10],
            1 => ['price' => 20],
        ])
        ->where('price', 'lte', 20)
        ->toArray()
    );

    $this->assertEquals(
        [
            0 => ['price' => 10],
            1 => ['price' => 20],
        ],
        Arrays::create([
            0 => ['price' => 10],
            1 => ['price' => 20],
        ])
        ->where('price', '<=', 20)
        ->toArray()
    );

    // operator: regexp

    $this->assertEquals(
        [
            0 => ['message' => '42'],
            1 => ['message' => '21'],
        ],
        Arrays::create([
            0 => ['message' => '42'],
            1 => ['message' => '21'],
            2 => ['message' => 'Hello'],
            3 => ['message' => 'Hello 42'],
        ])
        ->where('message', 'regexp', '^\d+$')
        ->toArray()
    );

    // operator: nregexp
    // operator: not regexp

    $this->assertEquals(
        [
            2 => ['message' => 'Hello'],
            3 => ['message' => 'Hello 42'],
        ],
        Arrays::create([
            0 => ['message' => '42'],
            1 => ['message' => '21'],
            2 => ['message' => 'Hello'],
            3 => ['message' => 'Hello 42'],
        ])
        ->where('message', 'nregexp', '^\d+$')
        ->toArray()
    );

    $this->assertEquals(
        [
            2 => ['message' => 'Hello'],
            3 => ['message' => 'Hello 42'],
        ],
        Arrays::create([
            0 => ['message' => '42'],
            1 => ['message' => '21'],
            2 => ['message' => 'Hello'],
            3 => ['message' => 'Hello 42'],
        ])
        ->where('message', 'nregexp', '^\d+$')
        ->toArray()
    );

    // operator: lte, =<

    $this->assertEquals(
        [
            0 => ['price' => 10],
            1 => ['price' => 20],
        ],
        Arrays::create([
            0 => ['price' => 10],
            1 => ['price' => 20],
        ])
        ->where('price', 'lte', 20)
        ->toArray()
    );

    $this->assertEquals(
        [
            0 => ['price' => 10],
            1 => ['price' => 20],
        ],
        Arrays::create([
            0 => ['price' => 10],
            1 => ['price' => 20],
        ])
        ->where('price', '<=', 20)
        ->toArray()
    );

    $this->assertEquals(
        [
            1 => ['date' => '2020-11-12']
        ],
        Arrays::create([
            0 => ['date' => '2020-11-11'],
            1 => ['date' => '2020-11-12'],
        ])
        ->where('date', 'newer', '2020-11-11')
        ->toArray()
    );

    $this->assertEquals(
        [
            0 => ['date' => '2020-11-11']
        ],
        Arrays::create([
            0 => ['date' => '2020-11-11'],
            1 => ['date' => '2020-11-12'],
        ])
        ->where('date', 'older', '2020-11-12')
        ->toArray()
    );
});

test('test whereIn() method', function (): void {
    $this->assertEquals(
        [0 => ['title' => 'FòôBar']],
        Arrays::create([
            0 => ['title' => 'FòôBar'],
            1 => ['title' => 'BarFòô'],
        ])
            ->whereIn('title', ['FòôBar'])
            ->toArray()
    );
});

test('test whereNotIn() method', function (): void {
    $this->assertEquals(
        [1 => ['title' => 'BarFòô']],
        Arrays::create([
            0 => ['title' => 'FòôBar'],
            1 => ['title' => 'BarFòô'],
        ])
            ->whereNotIn('title', ['FòôBar'])
            ->toArray()
    );
});

test('test whereBetween() method', function (): void {
    $this->assertEquals(
        [1 => ['price' => '150'], 2 => ['price' => '200']],
        Arrays::create([['price' => '100'], ['price' => '150'], ['price' => '200']])
            ->whereBetween('price', [150, 200])
            ->toArray()
    );
});

test('test whereNotBetween() method', function (): void {
    $this->assertEquals(
        [0 => ['price' => '100']],
        Arrays::create([['price' => '100'], ['price' => '150'], ['price' => '200']])
            ->whereNotBetween('price', [150, 200])
            ->toArray()
    );
});

test('test whereGreater() method', function (): void {
    $this->assertEquals(
        [1 => ['price' => 20]],
        Arrays::create([
            0 => ['price' => 10],
            1 => ['price' => 20],
        ])
        ->whereGreater('price', 10)
        ->toArray()
    );
});

test('test whereGreaterOrEqual() method', function (): void {
    $this->assertEquals(
        [
            0 => ['price' => 10],
            1 => ['price' => 20],
        ],
        Arrays::create([
            0 => ['price' => 10],
            1 => ['price' => 20],
        ])
        ->whereGreaterOrEqual('price', 10)
        ->toArray()
    );
});

test('test whereLess() method', function (): void {
    $this->assertEquals(
        [0 => ['price' => 10]],
        Arrays::create([
            0 => ['price' => 10],
            1 => ['price' => 20],
        ])
        ->whereLess('price', 20)
        ->toArray()
    );
});

test('test whereLessOrEqual() method', function (): void {
    $this->assertEquals(
        [
            0 => ['price' => 10],
            1 => ['price' => 20],
        ],
        Arrays::create([
            0 => ['price' => 10],
            1 => ['price' => 20],
        ])
        ->whereLessOrEqual('price', 20)
        ->toArray()
    );
});

test('test whereContains() method', function (): void {
    $this->assertEquals(
        [
            0 => ['title' => 'FòôBar'],
            1 => ['title' => 'BarFòô'],
        ],
        Arrays::create([
            0 => ['title' => 'FòôBar'],
            1 => ['title' => 'BarFòô'],
        ])
            ->whereContains('title', 'Fòô')
            ->toArray()
    );
});

test('test whereNotContains() method', function (): void {
    $this->assertEquals(
        [],
        Arrays::create([
            0 => ['title' => 'FòôBar'],
            1 => ['title' => 'BarFòô'],
        ])
            ->whereNotContains('title', 'Fòô')
            ->toArray()
    );
});

test('test whereEqual() method', function (): void {
    $this->assertEquals(
        [1 => ['title' => 'BarFòô', 'published' => true]],
        Arrays::create([
            0 => ['title' => 'FòôBar'],
            1 => ['title' => 'BarFòô', 'published' => true],
            2 => ['title' => 'BarFòô', 'published' => false],
        ])
            ->whereEqual('title', 'BarFòô')
            ->whereEqual('published', true)  // and where
            ->toArray()
    );
});

test('test whereNotEqual() method', function (): void {
    $this->assertEquals(
        [0 => ['title' => 'FòôBar']],
        Arrays::create([
            0 => ['title' => 'FòôBar'],
            1 => ['title' => 'BarFòô'],
        ])
            ->whereNotEqual('title', 'BarFòô')
            ->toArray()
    );
});


test('test whereStartsWith() method', function (): void {
    $this->assertEquals(
        [0 => ['title' => 'Foo']],
        Arrays::create([
            0 => ['title' => 'Foo'],
            1 => ['title' => 'Bar'],
        ])
        ->whereStartsWith('title', 'Foo')
        ->toArray()
    );
});

test('test whereEndsWith() method', function (): void {
    $this->assertEquals(
        [1 => ['title' => 'Bar']],
        Arrays::create([
            0 => ['title' => 'Foo'],
            1 => ['title' => 'Bar'],
        ])
        ->whereEndsWith('title', 'Bar')
        ->toArray()
    );
});

test('test whereNewer() method', function (): void {
    $this->assertEquals(
        [
            1 => ['date' => '2020-11-12']
        ],
        Arrays::create([
            0 => ['date' => '2020-11-11'],
            1 => ['date' => '2020-11-12'],
        ])
        ->whereNewer('date', '2020-11-11')
        ->toArray()
    );
});

test('test whereOlder() method', function (): void {
    $this->assertEquals(
        [
            0 => ['date' => '2020-11-11']
        ],
        Arrays::create([
            0 => ['date' => '2020-11-11'],
            1 => ['date' => '2020-11-12'],
        ])
        ->whereOlder('date', '2020-11-12')
        ->toArray()
    );
});

test('test whereRegexp() method', function (): void {
    $this->assertEquals(
        [
            0 => ['message' => '42'],
            1 => ['message' => '21'],
        ],
        Arrays::create([
            0 => ['message' => '42'],
            1 => ['message' => '21'],
            2 => ['message' => 'Hello'],
            3 => ['message' => 'Hello 42'],
        ])
        ->whereRegexp('message', '^\d+$')
        ->toArray()
    );
});

test('test whereNotRegexp() method', function (): void {
    $this->assertEquals(
        [
            2 => ['message' => 'Hello'],
            3 => ['message' => 'Hello 42'],
        ],
        Arrays::create([
            0 => ['message' => '42'],
            1 => ['message' => '21'],
            2 => ['message' => 'Hello'],
            3 => ['message' => 'Hello 42'],
        ])
        ->whereNotRegexp('message', '^\d+$')
        ->toArray()
    );
});

test('test isEmpty() method', function (): void {
    $this->assertFalse(Arrays::create([1, 2, 3, 4, 5])->isEmpty());
    $this->assertTrue(Arrays::create()->isEmpty());
    $this->assertTrue(Arrays::create([])->isEmpty());
});


test('test random() method', function (): void {
    $random = Arrays::create(['foo', 'bar', 'baz'])->random();
    $this->assertContains($random, ['foo', 'bar', 'baz']);

    $random = Arrays::create(['foo', 'bar', 'baz'])->random(0);
    $this->assertIsArray($random);
    $this->assertCount(0, $random);

    $random = Arrays::create(['foo', 'bar', 'baz'])->random(1);
    $this->assertIsArray($random);
    $this->assertCount(1, $random);
    $this->assertContains(Arrays::create($random)->first(), ['foo', 'bar', 'baz']);

    $random = Arrays::create(['foo', 'bar', 'baz'])->random(2);
    $this->assertIsArray($random);
    $this->assertCount(2, $random);
    $this->assertContains(Arrays::create($random)->first(), ['foo', 'bar', 'baz']);
    $this->assertContains(Arrays::create($random)->last(), ['foo', 'bar', 'baz']);

    $random = Arrays::create(['foo', 'bar', 'baz'])->random(10);
    $this->assertIsArray($random);
    $this->assertCount(3, $random);
    $this->assertContains(Arrays::create($random)->first(), ['foo', 'bar', 'baz']);
    $this->assertContains(Arrays::create($random)->last(), ['foo', 'bar', 'baz']);
});

test('test sort() method', function (): void {
    $this->assertEquals(
        [0 => 'blue', 1 => 'green', 2 => 'red', 3 => 'red'],
        Arrays::create([0 => 'blue', 1 => 'red', 2 => 'green', 3 => 'red'])->sort()->toArray()
    );

    $this->assertEquals(
        [0 => 'blue', 1 => 'green', 2 => 'red', 3 => 'red'],
        Arrays::create([0 => 'blue', 1 => 'red', 2 => 'green', 3 => 'red'])->sort('ASC')->toArray()
    );

    $this->assertEquals(
        [0 => 'blue', 2 => 'green', 1 => 'red', 3 => 'red'],
        Arrays::create([0 => 'blue', 1 => 'red', 2 => 'green', 3 => 'red'])->sort('ASC', SORT_REGULAR, true)->toArray()
    );

    $this->assertEquals(
        [0 => 'red', 1 => 'red', 2 => 'green', 3 => 'blue'],
        Arrays::create([0 => 'blue', 1 => 'red', 2 => 'green', 3 => 'red'])->sort('DESC')->toArray()
    );

    $this->assertEquals(
        [1 => 'red', 3 => 'red', 2 => 'green', 0 => 'blue'],
        Arrays::create([0 => 'blue', 1 => 'red', 2 => 'green', 3 => 'red'])->sort('DESC', SORT_REGULAR, true)->toArray()
    );
});

test('test next() method', function (): void {
    $this->assertEquals(
        'red',
        Arrays::create([0 => 'blue', 1 => 'red', 2 => 'green', 3 => 'red'])->next()
    );
});

test('test prev() method', function (): void {
    $this->assertEquals(
        false,
        Arrays::create([0 => 'blue', 1 => 'red', 2 => 'green', 3 => 'red'])->prev()
    );
});

test('test pipe() method', function (): void {
    $arrays = new Arrays([1, 2, 3]);

    $this->assertEquals(3, $arrays->pipe(static function ($arrays) {
        return $arrays->last();
    }));
});

test('test sum() method', function (): void {
    $this->assertEquals(
        6,
        Arrays::create([2, 2, 2])->sum()
    );
});

test('test product() method', function (): void {
    $this->assertEquals(
        8,
        Arrays::create([2, 2, 2])->product()
    );
});

test('test every() method', function (): void {
    $this->assertTrue(
        Arrays::create([0 => 'Foo', 1 => 'Bar'])->every(function($value, $key) {
            return is_string($value);
        })
    );

    $this->assertFalse(
        Arrays::create([0 => 'Foo', 1 => 42])->every(function($value, $key) {
            return is_string($value);
        })
    );
});

test('test current() method', function (): void {
    $this->assertEquals(
        'blue',
        Arrays::create([0 => 'blue', 1 => 'red', 2 => 'green', 3 => 'red'])->current()
    );
});

test('test groupBy() method', function (): void {
    $this->assertEquals(
        [
            'Male' => [
                0 => [
                    'id' => 1,
                    'name' => 'Bruce Wayne',
                    'city' => 'Gotham',
                    'gender' => 'Male',
                ],
                1 => [
                    'id' => 2,
                    'name' => 'Thomas Wayne',
                    'city' => 'Gotham',
                    'gender' => 'Male',
                ],
                2 => [
                    'id' => 4,
                    'name' => 'Speedy Gonzales',
                    'city' => 'New Mexico',
                    'gender' => 'Male',
                ],
            ],
            'Female' => [
                0 => [
                    'id' => 3,
                    'name' => 'Diana Prince',
                    'city' => 'New Mexico',
                    'gender' => 'Female',
                ],
            ],
        ],
        Arrays::create([
            [
                'id' => 1,
                'name' => 'Bruce Wayne',
                'city' => 'Gotham',
                'gender' => 'Male',
            ],
            [
                'id' => 2,
                'name' => 'Thomas Wayne',
                'city' => 'Gotham',
                'gender' => 'Male',
            ],
            [
                'id' => 3,
                'name' => 'Diana Prince',
                'city' => 'New Mexico',
                'gender' => 'Female',
            ],
            [
                'id' => 4,
                'name' => 'Speedy Gonzales',
                'city' => 'New Mexico',
                'gender' => 'Male',
            ],
        ])->groupBy('gender')->toArray()
    );
});

test('test sortKeys() method', function (): void {
    $this->assertEquals(
        [0 => 'blue', 1 => 'red', 2 => 'green', 3 => 'red'],
        Arrays::create([0 => 'blue', 1 => 'red', 2 => 'green', 3 => 'red'])->sortKeys()->toArray()
    );

    $this->assertEquals(
        ['a' => 'blue', 'b' => 'red', 'c' => 'green'],
        Arrays::create(['a' => 'blue', 'b' => 'red', 'c' => 'green'])->sortKeys()->toArray()
    );

    $this->assertEquals(
        ['a' => 'blue', 'b' => 'red', 'c' => 'green'],
        Arrays::create(['a' => 'blue', 'b' => 'red', 'c' => 'green'])->sortKeys('ASC')->toArray()
    );

    $this->assertEquals(
        ['a' => 'blue', 'b' => 'red', 'c' => 'green'],
        Arrays::create(['a' => 'blue', 'b' => 'red', 'c' => 'green'])->sortKeys('DESC')->toArray()
    );
});

test('test customSortValues() method', function (): void {
    $this->assertEquals(
        ['a', 'b', 'c'],
        Arrays::create(['b', 'a', 'c'])
              ->customSortValues(static function ($a, $b) {
                if ($a === $b) {
                    return 0;
                }

                  return $a < $b ? -1 : 1;
              })->toArray()
    );

    $this->assertEquals(
        [0 => 'a', 1 => 'b', 2 => 'c'],
        Arrays::create([0 => 'b', 1 => 'c', 2 => 'a'])
              ->customSortValues(static function ($a, $b) {
                if ($a === $b) {
                    return 0;
                }

                  return $a < $b ? -1 : 1;
              })->toArray()
    );
});

test('test customSortKeys() method', function (): void {
    $this->assertEquals(
        [0 => 'b', 1 => 'a', 2 => 'c'],
        Arrays::create(['b', 'a', 'c'])
              ->customSortKeys(static function ($a, $b) {
                if ($a === $b) {
                    return 0;
                }

                  return $a < $b ? -1 : 1;
              })->toArray()
    );
});

test('test column() method', function (): void {
    $arrays1 = Arrays::create([['id' => 'i1', 'val' => 'v1'], ['id' => 'i2', 'val' => 'v2']])->column('val');
    $arrays2 = Arrays::create([['id' => 'i1', 'val' => 'v1'], ['id' => 'i2', 'val' => 'v2']])->column('val', 'id');
    $arrays3 = Arrays::create([['id' => 'i1', 'val' => 'v1'], ['id' => 'i2', 'val' => 'v2']])->column(null, 'id');

    $this->assertEquals(
        ['v1', 'v2'],
        $arrays1->toArray()
    );

    $this->assertEquals(
        ['i1' => 'v1', 'i2' => 'v2'],
        $arrays2->toArray()
    );

    $this->assertEquals(
        ['i1' => ['id' => 'i1', 'val' => 'v1'], 'i2' => ['id' => 'i2', 'val' => 'v2']],
        $arrays3->toArray()
    );
});

test('test offsetGet() method', function (): void {
    $this->assertEquals(
        'Foo',
        Arrays::create(['foo' => 'Foo', 'bar' => 'Bar'])->offsetGet('foo')
    );

    $this->assertEquals(
        'Foo',
        Arrays::create(['foo' => 'Foo', 'bar' => 'Bar'])['foo']
    );
});

test('test offsetSet() method', function (): void {
    $arrays = Arrays::create();
    $arrays->offsetSet('foo', 'Foo');

    $this->assertEquals(
        'Foo',
        $arrays['foo']
    );

    $arrays        = Arrays::create();
    $arrays['foo'] = 'Foo';
    $arrays['bar'] = 'Bar';

    $this->assertEquals(
        'Foo',
        $arrays['foo']
    );

    $this->assertEquals(
        'Bar',
        $arrays['bar']
    );

    $arrays              = Arrays::create();
    $arrays['items.foo'] = 'Foo';
    $arrays['items.bar'] = 'Bar';

    $this->assertEquals(
        'Foo',
        $arrays['items.foo']
    );

    $this->assertEquals(
        'Bar',
        $arrays['items.bar']
    );
});

test('test offsetUnset() method', function (): void {
    $arrays              = Arrays::create();
    $arrays['items.foo'] = 'Foo';
    $arrays['items.bar'] = 'Bar';

    $this->assertEquals(
        'Foo',
        $arrays['items.foo']
    );

    $this->assertEquals(
        'Bar',
        $arrays['items.bar']
    );

    $arrays->offsetUnset('items.foo');

    $this->assertFalse(
        isset($arrays['items.foo'])
    );

    unset($arrays['items.bar']);

    $this->assertFalse(
        isset($arrays['items.bar'])
    );
});

test('test offsetExists() method', function (): void {
    $arrays              = Arrays::create();
    $arrays['items.foo'] = 'Foo';
    $arrays['items.bar'] = 'Bar';

    $this->assertEquals(
        'Foo',
        $arrays['items.foo']
    );

    $this->assertEquals(
        'Bar',
        $arrays['items.bar']
    );

    $this->assertTrue(
        isset($arrays['items.foo'])
    );

    $this->assertTrue(
        isset($arrays['items.bar'])
    );

    $this->assertTrue(
        $arrays->offsetExists(['items.foo'])
    );

    $this->assertTrue(
        $arrays->offsetExists(['items.bar'])
    );
});

test('test getIterator() method', function (): void {
    $this->assertInstanceOf(
        ArrayIterator::class,
        Arrays::create()->getIterator()
    );
});


test('test extract() method', function (): void {
    $this->assertEquals(
        2,
        Arrays::create(['items' => ['catalog' => ['reviews' => [['name' => 'Sam'], ['name' => 'Jack']]]]])->extract('items.catalog.reviews')->count()
    );

    $this->assertEquals(
        ['name' => 'Jack'],
        Arrays::create(['items' => ['catalog' => ['reviews' => [0 => ['name' => 'Sam'], 1 => ['name' => 'Jack']]]]])
                    ->extract('items.catalog.reviews')
                    ->last()
    );
    $this->assertEquals(
        ['name' => 'Jack'],
        Arrays::create(['items' => ['catalog' => ['reviews' => [0 => ['name' => 'Sam'], 1 => ['name' => 'Jack']]]]])
                    ->extract('items')
                    ->extract('catalog')
                    ->extract('reviews')
                    ->last()
    );

    $this->assertEquals(
        [['name' => 'Sam'], ['name' => 'Jack']],
        Arrays::create(['items' => ['catalog' => ['reviews' => [['name' => 'Sam'], ['name' => 'Jack']]]]])
                    ->extract('items.catalog.reviews')
                    ->all()
    );


    $this->assertEquals(
        60,
        Arrays::create(['items' => ['catalog' => ['nums' => [10, 20, 30]]]])
                    ->extract('items.catalog.nums')
                    ->sum()
    );

    $this->assertEquals(
        8,
        Arrays::create(['items' => ['catalog' => ['nums' => [2, 2, 2]]]])
                    ->extract('items.catalog.nums')
                    ->product()
    );
});

test('test macro() method', function (): void {
    Arrays::macro('customMethod', function($arg1 = 1, $arg2 = 1) {
        return $this->count() + $arg1 + $arg2;
    });
    $arrays = new Arrays([1, 2, 3]);
    $this->assertEquals(6, $arrays->customMethod(1, 2));
    $this->assertEquals(5, $arrays->customMethod());
});
