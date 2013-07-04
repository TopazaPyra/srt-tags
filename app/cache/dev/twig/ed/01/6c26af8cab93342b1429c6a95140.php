<?php

/* ::layout.html.twig */
class __TwigTemplate_ed016c26af8cab93342b1429c6a95140 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'css' => array($this, 'block_css'),
            'scripts' => array($this, 'block_scripts'),
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE HTML>
<html>
\t<head>
\t\t<meta charset=\"utf-8\">
\t\t
\t\t<link type=\"text/css\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/jquery-ui.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" />
\t\t<link type=\"text/css\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" />
        <link type=\"text/css\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/style.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" />
        ";
        // line 9
        $this->displayBlock('css', $context, $blocks);
        // line 10
        echo "\t\t
\t\t<script src=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery-2.0.2.min.js"), "html", null, true);
        echo "\"></script>
\t\t<script src=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery-ui.min.js"), "html", null, true);
        echo "\"></script>
\t\t<script src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
\t\t";
        // line 14
        $this->displayBlock('scripts', $context, $blocks);
        // line 15
        echo "\t\t
\t\t<title>";
        // line 16
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
\t</head>
\t
\t<body>
\t\t<div id=\"wrapper\">
\t\t\t<header>
\t\t\t\t<h1><a href=\"";
        // line 22
        echo $this->env->getExtension('routing')->getPath("srttagsvideos_index");
        echo "\">Srt-Tags</a></h1>
\t\t\t\t
\t\t\t\t<nav>
\t\t\t\t\t<ul class=\"nav nav-pills\">
\t\t\t\t\t\t<li><a href=\"";
        // line 26
        echo $this->env->getExtension('routing')->getPath("srttagsvideos_index");
        echo "\">Accueil</a></li>
\t\t\t\t\t\t<li class=\"dropdown\"><a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">Administration <b class=\"caret\"></b></a>
\t\t\t\t\t\t\t<ul class=\"dropdown-menu\">
\t\t\t\t\t\t\t\t<li><a href=\"";
        // line 29
        echo $this->env->getExtension('routing')->getPath("srttagsvideos_adminSequences");
        echo "\">Séquences</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"";
        // line 30
        echo $this->env->getExtension('routing')->getPath("srttagsvideos_adminVideos");
        echo "\">Vidéos</a></li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li><a href=\"";
        // line 33
        echo $this->env->getExtension('routing')->getPath("srttagsvideos_about");
        echo "\">À propos</a></li>
\t\t\t\t\t</ul>
\t\t\t\t</nav>\t
\t\t\t\t
\t\t\t</header>
\t\t\t
\t\t\t<section>
\t\t\t";
        // line 40
        $this->displayBlock('content', $context, $blocks);
        // line 42
        echo "\t\t\t</section>
\t\t
\t\t</div>
\t\t
\t\t<footer>
\t\t\t<p>Développé par le laboratoire <a href=\"\" target=\"_blank\">Topaza Pyra</a> - Licence <a href=\"https://www.gnu.org/licenses/gpl.html\" target=\"_blank\">GPLv3</a></p>
\t\t</footer>
\t\t\t
\t</body>
</html>
";
    }

    // line 9
    public function block_css($context, array $blocks = array())
    {
    }

    // line 14
    public function block_scripts($context, array $blocks = array())
    {
    }

    // line 16
    public function block_title($context, array $blocks = array())
    {
        echo "Srt-Tags";
    }

    // line 40
    public function block_content($context, array $blocks = array())
    {
        // line 41
        echo "\t\t\t";
    }

    public function getTemplateName()
    {
        return "::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  141 => 41,  138 => 40,  132 => 16,  127 => 14,  122 => 9,  108 => 42,  106 => 40,  96 => 33,  90 => 30,  86 => 29,  80 => 26,  73 => 22,  64 => 16,  59 => 14,  55 => 13,  51 => 12,  42 => 9,  38 => 8,  23 => 1,  66 => 13,  61 => 15,  56 => 15,  54 => 13,  47 => 11,  44 => 10,  41 => 7,  34 => 7,  31 => 3,  49 => 10,  46 => 9,  40 => 7,  33 => 4,  30 => 6,);
    }
}
