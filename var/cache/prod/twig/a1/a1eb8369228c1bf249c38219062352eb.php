<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* @email/zurb_2/notification/body.html.twig */
class __TwigTemplate_b2b67816ccf2ec409b7dba77040b62ce extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'style' => [$this, 'block_style'],
            'lead' => [$this, 'block_lead'],
            'content' => [$this, 'block_content'],
            'action' => [$this, 'block_action'],
            'exception' => [$this, 'block_exception'],
            'footer' => [$this, 'block_footer'],
            'footer_content' => [$this, 'block_footer_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        $_v0 = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 2
            yield "<html>
<head>
<style>
    ";
            // line 5
            yield from $this->unwrap()->yieldBlock('style', $context, $blocks);
            // line 9
            yield "</style>
</head>
<body>
<spacer size=\"32\"></spacer>
<wrapper class=\"body\">
    <container class=\"body_";
            // line 14
            yield ((("urgent" == ($context["importance"] ?? null))) ? ("alert") : (((("high" == ($context["importance"] ?? null))) ? ("warning") : ("default"))));
            yield "\">
        <spacer size=\"16\"></spacer>
        <row>
            <columns large=\"12\" small=\"12\">
                ";
            // line 18
            yield from $this->unwrap()->yieldBlock('lead', $context, $blocks);
            // line 24
            yield "
                ";
            // line 25
            yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
            // line 32
            yield "
                ";
            // line 33
            yield from $this->unwrap()->yieldBlock('action', $context, $blocks);
            // line 39
            yield "
                ";
            // line 40
            yield from $this->unwrap()->yieldBlock('exception', $context, $blocks);
            // line 46
            yield "            </columns>
        </row>

        <wrapper class=\"secondary\">
            <spacer size=\"16\"></spacer>
            ";
            // line 51
            yield from $this->unwrap()->yieldBlock('footer', $context, $blocks);
            // line 62
            yield "        </wrapper>
    </container>
</wrapper>
</body>
</html>
";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 1
        yield Twig\Extra\CssInliner\CssInlinerExtension::inlineCss(Twig\Extra\Inky\InkyExtension::inky($_v0));
        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_style(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 6
        yield "        ";
        yield Twig\Extension\CoreExtension::source($this->env, "@email/zurb_2/main.css");
        yield "
        ";
        // line 7
        yield Twig\Extension\CoreExtension::source($this->env, "@email/zurb_2/notification/local.css");
        yield "
    ";
        yield from [];
    }

    // line 18
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_lead(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 19
        yield "                    ";
        if ((($tmp =  !(null === ($context["importance"] ?? null))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "<small><strong>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), ($context["importance"] ?? null)), "html", null, true);
            yield "</strong></small>";
        }
        // line 20
        yield "                    <p class=\"lead\">
                        ";
        // line 21
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["email"] ?? null), "subject", [], "any", false, false, false, 21), "html", null, true);
        yield "
                    </p>
                ";
        yield from [];
    }

    // line 25
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 26
        yield "                    ";
        if ((($tmp = ($context["markdown"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 27
            yield "                        ";
            yield Twig\Extension\CoreExtension::include($this->env, $context, "@email/zurb_2/notification/content_markdown.html.twig");
            yield "
                    ";
        } else {
            // line 29
            yield "                        ";
            yield (((($tmp = ($context["raw"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (($context["content"] ?? null)) : (Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["content"] ?? null), "html", null, true))));
            yield "
                    ";
        }
        // line 31
        yield "                ";
        yield from [];
    }

    // line 33
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_action(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 34
        yield "                    ";
        if ((($tmp = ($context["action_url"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 35
            yield "                        <spacer size=\"16\"></spacer>
                        <button href=\"";
            // line 36
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["action_url"] ?? null), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["action_text"] ?? null), "html", null, true);
            yield "</button>
                    ";
        }
        // line 38
        yield "                ";
        yield from [];
    }

    // line 40
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_exception(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 41
        yield "                    ";
        if ((($tmp = ($context["exception"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 42
            yield "                        <spacer size=\"16\"></spacer>
                        <p><em>Exception stack trace attached.</em></p>
                    ";
        }
        // line 45
        yield "                ";
        yield from [];
    }

    // line 51
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_footer(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 52
        yield "                ";
        if ((array_key_exists("footer_text", $context) &&  !(null === ($context["footer_text"] ?? null)))) {
            // line 53
            yield "                <row>
                    <columns small=\"12\" large=\"6\">
                        ";
            // line 55
            yield from $this->unwrap()->yieldBlock('footer_content', $context, $blocks);
            // line 58
            yield "                    </columns>
                </row>
                ";
        }
        // line 61
        yield "            ";
        yield from [];
    }

    // line 55
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_footer_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 56
        yield "                            <p><small>";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["footer_text"] ?? null), "html", null, true);
        yield "</small></p>
                        ";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@email/zurb_2/notification/body.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  261 => 56,  254 => 55,  249 => 61,  244 => 58,  242 => 55,  238 => 53,  235 => 52,  228 => 51,  223 => 45,  218 => 42,  215 => 41,  208 => 40,  203 => 38,  196 => 36,  193 => 35,  190 => 34,  183 => 33,  178 => 31,  172 => 29,  166 => 27,  163 => 26,  156 => 25,  148 => 21,  145 => 20,  138 => 19,  131 => 18,  124 => 7,  119 => 6,  112 => 5,  107 => 1,  98 => 62,  96 => 51,  89 => 46,  87 => 40,  84 => 39,  82 => 33,  79 => 32,  77 => 25,  74 => 24,  72 => 18,  65 => 14,  58 => 9,  56 => 5,  51 => 2,  49 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@email/zurb_2/notification/body.html.twig", "C:\\Users\\gerar\\OneDrive\\Documentos\\proyecto\\vendor\\symfony\\twig-bridge\\Resources\\views\\Email\\zurb_2\\notification\\body.html.twig");
    }
}
