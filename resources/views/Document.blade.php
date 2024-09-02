<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <form class="form-inline" action="">
    <h2>Header Main</h2>
    <div class="form-group">
      <label class="sr-only" for="email">Document No:</label>
      <input type="text" class="form-control" id="document_no" placeholder="Document No"  name="documet_no">
    </div>
    <div class="form-group">
        <label class="sr-only" for="name">Customer Name:</label>
        <input type="text" class="form-control" id="customer_name" placeholder="Customer Name"  name="customer_name">
      </div>

      <div class="form-group">
        <label class="sr-only" for="email">Customer Email:</label>
        <input type="email" class="form-control" id="customer_email" placeholder="Customer Email"  name="customer_email">
      </div>

    <div class="form-group">
      <label class="sr-only" for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>


  <h2>Add Document</h2>

  <table class="table" id="detailSection">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Item Name</th>
        <th scope="col">Qty</th>
        <th scope="col">Store</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td><input type="text" class="form-control" name="serial_no[]"></td>
        <td><input type="text" class="form-control" name="item_name[]"></td>
        <td><input type="text" class="form-control" name="quantity[]"></td>
        <td>
            <button type="button" class="btn btn-success addRow">Add New</button>&nbsp; 
            <button type="button" class="btn btn-warning deleteRow">Delete</button>
        </td>
    </tr>
      
    </tbody>
  </table>


<button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
<script>
    function addRow(){
        var html='';
        html +='<tr>';
        html +='<th scope="row">1</th>';
        html +='<td><input type="text" class="form-control" name="serial_no[]"></td>';
        html +='<td><input type="text" class="form-control" name="item_name[]"></td>';
        html +='<td><input type="text" class="form-control" name="quantity[]"></td>';
        html +='<td>';
        html +='<button type="button" class="btn btn-success addRow" onClick="addRow()">Add New</button>&nbsp;';
        html +='<button type="button" class="btn btn-warning deleteRow" onClick="deleteRow(this)">Delete</button>';
        html +='</td>';
        html +='</tr>';
        $('#detailSection').append(html);
    }
    function deleteRow(row){
        console.log(row.parent());
    }
$(function(){
    
    $('.addRow').click(function(){
        addRow();

    })
    $('.deleteRow').click(function(){
        if($('#detailSection').children.length>1){
            deleteRow();
        }else{
            alert('can not be deleted');
        }
        
    })
    
})

</script>