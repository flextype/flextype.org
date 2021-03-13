---
title: Flextype
description: Common part of Flextype is a Flextype Core Class that extends Slim Framework that we are using under the hood. Slim is amazing PHP micro framework that helps quickly write simple yet powerful web applications and APIs.
template: docs 
breadcrumbs:
  -
    title: "Core Concepts"
    link: "[url]/documentation/core/"
on_this_page:
  -
    title: "Methods"
    link: "methods"
    level2:
      -
        title: "getInstance()"
        link: "methods-getInstance"
      -
        title: "getVersion()"
        link: "methods-getVersion"
      -
        title: "container()"
        link: "methods-container"
  -
    title: "Services"
    link: "services"
---

Common part of Flextype is a Flextype Core Class that extends [Slim Framework](//slimframework.com) that we are using under the hood. Slim is amazing PHP micro framework that helps quickly write simple yet powerful web applications and APIs.

**Slim Framework Resources**
* **Website:** [slimframework.com](//slimframework.com)
* **Documentation:** [slimframework.com/docs/v3/](//slimframework.com/docs/v3/)
* **Repository:** [github.com/slimphp/Slim](//github.com/slimphp/Slim)

Getting back to Flextype Core.

With help of Flextype Core Class we are able to access all features and develop a new amazing features for Flextype powered project.

### <a name="methods"></a> Methods

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Method</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><a href="#methods-getInstance">getInstance()</a></td>
                <td>Get the available Flextype Application instance.</td>
            </tr>
            <tr>
                <td><a href="#methods-getVersion">getVersion()</a></td>
                <td>Get current Flextype version.</td>
            </tr>
            <tr>
                <td><a href="#methods-container">container()</a></td>
                <td>Get and Set Dependency Injection Container.</td>
            </tr>
        </tbody>
    </table>
</div>

### Methods Details

##### <a name="methods-getInstance"></a> `getInstance()`

Get the available Flextype Application instance.

```php
/**
 * Returns Flextype Instance
 *
 * @param ContainerInterface|array $container Container.
 */
public static function getInstance($container = []): Flextype
```

**Examples**

```php
$instance = Flextype::getInstance();
```

##### <a name="methods-getVersion"></a> `getVersion()`

Get current Flextype version.

```php
/**
 * Returns the current Flextype version
 */
public function getVersion(): string
```

**Examples**

```php
$version = Flextype::getInstance()->getVersion();
```

##### <a name="methods-container"></a> `container()`

Get and Set Dependency Injection Container.

```php
/**
 * Get/Set Dependency Injection Container.
 *
 * @param string|null $name DI Container name.
 */
public function container(?string $name = null)
```

**Examples**

```php
// Get container object.
$container = Flextype::getInstance()->container();

// Set new container.
Flextype::getInstance()->container()['name'] = function () {
    return new ServiceName();
};

// Get specific container object by name.
$entries = Flextype::getInstance()->container('entries');
```

We recommend to use our `flextype()` helper function to access all Flexype Application methods, set and get containers.

**Examples**

```php
// Get the available Flextype Application instance.
$instance = flextype();

// Get current Flextype version.
$version = flextype()->getVersion();

// Get container object.
$container = flextype()->container();

// Set new container.
flextype()->container()['name'] = function () {
    return new ServiceName();
};

// Get specific container object by name
$entries = flextype()->container('entries');

// ... or even better :)
$entries = flextype('entries');
```

With `flextype()` helper function you can access Flexype Application and all available Slim Framework methods.

**Examples**

```php
// Add new GET route.
flextype()
  ->get('/dashboard', 'DashboardController:index')
  ->setName('admin.dashboard.index');

// Add new POST route.
flextype()
  ->get('/save-form', 'CustomServiceController:saveForm')
  ->setName('service.form.index');
```

Check all available methods: [//slimframework.com/docs/v3/](//slimframework.com/docs/v3/)

### Services <a name="services"></a>

List of available registered services in Flextype Dependency Injection Container.

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Links</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>session</td>
                <td><a href="https://github.com/atomastic/session">documentation</a></td>
            </tr>
            <tr>
                <td>registry</td>
                <td><a href="https://github.com/atomastic/registry">documentation</a></td>
            </tr>
            <tr>
                <td>logger</td>
                <td><a href="https://github.com/Seldaek/monolog">documentation</a></td>
            </tr>
            <tr>
                <td>emitter</td>
                <td><a href="https://event.thephpleague.com">documentation</a></td>
            </tr>
            <tr>
                <td>slugify</td>
                <td><a href="https://github.com/cocur/slugify">documentation</a></td>
            </tr>
            <tr>
                <td>cache</td>
                <td><a href="https://www.phpfastcache.com">documentation</a></td>
            </tr>
            <tr>
                <td>parsers</td>
                <td><a href="[url]/documentation/parsers">documentation</a></td>
            </tr>
            <tr>
                <td>serializers</td>
                <td><a href="[url]/documentation/serializers">documentation</a></td>
            </tr>
            <tr>
                <td>images</td>
                <td><a href="https://glide.thephpleague.com">documentation</a></td>
            </tr>
            <tr>
                <td>entries</td>
                <td><a href="[url]/documentation/core/entries">documentation</a></td>
            </tr>
            <tr>
                <td>media</td>
                <td><a href="[url]/documentation/core/media">documentation</a></td>
            </tr>
            <tr>
                <td>plugins</td>
                <td><a href="[url]/documentation/core/plugins">documentation</a></td>
            </tr>
            <tr>
                <td>cors</td>
                <td><a href="#">documentation</a></td>
            </tr>
        </tbody>
    </table>
</div>
