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

/* themes/noir-flextype/templates/home.html */
class __TwigTemplate_7dad135316d14947cfc69b6d38fab66ce4e9ab8ac333d67a9fd00a19b0cfe1f7 extends \Twig\Template
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
        return $this->loadTemplate((("themes/" . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["registry"] ?? null), "flextype", [], "any", false, false, false, 1), "theme", [], "any", false, false, false, 1)) . "/templates/partials/base.html"), "themes/noir-flextype/templates/home.html", 1);
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
    <!-- introducing section -->
    <div class=\"bg-black text-white\">
        <div class=\"container mx-auto\">
            <div class=\"text-center\">
                <h1 class=\"uppercase p-8 mb-10 lg:p-24 m-0 font-noirpro-semibold wow fadeIn text-3xl lg:text-6xl\">";
        // line 9
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "intro_section_h1", [], "any", false, false, false, 9);
        echo "</h1>
                <div class=\"flex justify-center wow fadeIn\">
                    <a
                        href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "/downloads\"
                        class=\"text-center relative text-lg relative pr-2 pl-2 pt-6 pb-6 w-10/12 lg:w-3/12 text-white bg-black border-white border-3 hover:bg-white hover:text-black hover:border-white hover:border-3 wow fadeIn\">";
        // line 13
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "intro_section_button", [], "any", false, false, false, 13);
        echo "</a>
                </div>
                <div class=\"flex justify-center wow fadeIn\">
                    <div class=\"mt-20\">
                        <img src=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "/api/delivery/images/";
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "/preview.jpg?dpr=2&w=1100&q=70&token=3b29b31ae05c89c2009f6e3f96e3d703\" width=\"1100\" class=\"border-none\" alt=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "description", [], "any", false, false, false, 17), "html", null, true);
        echo "\">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /introducing section -->

    <!-- features section -->
    <div class=\"text-center bg-black text-white\">
        <div class=\"container mx-auto pt-24 pb-20\">
            <h3 class=\"uppercase text-3xl lg:text-6xl font-noirpro-semibold wow fadeIn\">";
        // line 28
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "features_heading", [], "any", false, false, false, 28);
        echo "</h3>
            <p class=\"text-xl lg:text-3xl wow fadeIn\">";
        // line 29
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "features_description", [], "any", false, false, false, 29);
        echo "</p>

            <div class=\"flex content-center flex-wrap mt-12\">
                <div class=\"w-full lg:w-1/3 p-8 wow fadeIn\">
                    <i class=\"fa fa-magic text-6xl mb-5\" aria-hidden=\"true\"></i>
                    <h4 class=\"text-2xl\">";
        // line 34
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "features_simple_heading", [], "any", false, false, false, 34);
        echo "</h4>
                    <p>
                        ";
        // line 36
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "features_simple_p", [], "any", false, false, false, 36);
        echo "
                    </p>
                </div>
                <div class=\"w-full lg:w-1/3 p-8 wow fadeIn\">
                    <i class=\"fa fa-rocket text-6xl mb-5\" aria-hidden=\"true\"></i>
                    <h4 class=\"text-2xl\">";
        // line 41
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "features_fast_heading", [], "any", false, false, false, 41);
        echo "</h4>
                    <p>
                        ";
        // line 43
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "features_fast_p", [], "any", false, false, false, 43);
        echo "
                    </p>
                </div>
                <div class=\"w-full lg:w-1/3 p-8 wow fadeIn\">
                    <i class=\"fa fa-cogs text-6xl mb-5\" aria-hidden=\"true\"></i>
                    <h4 class=\"text-2xl\">";
        // line 48
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "features_flexible_heading", [], "any", false, false, false, 48);
        echo "</h4>
                    <p>
                        ";
        // line 50
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "features_flexible_p", [], "any", false, false, false, 50);
        echo "
                    </p>
                </div>
                <div class=\"w-full lg:w-1/3 p-8 wow fadeIn\">
                    <i class=\"fa fa-font text-6xl mb-5\" aria-hidden=\"true\"></i>
                    <h4 class=\"text-2xl\">";
        // line 55
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "features_easy_editing_heading", [], "any", false, false, false, 55);
        echo "</h4>
                    <p>
                        ";
        // line 57
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "features_easy_editing_p", [], "any", false, false, false, 57);
        echo "
                    </p>
                </div>
                <div class=\"w-full lg:w-1/3 p-8 wow fadeIn\">
                    <i class=\"fa fa-list-alt text-6xl mb-5\" aria-hidden=\"true\"></i>
                    <h4 class=\"text-2xl\">";
        // line 62
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "features_dynamic_content_types_heading", [], "any", false, false, false, 62);
        echo "</h4>
                    <p>
                        ";
        // line 64
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "features_dynamic_content_types_p", [], "any", false, false, false, 64);
        echo "
                    </p>
                </div>
                <div class=\"w-full lg:w-1/3 p-8 wow fadeIn\">
                    <i class=\"fab fa-github text-6xl mb-5\" aria-hidden=\"true\"></i>
                    <h4 class=\"text-2xl\">";
        // line 69
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "features_open_source_heading", [], "any", false, false, false, 69);
        echo "</h4>
                    <p>
                        ";
        // line 71
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "features_open_source_p", [], "any", false, false, false, 71);
        echo "
                    </p>
                </div>
            </div>
        </div>
        <!-- /features section -->

        <!-- technologies section -->
        <div class=\"text-center bg-white text-black\">
            <div class=\"container mx-auto pt-20 pb-20\">
                <h3 class=\"uppercase text-3xl lg:text-6xl lg:text-6xl font-noirpro-semibold wow fadeIn\">";
        // line 81
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "features_technologies_heading", [], "any", false, false, false, 81);
        echo "</h3>
                <p class=\"text-xl lg:text-3xl wow fadeIn\">";
        // line 82
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "features_technologies_p", [], "any", false, false, false, 82);
        echo "</p>

                <div class=\"flex content-center flex-wrap mt-12\">
                    <div class=\"w-full lg:w-1/3 p-8 wow fadeIn\">
                        <i class=\"fab fa-php text-6xl mb-5\" aria-hidden=\"true\"></i>
                        <h4 class=\"text-2xl\">";
        // line 87
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "features_install_anywhere_heading", [], "any", false, false, false, 87);
        echo "</h4>
                        <p>
                            ";
        // line 89
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "features_install_anywhere_p", [], "any", false, false, false, 89);
        echo "
                        </p>
                    </div>
                    <div class=\"w-full lg:w-1/3 p-8 wow fadeIn\">
                        <i class=\"fas fa-bold text-6xl mb-5\" aria-hidden=\"true\"></i>
                        <h4 class=\"text-2xl\">";
        // line 94
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "features_responsive_framework_heading", [], "any", false, false, false, 94);
        echo "</h4>
                        <p>
                            ";
        // line 96
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "features_responsive_framework_p", [], "any", false, false, false, 96);
        echo "
                        </p>
                    </div>
                    <div class=\"w-full lg:w-1/3 p-8 wow fadeIn\">
                        <i class=\"fab fa-sass text-6xl mb-5\" aria-hidden=\"true\"></i>
                        <h4 class=\"text-2xl\">";
        // line 101
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "features_css_with_superpowers_heading", [], "any", false, false, false, 101);
        echo "</h4>
                        <p>
                            ";
        // line 103
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "features_css_with_superpowers_p", [], "any", false, false, false, 103);
        echo "
                        </p>
                    </div>
                    <div class=\"w-full lg:w-1/3 p-8 wow fadeIn\">
                        <i class=\"fab fa-dev text-6xl mb-5\" aria-hidden=\"true\"></i>
                        <h4 class=\"text-2xl\">";
        // line 108
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "features_slimphp_heading", [], "any", false, false, false, 108);
        echo "</h4>
                        <p>
                            ";
        // line 110
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "features_slimphp_p", [], "any", false, false, false, 110);
        echo "
                        </p>
                    </div>
                    <div class=\"w-full lg:w-1/3 p-8 wow fadeIn\">
                        <i class=\"fab fa-redhat text-6xl mb-5\" aria-hidden=\"true\"></i>
                        <h4 class=\"text-2xl\">";
        // line 115
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "features_the_php_league_heading", [], "any", false, false, false, 115);
        echo "</h4>
                        <p>
                            ";
        // line 117
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "features_the_php_league_p", [], "any", false, false, false, 117);
        echo "
                        </p>
                    </div>
                    <div class=\"w-full lg:w-1/3 p-8 wow fadeIn\">
                        <i class=\"fas fa-arrow-circle-right text-6xl mb-5\" aria-hidden=\"true\"></i>
                        <h4 class=\"text-2xl\">
                            ";
        // line 123
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "features_doctrine_heading", [], "any", false, false, false, 123);
        echo "</h4>
                        <p>
                            ";
        // line 125
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "features_doctrine_p", [], "any", false, false, false, 125);
        echo "
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /technologies section -->

        <!-- no limits section -->
        <div class=\"text-center bg-white text-black\">
            <div class=\"container mx-auto pt-20 pb-20\">
                <h3 class=\"uppercase text-3xl lg:text-6xl font-noirpro-semibold wow fadeIn\">";
        // line 136
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "features_no_limits_heading", [], "any", false, false, false, 136);
        echo "</h3>
                <p class=\"text-xl lg:text-3xl wow fadeIn\">";
        // line 137
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "features_no_limits_p", [], "any", false, false, false, 137);
        echo "</p>

                <div class=\"flex content-center flex-wrap mt-12\">
                    <div class=\"w-full lg:w-1/3 p-8 wow fadeIn\">
                        <div class=\"p-8 bg-black text-white text-lg\">
                            ";
        // line 142
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "project_business_site", [], "any", false, false, false, 142);
        echo "
                        </div>
                    </div>
                    <div class=\"w-full lg:w-1/3 p-8 wow fadeIn\">
                        <div class=\"p-8 bg-black text-white text-lg\">
                            ";
        // line 147
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "project_landing_page", [], "any", false, false, false, 147);
        echo "
                        </div>
                    </div>
                    <div class=\"w-full lg:w-1/3 p-8 wow fadeIn\">
                        <div class=\"p-8 bg-black text-white text-lg\">
                            ";
        // line 152
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "project_personal_site", [], "any", false, false, false, 152);
        echo "
                        </div>
                    </div>
                    <div class=\"w-full lg:w-1/3 p-8 wow fadeIn\">
                        <div class=\"p-8 bg-black text-white text-lg\">
                            ";
        // line 157
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "project_portfolio", [], "any", false, false, false, 157);
        echo "
                        </div>
                    </div>
                    <div class=\"w-full lg:w-1/3 p-8 wow fadeIn\">
                        <div class=\"p-8 bg-black text-white text-lg\">
                            ";
        // line 162
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "project_product_site", [], "any", false, false, false, 162);
        echo "
                        </div>
                    </div>
                    <div class=\"w-full lg:w-1/3 p-8 wow fadeIn\">
                        <div class=\"p-8 bg-black text-white text-lg\">
                            ";
        // line 167
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "project_e_commerce", [], "any", false, false, false, 167);
        echo "
                        </div>
                    </div>
                    <div class=\"w-full lg:w-1/3 p-8 wow fadeIn\">
                        <div class=\"p-8 bg-black text-white text-lg\">
                            ";
        // line 172
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "project_portfolio", [], "any", false, false, false, 172);
        echo "
                        </div>
                    </div>
                    <div class=\"w-full lg:w-1/3 p-8 wow fadeIn\">
                        <div class=\"p-8 bg-black text-white text-lg\">
                            ";
        // line 177
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "project_documentation", [], "any", false, false, false, 177);
        echo "
                        </div>
                    </div>
                    <div class=\"w-full lg:w-1/3 p-8 wow fadeIn\">
                        <div class=\"p-8 bg-black text-white text-lg\">
                            ";
        // line 182
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "project_blog", [], "any", false, false, false, 182);
        echo "
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /no limits section -->

        <!-- community section -->
        <div class=\"text-center bg-white text-black\">
            <div class=\"container mx-auto pt-20 pb-20\">
                <h3 class=\"uppercase text-3xl lg:text-6xl font-noirpro-semibold wow fadeIn\">";
        // line 193
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "community_heading", [], "any", false, false, false, 193);
        echo "</h3>
                <p class=\"text-xl lg:text-3xl\">";
        // line 194
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "community_p", [], "any", false, false, false, 194);
        echo "</p>

                <div class=\"flex content-center flex-wrap mt-12\">
                    <div class=\"w-full lg:w-1/12 p-8 wow fadeIn\"></div>
                    <div class=\"w-full lg:w-2/12 p-8 wow fadeIn\">
                        <a rel=\"nofollow\" class=\"text-7xl no-underline\" href=\"";
        // line 199
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "/discord\">
                            <i class=\"fab fa-discord\"></i>
                        </a>
                    </div>
                    <div class=\"w-full lg:w-2/12 p-8 wow fadeIn\">
                        <a rel=\"nofollow\" class=\"text-7xl no-underline\" target=\"_blank\" href=\"https://github.com/flextype\">
                            <i class=\"fab fa-github\"></i>
                        </a>
                    </div>
                    <div class=\"w-full lg:w-2/12 p-8 wow fadeIn\">
                        <a rel=\"nofollow\" class=\"text-7xl no-underline\" target=\"_blank\" href=\"https://vk.com/flextype\">
                            <i class=\"fab fa-vk\"></i>
                        </a>
                    </div>
                    <div class=\"w-full lg:w-2/12 p-8 wow fadeIn\">
                        <a rel=\"nofollow\" class=\"text-7xl no-underline\" target=\"_blank\" href=\"https://twitter.com/getflextype\">
                            <i class=\"fab fa-twitter\"></i>
                        </a>
                    </div>
                    <div class=\"w-full lg:w-2/12 p-8 wow fadeIn\">
                        <a rel=\"nofollow\" class=\"text-7xl no-underline\" href=\"https://www.youtube.com/channel/UCmIAB-UDGCjF92iMNDdJR6Q?view_as=subscriber\">
                            <i class=\"fab fa-youtube\"></i>
                        </a>
                    </div>
                    <div class=\"w-full lg:w-1/12 p-8 wow fadeIn\"></div>
                </div>
            </div>
        </div>
        <!-- /community section -->

        <!-- /contribution section -->
        <div class=\"text-center bg-white text-black\">
            <div class=\"container mx-auto pt-20 pb-40\">
                <h3 class=\"uppercase text-3xl lg:text-6xl font-noirpro-semibold wow fadeIn\">";
        // line 232
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "contribution_heading", [], "any", false, false, false, 232);
        echo "</h3>
                <p class=\"text-xl lg:text-3xl pl-20 pr-20 wow fadeIn\">";
        // line 233
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "contribution_p", [], "any", false, false, false, 233);
        echo "</p>

                <div class=\"flex content-center flex-wrap mt-12\">
                    <div class=\"w-full lg:w-1/3 p-8 wow fadeIn\">
                        <div class=\"p-8 bg-black text-white\">
                            Help on the
                            <a href=\"";
        // line 239
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "/community\">Communities</a>.
                        </div>
                    </div>
                    <div class=\"w-full lg:w-1/3 p-8 wow fadeIn\">
                        <div class=\"p-8 bg-black text-white\">
                            Develop a new plugin.
                        </div>
                    </div>
                    <div class=\"w-full lg:w-1/3 p-8 wow fadeIn\">
                        <div class=\"p-8 bg-black text-white\">
                            Create a new theme.
                        </div>
                    </div>
                    <div class=\"w-full lg:w-1/3 p-8 wow fadeIn\">
                        <div class=\"p-8 bg-black text-white\">
                            Find and
                            <a href=\"https://github.com/flextype/flextype/issues\">report issues</a>.
                        </div>
                    </div>
                    <div class=\"w-full lg:w-1/3 p-8 wow fadeIn\">
                        <div class=\"p-8 bg-black text-white\">
                            Link back to
                            <a href=\"";
        // line 261
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "\">Flextype</a>.
                        </div>
                    </div>
                    <div class=\"w-full lg:w-1/3 p-8 wow fadeIn\">
                        <div class=\"p-8 bg-black text-white\">
                            <a href=\"";
        // line 266
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "/sponsors\">Donate to keep Flextype free.</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /contribution section -->

    ";
    }

    public function getTemplateName()
    {
        return "themes/noir-flextype/templates/home.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  475 => 266,  465 => 261,  438 => 239,  429 => 233,  425 => 232,  387 => 199,  379 => 194,  375 => 193,  361 => 182,  353 => 177,  345 => 172,  337 => 167,  329 => 162,  321 => 157,  313 => 152,  305 => 147,  297 => 142,  289 => 137,  285 => 136,  271 => 125,  266 => 123,  257 => 117,  252 => 115,  244 => 110,  239 => 108,  231 => 103,  226 => 101,  218 => 96,  213 => 94,  205 => 89,  200 => 87,  192 => 82,  188 => 81,  175 => 71,  170 => 69,  162 => 64,  157 => 62,  149 => 57,  144 => 55,  136 => 50,  131 => 48,  123 => 43,  118 => 41,  110 => 36,  105 => 34,  97 => 29,  93 => 28,  75 => 17,  68 => 13,  62 => 12,  56 => 9,  49 => 4,  45 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/noir-flextype/templates/home.html", "/Applications/MAMP/htdocs/flextype.org/site/themes/noir-flextype/templates/home.html");
    }
}
