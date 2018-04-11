<?php
/**
 * Created by PhpStorm.
 * User: b.tarall
 * Date: 22/03/2018
 * Time: 11:28
 */

namespace App\Controller;

use App\DTOFactory\PackagingDTOFactory;
use App\Entity\Packaging;
use App\FilterFormHandler\PackagingFilterFormHandler;
use App\FormHandler\PackagingFormHandler;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Translation\TranslatorInterface;

/**
 * Class PackagingController
 * @package App\Controller
 */
class PackagingController extends Controller
{
    /**
     * @param Request                    $request
     * @param PackagingFilterFormHandler $formHandler
     * @return Response
     * @throws \LogicException
     * @throws \Symfony\Component\Form\Exception\AlreadySubmittedException
     * @throws \Symfony\Component\Form\Exception\LogicException
     */
    public function listAction(Request $request, PackagingFilterFormHandler $formHandler): Response
    {
        return $this->render('packaging/list.html.twig', [
            'pager' => $formHandler->process($request),
            'form'  => $formHandler->getForm()->createView(),
        ]);
    }

    /**
     * @param Packaging            $packaging
     * @param Request              $request
     * @param PackagingFormHandler $formHandler
     * @param TranslatorInterface  $translator
     * @param PackagingDTOFactory  $dtoFactory
     * @return Response
     * @throws \Doctrine\ORM\ORMException
     */
    public function editAction(
        Packaging $packaging,
        Request $request,
        PackagingFormHandler $formHandler,
        TranslatorInterface $translator,
        PackagingDTOFactory $dtoFactory
    ): Response {
        $packagingDTO = $dtoFactory->newInstance($packaging);
        $formHandler->getForm()->setData($packagingDTO);
        if ($formHandler->process($request, $packagingDTO)) {
            $this->addFlash(
                'success',
                $translator->trans(
                    'packaging.edit.flash_message.validated',
                    ['%name%' => $packagingDTO->label]
                )
            );

            return $this->redirectToRoute('kelp.packaging.list');
        }

        return $this->render(
            'packaging/edit.html.twig',
            [
                'form' => $formHandler->getForm()->createView(),
            ]
        );
    }
}
