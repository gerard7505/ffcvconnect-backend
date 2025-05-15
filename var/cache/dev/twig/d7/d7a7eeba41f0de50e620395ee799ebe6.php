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
class __TwigTemplate_29c42ecd47b662d00301d2f86262d448 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@email/zurb_2/notification/body.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@email/zurb_2/notification/body.html.twig"));

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
            yield ((("urgent" == (isset($context["importance"]) || array_key_exists("importance", $context) ? $context["importance"] : (function () { throw new RuntimeError('Variable "importance" does not exist.', 14, $this->source); })()))) ? ("alert") : (((("high" == (isset($context["importance"]) || array_key_exists("importance", $context) ? $context["importance"] : (function () { throw new RuntimeError('Variable "importance" does not exist.', 14, $this->source); })()))) ? ("warning") : ("default"))));
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
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_style(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "style"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "style"));

        // line 6
        yield "        ";
        yield Twig\Extension\CoreExtension::source($this->env, "@email/zurb_2/main.css");
        yield "
        ";
        // line 7
        yield Twig\Extension\CoreExtension::source($this->env, "@email/zurb_2/notification/local.css");
        yield "
    ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 18
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_lead(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "lead"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "lead"));

        // line 19
        yield "                    ";
        if ((($tmp =  !(null === (isset($context["importance"]) || array_key_exists("importance", $context) ? $context["importance"] : (function () { throw new RuntimeError('Variable "importance" does not exist.', 19, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "<small><strong>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), (isset($context["importance"]) || array_key_exists("importance", $context) ? $context["importance"] : (function () { throw new RuntimeError('Variable "importance" does not exist.', 19, $this->source); })())), "html", null, true);
            yield "</strong></small>";
        }
        // line 20
        yield "                    <p class=\"lead\">
                        ";
        // line 21
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["email"]) || array_key_exists("email", $context) ? $context["email"] : (function () { throw new RuntimeError('Variable "email" does not exist.', 21, $this->source); })()), "subject", [], "any", false, false, false, 21), "html", null, true);
        yield "
                    </p>
                ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 25
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 26
        yield "                    ";
        if ((($tmp = (isset($context["markdown"]) || array_key_exists("markdown", $context) ? $context["markdown"] : (function () { throw new RuntimeError('Variable "markdown" does not exist.', 26, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 27
            yield "                        ";
            yield Twig\Extension\CoreExtension::include($this->env, $context, "@email/zurb_2/notification/content_markdown.html.twig");
            yield "
                    ";
        } else {
            // line 29
            yield "                        ";
            yield (((($tmp = (isset($context["raw"]) || array_key_exists("raw", $context) ? $context["raw"] : (function () { throw new RuntimeError('Variable "raw" does not exist.', 29, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ((isset($context["content"]) || array_key_exists("content", $context) ? $context["content"] : (function () { throw new RuntimeError('Variable "content" does not exist.', 29, $this->source); })())) : (Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["content"]) || array_key_exists("content", $context) ? $context["content"] : (function () { throw new RuntimeError('Variable "content" does not exist.', 29, $this->source); })()), "html", null, true))));
            yield "
                    ";
        }
        // line 31
        yield "                ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 33
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_action(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "action"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "action"));

        // line 34
        yield "                    ";
        if ((($tmp = (isset($context["action_url"]) || array_key_exists("action_url", $context) ? $context["action_url"] : (function () { throw new RuntimeError('Variable "action_url" does not exist.', 34, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 35
            yield "                        <spacer size=\"16\"></spacer>
                        <button href=\"";
            // line 36
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["action_url"]) || array_key_exists("action_url", $context) ? $context["action_url"] : (function () { throw new RuntimeError('Variable "action_url" does not exist.', 36, $this->source); })()), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["action_text"]) || array_key_exists("action_text", $context) ? $context["action_text"] : (function () { throw new RuntimeError('Variable "action_text" does not exist.', 36, $this->source); })()), "html", null, true);
            yield "</button>
                    ";
        }
        // line 38
        yield "                ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 40
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_exception(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "exception"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "exception"));

        // line 41
        yield "                    ";
        if ((($tmp = (isset($context["exception"]) || array_key_exists("exception", $context) ? $context["exception"] : (function () { throw new RuntimeError('Variable "exception" does not exist.', 41, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 42
            yield "                        <spacer size=\"16\"></spacer>
                        <p><em>Exception stack trace attached.</em></p>
                    ";
        }
        // line 45
        yield "                ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 51
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_footer(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "footer"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "footer"));

        // line 52
        yield "                ";
        if ((array_key_exists("footer_text", $context) &&  !(null === (isset($context["footer_text"]) || array_key_exists("footer_text", $context) ? $context["footer_text"] : (function () { throw new RuntimeError('Variable "footer_text" does not exist.', 52, $this->source); })())))) {
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
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 55
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_footer_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "footer_content"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "footer_content"));

        // line 56
        yield "                            <p><small>";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["footer_text"]) || array_key_exists("footer_text", $context) ? $context["footer_text"] : (function () { throw new RuntimeError('Variable "footer_text" does not exist.', 56, $this->source); })()), "html", null, true);
        yield "</small></p>
                        ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

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
        return array (  351 => 56,  338 => 55,  327 => 61,  322 => 58,  320 => 55,  316 => 53,  313 => 52,  300 => 51,  289 => 45,  284 => 42,  281 => 41,  268 => 40,  257 => 38,  250 => 36,  247 => 35,  244 => 34,  231 => 33,  220 => 31,  214 => 29,  208 => 27,  205 => 26,  192 => 25,  178 => 21,  175 => 20,  168 => 19,  155 => 18,  142 => 7,  137 => 6,  124 => 5,  113 => 1,  104 => 62,  102 => 51,  95 => 46,  93 => 40,  90 => 39,  88 => 33,  85 => 32,  83 => 25,  80 => 24,  78 => 18,  71 => 14,  64 => 9,  62 => 5,  57 => 2,  55 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% apply inky_to_html|inline_css %}
<html>
<head>
<style>
    {% block style %}
        {{ source(\"@email/zurb_2/main.css\") }}
        {{ source(\"@email/zurb_2/notification/local.css\") }}
    {% endblock %}
</style>
</head>
<body>
<spacer size=\"32\"></spacer>
<wrapper class=\"body\">
    <container class=\"body_{{ (\"urgent\" == importance ? \"alert\" : (\"high\" == importance ? \"warning\" : \"default\")) }}\">
        <spacer size=\"16\"></spacer>
        <row>
            <columns large=\"12\" small=\"12\">
                {% block lead %}
                    {% if importance is not null %}<small><strong>{{ importance|upper }}</strong></small>{% endif %}
                    <p class=\"lead\">
                        {{ email.subject }}
                    </p>
                {% endblock %}

                {% block content %}
                    {% if markdown %}
                        {{ include('@email/zurb_2/notification/content_markdown.html.twig') }}
                    {% else %}
                        {{ raw ? content|raw : content|nl2br }}
                    {% endif %}
                {% endblock %}

                {% block action %}
                    {% if action_url %}
                        <spacer size=\"16\"></spacer>
                        <button href=\"{{ action_url }}\">{{ action_text }}</button>
                    {% endif %}
                {% endblock %}

                {% block exception %}
                    {% if exception %}
                        <spacer size=\"16\"></spacer>
                        <p><em>Exception stack trace attached.</em></p>
                    {% endif %}
                {% endblock %}
            </columns>
        </row>

        <wrapper class=\"secondary\">
            <spacer size=\"16\"></spacer>
            {% block footer %}
                {% if footer_text is defined and footer_text is not null %}
                <row>
                    <columns small=\"12\" large=\"6\">
                        {% block footer_content %}
                            <p><small>{{ footer_text }}</small></p>
                        {% endblock %}
                    </columns>
                </row>
                {% endif %}
            {% endblock %}
        </wrapper>
    </container>
</wrapper>
</body>
</html>
{% endapply %}
", "@email/zurb_2/notification/body.html.twig", "C:\\Users\\gerar\\OneDrive\\Documentos\\proyecto\\vendor\\symfony\\twig-bridge\\Resources\\views\\Email\\zurb_2\\notification\\body.html.twig");
    }
}
