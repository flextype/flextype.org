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

/* themes/noir-flextype/templates/community.html */
class __TwigTemplate_40b79f2f646a4ae85041e50d0e0fc4d58aa1cd1e749a8aa529fe99811975bae7 extends \Twig\Template
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
        return $this->loadTemplate((("themes/" . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["registry"] ?? null), "flextype", [], "any", false, false, false, 1), "theme", [], "any", false, false, false, 1)) . "/templates/partials/base.html"), "themes/noir-flextype/templates/community.html", 1);
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
        <div class=\"flex content-center flex-wrap mt-12\">
            <div class=\"w-full lg:w-6/12 p-2 text-center\">
                <div class=\"p-12 h-full bg-black text-white\">
                    <i class=\"fab fa-discord text-6xl mb-5\" aria-hidden=\"true\"></i>
                    <h4 class=\"text-2xl\">Discord</h4>
                    <div class=\"h-24 mb-10\">
                        Got a question about setting up or using Flextype? We'll do our best to help you out.
                        Also here you may start discussions about core, plugin and themes development.
                    </div>
                    <a class=\"uppercase pl-6 pr-6 pt-2 pb-2 text-white bg-black border-white border-3 hover:bg-white hover:text-black hover:border-white hover:border-3\" href=\"https://discord.gg/CCKPKVG\">Join the Conversation</a>
                </div>
            </div>
            <div class=\"w-full lg:w-6/12 p-2 text-center\">
                <div class=\"p-12 h-full bg-black text-white\">
                    <i class=\"fab fa-github text-6xl mb-5\" aria-hidden=\"true\"></i>
                    <h4 class=\"text-2xl\">Github</h4>
                    <div class=\"h-24 mb-10\">
                        If you want to report a bug or contribute your ideas, you can use the <a href=\"https://github.com/flextype/flextype/issues\">Flextype GitHub Issues tracker</a>.
                    </div>
                    <a class=\"uppercase pl-6 pr-6 pt-2 pb-2 text-white bg-black border-white border-3 hover:bg-white hover:text-black hover:border-white hover:border-3\" href=\"https://github.com/flextype\">Contribute</a>
                </div>
            </div>
            <div class=\"w-full lg:w-6/12 p-2 text-center\">
                <div class=\"p-12 h-full bg-black text-white\">
                    <i class=\"fab fa-vk text-6xl mb-5\" aria-hidden=\"true\"></i>
                    <h4 class=\"text-2xl\">Vkontakte</h4>
                    <div class=\"h-24 mb-10\">
                        Russian Flextype Community!
                    </div>
                    <a class=\"uppercase pl-6 pr-6 pt-2 pb-2 text-white bg-black border-white border-3 hover:bg-white hover:text-black hover:border-white hover:border-3\" href=\"https://vk.com/flextype\">Subscribe</a>
                </div>
            </div>
            <div class=\"w-full lg:w-6/12 p-2 text-center\">
                <div class=\"p-12 h-full bg-black text-white align-middle\">
                    <i class=\"fab fa-twitter text-6xl mb-5\" aria-hidden=\"true\"></i>
                    <h4 class=\"text-2xl\">Twitter</h4>
                    <div class=\"h-24 mb-10\">
                        Follow <a href=\"https://twitter.com/getflextype\">Flextype on Twitter</a> to get real-time news regarding the development and all events we are attending.
                    </div>
                    <a class=\"uppercase pl-6 pr-6 pt-2 pb-2 text-white bg-black border-white border-3 hover:bg-white hover:text-black hover:border-white hover:border-3\" href=\"https://twitter.com/getflextype\">Follow Us</a>
                </div>
            </div>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "themes/noir-flextype/templates/community.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 9,  53 => 6,  49 => 4,  45 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/noir-flextype/templates/community.html", "/Applications/MAMP/htdocs/flextype.org/site/themes/noir-flextype/templates/community.html");
    }
}
