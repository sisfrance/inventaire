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

/* @EasyAdmin/crud/field/boolean.html.twig */
class __TwigTemplate_05feb74f3b72516c80553cf18e6ec9fbd6fac94d2e8fbc4be88469da6d5cf94c extends Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@EasyAdmin/crud/field/boolean.html.twig"));

        // line 5
        echo "
";
        // line 6
        if (((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["ea"]) || array_key_exists("ea", $context) ? $context["ea"] : (function () { throw new RuntimeError('Variable "ea" does not exist.', 6, $this->source); })()), "crud", [], "any", false, false, false, 6), "currentAction", [], "any", false, false, false, 6), "detail")) ||  !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 6, $this->source); })()), "customOptions", [], "any", false, false, false, 6), "get", [0 => "renderAsSwitch"], "method", false, false, false, 6))) {
            // line 7
            echo "    <span class=\"badge ";
            echo (((0 === twig_compare(twig_get_attribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 7, $this->source); })()), "value", [], "any", false, false, false, 7), true))) ? ("badge-boolean-true") : ("badge-boolean-false"));
            echo "\">
        ";
            // line 8
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((((0 === twig_compare(twig_get_attribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 8, $this->source); })()), "value", [], "any", false, false, false, 8), true))) ? ("label.true") : ("label.false")), [], "EasyAdminBundle"), "html", null, true);
            echo "
    </span>
";
        } else {
            // line 11
            echo "    <div class=\"custom-control custom-switch custom-switch-lg\" data-fieldname=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 11, $this->source); })()), "property", [], "any", false, false, false, 11), "html", null, true);
            echo "\">
        <input type=\"checkbox\" class=\"custom-control-input\" id=\"";
            // line 12
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 12, $this->source); })()), "uniqueId", [], "any", false, false, false, 12), "html", null, true);
            echo "\" ";
            echo (((0 === twig_compare(twig_get_attribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 12, $this->source); })()), "value", [], "any", false, false, false, 12), true))) ? ("checked") : (""));
            echo " 
            ";
            // line 13
            echo (((0 === twig_compare(twig_get_attribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 13, $this->source); })()), "formTypeOption", [0 => "disabled"], "method", false, false, false, 13), true))) ? ("disabled") : (""));
            echo " autocomplete=\"off\">
        <label class=\"custom-control-label\" for=\"";
            // line 14
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 14, $this->source); })()), "uniqueId", [], "any", false, false, false, 14), "html", null, true);
            echo "\"></label>
    </div>
";
        }
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@EasyAdmin/crud/field/boolean.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 14,  67 => 13,  61 => 12,  56 => 11,  50 => 8,  45 => 7,  43 => 6,  40 => 5,);
    }

    public function getSourceContext()
    {
        return new Source("{# @var ea \\EasyCorp\\Bundle\\EasyAdminBundle\\Context\\AdminContext #}
{# @var field \\EasyCorp\\Bundle\\EasyAdminBundle\\Dto\\FieldDto #}
{# @var entity \\EasyCorp\\Bundle\\EasyAdminBundle\\Dto\\EntityDto #}
{% trans_default_domain 'EasyAdminBundle' %}

{% if ea.crud.currentAction == 'detail' or not field.customOptions.get('renderAsSwitch') %}
    <span class=\"badge {{ field.value == true ? 'badge-boolean-true' : 'badge-boolean-false' }}\">
        {{ (field.value == true ? 'label.true' : 'label.false')|trans }}
    </span>
{% else %}
    <div class=\"custom-control custom-switch custom-switch-lg\" data-fieldname=\"{{ field.property }}\">
        <input type=\"checkbox\" class=\"custom-control-input\" id=\"{{ field.uniqueId }}\" {{ field.value == true ? 'checked' }} 
            {{ field.formTypeOption('disabled') == true ? 'disabled' }} autocomplete=\"off\">
        <label class=\"custom-control-label\" for=\"{{ field.uniqueId }}\"></label>
    </div>
{% endif %}
", "@EasyAdmin/crud/field/boolean.html.twig", "/usr/src/app/inventaire/vendor/easycorp/easyadmin-bundle/src/Resources/views/crud/field/boolean.html.twig");
    }
}
