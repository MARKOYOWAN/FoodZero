<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Repository\CategoryRepositoryInterface;
use App\Repository\MediaRepositoryInterface;
use Validator;

class CategoryContronller extends Controller
{
    private $categoryRepository;
    private $mediaRepository;
    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        MediaRepositoryInterface $mediaRepository
    ) {
        $this->middleware('auth:api', ['except' => ['insertCategory', 'updateCategory']]);
        $this->categoryRepository = $categoryRepository;
        $this->mediaRepository = $mediaRepository;
    }



    /**
     * @OA\Post(
     * path="/category/insertCategory",
     * operationId="Category",
     * tags={"INSERTION CATEGORY"},
     * summary="Insert category",
     * description="Category",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *               required={"id_user", "title"}, 
     *               @OA\Property(property="id_user", type="integer"),
     *               @OA\Property(property="id_parent", type="integer"),
     *               @OA\Property(property="title", type="text"),
     *               @OA\Property(property="description", type="text"),
     *               @OA\Property(property="price", type="integer"),
     *               @OA\Property(property="file",   type="string", format="binary")
     *            ),
     *        ),
     *    ),
     *      @OA\Response(
     *          response=201,
     *          description="Categorie a été bien inserer",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="Categorie a été bien inserer",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=422,
     *          description="Unprocessable Entity",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=404, description="Resource Not Found"),
     * )
     */

    public function insertCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_user' => 'required|integer',
            'id_parent' => 'integer|nullable',
            'title' => 'required|string',
            'description' => 'string|nullable',
            'price' => 'integer|nullable',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $return_response = $this->categoryRepository->createCategory(array_merge($validator->validated()));
        $name_file = 'category';
        $id_name = 'id_category';
        $this->mediaRepository->addStandardImages($return_response->id, $request->file('file'), $name_file , $id_name);
        return response()->json([
            'success' => 'Catégory a été bien enregistrer',
            'category' => $return_response,
        ], 200);
    }


    /**
     * @OA\Put(
     * path="/category/updateCategory/{id}",
     * operationId="Category update",
     * tags={"UPDATE CATEGORY"},
     * summary="Update category",
     * description="Category update",
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody( 
     *         @OA\MediaType(
     *            mediaType="application/json",
     *            @OA\Schema(
     *               type="object",
     *               required={""},  
     *               @OA\Property(property="title", type="text"),
     *               @OA\Property(property="description", type="text"),
     *               @OA\Property(property="price", type="integer"), 
     *               @OA\Property(property="is_active", type="integer")
     *            ),
     *        ),
     *    ),
     *      @OA\Response(
     *          response=201,
     *          description="Categorie a été bien modier",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="Categorie a été bien modier",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=422,
     *          description="Unprocessable Entity",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=404, description="Resource Not Found"),
     * )
     */


    public function updateCategory(Request $request, $id)
    {
        $input_data = $request->all();
        $return_response = $this->categoryRepository->updateCategory($id, $input_data);
        return response()->json([
            'success' => 'Catégory a été bien modifier',
            'category' => $return_response,
        ], 200);
    }
}
