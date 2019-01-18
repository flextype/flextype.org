# View Component
![version](https://img.shields.io/badge/version-1.1.1-brightgreen.svg?style=flat-square "Version")
[![MIT License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](https://github.com/flextype-components/view/blob/master/LICENSE)

View Component provides basic methods for displaying PHP views.

### Installation

```
composer require flextype-components/View
```

### Usage

```php
use Flextype\Component\View\View;
```

Create a new view object and render it.
```php
// Create new view object
$view = new View('blog/views/backend/index');

// Assign some new variables
$view->assign('msg', 'Some message...');

// Get view
$output = $view->render();

// Display view
echo $output;
```

View factory  
Create new view object, assign some variables
and displays the rendered view in the browser.
```php
View::factory('blog/views/backend/index')
     ->assign('msg', 'Some message...')
     ->display();
```

Include the view file and extracts the view variables before returning the generated output.
```php
// Get view
$output = $view->render();

// Display output
echo $output;
```

Displays the rendered view in the browser.
```php
$view->display();
```

## License
See [LICENSE](https://github.com/flextype-components/view/blob/master/LICENSE)
