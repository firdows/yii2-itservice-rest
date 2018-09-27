<?php

return [
    /**
     * @SWG\Get(
     *     path="/v1/locations",
     *     summary="Get list locations",
     *     tags={"News"},
     *     @SWG\Response(
     *         response=200,
     *         description="News",
     *         @SWG\Schema(
     *            type="array",
     *            @SWG\Items(ref="#/definitions/News")
     *         )
     *     ),
     *     @SWG\Response(
     *        response=401,
     *        description="Unauthorized",
     *        @SWG\Schema(ref="#/definitions/Unauthorized")
     *     )
     * )
     */
    'GET locations' => 'locations/index',
    /**
     * @SWG\Post(
     *     path="/v1/locations",
     *     summary="Create data locations",
     *     tags={"News"},
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Data News",
     *         required=true,
     *         @SWG\Schema(ref="#/definitions/CreateNews"),
     *     ),
     *     @SWG\Response(
     *         response=201,
     *         description="Data locations",
     *         @SWG\Schema(ref="#/definitions/News")
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="ValidateErrorException",
     *         @SWG\Schema(ref="#/definitions/ErrorValidate")
     *     )
     * )
     */
    'POST locations' => 'locations/create',
    /**
     * @SWG\Put(
     *     path="/v1/locations/{id}",
     *     summary="Update data locations",
     *     tags={"News"},
     *     @SWG\Parameter(
     *         ref="#/parameters/id"
     *     ),
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Data News",
     *         required=true,
     *         @SWG\Schema(ref="#/definitions/UpdateNews"),
     *     ),
     *     @SWG\Response(
     *         response=202,
     *         description="Data locations",
     *         @SWG\Schema(ref="#/definitions/News")
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="ValidateErrorException",
     *         @SWG\Schema(ref="#/definitions/ErrorValidate")
     *     )
     * )
     */
    'PUT locations/{id}' => 'locations/update',
    /**
     * @SWG\Get(
     *     path="/v1/locations/{id}",
     *     summary="Get data locations",
     *     tags={"News"},
     *     @SWG\Parameter(
     *         ref="#/parameters/id"
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Data locations",
     *         @SWG\Schema(ref="#/definitions/News")
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="Resource not found",
     *         @SWG\Schema(ref="#/definitions/Not Found")
     *     )
     * )
     */
    'GET locations/{id}' => 'locations/view',
    /**
     * @SWG\Delete(
     *     path="/v1/locations/{id}",
     *     summary="Delete data locations",
     *     tags={"News"},
     *     @SWG\Parameter(
     *         ref="#/parameters/id"
     *     ),
     *     @SWG\Response(
     *         response=202,
     *         description="Status Delete",
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="Resource not found",
     *         @SWG\Schema(ref="#/definitions/Not Found")
     *     )
     * )
     */
    'DELETE locations/{id}' => 'locations/delete',
];
