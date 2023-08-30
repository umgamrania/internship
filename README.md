# 5<sup>th</sup> Sem Internship Projects
This is a repository of all the projects we built during our internship @HostingSpell.

This README file contains basic introduction on every project. For detailed info about each project and how to run them, Kindly refer to the individual README files in each folder

<br>
<br>
<br>
<br>

# DNS Info Tool

The **dns-info** tool is a PHP script that enables you to gather essential DNS (Domain Name System) information for a specified domain. By utilizing the `dig` command-line utility, the script retrieves several types of DNS records, including A, AAAA, MX, NS, CNAME, and TXT records, from a designated DNS server.

## How It Works

The **dns-info** tool operates by executing DNS queries for different record types against a given domain and DNS server. Here's a brief overview of how it works:

1. The script takes in two parameters: the target domain (`$url`) and the DNS server (`$dns`) to query. The default DNS server is set to "1.1.1.1."

2. The array `$records` contains the list of DNS record types to query, such as A, AAAA, MX, NS, CNAME, and TXT.

3. The function `execute($url, $dns)` iterates through each record type and constructs a `dig` command to fetch the specific record from the specified DNS server.

4. The `shell_exec` function is used to execute the `dig` command within the script and capture the results.

5. The results for each record type are stored in an associative array named `$results`.

6. The script returns the `$results` array, which is then encoded into JSON format.

7. If accessed via a web browser, the script checks for the presence of the "url" parameter in the query string. If present, it fetches the DNS information for the provided domain using the custom or default DNS server. The results are output in JSON format. If the "url" parameter is not provided, an error message is displayed.

## Usage

To use the **dns-info** tool, run the PHP script with the following parameters:

```sh
php dns-info.php --url example.com [--dns 8.8.8.8]
```

Replace `example.com` with the desired domain name. Optionally, you can specify a custom DNS server using the `--dns` flag.

The script then retrieves and presents the DNS records associated with the given domain, allowing you to quickly access essential domain-related information.

<br>
<br>
<br>

---
# Expense Tracker

This tool is built using the Flask framework in python. It uses MongoDB as the database to store expense data. It provides all the basic things like user account control, password resetting and everything.

## Features of the Expense Tracker:

1. **User Authentication and Authorization:**
   - Users can register and create accounts with usernames and passwords.
   - User passwords are hashed and stored securely in the database.
   - Login and session management are handled using Flask-Login.

2. **Resetting Password:**
   - Users can request a password reset by providing their username.
   - An OTP (One-Time Password) is generated and sent to the user's email.
   - Users can enter the OTP and set a new password.

3. **Creating and Editing User Profile:**
   - Users can create or edit their profile details like full name, mobile number, and email.

4. **Inserting Expense Data:**
   - Users can input their financial data, including income, expenses, and categories for a specific month.
   - The data is stored in the database, and the total expense and profit ratio are calculated and stored.

5. **Viewing and Editing Expense Data:**
   - Users can view and edit their financial data for a specific month.
   - Data is presented in a tabular format, displaying income, expenses, categories, and calculated profit ratio.

6. **Exporting Data as CSV:**
   - Users can generate CSV files containing their financial data for a specific month or across all months.
   - CSV files include details like categories, expenses, amounts, and currencies.

7. **Categorized Expense Tracking:**
   - Users can categorize expenses into different categories (e.g., groceries, utilities, entertainment).
   - Expenses are associated with categories for easy tracking and analysis.

8. **Expense Sorting and Analysis:**
   - Users can view and analyze their expenses sorted by amount, location, or category.
   - Top spending categories and expenses can be identified for better financial management.

9. **Overall Financial Overview:**
   - Users can view an overview of their overall financial status, including total income, total expenses, and profit ratio.

10. **Account Deletion:**
    - Users have the option to delete their account.
    - Upon deletion, all associated financial and profile data are removed from the database.

11. **Basic Expense Categories Management:**
    - Users can manage basic expense categories (e.g., create, edit, delete) to customize their tracking experience.

12. **Yearly and Monthly Data Analysis:**
    - Users can generate annual CSV files that summarize their expenses and income for each month of the specified year.

13. **Responsive Web Interface:**
    - The application provides a responsive web interface, making it accessible from various devices.

These features collectively provide users with tools to efficiently track their expenses, manage financial data, and gain insights into their spending patterns.

## Usage

A production python wsgi server `gunicorn` is used to run the project on the server.

```gunicorn -bind 0.0.0.0:8000 wsgi:app```

<br>
<br>
<br>

---

# Password Generator

The **Password Generator** is a web-based tool created using HTML, CSS, and PHP that allows users to generate strong passwords based on their preferences. The tool enables users to specify the length of the password and choose which character types to include (lowercase letters, uppercase letters, numbers, and symbols). The generated password can be copied to the clipboard for easy use.

## How It Works

1. **User Interface**: The tool features a clean and user-friendly interface. Users can enter the desired password length and select the character types they want to include in their password.

2. **Password Generation**: Upon submitting the form, the PHP code generates a password based on the user's preferences. It randomly selects characters from the chosen character types until the desired password length is achieved.

3. **Character Types**:
   - **Lowercase Letters**: If selected, the password will contain lowercase letters (a-z).
   - **Uppercase Letters**: If selected, the password will contain uppercase letters (A-Z).
   - **Numbers**: If selected, the password will contain numeric digits (0-9).
   - **Symbols**: If selected, the password will contain special symbols.

4. **Output**: The generated password is displayed in an input field, which is initially disabled to prevent accidental modification. The password is also automatically copied to the clipboard when the "Copy It!" button is clicked.

5. **Styling**: The tool features a simple yet visually appealing design. It utilizes a responsive layout, making it usable across different devices and screen sizes.

6. **Credits**: The tool is attributed to Mumtahin Qadri, a member of the Devs Team at HostingSpell.

## Usage

1. Enter the desired password length using the "Enter Length" input field. You can set a length between 4 and 128 characters.

2. Check the checkboxes corresponding to the character types you want to include in your password.

3. Click the "Generate" button to generate a password based on your preferences.

4. The generated password will be displayed in the "Password" input field. You can also click the "Copy It!" button to copy the password to your clipboard.

## Author

This Password Generator tool was created by Mumtahin Qadri, a member of the Devs Team at HostingSpell.

## Disclaimer

Please be cautious when generating and handling passwords. Always prioritize security by using strong and unique passwords for different accounts and services.

<br>
<br>
<br>

----

# QR Code Generator

The **QR Code Generator** is a web-based application developed using HTML, PHP, and the Bootstrap framework. This application allows users to generate QR codes for URLs that they input. QR codes are two-dimensional barcodes that can be scanned by mobile devices, allowing quick access to the encoded information, often a URL.

## How It Works

1. **User Interface**: The application provides a simple user interface where users can input a URL for which they want to generate a QR code.

2. **QR Code Generation**: When the user submits the form, the PHP code uses the PHP QR Code library (`phpqrcode/qrlib.php`) to generate a QR code for the provided URL. The QR code image is generated in PNG format.

3. **QR Code Image**: The generated QR code image is displayed on the page, allowing users to view and download it.

## Usage

1. Input the desired URL for which you want to generate a QR code.

2. Click the "Generate" button.

3. The QR code image corresponding to the provided URL will be displayed on the page.


<br>
<br>
<br>

---

# SMTP Tester

The **SMTP Tester** is a utility designed to test the functionality of an SMTP server by sending a test email using the provided parameters. This tool is built using a combination of PHP and Java, providing both a front-end interface for users to input SMTP server details and a back-end process for sending test emails.

## How It Works

### Front-End (index.php)

1. The user accesses the web interface by visiting the `index.php` page.
2. The user inputs SMTP server details such as hostname, port, security (SSL), username, password, sender's email, and recipient's email.
3. Upon submitting the form, the PHP code processes the form data and constructs a cURL request to the backend server to trigger the email sending process.
4. The cURL request includes all the necessary parameters to simulate an email sending request.

### Back-End (Java)

1. The Java server listens for incoming connections on port 8080.
2. When the request is received, the server parses the URL parameters to extract the SMTP-related details, such as hostname, port, security, username, password, sender's email, and recipient's email.
3. The Java code then uses the provided details to initiate an SMTP session and sends a test email from the sender's email address to the recipient's email address.
4. The output and debugging information from the SMTP session are captured and formatted.
5. The server responds to the initial cURL request with the formatted output and debugging information.

## Usage

1. Access the `index.php` page through a web browser.
2. Input the SMTP server details and email addresses.
3. Click the "Send test mail" button.
4. The SMTP server's response and debugging information will be displayed in the console section of the page.

## Note

- This tool should be used for testing purposes only and requires proper configuration and security considerations before being used in a production environment.
- Ensure that the required Java environment is set up to run the backend server.
- The QR Code Generator example provided is simplified. Actual use cases may require additional error handling, input validation, and security measures.
- The QR Code Generator may require additional configuration and adjustments to work in different environments.

<br>
<br>
<br>

---
# SSL Inspector

The **SSL Inspector** is a web application designed to retrieve and display SSL certificate information for a specified server hostname. It uses the OpenSSL command-line tool to connect to the server, retrieve the SSL certificate details, and then parses and displays this information on the web page.

## How It Works

1. The user inputs a server hostname (URL) in the provided text field.
2. Upon clicking the "Test" button, the PHP code processes the input and uses the `openssl s_client` command to establish an SSL connection with the specified server on port 443 (default HTTPS port).
3. The output of the `openssl` command is captured and parsed to extract relevant certificate information such as the provider, type, algorithm, issue date, expiration date, and SSL details.
4. If the connection fails or no certificate is available, a message indicating the absence of a certificate is displayed.
5. Additionally, the PHP code uses cURL to send an HTTP request to the provided URL (with `http` instead of `https`) to check if the server enforces SSL (Force SSL). If a redirect to `https` is detected in the response headers, it indicates the server enforces SSL.

## Usage

1. Access the web application in a browser.
2. Enter the server hostname (URL) you want to inspect.
3. Click the "Test" button to retrieve and display the SSL certificate information.

## Note

- This tool can be helpful for checking and verifying SSL certificate information for a specific server. However, it should not be considered a comprehensive SSL analysis tool.
- Ensure proper security measures and input validation are implemented before deploying this tool in a production environment.
- The example provided is a simplified version. Depending on your use case, you might need to add additional error handling, validation, and security measures.