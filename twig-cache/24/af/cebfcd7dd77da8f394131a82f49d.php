<?php

/* archive-blog.html */
class __TwigTemplate_24afcebfcd7dd77da8f394131a82f49d extends Twig_Template
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
        echo "<div id=\"port-window\">
\t<div class=\"wrapper\">
\t\t<h1 class=\"window-h1\">Blog</h1>
\t</div>
</div>

<section id=\"archive-blog\">
\t<div class=\"inset\">
\t\t<div class=\"wrapper\">
\t\t<section id=\"archive-blog-featured\">
\t\t\t";
        // line 11
        if (isset($context["blog_featured"])) { $_blog_featured_ = $context["blog_featured"]; } else { $_blog_featured_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_blog_featured_);
        foreach ($context['_seq'] as $context["_key"] => $context["blog_item"]) {
            // line 12
            echo "\t\t\t
\t\t\t\t<article class=\"media-block blog blog-featured\" id=\"post-";
            // line 13
            if (isset($context["blog_item"])) { $_blog_item_ = $context["blog_item"]; } else { $_blog_item_ = null; }
            echo $this->getAttribute($_blog_item_, "post_name");
            echo "\">
\t\t\t\t\t<h2 class=\"h1\"><a href=\"";
            // line 14
            if (isset($context["blog_item"])) { $_blog_item_ = $context["blog_item"]; } else { $_blog_item_ = null; }
            echo $this->getAttribute($_blog_item_, "path");
            echo "\">";
            if (isset($context["blog_item"])) { $_blog_item_ = $context["blog_item"]; } else { $_blog_item_ = null; }
            echo twig_editable($this->getAttribute($_blog_item_, "post_title"), $this->getAttribute($_blog_item_, "ID"), "post_title");
            echo "</a></h2>
\t\t\t\t\t<a href=\"#URL:author\" class=\"blog-author\">By ";
            // line 15
            if (isset($context["blog_item"])) { $_blog_item_ = $context["blog_item"]; } else { $_blog_item_ = null; }
            echo $this->getAttribute($this->getAttribute($_blog_item_, "author_data"), "display_name");
            echo "</a>
\t\t\t\t\t<img class=\"blog-feat-img\" src=\"/wp-content/themes/_design/_img/do-test.png\"/>
\t\t\t\t\t<p class=\"txt-lg\">";
            // line 17
            if (isset($context["blog_item"])) { $_blog_item_ = $context["blog_item"]; } else { $_blog_item_ = null; }
            echo twig_make_excerpt($this->getAttribute($_blog_item_, "post_content"));
            echo "</p>
\t\t\t\t</article>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['blog_item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 20
        echo "\t\t</section><!--archive-blog-featured -->
\t\t</div><!-- wrapper -->
\t</div><!-- inset -->

\t<div class=\"wrapper\">

\t<section id=\"archive-blog-cron\">
\t\t";
        // line 27
        if (isset($context["blog_cron"])) { $_blog_cron_ = $context["blog_cron"]; } else { $_blog_cron_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_blog_cron_);
        foreach ($context['_seq'] as $context["_key"] => $context["blog_item"]) {
            // line 28
            echo "\t\t\t<article class=\"media-block blog blog-small\" id=\"post-";
            if (isset($context["blog_item"])) { $_blog_item_ = $context["blog_item"]; } else { $_blog_item_ = null; }
            echo $this->getAttribute($_blog_item_, "post_name");
            echo "\">
\t\t\t\t<h3 class=\"h3\"><a href=\"";
            // line 29
            if (isset($context["blog_item"])) { $_blog_item_ = $context["blog_item"]; } else { $_blog_item_ = null; }
            echo $this->getAttribute($_blog_item_, "path");
            echo "\">";
            if (isset($context["blog_item"])) { $_blog_item_ = $context["blog_item"]; } else { $_blog_item_ = null; }
            echo $this->getAttribute($_blog_item_, "post_title");
            echo "</a></h3>
\t\t\t\t<a href=\"#URL:author\" class=\"blog-author\">By ";
            // line 30
            if (isset($context["blog_item"])) { $_blog_item_ = $context["blog_item"]; } else { $_blog_item_ = null; }
            echo $this->getAttribute($this->getAttribute($_blog_item_, "author_data"), "display_name");
            echo "</a>
\t\t\t\t<p class=\"txt\">";
            // line 31
            if (isset($context["blog_item"])) { $_blog_item_ = $context["blog_item"]; } else { $_blog_item_ = null; }
            echo twig_make_excerpt($this->getAttribute($_blog_item_, "post_content"), 30);
            echo "</p>
\t\t\t</article>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['blog_item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 34
        echo "\t</section>
\t</div><!-- wrapper -->
</section>";
    }

    public function getTemplateName()
    {
        return "archive-blog.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  109 => 34,  99 => 31,  94 => 30,  86 => 29,  80 => 28,  75 => 27,  66 => 20,  56 => 17,  50 => 15,  42 => 14,  37 => 13,  34 => 12,  29 => 11,  17 => 1,);
    }
}
