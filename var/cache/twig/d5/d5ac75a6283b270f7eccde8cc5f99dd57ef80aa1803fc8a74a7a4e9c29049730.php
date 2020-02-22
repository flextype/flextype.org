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

/* themes/noir-flextype/templates/downloads.html */
class __TwigTemplate_50e9f56eb59a9523d4b8b94d9a1781de690900d3f9b73490d27e6882335a0408 extends \Twig\Template
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
        return $this->loadTemplate((("themes/" . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["registry"] ?? null), "flextype", [], "any", false, false, false, 1), "theme", [], "any", false, false, false, 1)) . "/templates/partials/base.html"), "themes/noir-flextype/templates/downloads.html", 1);
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
        <h1 class=\"uppercase text-center text-3xl lg:text-6xl m-0 pl-6 pr-6 lg:pl-24 lg:pr-24 pt-24 pb-24 font-noirpro-semibold\">
            ";
        // line 6
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "title", [], "any", false, false, false, 6);
        echo "
        </h1>
        <div class=\"pl-6 pr-6 lg:pl-16 lg:pr-16\">
            <div class=\"flex content-center flex-wrap\">
                <div class=\"w-full lg:w-6/12 p-2 text-center\">
                    <div class=\"p-12 h-full bg-black text-white\">
                        <i class=\"fas fa-download text-6xl mb-5\" aria-hidden=\"true\"></i>
                        <h4 class=\"text-2xl\">Flextype</h4>
                        <div class=\"h-24 mb-10\">
                            The Flextype release package contains: core functionality, default theme, admin panel and site plugins.
                            <br>
                        </div>
                        <a class=\"uppercase pl-6 pr-6 pt-2 pb-2 text-white bg-black border-white border-3 hover:bg-white hover:text-black hover:border-white hover:border-3\" href=\"https://github.com/flextype/flextype/releases/download/v0.9.6/flextype-0.9.6.zip\">DOWNLOAD Flextype 0.9.6</a>
                    </div>
                </div>
                <div class=\"w-full lg:w-6/12 p-2 text-center\">
                    <div class=\"p-12 h-full bg-black text-white\">
                        <i class=\"fab fa-github text-6xl mb-5\" aria-hidden=\"true\"></i>
                        <h4 class=\"text-2xl\">Support</h4>
                        <div class=\"h-24 mb-10\">
                            If you want to report a bug or contribute your ideas, you can use the
                            <a href=\"https://github.com/flextype/flextype/issues\">Flextype GitHub Issues tracker</a>.
                        </div>
                        <a class=\"uppercase pl-6 pr-6 pt-2 pb-2 text-white bg-black border-white border-3 hover:bg-white hover:text-black hover:border-white hover:border-3\" href=\"https://github.com/flextype\">Contribute</a>
                    </div>
                </div>
                <div class=\"w-full lg:w-6/12 p-2 text-center\">
                    <div class=\"p-12 h-full bg-black text-white\">
                        <i class=\"fas fa-plug text-6xl mb-5\" aria-hidden=\"true\"></i>
                        <h4 class=\"text-2xl\">Plugins</h4>
                        <div class=\"h-24 mb-10\">
                            Extend and customize Flextype functionality with plugins.
                            <br>
                        </div>
                        <a class=\"uppercase pl-6 pr-6 pt-2 pb-2 text-white bg-black border-white border-3 hover:bg-white hover:text-black hover:border-white hover:border-3\" href=\"https://github.com/flextype/plugins\">VISIT PLUGINS REPOSITORY</a>
                    </div>
                </div>
                <div class=\"w-full lg:w-6/12 p-2 text-center\">
                    <div class=\"p-12 h-full bg-black text-white\">
                        <i class=\"fas fa-palette text-6xl mb-5\" aria-hidden=\"true\"></i>
                        <h4 class=\"text-2xl\">Themes</h4>
                        <div class=\"h-24 mb-10\">
                            Customize your site with a themes for Flextype.
                        </div>
                        <a class=\"uppercase pl-6 pr-6 pt-2 pb-2 text-white bg-black border-white border-3 hover:bg-white hover:text-black hover:border-white hover:border-3\" href=\"https://github.com/flextype/themes\">VISIT THEMES REPOSITORY</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "themes/noir-flextype/templates/downloads.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 6,  49 => 4,  45 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/noir-flextype/templates/downloads.html", "/Applications/MAMP/htdocs/flextype.org/site/themes/noir-flextype/templates/downloads.html");
    }
}
