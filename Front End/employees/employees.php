<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Employee Page
        </title>
        <link rel="stylesheet" href="../css/home.css">
    </head>
    <body>
        <div id="bar">
            <ul class="barr">
            <li>
                    <a href="../home.php">Home</a>
                </li>
                <li><a href="../sales/sales.php">Sales</a></li>
                <li><a href="../drugs/drugs.php">Drugs</a></li>
                <li><a href="../employees/employees.php">Employee</a></li>
                <li><a href="../Inventory/inventory.php">Inventory</a></li>
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
        <div id="over"><h1>Employee records</h1></div>
        <div id="report">
            <?php include '../php/employeereport.php';?>
        </div>
        <div id="buttons">
            <button><a href="Deleteemployee.html">Delete</a> </button>
            <button><a href="updateemployee.html">Update</a> </button>
            <button><a href="Insertemployee.html">Add</a> </button>
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



        </div>
    </body>
</html>