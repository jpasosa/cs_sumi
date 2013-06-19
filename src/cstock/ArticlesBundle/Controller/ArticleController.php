<?php

namespace cstock\ArticlesBundle\Controller;



use cstock\ArticlesBundle\Entity\Articles;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceListInterface;

class ArticleController extends Controller {
    
    /**
     * @Route("/article_new", name="article_new")
     * @Template()
     */
    public function newAction(Request $request) {
        
        $new_article = new Articles();
        $new_article->setCode('987736');

        $form = $this->createFormBuilder($new_article)
                                    ->add('name', 'text', array('required' => false, 'label' => 'Nombre: '))
                                    ->add('code', 'text', array('label' => 'Código: '))
                                    ->add('description', 'textarea', array('required' => false, 'label' => 'Descripción: '))
                                    ->add('reference', 'text', array('required' => false, 'label' => 'Referencia: '))
                                    ->add('heading', 'choice', array('required' => false, 'label' => 'Categoría: ',
                                                                    'choices' => array(1 => 'Libreria',
                                                                                                  2 => 'Informatica',
                                                                                                  3 => 'Muebles',
                                                                                                  4 => 'Papeles')))
                                    ->getForm();
        if ($request->isMethod('POST')) {
            $form->bind($request);
            if($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                // $new_article = $form->getData();
                $em->persist($new_article);
                $em->flush();

                return $this->render('cstockArticlesBundle:Article:new_created_ok.html.twig');
            }

        }

        return $this->render('cstockArticlesBundle:Article:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }


}
