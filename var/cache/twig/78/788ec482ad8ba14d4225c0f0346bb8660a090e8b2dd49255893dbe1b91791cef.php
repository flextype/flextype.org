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
class __TwigTemplate_b1ba5ec4e54fba515343fbba251a4405ebda55a1c1ba4ee93a6edeca000135f2 extends \Twig\Template
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
        return $this->loadTemplate((("themes/" . twig_get_attribute($this->env, $this->source, ($context["registry"] ?? null), "get", [0 => "plugins.site.settings.theme"], "method", false, false, false, 1)) . "/templates/partials/base.html"), "themes/noir-flextype/templates/downloads.html", 1);
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
        <h1 class=\"uppercase text-center text-3xl lg:text-6xl m-0 pt-24 pb-24\">
            ";
        // line 6
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "title", [], "any", false, false, false, 6);
        echo "
        </h1>
        <div>
            <div class=\"flex content-center flex-wrap\">
                <div class=\"w-full lg:w-6/12 p-6 text-center\">
                    <div class=\"p-12 h-full text-black plate\">
                        <i class=\"fas fa-download text-6xl mb-5\" aria-hidden=\"true\"></i>
                        <h4 class=\"text-2xl\">Flextype CMS</h4>
                        <div class=\"h-48 mb-10\">
                            ";
        // line 15
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_release_package_contains", [], "any", false, false, false, 15);
        echo ":<br><br>
                            <div class=\"no-underline px-2 py-1 mb-2 inline-block\"><b>Flextype Core</b></div>
                            <div class=\"no-underline px-2 py-1 mb-2 inline-block\">
                                <b>";
        // line 18
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_plugins", [], "any", false, false, false, 18);
        echo ":</b> admin, accounts-admin, acl, site, twig, form, form-admin, themes-admin, jquery, icon, phpmailer
                            </div>
                            <div class=\"no-underline px-2 mb-2 inline-block\"><b>";
        // line 20
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_themes", [], "any", false, false, false, 20);
        echo ":</b> noir</div>
                        </div>
                        <a class=\"pl-6 pr-6 pt-2 pb-2 button text-base\" href=\"https://github.com/flextype/flextype/releases/download/v0.9.9/flextype-cms-0.9.9.zip\">";
        // line 22
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_download", [], "any", false, false, false, 22);
        echo "</a>
                    </div>
                </div>
                <div class=\"w-full lg:w-6/12 p-6 text-center\">
                    <div class=\"p-12 h-full text-black plate\">
                        <i class=\"fas fa-download text-6xl mb-5\" aria-hidden=\"true\"></i>
                        <h4 class=\"text-2xl\">Flextype Core</h4>
                        <div class=\"h-48 mb-10\">
                            ";
        // line 30
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_release_package_contains", [], "any", false, false, false, 30);
        echo ":<br><br>
                            <div class=\"no-underline px-2 py-1 mb-2 inline-block\"><b>Flextype Core</b></div>
                        </div>
                        <a class=\"pl-6 pr-6 pt-2 pb-2 button text-base\" href=\"https://github.com/flextype/flextype/releases/download/v0.9.9/flextype-0.9.9.zip\">";
        // line 33
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_download", [], "any", false, false, false, 33);
        echo "</a>
                    </div>
                </div>
                <div class=\"w-full lg:w-6/12 p-6 text-center\">
                    <div class=\"p-12 h-full text-black plate\">
                        <i class=\"fas fa-star text-6xl mb-5\" aria-hidden=\"true\"></i>
                        <h4 class=\"text-2xl\">";
        // line 39
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_extend", [], "any", false, false, false, 39);
        echo "</h4>
                        <div class=\"h-48 mb-10\">
                            ";
        // line 41
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_extend_p", [], "any", false, false, false, 41);
        echo "
                            <br>
                        </div>
                        <a class=\"pl-6 pr-6 pt-2 pb-2 button text-base\" href=\"";
        // line 44
        echo $this->extensions['Flextype\UrlTwigExtension']->url();
        echo "/";
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "/downloads/extend\">";
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_extend_flextype", [], "any", false, false, false, 44);
        echo "</a>
                    </div>
                </div>
                <div class=\"w-full lg:w-6/12 p-6 text-center\">
                    <div class=\"p-12 h-full text-black plate\">
                        <i class=\"fas fa-user-astronaut text-6xl mb-5\"></i>
                        <h4 class=\"text-2xl\">";
        // line 50
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_contribution_financial_support_heading", [], "any", false, false, false, 50);
        echo "</h4>
                        <div class=\"h-48 mb-10 text-left\">
                            ";
        // line 52
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_contribution_financial_support_p", [], "any", false, false, false, 52);
        echo "
                        </div>
                    </div>
                </div>
                <!--
                <div class=\"w-full p-2 text-center\">
                    <div class=\"p-12 h-full text-black rounded-lg\" style=\"background-color: #f8f9fb;\">
                        <i class=\"fas fa-info-circle text-6xl mb-5\" aria-hidden=\"true\"></i>
                        <h4 class=\"text-2xl\">QUICK INSTALLATION</h4>
                        <div class=\"mb-10 text-left\">
                            1. <a href=\"https://flextype.org/en/downloads\">Download the latest version of Flextype.</a><br>
                            2. Unzip the contents to a new folder on your local computer, and upload to your webhost using the (S)FTP client of your choice. After you’ve done this, create directory <code>/project</code> and be sure to chmod the following directory to <code>755</code> (or <code>777</code>), so it is readable and writable by Flextype.<br>
                            3. Create CDA, CMA and Access tokens for your project using this <a href=\"";
        // line 64
        echo $this->extensions['Flextype\UrlTwigExtension']->url();
        echo "/";
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "/api-token-generator\">webpage</a>.
                            <br><br><br><br>
                            <div class=\"text-center\">
                                <a class=\"no-underline uppercase text-center relative text-base relative pl-6 pr-6 pt-2 pb-2 text-black bg-white border-black border-2 hover:bg-black hover:text-white hover:border-black\"  href=\"https://docs.flextype.org/en/getting-started/installation\">READ THE DOCUMENTATION</a>
                            </div>
                        </div>
                    </div>
                </div>
                -->
                <!--
                <div class=\"w-full p-2 text-center\">
                    <div class=\"p-12 h-full text-black rounded-lg\" style=\"background-color: #f8f9fb;\">
                        <i class=\"fab fa-youtube text-6xl mb-5\" aria-hidden=\"true\"></i>
                        <h4 class=\"text-2xl\">";
        // line 77
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_installation_video_tutorials", [], "any", false, false, false, 77);
        echo "</h4>
                        <div class=\"mb-10 text-center\">
                            ";
        // line 79
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_installation_video_tutorials_links", [], "any", false, false, false, 79);
        echo "
                        </div>
                    </div>
                </div>
                -->
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
        return array (  174 => 79,  169 => 77,  151 => 64,  136 => 52,  131 => 50,  118 => 44,  112 => 41,  107 => 39,  98 => 33,  92 => 30,  81 => 22,  76 => 20,  71 => 18,  65 => 15,  53 => 6,  49 => 4,  45 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/noir-flextype/templates/downloads.html", "/Applications/MAMP/htdocs/flextype.org/project/themes/noir-flextype/templates/downloads.html");
    }
}
