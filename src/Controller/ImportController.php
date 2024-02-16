<?php

namespace App\Controller;

use App\Service\ImportService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ImportController extends AbstractController
{
    #[Route('/import', name: 'app_import')]
    public function index(Request  $request, ImportService $importService): JsonResponse
    {
        /** @var UploadedFile $file */
        $file = $request->files->get(0);

        if ($file->getExtension() !== "xlsx") {
            throw new \LogicException("File must be a valid xlsx");
        }
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file->getRealPath());
        $data = $spreadsheet->getActiveSheet()->toArray();

        $importService->import($data);

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ImportController.php',
        ]);
    }
}
