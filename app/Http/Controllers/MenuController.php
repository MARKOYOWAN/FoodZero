<?php

namespace App\Http\Controllers;

use App\Repository\MediaRepositoryInterface;
use App\Repository\MenuRepositoryInterface;
use Illuminate\Http\Request;
use Validator;

class MenuController extends Controller
{
    private $menuRepository;
    private $mediaRepository;
    public function __construct(
        MenuRepositoryInterface $menuRepository,
        MediaRepositoryInterface $mediaRepository
    ) {
        $this->middleware('auth:api', ['except' => ['selectMenu','insertMenu', 'updateMenu']]);
        $this->menuRepository = $menuRepository;
        $this->mediaRepository = $mediaRepository;
    }

      /**
     * @OA\Get(
     *      path="/menu/selectMenu",
     *      operationId="getAllMenu",
     *      tags={"GET MENU"},
     *      summary="Get List Menu",
     *      description="All Menu", 
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
     */  

    public function selectMenu() {
        return response()->json($this->menuRepository->allMenu());
    }


    /**
     * @OA\Post(
     * path="/menu/insertMenu",
     * operationId="Menu",
     * tags={"INSERTION MENU"},
     * summary="Insert menu",
     * description="Menu",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *               required={"title"},  
     *               @OA\Property(property="title", type="text"),
     *               @OA\Property(property="description", type="text"),
     *               @OA\Property(property="subtitle", type="text"),
     *               @OA\Property(property="file",   type="string", format="binary")
     *            ),
     *        ),
     *    ),
     *      @OA\Response(
     *          response=201,
     *          description="Menu a été bien inserer",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="Menu a été bien inserer",
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

    public function insertMenu(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'subtitle' => 'nullable|string',
            'display_order' => 'nullable|integer',
            'description' => 'string|nullable',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $return_response = $this->menuRepository->createMenu(array_merge($validator->validated()));
        $name_file = 'menu';
        $id_name = 'id_menu';
        $file  = $request->file('file');
        if(isset($file)) {
            $this->mediaRepository->addStandardImages($return_response->id, $request->file('file'), $name_file, $id_name);
        }
        return response()->json([
            'success' => 'Menu a été bien enregistrer',
            'menu' => $return_response,
        ], 200);
    }
}
