var opened = false;
var numItems = -1;
var numRows = 0;

function addItem(){
    if(opened == false){
    //  var container = document.getElementById("optionFront");
        var container = document.createElement("div");
        container.setAttribute("id","optionFront");
        var body = document.getElementById("body");
        body.appendChild(container);
        var newItem = document.createElement("div"); 
        newItem.setAttribute("id","addItemOption");
        newItem.setAttribute("class","shadow");
        newItem.innerHTML = "<div class='d-flex justify-content-between shadow mw-100' id='optionHeader'>" +
                            "<span id='optionHeaderText'> Add an Item </span>" +
                            "<button type='button' onclick='closeOption()' id='closeAdd' class='btn btn-danger'> X </button>" +
                            "</div>" +
                            "<form action='' id='addForm'>" +
                            "<label for='itemName'>" +
                            "Item Name" +
                            "</label>" +
                            "<input type ='text' id='addName'>" +
                            "<br>" +
                            "<label for='itemPrice'>" +
                            "Item Price" +
                            "</label>" +
                            "<input type = 'number' id='addPrice'>" +
                            "<br>" +
                            "<label for='itemDesc'>" +
                            "Item Description" +
                            "</label>" +
                            "<input type='text' id='addDesc'>" +
                            "<br>" +
                            "<label for='itemPic'>" +
                            "Item Picture" +
                            "</label>" +
                            "<input type='text' id='addPic'>" +
                            "<br>" +
                            "<label for='itemStock'>" +
                            "Item Stock" +
                            "</label>" +
                            "<input type='number' id='addStock'>" +
                            "<br>" +
                            "<button type='button' onclick='confirmAdd()' id='confirmAddBtn'> Add </button>" +
                            "</form>";
        container.appendChild(newItem);
        opened = true;
    }
}

function closeOption(newItem){
    var temp = document.getElementById("optionFront");
    temp.parentNode.removeChild(temp);
    opened = false;
}

function confirmAdd(){
    numItems++;
    console.log("Item Added");
    var container = document.getElementById("storeFront");
    var addedItem = document.createElement("div");
    if(numItems == 0 || numItems%4 == 0){
        var row = document.createElement("div");
        console.log("Created new row");
        numRows++;
        row.setAttribute("id", "row_" + numRows);
        row.setAttribute("class","row");
        container.appendChild(row);
    }
    var currRow = document.getElementById("row_" + numRows);
    console.log("Created row_" + numRows);
    addedItem.setAttribute("id","item_" + numItems);
    addedItem.setAttribute("class", "p-3 col storeItem");
    addedItem.innerHTML = "<h2 class='itemHeader'>" + document.getElementById("addName").value + "</h2>" +
                          "<br>" +
                          "<iframe src= '" + document.getElementById("addPic").value + "' class='itemPic'>" + "</iframe>" + 
                          "<br>" +
                          "<p class = 'itemDesc'>" + document.getElementById("addDesc").value + "</p>" +
                          "<br>" +
                          "<span class='itemStock'>" + "Stock:" + document.getElementById("addStock").value + "</span>" +
                          "<br>" +
                          "<span class='itemPrice'>" + "Price:" + "P" + document.getElementById("addPrice").value + "</span>" +
                          "<br>" +
                          "<button type='button' onclick='updateItem()' id='updateItemBtn'> Update </button>";
    var deleteBtn = document.createElement("button");
    deleteBtn.setAttribute("id","deleteItemBtn");
    deleteBtn.setAttribute("onclick","deleteItem('item_' + numItems)");
    deleteBtn.innerHTML = "Delete" +
                          "</button>";
    addedItem.appendChild(deleteBtn);
    currRow.appendChild(addedItem);
    document.getElementById("addForm").reset();
}

function updateItem(){

}

function deleteItem(itemId){
    console.log("Deleting element with id:" + itemId);
    var temp = document.getElementById(itemId);
    temp.parentNode.removeChild(temp);
    numItems--;
    if(numItems == 0 || numItems%4 == 0){
        numRows--;
    }
}