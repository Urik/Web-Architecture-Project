<?php
require_once dirname(__FILE__) . "/../../Others/Producer.php";
require_once dirname(__FILE__) . "/../../Others/UserColumns.php";

class ProducerModificationController {

     /** @var ProducerModificationView */
    private $view;

    /**  @param Producer $producer */
    public function showData($producer) {
        $producerData = array();
        if (is_null($producer)) {
            $producerData = [
                UserColumns::NICK => $producer->getUser()->getNick(),
                UserColumns::PASSWORD => $producer->getUser()->getPassword(),
                UserColumns::BIRTH_DATE => $producer->getUser()->getBirthDay(),
                ProducerColumns::NOMBRE => $producer->getNombre(),
                ProducerColumns::APELLIDO => $producer->getApellido(),
                ProducerColumns::DIRECCION => $producer->getDireccion(),
                ProducerColumns::TELEFONO_1 => $producer->getTelefono_1(),
                ProducerColumns::TELEFONO_2 => $producer->getTelefono_2(),
                ProducerColumns::DNI => $producer->getDni()
            ];
        } else {
            $producerData = [
                UserColumns::NICK => "",
                UserColumns::PASSWORD => "",
                UserColumns::BIRTH_DATE => date("d/m/Y"),
                ProducerColumns::NOMBRE => "",
                ProducerColumns::APELLIDO => "",
                ProducerColumns::DIRECCION => "",
                ProducerColumns::TELEFONO_1 => "",
                ProducerColumns::TELEFONO_2 => "",
                ProducerColumns::DNI => ""
            ];
        }

        $this->view->showModificationPage($producerData);
    }

    public function

}
