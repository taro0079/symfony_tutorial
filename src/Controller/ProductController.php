<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'create_product')]
    public function createProduct(EntityManagerInterface $entityManager): Response
    {
        $product = new Product();
        $product->setName('KeyBoard');
        $product->setPrice(1999);
        $product->setDescription('Ergnomic and stylish !');
        $entityManager->persist($product);
        $entityManager->flush();

        return new Response('Save new Product with id '.$product->getId());
    }
}
