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

/* themes/noir-flextype/templates/blog-post.html */
class __TwigTemplate_67378487d561e3a12196231c552f361cfbf863bf3bbbe9aa071072bec51a7b1c extends \Twig\Template
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
        return $this->loadTemplate((("themes/" . twig_get_attribute($this->env, $this->source, ($context["registry"] ?? null), "get", [0 => "plugins.site.settings.theme"], "method", false, false, false, 1)) . "/templates/partials/base.html"), "themes/noir-flextype/templates/blog-post.html", 1);
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
        echo "<div class=\"container mx-auto bg-white text-black pb-24\">
    <div class=\"uppercase text-center pt-24 pb-24 m-0\">
        <div>
            <h1 class=\"text-3xl lg:text-6xl mb-0\"><a class=\"no-underline\" href=\"";
        // line 7
        echo $this->extensions['Flextype\UrlTwigExtension']->url();
        echo "/";
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "/downloads/extend/plugins/";
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "title", [], "any", false, false, false, 7), "html", null, true);
        echo "</a></h1>
        </div>
        <div>
            <span class=\"opacity-50\"><a class=\"no-underline\" href=\"";
        // line 10
        echo $this->extensions['Flextype\UrlTwigExtension']->url();
        echo "/";
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "/blog\">Blog</a></span>
        </div>
    </div>
    <div>
        <div>";
        // line 14
        echo $this->extensions['Flextype\MarkdownTwigExtension']->markdown($this->extensions['Flextype\ShortcodesTwigExtension']->shortcode(twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "content", [], "any", false, false, false, 14)));
        echo "</div>
        <div class=\"mt-10\">
            <b>Date:</b>
            ";
        // line 17
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "published_at", [], "any", false, false, false, 17), twig_get_attribute($this->env, $this->source, ($context["registry"] ?? null), "get", [0 => "flextype.settings.date_display_format"], "method", false, false, false, 17)), "html", null, true);
        echo "
            <b>Tags:</b>
            ";
        // line 19
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "tags", [], "any", false, false, false, 19))) {
            // line 20
            echo "                ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_split_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "tags", [], "any", false, false, false, 20), ","));
            foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
                // line 21
                echo "                    <a class=\"no-underline\" href=\"";
                echo $this->extensions['Flextype\UrlTwigExtension']->url();
                echo "/";
                echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
                echo "/blog?tag=";
                echo twig_escape_filter($this->env, $context["tag"], "html", null, true);
                echo "\">#";
                echo twig_escape_filter($this->env, twig_trim_filter($context["tag"]), "html", null, true);
                echo "</a>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tag'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 23
            echo "            ";
        }
        // line 24
        echo "        </div>
        <div>
            ";
        // line 26
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "tags", [], "any", false, false, false, 26))) {
            // line 27
            echo "                ";
            $context["tags"] = twig_split_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "tags", [], "any", false, false, false, 27), ",");
            // line 28
            echo "                ";
            $context["related_posts"] = [];
            // line 29
            echo "
                ";
            // line 30
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["tags"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
                // line 31
                echo "                    ";
                $context["related_posts"] = twig_array_merge(($context["related_posts"] ?? null), twig_get_attribute($this->env, $this->source, ($context["entries"] ?? null), "fetch", [0 => (($context["locale"] ?? null) . "/blog"), 1 => ["where" => ["key" => "tags", "expr" => "contains", "value" =>                 // line 35
$context["tag"]], "and_where" => [0 => ["key" => "visibility", "expr" => "nin", "value" => [0 => "draft", 1 => "hidden"]]], "order_by" => ["field" => "published_at", "direction" => "desc"], "set_max_result" => 6]], "method", false, false, false, 31));
                // line 48
                echo "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tag'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 49
            echo "
                ";
            // line 50
            if ((twig_length_filter($this->env, ($context["related_posts"] ?? null)) > 0)) {
                // line 51
                echo "                <hr class=\"mt-6 mb-6 border-1\" style=\"border-color: #f8f9fb;\">
                <div class=\"p-2 text-black mb-6\">
                    <h4>Related Posts</h4>
                    ";
                // line 54
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["related_posts"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["related_post"]) {
                    // line 55
                    echo "                        ";
                    if ((twig_get_attribute($this->env, $this->source, $context["related_post"], "slug", [], "any", false, false, false, 55) != twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "slug", [], "any", false, false, false, 55))) {
                        // line 56
                        echo "                        <a href=\"";
                        echo $this->extensions['Flextype\UrlTwigExtension']->url();
                        echo "/";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["related_post"], "slug", [], "any", false, false, false, 56), "html", null, true);
                        echo "\" class=\"w-full p-2 no-underline\">
                            <div class=\"flex align-middle mb-6 post wow fadeIn\">
                                <div class=\"text-left\">
                                    <h4 class=\"text-xl pb-0 mb-0 block\">";
                        // line 59
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["related_post"], "title", [], "any", false, false, false, 59), "html", null, true);
                        echo "</h4>
                                </div>
                            </div>
                        </a>
                        ";
                    }
                    // line 64
                    echo "                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['related_post'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 65
                echo "                </div>
                ";
            }
            // line 67
            echo "            ";
        }
        // line 68
        echo "        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "themes/noir-flextype/templates/blog-post.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  187 => 68,  184 => 67,  180 => 65,  174 => 64,  166 => 59,  157 => 56,  154 => 55,  150 => 54,  145 => 51,  143 => 50,  140 => 49,  134 => 48,  132 => 35,  130 => 31,  126 => 30,  123 => 29,  120 => 28,  117 => 27,  115 => 26,  111 => 24,  108 => 23,  93 => 21,  88 => 20,  86 => 19,  81 => 17,  75 => 14,  66 => 10,  54 => 7,  49 => 4,  45 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/noir-flextype/templates/blog-post.html", "/Applications/MAMP/htdocs/flextype.org/project/themes/noir-flextype/templates/blog-post.html");
    }
}
