<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Management List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        #items-container {
            max-width: 600px;
            margin: auto;
        }

        #addItemForm {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <h1>Item Management List</h1>

    <div id="items-container">
        <h2>Item List</h2>
        <ul id="itemList"></ul>
    </div>

    <div id="addItemForm">
        <h2>Add New Items</h2>
        <form id="addItemForm">
            <label for="itemName">Item Name:</label>
            <input type="text" id="itemName" placeholder="Enter item name" required>
            <button type="submit" class="btn btn-primary">Add Item</button>
        </form>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        function fetchItem() { 
            const timestamp = new Date().getTime(); 
            fetch(`http://localhost/ventures/task03/api.php?t=${timestamp}`) 
                .then(response => response.json()) 
                .then(data => {
                    const itemList = document.getElementById('itemList');
                    itemList.innerHTML = '';

                    data.forEach(item => {
                        const listItem = document.createElement('li');
                        listItem.textContent = item.name;
                        itemList.appendChild(listItem);
                    });
                })
                .catch(error => console.error('Error fetching items:', error));
        }
        fetchItem();



        document.getElementById('addItemForm').addEventListener('submit', function (event) {
            event.preventDefault();

            const itemName = document.getElementById('itemName').value;

            fetch('http://localhost/ventures/task03/api.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    name: itemName,
                }),
            })
                .then(response => response.json())  
                .then(data => {  
                    console.log('New item added:', data);

                    const updatedItems = data; 
                    const itemList = document.getElementById('itemList'); 
                    itemList.innerHTML = '';  
                    updatedItems.forEach(item => {   
                        const listItem = document.createElement('li');
                        listItem.textContent = item.name;
                        itemList.appendChild(listItem);   
                    });
                })
                .catch(error => console.error('Error adding item:', error));
        });
    });
</script>
    </body>
</html>
