<?php
include 'model/Table.php';
$category = Table::getCategory();
$table = Table::getTable();
if (isset($_GET['logout'])) {
    session_destroy();
    header("location:index.php");
}
if (isset($_POST['name'], $_POST['password'])) {
    $a = new Table();
    $admin = $a->checkAdmin();
}
if (isset($_SESSION['user_id'])) {
    if (isset($_GET['del'], $_GET['id'])) {
        $delAdmin = Table::delAdmin();
    }
    if (isset($_POST['user_change_password'], $_POST['user_id'])) {
        $changeAdmin = Table::changePassAdmin();
    }
    if (isset($_POST['new_login'], $_POST['new_password'])) {
        $addAdmin = Table::addAdmin();
    }
    if (isset($_GET['del'], $_GET['category_id'])) {
        $delCategory = Table::delCategory();
        $delCategory = Table::delCategoryTwo();
        header("location:index.php?action=admin&controller=questions");
    }
    if (isset($_POST['new_category'])) {
        $newCategory = Table::newCategory();
        header("location:index.php?action=admin&controller=questions");
    }
    if (isset($_POST['id'], $_POST['update_question'], $_POST['update_answer'], $_POST['update_author'], $_POST['update_theme'])) {
        if (isset($_POST['show'])) {
            $updateQuestion = Table::updateQuestionShow();

        } else {
            $updateQuestion = Table::updateQuestion();

        }
    }
    if (isset($_GET['del'], $_GET['main_id'])) {
        $delQuestion = Table::delQuestion();
    }
}
include 'views/temp.php';
if (isset($_SESSION['user_id'], $_GET['action'])) {
    if ($_GET['action'] == 'admin') {
        if (isset($_GET['controller']) and $_GET['controller'] == 'admins') {
            $users = Table::listAdmin();
            include 'views/admins.php';

            include 'views/new_admin.php';
        }
        if (isset($_GET['controller']) and $_GET['controller'] == 'questions') {
            $describeCategory = Table::describeCategory();

            include 'views/describe_questions.php';

            include 'views/new_category.php';

            if (isset($_GET['show'], $_GET['category_id'])) {
                $showCategory = Table::showCategory();
                if (!empty($showCategory)) {
                    include 'views/describe_category.php';

                }
            }

            if (isset($_GET['show'], $_GET['main_id'])) {
                if ($_GET['show'] == 0) {
                    $showQuestion = Table::showQuestion();

                } elseif ($_GET['show'] == 1) {
                    $hiddenQuestion = Table::hiddenQuestion();

                }
            }
            $table_no_answer = Table::noAnswer();
            include 'views/no_answer.php';
        }
    }
}
if (isset($_POST['user_question'], $_POST['user_category'], $_POST['user_mail'], $_POST['user_name'])) {
    $question = Table::newQuestion();
}

if (!isset($_SESSION['user_id']) AND isset($_GET['action'])) {
    if ($_GET['action'] == 'admin') {
        include 'views/registration.php';
    }
}
if (!isset($_GET['action'])) {
    $_GET['action'] = 'main';
}
if (isset($_GET['action']) AND $_GET['action'] == 'main') {
    include 'views/question.php';
}


