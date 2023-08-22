<!DOCTYPE html>
<html>
<head>
    <title>Caesar Cipher Result</title>
    <!-- Include Bootstrap CSS -->
    <link rel="icon" type="image/x-icon" href="logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f8f9fa; /* Set background color */
        }

        .custom-border {
            border: 1px solid #ccc; /* Add border */
            border-radius: 10px; /* Add border radius */
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Add box shadow */
        }
    </style></head>
<body>
    
<div class="custom-border">

    <div class="container mt-5">
    <!-- <div class="border p-4 rounded" style="border-width: 1px;"> -->
        <h2 class="mb-4">Caesar Cipher Result</h2>
        <?php
        if (isset($_POST['submit'])) {
            $text = $_POST['text'];
            $shift = (int)$_POST['shift'];
            $action = $_POST['action'];

            function encrypt($text, $shift) {
                $encryptedText = "";

                for ($i = 0; $i < strlen($text); $i++) {
                    $char = $text[$i];

                    if ($char >= 'A' && $char <= 'Z') {
                        $encryptedChar = chr(((ord($char) - 65 + $shift) % 26) + 65);
                    } elseif ($char >= 'a' && $char <= 'z') {
                        $encryptedChar = chr(((ord($char) - 97 + $shift) % 26) + 97);
                    } else {
                        $encryptedChar = $char; // Keep non-alphabetic characters unchanged
                    }

                    $encryptedText .= $encryptedChar;
                }

                return $encryptedText;
            }

            function decrypt($encryptedText, $shift) {
                return encrypt($encryptedText, 26 - $shift); // Decrypting is the same as encrypting with opposite shift
            }

            if ($action === 'encrypt') {
                $result = encrypt($text, $shift);
                $actionLabel = 'Encrypted';
            } elseif ($action === 'decrypt') {
                $result = decrypt($text, $shift);
                $actionLabel = 'Decrypted';
            }
        }
        ?>
        <h4><?php echo $actionLabel; ?> Text: </h4>
        <p class="lead"><b><?php echo isset($result) ? $result : ''; ?></b></p>
        <a href="index.html" class="btn btn-primary">Back to Cipher</a>
    </div>
    </div>

    <!-- Include Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<style>
    body {
        background-image: url('https://wallpaperaccess.com/full/8642986.gif');        
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
</style>