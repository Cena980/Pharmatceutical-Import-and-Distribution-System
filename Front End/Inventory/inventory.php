<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Inventory Page
        </title>
        <link rel="stylesheet" href="../css/home.css">
    </head>
    <body>
        <div id="bar">
            <ul class="barr">
                <li>
                    <a href="home.html">Home</a>
                </li>
                <li><a href="../sales/sales.php">Sales</a></li>
                <li><a href="../company.php">Companies</a></li>
                <li><a href="../customer.php">Customers</a></li>
                <li><a href="inventory.php">Customers</a></li>
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
        <div id="over"><h1>Incentory</h1></div>
        <div id="report">
            <?php include '../php/inventoryreport.php';?>
        </div>
        <div id="buttons">
            <button><a href="deleteinventory.html">Delete</a> </button>
            <button><a href="updateinventory.html">Update</a> </button>
            <button><a href="insertinventory.html">Add</a> </button>
        </div>
            <div id="bottom">
                <div class="bott">
                    <h3>Something...</h3>
                    <h3>Something...</h3>
                    <h3>Something...</h3>
                </div>
                <div class="bott">
                    <h3>Something...</h3>
                    <h3>Something...</h3>
                    <h3>Something...</h3>
                </div>
                <div class="bott">
                    <h3>Something...</h3>
                    <h3>Something...</h3>

                </div>
            </div>



        </div>
    </body>
</html>