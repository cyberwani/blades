<?php

/* single.html */
class __TwigTemplate_30bf9a44af5b3dae15407038e8b9439c extends Twig_Template
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
        echo "<div class=\"content-wrapper\">
<article class=\"post-type-";
        // line 2
        if (isset($context["post"])) { $_post_ = $context["post"]; } else { $_post_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_post_, "post_type"), "html", null, true);
        echo "\" id=\"post-";
        if (isset($context["ID"])) { $_ID_ = $context["ID"]; } else { $_ID_ = null; }
        echo twig_escape_filter($this->env, $_ID_, "html", null, true);
        echo "\">
\t<section class=\"article-content\">
\t\t<h1 class=\"h1\">";
        // line 4
        if (isset($context["post"])) { $_post_ = $context["post"]; } else { $_post_ = null; }
        echo twig_escape_filter($this->env, twig_editable($this->getAttribute($_post_, "post_title"), $this->getAttribute($_post_, "ID"), "post_title"), "html", null, true);
        echo "</h1>
\t\t";
        // line 5
        if (isset($context["post"])) { $_post_ = $context["post"]; } else { $_post_ = null; }
        echo wpautop($this->getAttribute($_post_, "post_content"));
        echo "
\t</section>
\t<section class=\"comments\">
\t</section>

\t<nav class=\"entry-nav\">
\t\t<a class=\"next\" href=\"#URL:next\">Next</a>
\t\t<a class=\"prev\" href=\"#URL:prev\">Prev</a>
\t</nav>
</article>
</div><!-- content-wrapper -->
";
    }

    public function getTemplateName()
    {
        return "single.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 5,  29 => 4,  20 => 2,  17 => 1,);
    }
}
