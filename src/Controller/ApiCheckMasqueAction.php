<?php


namespace App\Controller;


use ApiPlatform\Core\Exception\InvalidArgumentException;
use App\Entity\CheckMot;
use App\Entity\GenMot;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;

class ApiCheckMasqueAction
{
    function __construct()
    {
    }

    function __invoke(Request $request, ObjectManager $manager)
    {
        $id = $request->query->get('id');
        $masque = $request->query->get('display');
        $letter = $request->query->get('letter');
        if (($id == null || !is_numeric($id)) || $masque == null || $letter == null)
            return new InvalidArgumentException("Required param error");
        $mot = $manager->getRepository(GenMot::class)->find($id)->getDisplay();
        $checkMot = new CheckMot();
        $isOk = false;
        $isEnded = false;
        $newMasque = $masque;
        for($i = 0; $i< strlen($mot) ;$i++) {
            if(strtoupper($mot[$i]) === strtoupper($letter) && $masque[$i] === '-'){
                $newMasque[$i] = strtoupper($letter);
                $isOk = true;
            }
            else
                $newMasque[$i] = $masque[$i];
        }
        if (strpos($newMasque,"-") === false)
            $isEnded = true;
        $checkMot->setId($id);
        $checkMot->setNewMasque($newMasque);
        $checkMot->setIsMotOk($isOk);
        $checkMot->setIsEnded($isEnded);
        return $checkMot;



    }
}
