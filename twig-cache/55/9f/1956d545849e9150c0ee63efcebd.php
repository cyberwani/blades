<?php

/* tile.html */
class __TwigTemplate_559f1956d545849e9150c0ee63efcebd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<a class=\"media-block\" id=\"tile-";
        if (isset($context["tile"])) { $_tile_ = $context["tile"]; } else { $_tile_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_tile_, "post_name"), "html", null, true);
        echo "\" href=\"";
        if (isset($context["tile"])) { $_tile_ = $context["tile"]; } else { $_tile_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_tile_, "path"), "html", null, true);
        echo "\">
\t<div class=\"tile\">
\t\t<img class=\"tile-img\" src=\"";
        // line 3
        if (isset($context["tile"])) { $_tile_ = $context["tile"]; } else { $_tile_ = null; }
        echo twig_escape_filter($this->env, twig_resize_image($this->getAttribute($_tile_, "thumb_path"), 250, 250), "html", null, true);
        echo "\" />
\t\t<h3 class=\"tile-h3\">";
        // line 4
        if (isset($context["tile"])) { $_tile_ = $context["tile"]; } else { $_tile_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_tile_, "post_title"), "html", null, true);
        echo "</h3>
\t</div>
</a>";
    }

    public function getTemplateName()
    {
        return "tile.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  32 => 4,  27 => 3,  197 => 57,  187 => 54,  181 => 53,  176 => 52,  166 => 44,  153 => 43,  148 => 42,  142 => 38,  129 => 36,  124 => 35,  119 => 34,  114 => 33,  105 => 26,  91 => 25,  88 => 24,  70 => 23,  60 => 15,  49 => 11,  44 => 10,  35 => 8,  28 => 6,  23 => 5,  17 => 1,);
    }
}
