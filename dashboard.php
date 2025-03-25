<?php
  include("database.php");
  session_start();
  $sql_getProject="select * from projet";
  $result_projet=mysqli_query($conn,$sql_getProject);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard</title>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 text-white">
            <div class="p-4 border-b border-gray-800">
                <div class="flex items-center justify-between">
                    <span class="text-xl font-bold">Admin </span>
                </div>
            </div>

            <!-- Search Bar -->
            

            <nav class="mt-5 px-2">
                <!-- Main Navigation -->
                <div class="space-y-4">
                    <!-- Dashboard -->
                    <a href="#" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg bg-gray-800 text-white group transition-all duration-200 hover:bg-gray-700">
                        <svg class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Dashboard
                    </a>

                    <!-- Analytics Dropdown -->
                   

                    <!-- Projects -->
                    <a href="#" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white group transition-all duration-200">
                        <svg class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                        </svg>
                        Projects
                    </a>

                    <!-- Calendar -->
                   

                    <!-- Documents -->
                    
                </div>
            </nav>

            <!-- User Profile -->
            <div class="mt-auto p-4 border-t border-gray-800">
                <div class="flex items-center">
                    <img class="h-8 w-8 rounded-full" src="icons\user_icon.svg" alt="">
                    <div class="ml-3">
                        <p class="text-sm font-medium text-white"><?php echo $_SESSION["name"];?></p>
                        <!-- <p class="text-xs text-gray-400">View profile</p> -->
                    </div>
                </div>
               
            </div>
            <a class="ml-4 mt-4  bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 cursor-pointer " href="logout.php" >Logout</a>
        </aside>

        <!-- Main Content -->
                  <div  class="flex-1 p-6 bg-gray-100">
                  <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
                  <div>
                    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="get"> 
                    <h3 class="text-xl mb-5 text-gray-700">Veuillez sélectionner un projet :</h3>
                    <div class="inline-block relative w-64 ">
                    <select name="projet" class="hover:cursor-pointer block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                      <?php
                      
                      while($row = mysqli_fetch_assoc($result_projet)){
                        echo "<option value='" . $row['id'] . "'>" . $row['pr_name'] . "</option>";
                    }
                      ?>
                      
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                      <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                                      </div>
                    <input type="submit" name="selectSubmit" value="Envoyer" class="bg-blue-500 hover:bg-blue-700 cursor-pointer text-white font-bold py-2 px-4 rounded">
                    </form>
                    
                      
                  </div>
                  <h2 id="projet_name" class="my-5 text-2xl font-medium text-gray-700"></h2>
                  <form action="save.php" method="get">
                  <div class="shadow-lg rounded-lg overflow-hidden mx-4 md:mx-10" id="table_employee"></div>
                  <div id="submit_button"></div>
                  <input name="name_projet" id="input_projet_name" style="display: none;">
                  </form>
                  
                  
                  </div>
                 

        
        </main>
    </div>
    <script src="dashboard.js"></script>
</body>
</html>
<?php
       $employees=[];
    if(isset($_GET["selectSubmit"])){
        $sql_projectName="SELECT pr_name,last_update from projet where id=".$_GET['projet'];
        $result_name=mysqli_query($conn,$sql_projectName);
        $row_name=mysqli_fetch_assoc($result_name);
        $case= $row_name['last_update']==$_SESSION['date']?false:true;
        if($case){
            $sql="SELECT e.id,e.full_name,e.phone   from affectations a join employee e  on a.id_empl=e.id  WHERE id_projet=".$_GET['projet'];//
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result)){
              array_push($employees, array("id"=>$row['id'],"full_name" => $row['full_name'], "phone" => $row['phone']));
            }
           
            
            echo "<script>table_employees(" . json_encode($employees) . ", '" . addslashes($row_name['pr_name']) . "',$case);</script>";
        }else{
            $sql="SELECT e.full_name,e.phone,h.présence from historique h JOIN employee e on h.id_empl=e.id  WHERE id_projet=".$_GET['projet'];
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result)){
                array_push($employees, array("full_name"=>$row['full_name'],"phone" => $row['phone'], "présence" => $row['présence']));
              }
              echo "<script>table_historique(" . json_encode($employees) . ", '" . addslashes($row_name['pr_name']) . "');</script>";
        }
      $employees=[];
       
    }


 