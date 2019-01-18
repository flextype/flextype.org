<?php

/**
 * @package Flextype Components
 *
 * @author Sergey Romanenko <awilum@yandex.ru>
 * @link http://components.flextype.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flextype\Component\View;

class View
{
    /**
     * Path to view file.
     *
     * @var string
     */
    protected $view_file;

    /**
     * View variables.
     *
     * @var array
     */
    protected $vars = [];

    /**
     * Global view variables.
     *
     * @var array
     */
    protected static $global_vars = [];

    /**
     * The output.
     *
     * @var string
     */
    protected $output;

    /**
     * View extension.
     *
     * @var string
     */
    public static $view_ext = '.php';

    /**
     * Create a new view object.
     *
     * // Create new view object
     * $view = new View('blog/views/backend/index');
     *
     * // Assign some new variables
     * $view->assign('msg', 'Some message...');
     *
     * // Get view
     * $output = $view->render();
     *
     * // Display view
     * echo $output;
     *
     * @param string $view      Name of the view file
     * @param array  $variables Array of view variables
     */
    public function __construct(string $view, array $variables = [])
    {
        // Is view file exists ?
        if (!file_exists($view . View::$view_ext)) {
            throw new \RuntimeException(vsprintf("%s(): The '%s' view does not exist.", array(__METHOD__, $view)));
        }

        // Set view file
        $this->view_file = $view . View::$view_ext;

        // Set view variables
        $this->vars = $variables;
    }

    /**
     * View factory
     *
     * // Create new view object, assign some variables
     * // and displays the rendered view in the browser.
     * View::factory('blog/views/backend/index')
     *     ->assign('msg', 'Some message...')
     *     ->display();
     *
     * @param  string $view      Name of the view file
     * @param  array  $variables Array of view variables
     * @return View
     */
    public static function factory(string $view, array $variables = [])
    {
        return new View($view, $variables);
    }

    /**
     * Assign a view variable.
     *
     * $view->assign('msg', 'Some message...');
     *
     * @param  string  $key    Variable name
     * @param  mixed   $value  Variable value
     * @param  bool $global Set variable available in all views
     * @return View
     */
    public function assign(string $key, $value, bool $global = false)
    {
        // Assign a new view variable (global or locale)
        if ($global === false) {
            $this->vars[$key] = $value;
        } else {
            View::$global_vars[$key] = $value;
        }

        return $this;
    }

    /**
     * Include the view file and extracts the view variables before returning the generated output.
     *
     * // Get view
     * $output = $view->render();
     *
     * // Display output
     * echo $output;
     *
     * @param  string $filter Callback function used to filter output
     * @return string
     */
    public function render($filter = null) : string
    {
        // Is output empty ?
        if (empty($this->output)) {

            // Extract variables as references
            extract(array_merge($this->vars, View::$global_vars), EXTR_REFS);

            // Turn on output buffering
            ob_start();

            // Include view file
            include($this->view_file);

            // Output...
            $this->output = ob_get_clean();
        }

        // Filter output ?
        if ($filter !== null) {
            $this->output = call_user_func($filter, $this->output);
        }

        // Return output
        return $this->output;
    }

    /**
     * Displays the rendered view in the browser.
     *
     * $view->display();
     *
     */
    public function display()
    {
        echo $this->render();
    }

    /**
     * Magic setter method that assigns a view variable.
     *
     * @param string $key   Variable name
     * @param mixed  $value Variable value
     */
    public function __set(string $key, $value)
    {
        $this->vars[$key] = $value;
    }

    /**
     * Magic getter method that returns a view variable.
     *
     * @param  string $key Variable name
     * @return mixed
     */
    public function __get(string $key)
    {
        if (isset($this->vars[$key])) {
            return $this->vars[$key];
        }
    }

    /**
     * Magic isset method that checks if a view variable is set.
     *
     * @param  string  $key Variable name
     * @return bool
     */
    public function __isset(string $key) : bool
    {
        return isset($this->vars[$key]);
    }

    /**
     * Magic unset method that unsets a view variable.
     *
     * @param string $key Variable name
     */
    public function __unset(string $key)
    {
        unset($this->vars[$key]);
    }

    /**
     * Method that magically converts the view object into a string.
     *
     * @return string
     */
    public function __toString() : string
    {
        return $this->render();
    }
}
