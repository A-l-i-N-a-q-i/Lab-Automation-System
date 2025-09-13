<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "connection.php";

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    if ($password !== $confirmpassword) {
        echo "<script>alert('Passwords do not match'); window.open('signup.php', '_self');</script>";
    } else {
        $query = "INSERT INTO signup VALUES ('', '$username', '$email', '$password', DEFAULT, NOW())";
        if (mysqli_query($conn, $query)) {
            echo "<script> window.open('./index.php', '_self');</script>";
        } else {
            echo "<script>alert('Registration failed');</script>";
        }
    }
}

if (isset($_POST['feedbackregister'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $query = "INSERT INTO feedback (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
    if (mysqli_query($conn, $query)) {
        echo "<script>window.open('feedback.php', '_self');</script>";
    } else {
        echo "<script>alert('Failed to submit feedback');</script>";
    }
}

if (isset($_POST['login'])) {
    $input = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM signup WHERE (Username='$input' OR Email='$input') AND Password='$password'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $role = $user['role'];

        if ($role === "Producer") {
            $_SESSION['user'] = $user['Username'];
            $_SESSION['userid'] = $user['Id'];
            echo "<script>window.open('./', '_self');</script>";
        } elseif ($role === "admin") {
            $_SESSION['admin'] = $user['Username'];
            $_SESSION['adminid'] = $user['Id'];
            echo "<script>window.open('./admin/dashboard.php', '_self');</script>";
        } elseif ($role === "tester") {
            $_SESSION['tester'] = $user['Username'];
            $_SESSION['testerid'] = $user['Id'];
            echo "<script>window.open('./tester/dashboard.php', '_self');</script>";
        }
    } else {
        echo "<script>alert('Invalid credentials'); window.open('./login.php', '_self');</script>";
    }
}

if (isset($_POST['add_product'])) {
    $category = $_POST['category'];
    $subcategory = $_POST['subcategory'];
    $description = $_POST['description'];
    $image = $_POST['image'];

    $query = "INSERT INTO products (category, subcategory, description, image, created_at) 
              VALUES ('$category', '$subcategory', '$description', '$image', NOW())";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Product added'); window.location.href = 'addproducts.php';</script>";
    } else {
        echo "<script>alert('Failed to add product'); window.location.href = 'addproducts.php';</script>";
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['update'])) {
    $id = $_POST['product_id'];
    $name = $_POST['product_name'];
    $category = $_POST['category'];
    $fault = $_POST['fault'];
    $date = $_POST['date'];

    $stmt = $conn->prepare("UPDATE product SET `Product Name`=?, `Category`=?, `Fault`=?, `Date`=? WHERE `Product ID`=?");
    $stmt->bind_param("sssss", $name, $category, $fault, $date, $id);
    $stmt->execute();
    $stmt->close();
}

if (isset($_POST['addproduct'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $category = $_POST['category'];
    $details = $_POST['fault'];

    $query = "INSERT INTO product (`Product ID`, `Product Name`, `Category`, `details`, `status`, `date`) 
              VALUES ('$product_id', '$product_name', '$category', '$details', DEFAULT, NOW())";
    if (!mysqli_query($conn, $query)) {
        die("MySQL Error: " . mysqli_error($conn));
    }
    header("Location: fault-product.php");
    exit();
}

$products = [];
$sql_products = "SELECT id, `Product Name`, details, Category, date FROM product";
$result_products = $conn->query($sql_products);
if ($result_products) {
    while ($row = $result_products->fetch_assoc()) {
        $products[] = [
            'id' => $row['id'],
            'name' => $row['Product Name'],
            'description' => $row['details'],
            'category' => $row['Category'],
            'date' => $row['date'],
        ];
    }
} else {
    echo "Query error (products): " . $conn->error;
}

$testers = [];
$sql_testers = "SELECT Id AS id, Username AS name, Email AS email, role FROM signup WHERE role = 'tester'";
$result_testers = $conn->query($sql_testers);
if ($result_testers) {
    while ($row = $result_testers->fetch_assoc()) {
        $testers[] = [
            'id' => $row['id'],
            'name' => $row['name'],
            'email' => $row['email'],
            'role' => $row['role']
        ];
    }
} else {
    echo "Query error (testers): " . $conn->error;
}

$manufacturers = [];
$sql_manufacturers = "SELECT Id AS id, Username AS name, Email AS email, role FROM signup WHERE role = 'Producer'";
$result_manufacturers = $conn->query($sql_manufacturers);
if ($result_manufacturers) {
    while ($row = $result_manufacturers->fetch_assoc()) {
        $manufacturers[] = [
            'id' => $row['id'],
            'name' => $row['name'],
            'email' => $row['email'],
            'role' => $row['role']
        ];
    }
} else {
    echo "Query error (manufacturers): " . $conn->error;
}

if (isset($_GET['proid'])) {
    $productid = $_GET['proid'];
    $query = mysqli_query($conn, "UPDATE product SET status='inprocess' WHERE id='$productid'");
    if ($query) {
        header("location: productdetails.php");
    }
}

if (isset($_GET['delete'])) {
    $productid = $_GET['delete'];
    $query = mysqli_query($conn, "DELETE FROM product WHERE id='$productid'");
    if ($query) {
        header("location: remanufacter.php");
    }
}

if (isset($_GET['approve'])) {
    $productid = $_GET['approve'];
    $query = mysqli_query($conn, "UPDATE product SET status='Approved' WHERE id='$productid'");
    if ($query) {
        header("location: ./tester/listofproducts.php");
    }
}

$approved = 0;
$rejected = 0;
$inprocess = 0;
$fresh = 0;

$status_query = "SELECT status, COUNT(*) as total FROM product GROUP BY status";
$status_result = mysqli_query($conn, $status_query);
if ($status_result) {
    while ($row = mysqli_fetch_assoc($status_result)) {
        $status = trim($row['status']);
        if ($status === 'Approved') {
            $approved = $row['total'];
        } elseif ($status === 'Rejected') {
            $rejected = $row['total'];
        } elseif ($status === 'inprocess') {
            $inprocess = $row['total'];
        } elseif ($status === 'Fresh') {
            $fresh = $row['total'];
        }
    }
}
?>