<?php

include ("view.php");
include ("models/user.php");
include ("models/resource.php");
include ("models/timeslot.php");
include ("models/security.php");

class Controller
{

    private $view, $user, $resource, $timeslot;

    /**
     * Constructor. Crea el objeto vista y los modelos
     */
    public function __construct()
    {
        session_start(); // Si no se ha hecho en el index, claro
        $this->view = new View(); // Vistas
        $this->user = new User(); // Modelo de usuarios
        $this->resource = new Resource();
        $this->timeslot = new TimeSlot();
    }

    /**
     * Muestra el formulario de login
     */
    public function showLoginForm()
    {
        $this->view->show("loginForm");
    }

    /**
     * Procesa el formulario de login y, si es correcto, inicia la sesión con el id del usuario.
     * Redirige a la vista de selección de rol.
     */
    public function processLoginForm()
    {

        // Validación del formulario
        if (Security::filter($_REQUEST['email']) == "" || Security::filter($_REQUEST['pass']) == "") {
            // Algún campo del formulario viene vacío: volvemos a mostrar el login
            $data['errorMsg'] = "El email y la contraseña son obligatorios";
            $this->view->show("loginForm", $data);
        }
        else {
            // Hemos pasado la validación del formulario: vamos a procesarlo
            $email = Security::filter($_REQUEST['email']);
            $pass = Security::filter($_REQUEST['pass']);
            $userData = $this->user->checkLogin($email, $pass);

            if ($userData!=null) {
                // Login correcto: creamos la sesión y pedimos al usuario que elija su rol
                Security::createSession($userData['id']);
                $this->SelectUserRolForm();
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
     * Muestra el menú de opciones del usuario
     */
    public function showMenu()
    {
        $this->view->show("mainMenu");
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

    /**
     * Elimina un usuario de la base de datos
     */    
    public function deleteUser() {
        if (Security::thereIsSession()) {
            echo "Este método se supone que borra un usuario, pero está sin implementar<br>";
            echo "Solo lo utilizamos para comprobar que el control de acceso de usuarios funciona bien";
        } else {
            Security::closeSession();
            $data['errorMsg'] = 'No tienes permisos para hacer eso';
            $this->view->show("loginForm", $data);
        }
    }

    /**
     * Muestra una lista de todos los recursos de la base de datos
     */
    public function selectResources()
    {
        $data['resources'] = $this->resource->getAll();
        $this->view->show("showAllResources", $data);
    }

    /**
     * Muestra una lista de todos los tiempos de la base de datos
     */
    public function selectTimeSlots()
    {
        $data['timeslots'] = $this->timeslot->getAll();
        $this->view->show("showAllTimeSlots", $data);
    }

    /**
     * Muestra una lista de todos los usuarios de la base de datos
     */
    public function selectUsers()
    {
        $data['users'] = $this->user->getAll();
        $this->view->show("showAllUsers", $data);
    }




}