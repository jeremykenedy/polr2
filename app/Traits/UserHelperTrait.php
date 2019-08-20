<?php
namespace App\Traits;

use App\Models\User;
use App\Traits\CryptoHelperTrait;
use Hash;

trait UserHelperTrait
{
    use CryptoHelperTrait;

    private static $USER_ROLES = [
        'admin'    => 'admin',
        'default'  => '',
    ];

    public function getUserRoles()
    {
        return self::$USER_ROLES;
    }

    public function userExists($username)
    {
        /* XXX: used primarily with test cases */

        $user = self::getUserByUsername($username, $inactive=true);

        return ($user ? true : false);
    }

    public function emailExists($email)
    {
        /* XXX: used primarily with test cases */

        $user = self::getUserByEmail($email, $inactive=true);

        return ($user ? true : false);
    }

    public function validateUsername($username)
    {
        return ctype_alnum($username);
    }

    public function userIsAdmin($username)
    {
        return (self::getUserByUsername($username)->role == self::$USER_ROLES['admin']);
    }

    public function checkCredentials($username, $password)
    {
        $user = User::where('active', 1)
            ->where('username', $username)
            ->first();

        if ($user == null) {
            return false;
        }

        $correct_password = Hash::check($password, $user->password);

        if (!$correct_password) {
            return false;
        }
        else {
            return ['username' => $username, 'role' => $user->role];
        }
    }

    public function resetRecoveryKey($username)
    {
        $recovery_key = CryptoHelperTrait::generateRandomHex(50);
        $user = self::getUserByUsername($username);

        if (!$user) {
            return false;
        }

        $user->recovery_key = $recovery_key;
        $user->save();

        return $recovery_key;
    }

    public function userResetKeyCorrect($username, $recovery_key, $inactive=false)
    {
        // Given a username and a recovery key, return true if they match.
        $user = self::getUserByUsername($username, $inactive);

        if ($user) {
            if ($recovery_key != $user->recovery_key) {
                return false;
            }
        }
        else {
            return false;
        }
        return true;
    }

    public function getUserBy($attr, $value, $inactive=false) {
        $user = User::where($attr, $value);

        if (!$inactive) {
            // if user must be active
            $user = $user
                ->where('active', 1);
        }

        return $user->first();
    }

    public function getUserById($user_id, $inactive=false)
    {
        return self::getUserBy('id', $user_id, $inactive);
    }

    public function getUserByUsername($username, $inactive=false)
    {
        return self::getUserBy('username', $username, $inactive);
    }

    public function getUserByEmail($email, $inactive=false)
    {
        return self::getUserBy('email', $email, $inactive);
    }
}
