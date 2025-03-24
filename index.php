<?php
    include("database.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/13843fc7c8.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>login</title>

</head>

<body>
    <div class="min-h-screen bg-gray-100 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Connectez-vous à votre compte
            </h2>

        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <form class="space-y-6" id="form" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">
                            Nom et prénom
                        </label>
                        <div class="mt-1">
                            <input id="nom" name="name" type="text" autocomplete="name"
                                class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                placeholder="Entrez votre nom complet">
                            <span id="invalid_name" class="text-sm text-red-500"></span>
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">
                            Mot de passe
                        </label>
                        <div class="mt-1">
                            <input id="password" name="password" type="password" autocomplete="current-password"
                                class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                placeholder="Entrez votre mot de passe">
                            <span id="invalid_password" class="text-sm text-red-500"></span>
                        </div>
                    </div>



                    <div>
                        <input type="submit" name="SubmitBtn" value="Se connecter"
                            class="hover:cursor-pointer group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    </div>
                </form>

                <script src="form.js"></script>



            </div>
        </div>
    </div>
</body>

</html>
<?php 
    // var_dump($_POST);
    $incorrect_name=true;
        if(isset($_POST["name"]) && isset($_POST["password"])){

       
        $name = trim($_POST["name"]); 
        $password=$_POST["password"];

        if(!empty($name) && !empty($password)){
            // get the names and password from db
            $sql="SELECT name,password FROM chef";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result)){
                if($name==$row["name"]){
                    $incorrect_name=false;
                    if($password==$row["password"]){
                        header("location: dashboard.php");
                    }else{
                        echo "<script>incorrectPassword()</script>";
                    }
                }
            }
            if($incorrect_name){
                    echo"<script>incorrectName()</script>";
            }
            

        }
    }

?>