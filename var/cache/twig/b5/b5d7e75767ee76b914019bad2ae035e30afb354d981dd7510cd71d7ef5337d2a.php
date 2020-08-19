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

/* themes/noir-flextype/templates/default.html */
class __TwigTemplate_432244198f723059a8e7dff25c6988fb0cc0735aa08f21364e5b0a50be9123a0 extends \Twig\Template
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
        return $this->loadTemplate((("themes/" . twig_get_attribute($this->env, $this->source, ($context["registry"] ?? null), "get", [0 => "plugins.site.settings.theme"], "method", false, false, false, 1)) . "/templates/partials/base.html"), "themes/noir-flextype/templates/default.html", 1);
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
    <h1 class=\"uppercase text-center text-3xl lg:text-6xl pt-24 pb-24 m-0\">
        ";
        // line 6
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "title", [], "any", false, false, false, 6);
        echo "
    </h1>
    <h2 class=\"text-center m-0 pb-24 pl-6 pr-6 lg:pl-40 lg:pr-40 text-xl font-normal\">
        ";
        // line 9
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "description", [], "any", false, false, false, 9);
        echo "
    </h2>
    <div>
        ";
        // line 12
        echo $this->extensions['Flextype\MarkdownTwigExtension']->markdown($this->extensions['Flextype\ShortcodesTwigExtension']->shortcode(twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "content", [], "any", false, false, false, 12)));
        echo "
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "themes/noir-flextype/templates/default.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 12,  59 => 9,  53 => 6,  49 => 4,  45 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/noir-flextype/templates/default.html", "/Applications/MAMP/htdocs/flextype.org/project/themes/noir-flextype/templates/default.html");
    }
}
