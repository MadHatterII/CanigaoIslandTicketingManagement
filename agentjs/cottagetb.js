fetch('Cottage_tb.php')
.then(response => response.json())
.then(data => {
  const tableBody = document.getElementById('tableBody');
  let tableHTML = '';
  let currentCottageType = null;

  data.forEach(row => {
    if (row.cottage_type !== currentCottageType) {
      // Add a new row to categorize the cottage type
      tableHTML += `<tr><td colspan="5" style="font-weight: bold;">${row.cottage_type}</td></tr>`;
      currentCottageType = row.cottage_type;
    }

    const statusCell = `<td class="status-cell" data-status="${row.status}">${row.status}</td>`;
    tableHTML += `<tr>
      <td style="display: none;">${row.id}</td>
      <td>${row.group_name}</td>
      <td>${row.cottage_type}</td>
      <td>${row.stayType}</td>
      ${statusCell}
    </tr>`;
  });

  tableBody.innerHTML = tableHTML;
})
.catch(error => {
  console.error("Error fetching data: " + error);
});