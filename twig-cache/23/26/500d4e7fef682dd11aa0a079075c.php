<?php

/* home.html */
class __TwigTemplate_2326500d4e7fef682dd11aa0a079075c extends Twig_Template
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
        echo "<div class=\"hp-cover\">
\t<section id=\"hp-slide-1\" class=\"hp-slide\" data-name=\"editorial\">
\t\t<div class=\"hp-slide-inner\">
\t\t\t<h2 class=\"hp-h1\">Editorial Design</h2>
\t\t\t<div class=\"hp-tray\">
\t\t\t\t<p class=\"hp-description\">We make beautiful editorial experiences on the web. From Newspapers to magazines to individual stories, we cover it all.</p>
\t\t\t\t<div class=\"hp-slide-tiles\">
\t\t\t\t\t<div class=\"hp-tile-wrap\">
\t\t\t\t\t\t<div class=\"media-block tile\">
\t\t\t\t\t\t\t<img src=\"/wp-content/themes/_design/_img/dev/tile.jpg\"/>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"media-block tile\">
\t\t\t\t\t\t\t<img src=\"/wp-content/themes/_design/_img/dev/tile.jpg\"/>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"media-block tile\">
\t\t\t\t\t\t\t<img src=\"/wp-content/themes/_design/_img/dev/tile.jpg\"/>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div><!-- hp-tray -->
\t\t</div>
\t</section>

\t<section id=\"hp-slide-2\" class=\"hp-slide\" data-name=\"application\">
\t\t<div class=\"hp-slide-inner\">
\t\t\t<h2 class=\"hp-h1\">Application Design</h2>
\t\t\t<div class=\"hp-tray\">
\t\t\t\t<p class=\"hp-description\">We make beautiful editorial experiences on the web. From Newspapers to magazines to individual stories, we cover it all.</p>
\t\t\t\t<div class=\"hp-slide-tiles\">
\t\t\t\t\t<div class=\"hp-tile-wrap\">
\t\t\t\t\t\t<div class=\"media-block tile\">
\t\t\t\t\t\t\t<img src=\"/wp-content/themes/_design/_img/dev/tile.jpg\"/>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"media-block tile\">
\t\t\t\t\t\t\t<img src=\"/wp-content/themes/_design/_img/dev/tile.jpg\"/>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div><!-- hp-tray -->
\t\t</div>
\t</section>

\t<section id=\"hp-slide-3\" class=\"hp-slide\">
\t\t<div class=\"hp-slide-inner\">
\t\t\t<h2 class=\"hp-h1\">Fun Design</h2>
\t\t\t<div class=\"hp-tray\">
\t\t\t\t<p class=\"hp-description\">We make beautiful editorial experiences on the web. From Newspapers to magazines to individual stories, we cover it all.</p>
\t\t\t\t<div class=\"hp-slide-tiles\">
\t\t\t\t\t<div class=\"hp-tile-wrap\">
\t\t\t\t\t\t<div class=\"media-block tile\">
\t\t\t\t\t\t\t<img src=\"/wp-content/themes/_design/_img/dev/tile.jpg\"/>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"media-block tile\">
\t\t\t\t\t\t\t<img src=\"/wp-content/themes/_design/_img/dev/tile.jpg\"/>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div><!-- hp-tray -->
\t\t</div>
\t</section>

</div>

<div class=\"wrapper\">

<!-- <section id=\"hp-billboard\" class=\"slidewrap\">
\t<ul class=\"slider\">
\t\t";
        // line 73
        if (isset($context["billboards"])) { $_billboards_ = $context["billboards"]; } else { $_billboards_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_billboards_);
        foreach ($context['_seq'] as $context["_key"] => $context["billboard"]) {
            // line 74
            echo "\t\t\t<li class=\"slide\" id=\"billboard-";
            if (isset($context["billboard"])) { $_billboard_ = $context["billboard"]; } else { $_billboard_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_billboard_, "post_name"), "html", null, true);
            echo "\">
\t\t\t\t<h2 class=\"hp-billboard-txt h3 txt-center\">
\t\t\t\t\t<a href=\"";
            // line 76
            if (isset($context["billboard"])) { $_billboard_ = $context["billboard"]; } else { $_billboard_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_billboard_, "path"), "html", null, true);
            echo "\">";
            if (isset($context["billboard"])) { $_billboard_ = $context["billboard"]; } else { $_billboard_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_billboard_, "billboard_message"), "html", null, true);
            echo "</a>
\t\t\t\t</h2>
\t\t\t\t<a href=\"";
            // line 78
            if (isset($context["billboard"])) { $_billboard_ = $context["billboard"]; } else { $_billboard_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_billboard_, "path"), "html", null, true);
            echo "\">
\t\t\t\t\t<img class=\"billboard-img\" src=\"";
            // line 79
            if (isset($context["billboard"])) { $_billboard_ = $context["billboard"]; } else { $_billboard_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($_billboard_, "billboard"), "path"), "html", null, true);
            echo "\" />
\t\t\t\t</a>
\t\t\t</li>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['billboard'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 83
        echo "\t</ul>
</section> --><!-- hp-billboard -->

</div><!-- wrapper -->


<!-- Jeff and mike tryin' some shit out -->
<!-- <div class=\"inset\">
\t<div class=\"wrapper\">
\t\t<section id=\"hp-tiles\">
\t\t\t\t";
        // line 93
        if (isset($context["tiles"])) { $_tiles_ = $context["tiles"]; } else { $_tiles_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_tiles_);
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["tile"]) {
            // line 94
            echo "\t\t\t\t\t";
            $this->env->loadTemplate("tile.html")->display($context);
            // line 95
            echo "\t\t\t\t";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tile'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 96
        echo "\t\t</section>
\t</div>
</div> -->

<div class=\"wrapper\">
\t<div class=\"hp-downpage\">
\t\t<section id=\"hp-form\" class=\"ui-block-1\">
\t\t\t<h3 class=\"h4\">";
        // line 103
        if (isset($context["form"])) { $_form_ = $context["form"]; } else { $_form_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_form_, "post_title"), "html", null, true);
        echo "</h3>
\t\t\t<p class=\"txt\">";
        // line 104
        if (isset($context["form"])) { $_form_ = $context["form"]; } else { $_form_ = null; }
        echo $this->getAttribute($_form_, "post_content");
        echo "</p>
\t\t\t";
        // line 105
        if (isset($context["form"])) { $_form_ = $context["form"]; } else { $_form_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($_form_, "actions"));
        foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
            // line 106
            echo "\t\t\t\t<a class=\"btn\" href=\"";
            if (isset($context["action"])) { $_action_ = $context["action"]; } else { $_action_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_action_, "link"), "html", null, true);
            echo "\">";
            if (isset($context["action"])) { $_action_ = $context["action"]; } else { $_action_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_action_, "name"), "html", null, true);
            echo "</a>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['action'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 108
        echo "\t\t</section>

\t\t<section id=\"hp-blog-list\" class=\"ui-block-2\">
\t\t\t<h3 class=\"h4\">Blog</h3>
\t\t\t";
        // line 112
        if (isset($context["blogs"])) { $_blogs_ = $context["blogs"]; } else { $_blogs_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_blogs_);
        foreach ($context['_seq'] as $context["_key"] => $context["blog"]) {
            // line 113
            echo "\t\t\t\t<h4 class=\"h3 hp-blog-item\"><a href=\"";
            if (isset($context["blog"])) { $_blog_ = $context["blog"]; } else { $_blog_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_blog_, "path"), "html", null, true);
            echo "\">";
            if (isset($context["blog"])) { $_blog_ = $context["blog"]; } else { $_blog_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_blog_, "post_title"), "html", null, true);
            echo "</a></h4>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['blog'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 114
        echo "\t
\t\t</section>
\t</div><!-- hp downpage -->

\t<section id=\"hp-tweets\">
\t\t<div class=\"tweet-handle\">
\t\t\t<a href=\"http://www.twitter.com/upstatement\">@Upstatement</a>
\t\t</div>
\t\t";
        // line 122
        if (isset($context["tweets"])) { $_tweets_ = $context["tweets"]; } else { $_tweets_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_tweets_);
        foreach ($context['_seq'] as $context["_key"] => $context["tweet"]) {
            // line 123
            echo "\t\t\t<article class=\"tweet\" id=\"tweet-";
            if (isset($context["ID"])) { $_ID_ = $context["ID"]; } else { $_ID_ = null; }
            echo twig_escape_filter($this->env, $_ID_, "html", null, true);
            echo "\">
\t\t\t\t<p>";
            // line 124
            if (isset($context["tweet"])) { $_tweet_ = $context["tweet"]; } else { $_tweet_ = null; }
            echo $this->getAttribute($_tweet_, "parsed");
            echo "</p>
\t\t\t</article>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tweet'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 127
        echo "\t</section>
</div><!-- wrapper -->";
    }

    public function getTemplateName()
    {
        return "home.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  267 => 127,  257 => 124,  251 => 123,  246 => 122,  236 => 114,  223 => 113,  218 => 112,  212 => 108,  199 => 106,  194 => 105,  189 => 104,  184 => 103,  175 => 96,  161 => 95,  158 => 94,  140 => 93,  128 => 83,  117 => 79,  112 => 78,  103 => 76,  96 => 74,  91 => 73,  17 => 1,);
    }
}
