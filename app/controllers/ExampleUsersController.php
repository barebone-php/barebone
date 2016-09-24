<?php
namespace App\Controller;

use App\Model\ExampleUsers;

/**
 * Class UsersController
 *
 * This is just an example implementation for basic I/O.
 * You are free to delete this file or create your own version.
 *
 * Please note that this usually would require a database connection
 * and a users tables which is not included.
 *
 * @see ExampleUsers
 * @author  Kjell Bublitz <kjbbtz@gmail.com>
 * @package App\Controller
 */
class ExampleUsersController extends AppController
{
    /**
     * Check form input and create user session if matching record was found.
     *
     * @return \Barebone\Response
     */
    public function login()
    {
        $error = false;

        if ($this->data) {

            if (empty($this->data['password'])) {
                $error = 'Please enter your password';
            }

            if (empty($this->data['email'])) {
                $error = 'Please enter your e-mail address';
            }

            $valid = ExampleUsers::verifypass($this->data['email'], $this->data['password']);

            if (!$error && $valid)
            {
                /** @var Users $user */
                $user = ExampleUsers::where('email', $this->data['email'])->first();
                $this->session->set('user', $user->toSessionArray());

                return $this->redirect('/');
            }

            $error = 'E-mail not registered or password is wrong.';
        }

        return $this->render('users/login', compact('error'));
    }

    /**
     * Store form values in database and start user session
     *
     * @return \Barebone\Response
     */
    public function signup()
    {
        $error = false;

        if ($this->data) {

            if (empty($this->data['password'])) {
                $error = "Please enter your password";
            }

            if (empty($this->data['email'])) {
                $error = "Please enter your e-mail address";
            }
            elseif (ExampleUsers::mailexists($this->data['email'])) {
                $error = "This e-mail address is already registered.";
            }

            if (empty($this->data['name'])) {
                $error = "Please enter your name";
            }

            if (!$error) {
                // store and create session
                ExampleUsers::forceCreate(
                    [
                        'name'     => $this->data['name'],
                        'email'    => $this->data['email'],
                        'password' => ExampleUsers::cryptpass($this->data['password'])
                    ]
                );

                /** @var Users $user */
                $user = ExampleUsers::where('email', $this->data['email'])->first();
                $this->session->set('user', $user->toSessionArray());

                return $this->redirect('/');
            }
        }

        return $this->render('users/signup', compact('error'));
    }

    /**
     * Clear user session and redirect
     *
     * @return \Barebone\Response
     */
    public function logout()
    {
        $this->session->clear();
        return $this->redirect('/');
    }
}