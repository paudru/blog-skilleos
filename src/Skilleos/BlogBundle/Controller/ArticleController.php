<?php

namespace Skilleos\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArticleController extends Controller
{
    public function listAction()
    {
        return $this->render('SkilleosBlogBundle:Article:list.html.twig');
    }

    public function viewAction($id)
    {
    	return $this->render('SkilleosBlogBundle:Article:view.html.twig', array('id' => $id));
    }

    public function addAction()
    {
        return $this->render('SkilleosBlogBundle:Article:add.html.twig');
    }

    public function editAction($id)
    {
        return $this->render('SkilleosBlogBundle:Article:edit.html.twig', array('id' => $id));
    }

    public function deleteAction()
    {
        return $this->render('SkilleosBlogBundle:Article:delete.html.twig');
    }
}
