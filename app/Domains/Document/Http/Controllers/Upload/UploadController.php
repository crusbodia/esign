<?php

namespace App\Domains\Document\Http\Controllers\Upload;

use App\Domains\Document\DTO\UploadDto;
use App\Domains\Document\Resourses\DocumentResource;
use App\Domains\Document\Services\DocumentServiceInterface;
use App\Domains\Document\Services\UploadServiceInterface;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    public function __construct(
        private readonly UploadServiceInterface $uploadService,
        private readonly DocumentServiceInterface $documentService,
    ) {}

    /**
     * @OA\Post(
     *     path="/api/documents/upload",
     *     tags={"upload"},
     *     summary="Upload PDF",
     *     description="Method to upload a PDF and returns a document resource.",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 required={"document"},
     *                 @OA\Property(
     *                     property="document",
     *                     type="string",
     *                     format="binary",
     *                     description="The document to upload",
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="data",
     *                 ref="#/components/schemas/DocumentResource"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error"
     *     ),
     *     security={
     *       {"bearerAuth": {}}
     *     }
     * )
     */
    public function index(UploadRequest $request): DocumentResource
    {
        $file = $this->uploadService->uploadPdf(UploadDto::fromRequest($request));
        $document = $this->documentService->createDocument($file, $request->user());

        return new DocumentResource($document);
    }
}
