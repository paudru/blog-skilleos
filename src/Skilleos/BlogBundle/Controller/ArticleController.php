<?php

namespace Skilleos\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Skilleos\BlogBundle\Entity\Article;
use Symfony\Component\HttpFoundation\Request;

class ArticleController extends Controller
{
    public function listAction()
    {
        return $this->render('SkilleosBlogBundle:Article:list.html.twig');
    }

    public function viewAction($id)
    {
    	$article = $this->getDoctrine()->getManager()->getRepository('SkilleosBlogBundle:Article')->find($id);

    	return $this->render('SkilleosBlogBundle:Article:view.html.twig', array('article' => $article));
    }

    public function addAction(Request $request)
    {
        $article = new Article();

        $form = $this->get('form.factory')
          ->createBuilder('form', $article)
          ->add('title', 'text')
          ->add('content', 'textarea')
          ->add('add', 'submit')
          ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()){
        	$em = $this->getDoctrine()->getManager();
        	$em->persist($article);
        	$em->flush();

        return $this->redirect($this->generateUrl('skilleos_blog_view', array('id' => $article->getId())));
        }

        return $this->render('SkilleosBlogBundle:Article:add.html.twig', array('form' => $form->createView()));
    }

    public function editAction($id, Request $request)
    {
        $article = $this->getDoctrine()
          ->getManager()
          ->getRepository('SkilleosBlogBundle:Article')
          ->find($id);

           $form = $this->get('form.factory')
          ->createBuilder('form', $article)
          ->add('title', 'text')
          ->add('content', 'textarea')
          ->add('edit', 'submit')
          ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()){
        	$em = $this->getDoctrine()->getManager();
        	$em->persist($article);
        	$em->flush();
        }



        return $this->render('SkilleosBlogBundle:Article:edit.html.twig', array('form' => $form->createView()));
    }

    public function deleteAction()
    {
        return $this->render('SkilleosBlogBundle:Article:delete.html.twig');
    }
}
