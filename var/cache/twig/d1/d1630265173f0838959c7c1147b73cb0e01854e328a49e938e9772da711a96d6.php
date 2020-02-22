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

/* themes/noir-flextype/templates/partials/base.html */
class __TwigTemplate_28083b9f8019435232f0e5ef90daeb9aa167e39e74223d158b89ac375f835c11 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'head' => [$this, 'block_head'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!doctype html>
<html lang=\"";
        // line 2
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "\">
    ";
        // line 3
        $context["entry_locale"] = twig_get_attribute($this->env, $this->source, ($context["entries"] ?? null), "fetch", [0 => ($context["locale"] ?? null)], "method", false, false, false, 3);
        // line 4
        echo "    ";
        $context["static_version"] = 3;
        // line 5
        echo "    <head>
        ";
        // line 6
        $this->displayBlock('head', $context, $blocks);
        // line 52
        echo "    </head>
    <body class=\"bg-white text-black\">
        <nav class=\"bg-black text-white\">
            <div class=\"container mx-auto pl-16 pr-16 pt-6 pb-6 clearfix\">
              <div class=\"w-full lg:w-2/12
                          text-center lg:text-left
                          float-left text-white p-2 font-noirpro-medium tracking-wide\">
                <a href=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "\" class=\"w-full lg:w-2/12 pl-2 pr-2 text-center text-base logo no-underline\">flextype</a>
              </div>
              <div class=\"w-full float-right lg:w-9/12 font-noirpro-semibold\">
                <div class=\"text-right p-2\">
                    ";
        // line 63
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["entry_locale"] ?? null), "navigation", [], "any", false, false, false, 63));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 64
            echo "                        <a href=\"";
            if (twig_get_attribute($this->env, $this->source, $context["item"], "external", [], "any", false, false, false, 64)) {
                echo "//";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "link", [], "any", false, false, false, 64), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "link", [], "any", false, false, false, 64), "html", null, true);
            }
            echo "\"
                           class=\"";
            // line 65
            if ((twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "slug", [], "any", false, false, false, 65) == ((($context["locale"] ?? null) . "/") . twig_get_attribute($this->env, $this->source, $context["item"], "link", [], "any", false, false, false, 65)))) {
                echo "border-white";
            }
            // line 66
            echo "                                   uppercase
                                   relative
                                   block
                                   text-white
                                   text-center
                                   mr-0
                                   nav-item
                                   lg:mr-4
                                   lg:inline-block\">
                                   ";
            // line 75
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, false, 75), "html", null, true);
            echo "
                               </a>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 78
        echo "                </div>
              </div>
          </div>
        </nav>

        ";
        // line 83
        $this->displayBlock('content', $context, $blocks);
        // line 84
        echo "
        <footer class=\"container mx-auto textl-center lg:text-left bg-black text-white\">
            <div class=\"flex content-center flex-wrap pl-16 pr-16 pt-24 pb-24\">
                <div class=\"w-full lg:w-2/12 mt-8 lg:mt-0\">
                    <h4>Flextype</h4>
                    <ul class=\"list-none m-0 p-0\">
                        <li><a href=\"";
        // line 90
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "/about\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["entry_locale"] ?? null), "link_about", [], "any", false, false, false, 90), "html", null, true);
        echo "</a></li>
                        <li><a href=\"";
        // line 91
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "/team\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["entry_locale"] ?? null), "link_team", [], "any", false, false, false, 91), "html", null, true);
        echo "</a></li>
                        <li><a href=\"";
        // line 92
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "/sponsors\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["entry_locale"] ?? null), "link_sponsors", [], "any", false, false, false, 92), "html", null, true);
        echo "</a></li>
                        <li><a href=\"";
        // line 93
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "/changelog\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["entry_locale"] ?? null), "link_changelog", [], "any", false, false, false, 93), "html", null, true);
        echo "</a></li>
                    </ul>
                </div>
                <div class=\"w-full lg:w-2/12 mt-8 lg:mt-0\">
                    <h4>";
        // line 97
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["entry_locale"] ?? null), "link_downloads", [], "any", false, false, false, 97), "html", null, true);
        echo "</h4>
                    <ul class=\"list-none m-0 p-0\">
                        <li><a href=\"";
        // line 99
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "/downloads\">Flextype</a></li>
                        <li><a href=\"https://github.com/flextype/plugins\">";
        // line 100
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["entry_locale"] ?? null), "link_plugins", [], "any", false, false, false, 100), "html", null, true);
        echo "</a></li>
                        <li><a href=\"https://github.com/flextype/themes\">";
        // line 101
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["entry_locale"] ?? null), "link_themes", [], "any", false, false, false, 101), "html", null, true);
        echo "</a></li>
                    </ul>
                </div>
                <div class=\"w-full lg:w-2/12 mt-8 lg:mt-0\">
                    <h4>";
        // line 105
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["entry_locale"] ?? null), "link_community", [], "any", false, false, false, 105), "html", null, true);
        echo "</h4>
                    <ul class=\"list-none m-0 p-0\">
                        <li><a href=\"";
        // line 107
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "/discord\">Discord</a></li>
                        <li><a href=\"https://github.com/flextype\">Github</a></li>
                        <li><a href=\"https://vk.com/flextype\">Vkontakte</a></li>
                        <li><a href=\"https://twitter.com/getflextype\">Twitter</a></li>
                        <li><a href=\"https://www.youtube.com/channel/UCmIAB-UDGCjF92iMNDdJR6Q?view_as=subscriber\">Youtube</a></li>
                    </ul>
                </div>
                <div class=\"w-full lg:w-5/12 mt-8 lg:mt-0\">
                    <p><a href=\"";
        // line 115
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "\">Flextype</a> was <i class=\"fa fa-code\"></i> with <i class=\"fa fa-heart\"></i> by <a href=\"//digital.flextype.org\" class=\"highlight\">Sergey Romanenko</a> and <a href=\"https://github.com/flextype/flextype/graphs/contributors\" class=\"highlight\">Flextype Community</a></p>
                    <p>Copyright © 2020 - <a href=\"//digital.flextype.org\">Sergey Romanenko</a></p>
                </div>
            </div>
        </footer>

        ";
        // line 121
        $context["js_production"] = ((($this->extensions['Slim\Views\TwigExtension']->baseUrl() . "/site/themes/") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["registry"] ?? null), "flextype", [], "any", false, false, false, 121), "theme", [], "any", false, false, false, 121)) . "/assets/dist/js/build.min.js");
        // line 122
        echo "        ";
        twig_get_attribute($this->env, $this->source, ($context["assets"] ?? null), "add", [0 => "js", 1 => ($context["js_production"] ?? null), 2 => "site", 3 => 1], "method", false, false, false, 122);
        // line 123
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["assets"] ?? null), "get", [0 => "js", 1 => "site"], "method", false, false, false, 123));
        foreach ($context['_seq'] as $context["_key"] => $context["assets_site"]) {
            // line 124
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["assets_site"]);
            foreach ($context['_seq'] as $context["_key"] => $context["assets_by_priorities"]) {
                // line 125
                echo "                <script src=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["assets_by_priorities"], "asset", [], "any", false, false, false, 125), "html", null, true);
                echo "?v=";
                echo twig_escape_filter($this->env, ($context["static_version"] ?? null), "html", null, true);
                echo "\"></script>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['assets_by_priorities'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 127
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['assets_site'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 128
        echo "
        <script>
            new WOW().init();
        </script>

        ";
        // line 133
        twig_get_attribute($this->env, $this->source, ($context["emitter"] ?? null), "emit", [0 => "onThemeTail"], "method", false, false, false, 133);
        // line 134
        echo "    </body>
</html>
";
    }

    // line 6
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo "            <meta charset=\"";
        echo twig_escape_filter($this->env, twig_lower_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["registry"] ?? null), "flextype", [], "any", false, false, false, 7), "charset", [], "any", false, false, false, 7)), "html", null, true);
        echo "\">
            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
            <meta name=\"description\" content=\"";
        // line 9
        if (twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "description", [], "any", false, false, false, 9)) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "description", [], "any", false, false, false, 9), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["registry"] ?? null), "plugins", [], "any", false, false, false, 9), "site", [], "any", false, false, false, 9), "description", [], "any", false, false, false, 9), "html", null, true);
        }
        echo "\">
            <meta name=\"keywords\" content=\"";
        // line 10
        if (twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "keywords", [], "any", false, false, false, 10)) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "keywords", [], "any", false, false, false, 10), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["registry"] ?? null), "plugins", [], "any", false, false, false, 10), "site", [], "any", false, false, false, 10), "keywords", [], "any", false, false, false, 10), "html", null, true);
        }
        echo "\">
            <meta name=\"robots\" content=\"";
        // line 11
        if (twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "robots", [], "any", false, false, false, 11)) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "robots", [], "any", false, false, false, 11), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["registry"] ?? null), "plugins", [], "any", false, false, false, 11), "site", [], "any", false, false, false, 11), "robots", [], "any", false, false, false, 11), "html", null, true);
        }
        echo "\">
            <meta name=\"generator\" content=\"Powered by Flextype ";
        // line 12
        echo twig_escape_filter($this->env, ($context["FLEXTYPE_VERSION"] ?? null), "html", null, true);
        echo "\" />

            <meta name=\"image\" content=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "/image/";
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "/preview.png?dpr=2&w=1100&q=70\">

            <meta name=\"twitter:card\" content=\"summary_large_image\">
            <meta name=\"twitter:site\" content=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "slug", [], "any", false, false, false, 17), "html", null, true);
        echo "\">
            <meta name=\"twitter:title\" content=\"";
        // line 18
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "title", [], "any", false, false, false, 18), "html", null, true);
        echo "\">
            <meta name=\"twitter:description\" content=\"";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "description", [], "any", false, false, false, 19), "html", null, true);
        echo "\">
            <meta name=\"twitter:image\" content=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "/image/";
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "/preview.png?dpr=2&w=1100&q=70\">

            <meta property=\"og:url\" content=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "slug", [], "any", false, false, false, 22), "html", null, true);
        echo "\">
            <meta property=\"og:title\" content=\"";
        // line 23
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "title", [], "any", false, false, false, 23), "html", null, true);
        echo "\">
            <meta property=\"og:description\" content=\"";
        // line 24
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "description", [], "any", false, false, false, 24), "html", null, true);
        echo "\">
            <meta property=\"og:type\" content=\"website\">
            <meta property=\"og:image\" content=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "/image/";
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "/preview.png?dpr=2&w=1100&q=70\">
            <meta property=\"og:image:type\" content=\"image/png\">

            <meta name=\"yandex-verification\" content=\"920bbfc83bbe3fbe\" />

            <link rel=\"apple-touch-icon\" sizes=\"180x180\" href=\"/apple-touch-icon.png\">
            <link rel=\"icon\" type=\"image/png\" sizes=\"32x32\" href=\"/favicon-32x32.png\">
            <link rel=\"icon\" type=\"image/png\" sizes=\"16x16\" href=\"/favicon-16x16.png\">
            <link rel=\"manifest\" href=\"/site.webmanifest\">

            ";
        // line 36
        twig_get_attribute($this->env, $this->source, ($context["emitter"] ?? null), "emit", [0 => "onThemeMeta"], "method", false, false, false, 36);
        // line 37
        echo "
            <title>";
        // line 38
        if (twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "title", [], "any", false, false, false, 38)) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "title", [], "any", false, false, false, 38), "html");
            echo " | ";
        }
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["registry"] ?? null), "plugins", [], "any", false, false, false, 38), "site", [], "any", false, false, false, 38), "title", [], "any", false, false, false, 38), "html");
        echo "</title>

            ";
        // line 40
        $context["css_dev"] = ((($this->extensions['Slim\Views\TwigExtension']->baseUrl() . "/site/themes/") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["registry"] ?? null), "flextype", [], "any", false, false, false, 40), "theme", [], "any", false, false, false, 40)) . "/assets/dist/css/dev.css");
        // line 41
        echo "            ";
        $context["css_production"] = ((($this->extensions['Slim\Views\TwigExtension']->baseUrl() . "/site/themes/") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["registry"] ?? null), "flextype", [], "any", false, false, false, 41), "theme", [], "any", false, false, false, 41)) . "/assets/dist/css/build.min.css");
        // line 42
        echo "            ";
        twig_get_attribute($this->env, $this->source, ($context["assets"] ?? null), "add", [0 => "css", 1 => ($context["css_production"] ?? null), 2 => "site", 3 => 1], "method", false, false, false, 42);
        // line 43
        echo "            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["assets"] ?? null), "get", [0 => "css", 1 => "site"], "method", false, false, false, 43));
        foreach ($context['_seq'] as $context["_key"] => $context["assets_site"]) {
            // line 44
            echo "                ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["assets_site"]);
            foreach ($context['_seq'] as $context["_key"] => $context["assets_by_priorities"]) {
                // line 45
                echo "                    <link href=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["assets_by_priorities"], "asset", [], "any", false, false, false, 45), "html", null, true);
                echo "?v=";
                echo twig_escape_filter($this->env, ($context["static_version"] ?? null), "html", null, true);
                echo "\" rel=\"stylesheet\">
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['assets_by_priorities'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 47
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['assets_site'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 48
        echo "
            ";
        // line 49
        twig_get_attribute($this->env, $this->source, ($context["emitter"] ?? null), "emit", [0 => "onThemeHeader"], "method", false, false, false, 49);
        // line 50
        echo "            ";
        echo twig_get_attribute($this->env, $this->source, ($context["snippets"] ?? null), "exec", [0 => "yandex-metrika"], "method", false, false, false, 50);
        echo "
        ";
    }

    // line 83
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "themes/noir-flextype/templates/partials/base.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  425 => 83,  418 => 50,  416 => 49,  413 => 48,  407 => 47,  396 => 45,  391 => 44,  386 => 43,  383 => 42,  380 => 41,  378 => 40,  369 => 38,  366 => 37,  364 => 36,  349 => 26,  344 => 24,  340 => 23,  334 => 22,  327 => 20,  323 => 19,  319 => 18,  313 => 17,  305 => 14,  300 => 12,  292 => 11,  284 => 10,  276 => 9,  270 => 7,  266 => 6,  260 => 134,  258 => 133,  251 => 128,  245 => 127,  234 => 125,  229 => 124,  224 => 123,  221 => 122,  219 => 121,  208 => 115,  195 => 107,  190 => 105,  183 => 101,  179 => 100,  173 => 99,  168 => 97,  157 => 93,  149 => 92,  141 => 91,  133 => 90,  125 => 84,  123 => 83,  116 => 78,  107 => 75,  96 => 66,  92 => 65,  78 => 64,  74 => 63,  65 => 59,  56 => 52,  54 => 6,  51 => 5,  48 => 4,  46 => 3,  42 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/noir-flextype/templates/partials/base.html", "/Applications/MAMP/htdocs/flextype.org/site/themes/noir-flextype/templates/partials/base.html");
    }
}
