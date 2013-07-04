<?php

/* SrtTagsVideosBundle:Videos:listSrtFiles.html.twig */
class __TwigTemplate_c9ca8b2ac328cefdbb6fa81583bc66ad extends Twig_Template
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
        echo " - Liste des fichiers de séquences
";
    }

    // line 7
    public function block_videos_content_title($context, array $blocks = array())
    {
        echo "Liste des fichiers de séquences";
    }

    // line 9
    public function block_videos_content($context, array $blocks = array())
    {
        // line 10
        echo "\t
\t";
        // line 11
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 12
            echo "\t\t<p class=\"text-center text-success\">";
            echo twig_escape_filter($this->env, (isset($context["message"]) ? $context["message"] : $this->getContext($context, "message")), "html", null, true);
            echo "</p>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "\t";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 15
            echo "\t\t<p class=\"text-center text-error\">";
            echo twig_escape_filter($this->env, (isset($context["message"]) ? $context["message"] : $this->getContext($context, "message")), "html", null, true);
            echo "</p>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo "\t
\t<ul>
\t\t";
        // line 19
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["srtFiles"]) ? $context["srtFiles"] : $this->getContext($context, "srtFiles")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["srtFile"]) {
            // line 20
            echo "\t\t\t<li>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["srtFile"]) ? $context["srtFile"] : $this->getContext($context, "srtFile")), "title"), "html", null, true);
            echo " | <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("srttagsvideos_updateSrtFile", array("id" => $this->getAttribute((isset($context["srtFile"]) ? $context["srtFile"] : $this->getContext($context, "srtFile")), "id"))), "html", null, true);
            echo "\" onclick=\"return confirm('Êtes-vous sûr de vouloir remplacer le fichier de séquences lié à ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["srtFile"]) ? $context["srtFile"] : $this->getContext($context, "srtFile")), "title"), "html", null, true);
            echo " ?');\"><i class=\"icon-upload\"></i> Remplacer</a> <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("srttagsvideos_removeSrtFile", array("id" => $this->getAttribute((isset($context["srtFile"]) ? $context["srtFile"] : $this->getContext($context, "srtFile")), "id"))), "html", null, true);
            echo "\" onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["srtFile"]) ? $context["srtFile"] : $this->getContext($context, "srtFile")), "title"), "html", null, true);
            echo " ?');\"><i class=\"icon-trash\"></i> Supprimer</a></li>
\t\t";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 22
            echo "\t\t\t<li>Aucun fichier de séquences trouvé.</li>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['srtFile'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "\t</ul>
\t
\t";
        // line 26
        if (((isset($context["nbrPage"]) ? $context["nbrPage"] : $this->getContext($context, "nbrPage")) > 1)) {
            echo " 
\t\t<div class=\"pagination\">
\t\t\t<ul>
\t\t\t\t";
            // line 29
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(1, (isset($context["nbrPage"]) ? $context["nbrPage"] : $this->getContext($context, "nbrPage"))));
            foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                // line 30
                echo "\t\t\t\t\t<li ";
                if (((isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")) == (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")))) {
                    echo " class=\"active\"";
                }
                echo ">
\t\t\t\t\t\t<a href=\"";
                // line 31
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("srttagsvideos_listSequences", array("page" => (isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, (isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")), "html", null, true);
                echo "</a>
\t\t\t\t\t</li>
\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 34
            echo "\t\t\t</ul>
\t\t</div>
\t";
        }
    }

    public function getTemplateName()
    {
        return "SrtTagsVideosBundle:Videos:listSrtFiles.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  143 => 34,  132 => 31,  125 => 30,  121 => 29,  115 => 26,  111 => 24,  104 => 22,  88 => 20,  83 => 19,  79 => 17,  70 => 15,  65 => 14,  56 => 12,  52 => 11,  49 => 10,  46 => 9,  40 => 7,  33 => 4,  30 => 3,);
    }
}
