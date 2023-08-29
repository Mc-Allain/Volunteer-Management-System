# Volunteer-Management-System

### Tools Needed
* Visual Studio Code - [Download](https://code.visualstudio.com/Download)
* XAMPP - [Download](https://www.apachefriends.org/download.html)
* Git - [Download](https://git-scm.com/downloads)

### VS Code Extension
Name | Id | Description | Version | Publisher | Link
--- | --- | --- | --- | --- | ---
Live Sass Compiler | glenn2223.live-sass | Compile Sass or Scss to CSS at realtime. | 6.1.1 | Glenn Marks | [Marketplace](https://marketplace.visualstudio.com/items?itemName=glenn2223.live-sass)
<pre><code class="shell">sass --watch App/Assets/scss/input.scss: App/Assets/css/output.css</code></pre>

### Setting up the environment
1. Clone the Repository via CLI (Command Line Interface) such as Command Prompt or Powershell.
<pre><code class="shell">https://github.com/Mc-Allain/Volunteer-Management-System.git</code></pre>
2. Move the project to your XAMPP folder under _htdocs_.
3. Download the [SQL Script](https://github.com/Mc-Allain/Volunteer-Management-System/blob/main/volunteer_management_system.sql) for the Database.
4. Open the XAMPP and start both Apache and MySQL.
5. Go to the phpMyAdmin by clicking the Admin button of MySQL in XAMPP Control Panel.
6. Import the downloaded SQL Script.
7. Select the database and the _administrators_ table, and then update the record with an ID value of 2. Use this [MD5 hash encoder](https://www.md5hashgenerator.com/) for the password update.
8. You can now access the page and sign in using the recently updated record in this [URL](http://localhost/volunteer_management_system/sign_in/).
