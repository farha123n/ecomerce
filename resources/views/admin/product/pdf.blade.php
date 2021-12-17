<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>All Products</h2>

<table>
  <tr>
    <th>SL.</th>
    <th align="center">Category</th>
    <th align="center">Image</th>
    <th>Product Name</th>
  </tr>
  @php $counter = 1; @endphp
  @foreach($allProducts as $data)
    <tr>
      <td>{{ $counter }}</td>
      <td style="text-align: center;">{{ $data->getCategory->category_name }}</td>
      <td style="text-align: center;">
        <img src="{{ public_path('uploads/products/').'/'.$data->product_row_id.'/thumbnail/'.$data->product_image }}" class="img-responsive" alt="" width="60">
      </td>
      <td>{{ $data->product_name }}</td>
    </tr>
    @php $counter++; @endphp
  @endforeach
</table>

</body>
</html>
