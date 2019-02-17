<?php

class Table
{

    /**
     * Проверка или регистрация админа
     * @return array
     */
    public function checkAdmin()
    {
        $stmt = Di::get()->db()->prepare('SELECT id FROM user WHERE login= ?');
        $stmt->execute([$_POST['name']]);
        $id = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //авторизация
        if (!empty($id)) {
            $stmt = Di::get()->db()->prepare('SELECT id FROM user WHERE login= ? AND password= ?');
            $stmt->execute([$_POST['name'], $_POST['password']]);
            $id = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (empty($id)) {
                exit("Ошибка! Неверный пароль");
            }
            foreach ($id as $key => $value) {
                $_SESSION['user_id'] = $value['id'];
            }
        } //регистрация
        else {
            $stmt = Di::get()->db()->prepare("INSERT INTO user (login, password) VALUES ('" . $_POST['name'] . "','" . $_POST['password'] . "')");
            $stmt->execute();
            $registr = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo "Вы успешно зарегистрированы";
        }
    }

    /**
     * Получение всех админов
     * @return array
     */
    public static function listAdmin()
    {
        $stmt = Di::get()->db()->prepare('SELECT id,login,password FROM user');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     *Удаление админа
     * @return array
     */
    public static function delAdmin()
    {
        $stmt = Di::get()->db()->prepare("DELETE FROM user WHERE id=" . $_GET['id'] . "");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     *Изменение пароля админа
     * @return array
     */
    public static function changePassAdmin()
    {
        $stmt = Di::get()->db()->prepare("UPDATE user SET password=" . $_POST['user_change_password'] . " WHERE id=" . $_POST['user_id'] . "");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     *Добавление админа
     * @return array
     */
    public static function addAdmin()
    {
        $stmt = Di::get()->db()->prepare("INSERT INTO user (login,password) VALUES (:login,:password)");
        $stmt->execute(["login" => $_POST['new_login'], "password" => $_POST['new_password']]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     *получение данных вопросы и ответы
     * @return array
     */
    public static function describeCategory()
    {
        $stmt = Di::get()->db()->prepare("SELECT answer,category_id,is_hidden,category FROM main m INNER JOIN category c ON m.category_id=c.id");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * получение категорий
     * @return array
     */
    public static function getCategory()
    {
        $stmt = Di::get()->db()->prepare("SELECT id,category FROM category");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * удаление категории
     * @return array
     */
    public static function delCategory()
    {
        $stmt = Di::get()->db()->prepare("DELETE FROM category WHERE id=" . $_GET['category_id'] . "");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function delCategoryTwo()
    {
        $stmt = Di::get()->db()->prepare("DELETE FROM main WHERE category_id=" . $_GET['category_id'] . "");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * добавление новой темы
     * @return array
     */
    public static function newCategory()
    {
        $stmt = Di::get()->db()->prepare("INSERT INTO category (category) VALUES ('" . $_POST['new_category'] . "')");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    /**
     * просмотр выбранной темы
     * @return array
     */
    public static function showCategory()
    {
        $stmt = Di::get()->db()->prepare("SELECT * FROM main WHERE category_id=" . $_GET['category_id'] . "");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    /**
     * изменение выбранной темы
     * @return array
     */
    public static function updateQuestionShow()
    {
        $stmt = Di::get()->db()->prepare(prepare("UPDATE main SET question='" . $_POST['update_question'] . "', 
        answer='" . $_POST['update_answer'] . "', author='" . $_POST['update_author'] . "', 
        category_id='" . $_POST['update_theme'] . "', is_hidden = 1 WHERE id=" . $_POST['id'] . ""));
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    /**
     * изменение выбранной темы
     * @return array
     */
    public static function updateQuestion()
    {
        $stmt = Di::get()->db()->prepare("UPDATE main SET question='" . $_POST['update_question'] . "',
         answer='" . $_POST['update_answer'] . "', author='" . $_POST['update_author'] . "',
          category_id='" . $_POST['update_theme'] . "' WHERE id=" . $_POST['id'] . "");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    /**
     * удаление вопроса
     * @return array
     */
    public static function delQuestion()
    {
        $stmt = Di::get()->db()->prepare("DELETE FROM main WHERE id=" . $_GET['main_id'] . "");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    /**
     * показать вопрос
     * @return array
     */
    public static function showQuestion()
    {
        $stmt = Di::get()->db()->prepare("UPDATE main SET is_hidden = 1 WHERE id=" . $_GET['main_id'] . "");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    /**
     * скрыть вопрос
     * @return array
     */
    public static function hiddenQuestion()
    {
        $stmt = Di::get()->db()->prepare("UPDATE main SET is_hidden = 0 WHERE id=" . $_GET['main_id'] . "");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    /**
     * получить весь список вопросов и ответов вопрос
     * @return array
     */
    public static function getTable()
    {
        $stmt = Di::get()->db()->prepare("SELECT * FROM main");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    /**
     * добавление вопроса
     * @return array
     */
    public static function newQuestion()
    {
        $stmt = Di::get()->db()->prepare("INSERT INTO main (question, category_id, author, email)  VALUES ('" . $_POST['user_question'] . "','" . $_POST['user_category'] . "','" . $_POST['user_name'] . "','" . $_POST['user_mail'] . "')");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    /**
     * список вопроса в порядке добавления
     * @return array
     */
    public static function noAnswer()
    {
        $stmt = Di::get()->db()->prepare("SELECT * FROM main WHERE answer = '' or answer is null ORDER BY YEAR(date_added) ASC, MONTH(date_added) ASC,DAY(date_added) ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }


}
