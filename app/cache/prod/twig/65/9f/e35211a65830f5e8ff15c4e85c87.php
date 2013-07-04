<?php

/* SrtTagsVideosBundle:Videos:adminVideos.html.twig */
class __TwigTemplate_659fe35211a65830f5e8ff15c4e85c87 extends Twig_Template
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
        echo " - Gestion des vidéos
";
    }

    // line 7
    public function block_videos_content_title($context, array $blocks = array())
    {
        echo "Gestion des vidéos";
    }

    // line 9
    public function block_videos_content($context, array $blocks = array())
    {
        // line 10
        echo "\t<ul>
\t\t<li><a href=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("srttagsvideos_ajoutVideo");
        echo "\">Ajouter une vidéo</a></li>
\t\t<li><a href=\"";
        // line 12
        echo $this->env->getExtension('routing')->getPath("srttagsvideos_supprVideo");
        echo "\">Supprimer des vidéos</a></li>
\t</ul>
";
    }

    public function getTemplateName()
    {
        return "SrtTagsVideosBundle:Videos:adminVideos.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 11,  53 => 10,  127 => 14,  108 => 42,  96 => 33,  90 => 30,  59 => 13,  23 => 1,  34 => 4,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  235 => 74,  229 => 73,  224 => 71,  220 => 70,  214 => 69,  208 => 68,  169 => 60,  143 => 56,  140 => 55,  132 => 16,  128 => 49,  119 => 42,  111 => 37,  107 => 36,  71 => 19,  177 => 65,  165 => 64,  160 => 61,  139 => 50,  135 => 47,  126 => 45,  114 => 42,  84 => 28,  70 => 20,  67 => 15,  61 => 15,  47 => 11,  94 => 22,  89 => 20,  85 => 25,  79 => 18,  75 => 23,  68 => 14,  56 => 12,  50 => 10,  201 => 92,  196 => 90,  183 => 70,  171 => 61,  166 => 71,  163 => 70,  158 => 67,  156 => 58,  151 => 57,  142 => 59,  138 => 40,  136 => 56,  123 => 47,  121 => 46,  117 => 44,  115 => 43,  105 => 40,  101 => 32,  91 => 31,  69 => 17,  62 => 14,  49 => 10,  29 => 3,  38 => 8,  26 => 6,  35 => 5,  43 => 8,  28 => 3,  24 => 3,  87 => 20,  72 => 18,  66 => 13,  55 => 13,  41 => 7,  31 => 3,  25 => 3,  21 => 2,  19 => 1,  98 => 31,  93 => 28,  88 => 6,  78 => 21,  46 => 9,  44 => 8,  40 => 7,  32 => 4,  27 => 4,  22 => 2,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 74,  168 => 66,  164 => 59,  162 => 62,  154 => 54,  149 => 51,  147 => 58,  144 => 53,  141 => 41,  133 => 55,  130 => 41,  125 => 44,  122 => 9,  116 => 36,  112 => 42,  109 => 41,  106 => 40,  103 => 37,  99 => 30,  95 => 34,  92 => 33,  86 => 29,  82 => 22,  80 => 26,  73 => 22,  64 => 16,  60 => 13,  57 => 11,  54 => 13,  51 => 12,  48 => 13,  45 => 8,  42 => 9,  39 => 9,  36 => 5,  33 => 4,  30 => 3,);
    }
}