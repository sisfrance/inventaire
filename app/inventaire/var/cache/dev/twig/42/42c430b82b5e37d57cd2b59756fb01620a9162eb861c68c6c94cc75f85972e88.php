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

/* base/form.html.twig */
class __TwigTemplate_81828d9fad899cad172a20ada75f2bc987e5f30a3810e2244c99ad7de735d38a extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base/form.html.twig"));

        // line 1
        echo "<div id=\"form\">
\t<h2>Je suis un formulaire</h2>
\t<form>
\t\t";
        // line 4
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form_utilisateur"]) || array_key_exists("form_utilisateur", $context) ? $context["form_utilisateur"] : (function () { throw new RuntimeError('Variable "form_utilisateur" does not exist.', 4, $this->source); })()), 'form');
        echo "
\t</form>
</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "base/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 4,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div id=\"form\">
\t<h2>Je suis un formulaire</h2>
\t<form>
\t\t{{form(form_utilisateur)}}
\t</form>
</div>
", "base/form.html.twig", "/usr/src/app/inventaire/templates/base/form.html.twig");
    }
}
