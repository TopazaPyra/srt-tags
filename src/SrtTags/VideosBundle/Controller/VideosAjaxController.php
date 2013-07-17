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
        $listTags = $this->getDoctrine()
		         ->getManager()
		         ->getRepository('SrtTagsVideosBundle:Tag')
                         ->findAll();
               
        foreach ($listTags as $tag)
        {
            $arrayTags[] = $tag->getTag();
        }
                
        return new JsonResponse($arrayTags);
    }
        
    
    public function printSequencesAction()
    {
        $request = $this->getRequest();
        $tags = $request->request->get('tag');
        
        $listTags = explode(" ", trim($tags));
            
        $sequences = $this->getDoctrine()
                          ->getManager()
			  ->getRepository('SrtTagsVideosBundle:Sequence')
                          ->getSequencesByTags($listTags);
        
        if ($sequences == false) {
            throw $this->createNotFoundException();          
        }
        
        return new JsonResponse($sequences);
    }
}
