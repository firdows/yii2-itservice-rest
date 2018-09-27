<?php

return [

    /**
     * @SWG\Get(
     *     path="/v1/users",
     *     summary="Get list users",
     *     tags={"users"},
     *     @SWG\Response(
     *         response=200,
     *         description="users",
     *         @SWG\Schema(
     *            type="array",
     *            @SWG\Items(ref="#/definitions/users")
     *         )
     *     ),
     *     @SWG\Response(
     *        response=401,
     *        description="Unauthorized",
     *        @SWG\Schema(ref="#/definitions/Unauthorized")
     *     )
     * )
     */
    'GET users' => 'users/index',

    /**
     * @SWG\Post(
     *     path="/v1/users",
     *     summary="Create data users",
     *     tags={"users"},
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Data users",
     *         required=true,
     *         @SWG\Schema(ref="#/definitions/Createusers"),
     *     ),
     *     @SWG\Response(
     *         response=201,
     *         description="Data users",
     *         @SWG\Schema(ref="#/definitions/users")
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="ValidateErrorException",
     *         @SWG\Schema(ref="#/definitions/ErrorValidate")
     *     )
     * )
     */
    'POST users' => 'users/create',

    /**
     * @SWG\Put(
     *     path="/v1/users/{id}",
     *     summary="Update data users",
     *     tags={"users"},
     *     @SWG\Parameter(
     *         ref="#/parameters/id"
     *     ),
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Data users",
     *         required=true,
     *         @SWG\Schema(ref="#/definitions/Updateusers"),
     *     ),
     *     @SWG\Response(
     *         response=202,
     *         description="Data users",
     *         @SWG\Schema(ref="#/definitions/users")
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="ValidateErrorException",
     *         @SWG\Schema(ref="#/definitions/ErrorValidate")
     *     )
     * )
     */
    'PUT users/{id}' => 'users/update',


    /**
     * @SWG\Get(
     *     path="/v1/users/{id}",
     *     summary="Get data users",
     *     tags={"users"},
     *     @SWG\Parameter(
     *         ref="#/parameters/id"
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Data users",
     *         @SWG\Schema(ref="#/definitions/users")
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="Resource not found",
     *         @SWG\Schema(ref="#/definitions/Not Found")
     *     )
     * )
     */
    'GET users/{id}' => 'users/view',

    /**
     * @SWG\Delete(
     *     path="/v1/users/{id}",
     *     summary="Delete data users",
     *     tags={"users"},
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
    'DELETE users/{id}' => 'users/delete',
];