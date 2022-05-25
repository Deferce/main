<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/normalize.css">
    <title>Product Add</title>
</head>

<body>
    <section class="topSection">
        <div>
            <h2>Product Add</h2>
        </div>
        <div>
            <input class="formz" form="addForm" type="submit" value="Save" onclick="return(validator())">
            <input type="button" value="Cancel">
        </div>
    </section>

    <section>

        <div class="productForm">
            <form id="addForm" class="formAdd" action="./php/formProcessor.php" method="POST">

                <label for="sku">SKU
                    <div id="errorPOP1"></div>
                    <input type="text" name="sku" id="sku" placeholder="SKU">
                </label>

                <label for="name">Name
                    <div id="errorPOP"></div>
                    <input type="text" name="name" id="name" placeholder="Your name">
                </label>


                <label for="price">Price ($)
                    <div id="errorPOP2"></div>
                    <input type="number" name="price" step="any" id="price" placeholder="Price">
                </label>


                <label for="typeSwitcher">Product <div id="errorPOP3"></div>
                    <div class="selectContainer">
                </label>
                <select autocomplete="off" class="selector" name="typeSwitcher" id="typeSwitcher">
                    <option> </option>
                    <option value="DVD" name="DVD" id="DVD">DVD</option>
                    <option value="BOOK" name="BOOK">BOOK</option>
                    <option value="FURNITURE" name="FURNITURE">FURNITURE</option>
                </select>
        </div>

        </form>
        </div>

    </section>
    <footer>

        <h2>Scandiweb Test assignment</h2>


    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./js/main.js"></script>
</body>

</html>