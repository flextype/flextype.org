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

/* themes/noir-flextype/templates/extend.html */
class __TwigTemplate_578279b20eda5d37375a0293eeb97f1d2bf626285b66e7294d981d9c83dc2d75 extends \Twig\Template
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
        return $this->loadTemplate((("themes/" . twig_get_attribute($this->env, $this->source, ($context["registry"] ?? null), "get", [0 => "plugins.site.settings.theme"], "method", false, false, false, 1)) . "/templates/partials/base.html"), "themes/noir-flextype/templates/extend.html", 1);
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
        echo "/downloads\">";
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_downloads", [], "any", false, false, false, 10);
        echo "</a></span>
            </div>
        </div>
        <div>
            <div class=\"flex content-center flex-wrap\">
                <div class=\"w-full lg:w-6/12 p-6 text-center\">
                    <div class=\"p-12 h-full text-black plate\">
                        <i class=\"fas fa-plug text-6xl mb-5\" aria-hidden=\"true\"></i>
                        <h4 class=\"text-2xl\">";
        // line 18
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_plugins", [], "any", false, false, false, 18);
        echo "</h4>
                        <div class=\"h-24 mb-10\">
                            ";
        // line 20
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_plugins_p", [], "any", false, false, false, 20);
        echo "
                            <br>
                        </div>
                        <a class=\"pl-6 pr-6 pt-2 pb-2 button text-base\"  href=\"";
        // line 23
        echo $this->extensions['Flextype\UrlTwigExtension']->url();
        echo "/";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "slug", [], "any", false, false, false, 23), "html", null, true);
        echo "/plugins\">";
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_plugins_browse", [], "any", false, false, false, 23);
        echo "</a>
                    </div>
                </div>
                <div class=\"w-full lg:w-6/12 p-6 text-center\">
                    <div class=\"p-12 h-full text-black plate\">
                        <i class=\"fas fa-palette text-6xl mb-5\" aria-hidden=\"true\"></i>
                        <h4 class=\"text-2xl\">";
        // line 29
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_themes", [], "any", false, false, false, 29);
        echo "</h4>
                        <div class=\"h-24 mb-10\">
                            ";
        // line 31
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_themes_p", [], "any", false, false, false, 31);
        echo "
                        </div>
                        <a class=\"pl-6 pr-6 pt-2 pb-2 button text-base\"  href=\"";
        // line 33
        echo $this->extensions['Flextype\UrlTwigExtension']->url();
        echo "/";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "slug", [], "any", false, false, false, 33), "html", null, true);
        echo "/themes\">";
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_themes_browse", [], "any", false, false, false, 33);
        echo "</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "themes/noir-flextype/templates/extend.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 33,  110 => 31,  105 => 29,  92 => 23,  86 => 20,  81 => 18,  66 => 10,  54 => 7,  49 => 4,  45 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/noir-flextype/templates/extend.html", "/Applications/MAMP/htdocs/flextype.org/project/themes/noir-flextype/templates/extend.html");
    }
}
