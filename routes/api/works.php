<?php

return [
    /**
     * @SWG\Get(
     *     path="/v1/works",
     *     summary="Get list works",
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
    'GET works' => 'works/index',
    /**
     * @SWG\Post(
     *     path="/v1/works",
     *     summary="Create data works",
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
     *         description="Data works",
     *         @SWG\Schema(ref="#/definitions/News")
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="ValidateErrorException",
     *         @SWG\Schema(ref="#/definitions/ErrorValidate")
     *     )
     * )
     */
    'POST works' => 'works/create',
    /**
     * @SWG\Put(
     *     path="/v1/works/{id}",
     *     summary="Update data works",
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
     *         description="Data works",
     *         @SWG\Schema(ref="#/definitions/News")
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="ValidateErrorException",
     *         @SWG\Schema(ref="#/definitions/ErrorValidate")
     *     )
     * )
     */
    'PUT works/{id}' => 'works/update',
    'PUT works/repair/{id}' => 'works/repair',
    /**
     * @SWG\Get(
     *     path="/v1/works/{id}",
     *     summary="Get data works",
     *     tags={"News"},
     *     @SWG\Parameter(
     *         ref="#/parameters/id"
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Data works",
     *         @SWG\Schema(ref="#/definitions/News")
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="Resource not found",
     *         @SWG\Schema(ref="#/definitions/Not Found")
     *     )
     * )
     */
    'GET works/{id}' => 'works/view',
    /**
     * @SWG\Delete(
     *     path="/v1/works/{id}",
     *     summary="Delete data works",
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
    'DELETE works/{id}' => 'works/delete',
];
