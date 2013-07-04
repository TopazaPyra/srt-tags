<?php

/* SrtTagsVideosBundle:Videos:listVideos.html.twig */
class __TwigTemplate_1ede10a5e225eef7c6824a49b765acc5 extends Twig_Template
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
        echo " - Liste des vidéos
";
    }

    // line 7
    public function block_videos_content_title($context, array $blocks = array())
    {
        echo "Liste des vidéos";
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
        echo "\t
\t";
        // line 15
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 16
            echo "\t\t<p class=\"text-center text-error\">";
            echo twig_escape_filter($this->env, (isset($context["message"]) ? $context["message"] : $this->getContext($context, "message")), "html", null, true);
            echo "</p>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "\t
\t<ul>
\t\t";
        // line 20
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["videos"]) ? $context["videos"] : $this->getContext($context, "videos")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["video"]) {
            // line 21
            echo "\t\t\t<li>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "title"), "html", null, true);
            echo " | <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("srttagsvideos_removeVideo", array("id" => $this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "id"))), "html", null, true);
            echo "\" onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "title"), "html", null, true);
            echo " ?');\"><i class=\"icon-trash\"></i> Supprimer</a></li>
\t\t";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 23
            echo "\t\t\t<li>Aucune vidéo trouvée.</li>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['video'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "\t</ul>
\t
\t";
        // line 27
        if (((isset($context["nbrPage"]) ? $context["nbrPage"] : $this->getContext($context, "nbrPage")) > 1)) {
            echo " 
\t\t<div class=\"pagination\">
\t\t\t<ul>
\t\t\t\t";
            // line 30
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(1, (isset($context["nbrPage"]) ? $context["nbrPage"] : $this->getContext($context, "nbrPage"))));
            foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                // line 31
                echo "\t\t\t\t\t<li ";
                if (((isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")) == (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")))) {
                    echo " class=\"active\"";
                }
                echo ">
\t\t\t\t\t\t<a href=\"";
                // line 32
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("srttagsvideos_listVideos", array("page" => (isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, (isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")), "html", null, true);
                echo "</a>
\t\t\t\t\t</li>
\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 35
            echo "\t\t\t</ul>
\t\t</div>
\t";
        }
    }

    public function getTemplateName()
    {
        return "SrtTagsVideosBundle:Videos:listVideos.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  141 => 35,  130 => 32,  123 => 31,  119 => 30,  113 => 27,  109 => 25,  102 => 23,  90 => 21,  85 => 20,  81 => 18,  72 => 16,  68 => 15,  65 => 14,  56 => 12,  52 => 11,  49 => 10,  46 => 9,  40 => 7,  33 => 4,  30 => 3,);
    }
}
