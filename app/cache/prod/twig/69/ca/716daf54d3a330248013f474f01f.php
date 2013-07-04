<?php

/* SrtTagsVideosBundle:Videos:index.html.twig */
class __TwigTemplate_69ca716daf54d3a330248013f474f01f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SrtTagsVideosBundle::layout.html.twig");

        $this->blocks = array(
            'css' => array($this, 'block_css'),
            'scripts' => array($this, 'block_scripts'),
            'title' => array($this, 'block_title'),
            'videos_content' => array($this, 'block_videos_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SrtTagsVideosBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_css($context, array $blocks = array())
    {
        // line 4
        echo "<link type=\"text/css\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/srttagsvideos/css/style.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" />
";
    }

    // line 7
    public function block_scripts($context, array $blocks = array())
    {
        // line 8
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/srttagsvideos/js/popcorn-complete.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/srttagsvideos/js/autocompletion.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/srttagsvideos/js/playlist.js"), "html", null, true);
        echo "\"></script> 
";
    }

    // line 13
    public function block_title($context, array $blocks = array())
    {
        // line 14
        echo "\t";
        $this->displayParentBlock("title", $context, $blocks);
        echo " - Index
";
    }

    // line 17
    public function block_videos_content($context, array $blocks = array())
    {
        // line 18
        echo "\t<section>
\t\t<form class=\"form-search\" id=\"formulaire_tag\">
\t\t\t<div class=\"input-append\">
\t\t\t\t<input type=\"text\" name=\"tag\" id=\"tag\" autocomplete=\"off\" class=\"span2 search-query\" required>
\t\t\t\t<button id=\"submit\" type=\"submit\" class=\"btn\">Recherche</button>
\t\t\t</div>
\t\t</form>

\t\t<div id=\"container\">
\t\t\t<p>Aucune liste de lecture définie. Recherchez des séquences en entrant un tag dans le formulaire ci-dessus.</p>
\t\t</div>
\t</section>
\t
";
    }

    public function getTemplateName()
    {
        return "SrtTagsVideosBundle:Videos:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  72 => 18,  69 => 17,  62 => 14,  59 => 13,  53 => 10,  49 => 9,  44 => 8,  41 => 7,  34 => 4,  31 => 3,);
    }
}
