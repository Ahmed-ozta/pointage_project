/*
table_employees([{"full_name":"nagato","phone":"666666"},{"full_name":"naruto","phone":"1111111"},{"full_name":"courtois","phone":"1331"},{"full_name":"luffy","phone":"22222"}])
 */
/*
<div class="shadow-lg rounded-lg overflow-hidden mx-4 md:mx-10">
    <table class="w-full table-fixed">
       
        <tbody class="bg-white">
            <tr>
                <td class="py-4 px-6 border-b border-gray-200">John Doe</td>
                <td class="py-4 px-6 border-b border-gray-200 truncate">johndoe@gmail.com</td>
                <td class="py-4 px-6 border-b border-gray-200">555-555-5555</td>
                <td class="py-4 px-6 border-b border-gray-200">
                    <span class="bg-green-500 text-white py-1 px-2 rounded-full text-xs">Active</span>
                </td>
            </tr>
            <tr>
                <td class="py-4 px-6 border-b border-gray-200">Jane Doe</td>
                <td class="py-4 px-6 border-b border-gray-200 truncate">janedoe@gmail.com</td>
                <td class="py-4 px-6 border-b border-gray-200">555-555-5555</td>
                <td class="py-4 px-6 border-b border-gray-200">
                    <span class="bg-red-500 text-white py-1 px-2 rounded-full text-xs">Inactive</span>
                </td>
            </tr>
            <tr>
                <td class="py-4 px-6 border-b border-gray-200">Jane Doe</td>
                <td class="py-4 px-6 border-b border-gray-200 truncate">janedoe@gmail.com</td>
                <td class="py-4 px-6 border-b border-gray-200">555-555-5555</td>
                <td class="py-4 px-6 border-b border-gray-200">
                    <span class="bg-red-500 text-white py-1 px-2 rounded-full text-xs">Inactive</span>
                </td>
            </tr>
            <tr>
                <td class="py-4 px-6 border-b border-gray-200">Jane Doe</td>
                <td class="py-4 px-6 border-b border-gray-200 truncate">janedoe@gmail.com</td>
                <td class="py-4 px-6 border-b border-gray-200">555-555-5555</td>
                <td class="py-4 px-6 border-b border-gray-200">
                    <span class="bg-red-500 text-white py-1 px-2 rounded-full text-xs">Inactive</span>
                </td>
            </tr>
            <!-- Add more rows here -->
        </tbody>
    </table>
</div>
*/
const div = document.getElementById("table_employee");
const h2 = document.getElementById("projet_name");

function table_employees(array, pr_name) {
    h2.innerHTML = pr_name;
    // Set up the table structure
    div.innerHTML = `
    <form action='save.php method=get'>
    <table class="w-full table-fixed">
        <thead>
            <tr class="bg-gray-100">
                <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Name</th>
                <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Phone</th>
                <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Email</th>
                <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Status</th>
            </tr>
        </thead>
        <tbody class="bg-white" id="my_tbody"></tbody>
    </table>
    `;

    // Get the tbody element
    let tbody = document.getElementById("my_tbody");

    // Loop through the array and add each employee's data as a row
    for (let empl of array) {
        let row = document.createElement('tr');
        row.classList.add('border-b', 'border-gray-200');

        row.innerHTML = `
            <td class="py-4 px-6">${empl.full_name}</td>
            <td class="py-4 px-6">${empl.phone}</td>
            <td class="py-4 px-6">example@example.com</td>  <!-- Example email, change as needed -->
            <td class="py-4 px-6">
                <span class="bg-red-500 text-white py-1 px-2 rounded-full text-xs">Inactive</span>
            </td>
        `;

        tbody.appendChild(row);
    }
}