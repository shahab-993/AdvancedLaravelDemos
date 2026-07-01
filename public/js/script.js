
let sortOrder = {};

function getColumnIndex(column) {
    switch (column) {
        case 'first_name': return 1;
        case 'last_name': return 2;
        case 'title_name': return 3;
        case 'email': return 4;
        case 'department': return 5;
        case 'country': return 6;
        default: return 1;
    }
}

function sortTable(column) {

    sortOrder[column] = sortOrder[column] === 'asc' ? 'desc' : 'asc';

    let arrow = document.getElementById(column + "_arrow");
    arrow.innerHTML = sortOrder[column] === 'asc' ? '↑' : '↓';

    let table = document.getElementById("employeeTable");
    let rows = Array.from(table.getElementsByTagName("tr"));

    rows.sort(function (a, b) {
        let aText = a.querySelector(`td:nth-child(${getColumnIndex(column)})`).innerText.toLowerCase();
        let bText = b.querySelector(`td:nth-child(${getColumnIndex(column)})`).innerText.toLowerCase();



        if (sortOrder[column] === 'asc') {
            return aText > bText ? 1 : -1;
        } else {
            return aText < bText ? 1 : -1;
        }
    });

    // Remove the current table content
    table.innerHTML = "";

    // Append the sorted rows back to the table
    rows.forEach(row => table.appendChild(row));
}