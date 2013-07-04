<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        // srttagsvideos_index
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'srttagsvideos_index');
            }

            return array (  '_controller' => 'SrtTags\\VideosBundle\\Controller\\VideosController::indexAction',  '_route' => 'srttagsvideos_index',);
        }

        if (0 === strpos($pathinfo, '/a')) {
            if (0 === strpos($pathinfo, '/admin')) {
                if (0 === strpos($pathinfo, '/admin/sequences')) {
                    // srttagsvideos_adminSequences
                    if ($pathinfo === '/admin/sequences') {
                        return array (  '_controller' => 'SrtTags\\VideosBundle\\Controller\\VideosController::adminSequencesAction',  '_route' => 'srttagsvideos_adminSequences',);
                    }

                    // srttagsvideos_addSrtFile
                    if ($pathinfo === '/admin/sequences/add') {
                        return array (  '_controller' => 'SrtTags\\VideosBundle\\Controller\\VideosController::addSrtFileAction',  '_route' => 'srttagsvideos_addSrtFile',);
                    }

                    // srttagsvideos_listSrtFiles
                    if (0 === strpos($pathinfo, '/admin/sequences/list') && preg_match('#^/admin/sequences/list(?:/(?P<page>\\d*))?$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'srttagsvideos_listSrtFiles')), array (  '_controller' => 'SrtTags\\VideosBundle\\Controller\\VideosController::listSrtFilesAction',  'page' => 1,));
                    }

                    // srttagsvideos_updateSrtFile
                    if (0 === strpos($pathinfo, '/admin/sequences/update') && preg_match('#^/admin/sequences/update/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'srttagsvideos_updateSrtFile')), array (  '_controller' => 'SrtTags\\VideosBundle\\Controller\\VideosController::updateSrtFileAction',));
                    }

                    // srttagsvideos_removeSrtFile
                    if (0 === strpos($pathinfo, '/admin/sequences/remove') && preg_match('#^/admin/sequences/remove/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'srttagsvideos_removeSrtFile')), array (  '_controller' => 'SrtTags\\VideosBundle\\Controller\\VideosController::removeSrtFileAction',));
                    }

                }

                if (0 === strpos($pathinfo, '/admin/videos')) {
                    // srttagsvideos_adminVideos
                    if ($pathinfo === '/admin/videos') {
                        return array (  '_controller' => 'SrtTags\\VideosBundle\\Controller\\VideosController::adminVideosAction',  '_route' => 'srttagsvideos_adminVideos',);
                    }

                    // srttagsvideos_addVideo
                    if ($pathinfo === '/admin/videos/add') {
                        return array (  '_controller' => 'SrtTags\\VideosBundle\\Controller\\VideosController::addVideoAction',  '_route' => 'srttagsvideos_addVideo',);
                    }

                    // srttagsvideos_listVideos
                    if (0 === strpos($pathinfo, '/admin/videos/list') && preg_match('#^/admin/videos/list(?:/(?P<page>\\d*))?$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'srttagsvideos_listVideos')), array (  '_controller' => 'SrtTags\\VideosBundle\\Controller\\VideosController::listVideosAction',  'page' => 1,));
                    }

                    // srttagsvideos_removeVideo
                    if (0 === strpos($pathinfo, '/admin/videos/remove') && preg_match('#^/admin/videos/remove/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'srttagsvideos_removeVideo')), array (  '_controller' => 'SrtTags\\VideosBundle\\Controller\\VideosController::removeVideoAction',));
                    }

                }

            }

            // srttagsvideos_about
            if ($pathinfo === '/about') {
                return array (  '_controller' => 'SrtTags\\VideosBundle\\Controller\\VideosController::aboutAction',  '_route' => 'srttagsvideos_about',);
            }

        }

        // srttagsvideos_search
        if ($pathinfo === '/search') {
            return array (  '_controller' => 'SrtTags\\VideosBundle\\Controller\\VideosAjaxController::searchAction',  '_route' => 'srttagsvideos_search',);
        }

        // srttagsvideos_printSequences
        if ($pathinfo === '/printsequences') {
            return array (  '_controller' => 'SrtTags\\VideosBundle\\Controller\\VideosAjaxController::printSequencesAction',  '_route' => 'srttagsvideos_printSequences',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
