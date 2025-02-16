<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Update Page
        </title>
        <link rel="stylesheet" href="../css/home.css">
    </head>
    <body>
        <?php  include '../php/header2.php' ?>
        <div id="over"><h1>Update</h1></div>
        <form name="sale" action="../php/updatesales.php" method="post">
            <table class="table table-success">
             <thead>
             <tr>
                 <th>Sale ID</th>
                 <th>Inventory ID</th>
                 <th>Date</th>
                 <th>Quantity</th>
                 <th>Discount</th>
                 <th>Price</th>
                 <th>Employee Cut ID</th>
                 <th>Customer ID</th>
                 <th>Total</th>
                 
                 <th>Note</th>
                 
             </tr>
             </thead>
             <tbody>
                 <tr>
                     <td><input type="number" name="Sales_ID"s id="Sales_ID" autocomplete="off"></td>
                     <td><input type="number" name="Inventory_ID" id="Inventory_ID" autocomplete="off"></td>
                     <td><input type="date" name="Sale_Date" id="Sale_Date" autocomplete="off"></td>
                     <td><input type="number" name="Quantity" id="Quantity" autocomplete="off"></td>
                     <td><input type="number" name="Discount" id="Discount" autocomplete="off"></td>
                     <td><input type="number" name="Price" id="Price" autocomplete="off"></td>
                     <td><input type="number" name="Cut_ID" id="Cut_ID" autocomplete="off"></td>
                     <td><input type="number" name="Customer_ID" id="Customer_ID" autocomplete="off"></td>
                     <td><input type="number" name="Total_Price" id="Total_Price" autocomplete="off"></td>
                     
                     <td><input type="number" name="Note" id="Note" autocomplete="off"></td>
                     
                 </tr>
         
                 <tr>
                     <td id="nsid"></td>
                     <td id="ndid"></td>
                     <td id="nde"></td>
                     <td id="nqy"></td>
                     <td id="ndt"></td>
                     <td id="npr"></td>
                     <td id="nec"></td>
                     <td id="nlid"></td>
                     <td id="ntl"></td>
                     
                 </tr>
             <tr>
                 <td id="noty" class="table"></td>
             </tr>
             </tbody>
            </table>
            <div class="multi-button">
                <button class="btn btn-update" onclick="updateSales()" >Update</button>
                <button class="btn btn-delete" onclick="deleteSales()" >Delete</button> 
            </div>
            </div>
            <?php  include '../php/footer.php' ?>
        <script>
            window.onload = function () {
                const urlParams = new URLSearchParams(window.location.search);
        
                // Populate input fields with values from URL parameters
                document.getElementById('Sales_ID').value = urlParams.get('Sales_ID') || '';
                document.getElementById('Inventory_ID').value = urlParams.get('Inventory_ID') || '';
                document.getElementById('Sale_Date').value = urlParams.get('Sale_Date') || '';
                document.getElementById('Quantity').value = urlParams.get('Quantity') || '';
                document.getElementById('Discount').value = urlParams.get('Discount') || '';
                document.getElementById('Price').value = urlParams.get('Price') || '';
                document.getElementById('Cut_ID').value = urlParams.get('Cut_ID') || '';
                document.getElementById('Customer_ID').value = urlParams.get('Customer_ID') || '';
                document.getElementById('Total_Price').value = urlParams.get('Total_Price') || '';
                document.getElementById('Note').value = urlParams.get('Note') || '';
            };
            function validate(){

        
                let valid = true;
                let sale = document.getElementById("sid").value;
        
                if(!/^\d+$/.test(sale) || sale === ""){
                        document.getElementById("nsid").innerHTML = "Please enter a valid Drug ID.";
                        valid = false;
                    } else {
        
                        document.getElementById("nsid").innerHTML = "";
        
                    }
        
                let drug = document.getElementById("did");
        
                if(!/^\d+$/.test(drug) || drug === ""){
                        document.getElementById("ndid").innerHTML = "Please enter a valid Drug ID.";
                        valid = false;
                    } else {
                        document.getElementById("ndid").innerHTML = "";
                    }
        
            }
            const form = document.forms['sale'];
            function updateSales(){
                var message = document.getElementById("noty");
                message.style.color = "green";
                message.innerHTML = "Your record has been saved.";
                form.action="../php/updatesales.php";
                form.method="post";
                form.submit();
            }
            function deleteSales(){
                form.action="../php/deletesales.php";
                form.method="post";
                form.submit();
            }
            </script>
    </body>
</html>