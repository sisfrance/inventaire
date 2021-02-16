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

/* base/listeSites.html.twig */
class __TwigTemplate_87ae62c482c9229ac064f72b9df02eff7e3a95bb30aaca6cc7b7ed48e09535d9 extends Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base/listeSites.html.twig"));

        // line 1
        echo "<table class=\"table\">
<thead>
\t<tr>
\t\t<th>Site</th>
\t\t<th>Adresse</th>
\t\t<th>Code postal</th>
\t\t<th>Ville</th>
\t\t<th>Code</th>
\t</tr>
</thead>
<tbody>
\t";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["sites"]) || array_key_exists("sites", $context) ? $context["sites"] : (function () { throw new RuntimeError('Variable "sites" does not exist.', 12, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["site"]) {
            // line 13
            echo "\t<tr>
\t\t<td>";
            // line 14
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["site"], "nom", [], "any", false, false, false, 14), "html", null, true);
            echo "</td>
\t\t<td>";
            // line 15
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["site"], "adresse", [], "any", false, false, false, 15), "html", null, true);
            echo "</td>
\t\t<td>";
            // line 16
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["site"], "cp", [], "any", false, false, false, 16), "html", null, true);
            echo "</td>
\t\t<td>";
            // line 17
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["site"], "ville", [], "any", false, false, false, 17), "html", null, true);
            echo "</td>
\t</tr>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['site'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "</tbody>

</table>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "base/listeSites.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 20,  72 => 17,  68 => 16,  64 => 15,  60 => 14,  57 => 13,  53 => 12,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<table class=\"table\">
<thead>
\t<tr>
\t\t<th>Site</th>
\t\t<th>Adresse</th>
\t\t<th>Code postal</th>
\t\t<th>Ville</th>
\t\t<th>Code</th>
\t</tr>
</thead>
<tbody>
\t{% for site in sites %}
\t<tr>
\t\t<td>{{site.nom}}</td>
\t\t<td>{{site.adresse}}</td>
\t\t<td>{{site.cp}}</td>
\t\t<td>{{site.ville}}</td>
\t</tr>
\t{% endfor %}
</tbody>

</table>
", "base/listeSites.html.twig", "/usr/src/app/inventaire/templates/base/listeSites.html.twig");
    }
}
