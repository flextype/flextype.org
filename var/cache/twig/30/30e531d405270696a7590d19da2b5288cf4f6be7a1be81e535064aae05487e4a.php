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
class __TwigTemplate_ae1b3d27e72c4f7e630c86a18d9079a87a3e45089ea4377fdc37eb116cd6c5e2 extends \Twig\Template
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
        $context["home"] = twig_get_attribute($this->env, $this->source, ($context["entries"] ?? null), "fetch", [0 => ($context["locale"] ?? null)], "method", false, false, false, 3);
        // line 4
        echo "    ";
        $context["static_version"] = 9;
        // line 5
        echo "    <head>
        ";
        // line 6
        $this->displayBlock('head', $context, $blocks);
        // line 55
        echo "    </head>
    <body>
        <!-- Navigation -->
        <nav class=\"bg-white text-black\">
            <div class=\"container mx-auto px-8 pt-6 pb-6 clearfix\">
              <div class=\"w-full lg:w-2/12
                          text-center lg:text-left
                          float-left text-black tracking-wide\">
                <a href=\"";
        // line 63
        echo $this->extensions['Flextype\UrlTwigExtension']->url();
        echo "/";
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "\" class=\"no-underline w-full lg:w-2/12 text-base logo no-underline\">flextype</a>
              </div>
              <div class=\"w-full float-right lg:w-9/12\">
                <div class=\"text-right\">
                    ";
        // line 67
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["home"] ?? null), "navigation", [], "any", false, false, false, 67));
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
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 68
            echo "                        <a href=\"";
            if (twig_get_attribute($this->env, $this->source, $context["item"], "external", [], "any", false, false, false, 68)) {
                echo "//";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "link", [], "any", false, false, false, 68), "html", null, true);
            } else {
                echo $this->extensions['Flextype\UrlTwigExtension']->url();
                echo "/";
                echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "link", [], "any", false, false, false, 68), "html", null, true);
            }
            echo "\"
                           class=\"";
            // line 69
            if ((twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "slug", [], "any", false, false, false, 69) == ((($context["locale"] ?? null) . "/") . twig_get_attribute($this->env, $this->source, $context["item"], "link", [], "any", false, false, false, 69)))) {
                echo "active";
            }
            // line 70
            echo "                                   uppercase
                                   relative
                                   block
                                   text-black
                                   nav-item
                                   ";
            // line 75
            if (twig_get_attribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 75)) {
                echo "lg:mr-0";
            } else {
                echo "lg:mr-4";
            }
            // line 76
            echo "                                   lg:inline-block\">
                                   ";
            // line 77
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, false, 77), "html", null, true);
            echo "
                               </a>
                    ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 80
        echo "                </div>
              </div>
          </div>
        </nav>
        <!-- /Navigation -->

        <!-- Content -->
        <div class=\"bg-white text-black\">
            <div class=\"px-8\">
                ";
        // line 89
        $this->displayBlock('content', $context, $blocks);
        // line 90
        echo "            </div>
        </div>
        <!-- /Content -->

        <!-- Footer -->
        <footer class=\"container px-8 relative mx-auto textl-center lg:text-left text-white bg-black\">
            <div class=\"flex content-center flex-wrap pt-24 pb-24\">
                <div class=\"w-full lg:w-2/12 mt-8 lg:mt-0\">
                    <h4>Flextype</h4>
                    <ul class=\"list-none m-0 p-0\">
                        <li><a href=\"";
        // line 100
        echo $this->extensions['Flextype\UrlTwigExtension']->url();
        echo "/";
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "/about\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["home"] ?? null), "txt_link_about", [], "any", false, false, false, 100), "html", null, true);
        echo "</a></li>
                        <li><a href=\"";
        // line 101
        echo $this->extensions['Flextype\UrlTwigExtension']->url();
        echo "/";
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "/team\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["home"] ?? null), "txt_link_team", [], "any", false, false, false, 101), "html", null, true);
        echo "</a></li>
                        <li><a href=\"";
        // line 102
        echo $this->extensions['Flextype\UrlTwigExtension']->url();
        echo "/";
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "/sponsors\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["home"] ?? null), "txt_link_sponsors", [], "any", false, false, false, 102), "html", null, true);
        echo "</a></li>
                        <li><a href=\"";
        // line 103
        echo $this->extensions['Flextype\UrlTwigExtension']->url();
        echo "/";
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "/press-kit\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["home"] ?? null), "txt_link_press_kit", [], "any", false, false, false, 103), "html", null, true);
        echo "</a></li>
                        <li><a href=\"";
        // line 104
        echo $this->extensions['Flextype\UrlTwigExtension']->url();
        echo "/";
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "/changelog\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["home"] ?? null), "txt_link_changelog", [], "any", false, false, false, 104), "html", null, true);
        echo "</a></li>
                    </ul>
                </div>
                <div class=\"w-full lg:w-2/12 mt-8 lg:mt-0\">
                    <h4>";
        // line 108
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["home"] ?? null), "txt_link_downloads", [], "any", false, false, false, 108), "html", null, true);
        echo "</h4>
                    <ul class=\"list-none m-0 p-0\">
                        <li><a href=\"";
        // line 110
        echo $this->extensions['Flextype\UrlTwigExtension']->url();
        echo "/";
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "/downloads\">Flextype</a></li>
                        <li><a href=\"";
        // line 111
        echo $this->extensions['Flextype\UrlTwigExtension']->url();
        echo "/";
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "/downloads/extend/plugins\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["home"] ?? null), "txt_link_plugins", [], "any", false, false, false, 111), "html", null, true);
        echo "</a></li>
                        <li><a href=\"";
        // line 112
        echo $this->extensions['Flextype\UrlTwigExtension']->url();
        echo "/";
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "/downloads/extend/themes\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["home"] ?? null), "txt_link_themes", [], "any", false, false, false, 112), "html", null, true);
        echo "</a></li>
                    </ul>
                </div>
                <div class=\"w-full lg:w-2/12 mt-8 lg:mt-0\">
                    <h4>";
        // line 116
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["home"] ?? null), "txt_link_community", [], "any", false, false, false, 116), "html", null, true);
        echo "</h4>
                    <ul class=\"list-none m-0 p-0\">
                        <li><a href=\"";
        // line 118
        echo $this->extensions['Flextype\UrlTwigExtension']->url();
        echo "/";
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "/discord\">Discord</a></li>
                        <li><a href=\"https://github.com/flextype\">Github</a></li>
                        <li><a href=\"https://vk.com/flextype\">Vkontakte</a></li>
                        <li><a href=\"https://twitter.com/getflextype\">Twitter</a></li>
                        <li><a href=\"https://www.youtube.com/channel/UCmIAB-UDGCjF92iMNDdJR6Q?view_as=subscriber\">Youtube</a></li>
                    </ul>
                </div>
                <div class=\"w-full lg:w-6/12 mt-8 lg:mt-0\">
                    <p><a href=\"";
        // line 126
        echo $this->extensions['Flextype\UrlTwigExtension']->url();
        echo "/";
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "\">Flextype</a> was <i class=\"fa fa-code\"></i> with <i class=\"fa fa-heart\"></i> by <a href=\"//digital.flextype.org\" class=\"highlight\">Sergey Romanenko</a> and <a href=\"https://github.com/flextype/flextype/graphs/contributors\" class=\"highlight\">Flextype Community</a></p>
                    <p>Copyright © 2020 - <a href=\"//digital.flextype.org\">Sergey Romanenko</a></p>
                </div>
            </div>
            <div class=\"flex content-center flex-wrap mb-6\">
                <div class=\"w-full mt-8 lg:mt-0\">
                    <a href=\"";
        // line 132
        echo $this->extensions['Flextype\UrlTwigExtension']->url();
        echo "/en\">English</a> /
                    <a href=\"";
        // line 133
        echo $this->extensions['Flextype\UrlTwigExtension']->url();
        echo "/ru\">Русский</a>
                </div>
            </div>
        </footer>
        <!-- /Footer -->

        ";
        // line 139
        $context["theme"] = twig_get_attribute($this->env, $this->source, ($context["registry"] ?? null), "get", [0 => "plugins.site.settings.theme"], "method", false, false, false, 139);
        // line 140
        echo "        ";
        twig_get_attribute($this->env, $this->source, ($context["registry"] ?? null), "set", [0 => "assets.site.js.noir_flextype", 1 => (("project/themes/" . ($context["theme"] ?? null)) . "/assets/dist/js/build.min.js")], "method", false, false, false, 140);
        // line 141
        echo "
        ";
        // line 142
        if (twig_get_attribute($this->env, $this->source, ($context["registry"] ?? null), "has", [0 => "assets.site.js"], "method", false, false, false, 142)) {
            // line 143
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["registry"] ?? null), "get", [0 => "assets.site.js"], "method", false, false, false, 143));
            foreach ($context['_seq'] as $context["_key"] => $context["js"]) {
                // line 144
                echo "                ";
                if ($context["js"]) {
                    // line 145
                    echo "                    <script type=\"text/javascript\" src=\"";
                    echo $this->extensions['Flextype\UrlTwigExtension']->url();
                    echo "/";
                    echo twig_escape_filter($this->env, $context["js"], "html", null, true);
                    echo "\"></script>
                ";
                }
                // line 147
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['js'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 148
            echo "        ";
        }
        // line 149
        echo "
        <script>
            new WOW().init();
        </script>

        <!-- Yandex.Metrika counter --> <script type=\"text/javascript\" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, \"script\", \"https://cdn.jsdelivr.net/npm/yandex-metrica-watch/tag.js\", \"ym\"); ym(48198194, \"init\", { clickmap:true, trackLinks:true, accurateTrackBounce:true }); </script> <noscript><div><img src=\"https://mc.yandex.ru/watch/48198194\" style=\"position:absolute; left:-9999px;\" alt=\"\" /></div></noscript> <!-- /Yandex.Metrika counter -->

        ";
        // line 156
        twig_get_attribute($this->env, $this->source, ($context["emitter"] ?? null), "emit", [0 => "onThemeTail"], "method", false, false, false, 156);
        // line 157
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
        echo twig_escape_filter($this->env, twig_lower_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["registry"] ?? null), "get", [0 => "flextype.settings.charset"], "method", false, false, false, 7)), "html", null, true);
        echo "\">
            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
            <meta name=\"description\" content=\"";
        // line 9
        if (twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "description", [], "any", false, false, false, 9)) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "description", [], "any", false, false, false, 9), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["registry"] ?? null), "get", [0 => "plugins.site.settings.description"], "method", false, false, false, 9), "html", null, true);
        }
        echo "\">
            <meta name=\"keywords\" content=\"";
        // line 10
        if (twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "keywords", [], "any", false, false, false, 10)) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "keywords", [], "any", false, false, false, 10), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["registry"] ?? null), "get", [0 => "plugins.site.settings.keywords"], "method", false, false, false, 10), "html", null, true);
        }
        echo "\">
            <meta name=\"robots\" content=\"";
        // line 11
        if (twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "robots", [], "any", false, false, false, 11)) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "robots", [], "any", false, false, false, 11), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["registry"] ?? null), "get", [0 => "plugins.site.settings.robots"], "method", false, false, false, 11), "html", null, true);
        }
        echo "\">
            <meta name=\"generator\" content=\"Powered by Flextype\"/>

            <meta name=\"image\" content=\"";
        // line 14
        echo $this->extensions['Flextype\UrlTwigExtension']->url();
        echo "/image/";
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "/preview.png?dpr=2&w=1100&q=70\">

            <meta name=\"twitter:card\" content=\"summary_large_image\">
            <meta name=\"twitter:site\" content=\"";
        // line 17
        echo $this->extensions['Flextype\UrlTwigExtension']->url();
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
        echo $this->extensions['Flextype\UrlTwigExtension']->url();
        echo "/image/";
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "/preview.png?dpr=2&w=1100&q=70\">

            <meta property=\"og:url\" content=\"";
        // line 22
        echo $this->extensions['Flextype\UrlTwigExtension']->url();
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
        echo $this->extensions['Flextype\UrlTwigExtension']->url();
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
            <title>
                ";
        // line 39
        if (twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "title", [], "any", false, false, false, 39)) {
            echo twig_escape_filter($this->env, $this->extensions['Flextype\ShortcodesTwigExtension']->shortcode(twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "title", [], "any", false, false, false, 39), "html")), "html", null, true);
            echo "
                    |
                ";
        }
        // line 41
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["registry"] ?? null), "get", [0 => "plugins.site.settings.title"], "method", false, false, false, 41), "html");
        echo "</title>

            ";
        // line 43
        $context["theme"] = twig_get_attribute($this->env, $this->source, ($context["registry"] ?? null), "get", [0 => "plugins.site.settings.theme"], "method", false, false, false, 43);
        // line 44
        echo "
            ";
        // line 45
        twig_get_attribute($this->env, $this->source, ($context["registry"] ?? null), "set", [0 => "assets.site.css.noir_flextype", 1 => (("project/themes/" . ($context["theme"] ?? null)) . "/assets/dist/css/build.min.css")], "method", false, false, false, 45);
        // line 46
        echo "
            ";
        // line 47
        if (twig_get_attribute($this->env, $this->source, ($context["registry"] ?? null), "has", [0 => "assets.site.css"], "method", false, false, false, 47)) {
            // line 48
            echo "                ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["registry"] ?? null), "get", [0 => "assets.site.css"], "method", false, false, false, 48));
            foreach ($context['_seq'] as $context["_key"] => $context["css"]) {
                // line 49
                echo "                    <link href=\"";
                echo $this->extensions['Flextype\UrlTwigExtension']->url();
                echo "/";
                echo twig_escape_filter($this->env, $context["css"], "html", null, true);
                echo "\" rel=\"stylesheet\">
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['css'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 51
            echo "            ";
        }
        // line 52
        echo "
            ";
        // line 53
        twig_get_attribute($this->env, $this->source, ($context["emitter"] ?? null), "emit", [0 => "onThemeHeader"], "method", false, false, false, 53);
        // line 54
        echo "        ";
    }

    // line 89
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
        return array (  488 => 89,  484 => 54,  482 => 53,  479 => 52,  476 => 51,  465 => 49,  460 => 48,  458 => 47,  455 => 46,  453 => 45,  450 => 44,  448 => 43,  443 => 41,  436 => 39,  432 => 37,  430 => 36,  415 => 26,  410 => 24,  406 => 23,  400 => 22,  393 => 20,  389 => 19,  385 => 18,  379 => 17,  371 => 14,  361 => 11,  353 => 10,  345 => 9,  339 => 7,  335 => 6,  329 => 157,  327 => 156,  318 => 149,  315 => 148,  309 => 147,  301 => 145,  298 => 144,  293 => 143,  291 => 142,  288 => 141,  285 => 140,  283 => 139,  274 => 133,  270 => 132,  259 => 126,  246 => 118,  241 => 116,  230 => 112,  222 => 111,  216 => 110,  211 => 108,  200 => 104,  192 => 103,  184 => 102,  176 => 101,  168 => 100,  156 => 90,  154 => 89,  143 => 80,  126 => 77,  123 => 76,  117 => 75,  110 => 70,  106 => 69,  92 => 68,  75 => 67,  66 => 63,  56 => 55,  54 => 6,  51 => 5,  48 => 4,  46 => 3,  42 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/noir-flextype/templates/partials/base.html", "/Applications/MAMP/htdocs/flextype.org/project/themes/noir-flextype/templates/partials/base.html");
    }
}
