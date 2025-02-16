Link to the website - try out the simulation of an e-commerce webshop

http://acepik.onlinewebshop.net/public/index.php


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>ACE - Ecommerce Simulation</h1>
    <p>ACE is a modern web-based marketplace platform that allows users to discover and list various items for sale across multiple categories including cars, houses, phones, shoes, and laptops.</p>
    <h3>Features</h3>
    <ul>
        <li>
            <strong>Multi-category Support:</strong> Browse and list items in various categories:
            <ul>
                <li>Cars</li>
                <li>Houses</li>
                <li>Phones</li>
                <li>Shoes</li>
                <li>Laptops</li>
            </ul>
        </li>
        <li><strong>Advanced Filtering:</strong> Each category comes with specific filters to help users find exactly what they're looking for.</li>
        <li><strong>Responsive Design:</strong> Fully responsive interface that works on desktop and mobile devices.</li>
        <li><strong>Search Functionality:</strong> Powerful search feature to find listings quickly.</li>
        <li><strong>User Authentication:</strong> Secure user registration and login system.</li>
    </ul>
    <h3>Technology Stack</h3>
    <ul>
        <li><strong>Frontend:</strong>
            <ul>
                <li>HTML</li>
                <li>CSS</li>
                <li>JavaScript</li>
            </ul>
        </li>
        <li><strong>Backend:</strong>
            <ul>
                <li>PHP</li>
                <li>MySQL Database</li>
            </ul>
        </li>
    </ul>
    <h3>File Structure Overview</h3>
    <ul>
        <li><code>public/index.php</code>: Main entry point and homepage</li>
        <li><code>includes/db_connection.php</code>: Database configuration and connection</li>
        <li><code>css/general.css</code>: Base styles and utilities</li>
        <li><code>css/style.css</code>: Main stylesheet</li>
        <li><code>css/media.css</code>: Responsive design rules</li>
        <li><code>js</code> folder: JavaScript scripts</li>
        <li><code>includes</code> folder: Helper functions and configuration</li>
        <li><code>public</code> folder: All publicly available pages</li>
        <li><code>filters</code> folder: Search filters implementation</li>
    </ul>
    <h3>Security</h3>
    <ul>
        <li>User passwords are securely hashed.</li>
        <li>SQL injection protection through prepared statements.</li>
        <li>Session-based authentication.</li>
        <li>Input validation and sanitization.</li>
    </ul>
</body>
</html>
