<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf_token" content="{{ csrf_token() }}" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

  <div class="container">
    <form class="form-inline" action="javascript:void(0)" id="customer_form">
      <h2>Header Main</h2>
      <div class="form-group">
        <label class="sr-only" for="doc_no">Document No:</label>
        <input type="text" class="form-control" id="doc_no" value="{{$doc_no}}" placeholder="Document No" name="doc_no" readonly>
      </div>
      <div class="form-group">
        <label class="sr-only" for="customer_name">Customer Name:</label>
        <input type="text" class="form-control" id="customer_name" placeholder="Customer Name" name="customer_name" required>
      </div>
      <div class="form-group">
        <label class="sr-only" for="customer_email">Customer Email:</label>
        <input type="email" class="form-control" id="customer_email" placeholder="Customer Email" name="customer_email" required>
      </div>
      <div class="form-group">
        <label class="sr-only" for="doc_date">Date:</label>
        <input type="date" class="form-control" id="doc_date" name="doc_date" required>
      </div>

      <h2>Add Document</h2>
      <table class="table" id="itemTable">
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
            {{-- <td><input type="text" class="form-control" name="item[0][name]"></td> --}}
            <td><select class="form-control" name="item[0][name]">
                @foreach($item as $itm)
                <option value="{{$itm->id}}">{{$itm->name}}</option>
                @endforeach
              </select>
            </td>
            <td><input type="text" class="form-control" name="item[0][quantity]" id="itemQty_0" readonly></td>
            <td><input type="hidden" class="form-control storeClass" name="item[0][store]">
              <button type="button" class="btn btn-primary store_info" item_id="0" data-bs-toggle="modal" data-bs-target="#myModal">
                Store
              </button>
            </td>
            <td>
              <button type="button" class="btn btn-success addRow">+</button>&nbsp;
              <button type="button" class="btn btn-warning deleteRow">-</button>
            </td>
          </tr>
        </tbody>
      </table>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
  </div>
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Store List</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <table class="table" id="itemTable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Store Name</th>
                <th scope="col">Qty</th>
              </tr>
            </thead>
            <tbody id="storeTable"></tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info updateQty">Update Quantity</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <table class="table" id="docTable">
    <thead>
      <tr>
        <th scope="col">Doc No</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Date</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody id="doccTable"></tbody>
  </table>
  <script>
    function addRow() {
      var itemList = '<?php echo json_encode($item->toArray()) ?>';
      var jsonItemList = $.parseJSON(itemList)
      var rowCount = $('#itemTable tbody tr').length;
      var html = `
            <tr>
                <th scope="row">${rowCount + 1}</th>
                <td>`;
      html += `<select class="form-control" name="item[${rowCount}][name]">`
      $.each(jsonItemList, function(k, v) {
        html += `<option value="` + k.id + `">` + v.name + `</option>`
      });
      html += `</select></td>
                <td><input type="text" class="form-control" name="item[${rowCount}][quantity]" id="itemQty_${rowCount}" readonly></td>
                <td><input type="hidden" class="form-control storeClass" name="item[${rowCount}][store]"><button type="button" class="btn btn-primary store_info" item_id="${rowCount}" data-bs-toggle="modal" data-bs-target="#myModal">
                Store
              </button>
          </td>
                <td>
                    <button type="button" class="btn btn-success addRow">+</button>&nbsp;
                    <button type="button" class="btn btn-warning deleteRow">-</button>
                </td>
            </tr>
        `;
      $('#itemTable tbody').append(html);
    }

    function deleteRow(button) {
      if ($('#itemTable tbody tr').length > 1) {
        $(button).closest('tr').remove();
        // Update row numbers
        $('#itemTable tbody tr').each(function(index) {
          $(this).find('th').text(index + 1);
          // Update input names
          $(this).find('input').each(function() {
            var name = $(this).attr('name').replace(/\[\d+\]/, `[${index}]`);
            $(this).attr('name', name);
          });
        });
      } else {
        alert('Cannot delete the last row.');
      }
    }

    $(document).ready(function() {
      getCustomerList();
      $(document).on('click', '.addRow', function() {
        addRow();
      });

      $(document).on('click', '.deleteRow', function() {
        deleteRow(this);
      });

      $('#customer_form').submit(function(event) {
        event.preventDefault();

        var formData = $(this).serializeArray();
        var serializedData = {};

        $.each(formData, function() {
          var name = this.name;
          var value = this.value;

          var keys = name.match(/([^[\]]+)/g);
          keys.reduce(function(obj, key, i) {
            if (i === keys.length - 1) {
              obj[key] = value;
            } else {
              if (!obj[key]) obj[key] = {};
            }
            return obj[key];
          }, serializedData);
        });

        $.ajax({
          type: "POST",
          url: "saveDoc",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
          },
          contentType: 'application/json',
          data: JSON.stringify(serializedData),
          success: function(response) {
            console.log(response);
            localStorage.clear();
            alert(response.message);
            getCustomerList();  
          },
          error: function(jqXHR, textStatus, errorMessage) {
            console.error(errorMessage);
            alert(errorMessage);
          }
        });
      });
      $(document).on('click', '.store_info', function() {
        var item_id = $(this).attr('item_id');
        getStoreInfo(item_id);
        $('.updateQty').attr('item_id', item_id);
      });
    });

    function getStoreInfo(item_id) {
      $.ajax({
        type: "GET",
        url: "getStoreList",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        },
        contentType: 'application/json',
        data: {},
        success: function(response) {
          if (response.code) {
            var html1;
            var n = 1;
            $.each(response.data, function(i, v) {

              html1 += `<tr>
                                    <td>` + n + `</td>
                                    <td>` + v.name + `</td>
                                    <td><input type="number" class="form-control store" name="storeQty_` + item_id + `_` + n + `"  id="storeQty_` + item_id + `_` + n + `" /></td>
                                  </tr>`;
              n++;
            });
            $('#storeTable').html(html1);
            loadModalData(item_id);
          } else {
            $('#storeTable').html('');
          }

        },
        error: function(jqXHR, textStatus, errorMessage) {
          console.error(errorMessage);
        }
      });


    }

    function getCustomerList() {
      $.ajax({
        type: "GET",
        url: "ListDoc",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        },
        contentType: 'application/json',
        data: {},
        success: function(response) {
          if (response) {
            var html2;
            var n = 1;
            $.each(response.data, function(i, v) {

              html2 += `<tr>
                            <td>` + v.doc_no + `</td>
                            <td>` + v.name + `</td>
                            <td>` + v.email + `</td>
                            <td>` + v.doc_date + `</td>
                            <td><button type="button" class="btn btn-warning">Edit/Delete</button></td>
                          </tr>`;
            });
            $('#doccTable').html(html2);
          } else {
            $('#doccTable').html('');
          }

        },
        error: function(jqXHR, textStatus, errorMessage) {
          console.error(errorMessage);
        }
      });


    }

    $(document).on('click', '.updateQty', function() {
      var item_id = $(this).attr('item_id');
      var sum = qtySum(item_id);
      $('#itemQty_' + item_id).val(sum);
      $('#myModal').modal('hide');
    });

    function loadModalData(item_id) {
      var storedData = localStorage.getItem('itemData_' + item_id);
      if (storedData) {
        var data = JSON.parse(storedData);
        $.each(data, function(index, value) {
          $('input[name="' + index + '"]').val(value);
        });
      }
    }

    function qtySum(item_id) {
      let sum = 0;
      let n = 1;
      var itemData = {};
      $('.store').each(function() {
        let value = parseInt($(this).val());
        var id = $(this).attr('id');

        if (!isNaN(value)) {
          sum += value;
          itemData[id] = value;
        }
      });
      localStorage.removeItem('itemData_' + item_id);
      localStorage.setItem('itemData_' + item_id, JSON.stringify(itemData));
      return sum;
    }
  </script>

</body>

</html>