<?php
require_once __DIR__ . "/../configs/Config.php";
require_once __DIR__ . "/../helpers/alertHelper.php";

class formHelper extends Config
{

    /**
     * Change phone number format to 62.
     *
     * @return string
     */

    public static function changePhoneFormat(string $phone_number): string
    {
        $phone_number = str_replace(" ", "", $phone_number);
        $phone_number = str_replace("(", "", $phone_number);
        $phone_number = str_replace(")", "", $phone_number);
        $phone_number = str_replace(".", "", $phone_number);
        if (!preg_match('/[^+0-9]/', trim($phone_number))) {
            if (substr(trim($phone_number), 0, 2) == '62') {
                return trim($phone_number);
            } elseif (substr(trim($phone_number), 0, 1) == '0') {
                return '62' . substr(trim($phone_number), 1);
            }
        }
    }

    /**
     * Check if the form should not null
     *
     * @return array
     */
    public static function isNotNull(array $arr): array
    {
        foreach ($arr as $list) {
            if (empty($_POST[$list])) {
                alertHelper::failedActions("input $list tidak boleh kosong");
            }
        }

        return $arr;
    }

    /**
     * Sanitize form input from malicious code
     *
     * @return string
     */
    public function sanitizeInput(string $input): string
    {
        $sanitized = trim(htmlspecialchars($input));
        $sanitized = $this->db->real_escape_string($sanitized);
        return $sanitized;
    }

    /**
     * Check valid Email address
     *
     * @return string
     */
    public static function validEmail(string $email): string
    {
        $sanitized = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$sanitized) {
            alertHelper::failedActions("Email tidak valid");
        }
        return $sanitized;
    }
}
