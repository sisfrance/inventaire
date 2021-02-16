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

/* base/menu.html.twig */
class __TwigTemplate_ff025de1a65de5fc8c53db534048e86b575757f7150b483bc4ec1d9c581a0ba0 extends Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base/menu.html.twig"));

        // line 1
        echo "
<nav class=\"navbar navbar-light bg-light navbar-expand-lg\">
  <a class=\"navbar-brand\" href=\"#\">>></a>
  <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" 
    <span class=\"navbar-toggler-icon\"></span>
  </button>
  <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
    <ul class=\"navbar-nav mr-auto\">
      <li class=\"nav-item active\">
        <a class=\"nav-link\" href=\"/\">Accueil</a>
      </li>
      <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/clients/\">Clients</a>
      </li>
      <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/admin\">Administration</a>
      </li>
    </ul>
  </div>
</nav>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "base/menu.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("
<nav class=\"navbar navbar-light bg-light navbar-expand-lg\">
  <a class=\"navbar-brand\" href=\"#\">>></a>
  <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" 
    <span class=\"navbar-toggler-icon\"></span>
  </button>
  <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
    <ul class=\"navbar-nav mr-auto\">
      <li class=\"nav-item active\">
        <a class=\"nav-link\" href=\"/\">Accueil</a>
      </li>
      <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/clients/\">Clients</a>
      </li>
      <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/admin\">Administration</a>
      </li>
    </ul>
  </div>
</nav>
", "base/menu.html.twig", "/usr/src/app/inventaire/templates/base/menu.html.twig");
    }
}
