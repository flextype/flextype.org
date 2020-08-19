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

/* themes/noir-flextype/templates/plugin.html */
class __TwigTemplate_1b68d6c4e095e7ac39809085ae6f935bca72c7e7d2a1786e1c4b410255aa0580 extends \Twig\Template
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
        return $this->loadTemplate((("themes/" . twig_get_attribute($this->env, $this->source, ($context["registry"] ?? null), "get", [0 => "plugins.site.settings.theme"], "method", false, false, false, 1)) . "/templates/partials/base.html"), "themes/noir-flextype/templates/plugin.html", 1);
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
        echo "/downloads/extend/plugins/";
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
        echo "/downloads/extend/plugins\">PLUGINS</a></span>
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
        $context["plugin"] = $this->extensions['Flextype\SerializerTwigExtension']->decode($this->extensions['Flextype\FilesystemTwigExtension']->read((((("https://raw.githubusercontent.com/" . (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["repo_name"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4[(($context["repo_name_length"] ?? null) - 2)] ?? null) : null)) . "/") . (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = ($context["repo_name"] ?? null)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144[(($context["repo_name_length"] ?? null) - 1)] ?? null) : null)) . "/master/plugin.yaml")), "yaml");
        // line 25
        echo "
        <div class=\"p-6 text-black mb-6\">
            <div class=\"flex align-middle items-center\">
                <i class=\"";
        // line 28
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["plugin"] ?? null), "icon", [], "any", false, false, false, 28), "html", null, true);
        echo " text-6xl mr-5\"></i>
                <div class=\"text-left\">
                    <h4 class=\"text-2xl pb-0 mb-0 block\">";
        // line 30
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["plugin"] ?? null), "name", [], "any", false, false, false, 30), "html", null, true);
        echo "</h4>
                    <p class=\"m-0\">
                        ";
        // line 32
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["plugin"] ?? null), "description", [], "any", false, false, false, 32), "html", null, true);
        echo "
                    </p>
                    <p class=\"m-0 text-sm\">
                        <a class=\"no-underline\" href=\"#\">";
        // line 35
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["plugin"] ?? null), "author", [], "any", false, false, false, 35), "name", [], "any", false, false, false, 35), "html", null, true);
        echo "</a>
                    </p>
                </div>
                <div class=\"flex-grow\"></div>
                <div>
                    <a class=\"pl-6 pr-6 pt-2 pb-2 wow fadeIn button text-base\"
                    href=\"";
        // line 41
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "github", [], "any", false, false, false, 41), "html", null, true);
        echo "/releases/download/v";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["plugin"] ?? null), "version", [], "any", false, false, false, 41), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["plugin"] ?? null), "version", [], "any", false, false, false, 41), "html", null, true);
        echo ".zip\">DOWNLOAD</a>
                </div>
            </div>
        </div>

        <hr class=\"mb-6 mb-6 border-1\" style=\"border-color: #f8f9fb;\">

        ";
        // line 48
        if (twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "content", [], "any", false, false, false, 48)) {
            // line 49
            echo "            ";
            echo $this->extensions['Flextype\MarkdownTwigExtension']->markdown($this->extensions['Flextype\ShortcodesTwigExtension']->shortcode(twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "content", [], "any", false, false, false, 49)));
            echo "
            <hr class=\"mb-6 mb-6 border-1\" style=\"border-color: #f8f9fb;\">
        ";
        }
        // line 52
        echo "
        ";
        // line 53
        if (twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "preview", [], "any", false, false, false, 53)) {
            // line 54
            echo "            <div class=\"text-center\">
                <img class=\"\" src=\"";
            // line 55
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "preview", [], "any", false, false, false, 55), "html", null, true);
            echo "\" alt=\"\">
            </div>
            <hr class=\"mb-6 mb-6 border-1\" style=\"border-color: #f8f9fb;\">
        ";
        }
        // line 59
        echo "
        <div class=\"p-6 text-black mb-6\">
            <h4>Information</h4>
            <div class=\"flex content-center flex-wrap\">
                <div class=\"w-full lg:w-3/12\">
                    <p class=\"m-0 opacity-50\">Version</p>
                    <p>";
        // line 65
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["plugin"] ?? null), "version", [], "any", false, false, false, 65), "html", null, true);
        echo "</p>
                </div>
                <div class=\"w-full lg:w-3/12\">
                    <p class=\"m-0 opacity-50\">Lincense</p>
                    <p>";
        // line 69
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["plugin"] ?? null), "license", [], "any", false, false, false, 69), "html", null, true);
        echo "</p>
                </div>
                <div class=\"w-full lg:w-3/12\">
                    <p class=\"m-0 opacity-50\">Dependencies</p>
                    ";
        // line 73
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["plugin"] ?? null), "dependencies", [], "any", false, false, false, 73));
        foreach ($context['_seq'] as $context["key"] => $context["val"]) {
            // line 74
            echo "                        <a href=\"";
            echo $this->extensions['Flextype\UrlTwigExtension']->url();
            echo "/";
            echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
            echo "/downloads/extend/plugins/";
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
        // line 76
        echo "                </div>
                <div class=\"w-full lg:w-3/12\">
                    <p class=\"m-0 opacity-50\">Links</p>
                    <p>
                        ";
        // line 80
        if (twig_get_attribute($this->env, $this->source, ($context["plugin"] ?? null), "homepage", [], "any", false, false, false, 80)) {
            echo "<a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["plugin"] ?? null), "homepage", [], "any", false, false, false, 80), "html", null, true);
            echo "\">Homepage</a><br>";
        }
        // line 81
        echo "                        ";
        if (twig_get_attribute($this->env, $this->source, ($context["plugin"] ?? null), "documentation", [], "any", false, false, false, 81)) {
            echo "<a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["plugin"] ?? null), "documentation", [], "any", false, false, false, 81), "html", null, true);
            echo "\">Documentation</a><br>";
        }
        // line 82
        echo "                        ";
        if (twig_get_attribute($this->env, $this->source, ($context["plugin"] ?? null), "changelog", [], "any", false, false, false, 82)) {
            echo "<a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["plugin"] ?? null), "changelog", [], "any", false, false, false, 82), "html", null, true);
            echo "\">Changelog</a><br>";
        }
        // line 83
        echo "                        ";
        if (twig_get_attribute($this->env, $this->source, ($context["plugin"] ?? null), "bugs", [], "any", false, false, false, 83)) {
            echo "<a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["plugin"] ?? null), "bugs", [], "any", false, false, false, 83), "html", null, true);
            echo "\">Issues</a>";
        }
        // line 84
        echo "                    </p>
                </div>
            </div>
            <div class=\"flex content-center flex-wrap\">
                <div class=\"w-full\">
                    <p class=\"m-0 opacity-50\">Tags</p>
                    <p>
                        ";
        // line 91
        $context["keywords"] = twig_replace_filter(twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "keywords", [], "any", false, false, false, 91), [" " => ""]);
        // line 92
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
            // line 93
            echo "                            <a class=\"no-underline\" href=\"";
            echo $this->extensions['Flextype\UrlTwigExtension']->url();
            echo "/";
            echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
            echo "/downloads/extend/plugins?tag=";
            echo twig_escape_filter($this->env, twig_trim_filter($context["tag"]), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_trim_filter($context["tag"]), "html", null, true);
            echo "</a>";
            if ( !twig_get_attribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 93)) {
                echo ", ";
            }
            // line 94
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
        // line 95
        echo "                    </p>
                </div>
            </div>
        </div>

        <hr class=\"mb-6 mb-6 border-1\" style=\"border-color: #f8f9fb;\">

        <div class=\"p-2 text-black mb-6\">
            <h4>Other plugins by ";
        // line 103
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["plugin"] ?? null), "author", [], "any", false, false, false, 103), "name", [], "any", false, false, false, 103), "html", null, true);
        echo "</h4>
            ";
        // line 104
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "author", [], "any", false, false, false, 104), "email", [], "any", false, false, false, 104))) {
            // line 105
            echo "                ";
            $context["related_plugins"] = twig_get_attribute($this->env, $this->source, ($context["entries"] ?? null), "fetch", [0 => (($context["locale"] ?? null) . "/downloads/extend/plugins"), 1 => ["where" => ["key" => "author.email", "expr" => "eq", "value" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 109
($context["entry"] ?? null), "author", [], "any", false, false, false, 109), "email", [], "any", false, false, false, 109)], "and_where" => [0 => ["key" => "visibility", "expr" => "nin", "value" => [0 => "draft", 1 => "hidden"]]]]], "method", false, false, false, 105);
            // line 117
            echo "
                ";
            // line 118
            if ((twig_length_filter($this->env, ($context["related_plugins"] ?? null)) > 0)) {
                // line 119
                echo "
                <div class=\"flex content-center flex-wrap mt-10\">
                    ";
                // line 121
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["related_plugins"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["related_plugin"]) {
                    // line 122
                    echo "                        ";
                    if ((twig_get_attribute($this->env, $this->source, $context["related_plugin"], "slug", [], "any", false, false, false, 122) != twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "slug", [], "any", false, false, false, 122))) {
                        // line 123
                        echo "                        <a href=\"";
                        echo $this->extensions['Flextype\UrlTwigExtension']->url();
                        echo "/";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["related_plugin"], "slug", [], "any", false, false, false, 123), "html", null, true);
                        echo "\" class=\"w-full p-2 lg:w-6/12 no-underline\">
                            <div class=\"flex p-6 text-black align-middle extend wow fadeIn\">
                                <i class=\"";
                        // line 125
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["related_plugin"], "icon", [], "any", false, false, false, 125), "html", null, true);
                        echo " text-5xl mr-5\"></i>
                                <div class=\"text-left\">
                                    <h4 class=\"text-xl pb-0 mb-0 block\">";
                        // line 127
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["related_plugin"], "title", [], "any", false, false, false, 127), "html", null, true);
                        echo "</h4>
                                    <p class=\"m-0\">
                                        ";
                        // line 129
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["related_plugin"], "description", [], "any", false, false, false, 129), "html", null, true);
                        echo "
                                    </p>
                                </div>
                            </div>
                        </a>
                        ";
                    }
                    // line 135
                    echo "                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['related_plugin'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 136
                echo "                </div>

                ";
            }
            // line 139
            echo "            ";
        }
        // line 140
        echo "        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "themes/noir-flextype/templates/plugin.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  384 => 140,  381 => 139,  376 => 136,  370 => 135,  361 => 129,  356 => 127,  351 => 125,  343 => 123,  340 => 122,  336 => 121,  332 => 119,  330 => 118,  327 => 117,  325 => 109,  323 => 105,  321 => 104,  317 => 103,  307 => 95,  293 => 94,  280 => 93,  262 => 92,  260 => 91,  251 => 84,  244 => 83,  237 => 82,  230 => 81,  224 => 80,  218 => 76,  201 => 74,  197 => 73,  190 => 69,  183 => 65,  175 => 59,  168 => 55,  165 => 54,  163 => 53,  160 => 52,  153 => 49,  151 => 48,  135 => 41,  126 => 35,  120 => 32,  115 => 30,  110 => 28,  105 => 25,  103 => 24,  100 => 23,  97 => 22,  95 => 21,  86 => 17,  79 => 15,  72 => 13,  60 => 10,  54 => 6,  52 => 5,  49 => 4,  45 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/noir-flextype/templates/plugin.html", "/Applications/MAMP/htdocs/flextype.org/project/themes/noir-flextype/templates/plugin.html");
    }
}
