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

/* themes/noir-flextype/templates/themes.html */
class __TwigTemplate_53d9f0ab1a72e28002e83b37cb78ca04a0951964aba5a2d6fef140527c6ab060 extends \Twig\Template
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
        return $this->loadTemplate((("themes/" . twig_get_attribute($this->env, $this->source, ($context["registry"] ?? null), "get", [0 => "plugins.site.settings.theme"], "method", false, false, false, 1)) . "/templates/partials/base.html"), "themes/noir-flextype/templates/themes.html", 1);
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
        echo "/downloads/extend/";
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
        </div>
    </div>
    <div class=\"flex content-center flex-wrap\">
        <div class=\"w-full lg:w-9/12 p-2 text-center\">

            ";
        // line 22
        echo "
              ";
        // line 23
        $context["page"] = twig_get_attribute($this->env, $this->source, ($context["query"] ?? null), "page", [], "any", false, false, false, 23);
        // line 24
        echo "              ";
        $context["tag"] = twig_get_attribute($this->env, $this->source, ($context["query"] ?? null), "tag", [], "any", false, false, false, 24);
        // line 25
        echo "              ";
        $context["author"] = twig_get_attribute($this->env, $this->source, ($context["query"] ?? null), "author", [], "any", false, false, false, 25);
        // line 26
        echo "
              ";
        // line 27
        $context["plugins_items_limit"] = 10;
        // line 28
        echo "
              ";
        // line 29
        if ((($context["themes_items_limit"] ?? null) == 0)) {
            // line 30
            echo "                  ";
            $context["themes_items_limit"] = 5;
            // line 31
            echo "              ";
        }
        // line 32
        echo "
              ";
        // line 33
        if (($context["tag"] ?? null)) {
            // line 34
            echo "
                  ";
            // line 36
            echo "                  ";
            $context["themes_items_length"] = twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["entries"] ?? null), "fetch", [0 => (($context["locale"] ?? null) . "/downloads/extend/themes"), 1 => ["where" => ["key" => "keywords", "expr" => "contains", "value" =>             // line 40
($context["tag"] ?? null)], "and_where" => [0 => ["key" => "visibility", "expr" => "nin", "value" => [0 => "draft", 1 => "hidden"]]]]], "method", false, false, false, 36));
            // line 48
            echo "
                  ";
            // line 49
            $context["themes_items_pages"] = twig_round((($context["themes_items_length"] ?? null) / ($context["themes_items_limit"] ?? null)), 0, "ceil");
            // line 50
            echo "                  ";
            if ((($context["page"] ?? null) < 1)) {
                // line 51
                echo "                      ";
                $context["page"] = 1;
                // line 52
                echo "                  ";
            } elseif ((($context["page"] ?? null) > ($context["themes_items_pages"] ?? null))) {
                // line 53
                echo "                      ";
                $context["page"] = ($context["themes_items_pages"] ?? null);
                // line 54
                echo "                  ";
            }
            // line 55
            echo "                  ";
            $context["themes_items_offset"] = ((($context["page"] ?? null) - 1) * ($context["themes_items_limit"] ?? null));
            // line 56
            echo "                  ";
            if ((($context["themes_items_offset"] ?? null) < 0)) {
                $context["themes_items_offset"] = 0;
            }
            // line 57
            echo "
                  ";
            // line 58
            $context["themes_items"] = twig_get_attribute($this->env, $this->source, ($context["entries"] ?? null), "fetch", [0 => (($context["locale"] ?? null) . "/downloads/extend/themes"), 1 => ["where" => ["key" => "keywords", "expr" => "contains", "value" =>             // line 62
($context["tag"] ?? null)], "and_where" => [0 => ["key" => "visibility", "expr" => "nin", "value" => [0 => "draft", 1 => "hidden"]]], "order_by" => ["field" => "published_at", "direction" => "desc"], "set_max_result" =>             // line 73
($context["themes_items_limit"] ?? null), "set_first_result" =>             // line 74
($context["themes_items_offset"] ?? null)]], "method", false, false, false, 58);
            // line 76
            echo "
              ";
        } elseif (        // line 77
($context["author"] ?? null)) {
            // line 78
            echo "
                ";
            // line 80
            echo "                ";
            $context["themes_items_length"] = twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["entries"] ?? null), "fetch", [0 => (($context["locale"] ?? null) . "/downloads/extend/themes"), 1 => ["where" => ["key" => "author.email", "expr" => "eq", "value" =>             // line 84
($context["author"] ?? null)], "and_where" => [0 => ["key" => "visibility", "expr" => "nin", "value" => [0 => "draft", 1 => "hidden"]]]]], "method", false, false, false, 80));
            // line 92
            echo "
                ";
            // line 93
            $context["themes_items_pages"] = twig_round((($context["themes_items_length"] ?? null) / ($context["themes_items_limit"] ?? null)), 0, "ceil");
            // line 94
            echo "                ";
            if ((($context["page"] ?? null) < 1)) {
                // line 95
                echo "                    ";
                $context["page"] = 1;
                // line 96
                echo "                ";
            } elseif ((($context["page"] ?? null) > ($context["themes_items_pages"] ?? null))) {
                // line 97
                echo "                    ";
                $context["page"] = ($context["themes_items_pages"] ?? null);
                // line 98
                echo "                ";
            }
            // line 99
            echo "                ";
            $context["themes_items_offset"] = ((($context["page"] ?? null) - 1) * ($context["themes_items_limit"] ?? null));
            // line 100
            echo "                ";
            if ((($context["themes_items_offset"] ?? null) < 0)) {
                $context["themes_items_offset"] = 0;
            }
            // line 101
            echo "
                ";
            // line 102
            $context["themes_items"] = twig_get_attribute($this->env, $this->source, ($context["entries"] ?? null), "fetch", [0 => (($context["locale"] ?? null) . "/downloads/extend/themes"), 1 => ["where" => ["key" => "author.email", "expr" => "eq", "value" =>             // line 106
($context["author"] ?? null)], "and_where" => [0 => ["key" => "visibility", "expr" => "nin", "value" => [0 => "draft", 1 => "hidden"]]], "order_by" => ["field" => "published_at", "direction" => "desc"], "set_max_result" =>             // line 117
($context["themes_items_limit"] ?? null), "set_first_result" =>             // line 118
($context["themes_items_offset"] ?? null)]], "method", false, false, false, 102);
            // line 120
            echo "              ";
        } else {
            // line 121
            echo "
                  ";
            // line 123
            echo "                  ";
            $context["themes_items_length"] = twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["entries"] ?? null), "fetch", [0 => (($context["locale"] ?? null) . "/downloads/extend/themes"), 1 => ["where" => ["key" => "visibility", "expr" => "nin", "value" => [0 => "draft", 1 => "hidden"]]]], "method", false, false, false, 123));
            // line 130
            echo "
                  ";
            // line 131
            $context["themes_items_pages"] = twig_round((($context["themes_items_length"] ?? null) / ($context["themes_items_limit"] ?? null)), 0, "ceil");
            // line 132
            echo "
                  ";
            // line 133
            if ((($context["page"] ?? null) < 1)) {
                // line 134
                echo "                      ";
                $context["page"] = 1;
                // line 135
                echo "                  ";
            } elseif ((($context["page"] ?? null) > ($context["themes_items_pages"] ?? null))) {
                // line 136
                echo "                      ";
                $context["page"] = ($context["themes_items_pages"] ?? null);
                // line 137
                echo "                  ";
            }
            // line 138
            echo "
                  ";
            // line 139
            $context["themes_items_offset"] = ((($context["page"] ?? null) - 1) * ($context["themes_items_limit"] ?? null));
            // line 140
            echo "                  ";
            if ((($context["themes_items_offset"] ?? null) < 0)) {
                $context["themes_items_offset"] = 0;
            }
            // line 141
            echo "
                  ";
            // line 142
            $context["themes_items"] = twig_get_attribute($this->env, $this->source, ($context["entries"] ?? null), "fetch", [0 => (($context["locale"] ?? null) . "/downloads/extend/themes"), 1 => ["where" => ["key" => "visibility", "expr" => "nin", "value" => [0 => "draft", 1 => "hidden"]], "order_by" => ["field" => "published_at", "direction" => "desc"], "set_max_result" =>             // line 152
($context["themes_items_limit"] ?? null), "set_first_result" =>             // line 153
($context["themes_items_offset"] ?? null)]], "method", false, false, false, 142);
            // line 154
            echo "
              ";
        }
        // line 156
        echo "
              ";
        // line 158
        echo "
             ";
        // line 159
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["themes_items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 160
            echo "             <a href=\"";
            echo $this->extensions['Flextype\UrlTwigExtension']->url();
            echo "/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "slug", [], "any", false, false, false, 160), "html", null, true);
            echo "\" class=\"p-6 flex align-middle mb-6 extend wow fadeIn\">
                 <img src=\"";
            // line 161
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "preview", [], "any", false, false, false, 161), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, false, 161), "html", null, true);
            echo "\" style=\"height: 120px; margin-right: 20px;\">
                 <div class=\"text-left\">
                     <h4 class=\"text-xl pb-0 mb-0 block\">";
            // line 163
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, false, 163), "html", null, true);
            echo "</h4>
                     <p class=\"m-0\">
                         ";
            // line 165
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "description", [], "any", false, false, false, 165), "html", null, true);
            echo "
                     </p>
                 </div>
             </a>
           ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 170
        echo "
           ";
        // line 172
        echo "           <div class=\"text-center\">
               ";
        // line 173
        if (((($context["page"] ?? null) - 1) > 0)) {
            // line 174
            echo "                   <a href=\"?page=";
            echo twig_escape_filter($this->env, (($context["page"] ?? null) - 1), "html", null, true);
            if (($context["author"] ?? null)) {
                echo "&author=";
                echo twig_escape_filter($this->env, ($context["author"] ?? null), "html", null, true);
            }
            if (($context["tag"] ?? null)) {
                echo "&tag=";
                echo twig_escape_filter($this->env, ($context["tag"] ?? null), "html", null, true);
            }
            echo "\">&larr;</a>
               ";
        }
        // line 176
        echo "               ";
        if (( !(null === ($context["themes_items_pages"] ?? null)) && (($context["themes_items_pages"] ?? null) > 1))) {
            // line 177
            echo "                   ";
            echo twig_escape_filter($this->env, ($context["page"] ?? null), "html", null, true);
            echo " / ";
            echo twig_escape_filter($this->env, ($context["themes_items_pages"] ?? null), "html", null, true);
            echo "
               ";
        }
        // line 179
        echo "               ";
        if ((($context["page"] ?? null) < ($context["themes_items_pages"] ?? null))) {
            // line 180
            echo "                   <a href=\"?page=";
            echo twig_escape_filter($this->env, (($context["page"] ?? null) + 1), "html", null, true);
            if (($context["author"] ?? null)) {
                echo "&author=";
                echo twig_escape_filter($this->env, ($context["author"] ?? null), "html", null, true);
            }
            if (($context["tag"] ?? null)) {
                echo "&tag=";
                echo twig_escape_filter($this->env, ($context["tag"] ?? null), "html", null, true);
            }
            echo "\">&rarr;</a>
               ";
        }
        // line 182
        echo "           </div>
           ";
        // line 184
        echo "
        </div>
        <div class=\"w-full lg:w-3/12 p-2\">
            <div class=\"text-black text-left p-6 plate\">
            ";
        // line 189
        echo "            ";
        $context["keywords_cloud"] = [];
        // line 190
        echo "            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["entries"] ?? null), "fetch", [0 => (($context["locale"] ?? null) . "/downloads/extend/themes"), 1 => ["where" => ["key" => "visibility", "expr" => "nin", "value" => [0 => "draft", 1 => "hidden"]], "order_by" => ["field" => "published_at", "direction" => "desc"]]], "method", false, false, false, 190));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 201
            echo "                ";
            $context["keywords"] = twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["post"], "keywords", [], "any", false, false, false, 201), [" " => ""]);
            // line 202
            echo "                ";
            $context["keywords_cloud"] = twig_array_merge(($context["keywords_cloud"] ?? null), twig_split_filter($this->env, ($context["keywords"] ?? null), ","));
            // line 203
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 204
        echo "
            ";
        // line 205
        if ((twig_length_filter($this->env, ($context["keywords_cloud"] ?? null)) > 0)) {
            // line 206
            echo "                <h4 class=\"text-left mb-2\">Tags</h4>
                ";
            // line 207
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_array_reduce(($context["keywords_cloud"] ?? null), function ($__unique__, $__item__) use ($context, $macros) { $context["unique"] = $__unique__; $context["item"] = $__item__; return ((twig_in_filter(($context["item"] ?? null), ($context["unique"] ?? null))) ? (($context["unique"] ?? null)) : (twig_array_merge(($context["unique"] ?? null), [0 => ($context["item"] ?? null)]))); }, []));
            foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
                // line 208
                echo "                    <a class=\"no-underline px-2 mb-2 block\" href=\"";
                echo $this->extensions['Flextype\UrlTwigExtension']->url();
                echo "/";
                echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
                echo "/downloads/extend/plugins?tag=";
                echo twig_escape_filter($this->env, twig_trim_filter($context["tag"]), "html", null, true);
                echo "\">#";
                echo twig_escape_filter($this->env, twig_trim_filter($context["tag"]), "html", null, true);
                echo "</a>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tag'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 210
            echo "            ";
        }
        // line 211
        echo "            ";
        // line 212
        echo "
            </div>
            <!--
            <div class=\"text-black text-center p-6\">
                <a class=\"no-underline uppercase text-center relative text-base relative pl-6 pr-6 pt-2 pb-2 text-black bg-white border-black border-2 hover:bg-black hover:text-white hover:border-black\" href=\"https://docs.flextype.org/";
        // line 216
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "/getting-started/installation\">SUBMIT A PLUGIN</a>
            </div>
            -->
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "themes/noir-flextype/templates/themes.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  422 => 216,  416 => 212,  414 => 211,  411 => 210,  396 => 208,  392 => 207,  389 => 206,  387 => 205,  384 => 204,  378 => 203,  375 => 202,  372 => 201,  367 => 190,  364 => 189,  358 => 184,  355 => 182,  341 => 180,  338 => 179,  330 => 177,  327 => 176,  313 => 174,  311 => 173,  308 => 172,  305 => 170,  294 => 165,  289 => 163,  282 => 161,  275 => 160,  271 => 159,  268 => 158,  265 => 156,  261 => 154,  259 => 153,  258 => 152,  257 => 142,  254 => 141,  249 => 140,  247 => 139,  244 => 138,  241 => 137,  238 => 136,  235 => 135,  232 => 134,  230 => 133,  227 => 132,  225 => 131,  222 => 130,  219 => 123,  216 => 121,  213 => 120,  211 => 118,  210 => 117,  209 => 106,  208 => 102,  205 => 101,  200 => 100,  197 => 99,  194 => 98,  191 => 97,  188 => 96,  185 => 95,  182 => 94,  180 => 93,  177 => 92,  175 => 84,  173 => 80,  170 => 78,  168 => 77,  165 => 76,  163 => 74,  162 => 73,  161 => 62,  160 => 58,  157 => 57,  152 => 56,  149 => 55,  146 => 54,  143 => 53,  140 => 52,  137 => 51,  134 => 50,  132 => 49,  129 => 48,  127 => 40,  125 => 36,  122 => 34,  120 => 33,  117 => 32,  114 => 31,  111 => 30,  109 => 29,  106 => 28,  104 => 27,  101 => 26,  98 => 25,  95 => 24,  93 => 23,  90 => 22,  79 => 15,  72 => 13,  60 => 10,  54 => 6,  52 => 5,  49 => 4,  45 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/noir-flextype/templates/themes.html", "/Applications/MAMP/htdocs/flextype.org/project/themes/noir-flextype/templates/themes.html");
    }
}
