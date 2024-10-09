<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;


class NurseController extends AbstractController
{
    #[Route('/nurse/list', name: 'app_list')]
    public function showList(): JsonResponse
    {
        //$nurses = array('Antonio', 'Jordi', 'Alex', 'Axel', 'Dave');
        $nurses = array(
            array("name" => "antonio", "pwd" => "111"),
            array("name" => "axel", "pwd" => "222"),
            array("name" => "alex", "pwd" => "333"),
            array("name" => "jordi", "pwd" => "444"),
            array("name" => "dave", "pwd" => "555"),
        );
        return $this->json([
            'Nurses' => json_encode($nurses)
        ]);
    }
    #[Route('/nurse/login', methods: ['GET'], name: 'app_login')]
    public function login(Request $request): JsonResponse
    {
        $nurses = array(
            array("name" => "antonio", "pwd" => "111"),
            array("name" => "axel", "pwd" => "222"),
            array("name" => "alex", "pwd" => "333"),
            array("name" => "jordi", "pwd" => "444"),
            array("name" => "dave", "pwd" => "555"),
        );
        $exist = false;
        $loginName = $request->get('name');
        $loginPwd = $request->get('pwd');
        foreach ($nurses as $nurse) {
            if ($nurse["name"] == $loginName && $nurse["pwd"] == $loginPwd) {
                $exist = true;
                return new JsonResponse($exist);
            }
        }
        return new JsonResponse($exist);
        //return new Response(json_encode($nurses2), Response::HTTP_OK);
        //return new JsonResponse($nurses, Response::HTTP_OK);
    }
    #[Route('/nurse/find', methods: ['GET'], name: 'app_find')]
    public function findByName(Request $request): JsonResponse
    {
        $nurses = array(
            array("name" => "antonio", "pwd" => "111"),
            array("name" => "axel", "pwd" => "222"),
            array("name" => "alex", "pwd" => "333"),
            array("name" => "jordi", "pwd" => "444"),
            array("name" => "dave", "pwd" => "555"),
        );
        $name = $request->query->get('name');
        foreach ($nurses as $nurse) {
            if (isset($nurse["name"]) && $nurse["name"] == $name) {
                $showNurse = $nurse["name"];
                return new JsonResponse($showNurse);
            }
        }
        return new JsonResponse("Nurse not found");
    }
}