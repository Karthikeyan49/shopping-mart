<?php
$user = "";
$category = "";
$item = "";
$value = 0;

$myJSON = json_encode($myObj);
if (!(isset($_COOKIE['prod_cache']))) {
  setcookie("prod_cache", json_encode($data), time() + (86400 * 30), "/");
}
?>

<nav class="navbar navbar-expand-lg ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">V-Mart</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link" href="#">Cart</a>
        <a class="nav-link" href="home.html">Log out</a>
      </div>
    </div>
  </div>
</nav>

<div id="memberModal" class="modal1">
  <div class="modal-content1">
    <span id="closeModal" class="close1">&times;</span>
    <h2>Add New Member</h2>
    <label for="memberName">Enter Member Name:</label>
    <input type="text" id="memberName" placeholder="Member Name">
    <button id="confirmAddMember" class="mem-btn">Add Member</button>
  </div>
</div>

<div class="container">
  <h1>Select Products</h1>
  <button id="addMember">+ Add Member</button>
  <table id="productTable">
    <thead>
      <tr>
        <th>Category</th>
        <th>Item Name</th>
        <th>User Name</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Nuts</td>
        <td>Badam</td>
        <td class="user-cell" data-user="User Name">
          <div class="box"><span class="minus">-</span><span class="value">0</span><span class="plus">+</span></div>
        </td>
      </tr>
      <tr>
        <td> </td>
        <td>Pista</td>
        <td class="user-cell" data-user="User Name">
          <div class="box"><span class="minus">-</span><span class="value">0</span><span class="plus">+</span></div>
        </td>
      </tr>

    </tbody>
  </table>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
     $(document).ready(function () {
    // Function to collect table data in the required JSON format
    function collectTableData() {
      const tableData = [];
      $('#productTable tbody tr').each(function () {
        const row = $(this);
        const category = row.find('td:nth-child(1)').text().trim();
        const itemName = row.find('td:nth-child(2)').text().trim();

        const userSubData = [];
        row.find('td.user-cell').each(function () {
          const cell = $(this);
          const userKey = cell.data('user'); // Extract 'data-user' value
          const userValue = cell.find('.value').text().trim(); // Extract cell value
          userSubData.push({
            [userKey]: userValue,
          });
        });

        tableData.push({
          category: category || " ", // Handle empty category
          product: itemName,
          userName: userSubData,
        });
      });

      return tableData;
    }

    // Event delegation for .plus and .minus spans
    $('#productTable').on('click', '.plus, .minus', function () {
      const span = $(this);
      const valueSpan = span.siblings('.value');
      let currentValue = parseInt(valueSpan.text(), 10);

      // Update the value based on whether it's a plus or minus span
      if (span.hasClass('plus')) {
        currentValue++;
      } else if (span.hasClass('minus') && currentValue > 0) {
        currentValue--;
      }

      // Collect table data and send to server
      const tableData = collectTableData();

      $.ajax({
        url: 'product/', // Replace with your server endpoint
        method: 'POST',
        contentType: 'application/json',
        data: JSON.stringify(tableData),
        success: function (response) {
          console.log('Table data sent successfully:', response);
        },
        error: function (error) {
          console.error('Error sending table data:', error);
        },
      });
    });
  });
  </script>
</div>
<div class="sub-btn">
  <button>Proceed</button>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="js/product.js"></script>



