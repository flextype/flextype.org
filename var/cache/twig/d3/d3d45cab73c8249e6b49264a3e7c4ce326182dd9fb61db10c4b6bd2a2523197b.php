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

/* themes/noir-flextype/templates/about.html */
class __TwigTemplate_4ac1988816ce34e924c4ec014fc311654d1d7f4bc8aefd9d4de637d388dc6bd8 extends \Twig\Template
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
        return $this->loadTemplate((("themes/" . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["registry"] ?? null), "flextype", [], "any", false, false, false, 1), "theme", [], "any", false, false, false, 1)) . "/templates/partials/base.html"), "themes/noir-flextype/templates/about.html", 1);
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
    <h1 class=\"uppercase text-center text-3xl lg:text-6xl m-0 pl-6 pr-6 lg:pl-16 lg:pr-16 pt-24 pb-24 font-noirpro-semibold\">
        ";
        // line 6
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "title", [], "any", false, false, false, 6);
        echo "
    </h1>
    <h2 class=\"text-center m-0 pl-6 pr-6 lg:pl-40 lg:pr-40 pb-24 text-xl font-normal\">
        ";
        // line 9
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "description", [], "any", false, false, false, 9);
        echo "
    </h2>
    <div class=\"pl-6 pr-6 lg:pl-16 lg:pr-16\">
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
        return "themes/noir-flextype/templates/about.html";
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
        return new Source("", "themes/noir-flextype/templates/about.html", "/Applications/MAMP/htdocs/flextype.org/site/themes/noir-flextype/templates/about.html");
    }
}
