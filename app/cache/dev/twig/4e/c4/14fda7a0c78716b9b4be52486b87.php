<?php

/* SrtTagsVideosBundle:Videos:adminSequences.html.twig */
class __TwigTemplate_4ec414fda7a0c78716b9b4be52486b87 extends Twig_Template
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
        // line 10
        echo "\t<ul>
\t\t<li><a href=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("srttagsvideos_addSrtFile");
        echo "\">Ajouter un fichier de séquences</a></li>
\t\t<li><a href=\"";
        // line 12
        echo $this->env->getExtension('routing')->getPath("srttagsvideos_listSrtFiles");
        echo "\">Liste des fichiers de séquences</a></li>
\t</ul>
";
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
        return array (  56 => 12,  52 => 11,  49 => 10,  46 => 9,  40 => 7,  33 => 4,  30 => 3,);
    }
}
