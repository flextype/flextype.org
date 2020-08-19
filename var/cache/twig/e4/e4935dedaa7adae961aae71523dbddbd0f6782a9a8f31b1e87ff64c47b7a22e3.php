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

/* themes/noir-flextype/templates/theme.html */
class __TwigTemplate_e1032d90012a6cd67b7699acc3607900982916a36f04682ffb1dc4d96267bb6c extends \Twig\Template
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
        return $this->loadTemplate((("themes/" . twig_get_attribute($this->env, $this->source, ($context["registry"] ?? null), "get", [0 => "plugins.site.settings.theme"], "method", false, false, false, 1)) . "/templates/partials/base.html"), "themes/noir-flextype/templates/theme.html", 1);
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
        echo "
";
        // line 5
        $context["name"] = twig_last($this->env, twig_split_filter($this->env, ($context["uri"] ?? null), "/"));
        // line 6
        echo "
<div class=\"container mx-auto bg-white text-black pb-24\">
    <div class=\"uppercase text-center pt-24 pb-24 m-0\">
        <div>
            <h1 class=\"text-3xl lg:text-6xl mb-0\"><a class=\"no-underline\" href=\"";
        // line 10
        echo $this->extensions['Flextype\UrlTwigExtension']->url();
        echo "/";
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "/downloads/extend/themes/";
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "title", [], "any", false, false, false, 10), "html", null, true);
        echo "</a></h1>
        </div>
        <div>
            <span class=\"opacity-50\"><a class=\"no-underline\" href=\"";
        // line 13
        echo $this->extensions['Flextype\UrlTwigExtension']->url();
        echo "/";
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "/downloads\">DOWNLOADS</a></span>
            <span class=\"opacity-50\">/</span>
            <span class=\"opacity-50\"><a class=\"no-underline\" href=\"";
        // line 15
        echo $this->extensions['Flextype\UrlTwigExtension']->url();
        echo "/";
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "/downloads/extend\">EXTEND</a></span>
            <span class=\"opacity-50\">/</span>
            <span class=\"opacity-50\"><a class=\"no-underline\" href=\"";
        // line 17
        echo $this->extensions['Flextype\UrlTwigExtension']->url();
        echo "/";
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "/downloads/extend/themes\">THEMES</a></span>
        </div>
    </div>
    <div>
        ";
        // line 21
        $context["repo_name"] = twig_split_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "github", [], "any", false, false, false, 21), "/");
        // line 22
        echo "        ";
        $context["repo_name_length"] = twig_length_filter($this->env, ($context["repo_name"] ?? null));
        // line 23
        echo "
        ";
        // line 24
        $context["theme"] = $this->extensions['Flextype\SerializerTwigExtension']->decode($this->extensions['Flextype\FilesystemTwigExtension']->read((((("https://raw.githubusercontent.com/" . (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["repo_name"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4[(($context["repo_name_length"] ?? null) - 2)] ?? null) : null)) . "/") . (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = ($context["repo_name"] ?? null)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144[(($context["repo_name_length"] ?? null) - 1)] ?? null) : null)) . "/master/theme.yaml")), "yaml");
        // line 25
        echo "
        <div class=\"p-6 text-black mb-6\">
            <div class=\"flex align-middle items-center\">
                <div class=\"text-left\">
                    <h4 class=\"text-2xl pb-0 mb-0 block\">";
        // line 29
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "name", [], "any", false, false, false, 29), "html", null, true);
        echo "</h4>
                    <p class=\"m-0\">
                        ";
        // line 31
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "description", [], "any", false, false, false, 31), "html", null, true);
        echo "
                    </p>
                    <p class=\"m-0 text-sm\">
                        <a class=\"no-underline\" href=\"#\">";
        // line 34
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "author", [], "any", false, false, false, 34), "name", [], "any", false, false, false, 34), "html", null, true);
        echo "</a>
                    </p>
                </div>
                <div class=\"flex-grow\"></div>
                <div>
                    <a class=\"pl-6 pr-6 pt-2 pb-2 button text-base wow fadeIn\"
                    href=\"";
        // line 40
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "github", [], "any", false, false, false, 40), "html", null, true);
        echo "/releases/download/v";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "version", [], "any", false, false, false, 40), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "version", [], "any", false, false, false, 40), "html", null, true);
        echo ".zip\">DOWNLOAD</a>
                </div>
            </div>
        </div>

        <hr class=\"mb-6 mb-6 border-1\" style=\"border-color: #f8f9fb;\">

        ";
        // line 47
        if (twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "content", [], "any", false, false, false, 47)) {
            // line 48
            echo "            ";
            echo $this->extensions['Flextype\MarkdownTwigExtension']->markdown($this->extensions['Flextype\ShortcodesTwigExtension']->shortcode(twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "content", [], "any", false, false, false, 48)));
            echo "
        <hr class=\"mb-6 mb-6 border-1\" style=\"border-color: #f8f9fb;\">
        ";
        }
        // line 51
        echo "
        ";
        // line 52
        if (twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "preview", [], "any", false, false, false, 52)) {
            // line 53
            echo "        <div class=\"text-center\">
            <img class=\"\" src=\"";
            // line 54
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "preview", [], "any", false, false, false, 54), "html", null, true);
            echo "\" alt=\"\">
        </div>
        <hr class=\"mb-6 mb-6 border-1\" style=\"border-color: #f8f9fb;\">
        ";
        }
        // line 58
        echo "
        <div class=\"p-6 text-black mb-6\">
            <h4>Information</h4>
            <div class=\"flex content-center flex-wrap\">
                <div class=\"w-full lg:w-3/12\">
                    <p class=\"m-0 opacity-50\">Version</p>
                    <p>";
        // line 64
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "version", [], "any", false, false, false, 64), "html", null, true);
        echo "</p>
                </div>
                <div class=\"w-full lg:w-3/12\">
                    <p class=\"m-0 opacity-50\">Lincense</p>
                    <p>";
        // line 68
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "license", [], "any", false, false, false, 68), "html", null, true);
        echo "</p>
                </div>
                <div class=\"w-full lg:w-3/12\">
                    <p class=\"m-0 opacity-50\">Dependencies</p>
                    ";
        // line 72
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "dependencies", [], "any", false, false, false, 72));
        foreach ($context['_seq'] as $context["key"] => $context["val"]) {
            // line 73
            echo "                        <a href=\"";
            echo $this->extensions['Flextype\UrlTwigExtension']->url();
            echo "/";
            echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
            echo "/downloads/extend/themes/";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "</a>: ";
            echo twig_escape_filter($this->env, $context["val"], "html", null, true);
            echo "<br>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['val'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 75
        echo "                </div>
                <div class=\"w-full lg:w-3/12\">
                    <p class=\"m-0 opacity-50\">Links</p>
                    <p>
                        ";
        // line 79
        if (twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "homepage", [], "any", false, false, false, 79)) {
            echo "<a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "homepage", [], "any", false, false, false, 79), "html", null, true);
            echo "\">Homepage</a><br>";
        }
        // line 80
        echo "                        ";
        if (twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "documentation", [], "any", false, false, false, 80)) {
            echo "<a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "documentation", [], "any", false, false, false, 80), "html", null, true);
            echo "\">Documentation</a><br>";
        }
        // line 81
        echo "                        ";
        if (twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "changelog", [], "any", false, false, false, 81)) {
            echo "<a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "changelog", [], "any", false, false, false, 81), "html", null, true);
            echo "\">Changelog</a><br>";
        }
        // line 82
        echo "                        ";
        if (twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "bugs", [], "any", false, false, false, 82)) {
            echo "<a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "bugs", [], "any", false, false, false, 82), "html", null, true);
            echo "\">Issues</a>";
        }
        // line 83
        echo "                    </p>
                </div>
            </div>
            <div class=\"flex content-center flex-wrap\">
                <div class=\"w-full\">
                    <p class=\"m-0 opacity-50\">Tags</p>
                    <p>
                        ";
        // line 90
        $context["keywords"] = twig_replace_filter(twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "keywords", [], "any", false, false, false, 90), [" " => ""]);
        // line 91
        echo "                        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_split_filter($this->env, ($context["keywords"] ?? null), ","));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
            // line 92
            echo "                            <a class=\"no-underline\" href=\"";
            echo $this->extensions['Flextype\UrlTwigExtension']->url();
            echo "/";
            echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
            echo "/downloads/extend/themes?tag=";
            echo twig_escape_filter($this->env, twig_trim_filter($context["tag"]), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_trim_filter($context["tag"]), "html", null, true);
            echo "</a>";
            if ( !twig_get_attribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 92)) {
                echo ", ";
            }
            // line 93
            echo "                        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tag'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 94
        echo "                    </p>
                </div>
            </div>
        </div>

        <hr class=\"mb-6 mb-6 border-1\" style=\"border-color: #f8f9fb;\">

        <div class=\"p-2 text-black mb-6\">
            <h4>Other themes by ";
        // line 102
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "author", [], "any", false, false, false, 102), "name", [], "any", false, false, false, 102), "html", null, true);
        echo "</h4>
            ";
        // line 103
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "author", [], "any", false, false, false, 103), "email", [], "any", false, false, false, 103))) {
            // line 104
            echo "                ";
            $context["related_themes"] = twig_get_attribute($this->env, $this->source, ($context["entries"] ?? null), "fetch", [0 => (($context["locale"] ?? null) . "/downloads/extend/themes"), 1 => ["where" => ["key" => "author.email", "expr" => "eq", "value" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 108
($context["entry"] ?? null), "author", [], "any", false, false, false, 108), "email", [], "any", false, false, false, 108)], "and_where" => [0 => ["key" => "visibility", "expr" => "nin", "value" => [0 => "draft", 1 => "hidden"]]]]], "method", false, false, false, 104);
            // line 116
            echo "
                ";
            // line 117
            if ((twig_length_filter($this->env, ($context["related_themes"] ?? null)) > 0)) {
                // line 118
                echo "
                <div class=\"flex content-center flex-wrap mt-10\">
                    ";
                // line 120
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["related_themes"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["related_theme"]) {
                    // line 121
                    echo "                        ";
                    if ((twig_get_attribute($this->env, $this->source, $context["related_theme"], "slug", [], "any", false, false, false, 121) != twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "slug", [], "any", false, false, false, 121))) {
                        // line 122
                        echo "                        <a href=\"";
                        echo $this->extensions['Flextype\UrlTwigExtension']->url();
                        echo "/";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["related_theme"], "slug", [], "any", false, false, false, 122), "html", null, true);
                        echo "\" class=\"w-full p-2 lg:w-6/12 no-underline\">
                            <div class=\"flex p-6 text-black align-middle extend wow fadeIn\">
                                <img src=\"";
                        // line 124
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["related_theme"], "preview", [], "any", false, false, false, 124), "html", null, true);
                        echo "\" alt=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["related_theme"], "title", [], "any", false, false, false, 124), "html", null, true);
                        echo "\" style=\"height: 120px; margin-right: 20px;\">
                                <div class=\"text-left\">
                                    <h4 class=\"text-xl pb-0 mb-0 block\">";
                        // line 126
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["related_theme"], "title", [], "any", false, false, false, 126), "html", null, true);
                        echo "</h4>
                                    <p class=\"m-0\">
                                        ";
                        // line 128
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["related_theme"], "description", [], "any", false, false, false, 128), "html", null, true);
                        echo "
                                    </p>
                                </div>
                            </div>
                        </a>
                        ";
                    }
                    // line 134
                    echo "                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['related_theme'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 135
                echo "                </div>

                ";
            }
            // line 138
            echo "            ";
        }
        // line 139
        echo "        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "themes/noir-flextype/templates/theme.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  382 => 139,  379 => 138,  374 => 135,  368 => 134,  359 => 128,  354 => 126,  347 => 124,  339 => 122,  336 => 121,  332 => 120,  328 => 118,  326 => 117,  323 => 116,  321 => 108,  319 => 104,  317 => 103,  313 => 102,  303 => 94,  289 => 93,  276 => 92,  258 => 91,  256 => 90,  247 => 83,  240 => 82,  233 => 81,  226 => 80,  220 => 79,  214 => 75,  197 => 73,  193 => 72,  186 => 68,  179 => 64,  171 => 58,  164 => 54,  161 => 53,  159 => 52,  156 => 51,  149 => 48,  147 => 47,  131 => 40,  122 => 34,  116 => 31,  111 => 29,  105 => 25,  103 => 24,  100 => 23,  97 => 22,  95 => 21,  86 => 17,  79 => 15,  72 => 13,  60 => 10,  54 => 6,  52 => 5,  49 => 4,  45 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/noir-flextype/templates/theme.html", "/Applications/MAMP/htdocs/flextype.org/project/themes/noir-flextype/templates/theme.html");
    }
}
