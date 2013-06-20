<?php

namespace cstock\ArticlesBundle\Controller;

use cstock\ArticlesBundle\Entity\Articles;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceListInterface;

class ArticleController extends Controller {


    /**
    * @Route("/article/new", name="article_new")
    * @Method({"GET", "POST"})
    * @Template()
    */
    public function newAction(Request $request)
    {

        $new_article = new Articles();
        // $new_article->setCode('987736');



        $form = $this->createFormBuilder($new_article)
                                    ->add('name', 'text', array('required' => false, 'label' => 'Nombre: ',
                                                                            'attr'=>array('oninvalid'=>"setCustomValidity('Would you please enter a valid email?')")))
                                    ->add('code', 'text', array('label' => 'Código: '))
                                    ->add('description', 'textarea', array('required' => false, 'label' => 'Descripción: '))
                                    ->add('reference', 'text', array('required' => false, 'label' => 'Referencia: '))
                                    ->add('heading', 'choice', array('required' => false, 'label' => 'Categoría: ',
                                                                    'choices' => array(1 => 'Libreria',
                                                                                                  2 => 'Informatica',
                                                                                                  3 => 'Muebles',
                                                                                                  4 => 'Papeles')))
                                    ->getForm();
        $form->handleRequest($request);


            if($form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                //$new_article = $form->getData();
                $em->persist($new_article);
                $em->flush();

                return $this->render('cstockArticlesBundle:Article:new_created_ok.html.twig');
            }


        return $this->render('cstockArticlesBundle:Article:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }



    /**
    * @Route("/article/list", name="article_list")
    * @Method({"GET", "POST"})
    * @Template()
    */
    public function listAction()
    {

        $new_article = new Articles();
        $repository = $this->getDoctrine()->getRepository('cstockArticlesBundle:Articles');
        $articles = $repository->findAll();
        return $this->render('cstockArticlesBundle:Article:list.html.twig',
                                        array('articles' => $articles));
    }


}
