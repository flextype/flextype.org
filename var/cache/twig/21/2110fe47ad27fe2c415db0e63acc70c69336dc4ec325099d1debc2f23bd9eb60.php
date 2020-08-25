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
class __TwigTemplate_dbef83df3d8c9589f853d0401903e13b086e16db9c2b6c6532d60f60ab58ec92 extends \Twig\Template
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
        return $this->loadTemplate((("themes/" . twig_get_attribute($this->env, $this->source, ($context["registry"] ?? null), "get", [0 => "plugins.site.settings.theme"], "method", false, false, false, 1)) . "/templates/partials/base.html"), "themes/noir-flextype/templates/home.html", 1);
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
        echo "    <!-- introducing section -->
    <div class=\"container relative mx-auto\">
        <div class=\"text-center\">
            <h1 class=\"uppercase m-0 p-24 wow fadeIn text-xl lg:text-5xl\">";
        // line 7
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_intro_section_h1", [], "any", false, false, false, 7);
        echo "</h1>
            <div class=\"flex justify-center wow fadeIn\">
                <a
                    href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "/downloads\"
                    class=\"w-10/12 lg:w-3/12 wow fadeIn button\">";
        // line 11
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_intro_section_button", [], "any", false, false, false, 11);
        echo "</a>
            </div>
            <div class=\"flex justify-center wow fadeIn\">
                <div class=\"mt-20\">
                    <img src=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "/api/images/en/flextype-banner.jpg?dpr=2&w=1000&q=70&token=3b29b31ae05c89c2009f6e3f96e3d703\" width=\"1000\" class=\"border-none\" alt=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "description", [], "any", false, false, false, 15), "html", null, true);
        echo "\">
                </div>
            </div>
        </div>
    </div>
    <!-- /introducing section -->

    <!-- features section -->
    <div class=\"text-center pt-20\">
        <div class=\"container relative mx-auto\">
            <h3 class=\"uppercase text-xl lg:text-5xl wow fadeIn\">";
        // line 25
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_features_heading", [], "any", false, false, false, 25);
        echo "</h3>
            <p class=\"text-xl lg:text-2xl wow fadeIn\">";
        // line 26
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_features_description", [], "any", false, false, false, 26);
        echo "</p>

            <div class=\"flex content-center flex-wrap mt-12\">
                <div class=\"w-full lg:w-1/3 p-8 wow fadeIn\">
                    <i class=\"fa fa-rocket text-6xl mb-5\" aria-hidden=\"true\"></i>
                    <h4 class=\"text-2xl\">";
        // line 31
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_features_fast_heading", [], "any", false, false, false, 31);
        echo "</h4>
                    <p>
                        ";
        // line 33
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_features_fast_p", [], "any", false, false, false, 33);
        echo "
                    </p>
                </div>

                <div class=\"w-full lg:w-1/3 p-6 wow fadeIn\">
                    <i class=\"fa fa-cogs text-6xl mb-5\" aria-hidden=\"true\"></i>
                    <h4 class=\"text-2xl\">";
        // line 39
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_features_flexible_heading", [], "any", false, false, false, 39);
        echo "</h4>
                    <p>
                        ";
        // line 41
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_features_flexible_p", [], "any", false, false, false, 41);
        echo "
                    </p>
                </div>

                <div class=\"w-full lg:w-1/3 p-6 wow fadeIn\">
                    <i class=\"fa fa-font text-6xl mb-5\" aria-hidden=\"true\"></i>
                    <h4 class=\"text-2xl\">";
        // line 47
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_features_easy_editing_heading", [], "any", false, false, false, 47);
        echo "</h4>
                    <p>
                        ";
        // line 49
        echo twig_replace_filter(twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_features_easy_editing_p", [], "any", false, false, false, 49), ["%url_start%" => "<a href=\"https://twitter.com/getflextype\">", "%url_end%" => "</a>"]);
        echo "
                    </p>
                </div>

                <div class=\"w-full lg:w-1/3 p-6 wow fadeIn\">
                    <i class=\"fas fa-network-wired text-6xl mb-5\" aria-hidden=\"true\"></i>
                    <h4 class=\"text-2xl\">";
        // line 55
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_features_built_in_rest_api_heading", [], "any", false, false, false, 55);
        echo "</h4>
                    <p>
                        ";
        // line 57
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_features_built_in_rest_api_p", [], "any", false, false, false, 57);
        echo "
                    </p>
                </div>

                <div class=\"w-full lg:w-1/3 p-6 wow fadeIn\">
                    <i class=\"fa fa-list-alt text-6xl mb-5\" aria-hidden=\"true\"></i>
                    <h4 class=\"text-2xl\">";
        // line 63
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_features_dynamic_content_types_heading", [], "any", false, false, false, 63);
        echo "</h4>
                    <p>
                        ";
        // line 65
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_features_dynamic_content_types_p", [], "any", false, false, false, 65);
        echo "
                    </p>
                </div>

                <div class=\"w-full lg:w-1/3 p-6 wow fadeIn\">
                    <i class=\"fas fa-code-branch text-6xl mb-5\" aria-hidden=\"true\"></i>
                    <h4 class=\"text-2xl\">";
        // line 71
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_features_version_control_heading", [], "any", false, false, false, 71);
        echo "</h4>
                    <p>
                        ";
        // line 73
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_features_version_control_p", [], "any", false, false, false, 73);
        echo "
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- /features section -->

    <!-- no limits section -->
    <div class=\"text-center\">
        <div class=\"container mx-auto pt-20 pb-20\">
            <h3 class=\"uppercase text-xl lg:text-5xl wow fadeIn\">";
        // line 84
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_features_no_limits_heading", [], "any", false, false, false, 84);
        echo "</h3>
            <p class=\"text-xl lg:text-2xl px-20 wow fadeIn\">";
        // line 85
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_features_no_limits_p", [], "any", false, false, false, 85);
        echo "</p>

            <div class=\"flex content-center flex-wrap mt-12\">

                <div class=\"w-full lg:w-3/12 p-6 wow fadeIn\">
                    <i class=\"fas fa-desktop text-6xl mb-5\" aria-hidden=\"true\"></i>
                    <h4 class=\"text-2xl\">";
        // line 91
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_no_limits_websites_heading", [], "any", false, false, false, 91);
        echo "</h4>
                    <p>
                        ";
        // line 93
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_no_limits_websites_p", [], "any", false, false, false, 93);
        echo "
                    </p>
                </div>

                <div class=\"w-full lg:w-3/12 p-6 wow fadeIn\">
                    <i class=\"fas fa-mobile-alt text-6xl mb-5\" aria-hidden=\"true\"></i>
                    <h4 class=\"text-2xl\">";
        // line 99
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_native_apps_heading", [], "any", false, false, false, 99);
        echo "</h4>
                    <p>
                        ";
        // line 101
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_native_apps_p", [], "any", false, false, false, 101);
        echo "

                    </p>
                </div>

                <div class=\"w-full lg:w-3/12 p-6 wow fadeIn\">
                    <i class=\"far fa-square text-6xl mb-5\" aria-hidden=\"true\"></i>
                    <h4 class=\"text-2xl\">";
        // line 108
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_kiosks_heading", [], "any", false, false, false, 108);
        echo "</h4>
                    <p>
                        ";
        // line 110
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_kiosks_p", [], "any", false, false, false, 110);
        echo "
                    </p>
                </div>

                <div class=\"w-full lg:w-3/12 p-6 wow fadeIn\">
                    <i class=\"fas fa-running text-6xl mb-5\" aria-hidden=\"true\"></i>
                    <h4 class=\"text-2xl\">";
        // line 116
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_wearables_heading", [], "any", false, false, false, 116);
        echo "</h4>
                    <p>
                        ";
        // line 118
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_wearables_p", [], "any", false, false, false, 118);
        echo "
                    </p>
                </div>

                <div class=\"w-full lg:w-3/12 p-6 wow fadeIn\">
                    <i class=\"far fa-lightbulb text-6xl mb-5\" aria-hidden=\"true\"></i>
                    <h4 class=\"text-2xl\">";
        // line 124
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_iot_devices_heading", [], "any", false, false, false, 124);
        echo "</h4>
                    <p>
                        ";
        // line 126
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_iot_devices_heading", [], "any", false, false, false, 126);
        echo "
                    </p>
                </div>

                <div class=\"w-full lg:w-3/12 p-6 wow fadeIn\">
                    <i class=\"fas fa-gamepad text-6xl mb-5\" aria-hidden=\"true\"></i>
                    <h4 class=\"text-2xl\">";
        // line 132
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_game_data_heading", [], "any", false, false, false, 132);
        echo "</h4>
                    <p>
                        ";
        // line 134
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_game_data_p", [], "any", false, false, false, 134);
        echo "
                    </p>
                </div>

                <div class=\"w-full lg:w-3/12 p-6 wow fadeIn\">
                    <i class=\"far fa-compass text-6xl mb-5\" aria-hidden=\"true\"></i>
                    <h4 class=\"text-2xl\">";
        // line 140
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_saas_platforms_heading", [], "any", false, false, false, 140);
        echo "</h4>
                    <p>
                        ";
        // line 142
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_saas_platforms_p", [], "any", false, false, false, 142);
        echo "
                    </p>
                </div>

                <div class=\"w-full lg:w-3/12 p-6 wow fadeIn\">
                    <i class=\"fas fa-shopping-cart text-6xl mb-5\" aria-hidden=\"true\"></i>
                    <h4 class=\"text-2xl\">";
        // line 148
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_ecommerce_heading", [], "any", false, false, false, 148);
        echo "</h4>
                    <p>
                        ";
        // line 150
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_ecommerce_heading", [], "any", false, false, false, 150);
        echo "
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- /no limits section -->

    <!-- community section -->
    <div class=\"text-center\">
        <div class=\"container mx-auto pt-20 pb-20\">
            <h3 class=\"uppercase text-xl lg:text-5xl wow fadeIn\">";
        // line 161
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_community_heading", [], "any", false, false, false, 161);
        echo "</h3>
            <p class=\"text-xl lg:text-2xl px-20 wow fadeIn\">";
        // line 162
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_community_p", [], "any", false, false, false, 162);
        echo "</p>

            <div class=\"flex content-center flex-wrap mt-12\">
                <div class=\"w-full lg:w-4/12 p-6 wow fadeIn\">
                    <i class=\"fab fa-discord text-7xl mb-5\"></i>
                    <h4 class=\"text-2xl\">";
        // line 167
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_discord_heading", [], "any", false, false, false, 167);
        echo "</h4>
                    <div class=\"text-base h-40\">
                        ";
        // line 169
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_discord_p", [], "any", false, false, false, 169);
        echo "
                    </div>
                    <a class=\"pl-6 pr-6 pt-2 pb-2 wow fadeIn button text-base\" href=\"https://discord.gg/CCKPKVG\">";
        // line 171
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_discord_button", [], "any", false, false, false, 171);
        echo "</a>
                </div>

                <div class=\"w-full lg:w-4/12 p-6 wow fadeIn\">
                    <i class=\"fab fa-github text-7xl mb-5\"></i>
                    <h4 class=\"text-2xl\">";
        // line 176
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_github_heading", [], "any", false, false, false, 176);
        echo "</h4>
                    <div class=\"text-base h-40\">
                        ";
        // line 178
        echo twig_replace_filter(twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_github_p", [], "any", false, false, false, 178), ["%url_start%" => "<a href=\"https://github.com/flextype/flextype/issues\">", "%url_end%" => "</a>"]);
        echo "
                    </div>
                    <a class=\"pl-6 pr-6 pt-2 pb-2 wow fadeIn button text-base\" href=\"https://github.com/flextype\">";
        // line 180
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_github_button", [], "any", false, false, false, 180);
        echo "</a>
                </div>

                <div class=\"w-full lg:w-4/12 p-6 wow fadeIn\">
                    <i class=\"fab fa-twitter text-7xl mb-5\"></i>
                    <h4 class=\"text-2xl\">";
        // line 185
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_twitter_heading", [], "any", false, false, false, 185);
        echo "</h4>
                    <div class=\"text-base h-40\">
                        ";
        // line 187
        echo twig_replace_filter(twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_twitter_p", [], "any", false, false, false, 187), ["%url_start%" => "<a href=\"https://twitter.com/getflextype\">", "%url_end%" => "</a>"]);
        echo "
                    </div>
                    <a class=\"pl-6 pr-6 pt-2 pb-2 wow fadeIn button text-base\" href=\"https://twitter.com/getflextype\">";
        // line 189
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_twitter_button", [], "any", false, false, false, 189);
        echo "</a>
                </div>
            </div>

        </div>
    </div>
    <!-- /community section -->

    <!-- /contribution section -->
    <div class=\"text-center\">
        <div class=\"container mx-auto pt-20 pb-40\">
            <h3 class=\"uppercase text-xl lg:text-5xl wow fadeIn\">";
        // line 200
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_contribution_heading", [], "any", false, false, false, 200);
        echo "</h3>
            <p class=\"text-xl lg:text-2xl px-20 mb-8 wow fadeIn\">";
        // line 201
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_contribution_p", [], "any", false, false, false, 201);
        echo "</p>
            <div class=\"w-full text-center\">
                <div class=\"mb-10\">
                    <div class=\"flex content-center flex-wrap\">
                        <div class=\"w-full lg:w-6/12 p-2 wow fadeIn\">
                            <div class=\"text-left\">
                                <h4 class=\"text-center\">";
        // line 207
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_contribution_financial_support_heading", [], "any", false, false, false, 207);
        echo "</h4>
                                ";
        // line 208
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_contribution_financial_support_p", [], "any", false, false, false, 208);
        echo "
                            </div>
                        </div>
                        <div class=\"w-full lg:w-6/12 p-2 wow fadeIn\">
                            <div class=\"text-left\">
                                <h4 class=\"text-center\">";
        // line 213
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_contribution_itt_heading", [], "any", false, false, false, 213);
        echo "</h4>
                                ";
        // line 214
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_contribution_itt_p", [], "any", false, false, false, 214);
        echo "
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /contribution section -->

    <!-- /sponsors section -->
    <div class=\"text-center\">
        <div class=\"container mx-auto pb-40\">
            <h3 class=\"uppercase text-xl lg:text-5xl wow fadeIn\">";
        // line 227
        echo twig_get_attribute($this->env, $this->source, ($context["entry"] ?? null), "txt_sponsors_heading", [], "any", false, false, false, 227);
        echo "</h3>
            <div class=\"w-full text-center\">
                <div class=\"mb-10\">
                    <div class=\"flex content-center flex-wrap\">
                        <div class=\"w-full p-2 wow fadeIn\">
                            <div class=\"text-center\">
                                <a href=\"https://web-easy.org\">
                                    <img src=\"";
        // line 234
        echo $this->extensions['Flextype\UrlTwigExtension']->url();
        echo "/api/images/en/sponsors/webeasy.png?dpr=2&w=80&q=70&token=3b29b31ae05c89c2009f6e3f96e3d703\" alt=\"\" class=\"inline\">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /sponsors section -->
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
        return array (  447 => 234,  437 => 227,  421 => 214,  417 => 213,  409 => 208,  405 => 207,  396 => 201,  392 => 200,  378 => 189,  373 => 187,  368 => 185,  360 => 180,  355 => 178,  350 => 176,  342 => 171,  337 => 169,  332 => 167,  324 => 162,  320 => 161,  306 => 150,  301 => 148,  292 => 142,  287 => 140,  278 => 134,  273 => 132,  264 => 126,  259 => 124,  250 => 118,  245 => 116,  236 => 110,  231 => 108,  221 => 101,  216 => 99,  207 => 93,  202 => 91,  193 => 85,  189 => 84,  175 => 73,  170 => 71,  161 => 65,  156 => 63,  147 => 57,  142 => 55,  133 => 49,  128 => 47,  119 => 41,  114 => 39,  105 => 33,  100 => 31,  92 => 26,  88 => 25,  73 => 15,  66 => 11,  60 => 10,  54 => 7,  49 => 4,  45 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/noir-flextype/templates/home.html", "/Applications/MAMP/htdocs/flextype.org/project/themes/noir-flextype/templates/home.html");
    }
}
