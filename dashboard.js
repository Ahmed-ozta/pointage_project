const div = document.getElementById("table_employee");
const h2 = document.getElementById("projet_name");
const submit_button = document.getElementById("submit_button");
function table_employees(array, pr_name, case_update) {
    h2.innerHTML = "Projet: " + pr_name;
    document.getElementById("input_projet_name").value = pr_name;
    // Set up the table structure
    div.innerHTML = `
    <table class="w-full table-fixed">
        <thead>
            <tr class="bg-gray-300">
                <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Name</th>
                <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Phone</th>
                <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Email</th>
                <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">présence</th>
            </tr>
        </thead>
        <tbody class="bg-white" id="my_tbody"></tbody>
    </table>`;

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
                <input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" name="${empl.id}">Present
            </td>
        `;

        tbody.appendChild(row);
    }
    submit_button.innerHTML = `
     <input type="submit" class="mt-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer" name="save" value="save" >
    `;
    if (!case_update) {
        submit_button.style.display = "none";
    }
}

function table_historique(array, pr_name) {

    h2.innerHTML = "Projet: " + pr_name + " Date: " + array[0].date_historique;
    document.getElementById("input_projet_name").value = pr_name
    // Set up the table structure
    div.innerHTML = `
    <table class="w-full table-fixed">
        <thead>
            <tr class="bg-gray-300">
                <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Name</th>
                <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Phone</th>
                <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Email</th>
                <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">présence</th>
            </tr>
        </thead>
        <tbody class="bg-white" id="my_tbody"></tbody>
    </table>`;

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
                ${empl.présence}
            </td>
        `;

        tbody.appendChild(row);
    }
}
