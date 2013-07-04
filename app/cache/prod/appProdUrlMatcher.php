<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        // srttagsvideos_accueil
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'srttagsvideos_accueil');
            }

            return array (  '_controller' => 'SrtTags\\VideosBundle\\Controller\\VideosController::indexAction',  '_route' => 'srttagsvideos_accueil',);
        }

        if (0 === strpos($pathinfo, '/a')) {
            if (0 === strpos($pathinfo, '/admin')) {
                // srttagsvideos_adminSequences
                if ($pathinfo === '/admin/sequences') {
                    return array (  '_controller' => 'SrtTags\\VideosBundle\\Controller\\VideosController::adminSequencesAction',  '_route' => 'srttagsvideos_adminSequences',);
                }

                if (0 === strpos($pathinfo, '/admin/videos')) {
                    // srttagsvideos_adminVideos
                    if ($pathinfo === '/admin/videos') {
                        return array (  '_controller' => 'SrtTags\\VideosBundle\\Controller\\VideosController::adminVideosAction',  '_route' => 'srttagsvideos_adminVideos',);
                    }

                    // srttagsvideos_ajoutVideo
                    if ($pathinfo === '/admin/videos/ajout') {
                        return array (  '_controller' => 'SrtTags\\VideosBundle\\Controller\\VideosController::ajoutVideoAction',  '_route' => 'srttagsvideos_ajoutVideo',);
                    }

                    // srttagsvideos_supprVideo
                    if ($pathinfo === '/admin/videos/suppr') {
                        return array (  '_controller' => 'SrtTags\\VideosBundle\\Controller\\VideosController::supprVideoAction',  '_route' => 'srttagsvideos_supprVideo',);
                    }

                }

            }

            // srttagsvideos_apropos
            if ($pathinfo === '/apropos') {
                return array (  '_controller' => 'SrtTags\\VideosBundle\\Controller\\VideosController::aproposAction',  '_route' => 'srttagsvideos_apropos',);
            }

        }

        // srttagsvideos_recherche
        if ($pathinfo === '/recherche') {
            return array (  '_controller' => 'SrtTags\\VideosBundle\\Controller\\VideosAjaxController::rechercheAction',  '_route' => 'srttagsvideos_recherche',);
        }

        // srttagsvideos_affichageSequences
        if ($pathinfo === '/affichageSequences') {
            return array (  '_controller' => 'SrtTags\\VideosBundle\\Controller\\VideosAjaxController::affichageSequencesAction',  '_route' => 'srttagsvideos_affichageSequences',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
