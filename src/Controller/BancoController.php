<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Banco;
use Doctrine\ORM\Query;


class BancoController extends AbstractController
{
    /**
     * @Route("/bancos", name="bancos")
     */
    public function index()
    {
        // lista de todos los bancos en la base de datos
        //$bancos = $this->getDoctrine()->getRepository(Banco::class)->findAll();

        //print_r($bancos);

        return $this->render('banco/index.html.twig');
    }

    /**
     * @Route("/bancos/create", name="bancos/create")
     */
    public function create()
    {
        return $this->render('banco/create.html.twig');
    }

    /**
     * list all banks
     * @Route("/bancos/list", name="bancos/list")
     */
    public function listaBancos() {

        // lista de todos los bancos en la base de datos
        $bancos = $this->getDoctrine()
                          ->getRepository(Banco::class)
                          ->createQueryBuilder('a')
                          ->getQuery();
                          
        $result = json_decode(json_encode($bancos->getResult(Query::HYDRATE_ARRAY)), true);
        return new JsonResponse($result);
    }

    /**
     * Store new bank
     * @Route("/bancos/store", name="bancos/store")
     */
    public function guardarBanco(Request $request) 
    {
        $banco = new Banco();
        $save = $this->getDoctrine()->getRepository(Banco::class)->save($request, $banco);
        return new response(json_encode(array('data' => '')));
    }

    /**
     * Update bank
     * @Route("/bancos/update", name="bancos/update")
     */
    public function actualizarBanco(Request $request) 
    {
        $banco = $this->getDoctrine()->getRepository(Banco::class)->find($request->get('id'));
        $update = $this->getDoctrine()->getRepository(Banco::class)->update($request, $banco);
        return new response(json_encode(array('data' => '')));
    }

    

}
