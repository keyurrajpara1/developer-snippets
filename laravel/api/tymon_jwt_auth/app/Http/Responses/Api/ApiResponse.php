<?php

namespace App\Http\Responses\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\LengthAwarePaginator;

class ApiResponse
{
    /**
     * Success response method.
     *
     * @param array|object|null $data
     * @param string $message
     * @param int $statusCode
     * @return JsonResponse
     */
    public static function success($data = null, string $message = 'Request successful.', int $statusCode = 200): JsonResponse
    {
        $response = array(
            'status' => true,
            'status_code' => $statusCode,
            'message' => $message
        );
        if ($data) {
            $response['data'] = self::replaceNullWithEmptyString($data);
        }
        return response()->json($response, $statusCode);
    }

    /**
     * Error response method.
     *
     * @param string $message
     * @param array|null $errors
     * @param int $statusCode
     * @return JsonResponse
     */
    public static function error(string $message = 'An error occurred.', $errors = null, int $statusCode = 400): JsonResponse
    {
        return response()->json([
            'status' => 'error',
            'status_code' => $statusCode,
            'message' => $message,
            'errors' => $errors
        ], $statusCode);
    }

    /**
     * Custom response method.
     *
     * @param array $response
     * @param int $statusCode
     * @return JsonResponse
     */
    public static function custom(array $response, int $statusCode = 200): JsonResponse
    {
        return response()->json($response, $statusCode);
    }
    /**
     * Helper method to format the API response.
     *
     * @param  \Illuminate\Support\Collection|\Illuminate\Pagination\LengthAwarePaginator  $data
     * @param  int  $totalPages
     * @return \Illuminate\Http\JsonResponse
     */
    public static function formatResponse($data, $totalPages): JsonResponse
    {
        $pagination = [
            'totalPages'  => $totalPages,
            'currentPage' => $data instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator
                ? $data->currentPage()
                : 1,
            'totalItems'  => $data instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator
                ? $data->total()
                : count($data),
        ];

        return self::success([
            'list'       => $data instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator
                ? $data->items()
                : $data,
            'pagination' => $pagination,
        ]);
        /*  $pagination = [
            'totalPages'   => $totalPages,
            'currentPage'  => $data instanceof LengthAwarePaginator ? $data->currentPage() : 1,
            'totalItems'   => $data instanceof LengthAwarePaginator ? $data->total() : count($data),
        ];
        return self::success([
            'list'       => $data instanceof LengthAwarePaginator ? $data->items() : $data,
            'pagination' => $pagination,
        ]); */
    }

    public static function replaceNullWithEmptyString($data)
    {
        // Check if the data is a collection and loop through it
        if ($data instanceof \Illuminate\Database\Eloquent\Collection) {
            return $data->map(function ($item) {
                return self::replaceNullWithEmptyString($item);
            });
        }

        // If the data is a model, convert it to an array
        if ($data instanceof \Illuminate\Database\Eloquent\Model) {
            $data = $data->toArray();
        }
        // If it's an array, loop through and replace nulls
        if (is_array($data)) {
            foreach ($data as &$value) {
                // Recursively handle nested arrays/objects
                $value = self::replaceNullWithEmptyString($value);
            }
        }
        // If it's an object, loop through the properties and replace nulls
        elseif (is_object($data)) {
            foreach ($data as $key => &$value) {
                $value = self::replaceNullWithEmptyString($value);
            }
        }
        // If it's not an array or object, just check if it's null
        else {
            return $data === null ? '' : $data;
        }

        return $data;
    }
}
