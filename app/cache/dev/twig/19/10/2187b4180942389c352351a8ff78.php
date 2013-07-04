<?php

/* SrtTagsVideosBundle::layout.html.twig */
class __TwigTemplate_19102187b4180942389c352351a8ff78 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
            'videos_content_title' => array($this, 'block_videos_content_title'),
            'videos_content' => array($this, 'block_videos_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "\tVidéos - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "
<h2>";
        // line 9
        $this->displayBlock('videos_content_title', $context, $blocks);
        echo "</h2>

<hr />

";
        // line 13
        $this->displayBlock('videos_content', $context, $blocks);
        // line 15
        echo "
";
    }

    // line 9
    public function block_videos_content_title($context, array $blocks = array())
    {
    }

    // line 13
    public function block_videos_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "SrtTagsVideosBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 13,  61 => 9,  56 => 15,  54 => 13,  47 => 9,  44 => 8,  41 => 7,  34 => 4,  31 => 3,  49 => 10,  46 => 9,  40 => 7,  33 => 4,  30 => 3,);
    }
}
