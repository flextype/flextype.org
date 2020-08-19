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
class __TwigTemplate_ca80be4d19fc12cd609ad8c28f2de1d600eabe3a7ffcbeebeb1f7b9666ff6a02 extends \Twig\Template
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
        return $this->loadTemplate((("themes/" . twig_get_attribute($this->env, $this->source, ($context["registry"] ?? null), "get", [0 => "plugins.site.settings.theme"], "method", false, false, false, 1)) . "/templates/partials/base.html"), "themes/noir-flextype/templates/community.html", 1);
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
    <h1 class=\"uppercase text-center text-3xl lg:text-6xl m-0 pt-24 pb-24\">
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
    <div class=\"\">
        <div class=\"flex content-center flex-wrap mt-12\">
            <div class=\"w-full lg:w-6/12 p-6 text-center\">
                <div class=\"p-12 h-full text-black plate\">
                    <i class=\"fab fa-discord text-6xl mb-5\" aria-hidden=\"true\"></i>
                    <h4 class=\"text-2xl\">";
        // line 16
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_discord_heading", [], "any", false, false, false, 16);
        echo "</h4>
                    <div class=\"h-24 mb-10\">
                        ";
        // line 18
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_discord_p", [], "any", false, false, false, 18);
        echo "
                    </div>
                    <a class=\"pl-6 pr-6 pt-2 pb-2 button text-base\" href=\"https://discord.gg/CCKPKVG\">";
        // line 20
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_discord_button", [], "any", false, false, false, 20);
        echo "</a>
                </div>
            </div>
            <div class=\"w-full lg:w-6/12 p-6 text-center\">
                <div class=\"p-12 h-full text-black plate\">
                    <i class=\"fab fa-github text-6xl mb-5\" aria-hidden=\"true\"></i>
                    <h4 class=\"text-2xl\">";
        // line 26
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_github_heading", [], "any", false, false, false, 26);
        echo "</h4>
                    <div class=\"h-24 mb-10\">
                        ";
        // line 28
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_github_p", [], "any", false, false, false, 28);
        echo "
                    </div>
                    <a class=\"pl-6 pr-6 pt-2 pb-2 button text-base\" href=\"https://github.com/flextype\">";
        // line 30
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_github_button", [], "any", false, false, false, 30);
        echo "</a>
                </div>
            </div>
            <div class=\"w-full lg:w-6/12 p-6 text-center\">
                <div class=\"p-12 h-full text-black plate\">
                    <i class=\"fab fa-vk text-6xl mb-5\" aria-hidden=\"true\"></i>
                    <h4 class=\"text-2xl\">";
        // line 36
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_vkontakte_heading", [], "any", false, false, false, 36);
        echo "</h4>
                    <div class=\"h-24 mb-10\">
                        ";
        // line 38
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_vkontakte_p", [], "any", false, false, false, 38);
        echo "
                    </div>
                    <a class=\"pl-6 pr-6 pt-2 pb-2 button text-base\" href=\"https://vk.com/flextype\">";
        // line 40
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_vkontakte_button", [], "any", false, false, false, 40);
        echo "</a>
                </div>
            </div>
            <div class=\"w-full lg:w-6/12 p-6 text-center\">
                <div class=\"p-12 h-full text-black plate\">
                    <i class=\"fab fa-twitter text-6xl mb-5\" aria-hidden=\"true\"></i>
                    <h4 class=\"text-2xl\">";
        // line 46
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_twitter_heading", [], "any", false, false, false, 46);
        echo "</h4>
                    <div class=\"h-24 mb-10\">
                        ";
        // line 48
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_twitter_p", [], "any", false, false, false, 48);
        echo "
                    </div>
                    <a class=\"pl-6 pr-6 pt-2 pb-2 button text-base\" href=\"https://twitter.com/getflextype\">";
        // line 50
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_twitter_button", [], "any", false, false, false, 50);
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
        return "themes/noir-flextype/templates/community.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  136 => 50,  131 => 48,  126 => 46,  117 => 40,  112 => 38,  107 => 36,  98 => 30,  93 => 28,  88 => 26,  79 => 20,  74 => 18,  69 => 16,  59 => 9,  53 => 6,  49 => 4,  45 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/noir-flextype/templates/community.html", "/Applications/MAMP/htdocs/flextype.org/project/themes/noir-flextype/templates/community.html");
    }
}
