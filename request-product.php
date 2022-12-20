<?php

include 'includes/session.php';

if (isset($_POST['request'])) {

    if(!isset($_SESSION['user'])){
        $_SESSION['error'] = "Please login first";
        header('location: request.php');
    } else {
        $product_name = $_POST['product_name'];
        $description = $_POST['product_details'];
        $reference_link= filter_var($_POST['reference_link'], FILTER_SANITIZE_URL);

        $_SESSION['product_name'] = $product_name;
        $_SESSION['product_details'] = $description;
        $_SESSION['reference_link'] = $reference_link;

        if (!filter_var($reference_link, FILTER_VALIDATE_URL)) {
            $_SESSION['error'] = "Enter URL is not a valid URL";
            header('location: request.php');
        } else {
            if (strlen($reference_link) > 120) {
                $_SESSION['error'] = "Link is growing big! Please try to use link shortener";
                header('location: request.php');
            } else {
                $now = date('Y-m-d');

                $conn = $pdo->open();

                $id = $_SESSION['user'];

                try {
                    $stmt = $conn->prepare("INSERT INTO requests (user_id, product_name, product_details, reference_link, created_on) VALUES (:id, :product_name, :description, :reference_link, :now)");
                    $stmt->execute(['id' => $id, 'product_name' => $product_name, 'description' => $description, 'reference_link' => $reference_link, 'now' => $now]);
                } catch (PDOException $e) {
                    $_SESSION['error'] = $e->getMessage();
                    header('location: request.php');
                }

                $pdo->close();


                unset($_SESSION['product_name']);
                unset($_SESSION['product_details']);
                unset($_SESSION['reference_link']);

                $_SESSION['confirm_message'] = true;
                header('location: request.php');
            }
        }
    }
} else {
    $_SESSION['error'] = 'Form cannot be empty';
    header('location: request.php');
}