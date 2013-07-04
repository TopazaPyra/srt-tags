<?php

namespace SrtTags\VideosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use Doctrine\ORM\Tools\Pagination\Paginator;

use SrtTags\VideosBundle\Entity\Video;
use SrtTags\VideosBundle\Entity\Sequence;
use SrtTags\VideosBundle\Entity\Tag;
use SrtTags\VideosBundle\Entity\SrtFile;

class VideosController extends Controller
{
	
    public function indexAction()
    {
        return $this->render('SrtTagsVideosBundle:Videos:index.html.twig');
    }
    
 
    public function adminSequencesAction()
    {	
		return $this->render('SrtTagsVideosBundle:Videos:adminSequences.html.twig');
    }
    
    
    public function addSrtFileAction()
    {
		$srtFile = new SrtFile();
		
		$form = $this->createFormBuilder($srtFile)
		             ->add('file')
		             ->getForm();
		             
		$request = $this->get('request');
		
		if ($request->getMethod() == 'POST') {
			$form->bind($request);
			
			if ($form->isValid()) {
				
				$fileFormat = strtolower(pathinfo($srtFile->getFile()->getClientOriginalName(), PATHINFO_EXTENSION));
				$authorizedFormats = array('srt');
				
				if (in_array($fileFormat, $authorizedFormats)) {
				
					$videoTitle = pathinfo($srtFile->getFile()->getClientOriginalName(), PATHINFO_FILENAME);
					
					$em = $this->getDoctrine()
							   ->getManager();
					
					$videoRepository = $em->getRepository('SrtTagsVideosBundle:Video');
					$srtFileRepository = $em->getRepository('SrtTagsVideosBundle:SrtFile');
					$tagRepository = $em->getRepository('SrtTagsVideosBundle:Tag');
					
					$video = $videoRepository->findOneByTitle($videoTitle);
					
					if ($video) {
						
						$srtFileExists = $srtFileRepository->findOneByTitle($videoTitle);
						
						if ($srtFileExists == false) {
							
							$em->persist($srtFile);
							$em->flush();
							
							$this->get('session')->getFlashBag()->add('success', 'Fichier de séquences envoyé avec succès.');
							
							$parsersrt = $this->container->get('srttags_videos.parsersrt');
							
							$sequences = $parsersrt->ParseSrt($srtFile->getWebPath());
								
							$i = 0;
							
							$srtFile = $srtFileRepository->findOneByTitle($videoTitle);
						
							foreach($sequences as $i => $sequence)
							{
								$listSequences[$i] = new Sequence();
								$listSequences[$i]->setStart($sequence['debut']);
								$listSequences[$i]->setStop($sequence['fin']);
								
								$listSequences[$i]->setVideo($video);
								$listSequences[$i]->setSrtFile($srtFile);
								
								foreach($sequence['tags'] as $j => $tag)
								{
									$tagExists = $tagRepository->findOneByTag($tag);
										
									if ($tagExists == false) {
										$listTags[$j] = new Tag();
										$tagExists = $listTags[$j]->setTag($tag);
										$em->persist($tagExists);
										$em->flush();
									}
									
									$listSequences[$i]->addTag($tagExists);
								}
									
								$em->persist($listSequences[$i]);
							}
								
							$em->flush();
							
						} else {
							$this->get('session')->getFlashBag()->add('error', 'Un fichier de séquences existe déjà pour cette vidéo.');
						}
					
					} else {
						$this->get('session')->getFlashBag()->add('error', 'Aucune vidéo ne correspond à ce fichier.');
					}
					
				} else {
					$this->get('session')->getFlashBag()->add('error', 'Format de fichier non autorisé.');
				}
				
				return $this->redirect( $this->generateUrl('srttagsvideos_listSrtFiles') );
			}
		}
		
		return $this->render('SrtTagsVideosBundle:Videos:addSrtFile.html.twig', array(
			'form' => $form->createView()
		));
	}	
	
	
	public function listSrtFilesAction($page)
    {
		$srtFiles = $this->getDoctrine()
		                 ->getManager()
		                 ->getRepository('SrtTagsVideosBundle:SrtFile')
		                 ->getSrtFiles(10, $page);

		return $this->render('SrtTagsVideosBundle:Videos:listSrtFiles.html.twig', array(
			'srtFiles'  => $srtFiles,
			'page'      => $page,
			'nbrPage'   => ceil(count($srtFiles)/10)
		));
    }
    
    
    public function updateSrtFileAction(SrtFile $oldSrtFile)
    {
		$em = $this->getDoctrine()
		           ->getManager();
		
		$em->remove($oldSrtFile);
		$em->flush();
		
		return $this->redirect( $this->generateUrl('srttagsvideos_addSrtFile') );
    }
    
    
    public function removeSrtFileAction(SrtFile $srtFile)
    {
		$em = $this->getDoctrine()
		           ->getManager();
		
		$em->remove($srtFile);
		$em->flush();
		
		$this->get('session')->getFlashBag()->add('success', 'Fichier de séquences supprimé avec succès.');
		
		return $this->redirect( $this->generateUrl('srttagsvideos_listSrtFiles') );
    }
	
		
    public function adminVideosAction()
    {
		return $this->render('SrtTagsVideosBundle:Videos:adminVideos.html.twig');
    }
	
	
    public function addVideoAction(Request $request)
    {
		$video = new Video();
		
		$form = $this->createFormBuilder($video)
		             ->add('file')
		             ->getForm();
		             
		$request = $this->get('request');
		
		if ($request->getMethod() == 'POST') {
		
			$form->bind($request);
		
			if ($form->isValid()) {
				
				$videoFormat = strtolower(pathinfo($video->getFile()->getClientOriginalName(), PATHINFO_EXTENSION));
				$authorizedFormats = array('ogv','webm');
				
				if (in_array($videoFormat, $authorizedFormats)) {
				
					$em = $this->getDoctrine()
							   ->getManager();
							   
					$em->persist($video);
					$em->flush();
				
					$this->get('session')->getFlashBag()->add('success', 'Vidéo envoyée avec succès.');
					
				} else {
					$this->get('session')->getFlashBag()->add('error', 'Format de fichier non autorisé.');
				}
				
				return $this->redirect( $this->generateUrl('srttagsvideos_listVideos') );
			}
		}
		
		return $this->render('SrtTagsVideosBundle:Videos:addVideo.html.twig', array(
			'form' => $form->createView()
		));
    }
    
	
	public function listVideosAction($page)
    {
		$videos = $this->getDoctrine()
		               ->getManager()
		               ->getRepository('SrtTagsVideosBundle:Video')
		               ->getVideos(10, $page);

		return $this->render('SrtTagsVideosBundle:Videos:listVideos.html.twig', array(
			'videos'  => $videos,
			'page'    => $page,
			'nbrPage' => ceil(count($videos)/10)
		));
    }
    
	
    public function removeVideoAction(Video $video)
    {
		$em = $this->getDoctrine()
		           ->getManager();
		
		$em->remove($video);
		$em->flush();
		
		$this->get('session')->getFlashBag()->add('success', 'Vidéo supprimée avec succès.');
		
		return $this->redirect( $this->generateUrl('srttagsvideos_listVideos') );
    }
	
	
    public function aboutAction()
    {
		return $this->render('SrtTagsVideosBundle:Videos:about.html.twig');
    }

}
