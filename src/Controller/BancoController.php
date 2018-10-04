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
        // Vista
        return $this->render('banco/index.html.twig');
    }

    /**
     * list all banks
     * @Route("/bancos/list", name="bancos/list")
     */
    public function listarBancos() {

        // lista de todos los bancos en la base de datos
        $bancos = $this->getDoctrine()
                          ->getRepository(Banco::class)
                          ->createQueryBuilder('a')
                          ->getQuery();
                          
        $result = $bancos->getResult(Query::HYDRATE_ARRAY);
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
        
        $response = Array();
        $response["id"] = $save->getId();
        $response["nombre"] = $save->getNombre();
        $response["numeroCuenta"] = $save->getNumeroCuenta();
        $response["activo"] = $save->getActivo();
        return new JsonResponse(array('data' => $response));
        
    }

    /**
     * Update bank
     * @Route("/bancos/update", name="bancos/update")
     */
    public function actualizarBanco(Request $request) 
    {
        $banco = $this->getDoctrine()->getRepository(Banco::class)->find($request->get('id'));
        $this->getDoctrine()->getRepository(Banco::class)->update($request, $banco);
        return new JsonResponse(array('data' => ''));
    }

    /**
     * Update bank
     * @Route("/bancos/delete", name="bancos/delete")
     */
    public function eliminarBanco(Request $request) 
    {
        $banco = $this->getDoctrine()->getRepository(Banco::class)->findOneBy(array('id' => $request->get('id')));
        $this->getDoctrine()->getManager()->remove($banco);
        $this->getDoctrine()->getManager()->flush();
        return new JsonResponse(array('data' => $request->get('id')));
    }

}
