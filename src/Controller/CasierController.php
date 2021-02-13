<?php

namespace App\Controller;

use App\Entity\Casier;
use App\Form\CasierType;
use App\Entity\ImageCasier;
use App\Repository\CasierRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/casier")
 */
class CasierController extends AbstractController
{
    /**
     * @Route("/casier", name="casier_index", methods={"GET"})
     */
    public function index(CasierRepository $casierRepository): Response
    {
        return $this->render('casier/index.html.twig', [
            'casiers' => $casierRepository->findAll(),
        ]);
    }

    /**
     * @Route("/casier/new", name="casier_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $casier = new Casier();
        $form = $this->createForm(CasierType::class, $casier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // On récupère les images transmises
            $images = $form->get('imageCasiers')->getData();
            
            // On boucle sur les images
            foreach($images as $image){
                // On génère un nouveau nom de fichier
                $fichier = md5(uniqid()).'.'.$image->guessExtension();
                
                // On copie le fichier dans le dossier uploads
                $image->move(
                    $this->getParameter('images_directory'),
                    $fichier
                );
                
                // On crée l'image dans la base de données
                $img = new ImageCasier();
                $img->setName($fichier);
                $annonce->addAnnonceId($img);
            }
        
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($annonce);
            $entityManager->flush();
        
            return $this->redirectToRoute('casier_index');
        }

        return $this->render('casier/new.html.twig', [
            'casier' => $casier,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("casier/show/{id}", name="casier_show", methods={"GET"})
     */
    public function show(Casier $casier): Response
    {
        return $this->render('casier/show.html.twig', [
            'casier' => $casier,
        ]);
    }

    /**
     * @Route("casier/edit/{id}", name="casier_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Casier $casier): Response
    {
        $form = $this->createForm(CasierType::class, $casier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // On récupère les images transmises
            $images = $form->get('imageCasiers')->getData();
            
            // On boucle sur les images
            foreach($images as $image){
                // On génère un nouveau nom de fichier
                $fichier = md5(uniqid()).'.'.$image->guessExtension();
                
                // On copie le fichier dans le dossier uploads
                $image->move(
                    $this->getParameter('images_directory'),
                    $fichier
                );
                
                // On crée l'image dans la base de données
                $img = new Images();
                $img->setName($fichier);
                $img->addImage($img);
            }
        
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($img);
            $entityManager->flush();
        
            return $this->redirectToRoute('annonces_index');
        }

        return $this->render('casier/edit.html.twig', [
            'casier' => $casier,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/casier/delete/{id}", name="casier_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Casier $casier): Response
    {
        if ($this->isCsrfTokenValid('delete'.$casier->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($casier);
            $entityManager->flush();
        }

        return $this->redirectToRoute('casier_index');
    }

    /**
 * @Route("/casier/supprime/image/{id}", name="annonces_delete_image", methods={"DELETE"})
 */
public function deleteImage(Images $image, Request $request){
    $data = json_decode($request->getContent(), true);

    // On vérifie si le token est valide
    if($this->isCsrfTokenValid('delete'.$image->getId(), $data['_token'])){
        // On récupère le nom de l'image
        $nom = $image->getName();
        // On supprime le fichier
        unlink($this->getParameter('images_directory').'/'.$nom);

        // On supprime l'entrée de la base
        $em = $this->getDoctrine()->getManager();
        $em->remove($image);
        $em->flush();

        // On répond en json
        return new JsonResponse(['success' => 1]);
    }else{
        return new JsonResponse(['error' => 'Token Invalide'], 400);
    }
}

}
