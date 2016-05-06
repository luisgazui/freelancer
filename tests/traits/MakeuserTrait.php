<?php

use Faker\Factory as Faker;
use FreelancerOnline\Models\user;
use FreelancerOnline\Repositories\userRepository;

trait MakeuserTrait
{
    /**
     * Create fake instance of user and save it in database
     *
     * @param array $userFields
     * @return user
     */
    public function makeuser($userFields = [])
    {
        /** @var userRepository $userRepo */
        $userRepo = App::make(userRepository::class);
        $theme = $this->fakeuserData($userFields);
        return $userRepo->create($theme);
    }

    /**
     * Get fake instance of user
     *
     * @param array $userFields
     * @return user
     */
    public function fakeuser($userFields = [])
    {
        return new user($this->fakeuserData($userFields));
    }

    /**
     * Get fake data of user
     *
     * @param array $postFields
     * @return array
     */
    public function fakeuserData($userFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'lastname' => $fake->word,
            'documento_id' => $fake->randomDigitNotNull,
            'documentoi' => $fake->word,
            'email' => $fake->word,
            'password' => $fake->word,
            'tipousuario_id' => $fake->randomDigitNotNull,
            'pais_id' => $fake->randomDigitNotNull,
            'direccion' => $fake->word
        ], $userFields);
    }
}
