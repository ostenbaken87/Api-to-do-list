<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Info(
 *     title="Task Management API",
 *     version="1.0.0",
 *     description="
 *     ## Инструкция по использованию API:
 *     
 *     1. **Регистрация/Вход**: Сначала зарегистрируйтесь через `/register` или войдите через `/login`
 *     2. **Получите токен**: После успешной аутентификации вы получите токен в ответе
 *     3. **Авторизация**: Нажмите кнопку 'Authorize' и введите: `Bearer ваш_токен`
 *     4. **Тестирование**: Теперь можете тестировать защищенные endpoints
 *     
 *     ## Публичные endpoints (не требуют авторизации):
 *     - GET /tasks-all - Все задачи
 *     - GET /tasks/{id} - Конкретная задача
 *     - GET /tasks-user/{id} - Задачи пользователя
 *     
 *     ## Защищенные endpoints (требуют авторизации):
 *     - POST /tasks - Создать задачу
 *     - PATCH /tasks/{id} - Обновить задачу
 *     - DELETE /tasks/{id} - Удалить задачу
 *     - POST /logout - Выход
 *     - GET /user - Информация о пользователе",
 * )
 * @OA\PathItem(
 *      path="/api/",
 * )
 * @OA\Server(
 *     url="http://localhost:8000/api",
 *     description="Development Server"
 * )
 * 
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     description="Аутентификация через Sanctum Token"
 * )
 * 
 * @OA\Schema(
 *     schema="Task",
 *     type="object",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="user_id", type="integer", example=1),
 *     @OA\Property(property="title", type="string", example="Моя задача"),
 *     @OA\Property(property="description", type="string", example="Описание задачи"),
 *     @OA\Property(property="status", type="string", example="ожидает", enum={"ожидает", "в работе", "на паузе", "выполнена"}),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2024-01-01 12:00:00"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2024-01-01 12:00:00")
 * )
 * 
 * @OA\Schema(
 *     schema="User",
 *     type="object",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="John Doe"),
 *     @OA\Property(property="email", type="string", format="email", example="john@example.com"),
 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 */
class MainController extends Controller
{
    //
}
