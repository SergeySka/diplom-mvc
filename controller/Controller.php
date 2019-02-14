<?php
include 'model/Table.php';
if (isset($_GET['logout'])) {
    session_destroy();
    header("location:index.php");
}
if (!isset($_SESSION['user_id'])) {
    include 'views/registration.php';
}
if (isset($_POST['name'], $_POST['password'])) {
    $a = new Table();
    $admin = $a->checkAdmin();
}
$category = Table::getCategory();
$table = Table::getTable();
if (isset($_SESSION['user_id'])) {
    include 'views/logout.php';
    $users = Table::listAdmin();
    include 'views/admins.php';
    if (isset($_GET['del'], $_GET['id'])) {
        $delAdmin = Table::delAdmin();
    }
    if (isset($_POST['user_change_password'], $_POST['user_id'])) {
        $changeAdmin = Table::changePassAdmin();
    }
    if (isset($_POST['new_login'], $_POST['new_password'])) {
        $addAdmin = Table::addAdmin();
    }
    include 'views/new_admin.php';
    $describeCategory = Table::describeCategory();
    include 'views/describe_questions.php';
    if (isset($_GET['del'], $_GET['category_id'])) {
        $delCategory = Table::delCategory();
    }
    include 'views/new_category.php';
    if (isset($_POST['new_category'])) {
        $newCategory = Table::newCategory();
    }
    if (isset($_GET['show'], $_GET['category_id'])) {
        $showCategory = Table::showCategory();
        if (!empty($showCategory)) {
            include 'views/describe_category.php';

        }
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
    if (isset($_GET['show'], $_GET['main_id'])) {
        if ($_GET['show'] == 0) {
            $showQuestion = Table::showQuestion();

        } elseif ($_GET['show'] == 1) {
            $hiddenQuestion = Table::hiddenQuestion();

        }
    }

}
if (isset($_POST['user_question'], $_POST['user_category'], $_POST['user_mail'], $_POST['user_name'])) {
    $question = Table::newQuestion();
}

include 'views/question.php';

