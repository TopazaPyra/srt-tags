<?php

namespace SrtTags\VideosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

use SrtTags\VideosBundle\Entity\Video;
use SrtTags\VideosBundle\Entity\Sequence;
use SrtTags\VideosBundle\Entity\Tag;

class VideosAjaxController extends Controller
{
    public function searchAction()
    {
        $request = $this->getRequest();
        $tag = $request->query->get('query');
            
        $listTags = $this->getDoctrine()
		                 ->getManager()
		                 ->getRepository('SrtTagsVideosBundle:Tag')
                         ->listTags($tag);
               
        foreach ($listTags as $tag)
        {
            $arrayTags[] = $tag->getTag();
        }
                
        return new JsonResponse($arrayTags);
    }
        
    
    public function printSequencesAction()
    {
        $request = $this->getRequest();
        $tag = $request->request->get('tag');
            
        $sequences = $this->getDoctrine()
                          ->getManager()
				          ->getRepository('SrtTagsVideosBundle:Sequence')
                          ->getSequencesByTag($tag);
        
        if ($sequences == false) {
            throw $this->createNotFoundException();          
        }
        
        return new JsonResponse($sequences);
    }
}
