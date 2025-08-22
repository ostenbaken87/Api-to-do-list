<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Tag(
 *     name="Tasks",
 *     description="Операции с задачами"
 * )
 */
class TaskControllerSwagger extends Controller
{
    /**
     * @OA\Get(
     *     path="/tasks-all",
     *     summary="Получить список всех задач (публичный)",
     *     tags={"Tasks"},
     *     @OA\Response(
     *         response=200,
     *         description="Успешный ответ",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Task")
     *         )
     *     )
     * )
     */
    public function index() {}

    /**
     * @OA\Get(
     *     path="/tasks/{id}",
     *     summary="Получить задачу по ID (публичный)",
     *     tags={"Tasks"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID задачи",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Успешный ответ",
     *         @OA\JsonContent(ref="#/components/schemas/Task")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Задача не найдена"
     *     )
     * )
     */
    public function show() {}

    /**
     * @OA\Get(
     *     path="/tasks-user/{id}",
     *     summary="Получить задачи конкретного пользователя (публичный)",
     *     tags={"Tasks"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID пользователя",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Успешный ответ",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Task")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Пользователь не найден"
     *     )
     * )
     */
    public function usersTasks() {}

    /**
     * @OA\Post(
     *     path="/tasks",
     *     summary="Создать новую задачу (требует аутентификации)",
     *     tags={"Tasks"},
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"title"},
     *             @OA\Property(property="title", type="string", example="Новая задача"),
     *             @OA\Property(property="description", type="string", example="Описание новой задачи"),
     *             @OA\Property(property="status", type="string", example="ожидает", enum={"ожидает", "в работе", "на паузе", "выполнена"})
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Задача создана",
     *         @OA\JsonContent(ref="#/components/schemas/Task")
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Ошибка валидации"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Не авторизован"
     *     )
     * )
     */
    public function store() {}

    /**
     * @OA\Patch(
     *     path="/tasks/{id}",
     *     summary="Частичное обновление задачи (требует аутентификации)",
     *     tags={"Tasks"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID задачи",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="title", type="string", example="Обновленный заголовок"),
     *             @OA\Property(property="description", type="string", example="Обновленное описание"),
     *             @OA\Property(property="status", type="string", example="выполнена", enum={"ожидает", "в работе", "на паузе", "выполнена"})
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Задача обновлена",
     *         @OA\JsonContent(ref="#/components/schemas/Task")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Задача не найдена или нет доступа"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Ошибка валидации"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Не авторизован"
     *     )
     * )
     */
    public function update() {}

    /**
     * @OA\Delete(
     *     path="/tasks/{id}",
     *     summary="Удалить задачу (требует аутентификации)",
     *     tags={"Tasks"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID задачи",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Задача удалена",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Task deleted successfully")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Задача не найдена или нет доступа"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Не авторизован"
     *     )
     * )
     */
    public function destroy() {}
}