<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Guesser;
use App\form\GuesserType;

class GuessController extends AbstractController
{
    /**
     * @Route("/guess", name="guess")
     */
    public function index(Request $request): Response
    {
        // Creando formulario
        $message        = 'Aún no se ha introducido un número!';
        $guesser        = new Guesser();
        $form           = $this->createForm(GuesserType::class, $guesser);
        // Rellenando los datos a traves del form
        $form->handleRequest($request);
        // Checking

        if ($form->isSubmitted() ) {
            if (is_numeric($guesser->getUserNumber())) {
                $numberToGuess  = $guesser->getUserNumber();
                $digits         = strlen($numberToGuess);
                $arrayOfNumbers = str_split($numberToGuess);

                if ( $digits >= 1 && $digits <= 10 ) {
                    
                    $message = $this->check($arrayOfNumbers);
                } else {
                    $message = $numberToGuess . ' excede el número de digitos!';
                }
            } else {
                $message = 'Introduce sólo números!!';
            }
            
        } 
        return $this->render('guess/index.html.twig', [
            'form'      => $form->createView(),
            'message'   => $message
        ]);
    }

    function check ($array) {                           // Mi estrategia aquí es que en lugar de iterar sobre el número completo
        $newArray       = [];                                 // iteramos sobre cada digito, inicializando en 0 cada digito del nuevo array e
        $guessedNumber  = 0;                             // incrementando sus digitos hasta dar con uno igual que el mismo dígito 
        $itFOR          = 0;                                     // y en la misma posición que el original.
        $itWhile        = 0;                                   // Con esto conseguimos que en lugar de iterar millones de veces sólo iteramos como máximo 
        for ($i=0; $i < count($array); $i++) {          // La funcion de iteraciones es : (nIteraciones = nDigitos * 10)
            $newArray[$i] = 0;     
            $itFOR ++;                     
            while ($newArray[$i] != $array[$i]) {
                $itWhile++;        
                $newArray[$i] ++;
            }
        }
        $guessedNumber = implode("",$newArray);
        
        return 'Número: ' . $guessedNumber . ' | Iteraciones: ' . ($itFOR + $itWhile);
    }
}
