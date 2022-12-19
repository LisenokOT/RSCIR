<?php
    session_start();
    require_once 'settings.php';
    
    $app = new controller;
    
    class controller{

        protected $path; // Путь, разбитый на массив
        protected $model; // Объект модели
        protected $view; // Объект представления
        public function __construct(){
            // Подключение модели и представления
            $path = explode('/', trim($_SERVER['REDIRECT_URL'], '/'));
            if ($path[0] == "")
                header('Location: /index.php');
            require_once($_SERVER['DOCUMENT_ROOT'].'/model.php'); // Задание пути к модели
            require_once($_SERVER['DOCUMENT_ROOT'].'/view.php'); // Задание пути к представлению
            $model = 'model';
            $view = 'view';
            $this->path = $path;
            $this->model = new $model;
            $this->view = new $view;
            $this->pageSelect();
        }
    
        // Выбор страницы
        private function pageSelect(){
            if($this->path[0] == 'oper' && array_key_exists(1,$this->path)){
                $action = $this->path[1];
                $this->model->$action();
            }elseif($this->path[0] == 'index.php'){
                $this->indexPage();
            }elseif($this->path[0] == 'timetable.php'){
                $this->timetablePage();
            }elseif($this->path[0] == 'admin'){
                $this->adminPage();
            }elseif($this->path[0] == 'storage'){
                $this->filesPage();
            }
        }
    
        private function indexPage(){
            $dataToView = "";
            $this->view->rander('index.php', "Главная");
        }

        private function timetablePage(){
            $result = $this->model->selectTimetable();
            $dataToView = array(
                "result" => $result
            );
            $this->view->rander('timetable.php', $dataToView, 'Расписание');
        }

        private function adminPage(){
            $users = $this->model->selectUsers();
            $dataToView = array(
                "users" => $users
            );
            $this->view->rander('admin/admin.php', $dataToView, 'Админ панель');
        }

        private function filesPage(){
            $files = $this->model->selectFiles();
            $dataToView = array(
                "files" => $files
            );
            $this->view->rander('storage/files.php', $dataToView, 'PDF');
        }
    
    
    }
?>