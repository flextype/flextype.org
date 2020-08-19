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

/* themes/noir-flextype/templates/blog.html */
class __TwigTemplate_de390627f35e61d75193524ac95626e8b45c9538cb0fe28056ebba5e39194148 extends \Twig\Template
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
        return $this->loadTemplate((("themes/" . twig_get_attribute($this->env, $this->source, ($context["registry"] ?? null), "get", [0 => "plugins.site.settings.theme"], "method", false, false, false, 1)) . "/templates/partials/base.html"), "themes/noir-flextype/templates/blog.html", 1);
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
        echo "    ";
        // line 5
        echo "
    ";
        // line 6
        $context["page"] = twig_get_attribute($this->env, $this->source, ($context["query"] ?? null), "page", [], "any", false, false, false, 6);
        // line 7
        echo "    ";
        $context["tag"] = twig_get_attribute($this->env, $this->source, ($context["query"] ?? null), "tag", [], "any", false, false, false, 7);
        // line 8
        echo "
    ";
        // line 9
        $context["blog_posts_limit"] = 5;
        // line 10
        echo "
    ";
        // line 11
        if ((($context["blog_posts_limit"] ?? null) == 0)) {
            // line 12
            echo "        ";
            $context["blog_posts_limit"] = 5;
            // line 13
            echo "    ";
        }
        // line 14
        echo "
    ";
        // line 15
        if (($context["tag"] ?? null)) {
            // line 16
            echo "
        ";
            // line 18
            echo "        ";
            $context["blog_posts_length"] = twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["entries"] ?? null), "fetch", [0 => (($context["locale"] ?? null) . "/blog"), 1 => ["where" => ["key" => "tags", "expr" => "contains", "value" =>             // line 22
($context["tag"] ?? null)], "and_where" => [0 => ["key" => "visibility", "expr" => "nin", "value" => [0 => "draft", 1 => "hidden"]]]]], "method", false, false, false, 18));
            // line 30
            echo "
        ";
            // line 31
            $context["blog_posts_pages"] = twig_round((($context["blog_posts_length"] ?? null) / ($context["blog_posts_limit"] ?? null)), 0, "ceil");
            // line 32
            echo "        ";
            if ((($context["page"] ?? null) < 1)) {
                // line 33
                echo "            ";
                $context["page"] = 1;
                // line 34
                echo "        ";
            } elseif ((($context["page"] ?? null) > ($context["blog_posts_pages"] ?? null))) {
                // line 35
                echo "            ";
                $context["page"] = ($context["blog_posts_pages"] ?? null);
                // line 36
                echo "        ";
            }
            // line 37
            echo "        ";
            $context["blog_posts_offset"] = ((($context["page"] ?? null) - 1) * ($context["blog_posts_limit"] ?? null));
            // line 38
            echo "        ";
            if ((($context["blog_posts_offset"] ?? null) < 0)) {
                $context["blog_posts_offset"] = 0;
            }
            // line 39
            echo "
        ";
            // line 40
            $context["blog_posts"] = twig_get_attribute($this->env, $this->source, ($context["entries"] ?? null), "fetch", [0 => (($context["locale"] ?? null) . "/blog"), 1 => ["where" => ["key" => "tags", "expr" => "contains", "value" =>             // line 44
($context["tag"] ?? null)], "and_where" => [0 => ["key" => "visibility", "expr" => "nin", "value" => [0 => "draft", 1 => "hidden"]]], "order_by" => ["field" => "published_at", "direction" => "desc"], "set_max_result" =>             // line 55
($context["blog_posts_limit"] ?? null), "set_first_result" =>             // line 56
($context["blog_posts_offset"] ?? null)]], "method", false, false, false, 40);
            // line 58
            echo "    ";
        } else {
            // line 59
            echo "
        ";
            // line 61
            echo "        ";
            $context["blog_posts_length"] = twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["entries"] ?? null), "fetch", [0 => (($context["locale"] ?? null) . "/blog"), 1 => ["where" => ["key" => "visibility", "expr" => "nin", "value" => [0 => "draft", 1 => "hidden"]]]], "method", false, false, false, 61));
            // line 68
            echo "
        ";
            // line 69
            $context["blog_posts_pages"] = twig_round((($context["blog_posts_length"] ?? null) / ($context["blog_posts_limit"] ?? null)), 0, "ceil");
            // line 70
            echo "
        ";
            // line 71
            if ((($context["page"] ?? null) < 1)) {
                // line 72
                echo "            ";
                $context["page"] = 1;
                // line 73
                echo "        ";
            } elseif ((($context["page"] ?? null) > ($context["blog_posts_pages"] ?? null))) {
                // line 74
                echo "            ";
                $context["page"] = ($context["blog_posts_pages"] ?? null);
                // line 75
                echo "        ";
            }
            // line 76
            echo "
        ";
            // line 77
            $context["blog_posts_offset"] = ((($context["page"] ?? null) - 1) * ($context["blog_posts_limit"] ?? null));
            // line 78
            echo "        ";
            if ((($context["blog_posts_offset"] ?? null) < 0)) {
                $context["blog_posts_offset"] = 0;
            }
            // line 79
            echo "
        ";
            // line 80
            $context["blog_posts"] = twig_get_attribute($this->env, $this->source, ($context["entries"] ?? null), "fetch", [0 => (($context["locale"] ?? null) . "/blog"), 1 => ["where" => ["key" => "visibility", "expr" => "nin", "value" => [0 => "draft", 1 => "hidden"]], "order_by" => ["field" => "published_at", "direction" => "desc"], "set_max_result" =>             // line 90
($context["blog_posts_limit"] ?? null), "set_first_result" =>             // line 91
($context["blog_posts_offset"] ?? null)]], "method", false, false, false, 80);
            // line 92
            echo "
    ";
        }
        // line 94
        echo "
    ";
        // line 96
        echo "
    <div class=\"container mx-auto bg-white text-black pb-24\">
        <h1 class=\"uppercase text-center text-3xl lg:text-6xl pt-24 pb-24 m-0\">
            ";
        // line 99
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "title", [], "any", false, false, false, 99);
        echo "
        </h1>
        <div class=\"flex content-center flex-wrap\">
            <div class=\"w-full lg:w-9/12 p-2 text-left\">
                ";
        // line 103
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["blog_posts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 104
            echo "                <a href=\"";
            echo $this->extensions['Flextype\UrlTwigExtension']->url();
            echo "/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "slug", [], "any", false, false, false, 104), "html", null, true);
            echo "\" class=\"flex align-middle  mb-6 px-6 post wow fadeIn\">
                    <h4 class=\"w-8/12 text-xl pb-0 mb-0\">";
            // line 105
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "title", [], "any", false, false, false, 105), "html", null, true);
            echo "</h4>
                    <div class=\"w-4/12 text-xl text-right opacity-50\">
                        ";
            // line 107
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "published_at", [], "any", false, false, false, 107), twig_get_attribute($this->env, $this->source, ($context["registry"] ?? null), "get", [0 => "flextype.settings.date_display_format"], "method", false, false, false, 107)), "html", null, true);
            echo "
                    </div>
                </a>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 111
        echo "
                ";
        // line 113
        echo "                <div class=\"text-center\">
                    ";
        // line 114
        if (((($context["page"] ?? null) - 1) > 0)) {
            // line 115
            echo "                        <a href=\"?page=";
            echo twig_escape_filter($this->env, (($context["page"] ?? null) - 1), "html", null, true);
            if (($context["tag"] ?? null)) {
                echo "&tag=";
                echo twig_escape_filter($this->env, ($context["tag"] ?? null), "html", null, true);
            }
            echo "\">&larr;</a>
                    ";
        }
        // line 117
        echo "                    ";
        if (( !(null === ($context["blog_posts_pages"] ?? null)) && (($context["blog_posts_pages"] ?? null) > 1))) {
            // line 118
            echo "                        ";
            echo twig_escape_filter($this->env, ($context["page"] ?? null), "html", null, true);
            echo " / ";
            echo twig_escape_filter($this->env, ($context["blog_posts_pages"] ?? null), "html", null, true);
            echo "
                    ";
        }
        // line 120
        echo "                    ";
        if ((($context["page"] ?? null) < ($context["blog_posts_pages"] ?? null))) {
            // line 121
            echo "                        <a href=\"?page=";
            echo twig_escape_filter($this->env, (($context["page"] ?? null) + 1), "html", null, true);
            if (($context["tag"] ?? null)) {
                echo "&tag=";
                echo twig_escape_filter($this->env, ($context["tag"] ?? null), "html", null, true);
            }
            echo "\">&rarr;</a>
                    ";
        }
        // line 123
        echo "                </div>
                ";
        // line 125
        echo "            </div>
            <div class=\"w-full lg:w-3/12 p-2 wow fadeIn\">
                <div class=\"text-black text-left  p-6 plate\">
                    ";
        // line 129
        echo "                    ";
        $context["tags_cloud"] = [];
        // line 130
        echo "                    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["entries"] ?? null), "fetch", [0 => (($context["locale"] ?? null) . "/blog"), 1 => ["where" => ["key" => "visibility", "expr" => "nin", "value" => [0 => "draft", 1 => "hidden"]], "order_by" => ["field" => "published_at", "direction" => "desc"]]], "method", false, false, false, 130));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 141
            echo "                        ";
            $context["tags"] = twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["post"], "tags", [], "any", false, false, false, 141), [" " => ""]);
            // line 142
            echo "                        ";
            $context["tags_cloud"] = twig_array_merge(($context["tags_cloud"] ?? null), twig_split_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "tags", [], "any", false, false, false, 142), ","));
            // line 143
            echo "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 144
        echo "
                    ";
        // line 145
        if ((twig_length_filter($this->env, ($context["tags_cloud"] ?? null)) > 0)) {
            // line 146
            echo "                        <h4 class=\"text-left mb-2\">Tags</h4>
                        ";
            // line 147
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_array_reduce(($context["tags_cloud"] ?? null), function ($__unique__, $__item__) use ($context, $macros) { $context["unique"] = $__unique__; $context["item"] = $__item__; return ((twig_in_filter(($context["item"] ?? null), ($context["unique"] ?? null))) ? (($context["unique"] ?? null)) : (twig_array_merge(($context["unique"] ?? null), [0 => ($context["item"] ?? null)]))); }, []));
            foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
                // line 148
                echo "                            <a class=\"no-underline  px-2 mb-2 block\" href=\"";
                echo $this->extensions['Flextype\UrlTwigExtension']->url();
                echo "/";
                echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
                echo "/blog?tag=";
                echo twig_escape_filter($this->env, twig_trim_filter($context["tag"]), "html", null, true);
                echo "\">#";
                echo twig_escape_filter($this->env, twig_trim_filter($context["tag"]), "html", null, true);
                echo "</a>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tag'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 150
            echo "                    ";
        }
        // line 151
        echo "                    ";
        // line 152
        echo "                </div>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "themes/noir-flextype/templates/blog.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  318 => 152,  316 => 151,  313 => 150,  298 => 148,  294 => 147,  291 => 146,  289 => 145,  286 => 144,  280 => 143,  277 => 142,  274 => 141,  269 => 130,  266 => 129,  261 => 125,  258 => 123,  248 => 121,  245 => 120,  237 => 118,  234 => 117,  224 => 115,  222 => 114,  219 => 113,  216 => 111,  206 => 107,  201 => 105,  194 => 104,  190 => 103,  183 => 99,  178 => 96,  175 => 94,  171 => 92,  169 => 91,  168 => 90,  167 => 80,  164 => 79,  159 => 78,  157 => 77,  154 => 76,  151 => 75,  148 => 74,  145 => 73,  142 => 72,  140 => 71,  137 => 70,  135 => 69,  132 => 68,  129 => 61,  126 => 59,  123 => 58,  121 => 56,  120 => 55,  119 => 44,  118 => 40,  115 => 39,  110 => 38,  107 => 37,  104 => 36,  101 => 35,  98 => 34,  95 => 33,  92 => 32,  90 => 31,  87 => 30,  85 => 22,  83 => 18,  80 => 16,  78 => 15,  75 => 14,  72 => 13,  69 => 12,  67 => 11,  64 => 10,  62 => 9,  59 => 8,  56 => 7,  54 => 6,  51 => 5,  49 => 4,  45 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/noir-flextype/templates/blog.html", "/Applications/MAMP/htdocs/flextype.org/project/themes/noir-flextype/templates/blog.html");
    }
}
