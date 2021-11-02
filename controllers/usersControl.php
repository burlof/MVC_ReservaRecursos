<?php

include_once ("view.php");
include_once ("models/security.php");
include_once ("models/user.php");


class UsersControl{
    
    private $view;

    public function __construct(){
        $this->view = new View(); // Vistas
        $this->user = new User(); //Usuarios
        DB::createConnection(); 
    }

    /**
     * Muestra el menú de opciones del usuario
     */
    public function showMenu()
    {
        $this->view->show("mainMenu");
    }


     /**
     * Muestra una lista de todos los recursos de la base de datos
     */
    public function selectUsers()
    {
        $data['users'] = User::getAll();
        $this->view->show("users/showAllUsers", $data);
    }

    /**
     * Elimina un usuario por su id de la base de datos
     */
    public function deleteUsers(){
        $hasReservations = User::hasReservationsUsers();
        $text = "";
        if ($hasReservations) {
            $text = "No puedes borrar ese usuario porque tiene reservas. ";
        }
        $result = User::deleteID();
        if ($result == 0) {
            $text = $text . "Ha fallado el borrado";
        } else {
            $text = $text . "Borrado con éxito";
        }
        $this->selectUsers($text);
    }

    /**
     * Muestra el formulario del usuario seleccionado para ser modificado
     */
    public function edit() {
        $data['users'] = User::get($_REQUEST['idUser']);
        $this->view->show("users/updateUsers", $data);

    }

    /**
     * Muestra una nueva vista para insertar recursos en la base de datos
     */
    public function showInsert()
    {
        $this->view->show("users/addUsers");
    }

    /**
     * Inserta un nuevo recurso en la base de datos
     */
    public function insertUsers(){
        User::insert();
        $data['users'] = User::getAll();
        $this->view->show("users/showAllUsers", $data);
    }

    /**
     * Actualiza/Modifica un usuario por su id de la base de datos
     */
    public function updateUsers(){
        User::update();
        $data['users'] = User::getAll();
        $this->view->show("users/showAllUsers", $data);
    }

    /**
     * Muestra el formulario de login
     */
    public function showLoginForm($data)
    {
        $this->view->show("loginForm", $data);
    }


    /**
     * Procesa el formulario de login y, si es correcto, inicia la sesión con el id del usuario.
     * Redirige a la vista de selección de rol.
     */
    public function processLoginForm()
    {

        // Validación del formulario
        if (Security::filter($_REQUEST['username']) == "" || Security::filter($_REQUEST['password']) == "") {
            // Algún campo del formulario viene vacío: volvemos a mostrar el login
            $data['errorMsg'] = "El email y la contraseña son obligatorios";
            $this->view->show("loginForm", $data);
        }
        else {
            // Hemos pasado la validación del formulario: vamos a procesarlo
            $username = Security::filter($_REQUEST['username']);
            $password = Security::filter($_REQUEST['password']);
            $userData = $this->user->checkLogin($username, $password);

            if ($userData!=null) {
                // Login correcto: creamos la sesión y pedimos al usuario que elija su rol
                //Security::createSession($userData['id']);
                $this->view->show('reservations/showAllReservations');
            }
            else {
                $data['errorMsg'] = "Usuario o contraseña incorrectos";
                $this->view->show("loginForm", $data);
            }
        }
    }

    /**
     * Muestra formulario de selección de rol de usuario
     */
    public function selectUserRolForm()
    {
        $data['roles'] = $this->user->getUserRoles(Security::getUserId());
        $this->view->show("selectUserRolForm", $data);
        // Posible mejora: si el usuario solo tiene un rol, la aplicación podría seleccionarlo automáticamnte
        // y saltar a $this->showMainMenu()
    }

    /**
     * Procesa el formulario de selección de rol de usuario y crea una variable de sesión para almacenarlo.
     * Redirige al menú principal.
     */
    public function processSelectUserRolForm()
    {
        Security::changeRol(Security::filter($_REQUEST['idRol']));
        $this->showMainMenu();
    }

    /**
     * Muestra el menú de opciones del usuario según la tabla de persmisos
     */
    public function showMainMenu()
    {
        $data['permissions'] = $this->user->getUserPermissions(Security::getRolId());
        $this->view->show("mainMenu", $data);
    }

    /**
     * Cierra la sesión
     */    
    public function closeSession() {
        Security::closeSession();
        $this->view->show("loginForm");
    }





}

?>