<?php

class UserCreator {
    public function createUser($nick, $password, $email, $birthday, $userType) {
        $variables = array(
            UserColumns::NICK => $nick,
            UserColumns::PASSWORD => $password,
            UserColumns::EMAIL => $email,
            UserColumns::BIRTH_DATE => $birthday,
            UserColumns::USER_TYPE => $userType
        );
        return (new UserDAO())->create($variables);
    }
}

?>
