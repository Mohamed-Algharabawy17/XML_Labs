## CRUD Data XML

This PHP application allows users to perform CRUD (Create, Read, Update, Delete) operations on employee data stored in an XML file.

### Functionality Overview:

1. **Display Form for Employee Data Entry/Modification:**
    - Users can input or modify employee details including name, email, phone, and address.
    - The form also includes buttons for navigation, submission, update, and deletion of employee records.

2. **Navigation Buttons:**
    - "Previous" and "Next" buttons allow users to navigate through employee records.
    - These buttons facilitate movement between different employee records.

3. **Inserting New Employee:**
    - Users can insert a new employee by filling out the form fields and clicking the "Insert" button.

4. **Updating Employee Details:**
    - Existing employee details can be updated by modifying the fields and clicking the "Update" button.

5. **Deleting Employee:**
    - Users can delete the currently displayed employee record by clicking the "Delete" button.

6. **Searching for Employees:**
    - Users can search for employees by entering their name in the search field and clicking the "Search" button.
    - Matching results will be displayed below the form.

7. **Displaying Search Results:**
    - If search results are found, they are displayed in a separate section below the form.

8. **XML Data Handling:**
    - Employee data is stored in an XML file named "employees.xml".
    - Functions are provided to create, read, update, and delete employee records in the XML file.


*Figure 1: Screenshot of the index.php page displaying the employees data in the table.*


![Details Page](./output%20_images/main.png)

*Figure 2: Screenshot of the index.php page displaying the search employees data.*


![Details Page](./output%20_images/search.png)


### File Structure:

- `index.php`: Contains the HTML form for input and display of employee data. PHP code handles form submissions and interacts with the XML file.
- `Functions.php`: Includes PHP functions for CRUD operations and XML file manipulation.
- `style.css`: External stylesheet for styling the HTML elements.

### PHP Functions:

- `createNewXML`: Creates a new XML file with an empty "employees" root element if the file does not exist.
- `insertEmployee`: Inserts a new employee record into the XML file.
- `getEmployees`: Retrieves all employee records from the XML file.
- `updateEmployee`: Updates an existing employee record in the XML file.
- `deleteEmployee`: Deletes an employee record from the XML file.
- `searchByName`: Searches for employee records by name in the XML file.

### Usage:

1. Access the application through a web browser.
2. Input or modify employee details in the form fields.
3. Use navigation buttons to move between employee records.
4. Click "Insert" to add a new employee, "Update" to modify an existing record, or "Delete" to remove a record.
5. Enter a name in the search field and click "Search" to find matching employee records.

