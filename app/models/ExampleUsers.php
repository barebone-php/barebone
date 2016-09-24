<?php
namespace App\Model;

/**
 * Class ExampleUsers
 *
 * This is just an example implementation of a User model featuring some basic utility methods.
 * You are free to delete this file or create your own version.
 *
 * Example Schema: id, name, email, password
 *
 * @author  Kjell Bublitz <kjbbtz@gmail.com>
 * @package App\Controller
 */
class ExampleUsers extends AppModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Disable default timestamp fields and handling
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * BCrypt input for using value as password hash
     *
     * @param string $input  Form value, as typed, for encrypting
     * @param int    $rounds Number of cycles, higher takes longer
     *
     * @return string Hash
     */
    public static function cryptpass($input, $rounds = 7)
    {
        $crypt_options = array(
            'cost' => $rounds
        );
        return password_hash($input, PASSWORD_BCRYPT, $crypt_options);
    }

    /**
     * Test if password is correct
     *
     * @param string $email    Form value, for database lookup
     * @param string $password Form value, as typed, for comparing.
     *
     * @return bool
     */
    public static function verifypass($email, $password)
    {
        $user = static::select('password')->where('email', $email)->firstOrFail();
        return password_verify($password, $user->password);
    }

    /**
     * Test if email exists in database
     *
     * @param string $email E-mail address to check
     *
     * @return bool
     */
    public static function mailexists($email)
    {
        return (bool) static::where('email', $email)->count();
    }

    /**
     * Create a slightly censored array
     *
     * @return array
     */
    public function toSessionArray()
    {
        $user = $this->toArray();
        unset($user['password']);
        unset($user['token']);

        return $user;
    }
}