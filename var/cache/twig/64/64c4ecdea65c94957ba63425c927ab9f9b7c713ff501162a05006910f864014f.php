<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/noir-flextype/templates/api-token-generator.html */
class __TwigTemplate_2a8e942ff69d3140f499d4b769daed2b2b530cd5c79a226d4b1cef7e06c980c8 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return $this->loadTemplate((("themes/" . twig_get_attribute($this->env, $this->source, ($context["registry"] ?? null), "get", [0 => "plugins.site.settings.theme"], "method", false, false, false, 1)) . "/templates/partials/base.html"), "themes/noir-flextype/templates/api-token-generator.html", 1);
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "    <div class=\"container mx-auto bg-white text-black pb-24\">
        <h1 class=\"uppercase text-center text-3xl lg:text-6xl m-0 pt-24 pb-24\">
            ";
        // line 6
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "title", [], "any", false, false, false, 6);
        echo "
        </h1>
        <div class=\"w-full p-2 text-center\">
            <div class=\"p-12 h-full text-black rounded-lg\" style=\"background-color: #f8f9fb;\">
                <h3 class=\"m-0\">Refresh this page to generate a new unique set of API Tokens.</h3>
            </div>
        </div>
        <div>
            <div class=\"flex content-center flex-wrap\">
                <div class=\"w-full lg:w-6/12 p-2 text-center\">
                    <div class=\"p-12 h-full text-black rounded-lg\" style=\"background-color: #f8f9fb;\">
                        <i class=\"fas fa-database text-6xl mb-5\" aria-hidden=\"true\"></i>
                        <h4 class=\"text-xl\">Entries Rest API</h4>
                        <div class=\"mb-10\">
                            Token: ";
        // line 20
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["api_tokens"] ?? null), "entries", [], "any", false, false, false, 20), "uuid", [], "any", false, false, false, 20), "html", null, true);
        echo " <br><br>
                            <div class=\"text-left\">
                                1. Create Entries token folder <code>";
        // line 22
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["api_tokens"] ?? null), "entries", [], "any", false, false, false, 22), "uuid", [], "any", false, false, false, 22), "html", null, true);
        echo "</code> in <code>project/tokens/entries/</code>

                                <br><br>

                                2. And add <code>token.yaml</code> file with content:<br><br>

                                <div class=\"bg-white text-black rounded-lg p-4\">
                                    title: Default<br>
                                    icon: 'fas fa-database'<br>
                                    limit_calls: 0<br>
                                    calls: 0<br>
                                    state: enabled
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=\"w-full lg:w-6/12 p-2 text-center\">
                    <div class=\"p-12 h-full text-black rounded-lg\" style=\"background-color: #f8f9fb;\">
                        <i class=\"fas fa-archive text-6xl mb-5\" aria-hidden=\"true\"></i>
                        <h4 class=\"text-xl\">Registry Rest API</h4>
                        <div class=\"mb-10\">
                            Token: ";
        // line 44
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["api_tokens"] ?? null), "registry", [], "any", false, false, false, 44), "uuid", [], "any", false, false, false, 44), "html", null, true);
        echo " <br><br>
                            <div class=\"text-left\">
                                1. Create Registry token folder <code>";
        // line 46
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["api_tokens"] ?? null), "registry", [], "any", false, false, false, 46), "uuid", [], "any", false, false, false, 46), "html", null, true);
        echo "</code> in <code>project/tokens/registry/</code>

                                <br><br>

                                2. And add <code>token.yaml</code> file with content:<br><br>

                                <div class=\"bg-white text-black rounded-lg p-4\">
                                    title: Default<br>
                                    icon: 'fas fa-archive'<br>
                                    limit_calls: 0<br>
                                    calls: 0<br>
                                    state: enabled
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=\"w-full lg:w-6/12 p-2 text-center\">
                    <div class=\"p-12 h-full text-black rounded-lg\" style=\"background-color: #f8f9fb;\">
                        <i class=\"fas fa-file text-6xl mb-5\" aria-hidden=\"true\"></i>
                        <h4 class=\"text-xl\">Files Rest API</h4>
                        <div class=\"mb-10\">
                            Token: ";
        // line 68
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["api_tokens"] ?? null), "files", [], "any", false, false, false, 68), "uuid", [], "any", false, false, false, 68), "html", null, true);
        echo " <br><br>
                            <div class=\"text-left\">
                                1. Create Files token folder <code>";
        // line 70
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["api_tokens"] ?? null), "files", [], "any", false, false, false, 70), "uuid", [], "any", false, false, false, 70), "html", null, true);
        echo "</code> in <code>project/tokens/files/</code>

                                <br><br>

                                2. And add <code>token.yaml</code> file with content:<br><br>

                                <div class=\"bg-white text-black rounded-lg p-4\">
                                    title: Default<br>
                                    icon: 'fas fa-file'<br>
                                    limit_calls: 0<br>
                                    calls: 0<br>
                                    state: enabled
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=\"w-full lg:w-6/12 p-2 text-center\">
                    <div class=\"p-12 h-full text-black rounded-lg\" style=\"background-color: #f8f9fb;\">
                        <i class=\"fas fa-folder text-6xl mb-5\" aria-hidden=\"true\"></i>
                        <h4 class=\"text-xl\">Folders Rest API</h4>
                        <div class=\"mb-10\">
                            Token: ";
        // line 92
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["api_tokens"] ?? null), "folders", [], "any", false, false, false, 92), "uuid", [], "any", false, false, false, 92), "html", null, true);
        echo " <br><br>
                            <div class=\"text-left\">
                                1. Create Folders token folder <code>";
        // line 94
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["api_tokens"] ?? null), "folders", [], "any", false, false, false, 94), "uuid", [], "any", false, false, false, 94), "html", null, true);
        echo "</code> in <code>project/tokens/folders/</code>

                                <br><br>

                                2. And add <code>token.yaml</code> file with content:<br><br>

                                <div class=\"bg-white text-black rounded-lg p-4\">
                                    title: Default<br>
                                    icon: 'fas fa-folder'<br>
                                    limit_calls: 0<br>
                                    calls: 0<br>
                                    state: enabled
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=\"w-full lg:w-6/12 p-2 text-center\">
                    <div class=\"p-12 h-full text-black rounded-lg\" style=\"background-color: #f8f9fb;\">
                        <i class=\"far fa-images text-6xl mb-5\" aria-hidden=\"true\"></i>
                        <h4 class=\"text-2xl\">Images Rest API</h4>
                        <div class=\"mb-10\">
                            Token: ";
        // line 116
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["api_tokens"] ?? null), "images", [], "any", false, false, false, 116), "uuid", [], "any", false, false, false, 116), "html", null, true);
        echo " <br><br>
                            <div class=\"text-left\">
                                1. Create Images token folder <code>";
        // line 118
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["api_tokens"] ?? null), "images", [], "any", false, false, false, 118), "uuid", [], "any", false, false, false, 118), "html", null, true);
        echo "</code> in <code>/project/tokens/images/</code>

                                <br><br>

                                2. And add <code>token.yaml</code> file with content:<br><br>

                                <div class=\"bg-white text-black rounded-lg p-4\">
                                    title: Default<br>
                                    icon: 'far fa-images'<br>
                                    limit_calls: 0<br>
                                    calls: 0<br>
                                    state: enabled
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=\"w-full lg:w-6/12 p-2 text-center\">
                    <div class=\"p-12 h-full text-black rounded-lg\" style=\"background-color: #f8f9fb;\">
                        <i class=\"fas fa-user-shield text-6xl mb-5\" aria-hidden=\"true\"></i>
                        <h4 class=\"text-xl\">Access</h4>
                        <div class=\"mb-10\">
                            Token: ";
        // line 140
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["api_tokens"] ?? null), "access", [], "any", false, false, false, 140), "uuid", [], "any", false, false, false, 140), "html", null, true);
        echo " <br><br>
                            <div class=\"text-left\">
                                1. Create Content Management API Token folder <code>";
        // line 142
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["api_tokens"] ?? null), "access", [], "any", false, false, false, 142), "uuid", [], "any", false, false, false, 142), "html", null, true);
        echo "</code> in <code>/project/tokens/access/</code>

                                <br><br>

                                2. And add <code>token.yaml</code> file with content:<br><br>

                                <div class=\"bg-white text-black rounded-lg p-4\">
                                    title: Default<br>
                                    icon: 'fas fa-user-shield'<br>
                                    limit_calls: 0<br>
                                    calls: 0<br>
                                    state: enabled
                                </div>

                                <br>
                                <div class=\"bg-red-700 rounded-lg p-4 text-white\"><b>Note:</b> This your secret access token and it is should not be shared!</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "themes/noir-flextype/templates/api-token-generator.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  225 => 142,  220 => 140,  195 => 118,  190 => 116,  165 => 94,  160 => 92,  135 => 70,  130 => 68,  105 => 46,  100 => 44,  75 => 22,  70 => 20,  53 => 6,  49 => 4,  45 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/noir-flextype/templates/api-token-generator.html", "/Applications/MAMP/htdocs/flextype.org/project/themes/noir-flextype/templates/api-token-generator.html");
    }
}
