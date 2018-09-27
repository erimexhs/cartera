<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController
{
    /**
     * @Route("/lucky", name="lucky")
     */
    public function index()
    {
        return $this->render('lucky/index.html.twig', [
            'controller_name' => 'LuckyController',
        ]);
    }

    /**
     * @Route("/lucky2", name="lucky2")
     */
    public function index2()
    {
        $post['fechaini'] = 'fechaini 1111';
        $post['fechafin'] = 'fechafin 2222';

        //$fields = array('fechaini'=>urlencode($post['fechaini']),'fechafin'=>urlencode($post['fechafin']));
        $fields = array('fechaini'=>$post['fechaini'],'fechafin'=>$post['fechafin']);
        $string = http_build_query($fields);

        /*
        $fields_string = '';

        foreach($fields as $key=>$value) 
        { 
            $fields_string .= $key.'='.$value.'&'; 
        }
        rtrim($fields_string, '&');
        */

        $ch = curl_init();
        //curl_setopt($ch, CURLOPT_URL, 'https://jsonplaceholder.typicode.com/todos/1');
        curl_setopt($ch, CURLOPT_URL, 'http://192.168.200.89/imexhs/xen-ris/web/app_dev.php/cartera/');
        //curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json')); // Assuming you're requesting JSON
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $ahora = new \DateTime("2018-05-01");
        $fechaIni = $ahora->format('Y-m-d 00:00:00');
        $final = new \DateTime("2018-05-31");
        $fechaFin = $final->format('Y-m-d 23:59:59');
        //($ch, CURLOPT_POST,true);
        //curl_setopt($ch, CURLOPT_POSTFIELDS,array("fechaini"=>$fechaIni, "fechafin"=>$fechaFin));

        
        
        
        $response = curl_exec($ch);
        curl_close($ch);
        //echo $response;
        // If using JSON...
        $data = json_decode($response);

        //var_dump($data);
        //print_r($response);
        var_dump($data);
        //print_r($data);
        die('stop');

        return $this->render('lucky/index.html.twig', [
            'controller_name' => 'LuckyController',
        ]);
    }
}
