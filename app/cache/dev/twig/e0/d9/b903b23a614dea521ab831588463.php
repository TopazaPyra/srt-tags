<?php

/* SrtTagsVideosBundle:Videos:about.html.twig */
class __TwigTemplate_e0d9b903b23a614dea521ab831588463 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SrtTagsVideosBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'videos_content_title' => array($this, 'block_videos_content_title'),
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
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "\t";
        $this->displayParentBlock("title", $context, $blocks);
        echo " - À propos
";
    }

    // line 7
    public function block_videos_content_title($context, array $blocks = array())
    {
        echo "À propos";
    }

    // line 9
    public function block_videos_content($context, array $blocks = array())
    {
        // line 10
        echo "\t<p>Srt-Tags est développé par le laboratoire Topaza Pyra au sein de l'université Lyon 2.</p>
\t<p>Ce logiciel libre repose sur les technologies open source suivantes :
\t\t<ul>
\t\t\t<li>Boostrap</li>
\t\t\t<li>jQuery</li>
\t\t\t<li>Popcorn.js</li>
\t\t\t<li>Symfony 2</li>
\t\t</ul>
\t</p>
";
    }

    public function getTemplateName()
    {
        return "SrtTagsVideosBundle:Videos:about.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 10,  46 => 9,  40 => 7,  33 => 4,  30 => 3,);
    }
}
