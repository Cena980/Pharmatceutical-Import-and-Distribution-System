<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Home Page
        </title>
        <link rel="stylesheet" href="css/home.css">
    </head>
    <body>
        <div id="bar">
            <ul class="barr">
                <li>
                    <a href="home.php">Home</a>
                </li>
                <li><a href="sales/sales.php">Sales</a></li>
                <li><a href="drugs/drugs.php">Drug</a></li>
                <li><a href="employee/employee.php">Employee</a></li>
                <li><a href="Inventory/inventory.php">Inventory</a></li>
            </ul>
            <div class="barr">
                <form>
                    <input type="text" id="search" name="Search" style="width: 85%;" id="search">
                    <input type="submit" value="Search" style="width: 10%; text-align: center; height: 20px;" onclick="validation()">
                </form>
                <script>
                    a = document.getElementById("search");
                    function validation() {
                        if (a.value.length<1){
                            alert("Cannot search for empty string")
                        }
                        
                    }
                    
                    
                </script>
                <select >
                    <option>Persian</option>
                    <option>Pashto</option>
                    <option>English</option>
                </select>
            </div>
        </div>  
        
        <div id="main">
            <div id="top">
                <img src="cover.jpg" id="cover" alt="Cover">
                <div class="in">
                    <p class="desc">Improve your Health with us!</p>
                </div>
                <div class="in" id="under">
                    <p class="title">... Pharmaceuticals</p>
                </div>
            </div>
            <div id="mid">
                <div class="mid">
                    <p class="title">Products</p>
                    <div id="report">
                        <?php include 'php/drugreport.php';?>
                    </div>
                </div>
                <div class="mid">
                    <p class="title">Employee</p>
                    <?php include 'php/employeereport.php'; ?>
                </div>
                <div class="mid">
                    <p class="title">Companies</p>
                    <table class="data">
                        <tr>
                            <th class="info">Name</th>
                            <th class="info">Specialty</th>
                            <th class="info">Email</th>
                        </tr>
                        <tr>
                            <td class="info"></td>
                            <td class="info"></td>
                            <td class="info"></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div id="low">
                
            </div>
            <div id="bottom">
                <div class="bott">
                    <h3>Abdul Bashir Arsine</h3>

                </div>
                <div class="bott">
                    <h3>Ali Sina Nazari</h3>

                </div>
                <div class="bott">
                    <h3>...</h3>
                </div>
            </div>



        </div>
    </body>
</html>