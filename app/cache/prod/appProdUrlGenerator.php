<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * appProdUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    static private $declaredRoutes = array(
        'srttagsvideos_accueil' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'SrtTags\\VideosBundle\\Controller\\VideosController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/',    ),  ),  4 =>   array (  ),),
        'srttagsvideos_adminSequences' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'SrtTags\\VideosBundle\\Controller\\VideosController::adminSequencesAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/sequences',    ),  ),  4 =>   array (  ),),
        'srttagsvideos_adminVideos' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'SrtTags\\VideosBundle\\Controller\\VideosController::adminVideosAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/videos',    ),  ),  4 =>   array (  ),),
        'srttagsvideos_ajoutVideo' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'SrtTags\\VideosBundle\\Controller\\VideosController::ajoutVideoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/videos/ajout',    ),  ),  4 =>   array (  ),),
        'srttagsvideos_supprVideo' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'SrtTags\\VideosBundle\\Controller\\VideosController::supprVideoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/videos/suppr',    ),  ),  4 =>   array (  ),),
        'srttagsvideos_apropos' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'SrtTags\\VideosBundle\\Controller\\VideosController::aproposAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/apropos',    ),  ),  4 =>   array (  ),),
        'srttagsvideos_recherche' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'SrtTags\\VideosBundle\\Controller\\VideosAjaxController::rechercheAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/recherche',    ),  ),  4 =>   array (  ),),
        'srttagsvideos_affichageSequences' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'SrtTags\\VideosBundle\\Controller\\VideosAjaxController::affichageSequencesAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/affichageSequences',    ),  ),  4 =>   array (  ),),
    );

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context, LoggerInterface $logger = null)
    {
        $this->context = $context;
        $this->logger = $logger;
    }

    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens);
    }
}
