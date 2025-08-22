<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Tag(
 *     name="Auth",
 *     description="Аутентификация и регистрация пользователей"
 * )
 */
class AuthControllerSwagger extends Controller
{
    /**
     * @OA\Post(
     *     path="/register",
     *     summary="Регистрация нового пользователя",
     *     description="Создает нового пользователя и возвращает токен для аутентификации. Скопируйте полученный токен и используйте его для авторизации в защищенных endpoints.",
     *     tags={"Auth"},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Данные для регистрации",
     *         @OA\JsonContent(
     *             required={"name", "email", "password", "password_confirmation"},
     *             @OA\Property(
     *                 property="name",
     *                 type="string",
     *                 example="John Doe",
     *                 description="Имя пользователя"
     *             ),
     *             @OA\Property(
     *                 property="email",
     *                 type="string",
     *                 format="email",
     *                 example="john@example.com",
     *                 description="Email пользователя"
     *             ),
     *             @OA\Property(
     *                 property="password",
     *                 type="string",
     *                 format="password",
     *                 example="password123",
     *                 description="Пароль (мин. 8 символов)"
     *             ),
     *             @OA\Property(
     *                 property="password_confirmation",
     *                 type="string",
     *                 format="password",
     *                 example="password123",
     *                 description="Подтверждение пароля"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Успешная регистрация",
     *         @OA\JsonContent(
     *             @OA\Property(property="user", ref="#/components/schemas/User"),
     *             @OA\Property(
     *                 property="token",
     *                 type="string",
     *                 example="1|abcdef1234567890",
     *                 description="Токен для аутентификации. Скопируйте этот токен и используйте для авторизации."
     *             ),
     *             @OA\Property(
     *                 property="token_type",
     *                 type="string",
     *                 example="Bearer",
     *                 description="Тип токена"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Ошибка валидации",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="The given data was invalid."),
     *             @OA\Property(
     *                 property="errors",
     *                 type="object",
     *                 example={
     *                     "email": {"The email has already been taken."},
     *                     "password": {"The password confirmation does not match."}
     *                 }
     *             )
     *         )
     *     )
     * )
     */
    public function register() {}

    /**
     * @OA\Post(
     *     path="/login",
     *     summary="Вход в систему",
     *     description="Аутентификация пользователя и получение токена. Используйте этот токен для доступа к защищенным endpoints.",
     *     tags={"Auth"},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Учетные данные для входа",
     *         @OA\JsonContent(
     *             required={"email", "password"},
     *             @OA\Property(
     *                 property="email",
     *                 type="string",
     *                 format="email",
     *                 example="john@example.com",
     *                 description="Email пользователя"
     *             ),
     *             @OA\Property(
     *                 property="password",
     *                 type="string",
     *                 format="password",
     *                 example="password123",
     *                 description="Пароль пользователя"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Успешный вход",
     *         @OA\JsonContent(
     *             @OA\Property(property="user", ref="#/components/schemas/User"),
     *             @OA\Property(
     *                 property="token",
     *                 type="string",
     *                 example="1|abcdef1234567890",
     *                 description="Токен аутентификации. Скопируйте этот токен для авторизации."
     *             ),
     *             @OA\Property(
     *                 property="token_type",
     *                 type="string",
     *                 example="Bearer",
     *                 description="Тип токена"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Неверные учетные данные",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="The provided credentials are incorrect."
     *             )
     *         )
     *     )
     * )
     */
    public function login() {}

    /**
     * @OA\Post(
     *     path="/logout",
     *     summary="Выход из системы",
     *     description="Удаляет текущий токен аутентификации пользователя.",
     *     tags={"Auth"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Успешный выход",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Successfully logged out"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Не авторизован",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Unauthenticated."
     *             )
     *         )
     *     )
     * )
     */
    public function logout() {}

    /**
     * @OA\Get(
     *     path="/user",
     *     summary="Информация о текущем пользователе",
     *     description="Возвращает информацию об аутентифицированном пользователе.",
     *     tags={"Auth"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Успешный ответ",
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Не авторизован",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Unauthenticated."
     *             )
     *         )
     *     )
     * )
     */
    public function user() {}
}