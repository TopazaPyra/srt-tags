<?php

/* SrtTagsVideosBundle:Videos:adminSequences.html.twig */
class __TwigTemplate_0354fb4f5131e868e239fdf152bf7edc extends Twig_Template
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
        echo " - Gestion des séquences
";
    }

    // line 7
    public function block_videos_content_title($context, array $blocks = array())
    {
        echo "Gestion des séquences";
    }

    // line 9
    public function block_videos_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "SrtTagsVideosBundle:Videos:adminSequences.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 9,  40 => 7,  33 => 4,  30 => 3,);
    }
}
