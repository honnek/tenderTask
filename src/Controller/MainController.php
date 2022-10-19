<?php

use JetBrains\PhpStorm\Pure;

spl_autoload('Model/TaskRepository');
spl_autoload('Model/UserRepository');

/**
 * Основной контроллер
 */
class MainController
{
    /** @var ViewController $viewController */
    protected ViewController $viewController;


    /**
     * Инициализируем поля
     */
    #[Pure] public function __construct()
    {
        $this->viewController = new ViewController();
    }

    /**
     * Основной экшн для главной страницы
     */
    public function actionMain(?array $params)
    {
        session_start();
        if (!($_SESSION['user_id'] ?? false)) {
            session_destroy();
        }

//        $page = $params['page'] ?? 1;
//        $orderBy = $params['by'] ?? '';
//        $limit = 3;
//        $offset = ($page - 1) * $limit;
//        $tasks = $this->taskRepository->findWithLimitOffsetOrderBy($limit, $offset, $orderBy);

//        if (!$tasks) {
//            throw new OutOfBoundsException(message: 'Ошибка запроса к БД');
//        }

        $this->viewController->setData([
//            'page' => $page,
//            'tasks' => $tasks,
//            'limit' => $limit,
//            'countAll' => $this->taskRepository->getCountTasks(),
//            'orderBy' => $orderBy,
            'isAdmin' => !!($_SESSION['user_id'] ?? false),
        ]);

        $this->viewController->display('main');
    }

    /**
     * Экшн для добавления тендера в базу
     * @param array|null $params
     * @param array|null $postParams
     * @throws Exception
     */
    public function actionAddTender(?array $params, ?array $postParams)
    {
        $code = empty($postParams['code']) ? null : $postParams['code'];
        $number = empty($postParams['number']) ? null : $postParams['number'];
        $status = empty($postParams['status']) ? null : $postParams['status'];
        $name = empty($postParams['name']) ? null : $postParams['name'];
        $date = empty($postParams['date']) ? null : $postParams['date'];

        if (!empty($postParams)) {
            if (null === $name || null === $code || null === $number || null === $status || null === $date) {
                throw new Exception('Пропущено обязательное поле');
            } else {

            }

        }

        $this->viewController->display('addTender');
    }

    /**
     * Редактирует текст задачи
     *
     * @param array|null $params
     * @param array|null $postParams
     * @throws Exception
     */
    public function actionEdit(?array $params, ?array $postParams)
    {
        session_start();
        if (null === $_SESSION['user_id']) {
            throw new Exception('Ошибка доступа!!');
        }
        if (empty($postParams)) {
            throw new Exception(message: 'Не найден POST запрос');
        }
        $id = (int)$postParams['id'];
        if (!$this->taskRepository->findByPK($id)) {
            throw new OutOfBoundsException('Не найдена задача с id ' . $id);
        }
        if (isset($postParams['text'])) {
            $newText = $postParams['text'];
            $this->taskRepository->updateTaskText($id, $newText);
        }
        if (isset($postParams['newStatus'])) {
            $newStatus = $postParams['newStatus'];
            $this->taskRepository->updateTaskStatus($id, $newStatus);
        }

        header('Location: http://localhost/project/src/index.php/main/main');
    }

    /**
     * Экшн входа в личный кабинет
     *
     * @param array|null $params
     * @param array|null $postParams
     * @throws Exception
     */
    public function actionLogin(?array $params, ?array $postParams): void
    {
        $name = empty($postParams['user']) ? null : $postParams['user'];
        $pass = empty($postParams['pass']) ? null : $postParams['pass'];

        if (!empty($postParams)) {
            if (null === $name || null === $pass) {
                throw new Exception('поля обязательны для заполнения');
            } else {
                $user = new User();
                $user->setName($name);
                $user->setPassword(sha1($pass));
                $isExist = $this->userRepository->isExist($user);

                if ($isExist) {
                    session_start();
                    $_SESSION['user_id'] = $user->getName();
                    header('Location: http://localhost/project/src/index.php/main/main');
                    exit();
                } else {
                    throw new Exception('Неверные реквизиты для входа');
                }
            }
        }

        $this->viewController->display('login');
    }

    /**
     * Экшн выхода из личного кабинета
     */
    public function actionLogout(): void
    {
        session_start();
        $_SESSION['user_id'] = null;
        session_destroy();
        header('Location: http://localhost/project/src/index.php/main/main');
        exit();
    }


}
